<?php error_reporting(0); ?>
 <?php  include 'conect.php'?>
 
<!DOCTYPE html>
<html>
<head>
	<title>ajax</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
<style>
        .container{margin-top:15px;}
      </style>
</head>
<body>
     <?php 
    $id= $_GET['id'];
    echo $id;
    //$q = "SELECT user.id,user.uname, user.phone,user.location,user.groups,blood.name FROM user
     // LEFT JOIN blood ON user.groups = blood.id 
        //Where user.id='$id' ";
    $q="SELECT * FROM user where id='$id '";
   $query=mysqli_query( $conn,$q);
    if(mysqli_num_rows($query) > 0){
    while($result= mysqli_fetch_array($query)){
         $id=$result['id'];
         $uname=$result['uname'];
         $phone=$result['phone'];
         $city=$result['location'];
         $groups=$result['groups'];
         }} 
 ?>
      <div class="container">
         <div class="card">
            <div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>update User</strong> <a href="index.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i>Back Users</a></div>
            <div class="card-body">
               <div class="col-sm-6">
                  <h5 class="card-title">Fields with <span class="text-danger">*</span> are mandatory!</h5>
                  <form method="">
                    <div class="form-group">
                        <input type="text" hidden name="id" id="id"  value="<?php echo $id?>">
                     </div>

                     <div class="form-group">
                        <label>Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter name" required value="<?php echo $uname ?>">
                     </div>


                        <div class="form-group">
                        <label>Mobile <span class="text-danger">*</span></label>
                        <input type="tel" class="tel form-control" name="mobile" id="phone"  placeholder="Enter mobile" required value="<?php echo $phone ?>">
                     </div>
                     <div class="form-group">
                      <label >City<span class="text-danger">*</span></label>
                      <select class="form-control" required id="city" name="city">
                      <?php 
                      if($city =='karachi'){
                      echo  "<option disabled> Select city</option>";
                       echo "<option  value='karachi' selected>karachi</option>";
                      echo " <option  value='lahore'>lahore</option>";
                      echo "<option  value='islamabad'>islamabad</option>";
                   }
                   elseif ($city =='islamabad') {
                      echo  "<option disabled> Select city</option>";
                       echo "<option  value='karachi' >karachi</option>";
                      echo " <option  value='lahore'>lahore</option>";
                      echo "<option  value='islamabad' selected>islamabad</option>";
                   }
                    elseif ($city =='lahore') {
                      echo  "<option disabled> Select city</option>";
                       echo "<option  value='karachi' >karachi</option>";
                      echo " <option  value='lahore' selected>lahore</option>";
                      echo "<option  value='islamabad'>islamabad</option>";
                   }
                   else{
                      echo  "<option disabled > Select city</option>";
                       echo "<option  value='karachi' >karachi</option>";
                      echo " <option  value='lahore' >lahore</option>";
                      echo "<option  value='islamabad' >islamabad</option>";
                   }
                ?>
                      </select>               
                   </div>
                      <div class="form-group">
                      <label >Blood Group<span class="text-danger">*</span></label>
                      <select class="form-control" id="groups" name="group">
                        <option  disabled> Select blood group</option>
                         <?php
                                
                                $sql = "SELECT * FROM blood";

                                $result1 = mysqli_query($conn, $sql) or die("Query Failed.");

                                if(mysqli_num_rows($result1) > 0){
                  while($row = mysqli_fetch_assoc($result1)){
                    
                        if($row['id'] == $id ){
                          $selected = "selected";
                          echo  $selected; 
                        }else{
                          $selected = "";
                        } 
                      echo $selected;
                         echo "<option value='{$row['id']}' {$selected}>".$row['name']."</option>";
                         
                        }}
                     ?>
                      </select>
                     </div>
                      <div class="form-group"> 
                     <button type="button" name="submit" onclick="upRecord()" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i>add user</button>
                     </div>
                     </div>
                </form>
               </div>
            </div>
         </div>
      </div>
		

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script type="text/javascript">

		function upRecord(){
		var firstname=$('#name').val();
		var id=$('#id').val();
        var phone=$('#phone').val();
        var city=$('#city').val();
		var groups=$('#groups').val();
		$.ajax({
			url:"backend.php",
			type:'post',
			data:{name:firstname,id:id,phone:phone,city:city,groups:groups},
			success:function(data,status){
}
		});
	}

</script>


</body>
</html>
   