<?php
  
   include("config.php");  
   $data = $_POST["proj_id"];
  
list($subTaskId, $taskId) = explode("-", $data);

			  $query55 = "SELECT * FROM subtask  WHERE  subtaskId = '".$subTaskId."'";  
			 $result55 = mysqli_query($connect, $query55);
			     $row55= mysqli_fetch_array($result55);
				  {
						if($row55['subtaskStatus']=='In-Progress')		
						{
							
							echo'no';
							
						}
						else if($row55['subtaskStatus']=='Completed')		
						{
							
							echo'cmp';
							
						}
						else{
							
							echo'yes';
							
						}
						
				 }
				
				  
?>