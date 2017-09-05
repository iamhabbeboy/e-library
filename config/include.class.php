<?php session_start();
ob_start();

$con=mysql_connect("localhost","root","root");
$sdb=mysql_select_db("lib",$con);



class nacoss{

public static $connect;

public function __construct(){

try{
   	  self::$connect = new PDO("mysql:host=localhost;dbname=lib","root","root");
   	  //echo "Connected !";
   		}
   		catch(PDOException $e)
   		{
   	 		echo $e->getMessage().', Unable to Connect !';
   		}
}


public function login_continue($data){

	$username=$_POST[$data[0]];
  //ho "<script>alert('".$username."');</script>";

	$sql=SELF::$connect->prepare("SELECT * FROM member WHERE memberid=? AND status=1");
  $sql->execute(array($username));

  $sql3=SELF::$connect->prepare("SELECT * FROM librarian WHERE userid=?");
  $sql3->execute(array($username));

  $sql2=SELF::$connect->prepare("SELECT * FROM member WHERE memberid=? AND status=0");
  $sql2->execute(array($username));

 if($sql->rowCount() > 0) {
   $_SESSION['nacoss_user']=$username;
   header("location:login?user=".base64_encode($username));
 }else if($sql2->rowCount() > 0) {
   $_SESSION['nacoss_user']=$username;
   header("location:add-password?user=".base64_encode($username));
 }else if($sql3->rowCount() > 0) {
   $_SESSION['nacoss_user']=$username;
   header("location:login?user=".base64_encode($username));
 }else{
   echo "Not Found !";
  }
}


public function add_password($data) {

$username=$_POST[$data[0]];
$password=$_POST[$data[1]];

$sql=self::$connect->prepare("SELECT * FROM member WHERE memberid=?");
$sql->execute(array($username));

if($sql->rowCount() > 0){

$insert=self::$connect->prepare("UPDATE member SET password=?, status=1 WHERE memberid=? ");
$insert->execute(array($password,$username));
$_SESSION['nacoss_main']=$username;
header("location:main?user=".base64_encode($username));
}

}





public function user_setting($data){

$name=$_POST[$data[0]];
$password=$_POST[$data[1]];
$username=$_POST[$data[2]];
$phone=$_POST[$data[3]];
$email=$_POST[$data[4]];
$position=$_POST[$data[5]];


$query=self::$connect->prepare("SELECT * FROM member WHERE memberid=? ");
$query->execute(array($username));


if($query->rowCount() > 0){

   $update=self::$connect->prepare("UPDATE member SET name=?, password=?,email=?, phone=?,position=? WHERE memberid=?");

   $update->execute(array($name,$password,$email,$phone,$position,$username));

?>
<script type="text/javascript">
alert("Member Profile has been altered");
</script>
<meta http-equiv="refresh" content="3;">
<?php

}
}


public function user_setting2($data){

$name=$_POST[$data[0]];
$password=$_POST[$data[1]];
$username=$_POST[$data[2]];
$phone=$_POST[$data[3]];
$email=$_POST[$data[4]];
$position=$_POST[$data[5]];


$query=self::$connect->prepare("SELECT * FROM librarian WHERE userid=? ");
$query->execute(array($username));


if($query->rowCount() > 0){

   $update=self::$connect->prepare("UPDATE librarian SET fullname=?, password=?, phone=? WHERE userid=?");

   $update->execute(array($name,$password,$phone,$username));

?>
<script type="text/javascript">
alert("Librarian has been altered");
</script>
<meta http-equiv="refresh" content="3;">
<?php
}
}



public function add_member($data){
$name=$_POST[$data[0]];
$username=$_POST[$data[1]];
$phone=$_POST[$data[2]];
$email=$_POST[$data[3]];
$position=$_POST[$data[4]];
$date=date("F d, Y");

$sql=self::$connect->prepare("SELECT * FROM member WHERE memberid=?");
$sql->execute(array($username));

if($sql->rowCount() > 0){
?>
<script type="text/javascript">
alert("Member already exist");
</script>
<?php
}else{
  $insert=self::$connect->prepare("INSERT INTO member SET memberid=?, name=?, phone=?, email=?,position=?,date_reg=? ");

  $insert->execute(array($username,$name,$phone,$email,$position,$date));

  ?>
<script type="text/javascript">
alert("Member has just been added");
</script>
  <?php
}
}



public function edit_member($data){
$name=$_POST[$data[0]];
$username=$_POST[$data[1]];
$phone=$_POST[$data[2]];
$email=$_POST[$data[3]];
$position=$_POST[$data[4]];
$date=date("F d, Y");

$sql=self::$connect->prepare("SELECT * FROM member WHERE memberid=?");
$sql->execute(array($username));

if($sql->rowCount() > 0){

  $insert=self::$connect->prepare("UPDATE member SET  name=?, phone=?, email=?,position=?,date_reg=? WHERE memberid=? ");

  $insert->execute(array($name,$phone,$email,$position,$date,$username,));

  ?>
<script type="text/javascript">
alert("Member has been altered");
</script>
<meta http-equiv='refresh' content='0;'/>
  <?php

}


}


public function add_book($data){
  $subject=$_POST[$data[0]];
  $title=$_POST[$data[1]];
  $author=$_POST[$data[2]];
  $copyright=$_POST[$data[3]];
  $edition=$_POST[$data[4]];
  $pagenumber=$_POST[$data[5]];
  $isbn=$_POST[$data[6]];
  $copies=$_POST[$data[7]];
  $shelf=$_POST[$data[8]];

$sql=self::$connect->prepare("SELECT * FROM  book WHERE title=? AND author=? AND pagenumber=?");
$sql->execute(array($title,$author,$pagenumber));

if($sql->rowCount() > 0){
?>
<script type="text/javascript">
alert("This book has already been added");
</script>
<?php
}else{
  $insert=self::$connect->prepare("INSERT INTO book SET subject=?, title=?,author=?,copyright=?,edition=?, pagenumber=?,isbn=?,copies=?,shelf=?");
  $insert->execute(array($subject,$title,$author,$copyright,$edition,$pagenumber,$isbn,$copies,$shelf));
  ?>
<script type="text/javascript">
alert("Book has been added");
</script>

  <?php
}
}


public function edit_book($data){
  $subject=$_POST[$data[0]];
  $title=$_POST[$data[1]];
  $author=$_POST[$data[2]];
  $copyright=$_POST[$data[3]];
  $edition=$_POST[$data[4]];
  $pagenumber=$_POST[$data[5]];
  $isbn=$_POST[$data[6]];
  $copies=$_POST[$data[7]];
  $shelf=$_POST[$data[8]];
  $id=$_POST[$data[9]];

$sql=self::$connect->prepare("SELECT * FROM  book WHERE id=?");
$sql->execute(array($id));

if($sql->rowCount() > 0){
  $insert=self::$connect->prepare("UPDATE book SET subject=?, title=?,author=?,copyright=?,edition=?, pagenumber=?,isbn=?,copies=?,shelf=? WHERE id=?");
  $insert->execute(array($subject,$title,$author,$copyright,$edition,$pagenumber,$isbn,$copies,$shelf,$id));
  ?>
<script type="text/javascript">
alert("Book has been altered");
</script>
<meta http-equiv="refresh" content="0;"/>
  <?php
}
}

public function searchbook($data){
$book=$_POST[$data[0]];

$sql=self::$connect->prepare("SELECT * FROM  book WHERE title LIKE '%".$book."%' OR subject LIKE '%".$book."%'");


if($sql->rowCount() > 0){

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

    header("location:borrow-books?search=".base64_encode($fetch['id']));
}
}else{
  echo "<font style=\"color:#900;padding:5px; margin-left:15px;\">Book not found</font>";
}
}



