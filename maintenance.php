<?php 
session_start();
include_once("config/function.php");
include_once("config/connection.php");
include_once("config/control.php");
$_SESSION['id_menu']="4";

if(isset($_SESSION['userid']))
{
	// if(!isset($_POST['id_modul'])){	$id_modul=1; }
	// else{	$id_modul=$_POST['id_modul'];	}
	
	// if($id_modul==1)
	// {
		include_once("config/top.php");
		include_once("includes/head.php");
		echo "<DIV class='ui-layout-west hidden'>";
			include_once("includes/module.php");	
			if($_SESSION['id_tingkat']<2)
			{
				// echo "<div id=accordion1 class=basic>";
				include_once("includes/select_dealer.php");
				// echo "</div>";
			}
			if($_SESSION['id_tingkat']<3)
			{
				include_once("includes/select_grup.php");
			}
		echo "</DIV>";
		echo "<DIV class='ui-layout-center hidden' id=inner>";
		include_once("includes/report_fleet.php");
		echo "</DIV></BODY></HTML>";
	// }
}
else
{
  header("location:".$site."/login.php");
}
?>