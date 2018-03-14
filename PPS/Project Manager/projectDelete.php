<?php

 
   include("config.php");  

 $query1 = "SELECT* FROM `metric` WHERE `pID` = '".$_POST["proj_id"]."'";  
     $result1 = mysqli_query($connect, $query1);  
	  
	   if(mysqli_num_rows( $result1)>0)
	  { 
  while($row = mysqli_fetch_array($result1))
     {
    
    
	if($row['type']=='actual')
	{
	 $query = "DELETE FROM actualmetrics  WHERE mID = '".$row["mID"]."'";  
     $result = mysqli_query($connect, $query);  
     
	}
	
	
	else if($row['type']=='fp')
	{
	 $query = "DELETE FROM fp_metric  WHERE mID = '".$row["mID"]."'";  
     $result = mysqli_query($connect, $query);  
     
	}
	
	else if($row['type']=='ucp')
	{
	 $query = "DELETE FROM ucp_metric  WHERE mID = '".$row["mID"]."'";  
     $result = mysqli_query($connect, $query);  
     
	}
	else if($row['type']=='ee')
	{
	 $query = "DELETE FROM ee_metric  WHERE mID = '".$row["mID"]."'";  
     $result = mysqli_query($connect, $query);  
     
	}
		else if($row['type']=='cocomo')
	{
	 $query = "DELETE FROM cocomo_metric  WHERE mID = '".$row["mID"]."'";  
     $result = mysqli_query($connect, $query);  
     
	}
	
	
	
	  }
	  $query = "DELETE FROM  metric  WHERE pID = '".$_POST["proj_id"]."'";  
     $result = mysqli_query($connect, $query);  
	  
	  
	  
	  }
   
   
   $query = "SELECT* FROM project WHERE projId = '".$_POST["proj_id"]."'";  
      $result = mysqli_query($connect, $query);  
   $row77 = mysqli_fetch_array($result);
   if( $row77['projStatus']=='Not Started')

   {
		 $query = "
    UPDATE team SET
	teamStatus='In-Active'
	 WHERE teamId='". $row77['teamId']."'";  
	 $resultt=mysqli_query($connect, $query);
		 
		 
		 
		 
	 }
   
   
   
   
   $query = "SELECT taskId FROM task WHERE projId = '".$_POST["proj_id"]."'";  
      $result = mysqli_query($connect, $query);  
    while($row = mysqli_fetch_array($result))
     {
		  
   $query2 = "SELECT subtaskId FROM subtask WHERE taskId = '".$row["taskId"]."'";  
      $result2 = mysqli_query($connect, $query2);  
    while($row2 = mysqli_fetch_array($result2))
     {
		 
		$query4 = "DELETE FROM subtask WHERE subtaskId = '".$row2["subtaskId"]."'";		 
		 $query5 = "DELETE FROM subtaskfiles WHERE subtaskId = '".$row2["subtaskId"]."'";  
	 
		 mysqli_query($connect, $query5);  
		 mysqli_query($connect, $query4);  
	 }
	  $query6 = "DELETE FROM taskassignment WHERE taskId = '".$row["taskId"]."'"; 
		$query7 = "DELETE FROM task WHERE taskId = '".$row["taskId"]."'";		 
		 $query8 = "DELETE FROM taskfiles WHERE taskId = '".$row["taskId"]."'";  
		 mysqli_query($connect, $query6);
		 mysqli_query($connect, $query8);  
	     mysqli_query($connect, $query7);
	 
	 
	 }
	 
	 
	 
	 $query11 = "DELETE FROM projectfiles WHERE projId = '".$_POST["proj_id"]."'";  
		 mysqli_query($connect, $query11);  
  $query9 = "DELETE FROM project WHERE projId = '".$_POST["proj_id"]."'";  
      $result9 = mysqli_query($connect, $query9);  
	  
	  
	  
	    $output = '';
   if($result9)
    { 
  
     $output .= '<div class="col-lg-12">
                        
						    <div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h3 class="panel-title"></i>Projects</h3>
                            </div>
                            <div class="panel-body">
							<form>               
					  <div class="row">
						<div class="col-lg-12">
							 <div class="form-group pull-right">
						   <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-success"><i class="glyphicon glyphicon-plus-sign"></i> Add Project</button>
						</div> </div> </div>
                     </form><center><div id="fadeOut" class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-times"></i>  <strong>Project Deleted</strong> 
							</div>
                    </div>
                </div><center>';
     $select_query = "SELECT * FROM project";
     $result = mysqli_query($connect, $select_query);
     $output .= '
      <div id="employee_table">	

	  <table id="example1" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"><thead>     <tr>  
                          <th ><center>Id</center></th>
                     <th><center>Name</center></th>
					 <th><center>Status</center></th>
                      <th><center>Start Date</center></th>
                     <th><center>Deadline</center></th>
					 <th><center>Language</center></th>
					    <th><center>Tasks</center></th>
					<th><center>Actions</center></th>  
                    </tr>

     </thead>  <tbody> ';
    while($row = mysqli_fetch_array($result))
      {
		 
		  $query4 = "SELECT * FROM language where languageId= ".$row['languageId']."";
		             $result4 = mysqli_query($connect, $query4);
					 $row4 = mysqli_fetch_array($result4);
					 
		 
		 
		 
		 
		 
      $output .= '
        <tr>  
                         <td>' . $row["projId"] . '</td> 
                 		  <td>' . $row["projName"] . '</td>'; 

						  
						  
$output .= ' <td><center>';		
					 
					 
					 if($row["projStatus"]=='Completed')
					 {
					 $output .= '<p  style="background-color: #00D211; color:white">'.$row["projStatus"].'</p>'; 
					 }
					 else  if($row["projStatus"]=='In-Progress'){
						  $output .= '<p  style="background-color: #FDC305; color:white">'.$row["projStatus"].'</p>'; 
					 }
					 else  if($row["projStatus"]=='Not Started'){
					  $output .= '<p  style="background-color: #FE0000; color:white">'.$row["projStatus"].'</p>'; 
					}
					 else  if($row["projStatus"]=='Pending'){
					  $output .= '<p  style="background-color: #428bca; color:white">'.$row["projStatus"].'</p>'; 
					}
					  
					  
						
					 $output .= '</center></td> ';




						   
						 $output .= '  <td>' . $row["startDate"] . '</td>  <td>' . $row["deadline"] . '</td>  
							';  
							
							 $output .= '    <td>' .$row4["languageName"]. '</td>'; 
							
							
							
							 $output .= '<td><center>
						<form method="GET" action="task.php">
					   <input type="hidden" name="projId" id="curDate" value="' . $row["projId"] . '">  
                
				      <button type="submit"  class="btn btn-primary btn-xs"  ><i  class="fa fa-pencil"></i> Tasks</button>
					   
                       </form>
                 </center></td>';
				 
				 
					 $output .= '<td><center><button type="button" name="file" value="files" id="' . $row["projId"] . '" class="btn btn-success btn-xs file_data" ><i  class="fa fa-paperclip"></i> Files</button>
						
						<button type="button" name="view" value="view" id="' . $row["projId"] . '" class="btn btn-warning btn-xs view_data" ><i  class="fa fa-search-plus"></i> View</button> 
                     	
						';
				 
							
					 $output .= '	<button type="button" name="edit" value="edit" id="'.$row["projId"] .'" class="btn btn-info btn-xs edit_data" ><i class="fa fa-pencil-square-o" ></i> Edit</button>   
						';
					 
						
						
						
					
						
					     $output .= '	
						<button type="button" name="delete" value="delete" id="' . $row["projId"] . '" class="btn btn-danger btn-xs delete_data" ><i class="fa fa-trash-o"></i> Delete</button></td>  
                        ';
						
                    
                
				    $output .= '	</center> </tr>
	
      ';
     }
     $output .= '	   </tbody></table></div>';
	  echo "<script>
	  $('#fadeOut').delay(3000).fadeOut('slow');
  $(function(){
    var table = $('#example1').DataTable( {
        responsive: true
    } );
 
    new $.fn.dataTable.FixedHeader( table );
  })
  </script><script>
					 
					$('#add').click(function(){ 
					   $('#insert').val('Insert'); 
			$('#insert_form')[0].reset();  
			$('#add_data_Modal22').modal('show');
					 });
					 
			</script>";
    }
	else{
		
		 echo "Server down";
	}
    echo $output;
	 
?>
