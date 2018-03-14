

<?php
include("config.php");
   include("time.php");
 session_start();  
 
if(isset($_SESSION['username']))  {
                                              
		$output = '';								
										
     $query = "SELECT * FROM `inbox` WHERE receiver='".$_SESSION['id']."'";    
     $result = mysqli_query($connect, $query);
     $output .= ' <div class="row">
                    <div class="col-lg-12">
                         
						    <div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h3 class="panel-title"></i>Messages</h3>
                            </div>
                            <div class="panel-body"><form>               
					  <div class="row">
						<div class="col-lg-12">
							 <div class="form-group pull-right">
						   <button type="button" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-success"><i class="glyphicon glyphicon-envelope"></i> New Message</button>
						</div> </div> </div>
                     </form>
      <div id="employee_table">	
	<table id="example4" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>      <tr> <th>#</th>
			
                     <th>From</th>
					  <th>Email</th> 
					 <th>Subject</th>
					 
                     <th>Sent</th>
					 <th>Status</th>
					 <th>Attachments</th>
                      <th><center>Actions</center></th>
                  </tr>
     </thead><tbody> ';
     while($row = mysqli_fetch_array($result))
     {
		  $time = $row['time'] ;
						 if(strlen($row['subject']) >= 50){
						$subject = substr($row['subject'],0,50)."..";
					}else {
						$subject = $row['subject'];
					}
					
					 
					$filename=$row["fileName"];
					$val2=$row["fileName"].'-'.$row["filepath"];
					
                   $query2 = "SELECT * FROM `employee` WHERE empId='".$row["sender"]."'";  
						$result2 = mysqli_query($connect, $query2);
                     while($row2 = mysqli_fetch_array($result2))
                     {
     
	 
      $output .= '
         <<tr>  
                           <td>' . $row["id"] . '</td>  
                 		   <td> <img src="' .$row2['image'] .'" width="40px" height="40px" style=" border-radius: 50%;" " />' . $row2["empName"] . '</td>  
						 
						   <td>' . $row2["email"] . '</td>  
							<td>' . $row["subject"] . '</td>  						   
						   <td>' . $row["date"] ."<br>".$time.'</td><td><center>'; 
							 
						  
							 if($row["open"]=='1')
					 {
					$output .=  '<p class="'.$row["id"].'" style="background-color: #00D211; color:white">Seen</p>'; 
					 }
					 else  {
						 $output .=  '<p  class="'.$row["id"].'" style="background-color: #FE0000; color:white">Unseen</p>'; 
					 }
							
							
					$output .= 		' </center></td><td><a href="#" id="' . $val2 . '" class="check3" onclick="return false;">' . $filename. '</a></td>
                     
					 <td>
					 
					 <button type="button" name="view" value="view" id="' . $row["id"] . '" class="btn btn-warning btn-xs view_data" ><i  class="fa fa-search-plus"></i> View</button>  
                      <button type="button" name="reply" value="reply" id="' . $row["id"] . '" class="btn btn-info btn-xs reply_data" > <i class="fa fa-reply"></i> Reply</button>
                      <button type="button" name="delete" value="delete" id="' . $row["id"] . '" class="btn btn-danger btn-xs delete_data" ><i class="fa fa-trash-o"></i> Delete</button>
					  </td>
			 
				   </tr>
	   
      ';
					 } }
     $output .= '</tbody></table></div>';
	  echo "<script>
  $(function(){
    var table = $('#example4').DataTable( {
        responsive: true
    } );
 
    new $.fn.dataTable.FixedHeader( table );
  })
  </script>";
    }
	else{
		
		 echo "Not Reload";
	}
    echo $output;

?>
 
