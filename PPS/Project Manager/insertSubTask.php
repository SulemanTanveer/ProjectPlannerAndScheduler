

<?php
  
include("config.php");
session_start();
date_default_timezone_set('Asia/Karachi');
if(!$connect){
	echo "connection failed";
	
}
$flag = '0';
if($_POST)
{     

 if (array_sum($_FILES['filei']['error']) > 0) {
	 
 }
else{
    

				$new_name='';  
                $sourcePath='';  
                $targetPath='';  
   if(is_array($_FILES))  
 {  
      foreach($_FILES['filei']['name'] as $name => $value)  
      {  
           
		   $file_name = explode(".", $_FILES['filei']['name'][$name]);  
           $allowed_extension = array("jpg", "jpeg", "png","txt","pdf","docx", "gif");  
           if(in_array($file_name[1], $allowed_extension))  
           {    $new = $value;  
                $new_name = rand() . '.'. $file_name[1];  
                $sourcePath = $_FILES["filei"]["tmp_name"][$name];  
                $targetPath = "../files/subtaskfiles/".$new_name;  
			    
                move_uploaded_file($sourcePath, $targetPath);  
				
           }  
      }  
    
 }
 }
	$output = '';
	
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
	$description = mysqli_real_escape_string($connect, $_POST["description"]); 
	$description =stripslashes( $description);
    $date = date("Y-m-d");
	 
		
		
	
		
		 
		
		
	if($_POST['deadlineCheck']=='1'){
	
	$qquery131 = "UPDATE task SET deadline='$deadline' WHERE taskId='$taskId'";  
				   mysqli_query($connect, $qquery131);
				   
				   
	$query3333 = "SELECT*  FROM task WHERE taskId='$taskId'";
	$result3333 = mysqli_query($connect, $query3333);
	 $row3333 = mysqli_fetch_array($result3333);  
	 $projId=$row3333['projId'];
	$query3331 = "SELECT*  FROM project WHERE projId='$projId'";
	$result3331 = mysqli_query($connect, $query3331);
	 $row3331 = mysqli_fetch_array($result3331);  
	if($deadline> $row3331['deadline'])
	{
		$query1131 = "UPDATE project SET deadline='$deadline' WHERE projId='$projId'";  
				   mysqli_query($connect, $query1131);
		
	}
}

 

		//////////////////////unassign taskhours////////////////////////////////
  if(isset( $_POST["empList"])){
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

$task_lines= file($taskFileName);
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
	 $v=0;
	 
$emplines[$linenumber]=substr($tasklines,0,14).'  '.$add."\n"; 
$task_lines[$count]=substr($tasklines,0,14).'  '.$v."\n"; 

     $count++;
  }
 file_put_contents ($empFileName, $emplines); 
 
 file_put_contents ($taskFileName, $task_lines); 
}
 $query344 = "SELECT * FROM subtask WHERE taskId='$taskId' AND empId!='0'";
$result344 = mysqli_query($connect, $query344);
	 $num2 = mysqli_num_rows($result344); 

	  
  $query34 = "SELECT * FROM taskassignment WHERE taskId='$taskId'";
	$result34 = mysqli_query($connect, $query34);
	 $num = mysqli_num_rows($result34);  
	 $row34 = mysqli_fetch_array($result34);  
	$emp_id= $row34['empId']; 
	if($num<2 && $num2<1){
	 
	if(isset( $_POST["empList"])){
		  $empId=$_POST["empList"];
 	$empFileName="../files/empFiles/".$emp_id.".txt";
   $taskFileName="../files/taskWorkHourFiles/".$taskId.".txt"; 
 		
	
	
 replace($taskFileName,$empFileName);	
	
	
	}
	 
	 
	 
 /////////////////////////////////////////////////////////////////////////////////////////////////////////
		
			}
	 	
	}
		
	
//////////////////////////////////////////////////////////////////
			if(isset( $_POST["empList"])){
		  $empId=$_POST["empList"];
					  
					  
	 
	$query = "
    INSERT INTO subtask(subtaskName,deadline,subtaskHours ,empId ,subtaskStatus,creationDate,startDate,taskId,description)  
     VALUES ('$subtaskName', '$deadline','$subtaskHours' ,'$empId','$subtaskStatus','$date', '$startDate', '$taskId','$description')
			 
			";
			$resultt=mysqli_query($connect, $query);
			if($resultt){
				
				 
			}
			}
		else {
					  
	
	$query = "
    INSERT INTO subtask(subtaskName,deadline,subtaskHours  ,subtaskStatus,startDate,taskId,description)  
     VALUES ('$subtaskName', '$deadline','$subtaskHours' ,'$subtaskStatus', '$startDate', '$taskId','$description')
			 
			";
			$resultt=mysqli_query($connect, $query);
			if($resultt){
				
				 
			}}	
			
			
			


  
  
  
  
  
  
//////////////////////////////////////////////////////////////////////////////////
 

  



