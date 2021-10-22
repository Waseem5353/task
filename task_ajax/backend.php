<?php  include "conect.php" ?>
  <?php error_reporting(0); ?>
<?php


 
extract($_POST);
//$name=$_POST['fname'];


if(isset($_POST['fname']) && isset($_POST['phone']) && isset($_POST['city'])){
//if(isset($_POST['fname']) ){
  $q="INSERT into user(uname,phone,location,groups) values('$fname','$phone','$city','$groups')";

  $query=mysqli_query($conn,$q);

  
}
// delete the slected row  ................
if(isset($_POST['deletid']) && $_POST['deletid'] !=''){
  $userid= $_POST['deletid'];
  $delet="DELETE FROM user where id='$userid' ";
  $query=mysqli_query($conn,$delet);
}                               
  //update record..................     
if(isset($_POST['id'])){
    $sql = "UPDATE user SET uname='$name',phone='$phone',location='$city',groups='$groups' where id='$id'";
    $query=mysqli_query($conn,$sql);
    header('location:index.php');
    header('location:index.php');
        
     }
?>