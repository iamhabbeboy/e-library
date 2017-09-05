
<?php include("header2.php");
?>
<div class="slide2">
<h3>Update My profile</h3>
<div class="option-link">
<div class="side-link">

</div>
<div class="clear"></div>
<div>


	<?php

if($_SESSION['nacoss_main']){

$get_id=$_SESSION['nacoss_main'];

$sql=nacoss::$connect->prepare("SELECT * FROM admin WHERE username=?");
$sql->execute(array($get_id));

if($sql->rowCount() >0){

	while($fetch=$sql->fetch()){

		$data[]=array(
'id'=>$fetch['id'],
'fname'=>$fetch['fname'],
'sname'=>$fetch['sname'],
'photo'=>$fetch['photo'],
'phone'=>$fetch['phone'],

			);

?>
<form method="POST" enctype="multipart/form-data">

<label>First name<span>*</span></label>
<input name="fname" type="text" required placeholder="First name" value="<?=$fetch['fname'];?>"/>
<input name="username" type="hidden" value="<?=$_SESSION['nacoss_main'];?>"/>
<label>Surname<span>*</span></label>
<input name="sname" type="text" required placeholder="Surname" value="<?=$fetch['sname'];?>"/>
<label>Phone Number<span>*</span></label>
<input name="phone" type="text" required placeholder="Phone number" value="<?=$fetch['phone'];?>"/>
<label>Photo<span>*</span></label>
<input name="file" type="file" required />
<label>New Password<span>*</span>/label>
<input name="password" type="password" id="pass" placeholder="Password" required/>
<label>Confirm New Password<span>*</span></label>
<input name="confpass" type="password" placeholder="Confirm Password" id="confpass" required/>
<input name="submit" type="submit" value="Submit" />
<?php
if(isset($_POST['submit'])){

	$nacoss->setting(array("file","fname","sname","password","username"));
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