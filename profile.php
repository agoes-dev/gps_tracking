<?php 
session_start();
include_once("config/function.php");
include_once("config/connection.php");
include_once("config/control.php");
$_SESSION['id_menu']="7";

if(isset($_SESSION['userid']))
{
	if($_SESSION['id_tingkat'] >= 2){
		include_once("config/top.php");
		include_once("includes/head.php");
		echo "<DIV class='ui-layout-west hidden'>";
			include_once("includes/module.php");	
		echo "</DIV>";
		echo "<DIV class='ui-layout-center hidden' id=inner>";
		include_once("includes/setting_user.php");
		echo "</DIV></BODY></HTML>";
	}
	else{
		if(!isset($_POST['id_modul'])){	$id_modul=44; }
		else{	$id_modul=$_POST['id_modul'];	}
		if($id_modul==44)
		{
			include_once("config/top.php");
			include_once("includes/head.php");
			echo "<DIV class='ui-layout-west hidden'>";
				include_once("includes/module.php");	
			echo "</DIV>";
			echo "<DIV class='ui-layout-center hidden' id=inner>";
			include_once("includes/setting_user.php");
			echo "</DIV></BODY></HTML>";
		}
		else if($id_modul==45)
		{
			include_once("config/top.php");
			include_once("includes/head.php");
			echo "<DIV class='ui-layout-west hidden'>";
				include_once("includes/module.php");
			echo "</DIV>";
			echo "<DIV class='ui-layout-center hidden' id=inner>";
			include_once("includes/setting_rlimiter.php");
			echo "</DIV></BODY></HTML>";
		}
		else if($id_modul==46)
		{
			include_once("config/top.php");
			include_once("includes/head.php");
			echo "<DIV class='ui-layout-west hidden'>";
				include_once("includes/module.php");	
			echo "</DIV>";
			echo "<DIV class='ui-layout-center hidden' id=inner>";
			include_once("includes/setting_privilige.php");
			echo "</DIV></BODY></HTML>";
		}
	}
}
else
{
  header("location:".$site."/login.php");
}
?>