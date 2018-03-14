<?php

  
   include("config.php");  
   $data = $_POST["proj_id"];
  
list($task, $proj) = explode("-", $data);
 
 
	
	
	
	
	$query55 = "SELECT * FROM taskassignment  WHERE  taskId = '".$task."'";  
				 $result55 = mysqli_query($connect, $query55);
				 if(mysqli_num_rows($result55)==1){
				 $query555 = "SELECT * FROM subtask  WHERE  taskId = '".$task."' AND empId!='0'";  
				 $result555 = mysqli_query($connect, $query555);
				 if(mysqli_num_rows($result555)>0){
					 while($row555 = mysqli_fetch_array($result555))
					{   
				$empId=$row555['empId'] ;
					$subTaskId	=$row555['subtaskId'] ;
							$query2 = "UPDATE subtask SET empId='0'  WHERE  subtaskId='$subTaskId'";  
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
							 
$query555 = "SELECT * FROM taskassignment  WHERE  taskId = '".$task."'  ";  
				 $result555 = mysqli_query($connect, $query555);
				 
					  $row555 = mysqli_fetch_array($result555);
				     $empId=$row555['empId'];
							 $taskId=$row555['taskId'];
							 $query2 = "Delete  from taskassignment where empId='$empId'  AND  taskId='$taskId'";  
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
								unlink($taskFileName);						
							  }					
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
					}
						

						}
				 
				 
			 
$taskFileName="../files/taskWorkHourFiles/".$task.".txt";
	if( file_exists ($taskFileName)) {		
		 
 		
	unlink($taskFileName);						
  }	
				 }
				 
				  else if(mysqli_num_rows($result55)>1){
					


 $query555 = "SELECT * FROM subtask  WHERE  taskId = '".$task."' AND empId!='0'";  
				 $result555 = mysqli_query($connect, $query555);
				 if(mysqli_num_rows($result555)>0){
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
					 
					 while($row555 = mysqli_fetch_array($result555))
					{   
				$empId=$row555['empId'] ;
					$subTaskId	=$row555['subtaskId'] ;
						 if( $empId!='0'){
							 
	$empFileName="../files/empFiles/".$empId.".txt";
$taskFileName="../files/subtaskWorkHourFiles/".$subTaskId.".txt";
	if(file_exists ($empFileName) && file_exists ($taskFileName)) {		
		if(replace($taskFileName,$empFileName))
  {			
	unlink($taskFileName);						
  }	
	
  
								}

}
	
  			
					
					}
				 }
					
				
				 }
	 		 
	///////////////////////////// ///////////////////////////////////////////////////////// 		  
    $query2 = "SELECT subtaskId FROM subtask WHERE taskId = '".$task."'";  
      $result2 = mysqli_query($connect, $query2);  
    while($row2 = mysqli_fetch_array($result2))
     {
		 
		$query4 = "DELETE FROM subtask WHERE subtaskId = '".$row2["subtaskId"]."'";		 
		 $query5 = "DELETE FROM subtaskfiles WHERE subtaskId = '".$row2["subtaskId"]."'";  
		 
		 mysqli_query($connect, $query5);  
		 mysqli_query($connect, $query4);  
	 } 
	
	$query6 = "DELETE FROM taskassignment WHERE taskId = '".$task."'";  
		$query7 = "DELETE FROM task WHERE taskId = '".$task."'";  	 
		 $query8 = "DELETE FROM taskfiles WHERE taskId = '".$task."'";  
		 $query10 = "DELETE FROM taskdependency WHERE childTaskId = '".$task."'";  	
		 $query11 = "DELETE FROM taskdependency WHERE parentTaskId = '".$task."'";  	
		 mysqli_query($connect, $query6);
		 mysqli_query($connect, $query8);  
		 mysqli_query($connect, $query10);
		 mysqli_query($connect, $query11);  
	     $result=mysqli_query($connect, $query7);
	 
	 
	    $output = '';
   if($result) 
    {     $output= '';
  $select_query2="SELECT* from project WHERE projId = '".$proj."'";
						 $result2 = mysqli_query($connect, $select_query2);
                          $row2 = mysqli_fetch_array($result2);   
						 if($row2["projStatus"]=='Completed'){
							 $v= '1';
						 } 
						 else{
							 $v= '0';
							 
						 }
     $output .= '              
					  <div class="row">
						<div class="col-lg-12">
							 <div class="form-group pull-right">
						    <button type="button" data-toggle="modal" id="add" data-target="#add_data_Modal" class="btn btn-success"><i class="glyphicon glyphicon-plus-sign"></i> Create Tasks</button>
						</div> 
					  
					   </div> 
					</div>
                    <center><div   id="fadeOut"  class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-times"></i>  <strong>Task Deleted</strong> 
							</div>
                    </div>
                </div><center>';
     $select_query = "SELECT * FROM task WHERE projId = '".$proj."'"; 
     $result = mysqli_query($connect, $select_query);
     $output .= '
      <div id="employee_table">	 <input type="hidden" id="proj_status" value= "'.$v.'"   >
	<table id="example1" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
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
   $id1= $task.$v.$proj;
		 
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
     $output .= ' </tbody></table></div>';
	  echo "<script>$('#fadeOut').delay(3000).fadeOut('slow');
  
     
    var table = $('#example1').DataTable( {
        responsive: true
    } );
 
      $('#add').click(function(){  
	   $('#show').html('');
	  });
  </script>
  
  <script>
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
 
	</script>
  
  ";
    }
 	else
{
		
		 echo "Query execution failed";
	}
    echo $output;

?>