function initialize_ignition(){
	var id_grup=document.getElementById('id_grup').value;
	downloadUrl("includes/xml_monitor_grup.php?id_grup="+id_grup,function(data){
		var xml=data.responseXML;
		var markers=xml.documentElement.getElementsByTagName("marker");
		var path=[];
		var mL=markers.length;
		//var x=0;
		for(var i=0;i<mL;i++){
			var total=markers[i].getAttribute("total");
			var ign_on=markers[i].getAttribute("ign_on");
			var ign_off=markers[i].getAttribute("ign_off");
			var total_off=markers[i].getAttribute("total_off");
			var total_geo=markers[i].getAttribute("total_geo");
			var inside=markers[i].getAttribute("inside");
			var total_outside=markers[i].getAttribute("total_outside");
			var unass=markers[i].getAttribute("unass");
			var ass=markers[i].getAttribute("ass");
			
			if(total==""){
				total=0;
			}
			document.getElementById("total").innerHTML=""+total+"";
			document.getElementById("ignion").innerHTML=""+ign_on+"";
			//document.getElementById("ignioff").innerHTML=""+ign_off+"";
			document.getElementById("total_off").innerHTML=""+total_off+"";
			document.getElementById("total_geo").innerHTML=""+total_geo+"";
			document.getElementById("inside").innerHTML=""+inside+"";
			document.getElementById("total_outside").innerHTML=""+total_outside+"";
			document.getElementById("unass").innerHTML=""+unass+"";
			document.getElementById("ass").innerHTML=""+ass+"";
			
			

		}	

	})	
}

function downloadUrl(url,callback){
	var request=window.ActiveXObject?new ActiveXObject('Microsoft.XMLHTTP'):new XMLHttpRequest;
	request.onreadystatechange=function(){
		if(request.readyState==4){
			request.onreadystatechange=doNothing;
			callback(request,request.status)
		}
	};
	request.open('GET',url,true);
	request.send(null)
}

function doNothing(){}