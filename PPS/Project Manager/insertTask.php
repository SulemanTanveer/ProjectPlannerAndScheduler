

<?php
 
 session_start(); 
include("config.php");
date_default_timezone_set('Asia/Karachi');
if(!$connect){
	echo "connection failed";
	
}
$flag = '0';
if(!empty($_POST))
{
	 if (array_sum($_FILES['filename']['error']) > 0) {
	 
 }
else{
    
	          $new_name='';  
                $sourcePath='';  
                $targetPath='';  
   if(is_array($_FILES))  
 {  
      foreach($_FILES['filename']['name'] as $name => $value)  
      {  
           
		   
		   $file_name = explode(".", $_FILES['filename']['name'][$name]);  
           $allowed_extension = array("jpg", "jpeg", "png","txt","pdf","docx", "gif");  
           if(in_array($file_name[1], $allowed_extension))  
           {  $new = $value;  
                $new_name = rand() . '.'. $file_name[1];  
                $sourcePath = $_FILES["filename"]["tmp_name"][$name];  
                $targetPath = "../files/taskfiles/".$new_name;  
			
                move_uploaded_file($sourcePath, $targetPath);  
				
           }  
      }  
    
 }
}
	
	$output = '';
	
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
 	$description = mysqli_real_escape_string($connect, $_POST["description"]); 
	$description =stripslashes( $description);
 
	 $date = date("Y-m-d");
	 
	 
  
if(isset($_POST)){
	
	
	if($_POST['deadlineCheck']=='1'){
	
	$query131 = "UPDATE project SET deadline='$deadline' WHERE projId='$projId'";  
				   mysqli_query($connect, $query131);
	
}

	
	
	
	
	 
	
	$queryyy = "
    INSERT INTO task(taskName,deadline,taskHours,priority,taskStatus,startDate,creationDate,projId,description)  
     VALUES ('$taskName', '$deadline','$taskHours','$priority', '$taskStatus', '$startDate','$date' ,'$projId','$description')
";

$resultt=mysqli_query($connect, $queryyy);
$query3 = "SELECT taskId FROM task ORDER BY taskId DESC LIMIT 1";
	$result3 = mysqli_query($connect, $query3);
	 $row1 = mysqli_fetch_array($result3);  
	 $id=$row1['taskId'];


 
 ///////////////////////////////////////
 
 
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
	    
	$taskFileName="../files/taskWorkHourFiles/".$id.".txt";
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
	  
	$taskFileName="../files/taskWorkHourFiles/".$id.'.txt';
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

	}} 
	 
	 
	 
	 
	 //////////////////////////////////////////////////////////	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	$workStatus='Active';
 
  
  
			if(isset( $_POST["empList"])){
					if(count($_POST["empList"])>1){
				foreach($_POST["empList"] as $empId)
				  {
					  
				 $query1 = "INSERT INTO taskassignment(taskId,empId)  VALUES ('$id', '$empId')";
				  
					
					
					 $query2 = "UPDATE task SET taskStatus='Not Started' WHERE taskId='$id'";  
				     mysqli_query($connect, $query2);  
				
				 
				 
				 mysqli_query($connect, $query1);
				
				  
				  }
				  
	}
else{
	foreach($_POST["empList"] as $empId)
				  {
					  
				 $query1 = "INSERT INTO taskassignment(taskId,empId)  VALUES ('$id', '$empId')";
				 $query11 = "SELECT * FROM employee  WHERE empId='$empId'";  
				 $result11 = mysqli_query($connect, $query11);
				while($row=mysqli_fetch_array($result11)){
					
					 
					 $query2 = "UPDATE employee SET workStatus='Active'  WHERE empId='$empId'";  
				     mysqli_query($connect, $query2);  
				
				}
				   
				 
				 mysqli_query($connect, $query1);
				
				  
				  }
	
	
	
	
	
	
}	

			}
			
		









///////////////////////////////////////
//////////////notification send////////
///////////////////////////////////////
if(isset( $_POST["empList"])){
$id1 =$_SESSION['id'];
		$date = date("Y-m-d");
	$time = date("h:i:sa");
	
		foreach($_POST["empList"] as $empId)
				  {
		 
		 $query24 = "INSERT INTO notification (notificationType,notificationTypeId,notificationDetails,receiverId,time,date,senderId)  
     VALUES ('8','$id','$taskName','$empId','$time','$date','$id1')";	
		mysqli_query($connect, $query24);
		 
		 
	}
	
}






		
			
			if(isset( $_POST["selectShift"])){

{
    foreach ($_POST["selectShift"] as $value)
    {
        $query1 = "INSERT INTO taskdependency(childTaskId,parentTaskId)  VALUES ('$id', '$value')";
		mysqli_query($connect, $query1);
    }
}

}

	 if (array_sum($_FILES['filename']['error']) > 0) {
	 
 }
