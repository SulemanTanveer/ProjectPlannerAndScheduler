<?php
 
include("config.php");
    
 session_start();  
 
if(isset($_SESSION['username']))  {
                                              
		$output = '';								
										
      
$query = "SELECT * FROM `notification` WHERE receiverId='".$_SESSION['id']."'";  

$result = mysqli_query($connect, $query);
		
$count1 = mysqli_num_rows($result);
$query = "SELECT * FROM `notification` WHERE receiverId='".$_SESSION['id']."' AND seen='1' ";  


$result = mysqli_query($connect, $query);
		
$count2 = mysqli_num_rows($result);
$query = "SELECT * FROM `notification` WHERE receiverId='".$_SESSION['id']."' AND seen='0' ";  

$result = mysqli_query($connect, $query);
		
$count3 = mysqli_num_rows($result);
	
	 $array[] =array();
	  $array[0]=$count1;
	   $array[1]=$count2;
	   $array[2]=$count3;	
         echo json_encode($array);
	 
	 }