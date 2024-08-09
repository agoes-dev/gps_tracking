<?php
session_start();
include_once("config/function.php");
session_destroy();
header("location:".$site);
?>