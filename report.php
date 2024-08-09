<?
session_start();
include_once("config/function.php");
include_once("config/connection.php");
include_once("config/control.php");
$_SESSION['id_menu']="3";

if(isset($_SESSION['userid']))
{
	if(!isset($_POST['id_modul'])){	
		$id_modul=3; 
	}
	else{
		$id_modul=$_POST['id_modul'];
	}
	
  if($id_modul==3)
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
				include_once("includes/select_dealer.php");
			}
			if($_SESSION['id_tingkat']<3)
			{
				include_once("includes/select_grup.php");
			}
		include_once("includes/select_vehicle.php");
		// echo "</div>";
		
		echo "</DIV>";
		
		//INNER PANE
		echo "<DIV class='ui-layout-center hidden' id=inner >";
			//CENTER
			include_once("includes/report_history.php");
		echo "</DIV></BODY></HTML>";
  }
	else if($id_modul==4)
  {
		include_once("config/top.php");
		
		//NORTH PANE
		include_once("includes/head.php");
		
		//WEST PANE
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
		
		//INNER PANE
		echo "<DIV class='ui-layout-center hidden' id=inner>";
			//CENTER
			include_once("includes/report_table.php");
		echo "</DIV></BODY></HTML>";
  } 
  else if($id_modul==5)
  {
	include_once("config/top.php");
		
		//NORTH PANE
		include_once("includes/head.php");
		
		//WEST PANE
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
		
		//INNER PANE
		echo "<DIV class='ui-layout-center hidden' id=inner>";
			//CENTER
			include_once("includes/report_event.php");
		echo "</DIV></BODY></HTML>";
  }
  else if($id_modul==6)
  {
			include_once("config/top.php");
		
		//NORTH PANE
		include_once("includes/head.php");
		
		//WEST PANE
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
		
		//INNER PANE
		echo "<DIV class='ui-layout-center hidden' id=inner>";
			//CENTER
			include_once("includes/report_trip.php");
		echo "</DIV></BODY></HTML>";
  }
	else if($id_modul==21)
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
		include_once("includes/report_photo2.php");
		echo "</DIV></BODY></HTML>";
	}
	else if($id_modul==25)
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
		echo "</DIV></DIV>";
		echo "<DIV class='ui-layout-center hidden' id=inner>";
		include_once("includes/report_eskavator.php");
		echo "</DIV></BODY></HTML>";
	}
	else if($id_modul==31)
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
		echo "</DIV></DIV>";
		echo "<DIV class='ui-layout-center hidden' id=inner>";
		include_once("includes/report_idle.php");
		echo "</DIV></BODY></HTML>";
	}
	else if($id_modul==32)
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
		echo "</DIV></DIV>";
		echo "<DIV class='ui-layout-center hidden' id=inner>";
		include_once("includes/report_temp2.php");
		echo "</DIV></BODY></HTML>";
	}
	else if($id_modul==33)
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
		echo "</DIV></DIV>";
		echo "<DIV class='ui-layout-center hidden' id=inner>";
		include_once("includes/report_bbm.php");
		echo "</DIV></BODY></HTML>";
	}
	else if($id_modul==34)
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
		echo "</DIV></DIV>";
		echo "<DIV class='ui-layout-center hidden' id=inner>";
		include_once("includes/report_area.php");
		echo "</DIV></BODY></HTML>";
	}
	else if($id_modul==35)
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
		echo "</DIV></DIV>";
		echo "<DIV class='ui-layout-center hidden' id=inner>";
		include_once("includes/report_speed.php");
		echo "</DIV></BODY></HTML>";
	}
	else if($id_modul==36)
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
		echo "</DIV></DIV>";
		echo "<DIV class='ui-layout-center hidden' id=inner>";
		include_once("includes/report_driver_key.php");
		echo "</DIV></BODY></HTML>";
	}
	else if($id_modul==37)
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
		echo "</DIV></DIV>";
		echo "<DIV class='ui-layout-center hidden' id=inner>";
			include_once("includes/report_dperfrm.php");
		echo "</DIV>";
		echo "</BODY></HTML>";
	}
	else if($id_modul==38)
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
		echo "</DIV></DIV>";
		echo "<DIV class='ui-layout-center hidden' id=inner>";
		include_once("includes/report_4wd.php");
		echo "</DIV></BODY></HTML>";
	}
	else if($id_modul==42)
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
		echo "</DIV></DIV>";
		echo "<DIV class='ui-layout-center hidden' id=inner>";
		include_once("includes/report_engine.php");
		echo "</DIV></BODY></HTML>";
	}
	else if($id_modul==43)
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
		// include_once("includes/select_vehicle.php");
		echo "</DIV></DIV>";
		echo "<DIV class='ui-layout-center hidden' id=inner>";
		include_once("includes/report_engine_group.php");
		echo "</DIV></BODY></HTML>";
	}
	else if($id_modul==44)
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
		echo "</DIV></DIV>";
		echo "<DIV class='ui-layout-center hidden' id=inner>";
		include_once("includes/report_d1.php");
		echo "</DIV></BODY></HTML>";
	}
	else if($id_modul==45)
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
		// include_once("includes/select_vehicle.php");
		echo "</DIV></DIV>";
		echo "<DIV class='ui-layout-center hidden' id=inner>";
		include_once("includes/report_d1_group.php");
		echo "</DIV></BODY></HTML>";
	}
	else if($id_modul==54)
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
		echo "</DIV></DIV>";
		echo "<DIV class='ui-layout-center hidden' id=inner>";
		include_once("includes/report_dump.php");
		echo "</DIV></BODY></HTML>";
	}
	else if($id_modul==56)
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
		echo "</DIV></DIV>";
		echo "<DIV class='ui-layout-center hidden' id=inner>";
		include_once("includes/report_dump_group.php");
		echo "</DIV></BODY></HTML>";
	}
}
else
{
  header("location:".$site."/login.php");
}
?>