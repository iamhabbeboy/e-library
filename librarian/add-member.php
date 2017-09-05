<?php include("header2.php");
?>
<script type="text/javascript">
$(function(){

$("#user_submit").click(function(){

var pass=$("#pass").val();
var confpass=$("#confpass").val();


if(confpass != pass){
	alert("Password does not matched!");
	$("#confpass").css("border","1px solid #900");
	$("#confpass").focus();
	return false;
}


});

});
</script>
<div class="slide2">
<h3>ADD MEMBER</h3>
<div class="option-link">
<div class="side-link">

</div>
<div class="clear"></div>
<div>



<form method="POST">

<label>Full Name<span>*</span></label>
<input name="name" type="text" required placeholder="Full name" />

<label>Member ID:</label>
<input name="username" type="text"  required placeholder="Member ID"/>

<label>Phone Number<span>*</span></label>
<input name="phone" type="number" required placeholder="Phone number" value="<?=$fetch['phone'];?>"/>

<label>Email <span>*</span></label>
<input name="email" type="email" required placeholder="Email address" />

<label>Position <span></span></label>
<input name="position" type="text"  placeholder="Position"/>

<input name="submit" type="submit" value="Submit" id='user_submit' />
<?php
if(isset($_POST['submit'])){

	$nacoss->add_member(array("name","username","phone","email","position"));
}

?>
</form>
</div>
</div>

</div>


<?php

include("footer.php");
?>