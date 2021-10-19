<?php  include "conect.php" ?>
<?php error_reporting(0); ?>
<?php 
extract($_POST);
$name=$_POST['name'];
$city=$_POST['city'];
$groups=$_POST['group'];
$mobile=$_POST['mobile'];

if(isset($_POST['submit']))
{

	$q="INSERT into bloods (name,phone,location,groups) values('$name','$mobile','$city','$group')" or die("not coreect");
	$query=mysqli_query($conn,$q);

	header('location:index.php');
	
}
if(isset($_POST['id']) && $_POST['id'] !=''){
	$userid= $_POST['id'];
	$delet="DELETE FROM bloods where id='$id' ";
	$query=mysqli_query($conn,$q);
	header('location:index12.php');
}
?>
