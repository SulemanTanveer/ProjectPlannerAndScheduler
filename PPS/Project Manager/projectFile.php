<?php
 
 session_start();
include("config.php");
date_default_timezone_set('Asia/Karachi');

if(!$connect){
	echo "connection failed";
	
}
$flag = '0';
if(!empty($_FILES))
{
	$typeId=$_POST['id1'];
	 
	 	
$time = date("h:i:sa");
$date = date("Y-m-d");
$id =$_SESSION['id']; 
$new_name='';  
                $sourcePath='';  
                $targetPath='';  
   if(is_array($_FILES))  
 {  
      foreach($_FILES['filei']['name'] as $name => $value)  
      {  
           
		   $file_name = explode(".", $_FILES['filei']['name'][$name]);  
           
              $new = $value;  
                $new_name = rand() . '.'. $file_name[1];  
                $sourcePath = $_FILES["filei"]["tmp_name"][$name];  
                $targetPath = "../files/projectfiles/".$new_name;  
			    
                move_uploaded_file($sourcePath, $targetPath);  
		
$query2 = "INSERT INTO projectfiles(fileName,filePath,uploadDate,uploadTime,projId,attachedBy)  
     VALUES ('$new', '$targetPath', '$date','$time','$typeId','$id')";	
		
	if(mysqli_query($connect, $query2)){
		echo'File Attached';
		
	 $query225 = "SELECT * from project  WHERE projId='$typeId'";
	
	$result225=mysqli_query($connect, $query225);
	$row225=mysqli_fetch_array($result225);
	$projname=$row225['projName'];
	$query22 = "SELECT teamId from projectassignment WHERE projId='$typeId'";
	
	$result22=mysqli_query($connect, $query22);
	
	$row22=mysqli_fetch_array($result22);
	$teamId=$row22['teamId'];
	
	$query222 = "SELECT* from teammember  WHERE teamId='$teamId'";
	
	$result222=mysqli_query($connect, $query222);
	 
	while($row222=mysqli_fetch_array($result222)){
		$empId=$row222['empId'];
		
		
	$query24 = "INSERT INTO notification (notificationType,notificationTypeId,notificationDetails,receiverId,time,date,senderId)  
     VALUES ('1','$typeId','$new','$empId','$time','$date','$id')";	
		mysqli_query($connect, $query24);
		
	}
	
	
	
	
	}	
	










		
           
      }  
    
 }
 
 

  
	
}

else
	echo 'File Not Attached';

   
	
	
?>