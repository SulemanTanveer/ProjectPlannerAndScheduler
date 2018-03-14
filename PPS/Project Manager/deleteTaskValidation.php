<?php

    include("config.php");  
   $data = $_POST["proj_id"];
  
list($task, $proj) = explode("-", $data);

			  $query55 = "SELECT * FROM task  WHERE  taskId = '".$task."'";  
			 $result55 = mysqli_query($connect, $query55);
			     $row55= mysqli_fetch_array($result55);
				  {
						if($row55['taskStatus']=='In-Progress')		
						{
							
							echo'no';
							
						}
						else if($row55['taskStatus']=='Completed')		
						{
							
							echo'cmp';
							
						}
						else{
							
							echo'yes';
							
						}
						
				 }
				
				  
?>