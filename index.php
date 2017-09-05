<?php include("header.php");?>

<div class="login">
<div class="circle"></div>
<div class="field">
<form method="POST">
<input name="username" required type="text" placeholder="Member ID"/>
<input name="submit" type="submit" title="Click here to log in" value="Continue"/>

<?php
	if(isset($_POST['submit'])){
		$nacoss->login_continue(array("username"));
	}
?>
</form>
<div class="forget-link">

</div>
</div>
</div>
<div class="clear"></div>
</div>
</div>
</div>
<div class="clear"></div>

<footer>
<center>
<ul>
<li><a href="#">About Computer</a></li>&nbsp;|&nbsp;
<li><a href="#">Contact Us</a></li>
</ul>
</center>

</footer>
</div>

<STYLE TYPE="text/css">
footer{
	margin-top: 50px;
	display:  none;
}
footer ul{
	list-style-type: none;
}
footer ul li{
	display: inline-block;
	padding: 5px;;
}
</STYLE>

</body>
</html>