$query3 = "SELECT subtaskId FROM subtask ORDER BY subtaskId DESC LIMIT 1";
	$result3 = mysqli_query($connect, $query3);
	 $row1 = mysqli_fetch_array($result3);  
	 $id2=$row1['subtaskId'];


 
  

  
  
  
  /////////////////////////////////////////////////////////////////////////
	 
	 
	 	 
		
 
 
 if(isset( $_POST["empList"])){
					 
						$empId='';
				 
  
	 
	 $empId=$_POST["empList"];
	 
 
  $start=$_POST['startDate'];
  $end=$_POST['deadline'];
 
 $fileName2= $empId;
 $incSat=$_POST['saturadayCheck1'];
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
	   if($checDate==date('Y-m-d')&& (date("H")>=9 && date("H")<=24 )){
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
 if($task_hours<=$empTotal_WH)
{
   if($flag){
	   
	   $taskFileName="../files/subtaskWorkHourFiles/".$id2.'.txt';
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
	   	   $taskFileName="../files/subtaskWorkHourFiles/".$id2.'.txt';
	$txt='';
	 $myfile = fopen($taskFileName, "w") or die("Unable to open file!");
	    for($i=$line_number1;$i<=$line_number2;$i++){
			
	 if(substr($lines[$i],0,3)!='Sat'){
	 
	 $checDate= substr($lines[$i],4,10);
	   if($checDate==date('Y-m-d')&& (date("H")>=9 && date("H")<=24 )){
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
    echo 'Enter Valid Dates';
} 

	 } 
	 
	 
	 //////////////////////////////////////////////////////////
	 
	$workStatus='Active';
 
  
  
			if(isset( $_POST["empList"])){
					  $empId=$_POST["empList"];
				 
				 $sum=0;
					$query2 = "SELECT* FROM subtask WHERE taskId='$taskId'";  
				    $resultt = mysqli_query($connect, $query2);  
					 while($row=mysqli_fetch_array($resultt)){
						 
						 $sum=$row['subtaskHours']+$sum;
					 }


				$query2 = "UPDATE task SET taskHours='$sum'  WHERE taskId='$taskId'";  
				    $resultt = mysqli_query($connect, $query2);  
					 
				 
					 $query2 = "UPDATE employee SET workStatus='Active'  WHERE empId='$empId'";  
				    $resultt = mysqli_query($connect, $query2);  
				 
			}
				if(isset( $_POST["selectShift"])){

{
    foreach ($_POST["selectShift"] as $value)
    {
        $query1 = "INSERT INTO subtaskdependency(childSubtaskId,parentSubtaskId)  VALUES ('$id2', '$value')";
		mysqli_query($connect, $query1);
    }
}

}
			
				
			 













			
			
			
 if (array_sum($_FILES['filei']['error']) > 0) {}
    // There was an error 
else{
	

	$time = date("h:i:sa");
$date = date("Y-m-d");
$id =$_SESSION['id'];
  $query2 = "INSERT INTO subtaskfiles(fileName,filePath,uploadDate,uploadTime,subtaskId,attachedBy)  
     VALUES ('$new', '$targetPath', '$date','$time','$id2','$id')";	
		
 $result3=mysqli_query($connect, $query2);	
 
 }


    if($resultt)
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
     VALUES ('10','$id2','$subtaskName','$empId','$time','$date','$id1')";	
		mysqli_query($connect, $query24);
		 
		 
	}
	
}
		
		$query = "SELECT projId FROM task WHERE taskId='".$_POST["taskId"]."'"; 
					$result = mysqli_query($connect, $query);
					while($row = mysqli_fetch_array($result))  {
						$val= $row["projId"];
						}	
		
		 $output .= '             
					  <div class="row">
					    
						<div class="col-lg-12">
						<form> 
							 <div class="form-group pull-right">
						    <button type="button" data-toggle="modal" id="add" data-target="#add_data_Modal" class="btn btn-success"><i class="glyphicon glyphicon-plus-sign"></i> Create Subtask </button>
						</div> </form>
					 
						
						
						
						
						</div> 
                     ';
		$output .= " 	<script>
						  $('#add').click(function(){  
              $('#insert').val('Insert');  
              $('#insert_form3')[0].reset();  
         
   	   
   	  
   	  }); </script>";
		{
			  $output .= '<center><div id="fadeOut" class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-check"></i>  <strong>SubTask Created</strong> 
							</div>
                    </div>
                </div><center>';
			
		
		
		
		}
     $select_query = "SELECT * FROM subtask WHERE taskId = '".$_POST["taskId"]."'";  
     $result = mysqli_query($connect, $select_query);
     $output .= '
      <div id="employee_table">	
	<table id="example77" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
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
   $taskId=$taskId;
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
	  $('#fadeOut').delay(3000).fadeOut('slow');
   $('#example77').DataTable( {
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal( {
                    header: function ( row ) {
                        var data = row.data();
                        return 'Details for '+data[0]+' '+data[1];
                    }
                } ),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                    tableClass: 'table'
                } )
            }
        }
    } );
  </script>";
    }
	else{
		
		 echo "Server down";
	}
    echo $output;
}
?>
 
			   