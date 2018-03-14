<?php

   include("config.php");  
 session_start();
 date_default_timezone_set('Asia/Karachi');
 
 $flag=true;
 
 $query2 = "SELECT* from taskassignment  WHERE  empId = '".$_POST["employee_id"]."' ";  
 $result2=mysqli_query($connect, $query2);
 if(mysqli_num_rows($result2)>0){
 While($row=mysqli_fetch_array( $result2)){
	 $flag=false;
	  $query23 = "SELECT* from subtask  WHERE  empId = '".$_POST["employee_id"]."' and taskId='".$row["taskId"]."'";  
 $result23=mysqli_query($connect, $query23);
if(mysqli_num_rows($result23)>0){
	 
	 $flag=false;
	 
	 
 }
 
 }
	if($flag=false){
		
		 
	  echo 'no';
		
		
		
		
	}
	else{
		echo 'yes';
		
	}
	
	
	
	
	?>