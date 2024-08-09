<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">  
<html>
<head>
<title>Cronjob Server Ngebut</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<?
echo "<meta http-equiv=refresh content=300;URL=$_SERVER[php_self]>";
echo "<br>";
echo "Refresh selalu berjalan setiap 5 menit apapun kondisinya<br>";
echo "Pengecekan data ngebut yang lebih dari 5 menit dilakukan<br><br>";
$server   = "localhost";
$dbusername = "admin_root";
$dbpassword = "L34d1ng***123";
$database = "admin_bintang";
$koneksi = mysql_connect($server,$dbusername,$dbpassword) or die("Koneksi gagal");
$db=mysql_select_db($database,$koneksi) or die ("Database tidak ditemukan");
$string_skrg    = date('Y-m-d H:i:s');
$waktu_skrg     = strtotime($string_skrg);
$waktu_batas    = 10800;
$waktu_temp		  = $waktu_skrg + $waktu_batas;
$waktu_nanti		= strftime('%Y-%m-%d %H:%M:%S', $waktu_temp);
echo "Batas waktu            : ".$waktu_batas." detik<br>";
echo "Waktu saat ini         : ".$string_skrg."<br>";
echo "Waktu nanti		         : ".$waktu_nanti."<br><br>";
$hasil=mysql_query("select SQL_NO_CACHE * from data where waktu > '$waktu_nanti'");
$jumlah=mysql_num_rows($hasil);
echo "Jumlah data ngebut     : ".$jumlah."<br><br>";
if($jumlah > 0)
{
	$to = "haerulzaman@gmail.com";
	$subject = "Terdapat $jumlah data ngebut";
	$message = "<html><body><span style=font-family:Arial;font-size:12px;>".
						 "Terdapat $jumlah data ngebut</span></body></html>";
	$headers = "From: Bintang Track Server <server@bintangtrack.com>"."\r\n".
						 "Reply-To: Bintang Track Server <server@bintangtrack.com>"."\r\n".
						 "X-Mailer: PHP/".phpversion()."\r\n".
						 "MIME-Version: 1.0"."\r\n".
						 "Content-type: text/html; charset=utf-8"."\r\n".
						 "Content-Transfer-Encoding: 8bit"."\r\n";
	mail ($to, $subject, $message, $headers);
	echo "Terdapat $jumlah data ngebut<br>";
}
else
{
}
?>
</body>
</html>