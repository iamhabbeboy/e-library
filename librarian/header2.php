<?php include("../config/include.class.php");
if(!$_SESSION['nacoss_user']){
?>
<script type="text/javascript">
alert("You can't access this page. Kindly login");
window.location="../";
</script>
<?php
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Salawu E-Library System</title>
<link rel="shortcut icon" type="x/image" href="../images/favicon.png"/>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<script type="text/javascript" src="../js/jqueryui.js"></script>
</head>
<body>
<div class="wrapper">
<div class="divider"></div>
<div class="header-logo">

<div class="header-inside">
<div class="img-logo">
	<a href="main">
<img src="../images/logo.jpg" style="width:90%;margin:5px;"></a>
</div>
<div class="header-title">
<h1>Simeon Adebo E-Library </h1>
<h3>Computer Science Department</h3>
</div>
<div class="clear"></div>
</div>
<div class="content2">
<div class="sub-content">
