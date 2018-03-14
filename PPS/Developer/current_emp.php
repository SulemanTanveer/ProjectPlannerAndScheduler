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
                        <div class="panel panel-default">
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
	<table id="example2" class="table table-striped table-bordered nowrap" >
                <thead>     <tr>  
                        <th>Id</th>
						 <th>Image</th>
                     <th>Name</th>
                     <th>Email</th>
                     
                     <th>Work Status</th>
                       <th>View</th>
					    <th>Edit</th>
						 <th>Delete</th>
                    </tr>

     </thead> <tbody>  ';
     while($row = mysqli_fetch_array($result))
     {
		 
		 
      $output .= '
       <tr>  
                         <td>' . $row["empId"] . '</td> 
               <td><img style=" border-radius: 50%;" src="' .$row['image'] .'" width="40px" height="40px"  /></td>
	   						 
						  <td>' . $row["empName"] . '</td>  
						   <td>' . $row["email"] . '</td>  
						
						  
							<td>' . $row["workStatus"] . '</td>  
						<td><input type="button" name="view" value="view" id="' . $row["empId"] . '" class="btn btn-warning btn-xs view_data" /></td>  
                     	<td><input type="button" name="edit" value="edit" id="'.$row["empId"] .'" class="btn btn-info btn-xs edit_data" /></td>  
						<td><input type="button" name="delete" value="delete" id="' . $row["empId"] . '" class="btn btn-danger btn-xs delete_data" /></td>  
                        
                
				   </tr>
	   
      ';
     }
     $output .= '</tbody></table></div>';
	  echo "<script>
  $(function(){
    var table = $('#example2').DataTable( {
        responsive: true
    } );
 
    new $.fn.dataTable.FixedHeader( table );
  })
  </script>";
	 }
	else{
		
		 echo "Server Down";
	}
    echo $output;
	
	
	?>