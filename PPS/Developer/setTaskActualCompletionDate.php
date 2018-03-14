

<?php
include("config.php");
date_default_timezone_set('Asia/Karachi');
 session_start(); 
if(!$connect){
	echo "connection failed";
	
}

if(!empty($_POST))
{	
		 $cDate=date("Y-m-d H:i");
	
	
	 
	$query = "
    UPDATE task SET
	 
	actualCompletionDate='$cDate',
	taskStatus='Completed'
	 
	 WHERE taskId='".$_POST['task_id']."'";  
   $result1= mysqli_query($connect, $query);

				$count=0;
				$query = "
    SELECT* from taskAssignment  WHERE empId='".$_SESSION['id']."' ";  
    $result= mysqli_query($connect, $query);
while($row=mysqli_fetch_array($result)){
	
	$query2 = "SELECT* from subtask  WHERE empId='".$_SESSION['id']."' and taskId='".$row['taskId']."' and actualCompletionDate='0000-00-00 00:00:00' and actualStartDate!='0000-00-00 00:00:00'";  
    $result2= mysqli_query($connect, $query2);
	 if(mysqli_num_rows($result2)>0){
				 $count++;
				 
				 
				 }
	else{
		$query3 = "SELECT* from task Where taskId='".$row['taskId']."' and actualCompletionDate='0000-00-00 00:00:00' and actualStartDate!='0000-00-00 00:00:00'";  
    $result3= mysqli_query($connect, $query3);
	 if(mysqli_num_rows($result3)>0){
				 $count++;
				 
				 
				 }
		
		
}}
  
  if($count==0) {
$query = "
    UPDATE employee SET workStatus='In-Active'   WHERE empId='".$_SESSION['id']."' ";  
     mysqli_query($connect, $query);
	 echo '0';
  }
else{
	
	echo '1';
}
///////////////////////////////////////
//////////////notification send////////
///////////////////////////////////////
if($result1){
	
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
     VALUES ('12','$typeID','$taskName','$empId','$time','$date','$id1')";	
		mysqli_query($connect, $query24);
		 
		 
	 
	
}





}
?>
 
