<?php session_start();
ob_start();

if($_SESSION['nacoss_user']){
	unset($_SESSION['nacoss_user']);
	header("location:../");
}


?>