<?php

 
   include("config.php");  
  
$id = $_POST["task_id2"];  
$empId = $_POST["proj_id"];



$query = "SELECT * from subtaskassignment where empId ='$empId' and subtaskId='$id'";
$result=mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0){
	
	 echo 'No';
}
else {
$query1 = "INSERT INTO subtaskassignment(subtaskId,empId)  VALUES ('$id', '$empId')";
$workStatus='Active';
$taskId='';
$subtaskHours='';
$taskHours='';

 $query33= "SELECT * FROM subtask  WHERE subtaskId='$id'"; 
$result33 = mysqli_query($connect, $query33);
				while($row3=mysqli_fetch_array($result33)){
					$taskId=$row3['taskId'];
					$subtaskHours=$row3['subtaskHours'];
				}
 $query12 = "SELECT*  FROM task  WHERE taskId='$taskId'";  
				 $result12 = mysqli_query($connect, $query12);
				while($row2=mysqli_fetch_array($result12)){
					$taskHours=$row2['taskHours'];
				}
				

				
				$query11 = "SELECT * FROM employee  WHERE empId='$empId'";  
				 $result11 = mysqli_query($connect, $query11);
				while($row=mysqli_fetch_array($result11)){
					
					   $row['workHours']+$taskHours;
					$val=$row['workHours']-$subtaskHours;
					 $query2 = "UPDATE employee SET workStatus='$workStatus',workHours='$val' WHERE empId='$empId'";  
				     mysqli_query($connect, $query2);  
				
				}






				 
				 
				
				 if(mysqli_query($connect, $query1)){
					 
					 echo 'Yes';
				 }
				  
				
}
	?>