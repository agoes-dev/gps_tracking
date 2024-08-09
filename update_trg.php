<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html>
<head>
<title>Daftar Update Perangkat GPS</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="./includes/track.css" rel="stylesheet" type="text/css">
</head>
<body>
<? 
ini_set("include_path", "./includes"); 
$server   = "localhost";
$dbusername = "admin_root";
$dbpassword = "B1nt@ng";
$database = "admin_bintang";
$koneksi = mysql_connect($server,$dbusername,$dbpassword) or die("Koneksi gagal");
$db=mysql_select_db($database,$koneksi) or die ("Database tidak ditemukan");
$hasil=mysql_query("select SQL_NO_CACHE * from perangkat where id_tipe=6");
$jumlah=mysql_num_rows($hasil);
$hasil6=mysql_query("select SQL_NO_CACHE * from perangkat where keterangan='2004'");
$jumlah6=mysql_num_rows($hasil6);
$hasil7=mysql_query("select SQL_NO_CACHE * from perangkat where keterangan='2006'");
$jumlah7=mysql_num_rows($hasil7);
$hasil8=mysql_query("select SQL_NO_CACHE * from perangkat where keterangan='2007'");
$jumlah8=mysql_num_rows($hasil8);
echo "Jumlah Perangkat GPS TRG : <b>$jumlah</b>, Port 2004 : <b>$jumlah6</b>, Port 2006 : <b>$jumlah7</b>, Port 2007 : <b>$jumlah8</b>";
echo "<div id=garis_ate><div id=garis_agr><div id=garis_aki><div id=garis_aka><div id=garis_bki><div id=garis_bka>";
echo "<div id=isi_dak>";
echo "<div id=isi_a>";
echo "<b>";
echo "<div id=isi_a1>NO</div>";
echo "<div id=isi_a8>ID</div>";
echo "<div id=isi_a10>NO IMEI</div>";
echo "<div id=isi_a8>NO GSM</div>";
echo "<div id=isi_a16>NAMA GRUP</div>";
echo "<div id=isi_a8>NAMA TIPE</div>";
echo "<div id=isi_a10>WAKTU UPDATE</div>";
echo "<div id=isi_a12>NO KENDARAAN</div>";
echo "<div id=isi_a20>KETERANGAN</div>";
echo "</b>";
echo "</div>";
$no=1;
$hasil1=mysql_query("select SQL_NO_CACHE * from perangkat where id_tipe=6 order by id_grup");
while($data1=mysql_fetch_array($hasil1))
{
	$hasil2=mysql_query("select SQL_NO_CACHE * from grup where id_grup='$data1[id_grup]'");
	$data2=mysql_fetch_array($hasil2);
	$hasil3=mysql_query("select SQL_NO_CACHE * from dealer where id_dealer='$data2[id_dealer]'");
	$data3=mysql_fetch_array($hasil3);
	$hasil4=mysql_query("select SQL_NO_CACHE * from datagrup where id_perangkat='$data1[id_perangkat]'");
	$data4=mysql_fetch_array($hasil4);
	$hasil5=mysql_query("select SQL_NO_CACHE * from tipe where id_tipe='$data1[id_tipe]'");
	$data5=mysql_fetch_array($hasil5);
	echo "<div id=isi_a>";
	echo "<div id=isi_a1>$no&nbsp;</div>";	
	echo "<div id=isi_a8>$data1[id_perangkat]&nbsp;</div>";	
	echo "<div id=isi_a10>$data1[no_imei]&nbsp;</div>";	
	echo "<div id=isi_a8>$data1[no_gsm]&nbsp;</div>";
	echo "<div id=isi_a16>$data2[nama_grup]&nbsp;</div>";
	echo "<div id=isi_a8>$data5[nama_tipe]&nbsp;</div>";
	$waktu_server = time();
	$waktu_data = strtotime($data4['waktu']);
	$waktu_selisih = $waktu_server - $waktu_data;
	if($waktu_selisih < 86400)
  {    
		echo "<div id=isi_a10><div id=teks_hijau>$data4[waktu]&nbsp;</div></div>";
  }
  else
  {   
		echo "<div id=isi_a10><div id=teks_merah>$data4[waktu]&nbsp;</div></div>";
  }
	echo "<div id=isi_a12>$data1[no_kendaraan]&nbsp;</div>";
	echo "<div id=isi_a20>$data1[keterangan]&nbsp;</div>";
	echo "</div>";
	$no++;
}
echo "</div></div></div></div></div></div>";
echo "</div>";
?>
</body>
</html>