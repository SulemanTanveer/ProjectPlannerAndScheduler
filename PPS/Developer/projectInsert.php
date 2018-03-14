

<?php
 session_start();
include("config.php");
date_default_timezone_set('Asia/Karachi');
if(!$connect){
	echo "connection failed";
	
}
$flag = '0';
   if (array_sum($_FILES['filename']['error']) > 0) {
	 
 }
else{
    
	   
$new_name='';  
                $sourcePath='';  
                $targetPath='';  
   if(is_array($_FILES))  
 {  
      foreach($_FILES['filename']['name'] as $name => $value)  
      {  
           
		   $file_name = explode(".", $_FILES['filename']['name'][$name]);  
           $allowed_extension = array("jpg", "jpeg", "png","txt","pdf","docx", "gif");  
           if(in_array($file_name[1], $allowed_extension))  
           {    $new = $value;  
                $new_name = rand() . '.'. $file_name[1];  
                $sourcePath = $_FILES["filename"]["tmp_name"][$name];  
                $targetPath = "../files/".$new_name;  
			    
                move_uploaded_file($sourcePath, $targetPath);  
				
           }  
      }  
    
 }
 }
	$output = '';
	
    $projName = mysqli_real_escape_string($connect, $_POST["projName"]);  
	$projName =stripslashes( $projName);
    $deadline = mysqli_real_escape_string($connect, $_POST["deadline"]);
	$deadline =stripslashes( $deadline);
    $startDate = mysqli_real_escape_string($connect, $_POST["startDate"]);
	$startDate =stripslashes( $startDate);
    $projStatus = mysqli_real_escape_string($connect, $_POST["projStatus"]);
	$projStatus =stripslashes( $projStatus);
      $teamId = mysqli_real_escape_string($connect, $_POST["teamId"]);
	  $teamId =stripslashes( $teamId);
   
       $description = mysqli_real_escape_string($connect, $_POST["description"]);
	   $description =stripslashes( $description);
