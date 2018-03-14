<?php 
 
 include("config.php");
session_start();  
 

if(!empty($_POST))
{
	$pswd='';
	$new='';
	$old='';
	$enter='';
    $old = mysqli_real_escape_string($connect, $_POST["old"]);  
    $new = mysqli_real_escape_string($connect, $_POST["new"]);
    $enter=md5($old);
	$newpass=md5($new);
		
      $query = "  SELECT * FROM employee WHERE empId = '". $_SESSION['id']."'";  
	  
     $result = mysqli_query($connect, $query);  
      if(mysqli_num_rows($result) > 0)  
      {  
          
           while($row = mysqli_fetch_array($result))
     {
		 $pswd=$row['password'];
		  
		 
	  }
	  
	 
	  }

	  if($enter==$pswd){
		  
		  $query0 = "UPDATE employee SET password='$newpass' WHERE empId='".$_SESSION['id']."'";
	 $result = mysqli_query($connect, $query0); 
	if($result){
		echo 'true';
	}
	  }
	  else{
		echo 'false';
	}
} 
 ?>  