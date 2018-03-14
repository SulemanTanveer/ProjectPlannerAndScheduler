<?php

  
include("config.php");
   include("time.php");
 session_start();  
 
if(isset($_SESSION['username']))  { 
   $data = $_POST["employee_id"];

  $query = "DELETE FROM notification WHERE notificationId = '".$data."'";  
      $result = mysqli_query($connect, $query);  
	    $output = '';
  if( $result){

                                              
		$output = '';								
				 $output .= '<div class="col-lg-12">
                        <div class="panel panel-default">
						    <div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h3 class="panel-title"></i>Inbox</h3>
                            </div>
                            <div class="panel-body">';						
     $query = "SELECT * FROM `notification` WHERE receiverId='".$_SESSION['id']."'";    
     $result = mysqli_query($connect, $query);
     $output .= ' <center><div   id="fadeOut"  class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-times"></i>  <strong> Notification Deleted</strong> 
							</div>
                    </div>
                </div><center>
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
					  if($row['notificationType']=='4'){
					  
					 $type='New Account Created';
                     
						}
					  if($row['notificationType']=='5'){
					  
					 $type='Account Updated';
                     
						}
					  if($row['notificationType']=='12'){
					  
					 $type='Task Completed';
                     
						}
					  if($row['notificationType']=='13'){
					  
					 $type='Task Started';
                     
						}
					  if($row['notificationType']=='14'){
					  
					 $type='Subtask Completed';
                     
						}
					  
					 if($row['notificationType']=='15'){
					  
					 $type='Subtask Started';
                     
						}  
					  $time =  $row['time'];
				 
					
					if($row['seen'] == '1'){
						$open = 'Seen';
					}else {
						$open = 'Unseen';
					}
					 
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
							
							
					$output .= 		' </center></td>
					
					<td><center>';
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
					  if($row['notificationType']=='4'){
					  
					 $output .='   <button type="button" name="view" value="view"  id="'.$Id.'" class="btn btn-warning btn-xs accnt_noti" ><i  class="fa fa-search-plus"></i> View</button> ';
                     
						}
					  if($row['notificationType']=='5'){
					  
					 $output .='   <button type="button" name="view" value="view"  id="'.$Id.'" class="btn btn-warning btn-xs accnt_noti" ><i  class="fa fa-search-plus"></i> View</button> ';
                     
						}
					  if($row['notificationType']=='12'){
					  
					 $output .='   <button type="button" name="view" value="view"  id="'.$Id.'" class="btn btn-warning btn-xs task_Noti" ><i  class="fa fa-search-plus"></i> View</button> ';
                     
						}
					  if($row['notificationType']=='13'){
					  
					 $output .='   <button type="button" name="view" value="view"  id="'.$Id.'" class="btn btn-warning btn-xs task_Noti" ><i  class="fa fa-search-plus"></i> View</button> ';
                     
						}
					  if($row['notificationType']=='14'){
					  
					 $output .='   <button type="button" name="view" value="view"  id="'.$Id.'" class="btn btn-warning btn-xs subtask_Noti" ><i  class="fa fa-search-plus"></i> View</button> ';
                     
						}
					  
					 if($row['notificationType']=='15'){
					  
					 $output .='   <button type="button" name="view" value="view"  id="'.$Id.'" class="btn btn-warning btn-xs subtask_Noti" ><i  class="fa fa-search-plus"></i> View</button> ';
                     
						}  



					 $output .= '   <button type="button" name="delete" value="delete" id="' . $row["notificationId"] . '" class="btn btn-danger btn-xs delete_data"  ><i class="fa fa-trash-o"></i> Delete</button></center>
                  
				  </td> </tr>
	   
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
	else{
		
		 echo "Query execution failed";
	}
    echo $output;

?>