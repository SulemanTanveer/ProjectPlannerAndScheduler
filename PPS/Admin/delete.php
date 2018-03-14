<?php

   include("config.php");  
 session_start();
 date_default_timezone_set('Asia/Karachi');
 
 $result1=false;
 $flag=true;
 
 $query2 = "SELECT* from employee  WHERE  empId = '".$_POST["employee_id"]."' AND workStatus='Active'";  
 $result2=mysqli_query($connect, $query2);
	if(mysqli_num_rows($result2)>0){
		
		$flag=false;
	  echo '<script>alert("Employee is active\nAccount can not be deleted..!  ")</script>';
		
		
		
		
	}
	
  $query2 = "SELECT* from taskassignment  WHERE  empId = '".$_POST["employee_id"]."' AND workStatus='Active'";  
 $result2=mysqli_query($connect, $query2);
	if(mysqli_num_rows($result2)>0){
		
		$flag=false;
	  echo '<script>alert("Employee is active\nAccount can not be deleted..!  ")</script>';
		
		
		
		
	}
	$regBy=$_POST["employee_id"];
	$query2 = "SELECT* from project  WHERE  registeredBy = '$regBy'  ";  
 $result2=mysqli_query($connect, $query2);
	if($count=mysqli_num_rows($result2)>0){
		
		$flag=false;
		if($count==1)
		{
			echo '<script>alert("This user manage'. $count.' Project\nAccount can not be deleted..!  ")</script>';
		}
		else{
			
			echo '<script>alert("This user manage'. $count.' Projects\nAccount can not be deleted..!  ")</script>';
		}
		
		
	}
 if($flag){
 
 
	$date = date("Y-m-d");
	$time = date("h:i:sa");
	$query222 = "SELECT* from employee  WHERE position='Project Manager'";
	
	$result222=mysqli_query($connect, $query222);
	 $id1 =$_SESSION['id'];
	while($row222=mysqli_fetch_array($result222)){
		$empId1=$row222['empId'];
	}
	

 
		
	


 $query = "DELETE FROM employee WHERE empId = '".$_POST["employee_id"]."'";  
      $result1 = mysqli_query($connect, $query);  
	
 $query = "DELETE FROM employeelanguage WHERE empId = '".$_POST["employee_id"]."'";  
      $result2 = mysqli_query($connect, $query); 

 $query = "DELETE FROM employeeroles WHERE empId = '".$_POST["employee_id"]."'";  
      $result3 = mysqli_query($connect, $query); 	  
	  
	  unlink('../files/empFiles/'.$_POST["employee_id"].'.txt');
 	  
 }
	    $output = '';
   if($result1 || !$flag)
    { 

  
     $output .= '<div class="col-lg-12">
                        
						    <div class="panel panel-primary" >
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
                     </form>';
					 
			 if($result1)
    { 		 
					
			 $output .= '		 <center><div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-times"></i>  <strong>Account Deleted</strong> 
							</div>
                    </div>
                </div></center>';
	}	
				
     $select_query = "SELECT * FROM employee";
     $result = mysqli_query($connect, $select_query);
     $output .= '
      <div id="employee_table">	
	<table id="example6" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>     <tr>  
                        <th>Id</th>
						<th>Image</th>
                     <th>Name</th>
                     <th>Email</th>
                     <th>Role</th>
                     <th>Work Status</th>
                        <th><center>Actions</center></th>
					    
                    </tr>

     </thead> <tbody>';
     while($row = mysqli_fetch_array($result))
     { $id=$row["empId"];
      $output .= '
         <tr>  
                         <td>' . $row["empId"] . '</td>  
						  <td><center> <img src="' .$row['image'] .'" width="40px" height="40px" style=" border-radius: 50%;" " /></center> </td>
	   			
						  <td>' . $row["empName"] . '</td>  
						   <td>' . $row["email"] . '</td> <td> ';
						   
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
    var table = $('#example6').DataTable( {
        responsive: true
    } );
 
    
  });
  </script>";
    }
	else{
		
		 echo "Query execution failed";
	}
    echo $output;

?>
<script>
$('#age').click(function(){ 
   $('#employee_id').val('');		
			$('#jobStatus').prop('disabled', 'disabled');
			$('#aname1').prop('disabled', 'disabled');
			$('#aname2').prop('disabled', 'disabled');
			$('#aname3').prop('disabled', 'disabled');
			$('#aname4').prop('disabled', 'disabled');
			$('#aname5').prop('disabled', 'disabled');
			$('#aname6').prop('disabled', 'disabled');
			$('input:checkbox').removeAttr('checked');
		    $('#insert').val("Insert");  
            $('#insert_form')[0].reset();  
			if(count>1){										
             
        $('#salary').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
        $('#email').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	   $('#cnic').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	   $('#contactNo').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	   $('#dob').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
}
  
   	  });</script>
	  
	  
	  