public function borrowedbooks($data){
$id=$_POST[$data[0]];
$curdate=$_POST[$data[1]];
$retdate=$_POST[$data[2]];
$member=$_POST[$data[3]];
$copies=$_POST[$data[4]];
$bookedcopies=$_POST[$data[5]];


if($bookedcopies>=$copies){
?>
<script type="text/javascript">
alert("All series of this book has already been issued out");
</script>

<?php
}else{

$sqlwer=self::$connect->prepare("SELECT * FROM  borrowedbooks WHERE bookid=? AND memberid=? AND status=1");
$sqlwer->execute(array($id,$member));

if($sqlwer->rowCount() > 0){

?>
<script type="text/javascript">
alert("This book has already been borrowed by you");
</script>

<meta http-equiv="refresh" content="0;url=borrow-books"/>
<?php
}else{

$insert=self::$connect->prepare("INSERT INTO borrowedbooks SET curdate=?,retdate=?, status=1, memberid=?,bookid=?");
$insert->execute(array($curdate,$retdate,$member,$id));
 $addbook=$bookedcopies+1;
$update=self::$connect->prepare("UPDATE book SET status=1, bookedcopies=? WHERE id=?");
$update->execute(array($addbook,$id));
?>
<script type="text/javascript">
alert("The book has just been issued out");
</script>
<meta http-equiv="refresh" content="0;url=borrow-books"/>
<?php
}
}}


public function returnedbooks($data){
$id=$_POST[$data[0]];
$curdate=$_POST[$data[1]];
$retdate=$_POST[$data[2]];
$member=$_POST[$data[3]];
$copies=$_POST[$data[4]];
$bookedcopies=$_POST[$data[5]];

$presentDate=date("d/m/Y");

$sql=self::$connect->prepare("SELECT * FROM  returnedbooks WHERE bookid=? AND memberid=? AND curdate=?");
$sql->execute(array($id,$member,$curdate));

if($sql->rowCount() > 0){
?>
<script type="text/javascript">
alert("This book has already been returned!");
</script>

<?php
}else{

$insert=self::$connect->prepare("INSERT INTO returnedbooks SET bookid=?,memberid=?,curdate=?,retdate=?");
$insert->execute(array($id,$member,$presentDate,$retdate));
$addbook = $bookedcopies-1;
$update=self::$connect->prepare("UPDATE book SET status=0, bookedcopies=? WHERE id=?");
$update->execute(array($addbook,$id));

$delete=self::$connect->prepare("DELETE FROM borrowedbooks WHERE bookid=? AND memberid=? ");
$delete->execute(array($id,$member));

?>
<script type="text/javascript">
alert("The Book has just been returned");
</script>

<meta http-equiv="refresh" content="0;url=return-book"/>
<?php
}
}



public function login_continuer($data){
  $username=$_POST[$data[0]];
  $password=$_POST[$data[1]];
  $sql=SELF::$connect->prepare("SELECT * FROM member WHERE memberid=? AND password=?");
  $sql->execute(array($username,$password));

  $sql2=SELF::$connect->prepare("SELECT * FROM librarian WHERE userid=? AND password=?");
  $sql2->execute(array($username,$password));

if($sql->rowCount() > 0){

$_SESSION['nacoss_user']=$username;
header("location:member/main?user=".base64_encode($username));

}else if($sql2->rowCount() > 0){
  $_SESSION['nacoss_librarian']=$username;
  header("location:librarian/main?user=".base64_encode($username));
}else{
?>
  <script type="text/javascript">
    alert("Wrong password");
  </script>
<?php
}}
}

$nacoss=new nacoss();
