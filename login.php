<?php include("header.php"); ?>

<div class="login">
<div class="circle"></div>
<div class="field">
<form method="POST">
<input name="username" required type="text" placeholder="Username" value="<?=$_SESSION['nacoss_user'];?>"/>
<input name="password" required type="password" placeholder="Password"/>
<input name="submit" type="submit" title="Click here to log in" value="Login"/>

<?php

if(isset($_POST['submit'])){

	$nacoss->login_continuer(array("username","password"));

}

?>
</form>
<div class="forget-link">
<a href="forget-password">Forget Password?</a>
</div>
</div>
</div>
<div class="clear"></div>
</div>
</div>

</div>

</div>
</body>
</html>
