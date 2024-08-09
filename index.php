<?
session_start();
include_once("config/function.php");
if(isset($_SESSION['userid']))
{
  header("location:".$site."/monitor.php");
}
else
{
  header("location:".$site."/login.php");
}

?>