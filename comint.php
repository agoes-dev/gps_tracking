<?
function hextostr($x) {
  $s='';
  foreach(explode("\n",trim(chunk_split($x,2))) as $h) $s.=chr(hexdec($h));
  return($s);
}

function strtohex($x) {
  $s='';
  foreach(str_split($x) as $c) $s.=sprintf("%02X",ord($c));
  return($s);
}

$host = "202.67.15.98";
$port = 2008;
$server = "localhost";
$dbusername = "admin_root";
$dbpassword = "B1nt@ng";
$database = "admin_bintang";
$koneksi = mysql_connect($server,$dbusername,$dbpassword) or die("Koneksi gagal");
mysql_select_db($database,$koneksi) or die ("Database tidak ditemukan");

$waktu=time();
$waktu_dummy = strftime('%Y-%m-%d %H:%M:%S', time());

$hasil=mysql_query("select SQL_NO_CACHE * from perangkat where id_perangkat='$_GET[id_perangkat]'");
$data=mysql_fetch_array($hasil);	
$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
$result = socket_connect($socket, $host, $port) or die("Could not connect to server\n");
$head = "\x24";
$W = "\x57";
$P = "\x50";
$plus = "\x2B";
$T = "\x54";
$R = "\x52";
$A = "\x41";
$C = "\x43";
$K = "\x4B";
$equal = "\x3D";
$comma = "\x2C";
$zero = "\x30";
$one = "\x31";
$two = "\x32";
$three = "\x33";
$four = "\x34";
$five = "\x35";
$six = "\x36";
$seven = "\x37";
$eight = "\x38";
$nine = "\x39";
$message = $head.$W.$P.$plus.$T.$R.$A.$C.$K.$equal.$eight.$eight.$eight.$eight.$comma.$one.$comma.$one.$five.$comma.$two.$zero.$zero.$comma.$zero.$comma.$zero.$comma.$four.$comma.$one.$five;
echo $message."<br/>";
socket_write($socket, $message, strlen($message)) or die("Could not send data to server\n");
$result = socket_read ($socket, 1024) or die("Could not read server response\n");
socket_close($socket); 
echo "<div style=font-family:Arial;font-size:12px;>";
echo "<form>";
echo "<input type=button value=Close onClick=window.close()>";
echo "</form>";
echo "</div>";
?>