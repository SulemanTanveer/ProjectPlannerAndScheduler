<?php
 
   include("config.php");  
  
$emp = $_POST["emp_id"];
$team= $_POST["team_id"];

 $query1 = "INSERT INTO teammember(teamId,empId)  VALUES ('$team', '$emp')";
				 
				if(mysqli_query($connect, $query1)){
					
					echo 'Yes';
				}
	?>