<?php 
session_start();
include_once("config/function.php");
include_once("config/connection.php");
include_once("config/control.php");
$_SESSION['id_menu']="6";

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
			//CENTER
			include_once("includes/monitor_vehicle.php");

			//EAST
			
			if($data_tingkat['id_tingkat']==1 || $data_tingkat['id_tingkat']==2)
			{
				echo "<DIV class=ui-layout-east>";
					include_once("includes/location.php");
				echo "</DIV>";
			}

			//SOUTH
			include_once("includes/alarm_vehicle.php");
		echo "</DIV></BODY></HTML>";
	}
}
else
{
  header("location:".$site."/login.php");
}
?>