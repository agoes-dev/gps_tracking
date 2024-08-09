<?php 
session_start();
include_once("config/function.php");
include_once("config/connection.php");
include_once("config/control.php");
$_SESSION['id_menu']="8";

if(isset($_SESSION['userid']))
{
	if(!isset($_POST['id_modul'])){	$id_modul=1; }
	else{	$id_modul=$_POST['id_modul'];	}
	
	if($id_modul==1)
  {
		include_once("config/top.php");
		
		//NORTH PANE
		include_once("includes/head.php");
		
		//WEST PANE
		echo "<DIV class='ui-layout-west hidden'>";
			include_once("includes/module.php");	
		echo "</DIV>";
		
		//INNER PANE
		echo "<DIV class='ui-layout-center hidden' id=inner>";
			echo "<DIV class=ui-layout-center>";
			include_once("includes/inbox.php");	
			echo "</div>";
		echo "</DIV></BODY></HTML>";
	}
}
else
{
  header("location:".$site."/login.php");
}
?>