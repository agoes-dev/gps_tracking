<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html>
<head>
<title>Cronjob Server KPA</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<?
echo "<meta http-equiv=refresh content=3600;URL=$_SERVER[php_self]>";
echo "<br>";
echo "Refresh selalu berjalan setiap 1 jam apapun kondisinya<br>";
echo "Pengecekan data KPA yang lebih dari 1 jam dilakukan<br>";
/* $server   = "etrakz.kpa.web.id";
$dbusername = "bintangtrack";
$dbpassword = "bintangtrack123";
$database = "etrakz_kpa";
 */
$server   = "localhost";
$dbusername = "admin_root";
$dbpassword = "B1nt@ng";
$database = "admin_bintang";
$koneksi = mysql_connect($server,$dbusername,$dbpassword) or die("Koneksi gagal");
$db=mysql_select_db($database,$koneksi) or die ("Database tidak ditemukan");
$string_skrg    = date('Y-m-d H:i:s');
$waktu_skrg     = strtotime($string_skrg);
echo "Waktu saat ini         : ".$string_skrg."<br><br>";
$hasil2=mysql_query("select SQL_NO_CACHE * from perangkat where id_grup=78 or id_grup=115 or id_grup=139 or id_grup=145 order by no_kendaraan");
while($data2=mysql_fetch_array($hasil2))
{
	$hasil=mysql_query("select SQL_NO_CACHE * from datagrup where id_perangkat='$data2[id_perangkat]'");
	$data=mysql_fetch_array($hasil);
	$waktu_data    = strtotime($data['waktu']);
	$waktu_selisih = $waktu_skrg - $waktu_data;
	if($waktu_selisih <= 3600 and $waktu_selisih > 0)
	{	
		echo "Data normal : $data2[no_kendaraan] - $data[waktu] - $waktu_selisih<br/>";
	}
	else if($waktu_selisih > 3600)
	{
		echo "Data telat : $data2[no_kendaraan] - $data[waktu] - $waktu_selisih<br>";
		/* $to = "haerulzaman@yahoo.com";
		//$to = "haerulzaman@gmail.com,diamondbirdfarm@gmail.com,dhamsix@gmail.com";
		$subject = "Data ".$data2['no_kendaraan']." sudah telat";
		$message = "<html><body><span style=font-family:Arial;font-size:12px;>".
							 "Data ".$data2['no_kendaraan']." sudah telat lebih dari 1 jam</span></body></html>";
		$headers = "From: Bintang Track Server <server@bintangtrack.com>"."\r\n".
							 "Reply-To: Bintang Track Server <server@bintangtrack.com>"."\r\n".
							 "X-Mailer: PHP/".phpversion()."\r\n".
							 "MIME-Version: 1.0"."\r\n".
							 "Content-type: text/html; charset=utf-8"."\r\n".
							 "Content-Transfer-Encoding: 8bit"."\r\n";
		mail ($to, $subject, $message, $headers);  */
	}
}
?>
</body>
</html>