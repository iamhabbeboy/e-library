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

if($_SESSION['nacoss_librarian']){

$get_id=$_SESSION['nacoss_librarian'];

$sql=nacoss::$connect->prepare("SELECT * FROM librarian WHERE userid=?");
$sql->execute(array($get_id));

if($sql->rowCount() >0){

	while($fetch=$sql->fetch()){

		$data[]=array(
'id'=>$fetch['id'],
'userid'=>$fetch['userid'],
'fullname'=>$fetch['fullname'],
'phone'=>$fetch['phone']

			);

?>
<form method="POST" enctype="multipart/form-data">

<label>Full Name<span>*</span></label>
<input name="fullname" type="text" required placeholder="Full name" value="<?=$fetch['fullname'];?>"/>


<input name="username" type="hidden" value="<?=$_SESSION['nacoss_librarian'];?>"/>


<label>Phone Number<span>*</span></label>
<input name="phone" type="number" required placeholder="Phone number" value="<?=$fetch['phone'];?>"/>

<label>New Password<span>*</span></label>
<input name="password" type="password" id="pass" placeholder="Password" required/>
<label>Confirm New Password<span>*</span></label>
<input name="confpass" type="password" placeholder="Confirm Password" id="confpass" required/>
<input name="submit" type="submit" value="Submit" id='user_submit' />
<?php
if(isset($_POST['submit'])){

	$nacoss->user_setting2(array("fullname","password","username","phone"));
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