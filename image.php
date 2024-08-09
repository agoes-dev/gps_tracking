<? 
$host = "202.67.15.98";
$port = 2000;
$server = "localhost";
$dbusername = "admin_root";
$dbpassword = "B1nt@ng";
$database = "admin_bintang";
$koneksi = mysql_connect($server,$dbusername,$dbpassword) or die("Koneksi gagal");
mysql_select_db($database,$koneksi) or die ("Database tidak ditemukan");

$waktu=time();
$hasil3=mysql_query("select SQL_NO_CACHE * from image where id_perangkat='$_GET[id_perangkat]'");
$data3=mysql_fetch_array($hasil3);
$selisih=$waktu-$data3['waktu'];
if($selisih>300)
{
	mysql_query("update image set waktu='$waktu' where id_perangkat='$_GET[id_perangkat]'");
	$hasil=mysql_query("select SQL_NO_CACHE  * from perangkat where id_perangkat='$_GET[id_perangkat]'");
	$data=mysql_fetch_array($hasil);	
	$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
	$result = socket_connect($socket, $host, $port) or die("Could not connect to server\n");
	$hex1 = "\x00";
	$hex2 = "\x00";
	$message = "%AI2001".$data['no_imei'].",HA".$hex1.$hex2."]";
	socket_write($socket, $message, strlen($message)) or die("Could not send data to server\n");
	$result = socket_read ($socket, 1024) or die("Could not read server response\n");
	socket_close($socket); 
	echo "<div style=font-family:Arial;font-size:12px;>";
	echo "Capture : <b>".$result."</b><br/><br/>";
	echo "<form>";
	echo "<input type=button value=Close onClick=window.close()>";
	echo "</form>";
	echo "</div>";
}
else
{
	echo "<div style=font-family:Arial;font-size:12px;>";
	echo "Capture : <b>Try again in 5 minutes</b><br/><br/>";
	echo "<form>";
	echo "<input type=button value=Close onClick=window.close()>";
	echo "</form>";
	echo "</div>";
}
?>