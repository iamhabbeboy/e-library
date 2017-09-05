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
<h3>EDIT MEMBER</h3>
<div class="option-link">
<div class="side-link">

</div>
<div class="clear"></div>
<div>



<form method="POST">
<?php
if(isset($_GET['id'])){

	$getid=base64_decode($_GET['id']);

$sql=nacoss::$connect->prepare("SELECT * FROM member WHERE id=?");
$sql->execute(array($getid));

if($sql->rowCount() > 0){

$i=0;
	while($fetch=$sql->fetch()){
$i+=1;
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
<label>Full Name<span>*</span></label>
<input name="name" type="text" required placeholder="Full name" value="<?=$fetch['name'];?>"/>

<label>Member ID:</label>
<input name="username" type="text"  required placeholder="Member ID" readonly value="<?=$fetch['memberid'];?>"/>

<label>Phone Number<span>*</span></label>
<input name="phone" type="number" required placeholder="Phone number" value="<?=$fetch['phone'];?>"/>

<label>Email <span>*</span></label>
<input name="email" type="email" required placeholder="Email address" value="<?=$fetch['email'];?>" />

<label>Position <span>*</span></label>
<input name="position" type="text" required placeholder="Position" value="<?=$fetch['position'];?>"/>

<input name="submit" type="submit" value="Submit" id='user_submit' />
<?php
if(isset($_POST['submit'])){

	$nacoss->edit_member(array("name","username","phone","email","position"));
}

?>


<?php
	}}
	//return $data;
}
?>

</form>
</div>
</div>

</div>


<?php

include("footer.php");
?>