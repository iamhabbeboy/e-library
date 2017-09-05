<?php include("config/include.class.php");
   
     if(isset($_POST['search']))
	 {
	   $search = addslashes(htmlentities(htmlspecialchars($_POST['search'])));
  $sql = mysql_query("SELECT * FROM staff WHERE  fname LIKE '%$search%' OR sname LIKE '%$search%'");
    
	 $rows= mysql_num_rows($sql);
	 
	  if($rows>0){
	  
	     while($fet = mysql_fetch_assoc($sql)){
		 
		   $name = $fet['fname'];
		   $sname=$fet['sname'];
		   $id=$fet['id'];
		   
		    if(empty($name) &&empty($sname)){
			return false;
			}
			else{
		 ?>

			  <li style="list-style-type:none;font-size:14px;text-transform:uppercase;padding:5px;border-bottom:1px dotted #fff;" id="<?=$fet['fname']. " ".$fet['sname'];?>" class="recode">
			<?=$fet['fname']. " ".$fet['sname'];?>
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

$("#staff").val(id);
$("#staff2").val(id);
$(".staff-result").hide();
});

});
</script>