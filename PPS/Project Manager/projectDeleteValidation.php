<?php
 
  include("config.php");  
   $query = "SELECT * FROM project WHERE projId = '".$_POST["proj_id"]."'"; 
    $result = mysqli_query($connect, $query);  
     $row = mysqli_fetch_array($result);
	 
	 if($row['projStatus']=='Completed'|| $row['projStatus']=='Pending')
     {
   
   
   
   
   if($row['projStatus']=='Completed'){
	    
	   echo 'cmp';
   }
   else if($row['projStatus']=='Pending'){
	   
	   echo 'pen';
   }
   
   
   
	 
	 }
	 else{
		  $counting=0;
		 if($row['projStatus']=='Not Started')
		 {
			  $query2 = "SELECT * FROM task WHERE projId = '".$_POST["proj_id"]."'"; 
    $result2 = mysqli_query($connect, $query2); 
if(mysqli_num_rows( $result2)>0){	
     while($row2 = mysqli_fetch_array($result2))
	 {
		 $query = "SELECT * FROM taskassignment WHERE taskId = '".$row2["taskId"]."'"; 
    $result = mysqli_query($connect, $query); 
		 if(mysqli_num_rows( $result)>0){
		 
		 $counting++;
		 
		 }
		 
	 }
}	 
			 
			 
		 }
		 
		 
		 if($counting>0) {
			 echo 'no';
			 }
	else{
		echo 'pen';
		
	}


	
	 }
	   
	   
	   
	   ?>