$date = date("Y-m-d");
	if($_POST) {
	
	if($teamId=='Un Assign'){
	$query = "
    INSERT INTO project(projName,deadline,startDate,projStatus,description)  
     VALUES ('$projName', '$deadline', '$startDate', 'Pending','$description')
	";
	$result8=mysqli_query($connect, $query);
}
	else{
		$query = "
    INSERT INTO project(projName,deadline,assignmentDate,startDate,projStatus,description)  
     VALUES ('$projName', '$deadline','$date', '$startDate', '$projStatus','$description')
	";
	$result8=mysqli_query($connect, $query);
	$query3 = "SELECT* FROM project ORDER BY projId DESC LIMIT 1";
	$result3=mysqli_query($connect, $query3);
	$row=mysqli_fetch_array($result3);
	 $projIdVal=$row['projId'];
	 
   $query5 = "
    INSERT INTO projectassignment(projId,teamId)  
     VALUES ('$projIdVal','$teamId')
	"; 
	mysqli_query($connect, $query5);

		
	
	 
	 
	 if (array_sum($_FILES['filename']['error']) > 0) {
	 
 }
else{
    

$query3 = "SELECT* FROM project ORDER BY projId DESC LIMIT 1";
$result3=mysqli_query($connect, $query3);
$row=mysqli_fetch_array($result3);
$typeId=$row['projId'];
 $time = date("h:i:sa");
$date = date("Y-m-d");
$id =$_SESSION['id'];
  $query2 = "INSERT INTO projectfiles(fileName,filePath,uploadDate,uploadTime,projId,attachedBy)  
     VALUES ('$new', '$targetPath', '$date','$time','$typeId','$id')";	
		
	$result8=mysqli_query($connect, $query2);	
}

}
    if($result8||$result)
    {
		if($_POST["proj_id"]!=''){
       $output .= ' <div class="col-lg-12">
                        <div class="panel panel-default">
						    <div class="panel panel-yellow" >
                            <div class="panel-heading">
                                <h3 class="panel-title"></i>Projects</h3>
                            </div>
                            <div class="panel-body"><form>               
					  <div class="row">
						<div class="col-lg-12">
							 <div class="form-group pull-right">
						   <button type="button" name="add" id="add3" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-success"><i class="glyphicon glyphicon-plus-sign"></i> Add Project</button>
						</div> </div> </div>
                     </form><center><div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-check"></i>  <strong>Project Updated</strong> 
							</div>
                    </div>
                </div><center>';
		}
		else{
			  $output .= ' <div class="col-lg-12">
                        <div class="panel panel-default">
						    <div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h3 class="panel-title"></i>Projects</h3>
                            </div>
                            <div class="panel-body"><form>               
					  <div class="row">
						<div class="col-lg-12">
							 <div class="form-group pull-right">
						   <button type="button" name="add" id="add2" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-success"><i class="glyphicon glyphicon-plus-sign"></i> Add Project</button>
						</div> </div> </div>
                     </form><center><div class="row" id="fadeOut" >
                    <div class="col-lg-12">
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-check"></i>  <strong>Project Created</strong> 
							</div>
                    </div>
                </div><center>';
			
		
		
		
		}
     $select_query = "SELECT * FROM project";
     $result = mysqli_query($connect, $select_query);
     $output .= '
      <div id="employee_table">	
	<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>     <tr>  
                        <th>Id</th>
                     <th>Name</th>
					 <th>Status</th>
                    
                     <th>Deadline</th>
					  <th>Start Date</th>
					  
					   <th>Files</th>
                       <th>View</th>
					    <th>Edit</th>
						 <th>Delete</th>
						  <th>Task</th>
                    </tr>

     </thead>  <tbody> ';
     while($row = mysqli_fetch_array($result))
     {
		 
      $output .= '
        <tr>  
                         <td>' . $row["projId"] . '</td> 
                 		  <td>' . $row["projName"] . '</td>  
						   <td>' . $row["projStatus"] . '</td>  
						    <td>' . $row["deadline"] . '</td>  
							<td>' . $row["startDate"] . '</td>  
							
						<td><input type="button" name="file" value="files" id="' . $row["projId"] . '" class="btn btn-success btn-xs file_data" /></td> 
						
						<td><input type="button" name="view" value="view" id="' . $row["projId"] . '" class="btn btn-warning btn-xs view_data" /></td>  
                     	
						';
						if($row["projStatus"]=='Completed')
					 {
						
					 $output .= '	<td><input type="button" name="edit" value="edit" id="'.$row["projId"] .'" class="btn btn-info btn-xs edit_data" disabled></td>  
						'; }
					 else{
							
					 $output .= '	<td><input type="button" name="edit" value="edit" id="'.$row["projId"] .'" class="btn btn-info btn-xs edit_data" /></td>  
						';
					 }
						
						
						
					
						
					     $output .= '	
						<td><input type="button" name="delete" value="delete" id="' . $row["projId"] . '" class="btn btn-danger btn-xs delete_data" /></td>  
                        <td> 
						<form method="GET" action="task.php">
					   <input type="hidden" name="projId" id="curDate" value="' . $row["projId"] . '">  
                
				      <button type="submit"  class="btn btn-primary btn-xs"  >Task</button>
					   
                       </form>
                 </td>
                    
                
				   </tr>
	
      ';
     }
     $output .= '   </tbody></table></div>';
	  echo "<script> $('#fadeOut').delay(3000).fadeOut('slow');
	  
	  	$('#add').click(function(){  
              $('#insert').val('Insert');  
              $('#insert_form')[0].reset();  
         
   	   
   	  
   	  }); 
	  
  $(function(){
    var table = $('#example').DataTable( {
        responsive: true
    } );
 
   
  });
  </script>";
    }
	else{
		
		 echo "Insert Query execution failed.$flag";
	}
    echo $output;
}
?>
 
