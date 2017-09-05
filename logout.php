<?php session_start();
ob_start();

if($_SESSION['nacoss_main']){
	unset($_SESSION['nacoss_main']);
	header("location:./");
}


?>