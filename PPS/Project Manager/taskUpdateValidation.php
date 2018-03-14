

<?php
 
include("config.php"); 
 session_start(); 
date_default_timezone_set('Asia/Karachi');
if(!$connect){
	echo "connection failed";
	
}
$flag = '0';
if(!empty($_POST))
{
	
	$output = '';

    $taskName = mysqli_real_escape_string($connect, $_POST["taskName2"]);  
    $deadline = mysqli_real_escape_string($connect, $_POST["deadline2"]);
    $priority = mysqli_real_escape_string($connect, $_POST["priority2"]);
    $taskStatus = mysqli_real_escape_string($connect, $_POST["taskStatus2"]);
	$startDate  = mysqli_real_escape_string($connect, $_POST["startDate2"]);   
	$projId = mysqli_real_escape_string($connect, $_POST["projId2"]);
	$taskHours2 = mysqli_real_escape_string($connect, $_POST["taskHours2"]); 	
	$description = mysqli_real_escape_string($connect, $_POST["description"]); 	
	$taskHours =stripslashes( $taskHours2);
	$countsaturdays = mysqli_real_escape_string($connect, $_POST["countsaturdays"]); 
	$countsaturdays =stripslashes( $countsaturdays);
	$workingdays = mysqli_real_escape_string($connect, $_POST["workingdays"]); 
	$workingdays =stripslashes( $workingdays);
  
  $orignal_task_status = mysqli_real_escape_string($connect, $_POST["orignal_task_status"]); 
	$orignal_task_status =stripslashes( $orignal_task_status);
  
  
  
    $taskId=$_POST["taskId2"];
	 $query2="Select * from taskassignment Where taskId='$taskId'";
    $result2 = mysqli_query($connect, $query2); 
	$result_array=array();
		while($row=mysqli_fetch_array($result2))
		{
			
			$result_array[] = $row['empId'];
		}
		 
		
	if($orignal_task_status!='Completed'  )
	
	{
    
	$query="Select * from task Where taskHours='$taskHours'  And startDate='$startDate' And deadline='$deadline' And  taskStatus='$taskStatus' and  taskId='$taskId'";
    $resultt = mysqli_query($connect, $query);  
 	 $query2="Select * from taskassignment Where taskId='$taskId'";
    $result2 = mysqli_query($connect, $query2); 
	
if((mysqli_num_rows($resultt)>0)&& (mysqli_num_rows( $result2 )>0)){
	
	   $query2="Select * from taskassignment Where taskId='$taskId'";
    $result2 = mysqli_query($connect, $query2);  
	
	 
	if((mysqli_num_rows( $result2 )>0)&&isset($_POST['empList'])){
		$result_array=array();
		while($row=mysqli_fetch_array($result2))
		{
			
			$result_array[] = $row['empId'];
		}
		if(count($_POST['empList'])==count($result_array)){
	 
			$result = array_intersect($_POST['empList'], $result_array);
			
			if(count($result)==count($result_array)){
				$query2 = "UPDATE task SET taskName='$taskName',description='$description',priority='$priority'  WHERE  taskId='$taskId'";  
	   $resultt = mysqli_query($connect, $query2);  
				echo 'Task Updated';
			
			 
			
			}
			
		}
		else {
			
			  $query2="Select * from taskassignment Where taskId='$taskId'";
    $result2 = mysqli_query($connect, $query2);  
			if(count($_POST['empList'])<count($result_array))
			
			{ 
			
			
						foreach($result_array as $emp_a)
				  { 
				  $flag=false;
					 
						foreach($_POST['empList'] as $chekEmp)
				  { 
				  
				     if($emp_a==$chekEmp)
					 {
						 
						 $flag=true;
						 
					 }
					 
					 
				  }
				  
				  if(!$flag)
				  {
				 $query2 = "Delete  from taskassignment where empId='$emp_a'  AND  taskId='$taskId'";  
	              mysqli_query($connect, $query2);
					  
					  
					 				  
				 $query555 = "SELECT * FROM subtask  WHERE  taskId = '".$taskId."' AND empId='$emp_a'";  
				 $result555 = mysqli_query($connect, $query555);
				 if(mysqli_num_rows($result555)>0){
					
					 while($row555 = mysqli_fetch_array($result555))
					{   
				$empId=$row555['empId'] ;
					$subTaskId	=$row555['subtaskId'] ;
							$query2 = "UPDATE subtask SET empId='0',subtaskStatus='Pending'  WHERE  subtaskId='$subTaskId'";  
	               mysqli_query($connect, $query2); 
						 if( $empId!='0'){
	$empFileName="../files/empFiles/".$empId.".txt";
$taskFileName="../files/subtaskWorkHourFiles/".$subTaskId.".txt";
		if(file_exists ($empFileName) && file_exists ($taskFileName)) {
	function findLineNumber($date,$fileName){

$counter=0;
  $file = fopen($fileName,"r");
while(! feof($file))
  {
  $line=fgets($file);
  
  if(substr($line,4,10)==$date){
   return  $counter;
   
  }
   
  
  $counter++;
  }

fclose($file);
	 }
		
function replace($taskFileName,$empFileName){


$count1 = 0;
$fp = fopen( $taskFileName, 'r');

while( !feof( $fp)) {
    fgets( $fp);
    $count1++;
}

  $count1--;
 
$emplines= file($empFileName);
$counter=0;
$count=0;
  $file1 = fopen($taskFileName,"r");
while($count<$count1)
  {
  $tasklines=fgets($file1);
   $date=substr($tasklines,4,10);
 $linenumber= findLineNumber($date,$empFileName);
  
   $taskReplacehour=(int)substr($tasklines,16,17);
    $empReplacehour=(int)substr($emplines[$linenumber],16,17);
	 
	 $add=$taskReplacehour+$empReplacehour; 
	 
	 
$emplines[$linenumber]=substr($tasklines,0,14).'  '.$add."\n"; 


     $count++;
  }
 file_put_contents ($empFileName, $emplines); 
 return true;
}
  
		}

}
	
  if(replace($taskFileName,$empFileName))
							  {			
							//	unlink($taskFileName);						
							  }				
					
					}
				 } 

				 else {
							 
$query555 = "SELECT * FROM taskassignment  WHERE  taskId = '".$taskId."' and  empId='$emp_a'";  
				 $result555 = mysqli_query($connect, $query555);
				 
					  $row555 = mysqli_fetch_array($result555);
				    echo  $empId=$row555['empId'];
						echo 	 $taskId=$row555['taskId'];
			  $query2 = "Delete  from taskassignment where empId='$empId'  AND  taskId='$taskId'";  
	              mysqli_query($connect, $query2);
					  $query2 = "UPDATE task SET empId='0',taskStatus='Pending'  WHERE  taskId='$taskId'";  
	               mysqli_query($connect, $query2); 
					  
							 $empFileName="../files/empFiles/".$empId.".txt";
						$taskFileName="../files/taskWorkHourFiles/".$taskId.".txt";
					if(file_exists ($empFileName) && file_exists ($taskFileName)) {		
															  
							$empFileName="../files/empFiles/".$empId.".txt";
						$taskFileName="../files/taskWorkHourFiles/".$taskId.".txt";
								
							function findLineNumber($date,$fileName){

						$counter=0;
						  $file = fopen($fileName,"r");
						while(! feof($file))
						  {
						  $line=fgets($file);
						  
						  if(substr($line,4,10)==$date){
						   return  $counter;
						   
						  }
						   
						  
						  $counter++;
						  }

						fclose($file);
							 }
								
						function replace($taskFileName,$empFileName){


						$count1 = 0;
						$fp = fopen( $taskFileName, 'r');

						while( !feof( $fp)) {
							fgets( $fp);
							$count1++;
						}

						  $count1--;




						$emplines= file($empFileName);
						$counter=0;
						$count=0;
						  $file1 = fopen($taskFileName,"r");
						while($count<$count1)
						  {
						  $tasklines=fgets($file1);
						   $date=substr($tasklines,4,10);
						 $linenumber= findLineNumber($date,$empFileName);
						  
						   $taskReplacehour=(int)substr($tasklines,16,17);
							$empReplacehour=(int)substr($emplines[$linenumber],16,17);
							 
							 $add=$taskReplacehour+$empReplacehour; 
							 
							 
						$emplines[$linenumber]=substr($tasklines,0,14).'  '.$add."\n"; 


							 $count++;
						  }
						 file_put_contents ($empFileName, $emplines); 
						 return true;
						}
						  
						 
							 if(replace($taskFileName,$empFileName))
							  {			
								//unlink($taskFileName);						
							  }					
							
							
							
							 
							
							
							
							
							
							
					}
						

						}
				 
				 
			 
$taskFileName="../files/taskWorkHourFiles/".$taskId.".txt";
	if( file_exists ($taskFileName)) {		
		
 		
	//unlink($taskFileName);						
  }	
				 }
				
				
				
					  
					  
					  
					  
					  
					  
					  
				  }
				  
				  
				  echo 'Task Unassigned  ;';
				  }
					
					
				 
				
				
				////unassign
				
				
				
				
		 
		///////////////////if task is already asssign to one emp and subtask exist////////////
	 
	 
	 
	
	 
else	if((mysqli_num_rows( $result2 )==1)&&count($_POST['empList'])>1 ){
		
		while($row=mysqli_fetch_array($result2))
		{
			
			  $empO =  $row['empId'];
		}
	
		 $checki_flag=false;
		
	foreach($_POST['empList'] as $emp_a)
				  { 
				  
		  if( $empO =$emp_a)
		  {
			  
			  $checki_flag=true;
		  }
				 
				  
				  }
		
	
			if( $checki_flag)
			{  
		$Query="Delete From taskassignment where empid='$empO ' and  taskId='$taskId''" ;
	     mysqli_query($connect, $Query);  
			foreach($_POST['empList'] as $emp_a)
				  { 
				   
				$query1 = "INSERT INTO taskassignment(empId,taskId )  VALUES ('$emp_a', '$taskId' )";
				 mysqli_query($connect, $query1); 
				 
				  
				  }
				$query2 = "UPDATE task SET taskName='$taskName',description='$description',priority='$priority',deadline='$deadline'  WHERE  taskId='$taskId'";  
	          $resultt = mysqli_query($connect, $query2); 
				 
				  
				echo 'Task Updatede && Task Also Assigned to New Member';



				}  
				    
	 
				
			}
	 		
		///////////////////if task is already asssign to more than one emp and subtask exist////////////
		else if((mysqli_num_rows( $result2 )>1)&&count($_POST['empList'])>1 ){
			
			$checki_flag=false;
			
			while($row=mysqli_fetch_array($result2))
		{
			
			  $empO[] =  $row['empId'];
			  
			  
		}
		$empCount=count($empO);
		$countr=0;
	if(count($_POST['empList'])>=count($empO))
	{
		
		foreach($empO as $emp)
				  { 
		foreach($_POST['empList'] as $empLis)
				  {		  
		  if( $emp =$empLis)
		  {
			  
			 $falgu=true;
		  }
				 
				  }
				  if($falgu){
					  
					  $countr++;
				  }
				  
				  }
		
	}
		
	else{
		echo 'Un assign task first';
		
	}
		
	echo 'true counter'.$countr;	echo 'empCount'.$empCount;
			if($countr ==$empCount)
			{  
		  
		 
		 
			foreach($_POST['empList'] as $emp_a)
				  { 
				   
				$query1 = "INSERT INTO taskassignment(empId,taskId )  VALUES ('$emp_a', '$taskId' )";
				 mysqli_query($connect, $query1); 
				 
				  
				  }
				$query2 = "UPDATE task SET taskName='$taskName',taskHours='$taskHours',description='$description',priority='$priority',deadline='$deadline'  WHERE  taskId='$taskId'";  
	          $resultt = mysqli_query($connect, $query2); 
				 
				  
				echo 'Task Updatede \n Task Also Assigned to New Member';



				} 
			
			
			
			
			
			
			
		}
		
		
		
		
		
		
		
		}
		
		
	}
	
	else if(count($result_array)==1 && !(isset($_POST['empList']))) {
				
				////////////////////////////////////////////////////// 
				
				
	$query55 = "SELECT * FROM taskassignment  WHERE  taskId = '".$taskId."'";  
				 $result55 = mysqli_query($connect, $query55);
				 if(mysqli_num_rows($result55)==1){
					  
				 $query555 = "SELECT * FROM subtask  WHERE  taskId = '".$taskId."' AND empId!='0'";  
				 $result555 = mysqli_query($connect, $query555);
				 if(mysqli_num_rows($result555)>0){
					
					 while($row555 = mysqli_fetch_array($result555))
					{   
				$empId=$row555['empId'] ;
					$subTaskId	=$row555['subtaskId'] ;
							$query2 = "UPDATE subtask SET empId='0',subtaskStatus='Pending'  WHERE  subtaskId='$subTaskId'";  
	               mysqli_query($connect, $query2); 
						 if( $empId!='0'){
	$empFileName="../files/empFiles/".$empId.".txt";
$taskFileName="../files/subtaskWorkHourFiles/".$subTaskId.".txt";
		if(file_exists ($empFileName) && file_exists ($taskFileName)) {
	function findLineNumber($date,$fileName){

$counter=0;
  $file = fopen($fileName,"r");
while(! feof($file))
  {
  $line=fgets($file);
  
  if(substr($line,4,10)==$date){
   return  $counter;
   
  }
   
  
  $counter++;
  }

fclose($file);
	 }
		
function replace($taskFileName,$empFileName){


$count1 = 0;
$fp = fopen( $taskFileName, 'r');

while( !feof( $fp)) {
    fgets( $fp);
    $count1++;
}

  $count1--;
 
$emplines= file($empFileName);
$counter=0;
$count=0;
  $file1 = fopen($taskFileName,"r");
while($count<$count1)
  {
  $tasklines=fgets($file1);
   $date=substr($tasklines,4,10);
 $linenumber= findLineNumber($date,$empFileName);
  
   $taskReplacehour=(int)substr($tasklines,16,17);
    $empReplacehour=(int)substr($emplines[$linenumber],16,17);
	 
	 $add=$taskReplacehour+$empReplacehour; 
	 
	 
$emplines[$linenumber]=substr($tasklines,0,14).'  '.$add."\n"; 


     $count++;
  }
 file_put_contents ($empFileName, $emplines); 
 return true;
}
  
		}

}
	
  if(replace($taskFileName,$empFileName))
							  {			
								unlink($taskFileName);						
							  }				
					
					}
				 } 

				 else {
							 
$query555 = "SELECT * FROM taskassignment  WHERE  taskId = '".$taskId."'  ";  
				 $result555 = mysqli_query($connect, $query555);
				 
					  $row555 = mysqli_fetch_array($result555);
				    echo  $empId=$row555['empId'];
						echo 	 $taskId=$row555['taskId'];
			  $query2 = "Delete  from taskassignment where empId='$empId'  AND  taskId='$taskId'";  
	              mysqli_query($connect, $query2);
					  $query2 = "UPDATE task SET empId='0',taskStatus='Pending'  WHERE  taskId='$taskId'";  
	               mysqli_query($connect, $query2); 
					  
							 $empFileName="../files/empFiles/".$empId.".txt";
						$taskFileName="../files/taskWorkHourFiles/".$taskId.".txt";
					if(file_exists ($empFileName) && file_exists ($taskFileName)) {		
															  
							$empFileName="../files/empFiles/".$empId.".txt";
						$taskFileName="../files/taskWorkHourFiles/".$taskId.".txt";
								
							function findLineNumber($date,$fileName){

						$counter=0;
						  $file = fopen($fileName,"r");
						while(! feof($file))
						  {
						  $line=fgets($file);
						  
						  if(substr($line,4,10)==$date){
						   return  $counter;
						   
						  }
						   
						  
						  $counter++;
						  }

						fclose($file);
							 }
								
						function replace($taskFileName,$empFileName){


						$count1 = 0;
						$fp = fopen( $taskFileName, 'r');

						while( !feof( $fp)) {
							fgets( $fp);
							$count1++;
						}

						  $count1--;




						$emplines= file($empFileName);
						$counter=0;
						$count=0;
						  $file1 = fopen($taskFileName,"r");
						while($count<$count1)
						  {
						  $tasklines=fgets($file1);
						   $date=substr($tasklines,4,10);
						 $linenumber= findLineNumber($date,$empFileName);
						  
						   $taskReplacehour=(int)substr($tasklines,16,17);
							$empReplacehour=(int)substr($emplines[$linenumber],16,17);
							 
							 $add=$taskReplacehour+$empReplacehour; 
							 
							 
						$emplines[$linenumber]=substr($tasklines,0,14).'  '.$add."\n"; 


							 $count++;
						  }
						 file_put_contents ($empFileName, $emplines); 
						 return true;
						}
						  
						 
							 if(replace($taskFileName,$empFileName))
							  {			
								//unlink($taskFileName);						
							  }					
							
							
							
							 
							
							
							
							
							
							
					}
						echo 'Task Unassigned';

						}
				 
				 
			 
$taskFileName="../files/taskWorkHourFiles/".$taskId.".txt";
	if( file_exists ($taskFileName)) {		
		
 		
	//unlink($taskFileName);						
  }	
				 }
				
				
				
				
				////////////////////////////////////////////////////////////////
				
			}
	
	
	else if(count($result_array)>0 && !(isset($_POST['empList']))) {
		
		
			 $query555 = "SELECT * FROM subtask  WHERE  taskId = '".$taskId."' AND empId!='0'";  
				 $result555 = mysqli_query($connect, $query555);
				 if(mysqli_num_rows($result555)>0){
					
					 while($row555 = mysqli_fetch_array($result555))
					{   
				$empId=$row555['empId'] ;
					$subTaskId	=$row555['subtaskId'] ;
							$query2 = "UPDATE subtask SET empId='0',subtaskStatus='Pending'  WHERE  subtaskId='$subTaskId'";  
	               mysqli_query($connect, $query2); 
						 if( $empId!='0'){
	$empFileName="../files/empFiles/".$empId.".txt";
$taskFileName="../files/subtaskWorkHourFiles/".$subTaskId.".txt";
		if(file_exists ($empFileName) && file_exists ($taskFileName)) {
	function findLineNumber($date,$fileName){

$counter=0;
  $file = fopen($fileName,"r");
while(! feof($file))
  {
  $line=fgets($file);
  
  if(substr($line,4,10)==$date){
   return  $counter;
   
  }
   
  
  $counter++;
  }

fclose($file);
	 }
		
function replace($taskFileName,$empFileName){


$count1 = 0;
$fp = fopen( $taskFileName, 'r');

while( !feof( $fp)) {
    fgets( $fp);
    $count1++;
}

  $count1--;
 
$emplines= file($empFileName);
$counter=0;
$count=0;
  $file1 = fopen($taskFileName,"r");
while($count<$count1)
  {
  $tasklines=fgets($file1);
   $date=substr($tasklines,4,10);
 $linenumber= findLineNumber($date,$empFileName);
  
   $taskReplacehour=(int)substr($tasklines,16,17);
    $empReplacehour=(int)substr($emplines[$linenumber],16,17);
	 
	 $add=$taskReplacehour+$empReplacehour; 
	 
	 
$emplines[$linenumber]=substr($tasklines,0,14).'  '.$add."\n"; 


     $count++;
  }
 file_put_contents ($empFileName, $emplines); 
 return true;
}
  
		}

}
	
  if(replace($taskFileName,$empFileName))
							  {			
								unlink($taskFileName);						
							  }				
					
					}
				 }
		
		
		  $query2 = "Delete  from taskassignment where   taskId='$taskId'";  
	              mysqli_query($connect, $query2);
		
		echo 'Task Unassigned Successfully..!';
		
		
	}
	
	
	
	
	
	
	
	
	else  {
		echo 'Task Updated';
		 $query2 = "UPDATE task SET taskName='$taskName',description='$description',priority='$priority'  WHERE  taskId='$taskId'";  
	   $resultt = mysqli_query($connect, $query2);  
		
	}
	
	
}
 
 else{
	 
	  
	
 if(isset( $_POST["empList"])){
					if(count($_POST["empList"])==1){
						$empId='';
				foreach($_POST["empList"] as $empId)
 {
	 
	 $empId=$empId;
	 
 }
 
  $query1 = "INSERT INTO taskassignment(taskId,empId)  VALUES ('$taskId', '$empId')";
	  mysqli_query($connect, $query1);
		   
		 $query2 = "UPDATE task SET taskName='$taskName',taskStatus='Not Started',description='$description',priority='$priority',deadline='$deadline'  WHERE  taskId='$taskId'";  
  $resultt = mysqli_query($connect, $query2);
		 
					 
	echo 'Task Assigned..!';				
  $start=$_POST['startDate2'];
  $end=$_POST['deadline2'];
   
 $fileName2= $empId;
 $incSat=$_POST['saturadayCheck3'];
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
	   if($checDate==date('Y-m-d') && (date("H")>=9 && date("H")<=24 )){
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
	   if($checDate==date('Y-m-d') && (date("H")>=9 && date("H")<=24 )){
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
   if($flag){
	    
	$taskFileName="../files/taskWorkHourFiles/".$taskId.".txt";
	$txt='';
	 $myfile = fopen($taskFileName, "w") or die("Unable to open file!");
    for($i=$line_number1;$i<=$line_number2;$i++){
	
	 
	 
	 
	 $checDate= substr($lines[$i],4,10);
	   if($checDate==date('Y-m-d') && (date("H")>=9 && date("H")<=24 )){
		    if(date("i")>0)
		  {
		    $time=date("H")+1;
		  }
		  else{
			  
			   $time=date("H");
		  }
		   
		  
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
	 
	 $emp_WH= $cont2;
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	     $task_hours=(int)$task_hours;
	   $emp_WH=(int)$emp_WH;
		  if( $task_hours>$emp_WH  ){
			   $task_hours=$task_hours- $emp_WH;
			    $txt.=   substr($lines[$i],0,14)."  ".$emp_WH."\n";
		  $lines[$i] = substr($lines[$i],0,14)."  0\n";
		  }
		  else if($task_hours>0   ){
			  $emp_WH=$emp_WH- $task_hours;
			  $txt.=   substr($lines[$i],0,14)."  ".$task_hours."\n";
		  $lines[$i] = substr($lines[$i],0,14)."  ".$emp_WH."\n";
			  $task_hours=0;
			  
		  }
}
  
 fwrite($myfile, $txt);
	   

 }
   
   else{
	  
	$taskFileName="../files/taskWorkHourFiles/".$taskId.'.txt';
	$txt='';
	 $myfile = fopen($taskFileName, "w") or die("Unable to open file!");
					 
	    for($i=$line_number1;$i<=$line_number2;$i++){
			
	 if(substr($lines[$i],0,3)!='Sat'){
	 
	  $checDate= substr($lines[$i],4,10);
	   if($checDate==date('Y-m-d') && (date("H")>=9 && date("H")<=24 )){
		    if(date("i")>0)
		  {
		    $time=date("H")+1;
		  }
		  else{
			  
			   $time=date("H");
		  }
		   
		  
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
	 
	 $emp_WH= $cont2;
	  $task_hours=(int)$task_hours;
	   $emp_WH=(int)$emp_WH;
	  
//////////////////////task file write/////////////////
			 
	   
	   
		  if($task_hours>$emp_WH){
			  
			  
			  $task_hours=$task_hours- $emp_WH;
			   $txt.=   substr($lines[$i],0,14)."  ".$emp_WH."\n";
			  
		  $lines[$i] = substr($lines[$i],0,14)."  0\n";
		  }
		  else if($task_hours>0){
			  
		
		$emp_WH=$emp_WH- $task_hours;
		
		$txt.=   substr($lines[$i],0,14)."  ".$task_hours."\n";
		
		  $lines[$i] = substr($lines[$i],0,14)."  ".$emp_WH."\n";
			$task_hours=0;
			  
		  }
		}
		
		
		
		
		
		}
	   
	   fwrite($myfile, $txt);
	   

	   
	   
	   
	   
   }
  
  
  
  file_put_contents ($fileName, $lines); 
 
   

} 

else {
    echo 'Enter Valid Dates';
}

	}
	
	else{
		
		foreach($_POST["empList"] as $empId)
				  {
					  
				 $query1 = "INSERT INTO taskassignment(taskId,empId)  VALUES ('$taskId', '$empId')";
				  
				 mysqli_query($connect, $query1);
				
					$query2 = "UPDATE task SET taskName='$taskName',taskStatus='Not Started',description='$description',priority='$priority',deadline='$deadline'  WHERE  taskId='$taskId'";  
	          $resultt = mysqli_query($connect, $query2); 
					 
				
				 
				   
 
				  
				  }
		echo 'Task  Assigned';
	}
	
	} 
	 
	 
	 
	 
	 //////////////////////////////////////////////////////////	
	 	
	
	
	
	
	
	
	
	
	
	
	
	}
		
	 
	 
	 
	 
	 
	 
	    
 
 
 
}
else{
	
	
	
	
	echo 'Task Is Completed ';
	echo 'Change Task Status First ';
	
}




}

?>
 
