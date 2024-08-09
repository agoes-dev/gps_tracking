<?  
$server   = "localhost";
$dbpassword = "B1nt@ng";
$dbusername = "admin_root";
$database = "admin_bintang";
$koneksi = mysql_connect($server,$dbusername,$dbpassword) or die("Koneksi gagal");

mysql_select_db($database,$koneksi) or die ("Database tidak ditemukan");
$hasil=mysql_query("select SQL_NO_CACHE * from perangkat where no_kendaraan='$_GET[pesan]'");
$jumlah=mysql_num_rows($hasil);
if($jumlah > 0)
{
	$data=mysql_fetch_array($hasil);
	$hasil1=mysql_query("select SQL_NO_CACHE * from data where id_perangkat='$data[id_perangkat]' order by waktu desc limit 0,1");
	$data1=mysql_fetch_array($hasil1);  
	$lat_1=explode('.',$data1['lat']);
	$lng_1=explode('.',$data1['lng']);
	$lat_sub_1=substr($lat_1[1],0,3);
	$lng_sub_1=substr($lng_1[1],0,3);
	$lat1=$lat_1[0].".".$lat_sub_1;
	$lng1=$lng_1[0].".".$lng_sub_1;
	$latlng=substr($data1['lat'],0,6)."_".substr($data1['lng'],0,7);
	$url="http://bintangtrack.com/m/peta.php?latlng=".$latlng;
	if(!empty($data1['alamat']))
	{
		$pesan_keluar= strtr($data['no_kendaraan'],' ','+').",+".strtr($data1['waktu'],' ','+').",+".strtr($data1['alamat'],' ','+').",+".$url;
	}
	else
	{
		$hasil3=mysql_query("select SQL_NO_CACHE * from alamat where lat=$lat1 and lng=$lng1 order by id_alamat");
		$data3 = mysql_fetch_array($hasil3);
		$alamat1 = $data3['alamat'];
		$alamat1 = str_replace(', Daerah Khusus Ibukota Jakarta','',$data3['alamat']);
		$xml = simplexml_load_file("http://maps.googleapis.com/maps/api/geocode/xml?latlng=".$lat1.",".$lng1."&language=id&sensor=false");
		$alamat_google=$xml->result->formatted_address;
		$alamat_google=str_replace(', Daerah Khusus Ibukota Jakarta','',$alamat_google);
		if(!empty($alamat1))
		{
			$pesan_keluar= strtr($data1['waktu'],' ','+').",+".strtr($alamat1,' ','+').",+".$url;
		}
		else if(!empty($alamat_google))
		{
			$pesan_keluar= strtr($data1['waktu'],' ','+').",+".strtr($alamat_google,' ','+').",+".$url;
		}
		else
		{
			$error_google = "Google server not response";
			$pesan_keluar = strtr($data1['waktu'],' ','+').",+".strtr($error_google,' ','+');
		}
	}	
}
else
{
	$error_data = "Nomor kendaraan tidak ditemukan";
	$pesan_keluar = strtr($_GET['pesan'],' ','+').",+".strtr($error_data,' ','+');
}
$waktu_pesan = date('Y-m-d H:i:s');
$pesan_keluar_normal = strtr($pesan_keluar,'+',' ');
$no_pengirim = str_replace('+','%2B',$_GET['pengirim']);
mysql_query("insert into pesan (pengirim,pesan_masuk,waktu_pesan,pesan_keluar) values ('$_GET[pengirim]','$_GET[pesan]','$waktu_pesan','$pesan_keluar_normal')");
file("http://localhost:13131/cgi-bin/sendsms?username=tester&password=password&to=".$no_pengirim."&text=".$pesan_keluar);
?>

