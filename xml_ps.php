<?php
function parseToXML($htmlStr)
{
  $xmlStr=str_replace('<','&lt;',$htmlStr);
  $xmlStr=str_replace('>','&gt;',$xmlStr);
  $xmlStr=str_replace('"','&quot;',$xmlStr);
  $xmlStr=str_replace("'",'&#39;',$xmlStr);
  $xmlStr=str_replace("&",'&amp;',$xmlStr);
  return $xmlStr;
}

include "config/connection.php";
$query2 	= "select SQL_NO_CACHE * from perangkat where id_grup='$_GET[id_grup]'";
// echo $query2;
$result2 	= mysql_query($query2);

if (!$result2) {
	die('Invalid query: ' . mysql_error());
}
header("Content-type: text/xml");

echo '<devices>';
while ($row = @mysql_fetch_assoc($result2)){
	echo '<device ';
	echo 'id_perangkat="'.$row['id_perangkat']. '" ';
	echo 'no_kendaraan="'.$row['no_kendaraan']. '" ';
	// echo 'nama_pengendara="'.$row['nama_pengendara']. '" ';
	echo 'id_supir="'.$row['id_supir']. '" ';
	echo '/>';
}
echo '</devices>';

?>