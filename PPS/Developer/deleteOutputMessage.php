<?php

include("config.php");
   include("time.php");
 session_start();  
 
if(isset($_SESSION['username']))  { 
   $data = $_POST["employee_id"];

  $query = "DELETE FROM outbox WHERE id = '".$data."'";  
      $result = mysqli_query($connect, $query);  
	    $output = '';
  if( $result){

                                              
		$output = '';								
				 $output .= '<div class="col-lg-12">
                       
						    <div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h3 class="panel-title"></i>Outbox</h3>
                            </div>
                            <div class="panel-body">';						
     $query = "SELECT * FROM `outbox` WHERE sender='".$_SESSION['id']."'";    
     $result = mysqli_query($connect, $query);
     $output .= '<form>               
					  <div class="row">
						<div class="col-lg-12">
							 <div class="form-group pull-right">
						   <button type="button" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-success"><i class="glyphicon glyphicon-envelope"></i> New Message</button>
						</div> </div> </div>
                     </form><center><div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-times"></i>  <strong> Message Deleted</strong> 
							</div>
                    </div>
                </div><center>
      <div id="employee_table">	
	<table id="example5" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>      <tr>  
				 <th>#</th>
                     <th>To</th>
					  <th>Email</th> 
					 <th>Subject</th>
					 
                     <th>Sent</th>
                      <th>Attachments</th>
                       <th>Actions</th>
					    
						 
                  </tr>
     </thead><tbody> ';
     while($row = mysqli_fetch_array($result))
     {
		  $time = time_passed($row['time']);
						 if(strlen($row['subject']) >= 50){
						$subject = substr($row['subject'],0,50)."..";
					}else {
						$subject = $row['subject'];
					}
					
				$filename=$row["fileName"];
					$val2=$row["fileName"].'-'.$row["filepath"];
					
					
                   $query2 = "SELECT * FROM `employee` WHERE empId='".$row["receiver"]."'";  
						$result2 = mysqli_query($connect, $query2);
                     while($row2 = mysqli_fetch_array($result2))
                     {
     
	 
      $output .= '
         <tr>  
                         	<td>' . $row["id"] . '</td>  	
                 		  <td> <img src="' .$row2['image'] .'" width="40px" height="40px" style=" border-radius: 50%;" " />' . $row2["empName"] . '</td>  
						   <td>' . $row2["email"] . '</td>  
							<td>' . $row["subject"] . '</td>  						   
						   <td>' . $row["date"] ."<br>".$time.'</td> 
							 <td><a href="#" id="' . $val2. '" class="check3" onclick="return false;">'.$filename.'</a></td>';
						 $output .= ' 
                      <td>
					  
					  <button type="button" name="view" value="view" id="' . $row["id"] . '" class="btn btn-warning btn-xs view_data" ><i  class="fa fa-search-plus"></i> View </button> ';
					 $output .= ' 
                      <button type="button" name="delete" value="delete" id="' . $row["id"] . '" class="btn btn-danger btn-xs delete_data"  ><i class="fa fa-trash-o"></i> Delete</button></td>
                  
				   </tr>
	   
      ';
					 } }
     $output .= '</tbody></table></div>';
	  echo "<script>
  $(function(){
    var table = $('#example5').DataTable( {
        responsive: true
    } );
 
    new $.fn.dataTable.FixedHeader( table );
  });
  </script>";
}
}
	else{
		
		 echo "Query execution failed";
	}
    echo $output;

?>