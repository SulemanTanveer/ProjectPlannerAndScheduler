   <?php  
 
 include("config.php");
 if(isset($_POST["msg_id"]))  
 {  
      $query = "SELECT * FROM inbox WHERE id = '".$_POST["msg_id"]."'";  
      $result = mysqli_query($connect, $query);  
			  
		while ($row = mysqli_fetch_array($result)){
		  $id = $row['sender']; 
		 
		  $query2 = "SELECT * FROM employee WHERE empId = '".$id."'";  
      $result2 = mysqli_query($connect, $query2);  
			  
		while ($row2 = mysqli_fetch_array($result2)){
		  $email = $row2['email']; 
		  
		}
		
		}
		
	

      echo $email;  
 }  
 ?>