<div class="login2">
<div class="circle2">
	<?php
$sqladmin=mysql_query("SELECT * FROM admin WHERE username='".$_SESSION['nacoss_main']."'");
$rowadmin=mysql_num_rows($sqladmin);
if($rowadmin){
	$fetchadmin=mysql_fetch_array($sqladmin);
?>
<img src="<?=$fetchadmin['photo'];?>"/>
<?php
}
	?>
</div>
<div class="field2">
<ul>
	<li><a href="main" class="<?=$home;?>">Home</a></li>
<li><a href="room-manager" class="<?=$room;?>">Room module</a></li>
<li><a href="course-manager" class="<?=$course;?>">Course module</a></li>
<li><a href="staff-manager" class="<?=$staff;?>">Staff module</a></li>
<li><a href="student-manager">Student module</a></li>
<li><a href="timeslot-manager">Timeslot Module</a></li>
<li><a href="class-schedule">Class Schedule</a></li>
<li><a href="setting">Update profile</a></li>
<li><a href="logout">Log out</a></li>
</ul>
</div>
</div>
<div class="clear"></div>
</div>
</div>

</div>

</div>
</body>
</html>