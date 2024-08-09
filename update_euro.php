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
echo "<div id=garis_ate><div id=garis_agr><div id=garis_aki><div id=garis_aka><div id=garis_bki><div id=garis_bka>";
echo "<form name=form_update method=post action=$_SERVER[PHP_SELF]>";
echo "<div id=isi_a1>&nbsp;</div><div id=isi_a1>Kategori</div><div id=isi_a15>";
echo "<select name=update>";
$hasil3=mysql_query("select sql_no_cache * from kategori order by kategori");
while($data3=mysql_fetch_array($hasil3))
{	
	echo "<option value='$data3[kategori]'>$data3[kategori]</option>";
}
echo "</select>";
echo "<input type=submit name=lihat_kategori value=GO>";
echo "</div>";
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
$green=0;
$blue=0;
$red=0;
$no=1;
$hasil=mysql_query("select SQL_NO_CACHE * from perangkat where no_imei!='' and id_grup!='' and id_grup!=9 and id_grup!=102 and id_grup!=103 and id_grup!=76 and id_grup!=11 and id_grup!=12 and id_grup!=16 and id_grup!=18 and id_grup!=19 and id_grup!=21 and id_grup!=23 and id_grup!=29 and id_grup!=32 and id_grup!=42 and id_grup!=44 and id_grup!=45 and id_grup!=46 and id_grup!=47 and id_grup!=48 and id_grup!=49 and id_grup!=51 and id_grup!=53 and id_grup!=55 and id_grup!=62 and id_grup!=63 and id_grup!=64 and id_grup!=68 and id_grup!=69 and id_grup!=74 and id_grup!=84 and id_grup!=85 and id_grup!=95 and id_grup!=96 and id_grup!=108 and id_grup!=126 and id_grup!=128 and id_grup!=141 and id_grup!=152 and id_grup!=153 and id_grup!=171 and id_tipe=3 order by id_grup");
$jumlah=mysql_num_rows($hasil);
while($data=mysql_fetch_array($hasil))
{
	$hasil2=mysql_query("select SQL_NO_CACHE * from grup where id_grup='$data[id_grup]'");
	$data2=mysql_fetch_array($hasil2);
	$hasil3=mysql_query("select SQL_NO_CACHE * from dealer where id_dealer='$data2[id_dealer]'");
	$data3=mysql_fetch_array($hasil3);
	$hasil4=mysql_query("select SQL_NO_CACHE * from datagrup where id_perangkat='$data[id_perangkat]'");
	$data4=mysql_fetch_array($hasil4);
	$hasil5=mysql_query("select SQL_NO_CACHE * from tipe where id_tipe='$data[id_tipe]'");
	$data5=mysql_fetch_array($hasil5);
	echo "<div id=isi_a>";
	echo "<div id=isi_a1>$no&nbsp;</div>";	
	echo "<div id=isi_a8>$data[id_perangkat]&nbsp;</div>";	
	echo "<div id=isi_a10>$data[no_imei]&nbsp;</div>";	
	echo "<div id=isi_a8>$data[no_gsm]&nbsp;</div>";
	echo "<div id=isi_a16>$data2[nama_grup]&nbsp;</div>";
	echo "<div id=isi_a8>$data5[nama_tipe]&nbsp;</div>";
	$waktu_server = time();
	$waktu_data = strtotime($data4['waktu']);
	$waktu_selisih = $waktu_server - $waktu_data;
	if($waktu_selisih <= 3600)
  {    
		echo "<div id=isi_a10><div id=teks_hijau>$data4[waktu]&nbsp;</div></div>";
		$green+=1;
  }
	else if($waktu_selisih > 3600 and $waktu_selisih <= 2678400)
  {    
		echo "<div id=isi_a10><div id=teks_biru>$data4[waktu]&nbsp;</div></div>";
		$blue+=1;
  }
  else if($waktu_selisih > 2678400)
  {   
		echo "<div id=isi_a10><div id=teks_merah>$data4[waktu]&nbsp;</div></div>";
		$red+=1;
	}
	echo "<div id=isi_a12>$data[no_kendaraan]&nbsp;</div>";
	echo "<div id=isi_a20>$data[keterangan]&nbsp;</div>";
	echo "</div>";
	$no++;
}
echo "</form>";
echo "</div></div></div></div></div></div>";
echo "</div>";
$total=$green+$blue+$red;
echo "<div style='width:35%; border:1px solid #B0C4DE; height:auto; text-align:left; display:scroll;position: fixed; top:1px;right:1%; background:#99CCFF; font-size: 18px;'>";
echo "<div id=isi_a100>1 Jam : <b>$green</b>, 1 Bulan : <b>$blue</b>, Lebih 1 bulan : <b>$red</b>,Total : <b>$total</b></div>";
echo "<div id=isi_a100>Export2Excel : <a href='includes/excel_update.php'>Download</a></div>";
echo "</div>";
?>
</body>
</html>