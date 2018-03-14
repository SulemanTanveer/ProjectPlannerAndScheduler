


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
	$taskStatus = mysqli_real_escape_string($connect, $_POST["taskStatus2"]);
	$startDate2 = mysqli_real_escape_string($connect, $_POST["startDate2"]);   
	$subtaskId = mysqli_real_escape_string($connect, $_POST["subtaskId2"]); 
	$workHours = mysqli_real_escape_string($connect, $_POST["workHours2"]); 	
	$workHours =stripslashes( $workHours);
	$countsaturdays = mysqli_real_escape_string($connect, $_POST["countsaturdays"]); 
	$countsaturdays =stripslashes( $countsaturdays);
	$workingdays = mysqli_real_escape_string($connect, $_POST["workingdays"]); 
	$workingdays =stripslashes( $workingdays);
    $taskId=$_POST["taskId2"];
	

	
if($_POST['deadlineCheck2']=='1'){
	
	$query131 = "UPDATE task SET deadline='$deadline' WHERE taskId='$taskId'";  
				   mysqli_query($connect, $query131);
	
}
	 
	 
	 
if(isset($_POST['saturadayCheck']))
	
	{
		
		 $total_days=$workingdays+$countsaturdays;
		 $subtaskHours=$total_days*$workHours;
		
	}
	else 
	
	{
		 $subtaskHours=$workingdays*$workHours;
		
	}	
	
	
		
  $total_count=0;
         $query88  = "SELECT SUM(subtaskHours)  AS value_sum0 FROM  subtask WHERE taskId= '".$taskId."'";
		 $result88 = mysqli_query($connect, $query88); 
		 $row88 = mysqli_fetch_array($result88);
		 $total_count=$row88['value_sum0'];

			$total_count=$total_count+$subtaskHours;
					
					 
					 $query1212 = "UPDATE task SET taskHours='$total_count' WHERE taskId='$taskId'";  
				     mysqli_query($connect, $query1212);   

	
if(isset( $_POST)){
	
		$query66 = "SELECT * FROM subtask  WHERE  subtaskId = '".$subtaskId."'";  
				 $result66 = mysqli_query($connect, $query66);
				$row6=mysqli_fetch_array($result66);
	                    $oldTaskHours= $row6['workHours'];
	
	
	
	
	$query55 = "SELECT * FROM subtask   WHERE  subtaskId = '".$subtaskId."'";  
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
				  
				  
					
				  
				 }
	 
	 
		
	 $flag = '1';
	 
	if($taskStatus=='Completed'){
		
		$cDate=date("Y-m-d");
	}
	 else{
		 	$cDate='0000-00-00';
	 }
	 
	 
	if(isset($_POST["empList"])){
	 $empId=$_POST["empList"];
	$query = "
    UPDATE subtask SET
	subtaskName='$taskName',
	deadline='$deadline',
	completionDate='$cDate',
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
	 completionDate='$cDate',
	empId='0',
	subtaskHours='$subtaskHours', 
	subtaskStatus='$taskStatus', 
	startDate='$startDate2'
	 WHERE subtaskId='".$subtaskId."'";  
		
	}
	
    $result=mysqli_query($connect, $query);
	if(isset($_POST["empList"])){
	$empId= $_POST["empList"];
	if($taskStatus!='Completed'){
	 $query11 = "SELECT * FROM employee  WHERE empId='$empId'";  
				 $result11 = mysqli_query($connect, $query11);
				while($row=mysqli_fetch_array($result11)){
					
					$val=$row['workHours']-$workHours;
					 $query2 = "UPDATE employee SET workStatus='Active',workHours='$val' WHERE empId='$empId'";  
				    $resultt = mysqli_query($connect, $query2);  
				
				}
	}
	else if($taskStatus=='Completed'){
		 $query22 ="SELECT * FROM taskassignment  WHERE empId='$empId'"; 
				    $resultt2 = mysqli_query($connect, $query22); 
				$count22=mysqli_num_rows($resultt2)	;				
				$query23 ="SELECT * FROM subtask  WHERE empId='$empId'"; 
				    $resultt23 = mysqli_query($connect, $query23);  	
				$count23=mysqli_num_rows($resultt23)	;	

				if($count22==0 && $count23==0){
		 $query11 = "SELECT * FROM employee  WHERE empId='$empId'";  
				 $result11 = mysqli_query($connect, $query11);
				while($row=mysqli_fetch_array($result11)){
					
					 
					 $query2 = "UPDATE employee SET workStatus='In-Active'WHERE empId='$empId'";  
				    $resultt = mysqli_query($connect, $query2);  
				}
		
	}
	}
	}
	 
	
	
 
$id=$_POST["subtaskId2"];		  
				
			   

			}
			





    if(  $result)
    {
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
					 $output .= '	<div class="form-group pull-left">
						 <form method="GET" action="task.php">
                 <button type="submit" name="projId" class="btn btn-info" value="' . $val . '"><i class="glyphicon glyphicon-arrow-left"></i> Back</button>
				
                   </form> 
						</div> 
						
						
						
						
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
		
		
     $select_query = "SELECT * FROM subtask WHERE taskId = '".$_POST["taskId2"]."'";  
     $result = mysqli_query($connect, $select_query);
     $output .= '
      <div id="employee_table">	
	<table id="example44" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>     <tr>  
                         <th>Id</th>
                       <th>Name</th>
					<th>Start Date</th>
					<th>Status</th>
					<th>Deadline</th>
				<th>Files</th>
						 <th>View</th>
						<th>Edit</th>
						<th>Delete</th>
						
                    </tr>

     </thead><tbody> ';
     while($row = mysqli_fetch_array($result))
     {
		 
      $subtaskId=$row["subtaskId"];
   $taskId=$_POST["taskId2"];
   $v='-';
   $id1= $subtaskId.$v.$taskId;
      $output .= '
         <tr>        <td>' . $row["subtaskId"] . '</td> 
                         <td>' . $row["subtaskName"] . '</td> 
                 		  <td>' . $row["startDate"] . '</td>  
						   <td>' . $row["subtaskStatus"] . '</td>  
						    <td>' . $row["deadline"] . '</td>  
							 
						   <td><input type="button"  name="file" value="files"id="' . $row["subtaskId"] . '" class="btn btn-success btn-xs file_data3" /></td>  
                     	
						<td><input type="button" name="view" value="view" id="' . $row["subtaskId"] . '" class="btn btn-warning btn-xs view_dataaa" /></td>  ';

					if($row["subtaskStatus"]=='Completed')
					 {
					$output .= ' <td><input type="button" name="edit" value="edit" id="'.$id1 .'" class="btn btn-info btn-xs edit_dataaa" disabled></td>  ';
					 }
					 else{
						$output .= ' <td><input type="button" name="edit" value="edit" id="'.$id1 .'" class="btn btn-info btn-xs edit_dataaa" /></td> '; 
					
					 }
						

                       $output .= ' 	


					<td><input type="button" name="delete" value="delete" id="' . $id1 . '" class="btn btn-danger btn-xs delete_dataaa" /></td>  
                       
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
 
