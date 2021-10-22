
<?php  include "conect.php" ?>
<!DOCTYPE html>
<html>
<head>
	<title>ajex</title>

	  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
</head>
<body>

<div class="container">
	<h1 class="text-primary text-uppercase text-center">Blood bank</h1>
	
	<div class="d-flex justify-content-end"> 
		<!-- Button to Open the Modal -->
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Open modal
</button>
	</div>
  
<h2 class="text-primary">all recode:</h2>
<div id="records_contant">
	
</div>

<!-- The Modal -->
  <form>
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add User</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->    
     <div class="modal-body">
       <div class="form-group">
        	
        	<label>first name:</label>
        	<input type="text" name="fname" id="fname" class="form-control" placeholder="name">
        </div> 
        <div class="form-group">
        	<label>Mobile:</label>
        	<input type="Mobile" name="phone" id="phone" class="form-control" placeholder="name">
        </div>
         <div class="form-group">
                      <label >City</label>
                      <select class="form-control" id="city" name="city">
                      
                  
                      <option disabled selected> Select city</option>
                     <option  value='karachi' >karachi</option>
                     <option  value='lahore' >lahore</option>
                     <option  value='islamabad'>islamabad</option>
                      </select>               
                   </div> 
          <div class="form-group">
             <label >Group</label>
              <select name="group" id="groups" class="form-control">
               <option disabled selected> Select group</option>
                              <?php
                                
                                $sql = "SELECT * FROM blood";

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
        <button type="submit" class="btn btn-danger" data-dismiss="modal" Onclick="addRecord()">save</button>        
      </div> 
</div><!-- modal body end  -->
</form>
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
		$(document).ready(function(){
			loadtable();
});
		function loadtable(){
			$.ajax({
			url:'display.php',
			type:'post',
			success:function(data){
				$('#records_contant').html(data);
			}
		});
		}
		loadtable();
function addRecord(){
		var firstname=$('#fname').val();
		var phone=$('#phone').val();
		var city=$('#city').val();
		var groups=$('#groups').val();
		$.ajax({
			url:"backend.php",
			type:'post',
	data:{fname:firstname,phone:phone,city:city,groups:groups},
	//data:{fname:firstname},
			success:function(data,status){
				loadtable();
			}
		});
	}
// delete record 
function deletedata(deletid){

			$.ajax({
					url:'backend.php',
					type:'post',
					data:{deletid:deletid},
					success:function(data,status){
						loadtable();
					}							
			});	
		}

</script>
</body>
</html>