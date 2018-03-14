

<?php 
  session_start();
include("config.php");
date_default_timezone_set('Asia/Karachi');
if(!$connect){
	echo "connection failed";
	
}

if(!empty($_POST))
{    
  $projName = mysqli_real_escape_string($connect, $_POST["projName"]);  
     $deadline = mysqli_real_escape_string($connect, $_POST["deadline"]);
     $startDate = mysqli_real_escape_string($connect, $_POST["startDate"]);
   
    $teamId = mysqli_real_escape_string($connect, $_POST["teamId1"]);
    $projStatus = mysqli_real_escape_string($connect, $_POST["projStatus"]);
        $description = mysqli_real_escape_string($connect, $_POST["description"]);
     $projId = mysqli_real_escape_string($connect, $_POST["proj_id"]);
	  $projLanguage = mysqli_real_escape_string($connect, $_POST["projLanguage2"]);
  $in_proj_date = mysqli_real_escape_string($connect, $_POST["in_proj_date"]);
  
	  
$date = date("Y-m-d");
 $task_flag=true;
 $assign_flag=true;
 $deadline_flag=true;
  if($projStatus=='Completed')
  {
	   
	   
	   $query = "SELECT * FROM task WHERE projId = '$projId' and taskStatus!='Completed'" ;  
      $result = mysqli_query($connect, $query);  
	  if(mysqli_num_rows( $result )>0){
    while($row = mysqli_fetch_array($result))
     {
		  
   $query2 = "SELECT * FROM subtask WHERE taskId = '".$row["taskId"]."' AND subtaskStatus!='Completed'";  
      $result2 = mysqli_query($connect, $query2);  
	  if(mysqli_num_rows($result2)>0){
 
     $task_flag=false;
   $assign_flag=false;
	 }
	 
	 }
	  $task_flag=false;
	   $assign_flag=false;
	 }
	   
	   
	  
}

  $sql="SELECT MAX(`deadline`)  FROM `task` where projId='$projId'";
 $result = mysqli_query($connect, $sql);
   $row = mysqli_fetch_array($result);
   if(mysqli_num_rows($result)>0){
	 
	 $task_deadline=$row[0];
  if($deadline<$task_deadline){
	  
	  $deadline_flag=false;
	  
  }
 
   }
if($task_flag==false)
{
	echo'0';
	
}
 
else if($assign_flag==false)
{
	echo'1';
	
}
else if($deadline_flag==false){
	
	echo'2';
	
}

else {
	
	echo 'yes';
}

}
?>
 