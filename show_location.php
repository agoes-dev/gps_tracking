<?
session_start();
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<title>Bintangtrack Event Location</title>
<style type="text/css">
body { font: normal 10pt Helvetica, Arial; }
#map_kendaraan { width: 845px; height: 415px; border: 0px; padding: 0px; }
</style>
<script src="http://maps.google.com/maps/api/js?v=3&sensor=false&libraries=drawing,places,geometry" type="text/javascript"></script>
</head>
<body onload="initialize_vehicle()" style="margin:0px; border:0px; padding:0px;">
<?
include "config/connection.php";
$din = $_GET['din'];
if($din=="din1off"){
	$don = "id_din1off";
}
else if($din=="din2off"){
	$don = "id_din2off";
}
else if($din=="din3off"){
	$don = "id_din3off";
}
else if($din=="din4off"){
	$don = "id_din4off";
}

$id = $_GET['id'];
if($id==""){
	echo "<script>alert('Location not found!');window.close();</script>";
}

$te = mysql_query("select * from $din where $don='$id'");
while ($yey = mysql_fetch_array($te)){
	$q_no = mysql_query("select * from perangkat where id_perangkat='$yey[id_perangkat]'");
	$q_kend = mysql_fetch_array($q_no);
	
	?>
	<input type=hidden id=id_perangkat value='<?echo $yey['id_perangkat'];?>'>
	<input type=hidden id=id_grup value='<?echo $_SESSION['id_grups'];?>'>
	<input type=hidden id=lat value='<?echo $yey['lat'];?>'>
	<input type=hidden id=lng value='<?echo $yey['lng'];?>'>
	<input type=hidden id=icon value='<?echo $q_kend['tipe_ikon'];?>'>
	<?
}
?>
<script type="text/javascript">
var drawingManager=[];var polygons=[];var map;var customicon='images/';var latt=document.getElementById('lat').value;var lngg=document.getElementById('lng').value;var icon=document.getElementById('icon').value;var point=new google.maps.LatLng(latt,lngg);function initialize_vehicle(){map=new google.maps.Map(document.getElementById('map_kendaraan'),{center:point,zoom:16});var marker=new google.maps.Marker({position:point,map:map,icon:customicon+icon+'.png',optimized:false});var homeControlDiv=document.createElement('div');var homeControl7=new HomeControl7(homeControlDiv,map);homeControlDiv.index=1;map.controls[google.maps.ControlPosition.TOP_LEFT].push(homeControlDiv)}function HomeControl7(controlDiv7,map){controlDiv7.style.padding='5px';var controlUI_1=document.createElement('div');controlUI_1.style.backgroundColor='white';controlUI_1.style.borderStyle='solid';controlUI_1.style.borderWidth='2px';controlUI_1.style.cursor='pointer';controlUI_1.style.textAlign='center';controlDiv7.appendChild(controlUI_1);var controlImage_1=document.createElement('img');controlImage_1.src="images/wilayah.png";controlImage_1.style.height='24px';controlImage_1.style.height='24px';controlImage_1.title="Add New Area";controlUI_1.appendChild(controlImage_1);google.maps.event.addDomListener(controlUI_1,'click',function(){drawingManager=new google.maps.drawing.DrawingManager({drawingControl:true,drawingControlOptions:{position:google.maps.ControlPosition.TOP_LEFT,drawingModes:[google.maps.drawing.OverlayType.POLYGON]}});drawingManager.setMap(map);google.maps.event.addListener(drawingManager,'polygoncomplete',function(polygon){polygons=polygon.getPath();add_area()});controlDiv7.removeChild(controlUI_1)})}function add_area(){var nama_wilayah=prompt("Input Area Name:");if(nama_wilayah==""||nama_wilayah==null){alert("Area name still empty");window.close()}else{var id_perangkat=document.getElementById('id_perangkat').value;var id_grup=document.getElementById('id_grup').value;coordinates_area=polygons.getArray();window.open('includes/command_area/add_area.php?id_perangkat='+id_perangkat+'&id_grup='+id_grup+'&nama_wilayah='+nama_wilayah+'&data_wilayah='+coordinates_area);alert("Area "+nama_wilayah+" is Saved!");window.close()}}
</script>
<div id="map_kendaraan"></div>
</body>
</html>