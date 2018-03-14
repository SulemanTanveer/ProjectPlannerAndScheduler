

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
  $orginal_language = mysqli_real_escape_string($connect, $_POST["orginal_language"]);
  
  
$date = date("Y-m-d");







function dayCount($from, $to) {
    $first_date = strtotime($from);
    $second_date = strtotime($to);
  $days_diff = $second_date - $first_date;
  
       $s= $days_diff/3600;
	  return  $s= $s/24;
}

 if($projLanguage!=$orginal_language ) {
	 
	 
	 
	  $query1 = "SELECT* FROM `metric` WHERE `pID` = '".$projId."'";  
     $result1 = mysqli_query($connect, $query1);  
	  
	   if(mysqli_num_rows( $result1)>0)
	  { 
  while($row = mysqli_fetch_array($result1))
     {
    
    
	if($row['type']=='actual')
	{
	 $query = "DELETE FROM actualmetrics  WHERE mID = '".$row["mID"]."'";  
     $result = mysqli_query($connect, $query);  
     
	}
	
	
	else if($row['type']=='fp')
	{
	 $query = "DELETE FROM fp_metric  WHERE mID = '".$row["mID"]."'";  
     $result = mysqli_query($connect, $query);  
     
	}
	
	else if($row['type']=='ucp')
	{
	 $query = "DELETE FROM ucp_metric  WHERE mID = '".$row["mID"]."'";  
     $result = mysqli_query($connect, $query);  
     
	}
	else if($row['type']=='ee')
	{
	 $query = "DELETE FROM ee_metric  WHERE mID = '".$row["mID"]."'";  
     $result = mysqli_query($connect, $query);  
     
	}
		else if($row['type']=='cocomo')
	{
	 $query = "DELETE FROM cocomo_metric  WHERE mID = '".$row["mID"]."'";  
     $result = mysqli_query($connect, $query);  
     
	}
	
	
	
	  }
	  $query = "DELETE FROM  metric  WHERE pID = '".$_POST["proj_id"]."'";  
     $result = mysqli_query($connect, $query);  
	  
	  
	  
	  }
	 
	 
	 
	 
 }














  if($projStatus=='Completed')
  {
	   
	   
	   $in_proj_date = mysqli_real_escape_string($connect, $_POST["in_proj_date"]);
  $size = mysqli_real_escape_string($connect, $_POST["size"]);
     $ucp = mysqli_real_escape_string($connect, $_POST["UCP"]);
	  $funcPoint = mysqli_real_escape_string($connect, $_POST["FunctionPoint"]);
   $cost = mysqli_real_escape_string($connect, $_POST["cost"]);
	   
	   
	   
	   
	   $query1 = "
    UPDATE project SET
	completionDate='$date' 
	WHERE projId='". $projId."'";  
	$resulttt=mysqli_query($connect, $query1);
	  
 
 $query5 = "
    UPDATE team SET
	teamStatus='In-Active' 
	 WHERE teamId='". $teamId."'";  
mysqli_query($connect, $query5);

	 


//////////////////////////////////////

$strt= strtotime($in_proj_date);
$end = strtotime($date);
$datediff =  $end-$strt;
$final_date= floor($datediff / (60 * 60 * 24));

$final_date=$final_date+1;
 $seconds1=0;
  $seconds=0;
	 $query = "SELECT * FROM task WHERE projId = '$projId'";  
      $result = mysqli_query($connect, $query);  
    while($row = mysqli_fetch_array($result))
     {
		  
   $query2 = "SELECT * FROM subtask WHERE taskId = '".$row["taskId"]."'";  
      $result2 = mysqli_query($connect, $query2);  
	  if(mysqli_num_rows($result2)>0){
 
    while($row2 = mysqli_fetch_array($result2))
     {
		$actualStartDate=$row2['actualStartDate'];
		 $actualCompletionDate=$row2['actualCompletionDate'];
			$d=dayCount(substr($actualStartDate,0,10), substr($actualCompletionDate,0,10));
            
			if($d>0)
			{
				$seconds1 = (strtotime( $actualCompletionDate) - strtotime( $actualStartDate));
				$seconds=$seconds+$seconds1;
				
				$s=$d*16*60*60;
				$seconds=$seconds-$s;
				
			}
			else
			{
				$seconds1 = (strtotime( $actualCompletionDate) - strtotime( $actualStartDate));
				$seconds=$seconds+$seconds1;
			}



	  
	 
	 }
	 
	  }
	  
	  else{
		  // count time for tasks which has no any sub task//
		    $actualStartDate=$row['actualStartDate'];
		 $actualCompletionDate=$row['actualCompletionDate'];
			$d=dayCount(substr($actualStartDate,0,10), substr($actualCompletionDate,0,10));
            
			if($d>0)
			{
				$seconds1 = (strtotime( $actualCompletionDate) - strtotime( $actualStartDate));
				$seconds=$seconds+$seconds1;
				
				$s=$d*16*60*60;
				$seconds=$seconds-$s;
				
			}
			else
			{
				$seconds1 = (strtotime( $actualCompletionDate) - strtotime( $actualStartDate));
				$seconds=$seconds+$seconds1;
			}




	
	  
	  }
	  
	  
	 }
		
 	$days=$seconds/(60*60*8);
	$months=$days/20;
	$effort= round($months,4); 
 
 
 
 $query22 = "SELECT* from metric  WHERE pID='$projId' AND type='actual'";
	$result22=mysqli_query($connect, $query22);
 if(mysqli_num_rows($result22)>0)
 
{
	 $row=mysqli_fetch_array($result22);
	 $query8 = " UPDATE metric SET
      regDate='$date' 
	  WHERE mID='". $row['mID']."'";
	 mysqli_query($connect, $query8);
	 
	  $query81 = " UPDATE actualmetrics SET
      effort='$effort', 
	    fp='$funcPoint', 
		  size='$size', 
		    cost='$cost', 
			  duration='$final_date', 
			  	  ucp='$ucp' 
	  WHERE mID='". $row['mID']."'";
	 mysqli_query($connect, $query81);
	 
	 
 }
 else{
$query3 = " INSERT INTO metric(pID,type,regDate)  VALUES ('$projId', 'actual','$date')";

 
if (mysqli_query($connect, $query3)) {
	 
    $last_id = mysqli_insert_id($connect);
 $query222 = " INSERT INTO actualmetrics(mID,fp,effort,size,cost,duration,ucp)
VALUES ('$last_id', '$funcPoint','$effort','$size','$cost','$final_date','$ucp')";
mysqli_query($connect, $query222);
}

 }




//////////////////////////////////////////


 }
	
