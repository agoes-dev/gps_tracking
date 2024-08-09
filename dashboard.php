<? 
$server   = "localhost";
$dbusername = "admin_root";
$dbpassword = "L34d1ng***123";
$database = "admin_bintang";
$koneksi = mysql_connect($server,$dbusername,$dbpassword) or die("Koneksi gagal");
mysql_select_db($database,$koneksi) or die ("Database tidak ditemukan");
$hasil=mysql_query("select * from perangkat where id_grup=50");
while($data=mysql_fetch_array($hasil))
{	
	$hasil2=mysql_query("select SQL_NO_CACHE * from alarm where id_perangkat='$data[id_perangkat]' and (id_kondisi between 7 and 8) order by waktu desc limit 0,1");
  $data2=mysql_fetch_array($hasil2);
	echo "select SQL_NO_CACHE * from alarm where id_perangkat='$data[id_perangkat]' and (id_kondisi between 7 and 8) order by waktu desc limit 0,1 <br/>";
	mysql_query("insert into dashboard_mesin (id_perangkat,mesin) values('$data2[id_perangkat]','$data2[id_kondisi]')"); 
	echo "insert into dashboard_mesin (id_perangkat,mesin) values('$data2[id_perangkat]','$data2[id_kondisi]') <br/>";
}
?>