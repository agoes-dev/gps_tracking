<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html>
<head>
<title>Cronjob Server All</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<?
echo "<meta http-equiv=refresh content=3600;URL=$_SERVER[php_self]>";
echo "<br>";
echo "Refresh selalu berjalan setiap 1 jam apapun kondisinya<br>";
echo "Pengecekan data semua tipe yang lebih dari 1 jam dilakukan<br>";
$server   = "localhost";
$dbusername = "admin_root";
$dbpassword = "B1nt@ng";
$database = "admin_bintang";
$koneksi = mysql_connect($server,$dbusername,$dbpassword) or die("Koneksi gagal");
$db=mysql_select_db($database,$koneksi) or die ("Database tidak ditemukan");
$string_skrg    = date('Y-m-d H:i:s');
$waktu_skrg     = strtotime($string_skrg);
$waktu_batas    = 3600;
echo "Batas waktu            : ".$waktu_batas." detik<br>";
echo "Waktu saat ini         : ".$string_skrg."<br><br>";
$hasil=mysql_query("select SQL_NO_CACHE * from datagrup");
while($data=mysql_fetch_array($hasil))
{
  $hasil2=mysql_query("select SQL_NO_CACHE * from perangkat where id_perangkat='$data[id_perangkat]'");
  $data2=mysql_fetch_array($hasil2);
  $waktu_data    = strtotime($data[waktu]);
  $waktu_selisih = $waktu_skrg - $waktu_data;
  if($waktu_selisih <= $waktu_batas)
  {
    switch($data2['id_tipe'])
    {
      case 1:
				$x1=$data['waktu'];//Small
				break;
      case 2:
				$x2=$data['waktu'];//Compact
				break;	
      case 3:
				$x3=$data['waktu'];//Euro
				break;
      case 6:
				$x6=$data['waktu'];//Smallcom
				break;
      case 16:
				$x16=$data['waktu'];//Rupa2
				break;
    }		
  }
  else
  {
  }
}
if(!empty($x1))//Small Leo
{
	echo "Port 2001 : $x1 (Small)<br/>";
}
else
{
	$to = "haerulzaman@gmail.com";
	$subject = "Port 2001 Small Sudah diatas batas";
	$message = "<html><body><span style=font-family:Arial;font-size:12px;>".
						 "Port 2001 Small Sudah diatas batas</span></body></html>";
	$headers = "From: Bintang Track Server <server@bintangtrack.com>"."\r\n".
						 "Reply-To: Bintang Track Server <server@bintangtrack.com>"."\r\n".
						 "X-Mailer: PHP/".phpversion()."\r\n".
						 "MIME-Version: 1.0"."\r\n".
						 "Content-type: text/html; charset=utf-8"."\r\n".
						 "Content-Transfer-Encoding: 8bit"."\r\n";
	mail ($to, $subject, $message, $headers);
	echo "Port 2001 : Sudah diatas batas (Small leo)<br>";
}
if(!empty($x2))//Blueberry
{
	echo "Port 2002 : $x2 (Blueberry)<br/>";
}
else
{
	$to = "haerulzaman@gmail.com";
	$subject = "Port 2002 Blueberry Sudah diatas batas";
	$message = "<html><body><span style=font-family:Arial;font-size:12px;>".
						 "Port 2002 Blueberry Sudah diatas batas</span></body></html>";
	$headers = "From: Bintang Track Server <server@bintangtrack.com>"."\r\n".
						 "Reply-To: Bintang Track Server <server@bintangtrack.com>"."\r\n".
						 "X-Mailer: PHP/".phpversion()."\r\n".
						 "MIME-Version: 1.0"."\r\n".
						 "Content-type: text/html; charset=utf-8"."\r\n".
						 "Content-Transfer-Encoding: 8bit"."\r\n";
	mail ($to, $subject, $message, $headers);
	echo "Port 2002 : Sudah diatas batas (Blueberry)<br>";
}
if(!empty($x6))//TRG
{
	echo "Port 2004 : $x6 (TRG)<br/>";	
}
else
{
	$to = "haerulzaman@gmail.com";
	$subject = "Port 2004 TRG Sudah diatas batas";
	$message = "<html><body><span style=font-family:Arial;font-size:12px;>".
						 "Port 2004 TRG Sudah diatas batas</span></body></html>";
	$headers = "From: Bintang Track Server <server@bintangtrack.com>"."\r\n".
						 "Reply-To: Bintang Track Server <server@bintangtrack.com>"."\r\n".
						 "X-Mailer: PHP/".phpversion()."\r\n".
						 "MIME-Version: 1.0"."\r\n".
						 "Content-type: text/html; charset=utf-8"."\r\n".
						 "Content-Transfer-Encoding: 8bit"."\r\n";
	mail ($to, $subject, $message, $headers);
	echo "Port 2004 : Sudah diatas batas (TRG)<br>";
}
if(!empty($x3))//Euro
{
	echo "Port 2005 : $x3 (Euro)<br/>";	
}
else
{
	$to = "haerulzaman@gmail.com";
	$subject = "Port 2005 Euro Sudah diatas batas";
	$message = "<html><body><span style=font-family:Arial;font-size:12px;>".
						 "Port 2005 Euro Sudah diatas batas</span></body></html>";
	$headers = "From: Bintang Track Server <server@bintangtrack.com>"."\r\n".
						 "Reply-To: Bintang Track Server <server@bintangtrack.com>"."\r\n".
						 "X-Mailer: PHP/".phpversion()."\r\n".
						 "MIME-Version: 1.0"."\r\n".
						 "Content-type: text/html; charset=utf-8"."\r\n".
						 "Content-Transfer-Encoding: 8bit"."\r\n";
	mail ($to, $subject, $message, $headers); 
	echo "Port 2005 : Sudah diatas batas (Euro)<br>";
}
if(!empty($x16))//Rupa2
{
	echo "Port 2000 : $x16 (Rupa2)<br/>";
}
else
{
	$to = "haerulzaman@gmail.com";
	$subject = "Port 2000 Sudah diatas batas";
	$message = "<html><body><span style=font-family:Arial;font-size:12px;>".
						 "Port 2000 Sudah diatas batas</span></body></html>";
	$headers = "From: Bintang Track Server <server@bintangtrack.com>"."\r\n".
						 "Reply-To: Bintang Track Server <server@bintangtrack.com>"."\r\n".
						 "X-Mailer: PHP/".phpversion()."\r\n".
						 "MIME-Version: 1.0"."\r\n".
						 "Content-type: text/html; charset=utf-8"."\r\n".
						 "Content-Transfer-Encoding: 8bit"."\r\n";
	mail ($to, $subject, $message, $headers); 
	echo "Port 2000 : Sudah diatas batas (Rupa2)<br>";
}
?>
</body>
</html>
