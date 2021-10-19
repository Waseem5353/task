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
</head>
<body>
		<div class="container">
            <div class="card-body">
               <div class="col-sm-6">
                  <h5 class="card-title">Fields with <span class="text-danger">*</span> are mandatory!</h5>
                  <form id="myform" action="insert1.php" method="post">                    
                   <div class="form-group">
                        <label>Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter name" required value="">
                     </div>
                        <div class="form-group">
                        <label>Mobile <span class="text-danger">*</span></label>
                        <input type="tel" class="tel form-control" name="mobile" id="mobile"  placeholder="Enter mobile" required value="">
                     </div>
                     <div class="form-group">
                      <label >City<span class="text-danger">*</span></label>
                      <select class="form-control" name="city">
                      
                  
                      <option disabled selected> Select city</option>
                     <option  value='karachi' >karachi</option>
                     <option  value='lahore' >lahore</option>
                     <option  value='islamabad'>islamabad</option>
                      </select>               
                   </div>
                     <div class="form-group">
                      <label >Group<span class="text-danger">*</span></label>
                          <select name="category" class="form-control">
                              <option disabled selected> Select Category</option>
                              <?php
                                
                                $sql = "SELECT * FROM groups";

                                $result = mysqli_query($conn, $sql) or die("Query Failed.");

                                if(mysqli_num_rows($result) > 0){
                                  while($row = mysqli_fetch_assoc($result)){
                                    echo "<option value='{$row['id']}'>{$row['name']}</option>";
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

	<div id="responce" >
		
	</div>
	
</div>


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		//$('#display').on('click',function(e){
		function loadtable(){
			$.ajax({
			url:'display1.php',
			type:'post',
			success:function(data){
				$('#responce').html(data);
			}
		});
		}
		//});
		loadtable();
		$('#submit').click(function(){			
		//	var name=$('#name').val();
		//	var mail=$('#email').val();
		//	var number=$('#number').val();
		//	 form= $('#myform');
				$.ajax({
					url:'insert1.php',
					type:'post',
					data:$("#myform input").serialize()
										
			});
			
			});


	});
	// delet ajex
	function checkdlt(deletid){
		var conf=conform(" are u sure");
		if (conf==true) {
			$.ajax({
					url:'insert1.php',
					type:'post',
					data:{deletid:deletid},
					success:function(data,status){
						
					}							
			});
				}	}
</script>
</body>
</html>
