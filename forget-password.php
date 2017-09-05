<?php
include("header.php");

?>

<div class="login">
<div class="square"></div>
<div class="field">
<form method="POST">
<input name="username" required type="text" placeholder="Username"/>
<input name="submit" type="submit" title="Click here to log in" value="Login"/>
<center>
<?php

if(isset($_POST['submit'])){

	echo "<font style=\"color:#060;\">Password has been sent to your email address</font>";
}

?>
</center>
</form>
<div class="forget-link">
<a href="./">Already a member? Click here</a>
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