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
<h3>LIST OF AVAILABLE BOOKS</h3>
<div class="option-link">
<div>
<form method="POST">
<input type="text" name="book" placeholder="Search for books title or subject" style="display:inline;margin-left:20px;"/>
<input name="searchbtn" type="submit" value="Search" style="width:100px;display:inline;"/>

<?php
if(isset($_POST['searchbtn'])){

$book=$_POST['book'];



$sqlbook=mysql_query("SELECT * FROM `book` WHERE `title` LIKE '%".$book."%' OR subject LIKE '%".$book."%' ");

$rownum=mysql_num_rows($sqlbook);

if($rownum){

	$fetchbook=mysql_fetch_array($sqlbook);
	   header("location:borrow-books?search=".base64_encode($fetchbook['id']));
}else{
  echo "<font style=\"color:#900;padding:5px; margin-left:15px;\">$book not found</font>";
}


}


?>
</form>

</div>

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

if(isset($_GET['search'])){
	$getsearch=base64_decode($_GET['search']);

$sqlbook=nacoss::$connect->prepare("SELECT * FROM book WHERE id=?");
$sqlbook->execute(array($getsearch));

if($sqlbook->rowCount() > 0){

$i=0;
	while($fetch=$sqlbook->fetch()){
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
'bookedcopies'=>$fetch['bookedcopies'],
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
<td><?=$fetch['copies']-$fetch['bookedcopies'];?></td>
<td><a href="borrow-this-book?id=<?=base64_encode($fetch['id']);?>">Borrow this book</a></td>
</tr>

<?php
	}
	//return $data;
}



}else{
$sql=nacoss::$connect->query("SELECT * FROM book ORDER BY id DESC");
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
'bookedcopies'=>$fetch['bookedcopies'],
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
<td><?=$fetch['copies']-$fetch['bookedcopies'];?></td>
<td><a href="borrow-this-book?id=<?=base64_encode($fetch['id']);?>">Borrow this book</a></td>
</tr>

<?php
	}
	//return $data;
}else{

	echo "<tr ><td colspan=\"8\"> No available books yet </td></tr>";
}

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
