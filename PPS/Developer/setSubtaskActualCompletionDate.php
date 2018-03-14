

<?php
include("config.php");
 session_start(); 

date_default_timezone_set('Asia/Karachi');
if(!$connect){
	echo "connection failed";
	
}

if(!empty($_POST))
{	
		$cDate=date("Y-m-d H:i");
	 
	$query = "
    UPDATE subtask SET
	 
	actualCompletionDate='$cDate', 
	 subtaskStatus='Completed'
	 WHERE subtaskId='".$_POST['subtask_id']."'";  
  $result1=mysqli_query($connect, $query);
  
  $select_query1="SELECT* from subtask WHERE subtaskId = '".$_POST['subtask_id']."'";
	 $result11= mysqli_query($connect, $select_query1);
         $row11= mysqli_fetch_array($result11);
		 $taskId=$row11['taskId'];
  
   $query7 = "
    UPDATE task SET
	actualCompletionDate='$cDate' 	
	  WHERE taskId='".$taskId."'";  
    mysqli_query($connect, $query7);
		   
  $select_query12="SELECT* from subtask WHERE  taskId = '".$taskId."' AND subtaskStatus!='Completed'";
	 $result112= mysqli_query($connect, $select_query12);
          if(mysqli_num_rows($result112)<1)
		   
     {
		 $query = "
    UPDATE task SET
	taskStatus='Completed' 	
	  WHERE taskId='".$taskId."'";  
    mysqli_query($connect, $query);
		   echo 'helloooo';
	 }
  
				$count=0;
				$query = "
    SELECT* from taskAssignment  WHERE empId='".$_SESSION['id']."' ";  
    $result= mysqli_query($connect, $query);
	
	
		$taskId='';
	
	 
		
	 
	
	
	
	 
	
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
	$typeID=$_POST['subtask_id'];
	 $query11 = "SELECT * FROM subtask  WHERE subtaskId='$typeID'";  
				 $result11 = mysqli_query($connect, $query11);
				$row=mysqli_fetch_array($result11);	 
		         $taskName= $row['subtaskName'];
		 
		 $query12 = "SELECT * FROM employee  WHERE position='Project Manager'";  
				 $result12 = mysqli_query($connect, $query12);
				$row12=mysqli_fetch_array($result12);	 
		         $empId= $row12['empId'];
		 
		 
		 
		 
		 $query24 = "INSERT INTO notification (notificationType,notificationTypeId,notificationDetails,receiverId,time,date,senderId)  
     VALUES ('14','$typeID','$taskName','$empId','$time','$date','$id1')";	
		mysqli_query($connect, $query24);
		 
		 
	 
	
}
 



 

}
?>
 
