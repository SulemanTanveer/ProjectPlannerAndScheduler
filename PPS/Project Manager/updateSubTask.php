


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
	$taskStatus = mysqli_real_escape_string($connect, $_POST["taskStatus2"]);
	$startDate2 = mysqli_real_escape_string($connect, $_POST["startDate2"]);   
	$subtaskId = mysqli_real_escape_string($connect, $_POST["subtaskId2"]); 
	$subtaskHours = mysqli_real_escape_string($connect, $_POST["subtaskHours2"]); 	
	$subtaskHours =stripslashes( $subtaskHours);
	$countsaturdays = mysqli_real_escape_string($connect, $_POST["countsaturdays"]); 
	$countsaturdays =stripslashes( $countsaturdays);
	$workingdays = mysqli_real_escape_string($connect, $_POST["workingdays"]); 
	$workingdays =stripslashes( $workingdays);
    $taskId=$_POST["taskId2"];
		$taskStatusOrig = mysqli_real_escape_string($connect, $_POST["taskStatusOrig"]); 	
 
					    
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////	
$query66 = "SELECT* FROM subtask  WHERE  subtaskId = '".$subtaskId."'";  
				 $result66 = mysqli_query($connect, $query66);
				$row6=mysqli_fetch_array($result66);
	                     
					 $empId= $row6['empId'];
					  $empFileName="../files/empFiles/".$empId.".txt";	
	 if( $empId!='0' && 	$taskStatusOrig!='Pending'){
	  
	 
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
 

$count1 = 1;
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
 
}
 
$empFileName="../files/empFiles/".$empId.".txt";
  $taskFileName="../files/subtaskWorkHourFiles/".$subtaskId.".txt";
 if(file_exists ($taskFileName) && file_exists ($empFileName))	{	
							
								
							 
						 replace($taskFileName,$empFileName);
						//unlink($taskFileName);
					
						}
 
}
	
	
	
	 
	 
	 
 ///////////////////////////////////////////////assign subtask again //////////////////////////////////////////////////////////
