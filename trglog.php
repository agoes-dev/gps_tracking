<? 
$host = "202.67.15.98";
//$host = "192.168.1.2";
$port = 2004;
$server = "localhost";
$dbusername = "admin_root";
$dbpassword = "B1nt@ng";
$database = "admin_bintang";
$koneksi = mysql_connect($server,$dbusername,$dbpassword) or die("Koneksi gagal");
mysql_select_db($database,$koneksi) or die ("Database tidak ditemukan");

$waktu=time();
$waktu_dummy = strftime('%Y-%m-%d %H:%M:%S', time());
$hasil3=mysql_query("select SQL_NO_CACHE * from log where id_perangkat='$_GET[id_perangkat]'");
$data3=mysql_fetch_array($hasil3);
$selisih=$waktu-strtotime($data3['waktu']);
if($selisih>300)
{
	mysql_query("update log set waktu='$waktu_dummy' where id_perangkat='$_GET[id_perangkat]'");
	$hasil=mysql_query("select SQL_NO_CACHE * from perangkat where id_perangkat='$_GET[id_perangkat]'");
	$data=mysql_fetch_array($hasil);	
	$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
	$result = socket_connect($socket, $host, $port) or die("Could not connect to server\n");
	$head = "\x5B";
	$msgt = "\x12";
	$imei = $data['no_imei'];
	$tail = "\x5D";
	$message = $head.$msgt.$imei.$tail;
	echo $message."<br/>";
	socket_write($socket, $message, strlen($message)) or die("Could not send data to server\n");
	//$result = socket_read ($socket, 1024) or die("Could not read server response\n");
	socket_close($socket); 
	echo "<div style=font-family:Arial;font-size:12px;>";
	echo "<b>Stop Log OK</b><br/><br/>";
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