<?php
session_start();
include_once("config/function.php");
include_once("config/connection.php");
include_once("config/control.php");
$_SESSION['id_menu']="2";

if(isset($_SESSION['userid']))
{
	if(!isset($_POST['id_modul'])){	
		$id_modul=1;
	}
	else{
		$id_modul=$_POST['id_modul'];
	}

	if($id_modul==1)
	{
		include_once("config/top.php");
		
		//NORTH PANE
		include_once("includes/head.php");
		
		//WEST PANE
		echo "<DIV class='ui-layout-west hidden'>";
		include_once("includes/module.php");
		
			// echo "<div id=accordion1 class=basic>";
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
			include_once("includes/select_vehicle.php");
			
			$q_tingkat=mysql_query("select id_tingkat from pengguna where id_pengguna='$_SESSION[userid]'");
			$data_tingkat=mysql_fetch_array($q_tingkat);
			// if($data_tingkat['id_tingkat']==3 || $data_tingkat['id_tingkat']==4 || $data_tingkat['id_tingkat']==5)
			// {
				// echo "<hr>";
				include_once("includes/location.php");
				
			// }
			echo "</div>";
			// echo "</div>";
			
		echo "</DIV>";
		
		
		//INNER PANE
		echo "<DIV class='ui-layout-center hidden' id=inner>";
			//CENTER
			include_once("includes/monitor_vehicle.php");

			//EAST
			
			// if($data_tingkat['id_tingkat']==1 || $data_tingkat['id_tingkat']==2)
			// {
				// echo "<DIV class=ui-layout-east>";
					// include_once("includes/location.php");
				// echo "</DIV>";
			// }

			//SOUTH
			// include_once("includes/alarm_vehicle.php");
		echo "</DIV></BODY></HTML>";
	}
	else if($id_modul==2)
	{
		include_once("config/top.php");
		include_once("includes/head.php");
		echo "<DIV class='ui-layout-west hidden'>";
		include_once("includes/module.php");
			echo "<div id=accordion1 class=basic>";
		if($_SESSION['id_tingkat']<2)
		{
			include_once("includes/select_dealer.php");
		}
		if($_SESSION['id_tingkat']<3)
		{
			include_once("includes/select_grup.php");
		}
		else{
			echo "";
			echo "";
			echo "";
		}
		echo "</DIV>";
		echo "</DIV>";
		include_once("includes/status_grup.php");
		echo "<DIV class='ui-layout-center hidden' id=inner>";
			include_once("includes/monitor_grup.php");
		echo "</DIV></BODY></HTML>";

	}
	else if($id_modul==27)
	{
		include_once("config/top.php");
		include_once("includes/head.php");
		echo "<DIV class='ui-layout-west hidden'>";
		include_once("includes/module.php");
			echo "<div id=accordion1 class=basic>";
			if($_SESSION['id_tingkat']<2)
			{
				include_once("includes/select_dealer.php");
			}
			if($_SESSION['id_tingkat']<3)
			{
				include_once("includes/select_grup.php");
			}
			/* else{
				echo "";

				echo "";

				echo "";
			} */
			echo "</div>";
		echo "</DIV>";
			include_once("includes/summary.php");
		echo "</BODY></HTML>";
	}
	else if($id_modul==51)
	{
		include_once("config/top.php");
		include_once("includes/head.php");
		echo "<DIV class='ui-layout-west hidden'>";
		include_once("includes/module.php");
		if($_SESSION['id_tingkat']<2)
		{
			include_once("includes/select_dealer.php");
		}
		if($_SESSION['id_tingkat']<3)
		{
			include_once("includes/select_grup.php");
		}
		include_once("includes/select_vehicle_banyak.php");
		echo "</DIV>";
		
		include_once("includes/monitor_vehicle_multiple.php");
		echo "</BODY></HTML>";
	}
}
else
{
	header("location:".$site."/login.php");
}
?>