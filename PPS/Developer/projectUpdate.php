

<?php
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
    $completionDate = mysqli_real_escape_string($connect, $_POST["completionDate"]);
      $teamId = mysqli_real_escape_string($connect, $_POST["teamId1"]);
    $projStatus = mysqli_real_escape_string($connect, $_POST["projStatus"]);
       $description = mysqli_real_escape_string($connect, $_POST["description"]);
    $projId = mysqli_real_escape_string($connect, $_POST["proj_id"]);
 
$date = date("Y-m-d");

	 if($teamId=='Un Assign'){
		 $query = "
    UPDATE project SET
	projName='$projName',
	deadline='$deadline',
	description='$description', 
	startDate='$startDate',
	completionDate='$completionDate', 
	projStatus='$projStatus'
	 
	 WHERE projId='". $projId."'";  
	  $result=mysqli_query($connect, $query);
	 }
	 else{
		 $query = "
    UPDATE project SET
	projName='$projName',
	deadline='$deadline',
	description='$description', 
	startDate='$startDate',
	completionDate='$completionDate', 
	projStatus='$projStatus'
	 assignmentDate='$date'
	 WHERE projId='". $projId."'";  
	  $result=mysqli_query($connect, $query);
		$query6 = " INSERT INTO projectassignment(teamId,projId)  VALUES ('$teamId', '$projId')";
	 mysqli_query($connect, $query6);  
	 
       
         
	
}
    if($result)
    {
		
			  
		
   
    echo 'Project Updated';
	
}}
?>
 