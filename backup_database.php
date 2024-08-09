<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title>Backup database Bintang Track per 24 jam</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<? 
$server   = "localhost";
$dbusername = "admin_root";
$dbpassword = "B1nt@ng";
$database = "admin_bintang";
$koneksi = mysql_connect($server,$dbusername,$dbpassword) or die("Koneksi gagal");
$db=mysql_select_db($database,$koneksi) or die ("Database tidak ditemukan");

echo "<b>Backup database Bintang Track per 24 jam</b>";
echo "<br>";
echo "Refresh per 1 jam";
echo "<br>";
echo "<meta http-equiv=refresh content=3600;URL=$_SERVER[php_self]>";
$waktu=date('Y-m-d H:i:s');
$hari=date('D');
$jam=substr($waktu,11,2);
$tanggal=substr($waktu,8,2);
if($jam=='06')
{  
  $waktu_file_backup=date('Y-m-d H:i:s',(strtotime($waktu))-86400);
  $waktu_file_backup_nama_file=str_replace("-","",$waktu_file_backup);
  $waktu_file_backup_nama_file=substr($waktu_file_backup_nama_file,0,8);
  $waktu_file_backup_between=substr($waktu_file_backup,0,10);
  echo "Terjadi backup tabel data<br>"; 
	mysql_query("select * into outfile '/backup_db/data_".$waktu_file_backup_nama_file.".sql' from databackup where waktu between '".$waktu_file_backup_between." 00:00:00' and '".$waktu_file_backup_between." 23:59:59'");
	echo "Berhasil dibackup...</br>";
  echo "Terjadi backup tabel alarm<br>"; 
	mysql_query("select * into outfile '/backup_db/alarm_".$waktu_file_backup_nama_file.".sql' from alarm where waktu between '".$waktu_file_backup_between." 00:00:00' and '".$waktu_file_backup_between." 23:59:59'");
	echo "Berhasil dibackup...</br>";
	
	/* $waktu_file_delete=date('Y-m-d H:i:s',(strtotime($waktu))-31536000);
  echo "Terjadi delete tabel data<br>"; 
	mysql_query("delete from data where waktu<'".$waktu_file_delete."'");
	echo "Berhasil delete lebih dari 31 hari...</br>";
  echo "Terjadi delete tabel alarm<br>"; 
	mysql_query("delete from alarm where waktu<'".$waktu_file_delete."'");
	echo "Berhasil delete lebih dari 31 hari...</br>"; */
}
else if($hari=='Mon' && $jam=='00')
{
	$waktu_file_backup=date('Y-m-d H:i:s',strtotime($waktu));
  $waktu_file_backup_nama_file=str_replace("-","",$waktu_file_backup);
  $waktu_file_backup_nama_file=substr($waktu_file_backup_nama_file,0,8);
  $waktu_file_backup_between=substr($waktu_file_backup,0,10);
	echo "Terjadi backup database<br>"; 
	mysql_query("select * into outfile '/backup_db/admin_".$waktu_file_backup_nama_file.".sql' from admin");
	mysql_query("select * into outfile '/backup_db/akses_".$waktu_file_backup_nama_file.".sql' from akses");
	mysql_query("select * into outfile '/backup_db/alamat_".$waktu_file_backup_nama_file.".sql' from alamat");
	mysql_query("select * into outfile '/backup_db/batas_".$waktu_file_backup_nama_file.".sql' from batas");
	mysql_query("select * into outfile '/backup_db/berhenti_".$waktu_file_backup_nama_file.".sql' from berhenti");
	mysql_query("select * into outfile '/backup_db/datagrup_".$waktu_file_backup_nama_file.".sql' from datagrup");
	mysql_query("select * into outfile '/backup_db/dealer_".$waktu_file_backup_nama_file.".sql' from dealer");
	mysql_query("select * into outfile '/backup_db/digging_".$waktu_file_backup_nama_file.".sql' from digging");
	mysql_query("select * into outfile '/backup_db/din1".$waktu_file_backup_nama_file.".sql' from din1");
	mysql_query("select * into outfile '/backup_db/din1off".$waktu_file_backup_nama_file.".sql' from din1off");
	mysql_query("select * into outfile '/backup_db/din2".$waktu_file_backup_nama_file.".sql' from din2");
	mysql_query("select * into outfile '/backup_db/din2off".$waktu_file_backup_nama_file.".sql' from din2off");
	mysql_query("select * into outfile '/backup_db/fleet_".$waktu_file_backup_nama_file.".sql' from fleet");
	mysql_query("select * into outfile '/backup_db/foto_".$waktu_file_backup_nama_file.".sql' from foto");
	mysql_query("select * into outfile '/backup_db/fuel_".$waktu_file_backup_nama_file.".sql' from fuel");
	mysql_query("select * into outfile '/backup_db/grup_".$waktu_file_backup_nama_file.".sql' from grup");
	mysql_query("select * into outfile '/backup_db/header_".$waktu_file_backup_nama_file.".sql' from header");
	mysql_query("select * into outfile '/backup_db/jarak_".$waktu_file_backup_nama_file.".sql' from jarak");
	mysql_query("select * into outfile '/backup_db/jenis_".$waktu_file_backup_nama_file.".sql' from jenis");
	mysql_query("select * into outfile '/backup_db/kecepatan_".$waktu_file_backup_nama_file.".sql' from kecepatan");
	mysql_query("select * into outfile '/backup_db/komunikasi_".$waktu_file_backup_nama_file.".sql' from komunikasi");
	mysql_query("select * into outfile '/backup_db/kondisi_".$waktu_file_backup_nama_file.".sql' from kondisi");
	mysql_query("select * into outfile '/backup_db/menu_".$waktu_file_backup_nama_file.".sql' from menu");
	mysql_query("select * into outfile '/backup_db/mesin_".$waktu_file_backup_nama_file.".sql' from mesin");
	mysql_query("select * into outfile '/backup_db/mesinoff_".$waktu_file_backup_nama_file.".sql' from mesinoff");
	mysql_query("select * into outfile '/backup_db/modul_".$waktu_file_backup_nama_file.".sql' from modul");
	mysql_query("select * into outfile '/backup_db/pengguna_".$waktu_file_backup_nama_file.".sql' from pengguna");
	mysql_query("select * into outfile '/backup_db/perangkat_".$waktu_file_backup_nama_file.".sql' from perangkat");
	mysql_query("select * into outfile '/backup_db/pesan_".$waktu_file_backup_nama_file.".sql' from pesan");
	mysql_query("select * into outfile '/backup_db/point_".$waktu_file_backup_nama_file.".sql' from point");
	mysql_query("select * into outfile '/backup_db/rute_".$waktu_file_backup_nama_file.".sql' from rute");
	mysql_query("select * into outfile '/backup_db/supir_".$waktu_file_backup_nama_file.".sql' from supir");
	mysql_query("select * into outfile '/backup_db/temp_".$waktu_file_backup_nama_file.".sql' from temp");
	mysql_query("select * into outfile '/backup_db/tingkat_".$waktu_file_backup_nama_file.".sql' from tingkat");
	mysql_query("select * into outfile '/backup_db/tipe_".$waktu_file_backup_nama_file.".sql' from tipe");
	mysql_query("select * into outfile '/backup_db/tugas_".$waktu_file_backup_nama_file.".sql' from tugas");
	mysql_query("select * into outfile '/backup_db/wilayah_".$waktu_file_backup_nama_file.".sql' from wilayah");
	echo "Berhasil dibackup...</br>";
}
else
{
  echo "Tidak terjadi backup database";
}
?>
</body>
</html>
