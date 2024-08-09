<?
session_start();
include_once("config/function.php");
include_once("config/connection.php");
include_once("config/control.php");
$_SESSION['id_menu']="6";

if(isset($_SESSION['userid']))
{
	if(!isset($_POST['id_modul'])){	$id_modul=7; }
	else{	$id_modul=$_POST['id_modul'];	}
	if($id_modul==7)
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
			include_once("includes/select_vehicle.php");
			echo "</div>";
		echo "</DIV>";
		echo "<DIV class='ui-layout-center hidden' id=inner style='padding:0px !important;'>";
			include_once("includes/control_area.php");
		echo "</DIV></BODY></HTML>";
	}
	else if($id_modul==8)
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
		include_once("includes/select_vehicle.php");
		echo "</DIV>";
		echo "</DIV>";
		echo "<DIV class='ui-layout-center hidden' id=inner style='padding:0px !important;'>";
			include_once("includes/control_rute.php");
		echo "</DIV></BODY></HTML>";
	}
	else if($id_modul==9)
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
		echo "</DIV>";
		echo "</DIV>";
		echo "<DIV class='ui-layout-center hidden' id=inner>";
		include_once("includes/control_idle.php");
		echo "</DIV></BODY></HTML>";
	}
	else if($id_modul==10)
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
		echo "</DIV>";
		echo "</DIV>";
		echo "<DIV class='ui-layout-center hidden' id=inner>";
			include_once("includes/control_speed.php");
		echo "</DIV></BODY></HTML>";
	}
	else if($id_modul==11)
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
		echo "</DIV>";
		echo "</DIV>";
		echo "<DIV class='ui-layout-center hidden' id=inner>";
		include_once("includes/control_fuel.php");
		echo "</DIV></BODY></HTML>";
	}
	else if($id_modul==12)
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
		echo "</DIV>";
		echo "</DIV>";
		echo "<DIV class='ui-layout-center hidden' id=inner>";
		include_once("includes/control_fleet.php");
		echo "</DIV></BODY></HTML>";

	}
	else if($id_modul==24)
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
			include_once("includes/select_vehicle.php");
			echo "</DIV>";
			echo "</DIV>";
			echo "<DIV class='ui-layout-center hidden' id=inner>";
			include_once("includes/control_poi.php");
			echo "</DIV></BODY></HTML>";
	}
	else if($id_modul==19)
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
		echo "</DIV>";
		echo "</DIV>";
		echo "<DIV class='ui-layout-center hidden' id=inner>";
			include_once("includes/control_alert.php");
		echo "</DIV></BODY></HTML>";
	}
	else if($id_modul==22)
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
		echo "</DIV>";
		echo "</DIV>";
		echo "<DIV class='ui-layout-center hidden' id=inner>";
			include_once("includes/c_alertemail.php");
		echo "</DIV></BODY></HTML>";
	}
	else if($id_modul==28)
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
		echo "</DIV>";
		echo "</DIV>";
		echo "<DIV class='ui-layout-center hidden' id=inner>";
		include_once("includes/control_odometer.php");
		echo "</DIV></BODY></HTML>";
	}
	else if($id_modul==29)
	{
		include_once("config/top.php");
		include_once("includes/head.php");
		echo "<DIV class='ui-layout-west hidden'>";
		include_once("includes/module.php");
				echo "<div id=accord2ion1 class=basic>";
		if($_SESSION['id_tingkat']<2)
		{
		include_once("includes/select_dealer.php");
		}
		if($_SESSION['id_tingkat']<3)
		{
		include_once("includes/select_grup.php");
		}
		echo "</DIV>";
		echo "</DIV>";
		echo "<DIV class='ui-layout-center hidden' id=inner>";
		include_once("includes/control_driver.php");
		echo "</DIV></BODY></HTML>";
	}
	else if($id_modul==30)
	{
		include_once("config/top.php");
		include_once("includes/head.php");
		echo "<DIV class='ui-layout-west hidden'>";
		include_once("includes/module.php");
				echo "<div id=accord2ion1 class=basic>";
		if($_SESSION['id_tingkat']<2)
		{
			include_once("includes/select_dealer.php");
		}
		if($_SESSION['id_tingkat']<3)
		{
			include_once("includes/select_grup.php");
		}
		echo "</DIV>";
		echo "</DIV>";
		echo "<DIV class='ui-layout-center hidden' id=inner>";
		include_once("includes/control_io.php");
		echo "</DIV></BODY></HTML>";
	}
	else if($id_modul==39)
	{
		include_once("config/top.php");
		include_once("includes/head.php");
		echo "<DIV class='ui-layout-west hidden'>";
		include_once("includes/module.php");
				echo "<div id=accord2ion1 class=basic>";
		if($_SESSION['id_tingkat']<2)
		{
			include_once("includes/select_dealer.php");
		}
		if($_SESSION['id_tingkat']<3)
		{
			include_once("includes/select_grup.php");
		}
		echo "</DIV>";
		echo "</DIV>";
		echo "<DIV class='ui-layout-center hidden' id=inner>";
		include_once("includes/control_dperformance.php");
		echo "</DIV></BODY></HTML>";
	}
	else if($id_modul==40)
	{
		include_once("config/top.php");
		include_once("includes/head.php");
		echo "<DIV class='ui-layout-west hidden'>";
		include_once("includes/module.php");
				echo "<div id=accord2ion1 class=basic>";
		if($_SESSION['id_tingkat']<2)
		{
			include_once("includes/select_dealer.php");
		}
		if($_SESSION['id_tingkat']<3)
		{
			include_once("includes/select_grup.php");
		}
		echo "</DIV>";
		echo "</DIV>";
		echo "<DIV class='ui-layout-center hidden' id=inner>";
		include_once("includes/control_persneling.php");
		echo "</DIV></BODY></HTML>";
	}
	else if($id_modul==41)
	{
		include_once("config/top.php");
		include_once("includes/head.php");
		echo "<DIV class='ui-layout-west hidden'>";
		include_once("includes/module.php");
				echo "<div id=accord2ion1 class=basic>";
		if($_SESSION['id_tingkat']<2)
		{
			include_once("includes/select_dealer.php");
		}
		if($_SESSION['id_tingkat']<3)
		{
			include_once("includes/select_grup.php");
		}
		echo "</DIV>";
		echo "</DIV>";
		echo "<DIV class='ui-layout-center hidden' id=inner>";
		include_once("includes/control_shv.php");

		echo "</DIV></BODY></HTML>";
	}
	else if($id_modul==52)
	{
		include_once("config/top.php");
		include_once("includes/head.php");
		echo "<DIV class='ui-layout-west hidden'>";
		include_once("includes/module.php");
				echo "<div id=accord2ion1 class=basic>";
		if($_SESSION['id_tingkat']<2)
		{
			include_once("includes/select_dealer.php");
		}
		if($_SESSION['id_tingkat']<3)
		{
			include_once("includes/select_grup.php");
		}
		echo "</DIV>";
		echo "</DIV>";
		echo "<DIV class='ui-layout-center hidden' id=inner>";
		include_once("includes/control_ign_reset.php");

		echo "</DIV></BODY></HTML>";
	}
	else if($id_modul==53)
	{
		include_once("config/top.php");
		include_once("includes/head.php");
		echo "<DIV class='ui-layout-west hidden'>";
		include_once("includes/module.php");
				echo "<div id=accord2ion1 class=basic>";
		if($_SESSION['id_tingkat']<2)
		{
			include_once("includes/select_dealer.php");
		}
		if($_SESSION['id_tingkat']<3)
		{
			include_once("includes/select_grup.php");
		}
		echo "</DIV>";
		echo "</DIV>";
		echo "<DIV class='ui-layout-center hidden' id=inner>";
		include_once("includes/control_temp.php");

		echo "</DIV></BODY></HTML>";
	}
	else if($id_modul==55)
	{
		include_once("config/top.php");
		include_once("includes/head.php");
		echo "<DIV class='ui-layout-west hidden'>";
		include_once("includes/module.php");
				echo "<div id=accord2ion1 class=basic>";
		if($_SESSION['id_tingkat']<2)
		{
			include_once("includes/select_dealer.php");
		}
		if($_SESSION['id_tingkat']<3)
		{
			include_once("includes/select_grup.php");
		}
		echo "</DIV>";
		echo "</DIV>";
		echo "<DIV class='ui-layout-center hidden' id=inner>";
		include_once("includes/control_md.php");
		echo "</DIV></BODY></HTML>";
	}
}
else
{
header("location:".$site."/login.php");
}
?>