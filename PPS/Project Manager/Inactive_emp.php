
<?php 
 
include("config.php");
if(!$connect){
	echo "connection failed";
	
}
$output ="";

$select_query = "SELECT * FROM employee where workStatus='In-Active'";
     $result = mysqli_query($connect, $select_query);
	 if($result){
     $output .= '<div class="col-lg-12">
                       
						    <div class="panel panel-red" >
                            <div class="panel-heading">
                                <h3 class="panel-title"></i>Accounts</h3>
                            </div>
                            <div class="panel-body">
                                <!-- /.row -->
					   
      <div id="employee_table">	
		<table id="example3" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>     <tr>  
                        <th>Id</th>
						 <th>Image</th>
                     <th>Name</th>
                     <th>Email</th>
                     <th>Role</th>
					 <th>Languages</th>
                     <th>Work Status</th>
                       <th>Actions</th>
                    </tr>

     </thead>  <tbody> ';
     while($row = mysqli_fetch_array($result))
     {
		 
		 
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
					 
					 $query2 = "SELECT * FROM employeelanguage  WHERE empId='".$row["empId"]."'";  
					 $result2 = mysqli_query($connect, $query2);
            
                     while($row2 = mysqli_fetch_array($result2))
                     {$query21 = "SELECT * FROM language  WHERE languageId='".$row2["languageId"]."'";  
					 $result21 = mysqli_query($connect, $query21);
            
                     while($row21 = mysqli_fetch_array($result21))
                     {
						 
					$output .='<li>'.$row21["languageName"].'</li>'; 
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