else{
    
 $typeId=$_POST["proj_id"];  
	$time = date("h:i:sa");
$date = date("Y-m-d");
$id =$_SESSION['id'];
  $query2 = "INSERT INTO taskfiles(fileName,filePath,uploadDate,uploadTime,taskId,attachedBy)  
     VALUES ('$new', '$targetPath', '$date','$time','$typeId','$id')";	
$result3=mysqli_query($connect, $query2);	
}
}




    if($resultt)
    {
		
		$select_query2="SELECT* from project WHERE projId = '".$_POST["projId"]."'";
						 $result2 = mysqli_query($connect, $select_query2);
                          $row2 = mysqli_fetch_array($result2);   
						 if($row2["projStatus"]=='Completed'){
							 $v= '1';
						 } 
						 else{
							 $v= '0';
							 
						 }

		
		 $output .= '		<div class="row">
						<div class="col-lg-12">
							 <div class="form-group pull-right">
						    <button type="button" data-toggle="modal" id="add" data-target="#add_data_Modal" class="btn btn-success"><i class="glyphicon glyphicon-plus-sign"></i> Create Tasks</button>
						</div> 
						 
					   </div> 
					</div>';
		
		if($_POST["proj_id"]!=''){
			
       $output .= '<center><div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-check"></i>  <strong>Task Updated</strong> 
							</div>
                    </div>
                </div><center>';
		}
		else{
			  $output .= '<center><div   id="fadeOut" class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-check"></i>  <strong>Task Created</strong> 
							</div>
                    </div>
                </div><center>';
			
		
		
		
		}
     $select_query = "SELECT * FROM task WHERE projId = '".$_POST["projId"]."'";  
     $result = mysqli_query($connect, $select_query);
     $output .= '
      <div id="employee_table">	<input type="hidden" id="proj_status" value= "'.$v.'"   > 
	<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                 <thead>     <tr>  
                      <th><center>Id</center></th>
                       <th><center>Name</center></th>
					<th><center>Priority</center></th>
					<th><center>Status</center></th>
					<th><center>Deadline</center></th>
					 
		 
						<th><center>Subtasks</center></th>						
							<th><center>Actions</center></th>  
				
                    </tr>

     </thead><tbody> ';
     while($row = mysqli_fetch_array($result))
     { 
 $task=$row["taskId"];
   
   $v='-';
   $id1= $task.$v.$_POST["projId"];
		 
      $output .= '
         <tr>            <td><center>' . $row["taskId"] . '</center></td> 
                         <td><center>' . $row["taskName"] . '</center></td> 
                 		  <td><center>' . $row["priority"] . '</center></td>';
						  
$output .= ' <td><center>';		
					 
					 
					 if($row["taskStatus"]=='Completed')
					 {
					 $output .= '<p  style="background-color: #00D211; color:white">'.$row["taskStatus"].'</p>'; 
					 }
					 else  if($row["taskStatus"]=='In-Progress'){
						  $output .= '<p  style="background-color: #FDC305; color:white">'.$row["taskStatus"].'</p>'; 
					 }
					 else  if($row["taskStatus"]=='Not Started'){
					  $output .= '<p  style="background-color: #FE0000; color:white">'.$row["taskStatus"].'</p>'; 
					}
					 else  if($row["taskStatus"]=='Pending'){
					  $output .= '<p  style="background-color: #428bca; color:white">'.$row["taskStatus"].'</p>'; 
					}
					  
					  
						
					 $output .= '</center></td> ';  
						    $output .= '<td><center>' . $row["deadline"] . '</center></td>  ';
								$output .= '      <td> <center>   <form method="GET"  action="subtask.php"  >
                  <button type="submit" name="taskId" class="btn btn-primary btn-xs" value="'.$row["taskId"] .'"> <i  class="fa fa-pencil"></i> Subtasks</button></td>
                    </form></center></td>';
						  
	$output .= '  
						  <td><center><button type="button" name="file" value="files" id="' . $row["taskId"] . '" class="btn btn-success btn-xs file_data2"  ><i  class="fa fa-paperclip"></i> Files</button>
						 <button type="button" name="view" value="view" id="' . $row["taskId"] . '" class="btn btn-warning btn-xs view_dataa"  ><i  class="fa fa-search-plus"></i> View</button> ';  
                     
				 
						$output .= '  <button type="button" name="edit" value="edit" id="' . $id1 . '" class="btn btn-info btn-xs edit_dataa" ><i class="fa fa-pencil-square-o" ></i> Edit</button> '; 
					 
					 
						
						
					$output .= '	 <button type="button" name="delete" value="delete" id="' . $id1 . '" class="btn btn-danger btn-xs delete_dataa"  ><i class="fa fa-trash-o"></i> Delete</button></center></td>  ';
                  
                
					$output .= '   </tr>
	   
      ';
     }
     $output .= '</tbody></table></div>';
	  echo "<script>$('#fadeOut').delay(3000).fadeOut('slow');
  
    
    var table = $('#example').DataTable( {
        'bDestroy': true
    } );
 
       $('#add').click(function(){  
	   $('#show').html('');
	  });
	$('#button1').click(function(){
	var proj_id=$('#button1').val(); 
	 var wi  = window.open('about:blank', '_blank');
	  $('#img2').show();
 $.ajax({
 type: 'POST',
 url:'ganttchart.php',
 data:{proj_id:proj_id},
 success: function(msg){

	
     $('#img2').hide();
	if($.trim(msg) ==='No Tasks')  
                          {  
       alert('Create Tasks First');  
								                         
						 }  
   else {
	wi.location.href = 'graph/ganttchart.html';
   }
	
 },
 error: function(XMLHttpRequest, textStatus, errorThrown) {
    alert('Some error occured');
 }
 });
});
 
	</script>";
    }
	else{
		
		 echo "Insert Query execution failed.$flag";
	}
    echo $output;
}
?>
 
