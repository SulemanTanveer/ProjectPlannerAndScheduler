<?php  
 session_start();
 date_default_timezone_set('Asia/Karachi'); 
$connect = mysqli_connect("localhost", "root", "", "PPS");
 if(isset($_POST["username"]))  
 {    $position=''; 

		$pswd=md5($_POST["password"]);
		
      $query = "  SELECT * FROM employee WHERE email = '".$_POST["username"]."'  AND password='$pswd'  ";  
	  
     $result = mysqli_query($connect, $query);  
      if(mysqli_num_rows($result) > 0)  
      {  
           $_SESSION['username'] = $_POST['username']; 
		    
           while($row = mysqli_fetch_array($result))
     {
		 $position=$row['position'];
		  $_SESSION['name'] = $row['empName'];
		   $_SESSION['id'] = $row['empId'];
		 
	 }

		  echo $position;  
      }  
      else  
      {  
           echo 'No';  
      }  
 }
 
  
 ?>  