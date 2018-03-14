


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
	$flg=false;
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
		$description = mysqli_real_escape_string($connect, $_POST["description"]); 
	$description =stripslashes( $description);
    $taskId=$_POST["taskId2"];
	if(isset($_POST["empList"])){
		
		$empId=$_POST["empList"];
	}
	else{
		$empId=0;
		
	}
	$query="Select * from subtask Where subtaskHours='$subtaskHours' And empId='$empId' And startDate='$startDate2' And deadline='$deadline' And subtaskStatus='$taskStatus' and subtaskId='$subtaskId'";
    $resultt = mysqli_query($connect, $query);  
 	 
if(mysqli_num_rows($resultt)>0){
	 $query2 = "UPDATE subtask SET subtaskName='$taskName',description='$description'  WHERE subtaskId='$subtaskId'";  
	   $resultt = mysqli_query($connect, $query2);  

	   
	   
	   
	   
	   
if(isset( $_POST["empList"])){
$id1 =$_SESSION['id'];
		$date = date("Y-m-d");
	$time = date("h:i:sa");
	
		$empId=$_POST["empList"];
				  {
		 
		 $query24 = "INSERT INTO notification (notificationType,notificationTypeId,notificationDetails,receiverId,time,date,senderId)  
     VALUES ('11','$id1','$taskName','$empId','$time','$date','$id1')";	
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
    
    echo $output;




















}
else  if($taskStatus=='Completed'){
		$query="Select * from subtask Where   subtaskId='$subtaskId'";
    $resultt = mysqli_query($connect, $query);  
	$row=mysqli_fetch_array(  $resultt );
	
	if($row['empId']!=$empId)
	
	echo 'no';
		
	}
	else {
		$query="Select * from subtask Where  subtaskId='$subtaskId' and empId!=0 and subtaskStatus='In-Progress'";
    $resultt = mysqli_query($connect, $query);  
	if($row=mysqli_num_rows(  $resultt )>0 && !(isset($_POST["empList"]))){
		echo 'prog';
		 
	}
	else{
		
		$flg=true;
	}


}
  if($flg)
	{
		
		echo 'yes';
	}

}
 

	?>