
<?php error_reporting(0); ?>

 <?php  include 'conect.php'?>
<?php 

   	$q="SELECT * FROM bloods";
   	$query=mysqli_query( $conn,$q);
    $data="";
   	if(mysqli_num_rows($query) > 0){
       $data=" <table style='height:15px' class='table table-striped table-bordered text-center'>
        <thead>
            <th>id</th>
            <th>name</th>
            <th>mobile</th>
            <th>city</th>
            <th>Group</th>
            <th scope='col'>Update</th>
                <th scope='col'>Delet</th>
        </thead>
         <tbody >";
        
   		while ($result= mysqli_fetch_array($query)) {
   			
   		$data.= "
                <tr>
   				<td>".$result['id']."</td>
   				<td>".$result['name']."</td>
   				<td>". $result['mobile']."</td>
                <td>". $result['location']."</td>
                <td>". $result['groups']."</td>

                <td><a href='update.php?id=$result[id]' >Edit</a></td>
             <td><a href='insert1.php?id={$result['id']}' onclick='checkdlt({$result['id']})'>Delet</a></td>
   			</tr>
            ";  			
   		}
        $data.="</tbody>
            </table>";
        echo $data;
   	}

    
?>