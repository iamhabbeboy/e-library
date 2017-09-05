\<?php include("header2.php");
?>

<div class="slide2" >
<h3>Edit Book</h3>
<div class="option-link">
<div class="side-link">

</div>
<div class="clear"></div>
<div>

<form method="POST">
<?php
if(isset($_GET['id'])){

	$getid=base64_decode($_GET['id']);

$sql=nacoss::$connect->prepare("SELECT * FROM book WHERE id=?");
$sql->execute(array($getid));

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
	<label>Book Subject</label>
	<input type="hidden" value="<?=$fetch['id'];?>" name="id"/>
	<input name="subject" type="text" placeholder="Book Subject" required value="<?=$fetch['subject'];?>"/>
	<label>Book Title:</label>
	<input name="title" type="text" placeholder="Book Title" required value="<?=$fetch['title'];?>"/>
<label>Author Name:</label>
<input type="text" name="author" placeholder="Author Name" required value="<?=$fetch['author'];?>" />
<label>Book Copyright</label>
<input name="copyright" type="text" placeholder="Book Copyright" required value="<?=$fetch['copyright'];?>"/>
<label>Edition Number:</label>
<input name="edition" type="text" placeholder="Edition Number" required value="<?=$fetch['edition'];?>"/>
<label>Number of Pages:</label>
<input name="pagenumber" type="text" placeholder="Number of pages" required value="<?=$fetch['pagenumber'];?>"/>
<label>ISBN </label>
<input name="isbn" type="text" placeholder="ISBN for the book" value="<?=$fetch['isbn'];?>" />
<label>Book copies:</label>
<input name="copies" type="number" placeholder="Number of book copies in stock" value="<?=$fetch['copies'];?>"required/>
<label>Shelf Number:</label>
<input name="shelf" type="text" value="<?=$fetch['shelf'];?>" placeholder="Shelf Number">
<input name="submit" type="submit" value="Submit" id='user_submit' />
<?php
if(isset($_POST['submit'])){
	$nacoss->edit_book(array("subject","title","author","copyright","edition","pagenumber","isbn","copies","shelf","id"));

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