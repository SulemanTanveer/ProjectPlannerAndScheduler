

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
	$taskHours =stripslashes( $taskHours2);
	$countsaturdays = mysqli_real_escape_string($connect, $_POST["countsaturdays"]); 
	$countsaturdays =stripslashes( $countsaturdays);
	$workingdays = mysqli_real_escape_string($connect, $_POST["workingdays"]); 
	$workingdays =stripslashes( $workingdays);
  
    $taskId=$_POST["taskId2"];
      
	 
	 
if($_POST['deadlineCheck2']=='1'){
	
	$query131 = "UPDATE project SET deadline='$deadline' WHERE projId='$projId'";  
				   mysqli_query($connect, $query131);
	
}
	 
	 
	 
  
	
 
	 

	
	 $flag = '1';
	$query = "
    UPDATE task SET
	taskName='$taskName',
	deadline='$deadline',
	 
	
	priority='$priority', 
	taskHours='$taskHours', 
	taskStatus='$taskStatus', 
	startDate='$startDate', 
	 projId='$projId'
	 WHERE taskId='".$taskId."'";  
    $result5=mysqli_query($connect, $query);
	 
 
$id=$_POST["taskId2"];

if(!isset( $_POST["empList"])){
		 $sql2="SELECT * FROM taskassignment WHERE taskId = '". $taskId."'";
		$result2 = mysqli_query($connect, $sql2);
		 $count = mysqli_num_rows($result2);
		if($count==1){
		$row=mysqli_fetch_array($result2);
		 $sql211="SELECT * FROM subtask WHERE empId = '". $row['empId']."' AND taskId = '". $taskId."'";
		$result211 = mysqli_query($connect, $sql211);
		$count211 = mysqli_num_rows($result211);	
		 $sql21="SELECT * FROM subtask WHERE empId = '". $row['empId']."' AND taskId = '". $taskId."' AND subtaskStatus!='Completed'";
		$result21 = mysqli_query($connect, $sql21);
		$count21 = mysqli_num_rows($result21);	
			
			if($count21>0){
				echo 'cond1';
		 	
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
						 
						}
						  		 
				while($row21=mysqli_fetch_array($result21)){
					echo '1st cond';
					
						$empFileName="../files/empFiles/".$row21['empId'].".txt";
						$taskFileName="../files/subtaskWorkHourFiles/".$row21['subtaskId'].".txt";
						if(file_exists ($taskFileName) && file_exists ($empFileName))	{	
							
								
							
						 replace($taskFileName,$empFileName);
						//unlink($taskFileName);
					
						}

						}
						$sql245="SELECT * FROM taskassignment WHERE taskId = '". $taskId."'";
						$result245 = mysqli_query($connect, $sql245);
						 $row45=mysqli_fetch_array($result245);
						$emp=$row45['empId'];
						$Query="DELETE FROM taskassignment where empId='$emp'";
						mysqli_query($connect,$Query);
					
	 	}
		
		
		else  if($count211<1){
			$sql22="SELECT * FROM taskassignment WHERE taskId = '". $taskId."'";
		$result22 = mysqli_query($connect, $sql22);
		 
			$row=mysqli_fetch_array($result22);
			 $emp=$row['empId'];
				 $empFileName="../files/empFiles/".$row['empId'].".txt";
					 $taskFileName="../files/taskWorkHourFiles/".$row['taskId'].".txt";
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
						 
						}
						  if(file_exists ($taskFileName) && file_exists ($empFileName))	{	
							
								
							
						 replace($taskFileName,$empFileName);
						//unlink($taskFileName);
					
						}
	
						 
						 
						
				 	$Query="DELETE FROM taskassignment where empId='$emp' and taskId='$taskId'";
				 mysqli_query($connect,$Query);
			
			  
			
		}
		
		
		
	
		
		
		
		
		
		}
		else if($count>1){
			echo 'sdfdf';
			////////////////////
		 
			 
			
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
						 
						}
						
						 $sql25="SELECT * FROM taskassignment WHERE taskId = '". $taskId."'";
					$result25 = mysqli_query($connect, $sql25);
					 while($row25=mysqli_fetch_array($result25)){
		
		
				 $sql215="SELECT * FROM subtask WHERE empId = '". $row25['empId']."' AND taskId = '". $row25['taskId']."' AND subtaskStatus!='Completed'";
				$result215 = mysqli_query($connect, $sql215);
				$count215 = mysqli_num_rows($result215);	
					
			if($count215>0){		  		 
				while($row215=mysqli_fetch_array($result215)){
					 
						$empFileName="../files/empFiles/".$row215['empId'].".txt";
						$taskFileName="../files/subtaskWorkHourFiles/".$row215['subtaskId'].".txt";
								
							
								
							
						if(file_exists ($taskFileName) && file_exists ($empFileName))	{	
							
								
							
						 replace($taskFileName,$empFileName);
						//unlink($taskFileName);
					
						}


						}
						$emp=$row215['empId'];
					$Query="DELETE FROM taskassignment where  empId = '". $row25['empId']."' AND taskId = '". $row25['taskId']."'";
					mysqli_query($connect,$Query);
			
			
			
			
			/////////////////
		}
		else{
			
			$Query="DELETE FROM taskassignment where  empId = '". $row25['empId']."' AND taskId = '". $row25['taskId']."'";
					mysqli_query($connect,$Query);
			
			
			
			
		}
					 }
		 
		
	 	}
				
}
else{
	 
	         $sql215="SELECT * FROM taskassignment WHERE taskId = '". $taskId."'";
				$result215 = mysqli_query($connect, $sql215);
				$count215 = mysqli_num_rows($result215);	
	if($count215==0){
	foreach($_POST["empList"] as $empId)
				  {
					  
				 $query1 = "INSERT INTO taskassignment(taskId,empId)  VALUES ('$taskId', '$empId')";
				 $query11 = "SELECT * FROM employee  WHERE empId='$empId'"; 
                 mysqli_query($connect, $query1);				 
				 $result11 = mysqli_query($connect, $query11);
				while($row=mysqli_fetch_array($result11)){
					
					
					 $query2 = "UPDATE employee SET workStatus='Active' WHERE empId='$empId'";  
				     mysqli_query($connect, $query2);  
				
				}
	
				  }
	}
	
	else if($count215>0){
		///////////////////////////////////////
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
						 
						}
		/////////////////////////////////////////
		
	          while($row333=mysqli_fetch_array($result215)){
	
					foreach($_POST["empList"] as $empId)
				  {
					  
				 if($empId==$row333['empId']){
					 
					 
					$flag33=false; 
					 
					 
				 }
				 else{
					 $flag33=true; 
				 }
				
				}
	
	if($flag33){ echo'kjkjkjk';
		$sql245="SELECT * FROM subtask WHERE empId = '". $row333['empId']."' AND taskId = '". $row333['taskId']."' AND subtaskStatus!='Completed'";
		$result245 = mysqli_query($connect, $sql245);
		$count245 = mysqli_num_rows($result245);
		if($count245>0){
			 while($row245=mysqli_fetch_array($result245)){
			$empFileName="../files/empFiles/".$row245['empId'].".txt";
				$taskFileName="../files/subtaskWorkHourFiles/".$row245['subtaskId'].".txt";
								
				if(file_exists ($taskFileName) && file_exists ($empFileName))	{	
							
								
							
						 replace($taskFileName,$empFileName);
						//unlink($taskFileName);
					
						}
					 	$sql2455="DELETE FROM subtask WHERE empId = '". $row245['empId']."' AND subtaskId = '". $row245['taskId']."' ";
		$result2455 = mysqli_query($connect, $sql2455);
						 
		}
		
		$sql2455="DELETE FROM taskassignment WHERE empId = '". $row333['empId']."' AND taskId = '". $row333['taskId']."' ";
		$result2455 = mysqli_query($connect, $sql2455);
		
		}
		else{
			
			$sql2455="DELETE FROM taskassignment WHERE empId = '". $row333['empId']."' AND taskId = '". $row333['taskId']."' ";
		$result2455 = mysqli_query($connect, $sql2455);
			
			
		}
		
	}
	
	
	
			  }
	
	
$sql777="SELECT * FROM taskassignment WHERE taskId = '". $taskId."'";
				$result777 = mysqli_query($connect, $sql777);
	
					foreach($_POST["empList"] as $empId)
				  { 
					  	while($row3333=mysqli_fetch_array($result777)){
						 
				 if($empId==$row3333['empId']){
					 
					 
					$flag333=false; 
					 
					 
				 }
				 else{
					 $flag333=true; 
				 }
				
	}
	if($flag333){
		
		 $query1 = "INSERT INTO taskassignment(taskId,empId)  VALUES ('$taskId', '$empId')";
				 $query11 = "SELECT * FROM employee  WHERE empId='$empId'"; 
                 mysqli_query($connect, $query1);				 
				 $result11 = mysqli_query($connect, $query11);
				while($row=mysqli_fetch_array($result11)){
					
					
					 $query2 = "UPDATE employee SET workStatus='Active' WHERE empId='$empId'";  
				     mysqli_query($connect, $query2);  
				
				}
		
		
		
	}
	
	
	}
	
	
	
	
	
	}
	
	
	
	
	
}

    if($result5)
    {
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
     VALUES ('9','$id','$taskName','$empId','$time','$date','$id1')";	
		mysqli_query($connect, $query24);
		 
		 
	}
	
}
		
		 $output .= '  <div class="row">
						<div class="col-lg-12">
							 <div class="form-group pull-right">
						    <button type="button" data-toggle="modal" id="add" data-target="#add_data_Modal" class="btn btn-success"><i class="glyphicon glyphicon-plus-sign"></i> Create Tasks</button>
						</div> 
						 <div class="form-group pull-left">
							 <button id="button1" class="btn btn-danger" value= "'.$_POST["projId2"].'""><i class="fa fa-bar-chart"></i>Gantt Chart<img src="../images/oo.gif" id="img2" style="display:none; width:40px;height:40px;"/ ></button>
						</div> 
					   </div> 
					</div>';
		
		if($_POST["taskId2"]!=''){
			
       $output .= '<center><div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-check"></i>  <strong>Task Updated</strong> 
							</div>
                    </div>
                </div><center>';
		}
		  $select_query2="SELECT* from project WHERE projId = '".$_POST["projId2"]."'";
						 $result2 = mysqli_query($connect, $select_query2);
                          $row2 = mysqli_fetch_array($result2);   
						 if($row2["projStatus"]=='Completed'){
							 $v= '1';
						 } 
						 else{
							 $v= '0';
							 
						 }
     $select_query = "SELECT * FROM task WHERE projId = '".$_POST["projId2"]."'";  
     $result = mysqli_query($connect, $select_query);
     $output .= '
      <div id="employee_table">						  <input type="hidden" id="proj_status" value= "'.$v.'"   > <div class="row">
	<table id="example4" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
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
   $id1= $task.$v.$_POST["projId2"];
		 
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
	  echo "<script>
 
     var table = $('#example4').DataTable( {
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
		
		 echo "Updated";
	}
    echo $output;
	 
}
?>
 