else{
 $query5 = "
    UPDATE team SET
	teamStatus='Active' 
	 WHERE teamId='". $teamId."'";  
	mysqli_query($connect, $query5);    

}



	if($teamId=='Un Assign'){
		 
		 $query = "
    UPDATE project SET
	projName='$projName',
	deadline='$deadline',
	description='$description', 
	startDate='$startDate',
	 languageId='$projLanguage',
	projStatus='$projStatus'
	 
	 WHERE projId='". $projId."'";  
	 $resultt=mysqli_query($connect, $query);
	 }
	 else{
		

{		 $query = "
    UPDATE project SET
	projName='$projName',
	deadline='$deadline',
	description='$description', 
	startDate='$startDate',
	 languageId='$projLanguage',
	 teamId='$teamId',
	projStatus='$projStatus'
	 
	 WHERE projId='". $projId."'";  
	 
}
	 
	 
	  $resultt=mysqli_query($connect, $query);
	  
	 
  
         
	
}
 

 
 
    if($resultt)
    {
    echo 'Project Updated';
	
	
	///////////////////////////////////////
//////////////notification send////////
///////////////////////////////////////
$id1 =$_SESSION['id'];
		$date = date("Y-m-d");
	$time = date("h:i:sa");
	$query223 = "SELECT* from project  WHERE projId='$projId'";
	$result223=mysqli_query($connect, $query223);
	
	 if(mysqli_num_rows($result223)>0){
		  $row223=mysqli_fetch_array($result223);
	$teamId=$row223['teamId'];
	$query222 = "SELECT* from teammember  WHERE teamId='$teamId'";
	$result222=mysqli_query($connect, $query222);
	 while($row222=mysqli_fetch_array($result222)){
		 
		 $empId1=$row222['empId'];
		 
		 $query24 = "INSERT INTO notification (notificationType,notificationTypeId,notificationDetails,receiverId,time,date,senderId)  
     VALUES ('7','$projId','$projName','$empId1','$time','$date','$id1')";	
		mysqli_query($connect, $query24);
		 
		 
	}
	 }
}

}


?>
 