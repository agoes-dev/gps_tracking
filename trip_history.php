<?
session_start();
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<title>Bintangtrack History Report</title>
<style type="text/css">
body { font: normal 10pt Helvetica, Arial; }
#map_kendaraan { width: 845px; height: 415px; border: 0px; padding: 0px; }
</style>
<script src="http://maps.google.com/maps/api/js?v=3&sensor=false&libraries=drawing,places,geometry" type="text/javascript"></script>
</head>
<body onload="initialize_history()" style="margin:0px; border:0px; padding:0px;">
<?
include "config/connection.php";
$id_per = $_GET['id_per'];
$id_gru = $_GET['id_gru'];
$w_awal = $_GET['w_awal'];
$w_akhir = $_GET['w_akhir'];

?>
<input type=hidden id=id_perangkat value='<?echo $id_per;?>'>
<input type=hidden id=id_gru value='<?echo $id_gru;?>'>
<input type=hidden id=waktu_awal value='<?echo $w_awal;?>'>
<input type=hidden id=waktu_akhir value='<?echo $w_akhir;?>'>
<script type="text/javascript">
var marker=[];
var markerz=[];
var path=[];
var infoWindow=new google.maps.InfoWindow;
var map = []; 
var aria=[];
var isi=[];
var line_laporan;
var jalur;
var polygons = [];
var panah = {
	path: 'M -1,0 A 1,1 0 0 0 1,0 1,1 0 0 0 -1,0 z',
	strokeColor: '#09F',
	fillColor: '#000000',
	fillOpacity: 1,
	scale: 4
};
function initialize_history(){
	map=new google.maps.Map(document.getElementById('report_history'),{
		mapTypeId:google.maps.MapTypeId.HYBRID,
		mapTypeControl:true,
		mapTypeControlOptions:{
			style:google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
			position:google.maps.ControlPosition.TOP_LEFT
		},
		scaleControl: true,
		streetViewControl: true,
		streetViewControlOptions:{
			position: google.maps.ControlPosition.TOP_LEFT
		},
		zoomControl: true,
		zoomControlOptions:{
			position: google.maps.ControlPosition.TOP_LEFT
		}
	});
	var id_perangkat	=document.getElementById('id_perangkat').value;
	var id_grup			=document.getElementById('id_gru').value;
	var waktu_awal		=document.getElementById('waktu_awal').value;
	var waktu_akhir	=document.getElementById('waktu_akhir').value;
	downloadUrl("includes/xml_report_history.php?id_grup="+id_grup+"&id_perangkat="+id_perangkat+"&waktu_awal="+waktu_awal+"&waktu_akhir="+waktu_akhir,function(data){
		var xml=data.responseXML;
		var markers=xml.documentElement.getElementsByTagName("marker");
		for(var i=0;i<markers.length;i++){
			var id_perangkat=markers[i].getAttribute("id_perangkat");
			var id_data=markers[i].getAttribute("id_data");
			var nopol=markers[i].getAttribute("nopol");
			var waktu=markers[i].getAttribute("waktu");
			var icon=markers[i].getAttribute("icon");
			var d1=markers[i].getAttribute("din1");
			var d2=markers[i].getAttribute("din2");
			var d3=markers[i].getAttribute("din3");
			var d4=markers[i].getAttribute("din4");
			var mesin=markers[i].getAttribute("mesin");
			var lat=parseFloat(markers[i].getAttribute("lat"));
			var lng=parseFloat(markers[i].getAttribute("lng"));
			var spd=parseFloat(markers[i].getAttribute("speed"));
			var point=new google.maps.LatLng(lat,lng);
			path.push(point);
			if(mesin=="7"){
				marker=new google.maps.Marker({
					map:map,
					icon:'images/green.png'
				});
				var eng="Status Engine&nbsp;:&nbsp;<font color='green'><b>ON</b></font>";
				markerz.push(marker);
			}
			else if(mesin=="8"){
				marker=new google.maps.Marker({
					map:map,
					icon:'images/red.png'
				});
				var eng="Status Engine&nbsp;:&nbsp;<font color='red'><b>OFF</b></font>";
				markerz.push(marker);
			}
			else{
				marker=new google.maps.Marker({
					map:map,
					icon:'images/blue.png'
				});
				var eng="Status Engine&nbsp;:&nbsp;<font color='red'><b>UNKNOWN</b></font>";
				markerz.push(marker);
			}
			var speed = "Speed : "+spd+" Km/H";
			var alamat=markers[i].getAttribute("alamat");
			var keterangan="<p>Vehicle : <b>"+nopol+
			"</b><br>Datetime : "+waktu+
			"<br>Address : "+alamat+
			"<br>"+speed+
			"<br>"+eng+
			"</p>";
			infoWindow.setContent(keterangan);
			isi.push(keterangan);
			bindInfoWindow(marker,map,infoWindow,keterangan,point)	
		}
		
		var arr = new Array();
		var zone = xml.getElementsByTagName("area");
		for (var i = 0; i < zone.length; i++) {
			arr = [];
			var id = zone[i].getAttribute("id_wilayah");
			var nm = zone[i].getAttribute("nama_wilayah");
			var point = xml.documentElement.getElementsByTagName("area")[i].getElementsByTagName("point");
			for (var j=0; j < point.length; j++){
				arr.push( new google.maps.LatLng(
					parseFloat(point[j].getAttribute("lat")),
					parseFloat(point[j].getAttribute("lng"))
				));
			}
			polygons.push(aria[i] = new google.maps.Polygon({
				paths: arr,
				strokeColor: '#000',
				strokeOpacity: 0.8,
				strokeWeight: 2,
				fillColor: '#FF0000',
				fillOpacity: 0.35
			}));
			polygons[polygons.length-1].setMap(map);
			var boxText=document.createElement("div");
			boxText.innerHTML="<b>"+nm+"</b>";
			var boxOption={
				content:boxText,
				boxStyle:{border:"1px solid black",
				textAlign:"center",
				fontSize:"8pt",
				width:"70px"},
				disableAutoPan:true,
				pixelOffset:new google.maps.Size(-25,0),
				closeBoxURL:"",
				isHidden:false,
				pane:"mapPane",
				enableEventPropagation:true
			};
			/* var ibLabel=new InfoBox(boxOption);
			google.maps.event.addListener(aria[i], 'mouseover', function(){
				ibLabel.open(map);
			}); */
		}
		
		line_laporan=new google.maps.Polyline({
			path:path,
			geodesic:true,
			strokeColor:"red",
			strokeOpacity:0.7,
			strokeWeight:4,
			icons:[{
				icon:panah,
				offset:'0%'
			}]
		});
		jalur = new google.maps.Polyline({
			geodesic:true,
			strokeColor:"red",
			strokeOpacity:0.7,
			strokeWeight:4
		});
		jalur.setMap(map);
		line_laporan.setMap(map);	
		var finish_marker=new google.maps.Marker({
			map:map,position:point,icon:'images/finish.png'
		});
		var latlngbounds=new google.maps.LatLngBounds();
		for(var i=0;i<path.length;i++)
		{
			latlngbounds.extend(path[i]);
		}
		map.fitBounds(latlngbounds)
	});
	var homeControlDiv=document.createElement('div');
	homeControl9=new HomeControl9(homeControlDiv,map);
	homeControlDiv.index=1;
	map.controls[google.maps.ControlPosition.LEFT_BOTTOM].push(homeControlDiv);
}
var dut;
var i = 0;
var julir=[];
function watch_history(){	
	julir = jalur.getPath();
	julir.push(path[i]);
	// google.maps.event.trigger(markerz, 'click');
	markerz[i].setPosition(path[i]);
	infoWindow.setContent(isi[i]);
	infoWindow.open(map,markerz[i]);
	i++;
	if (i == markerz.length){
		clearInterval(dut);
		// alert(julir);
		google.maps.event.trigger(homeControl9, 'click');
	};	
}
function play_history(){
	line_laporan.setMap(null);
	map.setZoom(15);
	// ibLabel.setMap(null);
	dut = setInterval(watch_history,1000);
}
function pause_history(){
	clearInterval(dut);
}
function HomeControl9(controlDiv9,map){
	controlDiv9.style.padding='5px';
	var controlUI_1=document.createElement('div');
	controlUI_1.style.backgroundColor='white';
	controlUI_1.style.borderStyle='solid';
	controlUI_1.style.borderWidth='2px';
	controlUI_1.style.cursor='pointer';
	controlUI_1.style.textAlign='center';
	controlDiv9.appendChild(controlUI_1);
	var controlUI_2=document.createElement('div');
	controlUI_2.style.backgroundColor='white';
	controlUI_2.style.borderStyle='solid';
	controlUI_2.style.borderWidth='2px';
	controlUI_2.style.cursor='pointer';
	controlUI_2.style.textAlign='center';
	var controlImage_1=document.createElement('img');
	controlImage_1.src="images/play_icon.png";
	controlImage_1.style.height='24px';
	controlImage_1.style.height='24px';
	// controlImage_1.title="Play";
	controlUI_1.appendChild(controlImage_1);
	
	var controlText1 = document.createElement('div');
	controlText1.style.fontSize = '13px';
	controlText1.style.lineHeight = '20px';
	controlText1.style.paddingLeft = '5px';
	controlText1.style.paddingRight = '5px';
	controlText1.innerHTML = 'Start';
	controlUI_1.appendChild(controlText1);

	var controlImage_2=document.createElement('img');
	controlImage_2.src="images/pause_icon.png";
	controlImage_2.style.height='24px';
	// controlImage_2.title="Pause";
	controlUI_2.appendChild(controlImage_2);
	
	var controlText2 = document.createElement('div');
	controlText2.style.fontSize = '13px';
	controlText2.style.lineHeight = '20px';
	controlText2.style.paddingLeft = '5px';
	controlText2.style.paddingRight = '5px';
	controlText2.innerHTML = 'Pause';
	controlUI_2.appendChild(controlText2);
	
	google.maps.event.addDomListener(controlUI_1,'click',function(){
		controlDiv9.replaceChild(controlUI_2,controlUI_1);
		play_history();
	});
	
	google.maps.event.addDomListener(controlUI_2,'click',function(){
		controlDiv9.replaceChild(controlUI_1,controlUI_2);
		pause_history();
	})
}

function bindInfoWindow(marker,map,infoWindow,keterangan,point){
	google.maps.event.addListener(marker,'mouseover',function(){
		infoWindow.setContent(keterangan);
		infoWindow.open(map,marker)
	});
	google.maps.event.addListener(marker,'click',function(){
		map.setCenter(marker.getPosition())
	}
)}

function downloadUrl(url,callback){
	var request=window.ActiveXObject?new ActiveXObject('Microsoft.XMLHTTP'):new XMLHttpRequest;
	request.onreadystatechange=function(){
	if(request.readyState==4){
		request.onreadystatechange=doNothing;callback(request,request.status)
	}};
	request.open('GET',url,true);
	request.send(null)
}

function doNothing(){}
</script>
<div id="report_history" style='width:100%;height:100%;'></div>
</body>
</html>