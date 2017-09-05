<?php include("header2.php");
?>

<script type="text/javascript">
function config(pid){
	var del=confirm("Do you want to delete?");

	if(del){
		window.location="view-member?delete="+pid;
	}else{
		alert("You made a false selection");

	}
}
</script>
<div class="slide2">
<h3>View MEMBER</h3>
<div class="option-link">
<div class="side-link">

</div>
<div class="clear"></div>
<div>

<table cellspacing="0" cellpadding="0" border="0">
	<thead>
<tr>
<td style="width:10%;">S/N</td>
<td style="width:35%'">MemberID</td>
<td style='width:25%'>Name</td>
<td style="width:15%">Email</td>
<td>Position</td>
<td style="width:15%"> Option</td>
</tr>	</thead>
<tbody>

<?php
$sql=nacoss::$connect->query("SELECT * FROM member ORDER BY id ASC");
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
<tr>
<td><?=$i;?></td>

<td><?=$fetch['memberid'];?></td>
<td> <?=$fetch['name'];?></td>
<td><?=$fetch['email'];?></td>
<td><?=$fetch['position'];?></td>
<td><a href="edit-member?id=<?=base64_encode($fetch['id']);?>"><img src="../images/edit.png" alt="Edit"/></a> | <a href="javascript:config(<?=$fetch['id']?>);"><img src="../images/delete.png" alt="Delete"/></a></td>
</tr>

<?php
	}
	//return $data;
}
?>

</tbody>
</table>


</div>
</div>

</div>

<?php

if(isset($_GET['delete'])){

    $get_del=$_GET['delete'];
    
$sql=nacoss::$connect->prepare("DELETE FROM member WHERE id=?");
    
    $sql->execute(array($get_del));
                  
                  if($sql->rowCount() >0){
                  ?>
<script type="text/javascript">


$(function(){

alert("Member has been deleted");
    return false;

});

</script>
<meta http-equiv="refresh" content="0;view-member"/>
<?php
                  
                  }




}

?>
<?php

include("footer.php");
?>