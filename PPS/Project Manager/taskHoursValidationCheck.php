<?php
 
session_start(); 
include("config.php");
date_default_timezone_set('Asia/Karachi');

$taskName = mysqli_real_escape_string($connect, $_POST["taskName"]);  
	$taskName =stripslashes( $taskName);
    $deadline = mysqli_real_escape_string($connect, $_POST["deadline"]);
	$deadline =stripslashes( $deadline);
    $priority = mysqli_real_escape_string($connect, $_POST["priority"]);
	$priority =stripslashes( $priority);
    $taskStatus = mysqli_real_escape_string($connect, $_POST["taskStatus"]);
	$taskStatus =stripslashes( $taskStatus);
	$startDate = mysqli_real_escape_string($connect, $_POST["startDate"]);  
	$startDate =stripslashes( $startDate); 
	$projId = mysqli_real_escape_string($connect, $_POST["projId"]); 
	$projId =stripslashes( $projId);
	$taskHours = mysqli_real_escape_string($connect, $_POST["taskHours"]); 
	$taskHours =stripslashes( $taskHours);
 
 
	 $date = date("Y-m-d");
 
 if(isset( $_POST["empList"])){
					if(count($_POST["empList"])==1){
						$empId='';
				foreach($_POST["empList"] as $empId)
 {
	 
	 $empId=$empId;
	 
 }
  $start=$_POST['startDate'];
  $end=$_POST['deadline'];
 
 $fileName2= $empId;
 $incSat=$_POST['saturadayCheck1'];
 $fileName="../files/empfiles/".$fileName2.'.txt';
$file       = file($fileName);
$line_number1 = false;
$line_number2 = false;
 


 $task_hours=$taskHours ;
 $empTotal_WH=0;
  
$lines = file($fileName); 
$flag;
 $output='';
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
 
if($incSat=='1') {
for($i=$line_number1;$i<=$line_number2;$i++){
	
	  
	 $checDate= substr($lines[$i],4,10);
	   if($checDate==date('Y-m-d')){
		    if(date("i")>0)
		  {
		     $time=date("H")+1;
		  }
		  else{
			  
			  $time=date("H");
		  }
		  $workHrs= substr($lines[$i],16,17);
		   $time2=17-$time;
		   if($time2<0){
			   
			   $hour=0;
		   }
		   else{
			   $hour=$time2;
	   }
	    $cont2= $hour;
	   }
	  else{
		   $cont2= substr($lines[$i],16,17);
	  }
	$empTotal_WH=$empTotal_WH+$cont2;
	
}
$flag=true;
}
 else{
	 
	for($i=$line_number1;$i<=$line_number2;$i++){
	
	  if(substr($lines[$i],0,3)=='Sat'){
		  
		  
	  }
	 else{
	 
	 $checDate= substr($lines[$i],4,10);
	   if($checDate==date('Y-m-d')){
		    if(date("i")>0)
		  {
		     $time=date("H")+1;
		  }
		  else{
			  
			  $time=date("H");
		  }
		  $workHrs= substr($lines[$i],16,17);
		   $time2=17-$time;
		   if($time2<0){
			   
			   $hour=0;
		   }
		   else{
			   $hour=$time2;
	   }
	    $cont2= $hour;
	   }
	  else{
		   $cont2= substr($lines[$i],16,17);
	  }
	 $empTotal_WH=$empTotal_WH+$cont2;
	 
	 }
} 
	 
	$flag=false; 
	 
 }
  
  $taskFileName='';
  $lines = file($fileName); 
 if($task_hours<=$empTotal_WH)
{  
echo 'yes';
} 

else {
    echo 'no';
} 

	}else {  
echo 'yes';
}
 } else {  
echo 'yes';
}
	 ?>
 