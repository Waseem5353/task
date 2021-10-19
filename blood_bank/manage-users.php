<?php
include('database.php');
$obj=new query();


$name='';
$phone='';
$city='';
$groups='';

if(isset($_GET['id']) && $_GET['id']!=''){
	$id=$obj->get_safe_str($_GET['id']);
	$condition_arr=array('id'=>$id);
	$result=$obj->getData('bloods','*',$condition_arr);
	$name=$result['0']['name'];
	$phone=$result['0']['phone'];
	$city=$result['0']['location'];
   $groups=$result['0']['groups'];
}

if(isset($_POST['submit'])){
	$name=$obj->get_safe_str($_POST['name']);
	$city=$obj->get_safe_str($_POST['city']);
	$mobile=$obj->get_safe_str($_POST['mobile']);
	$group=$obj->get_safe_str($_POST['group']);

	$condition_arr=array('name'=>$name,'phone'=>$mobile,'location'=>$city,'groups'=>$group);
	
	if($id==''){
		$obj->insertData('bloods',$condition_arr);
	}else{
		$obj->updateData('bloods',$condition_arr,'id',$id);
	}
	
	//header('location:users.php');
	?>
	<script>
	window.location.href='users.php';
	</script>
	<?php
}
?>
<!doctype html>
<html lang="en-US">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>blood bank</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
      
	  <style>
		.container{margin-top:15px;}
	  </style>
   </head>
   <body>
      
      <div class="container">
         <div class="card">
            <div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Add User</strong> <a href="users.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Browse Users</a></div>
            <div class="card-body">
               <div class="col-sm-6">
                  <h5 class="card-title">Fields with <span class="text-danger">*</span> are mandatory!</h5>
                  <form method="post">
                     <div class="form-group">
                        <label>Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter name" required value="<?php echo $name?>">
                     </div>
                        <div class="form-group">
                        <label>Mobile <span class="text-danger">*</span></label>
                        <input type="tel" class="tel form-control" name="mobile" id="mobile"  placeholder="Enter mobile" required value="<?php echo $phone?>">
                     </div>
                     <div class="form-group">
                      <label >City<span class="text-danger">*</span></label>
                      <select class="form-control" name="city">
                      <?php 
                      if($city =='karachi'){
                      echo  "<option > Select city</option>";
                       echo "<option  value='karachi' selected>karachi</option>";
                      echo " <option  value='lahore'>lahore</option>";
                      echo "<option  value='islamabad'>islamabad</option>";
                   }
                   if ($city =='islamabad') {
                      echo  "<option > Select city</option>";
                       echo "<option  value='karachi' >karachi</option>";
                      echo " <option  value='lahore'>lahore</option>";
                      echo "<option  value='islamabad' selected>islamabad</option>";
                   }
                    if ($city =='lahore') {
                      echo  "<option > Select city</option>";
                       echo "<option  value='karachi' >karachi</option>";
                      echo " <option  value='lahore' selected>lahore</option>";
                      echo "<option  value='islamabad' selected>islamabad</option>";
                   }
                   else{
                      echo  "<option > Select city</option>";
                       echo "<option  value='karachi' >karachi</option>";
                      echo " <option  value='lahore' >lahore</option>";
                      echo "<option  value='islamabad'>islamabad</option>";
                   }

                      ?>
                      </select>               
                   </div>
                      <div class="form-group">
                      <label >Blood Group<span class="text-danger">*</span></label>
                      <select class="form-control" name="group">
                        <option > Select blood group</option>
                        <?php 
                        $result=$obj->getData('groups','*');

                        foreach($result as $row){
                          // echo $row['name'] ; 
                        if($id==''){
                         echo "<option value='{$row['id']}'>".$row['name']."</option>";
                           }
                        else{
                         echo "<option value='{$row['id']}' selected>".$row['name']."</option>";
                         }
                        }
                        ?>
                      </select>
                     </div>
                     <div class="form-group"> 
                     <button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i>add user</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
      <script src="https://cdn.jsdelivr.net/jquery.caret/0.1/jquery.caret.js"></script>
   </body>
</html>