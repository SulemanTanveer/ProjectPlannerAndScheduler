<?php

include("config.php");
   include("time.php");
 session_start();  
 
if(isset($_SESSION['username']))  { 
   $data = $_POST["employee_id"];

 {

                                              
		$output = '';								
				 $output .= '<div class="col-lg-12">
                     
						    <div class="panel panel-green" >
                            <div class="panel-heading">
                                <h3 class="panel-title"></i>Seen Notifications</h3>
                            </div>
                            <div class="panel-body">';						
     $query = "SELECT * FROM `notification` WHERE receiverId='".$_SESSION['id']."' and seen='1'";    
     $result = mysqli_query($connect, $query);
     $output .= '  
      <div id="employee_table">	
	<table id="example5" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>     <tr> <th>#</th>
			
                     <th>From</th>
					  <th>Notification Type</th> 
					 <th>Notification Detail</th> 
					 
                     <th>Sent</th>
					
					  <th>Status</th> 
					   
                      	<th><center>Actions</center></th>  
					   
                  </tr>
     </thead><tbody> ';
     while($row = mysqli_fetch_array($result))
     {
		 if($row['notificationType']=='1'){
					  
					 $type='Project File Uplaoded ';
                     
						}
					  
					  if($row['notificationType']=='2'){
					  
					 $type='Task File Uplaoded';
                     
						}
					 
					  if($row['notificationType']=='3'){
					  
					 $type='Subtask File Uplaoded';
                     
						}
					  if($row['notificationType']=='6'){
					  
					 $type='New Project Assigned';
                     
						}
					  if($row['notificationType']=='7'){
					  
					 $type='Project Updated';
                     
						}
					  if($row['notificationType']=='8'){
					  
					 $type='New Task Assigned';
                     
						}
					  if($row['notificationType']=='9'){
					  
					 $type='Task Updated';
                     
						}
					  if($row['notificationType']=='10'){
					  
					 $type='New Subtask Assigned';
                     
						}
					  
					 if($row['notificationType']=='11'){
					  
					 $type='Subtask Updated';
                     
						}  
					  $time =  $row['time'];
				 
				 
					 
                   $query2 = "SELECT * FROM `employee` WHERE empId='".$row["senderId"]."'";  
						$result2 = mysqli_query($connect, $query2);
                     while($row2 = mysqli_fetch_array($result2))
                     {
     
	 
      $output .= '
         <tr>  
                         <td>' . $row["notificationId"] . '</td> 
                 		   <td> <img src="' .$row2['image'] .'" width="40px" height="40px" style=" border-radius: 50%;" " />' . $row2["empName"] . '</td>  
						 
						   <td>' . $type. '</td>  
							 		
								<td>' . $row['notificationDetails']. '</td>  

									
						   <td>' . $row["date"] ."<br>".$time.'</td> <td><center>'; 
							 
						  
							 if($row["seen"]=='1')
					 {
					$output .=  '<p class="'.$row["notificationId"].'" style="background-color: #00D211; color:white">Seen</p>'; 
					 }
					 else  {
						 $output .=  '<p  class="'.$row["notificationId"].'" style="background-color: #FE0000; color:white">Unseen</p>'; 
					 }
							
							
					$output .= 		' </center></td><td><center>';
                      $Id1= $row['notificationTypeId'];
								$Id2= $row['notificationId'];
						        $Id= $Id1.'-'.$Id2;
					    if($row['notificationType']=='1'){
					  
					$output .='   <button type="button" name="view" value="view"  id="'.$Id.'" class="btn btn-warning btn-xs project_file_data" ><i  class="fa fa-search-plus"></i> View</button> ';
                     
						}
					  
					  if($row['notificationType']=='2'){
					  
					$output .='   <button type="button" name="view" value="view"  id="'.$Id.'" class="btn btn-warning btn-xs task_file_data" ><i  class="fa fa-search-plus"></i> View</button> ';
                     
						}
					 
					  if($row['notificationType']=='3'){
					  
					$output .='   <button type="button" name="view" value="view"  id="'.$Id.'" class="btn btn-warning btn-xs subtask_file_data" ><i  class="fa fa-search-plus"></i> View</button> ';
                     
						}
					  if($row['notificationType']=='6'){
					  
					$output .='   <button type="button" name="view" value="view"  id="'.$Id.'" class="btn btn-warning btn-xs proj_assignment" ><i  class="fa fa-search-plus"></i> View</button> ';
                     
						}
					  if($row['notificationType']=='7'){
					  
					$output .='   <button type="button" name="view" value="view"  id="'.$Id.'" class="btn btn-warning btn-xs proj_assignment" ><i  class="fa fa-search-plus"></i> View</button> ';
                     
						}
					  if($row['notificationType']=='8'){
					  
					$output .='   <button type="button" name="view" value="view"  id="'.$Id.'" class="btn btn-warning btn-xs task_assignment" ><i  class="fa fa-search-plus"></i> View</button> ';
                     
						}
					  if($row['notificationType']=='9'){
					  
					$output .='   <button type="button" name="view" value="view"  id="'.$Id.'" class="btn btn-warning btn-xs task_assignment" ><i  class="fa fa-search-plus"></i> View</button> ';
                     
						}
					  if($row['notificationType']=='10'){
					  
					$output .= '    <button type="button" name="view" value="view"  id="'.$Id.'" class="btn btn-warning btn-xs subtask_assignment" ><i  class="fa fa-search-plus"></i> View</button> ';
                     
						}
					  
					 if($row['notificationType']=='11'){
					  
				$output .= '   <button type="button" name="view" value="view"  id="'.$Id.'" class="btn btn-warning btn-xs subtask_assignment" ><i  class="fa fa-search-plus"></i> View</button> ';
                     
						}  



					 $output .= '   <button type="button" name="delete" value="delete" id="' . $row["notificationId"] . '" class="btn btn-danger btn-xs delete_data"  ><i class="fa fa-trash-o"></i> Delete</button></center></td>
                  
				   </tr>
	   
      ';
					 } }
     $output .= '</tbody></table></div>';
	  echo "<script>$('#fadeOut').delay(3000).fadeOut('slow');
  $(function(){
    var table = $('#example5').DataTable( {
        responsive: true
    } );
 
    new $.fn.dataTable.FixedHeader( table );
  })
  </script>";
}
}
	 
    echo $output;

?>