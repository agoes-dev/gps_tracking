<?php
include "config/connection.php";
$query2 	= "select SQL_NO_CACHE * from joborder where req_num='$_GET[request_number]'";
$result2 	= mysql_query($query2);
if (!$result2) {
	die('Invalid query: ' . mysql_error());
}
header("Content-type: text/xml");
echo '<orders>';
while ($row = @mysql_fetch_assoc($result2)){
	echo '<order ';
	echo 'request_number="'.$row['req_num']. '" ';
	echo 'id_perangkat="'.$row['id_perangkat']. '" ';
	
	$qevent = mysql_query("select * from alarm where id_perangkat='$row[id_perangkat]' and (id_kondisi='2' or id_kondisi='1')");
	$qwil = mysql_query("select id_wilayah from perangkat where id_perangkat='$row[id_perangkat]'");
	$devent = mysql_fetch_array($qevent);
	$dwil = mysql_fetch_array($qwil);
	echo 'id_wilayah="'.$dwil['id_perangkat']. '" ';
	echo 'event_datetime="'.$devent['waktu']. '" ';
	echo 'event_type="'.$devent['id_kondisi']. '" ';
	echo '/>';
}
echo '</orders>';
?>