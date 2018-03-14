<?php
session_start();
date_default_timezone_set('Asia/Karachi');
include("config.php");
if(!$connect){
	echo "connection failed";
	
}
$flag = '0';
if(!empty($_FILES))
{
	$typeId=$_POST['id2'];
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
           $allowed_extension = array("jpg", "jpeg", "png","txt","pdf","docx", "gif");  
               $new = $value;  
                $new_name = rand() . '.'. $file_name[1];  
                $sourcePath = $_FILES["filei"]["tmp_name"][$name];  
                $targetPath = "../files/taskfiles/".$new_name;  
			    
                move_uploaded_file($sourcePath, $targetPath);  
			$query2 = "INSERT INTO taskfiles(fileName,filePath,uploadDate,uploadTime,taskId,attachedBy)  
     VALUES ('$new', '$targetPath', '$date','$time','$typeId','$id')";	
		
	if(mysqli_query($connect, $query2)){
		echo'File Attached';
		
		 
	
	$query222 = "SELECT* from taskassignment  WHERE taskId='$typeId' AND empId!='$id'";
	
	$result222=mysqli_query($connect, $query222);
	 
	while($row222=mysqli_fetch_array($result222)){
		$empId=$row222['empId'];
		
		
	$query24 = "INSERT INTO notification (notificationType,notificationTypeId,notificationDetails,receiverId,time,date,senderId)  
     VALUES ('2','$typeId','$new','$empId','$time','$date','$id')";	
		mysqli_query($connect, $query24);
		
	}
	
$query12 = "SELECT * FROM employee  WHERE position='Project Manager'";  
				 $result12 = mysqli_query($connect, $query12);
				$row12=mysqli_fetch_array($result12);	 
		         $empId25= $row12['empId'];
		
		
	$query25 = "INSERT INTO notification (notificationType,notificationTypeId,notificationDetails,receiverId,time,date,senderId)  
     VALUES ('2','$typeId','$new','$empId25','$time','$date','$id')  ";	
		mysqli_query($connect, $query25);
		
	
	
	
	}	
          
      }  
    
 }

  
	
	
}

else
	echo 'File Not Attached';

   
	
	
?>