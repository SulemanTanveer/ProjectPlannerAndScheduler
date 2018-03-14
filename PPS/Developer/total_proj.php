<?php
	include("config.php");
	 session_start();  
if(!$connect){
	echo "connection failed";
	
}
$output ="";


       $output .= ' <div class="col-lg-12">
                        <div class="panel panel-primary">
						     
                            <div class="panel-heading">
                                <h3 class="panel-title"></i>Projects</h3>
                            </div>
                            <div class="panel-body">
							
							 ';
		
	

     $output .= '
      <div id="employee_table">	
	<table id="example6" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>     <tr>  
                        <th>Id</th>
                     <th>Name</th>
					 <th>Status</th>
                    
                     <th>Deadline</th>
					  <th>Start Date</th>
					    <th>Task</th>
					   <th><center>Actions</center></th>
                       
						
                    </tr>

     </thead> ';
	     $query1 = "SELECT * FROM teammember where empId ='".$_SESSION['id']."' ";
		$result1 = mysqli_query($connect, $query1);
		   while($row1 = mysqli_fetch_array($result1))
                     {
						 
 
						 
					$query3 = "SELECT * FROM project   where teamId ='".$row1['teamId']."'";
		$result3 = mysqli_query($connect, $query3);
            
                     while($row = mysqli_fetch_array($result3))
                     {	
		 
      $output .= '
       <tbody>  <tr>  
                         <td>' . $row["projId"] . '</td> 
                 		  <td>' . $row["projName"] . '</td><td><center>';  
						  
						  
						  if($row["projStatus"]=='Completed')
					 {
					 $output .= '<p  style="background-color: #00D211; color:white">'.$row["projStatus"].'</p>'; 
					 }
					 else  if($row["projStatus"]=='In-Progress'){
						  $output .= '<p  style="background-color: #FDC305; color:white">'.$row["projStatus"].'</p>'; 
					 }
					 else if($row["projStatus"]=='Not Started'){
						  $output .= '<p  style="background-color: #FE0000; color:white">'.$row["projStatus"].'</p>'; 
					 }
					else if($row["projStatus"]=='Pending'){
						  $output .= '<p  style="background-color: #428bca; color:white">'.$row["projStatus"].'</p>'; 
					 }	   
						   
						     $output .= ' </center></td><td>' . $row["deadline"] . '</td>  
							
							
							
							<td>' . $row["startDate"] . '</td>  
							 <td> 
						<form method="GET" action="task.php">
					   <input type="hidden" name="projId" id="curDate" value="' . $row["projId"] . '">  
                
				      <button type="submit"  class="btn btn-primary btn-xs"  >Task</button>
					   
                       </form>
                 </td>
						<td><center><button type="button" name="file" value="files" id="' . $row["projId"] . '" class="btn btn-success btn-xs file_data"  > <i  class="fa fa-paperclip"></i> Files</button> 
						 <button type="button" name="view" value="view" id="' . $row["projId"] . '" class="btn btn-warning btn-xs view_data" > <i  class="fa fa-search-plus"></i> View</button>
                     	  </tr>
	   </tbody>
      ';
					 }}
     $output .= '</table></div>
				
								
							';
	  echo "<script>
	  
	  	$('#add').click(function(){  
              $('#insert').val('Insert');  
              $('#insert_form')[0].reset();  
         
   	   
   	  
   	  }); 
	  
  $(function(){
    var table = $('#example6').DataTable( {
        responsive: true
    } );
 
    new $.fn.dataTable.FixedHeader( table );
  });
  </script>";
 echo $output;
	?>