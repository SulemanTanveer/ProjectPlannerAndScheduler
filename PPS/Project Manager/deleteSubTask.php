<?php
  
   include("config.php");  
   $data = $_POST["proj_id"];
  
list($subTaskId, $taskId) = explode("-", $data);
  
  

  
  
    $query66 = "SELECT* FROM subtask  WHERE  subtaskId = '".$subTaskId."'";  
				 $result66 = mysqli_query($connect, $query66);
				$row6=mysqli_fetch_array($result66);
	                    $oldTaskHours= $row6['subtaskHours'];
					 $empId= $row6['empId'];
						 
						
						
	$total_count=0;
         $query88  = "SELECT SUM(subtaskHours)  AS value_sum0 FROM  subtask WHERE taskId= '".$taskId."'";
		 $result88 = mysqli_query($connect, $query88); 
		 $row88 = mysqli_fetch_array($result88);
		 $total_count=$row88['value_sum0'];

			$total_count=$total_count-$oldTaskHours;
					
					 
					 $query1212 = "UPDATE task SET taskHours='$total_count'' WHERE taskId='$taskId'";  
				     mysqli_query($connect, $query1212);   
	
$taskFileName="../files/subtaskWorkHourFiles/".$subTaskId.".txt";						    
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////	
	 if( $empId!='0'){
	$empFileName="../files/empFiles/".$empId.".txt";
$taskFileName="../files/subtaskWorkHourFiles/".$subTaskId.".txt";
		
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
  

if(file_exists ($empFileName) && file_exists ($taskFileName)) {			
 replace($taskFileName,$empFileName);	
	}
}
	
	 
	 
	 
 /////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
 
		$query4 = "DELETE FROM subtask WHERE  subtaskId = '".$subTaskId."'";   
		 $query5 = "DELETE FROM subtaskfiles WHERE  subtaskId = '".$subTaskId."'"; 
		$query10 = "DELETE FROM subtaskdependency WHERE childSubtaskId = '".$subTaskId."'";  	
		 $query11 = "DELETE FROM subtaskdependency WHERE parentSubtaskId = '".$subTaskId."'";  		 
		 
		 mysqli_query($connect, $query5);  
		 mysqli_query($connect, $query10);
		 mysqli_query($connect, $query11);  
		 
		 $result=mysqli_query($connect, $query4);  
	 $query421 = "SELECT* FROM subtask  WHERE   taskId = '".$taskId."'";  
							 $result421 = mysqli_query($connect, $query421);
								if(mysqli_num_rows($result421)<1){
									$query4 = "DELETE FROM  taskassignment WHERE  taskId = '".$taskId."'"; 
									mysqli_query($connect, $query4);
                                      $query2 = "UPDATE task SET taskStatus='Pending',taskHours='0' WHERE taskId = '".$taskId."'"; 
				                     mysqli_query($connect, $query2);  
				  
									
								} 
	    $output = '';
 if($result)
    {    
 
		$query = "SELECT projId FROM task WHERE taskId='".$taskId."'"; 
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
			  $output .= '<center><div   id="fadeOut"  class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-check"></i>  <strong>SubTask Deleted</strong> 
							</div>
                    </div>
                </div><center>';
			
		
		
		
		}
		
     $select_query = "SELECT * FROM subtask WHERE taskId = '".$taskId."'";  
     $result = mysqli_query($connect, $select_query);
     $output .= '
      <div id="employee_table">	
	<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
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
	  echo "<script>$('#fadeOut').delay(3000).fadeOut('slow');
 
    var table = $('#example').DataTable( {
        responsive: true
    } );
 
    new $.fn.dataTable.FixedHeader( table );
 
  </script>	";
    }
	 else
	{
		
		 echo "Query execution failed";
	}
    echo $output;

?>

			 