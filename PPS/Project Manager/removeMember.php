<?php

 
   include("config.php");  
  
  
$emp = $_POST["emp_id"];
$team= $_POST["team_id"];


				$count=0;
				$query = "
  SELECT* from taskAssignment  WHERE empId='".$emp."' ";  
 $result= mysqli_query($connect, $query);
 if(mysqli_num_rows($result)>0){
	  			 
while($row=mysqli_fetch_array($result)){
	
	$query1 = "  SELECT* from task  WHERE taskId='".$row['taskId']."' and taskStatus!='Completed'";  
 $result1= mysqli_query($connect, $query1);
	 if(mysqli_num_rows($result1)>0){
	  $count++;
	 
	 }
	$query2 = "SELECT* from subtask  WHERE empId='".$emp."' and taskId='".$row['taskId']."' and subtaskStatus!='Completed'";  
    $result2= mysqli_query($connect, $query2);
	 if(mysqli_num_rows($result2)>0){
				 $count++;
			 
				 }
	 
	}			 
	 }
 
 if($count==0){
$query = "DELETE FROM teammember WHERE teamId = '".$team."' AND empId = '".$emp."' ";  
 $result= mysqli_query($connect, $query);  
    
	if( $result){
		
		echo 'Yes';
 }}
	else{ 
		echo 'No';
	}
	?>