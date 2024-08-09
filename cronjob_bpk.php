<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html>
<head>
<title>Cronjob Server BPK</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<?
echo "<meta http-equiv=refresh content=3600;URL=$_SERVER[php_self]>";
echo "<br>";
echo "Refresh selalu berjalan setiap 1 jam apapun kondisinya<br>";
echo "Pengecekan data BPK yang lebih dari 1 jam dilakukan<br>";
$server   = "101.255.89.195";
$dbusername = "gps_bpk";
$dbpassword = "Tiparcakung52";
$database = "gps_bpk";
$koneksi = mysql_connect($server,$dbusername,$dbpassword) or die("Koneksi gagal");
$db=mysql_select_db($database,$koneksi) or die ("Database tidak ditemukan");
$string_skrg    = date('Y-m-d H:i:s');
$waktu_skrg     = strtotime($string_skrg);
echo "Waktu saat ini         : ".$string_skrg."<br><br>";
$hasil=mysql_query("select SQL_NO_CACHE * from gps_data order by waktu desc limit 0,1");
$data=mysql_fetch_array($hasil);
$waktu_data    = strtotime($data[waktu]);
$waktu_selisih = $waktu_skrg - $waktu_data;
if($waktu_selisih <= 3600 and $waktu_selisih > 0)
{	
	echo "Data belum telat : $data[waktu]<br/>";
}
else if($waktu_selisih > 3600)
{
	//$to = "bintang.track@yahoo.com";
	$to = "haerulzaman@gmail.com,diamondbirdfarm@gmail.com,dhamsix@gmail.com";
	$subject = "Data sudah telat di server BPK";
	$message = "<html><body><span style=font-family:Arial;font-size:12px;>".
						 "Data di server BPK sudah telat selama 1 jam</span></body></html>";
	$headers = "From: Bintang Track Server <server@bintangtrack.com>"."\r\n".
						 "Reply-To: Bintang Track Server <server@bintangtrack.com>"."\r\n".
						 "X-Mailer: PHP/".phpversion()."\r\n".
						 "MIME-Version: 1.0"."\r\n".
						 "Content-type: text/html; charset=utf-8"."\r\n".
						 "Content-Transfer-Encoding: 8bit"."\r\n";
	mail ($to, $subject, $message, $headers); 
	echo "Data sudah telat : $data[waktu]<br>";
}
else if($waktu_selisih < 0)
{
	//$to = "bintang.track@yahoo.com";
	$to = "haerulzaman@gmail.com,diamondbirdfarm@gmail.com,dhamsix@gmail.com";
	$subject = "Data ngebut di server BPK";
	$message = "<html><body><span style=font-family:Arial;font-size:12px;>".
						 "Data di server BPK ngebut</span></body></html>";
	$headers = "From: Bintang Track Server <server@bintangtrack.com>"."\r\n".
						 "Reply-To: Bintang Track Server <server@bintangtrack.com>"."\r\n".
						 "X-Mailer: PHP/".phpversion()."\r\n".
						 "MIME-Version: 1.0"."\r\n".
						 "Content-type: text/html; charset=utf-8"."\r\n".
						 "Content-Transfer-Encoding: 8bit"."\r\n";
	mail ($to, $subject, $message, $headers); 
	echo "Data ngebut : $data[waktu]<br>";
}
?>
</body>
</html>
