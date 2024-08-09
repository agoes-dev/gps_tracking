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
$query2 	= "select SQL_NO_CACHE * from perangkat where no_imei='$_GET[imei]'";
$result2 	= mysql_query($query2);
$data1		= mysql_fetch_array($result2);

$query1 = "select SQL_NO_CACHE * from data where id_perangkat='$data1[id_perangkat]' order by waktu desc limit 0,1";
$result = mysql_query($query1);

if (!$result) {
	die('Invalid query: ' . mysql_error());
}
header("Content-type: text/xml");

echo '<markers>';
$waktu_server = time();
while ($row = @mysql_fetch_assoc($result)){
	$waktu_data = strtotime($row['waktu']);
	$waktu_selisih = $waktu_server - $waktu_data;
	if($waktu_selisih < 86400)
	{
		if($row['sinyal']=='L' || $data2['status']=='V')
		{
		$row['kode'] = "2";
		}
		else
		{
		$row['kode'] = "1";
		}
	}
	else
	{
		if($row['sinyal']=='L' || $data2['status']=='V')
		{
		$row['kode'] = "2";
		}
		else
		{
		$row['kode'] = "0";
		}
	}


	// Menambahkan ke node dokumen XML
	echo '<marker ';
	echo 'lat="' 					.$row['lat']. '" ';
	echo 'lng="' 					.$row['lng']. '" ';
	echo 'nopol="' 				.parseToXML($data1['no_kendaraan']). '" ';
	echo 'waktu="' 				.parseToXML($row['waktu']). '" ';
	echo 'icon="' 				.$data1['tipe_ikon']. '" ';
	echo 'alamat="' 			.parseToXML($row['alamat']). '" ';				 
	echo 'kecepatan="' 			.$row['kecepatan']. '" ';				 
	echo 'status="' 			.$row['status']. '" ';				 
	echo 'mesin="' 			.$row['mesin']. '" ';				 
	echo 'sudut="' 			.$row['sudut']. '" ';				 
	echo 'jarak="' 			.$row['jarak']. '" ';				 
	echo 'bbm="' 			.$row['bbm']. '" ';				 
	echo 'temp="' 			.$row['temperatur']. '" ';				 
	echo 'id_tipe="' 				.parseToXML($data1['id_tipe']). '" ';
	echo 'kondisi="' 				.$row['kondisi']. '" ';
	echo 'kode="' 				.$row['kode']. '" ';
	echo '/>';
}
echo '</markers>';

?>