<?php include("header2.php");
?>

<script type="text/javascript">
function config(pid){
	var del=confirm("Do you want to delete?");

	if(del){
		window.location="list-of-books?delete="+pid;
	}else{
		alert("You made a false selection");

	}
}
</script>
<div class="slide2" style="width:1030px;margin-left:-100px;">
<h3>LIST OF ALL BOOKS</h3>
<div class="option-link">
<div class="side-link">
<a href="main"><img src="../images/back.png"/></a>
</div>
<div class="clear"></div>
<div>

<table cellspacing="0" cellpadding="0" border="0">
	<thead>
<tr>
<td style="width:10%;">S/N</td>
<td style="width:35%'">Subject</td>
<td>Title</td>
<td>Author</td>
<td>Pages</td>
<td>ISBN</td>
<td>Copies</td>
<td style="width:15%"> Option</td>
</tr>	</thead>
<tbody>

<?php
$sql=nacoss::$connect->query("SELECT * FROM book ORDER BY id ASC");
if($sql->rowCount() > 0){

$i=0;
	while($fetch=$sql->fetch()){
$i+=1;
		$data[]=array(
'id'=>$fetch['id'],
'subject'=>$fetch['subject'],
'title'=>$fetch['title'],
'author'=>$fetch['author'],
'copyright'=>$fetch['copyright'],
'edition'=>$fetch['edition'],
'pagenumber'=>$fetch['pagenumber'],
'isbn'=>$fetch['isbn'],
'copies'=>$fetch['copies'],
'shelf'=>$fetch['shelf']
			);
?>
<tr>
<td><?=$i;?></td>

<td><?=$fetch['subject'];?></td>
<td> <?=$fetch['title'];?></td>
<td><?=$fetch['author'];?></td>
<td><?=$fetch['pagenumber'];?></td>
<td><?=$fetch['isbn'];?></td>
<td><?=$fetch['copies'];?></td>
<td><a href="edit-book?id=<?=base64_encode($fetch['id']);?>"><img src="../images/edit.png" alt="Edit"/></a> | <a href="javascript:config(<?=$fetch['id']?>);"><img src="../images/delete.png" alt="Delete"/></a></td>
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
    
$sql=nacoss::$connect->prepare("DELETE FROM book WHERE id=?");
    
    $sql->execute(array($get_del));
                  
                  if($sql->rowCount() >0){
                  ?>
<script type="text/javascript">


$(function(){

alert("The book has been deleted");
    return false;

});

</script>
<meta http-equiv="refresh" content="0;list-of-books"/>
<?php
                  
                  }




}

?>
