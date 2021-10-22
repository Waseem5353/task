<?php 
	$username="root";
	$password ="";
	$server ='localhost';
	$db ='ajax';
	$conn = mysqli_connect($server,$username,$password,$db);
	if($conn){
		// echo "connection successful";
	}else{
		// echo "no connection";
		die("no connection" . mysqli_connect_error());
	}
?>
 










