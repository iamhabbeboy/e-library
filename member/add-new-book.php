\<?php include("header2.php");
?>

<div class="slide2">
<h3>ADD NEW BOOK</h3>
<div class="option-link">
<div class="side-link">

</div>
<div class="clear"></div>
<div>

<form method="POST">

	<label>Book Subject</label>
	<input name="subject" type="text" placeholder="Book Subject" required/>
	<label>Book Title:</label>
	<input name="title" type="text" placeholder="Book Title" required/>
<label>Author Name:</label>
<input type="text" name="author" placeholder="Author Name" required />
<label>Book Copyright</label>
<input name="copyright" type="text" placeholder="Book Copyright" required/>
<label>Edition Number:</label>
<input name="edition" type="text" placeholder="Edition Number" required/>
<label>Number of Pages:</label>
<input name="pagenumber" type="text" placeholder="Number of pages" required/>
<label>ISBN </label>
<input name="isbn" type="text" placeholder="ISBN for the book" />
<label>Book copies:</label>
<input name="copies" type="number" placeholder="Number of book copies in stock" required/>
<label>Shelf Number:</label>
<input name="shelf" type="text" placeholder="Shelf Number">
<input name="submit" type="submit" value="Submit" id='user_submit' />
<?php
if(isset($_POST['submit'])){

	$nacoss->add_book(array("subject","title","author","copyright","edition","pagenumber","isbn","copies","shelf"));

}

?>
</form>
</div>
</div>
</div>


<?php

include("footer.php");
?>