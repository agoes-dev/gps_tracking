<?php
include "config/connection.php";
$req_num 		= $_GET['req_num'];
$req_date		= $_GET['req_date'];
$planned_dt 	= $_GET['planned_dt'];
$id_per 			= $_GET['id_per'];
$idwil_from 	= $_GET['idwil_from'];
$idwil_to 		= $_GET['idwil_to'];
$lat_from 		= $_GET['lat_from'];
$lng_from 		= $_GET['lng_from'];
$lat_to 			= $_GET['lat_to'];
$lng_to 			= $_GET['lng_to'];

$query 	= "insert into joborder(req_num,req_date,planned_departure,id_perangkat,id_wilayah_from,id_wilayah_to,lat_from,lat_to,lng_from,lng_to) values('$req_num','$req_date','$planned_dt','$id_per','$idwil_from','$idwil_to','$lat_from','$lat_to','$lng_from','$lng_to')";
echo $query;
$result 	= mysql_query($query);

if (!$result) {
	die('Invalid query: ' . mysql_error());
}
else{
	echo "Berhasil!";
}
?>