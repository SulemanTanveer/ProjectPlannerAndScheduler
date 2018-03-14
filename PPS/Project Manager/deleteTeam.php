<?php

  
   include("config.php");  
 
  
  
		$query9 = "SELECT * FROM project WHERE teamId='".$_POST["proj_id"]."'";
		$result9 = mysqli_query($connect, $query9);
          if(mysqli_num_rows($result9)<1){
 
	 
	 
	  $query8 = "DELETE FROM  teammember WHERE teamId = '".$_POST["proj_id"]."'";  
	   $result8 = mysqli_query($connect, $query8);  
	    $query9 = "DELETE FROM team WHERE teamId = '".$_POST["proj_id"]."'";  
      $result = mysqli_query($connect, $query9);  

	  
	    $output = '';
   if($result)
    { 
  
     $output .= '<center><form>               
					  <div class="row">
						<div class="col-lg-12">
							 <div class="form-group pull-right">
						   <button type="button" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-success"><i class="glyphicon glyphicon-plus-sign"></i> Add Team</button>
						</div> </div> </div>
                     </form>
					 
					 <div id="fadeOut" class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-times"></i>  <strong>Team Deleted</strong> 
							</div>
                    </div>
                </div><center>';
      $select_query = "SELECT * FROM team";
     $result = mysqli_query($connect, $select_query);
     $output .= '
      <div id="employee_table">	
	<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>     <tr>  
                        <th>Id</th>
                     <th>Name</th>
					 <th>Status</th>
                    
                     <th>Current Project</th>
					   <th><center>Completed Projects</center></th>
					    <th><center>Total Members</center></th>
                       <th><center>Actions</center></th>
						
                    </tr>

     </thead><tbody> ';
     while($row = mysqli_fetch_array($result))
     {
		 
      $output .= '
   <tr>  
                         <td>' . $row["teamId"] . '</td> 
                 		  <td>' . $row["teamName"] . '</td> '; 
						   $output .= ' <td><center>';		
					 
					 
					 if($row["teamStatus"]=='Active')
					 {
					 $output .= '<p  style="background-color: #00D211; color:white">'.$row["teamStatus"].'</p>'; 
					 }
					 else  if($row["teamStatus"]=='In-Active'){
						  $output .= '<p  style="background-color: #FE0000; color:white">'.$row["teamStatus"].'</p>'; 
					 }
					  
					  
					  
					  
						
					 $output .= '</center></td><td>';

     
				
				$query9 = "SELECT * FROM project WHERE teamId='".$row["teamId"]."' AND projStatus!='Completed'";
				$result9 = mysqli_query($connect, $query9);
			 
					
							if(mysqli_num_rows($result9)>0){
						  $row9 = mysqli_fetch_array($result9);
						 $val= $row9["projName"]; 
						 	}
						
						 else{
							$val= 'Not Assigned';
						 }

					 
					$output .=  $val;
					$output .= '
				 </td><td><center>';
					$query91 = "SELECT * FROM project WHERE teamId='".$row["teamId"]."' AND projStatus='Completed'";
				$result91 = mysqli_query($connect, $query91);
			    $output .= mysqli_num_rows($result91);
					
				 $output .= '
				 </center></td>';
				 	$output .= '
				 <td><center>';
					$query91 = "SELECT * FROM teammember WHERE teamId='".$row["teamId"]."' ";
				$result91 = mysqli_query($connect, $query91);
			    $output .= mysqli_num_rows($result91);
					
				 $output .= '
				 </center></td>';
			 $output .= '	 <td><center><button type="button" name="view" value="view" id="' . $row["teamId"] . '" class="btn btn-warning btn-xs view_data" ><i  class="fa fa-search-plus"></i> View</button>  
                     	<button type="button" name="edit" value="edit" id="'.$row["teamId"] .'" class="btn btn-info btn-xs edit_data"  > <i class="fa fa-pencil-square-o" ></i> Edit</button> 
						<button type="button" name="delete" value="delete" id="' . $row["teamId"] . '" class="btn btn-danger btn-xs delete_data" ><i class="fa fa-trash-o"></i> Delete</button></center></td>  
                        
                
				   </tr>
	   
      ';
     }
     $output .= '</table></div>';
	  echo "<script>$('#fadeOut').delay(3000).fadeOut('slow');
   $('#fadeOut').delay(3000).fadeOut('slow');
    var table = $('#example').DataTable( {
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
		  else{
			  echo'no';
		  }
	?>