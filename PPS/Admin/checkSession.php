

<?php    
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
include("config.php");
if(isset($_SESSION['username']))  
                {  
                   
                 
				   $query = "  SELECT * FROM employee WHERE empId = '". $_SESSION['id']."'";  
					$result = mysqli_query($connect, $query);  
     
					while($row = mysqli_fetch_array($result))
					 {
						 $position=$row['position'];
						  
						 if($position=='Project Manager'){
							  header('Location:../Project Manager/dashboard.php');
						 }
						 
						 else if($position=='Developer'){
							  header('Location:../Developer/project.php');
						 }
					 }

				}
   else{
	   
	   header('Location:../index.php');
   } 

   ?>