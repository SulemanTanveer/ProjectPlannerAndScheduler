<?php

 
 
session_start(); 
include("config.php");
date_default_timezone_set('Asia/Karachi');


 date_default_timezone_set('Asia/Karachi');
 $subtaskHours = mysqli_real_escape_string($connect, $_POST["subtaskHours"]); 
	 $taskHours =stripslashes( $subtaskHours); 
	$subtaskName = mysqli_real_escape_string($connect, $_POST["subtaskName"]);
	$subtaskName =stripslashes( $subtaskName);  
    $deadline = mysqli_real_escape_string($connect, $_POST["deadline"]);
	 $deadline =stripslashes( $deadline);
   $startDate = mysqli_real_escape_string($connect, $_POST["startDate"]);
	 $startDate =stripslashes( $startDate);
    $subtaskStatus = mysqli_real_escape_string($connect, $_POST["subtaskStatus"]);
	$subtaskStatus =stripslashes( $subtaskStatus);
	$taskId = mysqli_real_escape_string($connect, $_POST["taskId"]);
	$taskId =stripslashes( $taskId); 
	$subtaskHours = mysqli_real_escape_string($connect, $_POST["subtaskHours"]); 
	$subtaskHours =stripslashes( $subtaskHours); 
	$workingdays = mysqli_real_escape_string($connect, $_POST["workingdays"]); 
	$workingdays =stripslashes( $workingdays); 
	$countsaturdays = mysqli_real_escape_string($connect, $_POST["countsaturdays"]); 
	$countsaturdays =stripslashes( $countsaturdays);
    $date = date("Y-m-d"); 
	 
	if(isset($_POST["empList"])){  
$start=$startDate;
  $end=$deadline;
   $empID=$_POST["empList"];
 $fileName2=$_POST["empList"];
 $incSat =$_POST["saturadayCheck1"];
  
  $fileName="../files/empFiles/".$fileName2.".txt";
$file       = file($fileName);
$line_number1 = false;
$line_number2 = false;
 
   $file = fopen($fileName,"r");
$counter=0;
 
while(! feof($file))
  {
  $line=fgets($file);
  
  if(substr($line,4,10)==$start){
    $line_number1=$counter;
  }
    if(substr($line,4,10)==$end){
    $line_number2=$counter;
  }
  
  $counter++;
  }
 
 
fclose($file);
 
 
 function emp_avaiable_wh($fileName,$line_number1,$line_number2){
  
   $taskId=$_POST["taskId"];
 
  $empTotal_WH=0;
  $incSat =$_POST["saturadayCheck1"];
$lines = file($fileName); 
$taskfileName="../files/taskWorkHourFiles/".$taskId.".txt";
 
	  $taskLines = file($taskfileName); 
	  $file = fopen($taskfileName,"r");
	  $counter55=0;
while(! feof($file))
  {
  $line=fgets($file);
     $counter55++;
 }
   $counter55--;
 $counter55;
	    $counter2=0;
		
if($_POST["saturadayCheck1"]=='1') {   
for($i=$line_number1;$i<=$line_number2;$i++){
	
	 substr($lines[$i],4,10);
	
	
	if($counter2<$counter55){
	
	  if(substr($lines[$i],4,10)==substr($taskLines[$counter2],4,10)){
		
		 
		  $cont2= (int)substr($taskLines[$counter2],16,17)+(int)substr($lines[$i],16,17);
		 $counter2++; 
	  }
	 else{
		 $cont2= (int)substr($lines[$i],16,17);
	 }
	 
	}
	 else{
		 $cont2= (int)substr($lines[$i],16,17);
	 }
	
	$empTotal_WH=$empTotal_WH+$cont2;
	 
}
  
}
 else{
	 
	for($i=$line_number1;$i<=$line_number2;$i++){
	
	  if(substr($lines[$i],0,3)=='Sat'){
		  
		  
	  }
	 else{
	 
	if($counter2<$counter55){
	  if(substr($lines[$i],4,10)==substr($taskLines[$counter2],4,10)){
		  
		  $cont2= (int)substr($taskLines[$counter2],16,17)+(int)substr($lines[$i],16,17);
		 $counter2++; 
	  }
	 else{
		 $cont2= substr($lines[$i],16,17);
	 }
	 
	}
	 else{
		 $cont2= substr($lines[$i],16,17);
	 }
	 $empTotal_WH=$empTotal_WH+$cont2;
	 
	 }
} 
	 
	$flag=false; 
	 
 }
  
  return  $empTotal_WH;
  
	}
 
 
function graph( $fileName,$line_number1,$end,$start,$empID){
	 $line_number2='';
  
 $file = fopen($fileName,"r");
$counter=0;
 
while(! feof($file))
  {
  $line=fgets($file);
  
   
   if(substr($line,4,10)==$end){
	   
     $line_number2=$counter;
  }
  
  $counter++;
  }
 
 
fclose($file);
  $hours= emp_avaiable_wh($fileName,$line_number1,$line_number2);
  
  
 if($_POST["subtaskHours"]<=(int)$hours)
{
      echo 'yes';

} 

else {
     echo 'no';
} 
 
  
  
  
} 
 
 
	 graph( $fileName,$line_number1,$end,$start,$empID);
	 
  


 }
	else{
		echo 'yes';
	}
?>