<? 
$hp_grup=081318013337;
$pesan_keluar='Tes SMS Laporan Mingguan Penjualan - Bintang Track';
file("http://localhost:13131/cgi-bin/sendsms?username=tester&password=password&to=".$hp_grup."&text=".$pesan_keluar);
?>