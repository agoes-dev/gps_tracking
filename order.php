<?php 
session_start();
include_once("config/function.php");
include_once("config/connection.php");
include_once("config/control.php");
$_SESSION['id_menu']="5";

if(isset($_SESSION['userid']))
{
	if(!isset($_POST['id_modul'])){	$id_modul=61; }
	else{	$id_modul=$_POST['id_modul'];	}
	
	if($id_modul==61)
	{
		include_once("config/top.php");
		include_once("includes/head.php");

		echo "<DIV class='ui-layout-west hidden'>";
		include_once("includes/module.php");
				echo "<div id=accordion1 class=basic>";
		echo "</DIV>";
		echo "</DIV>";
		echo "<DIV class='ui-layout-center hidden' id=inner>";
			include_once("includes/jo_request_status.php");
		echo "</DIV></BODY></HTML>";
	}
	else if($id_modul==62)
	{
		include_once("config/top.php");
		include_once("includes/head.php");

		echo "<DIV class='ui-layout-west hidden'>";
		include_once("includes/module.php");
				echo "<div id=accordion1 class=basic>";
		echo "</DIV>";
		echo "</DIV>";
		echo "<DIV class='ui-layout-center hidden' id=inner>";
			include_once("includes/add_joborder.php");
		echo "</DIV></BODY></HTML>";
	}
}
else
{
  header("location:".$site."/login.php");
}
?>