$invalid_flag=false;
 
 
 
 if(isset( $_POST["empList"])){
					 
						$empId='';
				 
  
	 
	 $empId=$_POST["empList"];
	 
 
  $start=$_POST['startDate2'];
  $end=$_POST['deadline2'];
 
 $fileName2= $empId;
 $incSat=$_POST['saturadayCheck3'];
 $fileName="../files/empFiles/".$fileName2.".txt";
$file       = file($fileName);
$line_number1 = false;
$line_number2 = false;
 


 $task_hours=$subtaskHours ;
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
  
  
  $lines = file($fileName); 
  echo $empTotal_WH;
  echo 'subtask hrs'.$task_hours;
 if($task_hours<=$empTotal_WH && isset($_POST["empList"]))
{
   if($flag){
	   
	   $taskFileName="../files/subtaskWorkHourFiles/".$subtaskId.'.txt';
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
	   	   $taskFileName="../files/subtaskWorkHourFiles/".$subtaskId.'.txt';
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
     
	$taskStatus='Pending';
	$subtaskHours=0;
	unset($_POST["empList"]);
$invalid_flag=true;
} 

	 } 
 
 
 
 
 
 
 
 
 
 
 
 
 
////////////////////////////////////////////////////////////////////////////////////////////////////////
	
if($_POST['deadlineCheck2']=='1'){
	
	$query131 = "UPDATE task SET deadline='$deadline' WHERE taskId='$taskId'";  
				   mysqli_query($connect, $query131);
	      $query88  = "SELECT * FROM   task WHERE taskId= '".$taskId."'";
		 $result88 = mysqli_query($connect, $query88); 
		 $row88 = mysqli_fetch_array($result88);

$query131 = "UPDATE project SET deadline='$deadline' WHERE projId='".$row88['projId']."'";  
				   mysqli_query($connect, $query131);	
	
}
	 

	if(isset($_POST["empList"])){
		
  $total_count=0;
         $query88  = "SELECT SUM(subtaskHours)  AS value_sum0 FROM  subtask WHERE taskId= '".$taskId."'";
		 $result88 = mysqli_query($connect, $query88); 
		 $row88 = mysqli_fetch_array($result88);
		 $total_count=$row88['value_sum0'];

			$total_count=$total_count+$subtaskHours;
					
					 
					 $query1212 = "UPDATE task SET taskHours='$total_count' WHERE taskId='$taskId'";  
				     mysqli_query($connect, $query1212);   
	}
else{
	
	  $query88  = "SELECT * FROM   subtask WHERE subtaskId= '".$subtaskId."' ";
		 $result88 = mysqli_query($connect, $query88); 
		 $row88 = mysqli_fetch_array($result88);
	     $emp_id=$row88['empId'];
	if($emp_id!=0){
		
		$query88  = "SELECT * FROM   taskassignment WHERE  taskId= '".$taskId."' ";
		 $result88 = mysqli_query($connect, $query88); 
		 while($row88 = mysqli_fetch_array($result88)){
			$query888  = "SELECT * FROM   task WHERE  taskId= '".$row88['taskId']."' and taskstatus!='In-Progress'";
		 $result888 = mysqli_query($connect, $query888); 
		if(mysqli_num_rows( $result888)=='0'){
			
			$query8889  = "SELECT * FROM   subtask WHERE  taskId= '".$row88['taskId']."' and subtaskstatus!='In-Progress'";
		 $result8889 = mysqli_query($connect, $query8889); 
			if(mysqli_num_rows( $result8889)=='0'){
			
			 $query1212 = "UPDATE employee SET workStatus='In-Active' WHERE empId='$emp_id'";  
				     mysqli_query($connect, $query1212);   
			
			}
			
		}
		 
		 
		 
		 }
		
	}
	
	
}
	 
	 
		
 
	 
	 
	 
	 
	if(isset($_POST["empList"])){
	 $empId=$_POST["empList"];
	$query = "
    UPDATE subtask SET
	subtaskName='$taskName',
	deadline='$deadline',
	 
	empId='$empId',
	subtaskHours='$subtaskHours', 
	subtaskStatus='$taskStatus', 
	startDate='$startDate2'
	 WHERE subtaskId='".$subtaskId."'";  
	
	}
	else{
		$query = "
    UPDATE subtask SET
	subtaskName='$taskName',
	deadline='$deadline',
	  
	empId='0',
	subtaskHours='$subtaskHours', 
	subtaskStatus='$taskStatus', 
	startDate='$startDate2'
	 WHERE subtaskId='".$subtaskId."'";  
		
	}
	
    $result=mysqli_query($connect, $query);
	   $query666 = "SELECT* FROM task  WHERE  taskStatus!='In-Progress' and taskStatus!='Completed'  ";  
				 $result888 = mysqli_query($connect, $query666);
				 if(mysqli_num_rows($result888)==0){
			 
		            $projId= $row88['projId']; 
		  $query1212 = "UPDATE task SET taskStatus='Not Started' WHERE taskId = '".$_POST["taskId2"]."'";  
				     mysqli_query($connect, $query1212);   
				 }
				 
				 
 $query66 = "SELECT* FROM task  WHERE  taskId = '".$_POST["taskId2"]."' ";  
				 $result88 = mysqli_query($connect, $query66);
		 $row88 = mysqli_fetch_array($result88);
		         echo   $projId= $row88['projId']; 
 $query6666 = "SELECT* FROM task  WHERE  taskStatus!='Completed' AND  taskStatus!='In-Progress'   and projId='$projId' ";  
				 $result8888 = mysqli_query($connect, $query6666);
				 if(mysqli_num_rows($result8888)>0){
				 
		  $query1212 = "UPDATE project SET projStatus='Not Started' WHERE projId='$projId'";  
				     mysqli_query($connect, $query1212);   
				 }
		 else{
			 
			 echo 'naiiii';
		 }
	 
	 
$id=$_POST["subtaskId2"];		  
				
			   

			 
			





    if(  $result)
    {
				///////////////////////////////////////
//////////////notification send////////
///////////////////////////////////////
if(isset( $_POST["empList"])){
$id1 =$_SESSION['id'];
		$date = date("Y-m-d");
	$time = date("h:i:sa");
	
		$empId=$_POST["empList"];
				  {
		 
		 $query24 = "INSERT INTO notification (notificationType,notificationTypeId,notificationDetails,receiverId,time,date,senderId)  
     VALUES ('11','$id','$taskName','$empId','$time','$date','$id1')";	
		mysqli_query($connect, $query24);
		 
		 
	}
	
}
		
		
		
		$query = "SELECT projId FROM task WHERE taskId='".$_POST["taskId2"]."'"; 
					$result = mysqli_query($connect, $query);
					while($row = mysqli_fetch_array($result))  {
						$val= $row["projId"];
						}	
		
		 $output .= '             
					  <div class="row">
					    
						<div class="col-lg-12">
						<form> 
							 <div class="form-group pull-right">
						    <button type="button" data-toggle="modal" id="add" data-target="#add_data_Modal" class="btn btn-success"><i class="glyphicon glyphicon-plus-sign"></i> Create Subtask</button>
						</div> </form>';
				 $output .= " 	<script>
						  $('#add').click(function(){  
              $('#insert').val('Insert');  
              $('#insert_form3')[0].reset();  
         
   	   
   	  
   	  }); </script>";
					
 


					$output .= '	 
						
						
						
						
						</div> 
                     ';
		
		
			
       $output .= '<center><div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-check"></i>  <strong>Subtask Updated</strong> 
							</div>
                    </div>
                </div><center>';
		if($invalid_flag){
			
			
 	$output .= '<center><div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-warning alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-check"></i>  <strong>Enter Valid Hours and Dates</strong> 
							</div>
                    </div>
                </div><center>';
 
			
		}
		
     $select_query = "SELECT * FROM subtask WHERE taskId = '".$_POST["taskId2"]."'";  
     $result = mysqli_query($connect, $select_query);
     $output .= '
      <div id="employee_table">	
	<table id="example44" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>     <tr>  
                    <th><center>Id</center></th>
                       <th><center>Name</center></th>
					<th><center>Start Date</center></th>
					<th><center>Status</center></th>
					<th><center>Deadline</center></th>
							<th><center>Actions</center></th> 
						
                    </tr>

     </thead><tbody> ';
     while($row = mysqli_fetch_array($result))
     {
		 
      $subtaskId=$row["subtaskId"];
   $taskId=$_POST["taskId2"];
   $v='-';
   $id1= $subtaskId.$v.$taskId;
      $output .= '
          <tr>        <td><center>' . $row["subtaskId"] . '</center></td> 
                         <td><center>' . $row["subtaskName"] . '</center></td> 
                 		  <td><center>' . $row["startDate"] . '</center></td> ';
						  
						  
						  
$output .= ' <td><center>';		
					 
					 
					 if($row["subtaskStatus"]=='Completed')
					 {
					 $output .= '<p  style="background-color: #00D211; color:white">'.$row["subtaskStatus"].'</p>'; 
					 }
					 else  if($row["subtaskStatus"]=='In-Progress'){
						  $output .= '<p  style="background-color: #FDC305; color:white">'.$row["subtaskStatus"].'</p>'; 
					 }
					 else  if($row["subtaskStatus"]=='Not Started'){
					  $output .= '<p  style="background-color: #FE0000; color:white">'.$row["subtaskStatus"].'</p>'; 
					}
					 else  if($row["subtaskStatus"]=='Pending'){
					  $output .= '<p  style="background-color: #428bca; color:white">'.$row["subtaskStatus"].'</p>'; 
					}
					  
					  
						
					 $output .= '</center></td> '; 



						   
					  $output .= '	    <td><center>' . $row["deadline"] . '</center></td>  
							 
						   <td><center><button type="button"  name="file" value="files"id="' . $row["subtaskId"] . '" class="btn btn-success btn-xs file_data3"  ><i  class="fa fa-paperclip"></i> Files</button> 
                     	
						 <button type="button" name="view" value="view" id="' . $row["subtaskId"] . '" class="btn btn-warning btn-xs view_dataaa"  ><i  class="fa fa-search-plus"></i> View</button>';

				 
						$output .= ' <button type="button" name="edit" value="edit" id="'.$id1 .'" class="btn btn-info btn-xs edit_dataaa" ><i class="fa fa-pencil-square-o" ></i> Edit</button>  '; 
					
					 

                       $output .= ' 	


					 <button type="button" name="delete" value="delete" id="' . $id1 . '" class="btn btn-danger btn-xs delete_dataaa"  > <i class="fa fa-trash-o"></i> Delete</button></center></td>  
                       
				   </tr>
	   
      ';
     }
     $output .= '</tbody></table></div>';
	  echo "<script>
   
    var table = $('#example44').DataTable( {
        responsive: true
    } );
 
    new $.fn.dataTable.FixedHeader( table );
 
  </script>";
    }
	else{
		
		 echo "Insert Query execution failed.$flag";
	}
    echo $output;
}
?>
 			  