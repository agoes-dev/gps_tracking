<?
session_start();
include_once("config/function.php");
include_once("config/connection.php");
include_once("config/control.php");
$_SESSION['id_menu']="8";

if(isset($_SESSION['userid']))
{
  if(!isset($_POST['id_modul']))
  {
    if($_SESSION['id_tingkat']==1)
    {
      $id_modul=13;
      $_POST['id_modul']=13;
    }
    else if($_SESSION['id_tingkat']==2)
    {
      $id_modul=14;
      $_POST['id_modul']=14;
    }
    else if($_SESSION['id_tingkat']==3)
    {
      $id_modul=15;
      $_POST['id_modul']=15;
    }
  }
  else
  {
    $id_modul=$_POST['id_modul'];
  }
	
	
  if($id_modul==13)
  {
	include_once("config/top.php");

	//NORTH PANE
	include_once("includes/head.php");

	//WEST PANE
	echo "<DIV class='ui-layout-west hidden'>";
	include_once("includes/module.php");
	if($_SESSION['id_tingkat']<2)
	{
	//include_once("includes/select_dealer.php");
	}
	if($_SESSION['id_tingkat']<3)
	{
	//include_once("includes/select_grup.php");
	}
	//include_once("includes/select_vehicle.php");
	echo "</DIV>";

	//INNER PANE
	echo "<DIV class='ui-layout-center hidden' id=inner>";
	//CENTER
	include_once("includes/setting_admin.php");
	echo "</DIV></BODY></HTML>";
  }
	
  else if($id_modul==14)
  {
	include_once("config/top.php");

	//NORTH PANE
	include_once("includes/head.php");

	//WEST PANE
	echo "<DIV class='ui-layout-west hidden'>";
	include_once("includes/module.php");
	if($_SESSION['id_tingkat']<2)
	{
		include_once("includes/select_dealer.php");
	}
	echo "</DIV>";

	//INNER PANE
	echo "<DIV class='ui-layout-center hidden' id=inner>";
	//CENTER
	include_once("includes/setting_grup.php");
	echo "</DIV></BODY></HTML>";

  }
  else if($id_modul==15)
  {
	include_once("config/top.php");

	//NORTH PANE
	include_once("includes/head.php");

	//WEST PANE
	echo "<DIV class='ui-layout-west hidden'>";
	include_once("includes/module.php");
	if($_SESSION['id_tingkat']<2)
	{
		include_once("includes/select_dealer.php");
	}
	if($_SESSION['id_tingkat']<3)
	{
		// if($asem==1){
			include_once("includes/select_grup.php");
		// }
	}
	echo "</DIV>";

	//INNER PANE
	echo "<DIV class='ui-layout-center hidden' id=inner>";
	//CENTER
	include_once("includes/setting_vehicle.php");
	echo "</DIV></BODY></HTML>";

  }
  else if($id_modul==16)
  {
	include_once("config/top.php");

	//NORTH PANE
	include_once("includes/head.php");

	//WEST PANE
	echo "<DIV class='ui-layout-west hidden'>";
	include_once("includes/module.php");
	if($_SESSION['id_tingkat']<2)
	{
	//include_once("includes/select_dealer.php");
	}
	if($_SESSION['id_tingkat']<3)
	{
	//include_once("includes/select_grup.php");
	}
	//include_once("includes/select_vehicle.php");
	echo "</DIV>";

	//INNER PANE
	echo "<DIV class='ui-layout-center hidden' id=inner>";
	//CENTER
	include_once("includes/setting_user.php");
	echo "</DIV></BODY></HTML>";

  }
  else if($id_modul==17)
  {
	include_once("config/top.php");

	//NORTH PANE
	include_once("includes/head.php");

	//WEST PANE
	echo "<DIV class='ui-layout-west hidden'>";
	include_once("includes/module.php");
	if($_SESSION['id_tingkat']<2)
	{
	//include_once("includes/select_dealer.php");
	}
	if($_SESSION['id_tingkat']<3)
	{
	//include_once("includes/select_grup.php");
	}
	//include_once("includes/select_vehicle.php");
	echo "</DIV>";

	//INNER PANE
	echo "<DIV class='ui-layout-center hidden' id=inner>";
	//CENTER
	include_once("includes/setting_access.php");
	echo "</DIV></BODY></HTML>";

  }
	else if($id_modul==26)
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
	include_once("includes/setting_themes.php");
	echo "</DIV></BODY></HTML>";

  }
}
else
{
  header("location:".$site."/login.php");
}
?>