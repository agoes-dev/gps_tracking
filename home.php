<?php 
session_start();
include_once("config/function.php");
include_once("config/connection.php");
include_once("config/control.php");
$_SESSION['id_menu']="1";

if(isset($_SESSION['userid']))
{
		include_once("config/top.php");
		
		//NORTH PANE
		include_once("includes/head.php");
		
		//WEST PANE
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
		
		//INNER PANE
		echo "<DIV class='ui-layout-center hidden' id=inner>";		
			echo "<DIV class=ui-layout-center>";
			// include_once("includes/front.php");			
			//include_once("includes/front3.php");
			
			if($_SESSION['id_tingkat']<2){		
				include_once("includes/front3_.php");			
			}else{
				include_once("includes/front3.php");	
			}	
			echo "</div>";
		echo "</DIV></BODY></HTML>";
}
else
{
  header("location:".$site."/login.php");
}
?>