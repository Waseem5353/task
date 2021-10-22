
<?php error_reporting(0); ?>

 <?php  include 'conect.php'?>
<?php 
 $sql = "SELECT user.id, user.uname, user.phone,user.location,
        user.groups,blood.name FROM user
        LEFT JOIN blood ON user.groups = blood.id ";
   	//$sql="SELECT * FROM user";
   	$query=mysqli_query( $conn,$sql);
    $data="";
   	if(mysqli_num_rows($query) > 0){
       $data=" <table class='table table-striped table-bordered text-center'>
        <thead  class='bg-primary text-white'>
            <th>id</th>
            <th>name</th>
            <th>mobile</th>
            <th>City</th>
            <th>group</th>
            <th scope='col'>Update</th>
                <th scope='col'>Delet</th>
        </thead>
         <tbody >";
        $a=1;
   		while ($result= mysqli_fetch_array($query)) {
   		$data.= "
                <tr>
   				<td>".$a."</td>
   				<td>".$result['uname']."</td>
   				<td>".$result['phone']."</td>
   				<td>". $result['location']."</td>
                <td>". $result['name']."</td>
                <td><a href='update.php?id=$result[id]' >Edit</a></td>
                
                <td><button onclick=deletedata(".$result['id'].") class='btn '>delete</button></td>                
                
            
   			</tr>";
            $a++; 			
   		}
        $data.="</tbody>
            </table>";
        echo $data;
   	}
?>