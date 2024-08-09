<?
$_SESSION['userid']=$data['id_pengguna'];
$_SESSION['id_tingkat']=$data['id_tingkat'];
$hasil1=mysql_query("select SQL_NO_CACHE * from akses where id_pengguna='$data[id_pengguna]'");
$data1=mysql_fetch_array($hasil1);
if($data1['id_admin']!=NULL)
{
  $_SESSION['id_admin']=$data1['id_admin'];
}
else if($data1['id_dealer']!=NULL)
{
  $_SESSION['id_dealer']=$data1['id_dealer'];
}
else if($data1['id_grup']!=NULL)
{
  $_SESSION['id_grup']=$data1['id_grup'];
}
else if($data1['id_operator']!=NULL)
{
  $_SESSION['id_operator']=$data1['id_operator'];
}
else
{
	
}
header("location:".$site."/home.php");
?>

