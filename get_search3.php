<?php include("config/include.class.php");

     if(isset($_POST['search']))
	   {
	   $search = addslashes(htmlentities(htmlspecialchars($_POST['search'])));
  $sql = mysql_query("SELECT * FROM room WHERE  roomno LIKE '%$search%'");

	 $rows= mysql_num_rows($sql);
	 
	  if($rows>0){

	     while($fet = mysql_fetch_assoc($sql)){

		   $name = $fet['roomno'];

		    if(empty($name)){
			return false;
			}
			else{
		 ?>

			  <li style="list-style-type:none;font-size:14px;text-transform:uppercase;padding:5px;border-bottom:1px dotted #fff;" id="<?=$fet['roomno'];?>" class="recode">
			<?=$fet['roomno'];?>
		 </li>

	  <?php


	}

	  }
	  }else{

	    echo $search." not found !";
	  }



	}
?>

<script type="text/javascript">
$(function(){

$(".recode").click(function(){

var id=$(this).attr('id');

$("#room").val(id);
$(".room-result").hide();
});

});
</script>
