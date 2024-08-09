<?
session_start();
include_once("config/function.php");
include_once("config/connection.php");

if(isset($_SESSION['userid']))
{
  header("location:".$site);
}

if(isset($_POST['masuk']))
{
  if(!empty($_POST['usr']) && !empty($_POST['pwd']))
  {
    $hasil=mysql_query("select SQL_NO_CACHE * from pengguna where username_pengguna='$_POST[usr]' and password_pengguna='$_POST[pwd]'");
    $data=mysql_fetch_array($hasil);
    if($data['username_pengguna']==$_POST['usr'] && $data['password_pengguna']==$_POST['pwd'] && $data['blokir'] !="1")
    {
      include_once("login_success.php");
    }
	else if($data['username_pengguna']==$_POST['usr'] && $data['password_pengguna']==$_POST['pwd'] && $data['blokir']=="1")
    {
		echo "<script language='javascript'>";
		echo "alert('Silahkan Lakukan Pembayaran untuk menggunakan layanan GPS tracking kembali,\\nKonfirmasi Pembayaran ke Customer Service kami di : +628111025700 atau Emai di : cs@bintangtrack.com\\n \\nPlease do your payments before using our GPS tracking service, more Information at : +628111025700 or Email at : cs@bintangtrack.com');";
		echo "window.location.href='login.php'";
		echo "</script>";
    }
    else
    {
      echo "<script language='javascript'>";
      echo "alert('Invalid Username or Password ');";
			echo "window.location.href='login.php'";
      echo "</script>";
    }
  }
  else
  {
			echo "<script language='javascript'>";
      echo "alert('Invalid Username or Password ');";
			echo "window.location.href='login.php'";
			echo "</script>";
  }
}
else
{
	include_once("login.html");
}
?>