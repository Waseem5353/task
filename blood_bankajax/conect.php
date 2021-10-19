<?php 
	$username="root";
	$password ="";
	$server ='localhost';
	$db ='blood_bank';
	$conn = mysqli_connect($server,$username,$password,$db);
	if($conn){
		// echo "connection successful";

		?>
		<script > 
      

		</script>

		<?php
	}else{
		// echo "no connection";
		die("no connection" . mysqli_connect_error());
	}
?>