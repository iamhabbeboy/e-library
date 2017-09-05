<div class="login">
<div class="circle"></div>
<div class="field">
<form method="POST">
<input name="username" required type="text" placeholder="User ID or Matric No."/>
<input name="submit" type="submit" title="Click here to log in" value="Continue"/>

<?php

if(isset($_POST['submit'])){

	$nacoss->login_continue(array("username"));
}

?>
</form>
<div class="forget-link">
<a href="public-time-table">Public time table</a>
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