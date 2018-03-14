
<?php 
include("config.php");
if(!$connect){
	echo "connection failed";
	
}
$output ="";

$select_query = "SELECT * FROM employee WHERE jobStatus='Employee'";
     $result = mysqli_query($connect, $select_query);
	 if($result){
     $output .= '<div class="col-lg-12">
                        
						    <div class="panel panel-green" >
                            <div class="panel-heading">
                                <h3 class="panel-title"></i>Accounts</h3>
                            </div>
                            <div class="panel-body">
                                <!-- /.row -->
					  <form>               
					  <div class="row">
						<div class="col-lg-12">
							 <div class="form-group pull-right">
						   <button type="button" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-success"><i class="fa fa-plus"></i> Create Account</button>
						</div> </div> </div>
                     </form>
								
      <div id="employee_table">	
	<table id="example3" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>     <tr>  
                        <th>Id</th>
						 <th>Image</th>
                     <th>Name</th>
                     <th>Email</th>
                       <th><center>Roles</center></th>
                     <th>Work Status</th>
                       <th><center>Actions</center></th>
					    
                    </tr>

     </thead>  <tbody> ';
      while($row = mysqli_fetch_array($result))
     { $id=$row["empId"];
      $output .= '
        <tr>  
                         <td>' . $row["empId"] . '</td>  
						  <td><center> <img src="' .$row['image'] .'" width="40px" height="40px" style=" border-radius: 50%;" " /></center> </td>
	   			
						  <td>' . $row["empName"] . '</td>  
						   <td>' . $row["email"] . '</td> <td><ul style="list-style-type:square"> ';
						   
					 $query2 = "SELECT * FROM employeeroles  WHERE empId='".$row["empId"]."'";  
					 $result2 = mysqli_query($connect, $query2);
            
                     while($row2 = mysqli_fetch_array($result2))
                     {$query21 = "SELECT * FROM role  WHERE roleId='".$row2["roleId"]."'";  
					 $result21 = mysqli_query($connect, $query21);
            
                     while($row21 = mysqli_fetch_array($result21))
                     {
						 
					$output .='<li>'.$row21["roleName"].'</li>'; 
					 }
					 }   
						 $output .= '</ul></td><td><center>';		
					 
					 
					 if($row["workStatus"]=='Active')
					 {
					 $output .= '<p  style="background-color: #00D211; color:white">'.$row["workStatus"].'</p>'; 
					 }
					 else  if($row["workStatus"]=='In-Active'){
						  $output .= '<p  style="background-color: #FE0000; color:white">'.$row["workStatus"].'</p>'; 
					 }
					 else{
						  $output .= '<p  style="background-color: #FDC305; color:white">'.$row["workStatus"].'</p>'; 
					 }
					  
					  
					  
						
					 $output .= '</center></td><td>
						
						<button type="button" name="view" value="view" id="' . $row["empId"] . '" class="btn btn-warning btn-xs view_data" ><i  class="fa fa-search-plus"></i> View</button> 
						
                     	 <button type="button" name="edit" value="edit" id="'.$row["empId"] .'" class="btn btn-info btn-xs edit_data" ><i class="fa fa-pencil-square-o" ></i> Edit</button>
						 
						 <button type="button" name="delete" value="delete" id="' . $row["empId"] . '" class="btn btn-danger btn-xs delete_data" ><i class="fa fa-trash-o"></i> Delete</button></td>
						 </td>  
                        
                
				   </tr>
	   
      ';
     }
     $output .= ' </tbody></table></div>';
	  echo "<script>
  $(function(){
    var table = $('#example3').DataTable( {
        responsive: true
    } );
 
 
  });
  </script>";
	 }
	else{
		
		 echo "Server Down";
	}
    echo $output;
	
	
	?>