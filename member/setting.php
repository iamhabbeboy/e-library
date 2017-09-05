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
<h3>Update My profile</h3>
<div class="option-link">
<div class="side-link">

</div>
<div class="clear"></div>
<div>


	<?php

if($_SESSION['nacoss_user']){

$get_id=$_SESSION['nacoss_user'];

$sql=nacoss::$connect->prepare("SELECT * FROM member WHERE memberid=?");
$sql->execute(array($get_id));

if($sql->rowCount() >0){

	while($fetch=$sql->fetch()){

		$data[]=array(
'id'=>$fetch['id'],
'memberid'=>$fetch['memberid'],
'name'=>$fetch['name'],
'email'=>$fetch['email'],
'exp_date'=>$fetch['exp_date'],
'position'=>$fetch['position'],
'status'=>$fetch['status']

			);

?>
<form method="POST" enctype="multipart/form-data">

<label>Full Name<span>*</span></label>
<input name="name" type="text" required placeholder="First name" value="<?=$fetch['name'];?>"/>
<input name="username" type="hidden" value="<?=$_SESSION['nacoss_user'];?>"/>

<label>Phone Number<span>*</span></label>
<input name="phone" type="number" required placeholder="Phone number" value="<?=$fetch['phone'];?>"/>
<label>Email <span>*</span></label>
<input name="email" type="email" required placeholder="Email address" value="<?=$fetch['email'];?>"/>

<label>Position <span>*</span></label>
<input name="position" type="text" required placeholder="Position" value="<?=$fetch['position'];?>" readonly/>

<label>New Password<span>*</span></label>
<input name="password" type="password" id="pass" placeholder="Password" required/>
<label>Confirm New Password<span>*</span></label>
<input name="confpass" type="password" placeholder="Confirm Password" id="confpass" required/>
<input name="submit" type="submit" value="Submit" id='user_submit' />
<?php
if(isset($_POST['submit'])){

	$nacoss->user_setting(array("name","password","username","phone","email",'position'));
}

?>
</form>
</div>
</div>

</div>
<?php
	}
	// $data;
}

}
?>

<?php

include("footer.php");
?>