<?php include("header2.php");
?>
<script>
     $(document).ready(function(){
       $(".member-result").hide();

       $("#member").keyup(function(){
        var search = $("#member").val();
        var dataString = 'search='+search;
        if(search==''){
         $(".member-result").slideUp("slow");
        }
        else{

        $.ajax({
          url:'get_search.php',
          type:'POST',
          data:dataString,
          cache:false,
          success:function(html){
            $(".member-result").slideDown("slow").html(html);  
        }
        });
      }
        return false;});
        });
</script>


<style type="text/css">
.member-result{
	width:525px;
	margin-left: 38px;
	margin-right: 15px;
	margin-top: -7px;
	padding: 15px;
	min-height: 30px;
	background: rgba(0,0,0,0.9);
	color:#fff;
	position: absolute;
	z-index: 100;
}
.member-result li{

	text-transform: lowercase;
	font-size: 15px;
	cursor: pointer;
}

#room,#staff,#code{
	text-transform: lowercase;
}
</style>

<div class="slide2" >
<h3>Borrow Book</h3>
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
'bookedcopies'=>$fetch['bookedcopies'],
'shelf'=>$fetch['shelf']
			);
?>
	<label>Book Subject</label>
	<input type="hidden" value="<?=$fetch['id'];?>" name="id"/>
	<input name="subject" type="text" placeholder="Book Subject" required value="<?=$fetch['subject'];?>" readonly/>
	<label>Book Title:</label>
	<input name="title" type="text" placeholder="Book Title" required value="<?=$fetch['title'];?>" readonly/>
<label>Author Name:</label>
<input type="text" name="author" placeholder="Author Name" required value="<?=$fetch['author'];?>" readyonly />
<label>Current Date:</label>
<input name="curdate" type="text" value="<?=date('d/m/Y');?>" readonly/>
<label>Return Date:</label>
<input name="retdate" type="text" value="" placeholder="Type in return date using dd/mm/yyyy e.g 23/12/200" required/>
<input name="copies" type="hidden" value="<?=$fetch['copies'];?>"/>
<input name="bookedcopies" type="hidden" value="<?=$fetch['bookedcopies'];?>"/>

<input id="member" name="member" type="hidden" placeholder="Member ID" required value="<?=$_SESSION['nacoss_librarian'];?>"/>
<div class="member-result">
</div>
<input name="submit" type="submit" value="Submit" id='user_submit' />
<?php
if(isset($_POST['submit'])){
	$nacoss->borrowedbooks(array("id","curdate","retdate","member","copies","bookedcopies"));

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