

<?php
include("config.php");
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
	$workHours = mysqli_real_escape_string($connect, $_POST["workHours2"]); 	
	$workHours =stripslashes( $workHours);
	$countsaturdays = mysqli_real_escape_string($connect, $_POST["countsaturdays"]); 
	$countsaturdays =stripslashes( $countsaturdays);
	$workingdays = mysqli_real_escape_string($connect, $_POST["workingdays"]); 
	$workingdays =stripslashes( $workingdays);
  
    $taskId=$_POST["taskId2"];
     $result5=false;
	 
	 
if($_POST['deadlineCheck2']=='1'){
	
	$query131 = "UPDATE project SET deadline='$deadline' WHERE projId='$projId'";  
				   mysqli_query($connect, $query131);
	
}
	 
	 
	 
if(isset($_POST['saturadayCheck']))
	
	{
		
		 $total_days=$workingdays+$countsaturdays;
		 $taskHours=$total_days*$workHours;
		
	}
	else 
	
	{
		 $taskHours=$workingdays*$workHours;
		
	}
	
$query55 = "DELETE FROM taskassignment WHERE taskId = '".$taskId."'";  
	                 mysqli_query($connect, $query55);
	
if($taskStatus=='Completed'){
		
		$cDate=date("Y-m-d");
	}
	 else{
		 	$cDate='0000-00-00';
	 }
	 

	
	 $flag = '1';
	$query = "
    UPDATE task SET
	taskName='$taskName',
	deadline='$deadline',
	workHours='$workHours', 
	completionDate='$cDate',
	priority='$priority', 
	taskHours='$taskHours', 
	taskStatus='$taskStatus', 
	startDate='$startDate', 
	 projId='$projId'
	 WHERE taskId='".$taskId."'";  
    $result5=mysqli_query($connect, $query);
	 
 
$id=$_POST["taskId2"];
if(!empty( $_POST["empList"])){
	
		$query66 = "SELECT taskHours FROM task  WHERE  taskId = '".$taskId."'";  
				 $result66 = mysqli_query($connect, $query66);
				$row6=mysqli_fetch_array($result66);
	                    $oldTaskHours= $row6['taskHours'];
	
	
	
	
	$query55 = "SELECT * FROM taskassignment  WHERE  taskId = '".$taskId."'";  
				 $result55 = mysqli_query($connect, $query55);
				 if(mysqli_num_rows($result55)<2){
				while($row5=mysqli_fetch_array($result55)){
					$query22 = "SELECT workHours FROM employee  WHERE empId= '".$row5['empId']."'";  
				    $result22 = mysqli_query($connect, $query22);
				
				$row22=mysqli_fetch_array($result22);
					$val1=$row22['workHours']+$oldTaskHours;
					 $query44 = "UPDATE employee SET workHours='$val1' WHERE empId= '".$row5['empId']."'";  
				     mysqli_query($connect, $query44);  
					
					
				
				 }
				 
				   $query444 = "Delete from taskassignment WHERE  taskId = '".$taskId."'";  
				     mysqli_query($connect, $query444);  
}


if(count($_POST["empList"])>1){
				
				
				
				foreach($_POST["empList"] as $empId)
				  {
					  
				 $query1 = "INSERT INTO taskassignment(taskId,empId)  VALUES ('$id', '$empId')";
				 $query11 = "SELECT * FROM employee  WHERE empId='$empId'";  
				 $result11 = mysqli_query($connect, $query11);
				while($row=mysqli_fetch_array($result11)){
					
					
					 $query2 = "UPDATE employee SET workStatus='Active' WHERE empId='$empId'";  
				     mysqli_query($connect, $query2);  
				
				}
				   
				 
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
					
					$val=$row['workHours']-$workHours;
					 $query2 = "UPDATE employee SET workStatus='Active',workHours='$val' WHERE empId='$empId'";  
				     mysqli_query($connect, $query2);  
				
				}
				   
				 
				 mysqli_query($connect, $query1);
				
				  
				  }
	
	
	
	
	
	
}				  

		 





}
	
	
	
			



    if($result5)
    {
		
		
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
		
     $select_query = "SELECT * FROM task WHERE projId = '".$_POST["projId2"]."'";  
     $result = mysqli_query($connect, $select_query);
     $output .= '
      <div id="employee_table">	
	<table id="example4" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>     <tr>  
                        <th>Id</th>
                       <th>Name</th>
					<th>Priority</th>
					<th>Status</th>
					<th>Deadline</th>
				<th>Files</th>
						 <th>View</th>
						<th>Edit</th>
						<th>Delete</th>
						<th>Subtask</th>
                    </tr>

     </thead><tbody> ';
     while($row = mysqli_fetch_array($result))
     {
		 $task=$row["taskId"];
   
   $v='-';
   $id1= $task.$v.$_POST["projId2"];
		 
      $output .= '
         <tr>            <td>' . $row["taskId"] . '</td> 
                         <td>' . $row["taskName"] . '</td> 
                 		  <td>' . $row["priority"] . '</td>  
						   <td>' . $row["taskStatus"] . '</td>  
						    <td>' . $row["deadline"] . '</td>  
							
						   <td><input type="button" name="file" value="files" id="' . $row["taskId"] . '" class="btn btn-success btn-xs file_data2" /></td> 
						<td><input type="button" name="view" value="view" id="' . $row["taskId"] . '" class="btn btn-warning btn-xs view_dataa" /></td>';  
                     
					 if($row["taskStatus"]=='Completed')
					 {
					$output .= ' <td><input type="button" name="edit" value="edit" id="' . $id1 . '" class="btn btn-info btn-xs edit_dataa" disabled></td> '; 
					 }
					 else{
						$output .= ' <td><input type="button" name="edit" value="edit" id="' . $id1 . '" class="btn btn-info btn-xs edit_dataa" /></td> '; 
					 
					 }
						
						
					$output .= '	<td><input type="button" name="delete" value="delete" id="' . $id1 . '" class="btn btn-danger btn-xs delete_dataa" /></td>  
                        <td>    <form method="GET"  action="subtask.php"  >
                  <button type="submit" name="taskId" class="btn btn-primary btn-xs" value="'.$row["taskId"] .'">SubTask</button>
                    </form></td>
                
				   </tr>
	   
      ';
     }
     $output .= '</tbody></table></div>';
	  echo "<script>
 
     var table = $('#example4').DataTable( {
        'bDestroy': true
    } );
 
 
  
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
 
