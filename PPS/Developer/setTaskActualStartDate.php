

<?php
include("config.php");
date_default_timezone_set('Asia/Karachi');
session_start(); 
if(!$connect){
	echo "connection failed";
	
}

if(!empty($_POST))
{	
		$sDate=date("Y-m-d H:i");
	
	
	 
	$query = "
    UPDATE task SET
	 
	actualStartDate='$sDate',
      taskStatus='In-Progress' 	
	 
	 WHERE taskId='".$_POST['task_id']."'";  
    $result1=mysqli_query($connect, $query);
$query = "
    UPDATE employee SET workStatus='Active'   WHERE empId='".$_SESSION['id']."' ";  
     mysqli_query($connect, $query);
	
	
	$select_query2="SELECT* from task WHERE taskId = '".$_POST['task_id']."'";
	 $result2 = mysqli_query($connect, $select_query2);
         $row2 = mysqli_fetch_array($result2);   
						 
		$select_query21="SELECT* from project WHERE projId = '".$row2['projId']."'";
	 $result21 = mysqli_query($connect, $select_query21);
         $row21 = mysqli_fetch_array($result21);   
	if($row21['projStatus']=='Not Started'){
		$query = "
    UPDATE project SET
	 projStatus='In-Progress' 	
	  WHERE projId='".$row21['projId']."'";  
    mysqli_query($connect, $query);
		
		
	}
	
	
	
	
	
///////////////////////////////////////
//////////////notification send////////
///////////////////////////////////////
if($result1){
	echo 'asd';
$id1 =$_SESSION['id'];
$date = date("Y-m-d");
$time = date("h:i:sa");
	$typeID=$_POST['task_id'];
	 $query11 = "SELECT * FROM task  WHERE taskId='$typeID'";  
				 $result11 = mysqli_query($connect, $query11);
				$row=mysqli_fetch_array($result11);	 
		         $taskName= $row['taskName'];
		 
		 $query12 = "SELECT * FROM employee  WHERE position='Project Manager'";  
				 $result12 = mysqli_query($connect, $query12);
				$row12=mysqli_fetch_array($result12);	 
		         $empId= $row12['empId'];
		 
		 
		 
		 
		 $query24 = "INSERT INTO notification (notificationType,notificationTypeId,notificationDetails,receiverId,time,date,senderId)  
     VALUES ('13','$typeID','$taskName','$empId','$time','$date','$id1')";	
		mysqli_query($connect, $query24);
		 
		 
	 
	
}
}
?>
 
