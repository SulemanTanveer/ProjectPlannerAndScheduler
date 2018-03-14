

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
               $new = $value;  
                $new_name = rand() . '.'. $file_name[1];  
                $sourcePath = $_FILES["filename"]["tmp_name"][$name];  
                $targetPath = "../files/".$new_name;  
			    
                move_uploaded_file($sourcePath, $targetPath);  
				
            
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
    
      $teamId = mysqli_real_escape_string($connect, $_POST["teamId"]);
	  $teamId =stripslashes( $teamId);
   $projLanguage = mysqli_real_escape_string($connect, $_POST["projLanguage"]);
	  $projLanguage =stripslashes( $projLanguage);
       $description = mysqli_real_escape_string($connect, $_POST["description"]);
	   $description =stripslashes( $description);
$date = date("Y-m-d");
$regBy=$_SESSION['id'];
	if($_POST) {
	
	if($teamId=='Un Assign'){
		
	 
		$query = "
    INSERT INTO project(projName,deadline,regDate,languageId,startDate,InProgDate,projStatus,description,registeredBy)  
     VALUES ('$projName', '$deadline','$date','$projLanguage' ,'$startDate',$date, 'Pending','$description','$regBy')
	"; 
	$result8=mysqli_query($connect, $query);
}
	else{
	 
	 
		$query = "
    INSERT INTO project(projName,deadline,regDate,languageId ,startDate,projStatus,description,teamId,registeredBy )  
     VALUES ('$projName', '$deadline','$date','$projLanguage' , '$startDate', 'Not Started','$description','$teamId','$regBy')
	";
		
		$result8=mysqli_query($connect, $query);
	}
	
	$query3 = "SELECT* FROM project ORDER BY projId DESC LIMIT 1";
	$result3=mysqli_query($connect, $query3);
	$row=mysqli_fetch_array($result3);
	 $projIdVal=$row['projId'];
	
	
	$query5 = "
    UPDATE team SET
	teamStatus='Active' 
	 WHERE teamId='". $teamId."'";  
	mysqli_query($connect, $query5);
	
	 
///////////////////////////////////////
//////////////notification send////////
///////////////////////////////////////
$id1 =$_SESSION['id'];
		$date = date("Y-m-d");
	$time = date("h:i:sa");
	$query222 = "SELECT* from teammember  WHERE teamId='$teamId'";
	$result222=mysqli_query($connect, $query222);
	 while($row222=mysqli_fetch_array($result222)){
		 
		 $empId1=$row222['empId'];
		 
		 $query24 = "INSERT INTO notification (notificationType,notificationTypeId,notificationDetails,receiverId,time,date,senderId)  
     VALUES ('6','$projIdVal','$projName','$empId1','$time','$date','$id1')";	
		mysqli_query($connect, $query24);
		 
		 
	}
	
 
			
 
		
	
	 
	 
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
                     </form><center><div class="row" id="fadeOut">
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

	  <table id="example1" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"><thead>     <tr>  
                          <th ><center>Id</center></th>
                     <th><center>Name</center></th>
					 <th><center>Status</center></th>
                      <th><center>Start Date</center></th>
                     <th><center>Deadline</center></th>
					 <th><center>Language</center></th>
					    <th><center>Tasks</center></th>
					<th><center>Actions</center></th>  
                    </tr>

     </thead>  <tbody> ';
    while($row = mysqli_fetch_array($result))
      {
		 
		  $query4 = "SELECT * FROM language where languageId= ".$row['languageId']."";
		             $result4 = mysqli_query($connect, $query4);
					 $row4 = mysqli_fetch_array($result4);
					 
		 
		 
		 
		 
		 
      $output .= '
        <tr>  
                         <td>' . $row["projId"] . '</td> 
                 		  <td>' . $row["projName"] . '</td>'; 

						  
						  
$output .= ' <td><center>';		
					 
					 
					 if($row["projStatus"]=='Completed')
					 {
					 $output .= '<p  style="background-color: #00D211; color:white">'.$row["projStatus"].'</p>'; 
					 }
					 else  if($row["projStatus"]=='In-Progress'){
						  $output .= '<p  style="background-color: #FDC305; color:white">'.$row["projStatus"].'</p>'; 
					 }
					 else  if($row["projStatus"]=='Not Started'){
					  $output .= '<p  style="background-color: #FE0000; color:white">'.$row["projStatus"].'</p>'; 
					}
					 else  if($row["projStatus"]=='Pending'){
					  $output .= '<p  style="background-color: #428bca; color:white">'.$row["projStatus"].'</p>'; 
					}
					  
					  
						
					 $output .= '</center></td> ';




						   
						 $output .= '  <td>' . $row["startDate"] . '</td>  <td>' . $row["deadline"] . '</td>  
							';  
							
							 $output .= '    <td>' .$row4["languageName"]. '</td>'; 
							
							
							
							 $output .= '<td><center>
						<form method="GET" action="task.php">
					   <input type="hidden" name="projId" id="curDate" value="' . $row["projId"] . '">  
                
				      <button type="submit"  class="btn btn-primary btn-xs"  ><i  class="fa fa-pencil"></i> Tasks</button>
					   
                       </form>
                 </center></td>';
				 
				 
					 $output .= '<td><center><button type="button" name="file" value="files" id="' . $row["projId"] . '" class="btn btn-success btn-xs file_data" ><i  class="fa fa-paperclip"></i> Files</button>
						
						<button type="button" name="view" value="view" id="' . $row["projId"] . '" class="btn btn-warning btn-xs view_data" ><i  class="fa fa-search-plus"></i> View</button> 
                     	
						';
				 
							
					 $output .= '	<button type="button" name="edit" value="edit" id="'.$row["projId"] .'" class="btn btn-info btn-xs edit_data" ><i class="fa fa-pencil-square-o" ></i> Edit</button>   
						';
					 
						
						
						
					
						
					     $output .= '	
						<button type="button" name="delete" value="delete" id="' . $row["projId"] . '" class="btn btn-danger btn-xs delete_data" ><i class="fa fa-trash-o"></i> Delete</button></td>  
                        ';
						
                    
                
				    $output .= '	</center> </tr>
	
      ';
     }
     $output .= '   </tbody></table></div>';
	  echo "<script> 
	  
	  $('#fadeOut').delay(3000).fadeOut('slow');
	  
	  	$('#add').click(function(){  
              $('#insert').val('Insert');  
              $('#insert_form')[0].reset();  
         
   	   
   	  
   	  }); 
	  
  $(function(){
    var table = $('#example1').DataTable( {
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
 
