

<?php
include("config.php");
session_start();
date_default_timezone_set('Asia/Karachi');
if(!$connect){
	echo "connection failed";
	
}
 $insertResult=false;
$my_flag=false;
	 $cehckFlag=false;
	  $my_cnic_flag=false;
	  $adminFlag=false;
	$output = '';
    $empName = mysqli_real_escape_string($connect, $_POST["empName"]);  
	$empName =stripslashes( $empName);
    $cnic = mysqli_real_escape_string($connect, $_POST["cnic"]);
	$cnic=stripslashes( $cnic);
    $dob = mysqli_real_escape_string($connect, $_POST["dob"]);
	$dob=stripslashes( $dob);
    $email = mysqli_real_escape_string($connect, $_POST["email"]);
	$email=stripslashes( $email);
    $contactNo = mysqli_real_escape_string($connect, $_POST["contactNo"]);
	$contactNo=stripslashes( $contactNo);
    $salary = mysqli_real_escape_string($connect, $_POST["salary"]);
	$salary=stripslashes( $salary);
    $workStatus = mysqli_real_escape_string($connect, $_POST["workStatus"]);
	$workStatus=stripslashes( $workStatus);	
    $address = mysqli_real_escape_string($connect, $_POST["address"]); 
	$address=stripslashes( $address);	
    $gender = mysqli_real_escape_string($connect, $_POST["gender"]);  
	$gender=stripslashes( $gender);
    $position = mysqli_real_escape_string($connect, $_POST["position"]);  
    $position=stripslashes( $position);
	$date = date("Y-m-d");
	$time = date("h:i:sa");
	     $new_name='';  
                $sourcePath='';  
                $targetPath='';  
	          
 if (array_sum($_FILES['images']['error']) > 0) {
	 
 }
else{
    
	          
   if(is_array($_FILES))  
 {  
      foreach($_FILES['images']['name'] as $name => $value)  
      {  
           
		   
		   $file_name = explode(".", $_FILES['images']['name'][$name]);  
           $allowed_extension = array("jpg", "jpeg", "png","txt","pdf","docx", "gif");  
           if(in_array($file_name[1], $allowed_extension))  
           {  
                $new_name = rand() . '.'. $file_name[1];  
                $sourcePath = $_FILES["images"]["tmp_name"][$name];  
                $targetPath = "../images/".$new_name;  
			
                move_uploaded_file($sourcePath, $targetPath);  
				
           }  
      }  
    
 }
}
 
 
 
	if($_POST["employee_id"]!='') {
		
		
	 $jobStatus = mysqli_real_escape_string($connect, $_POST["jobStatus"]);
	 
	 if($workStatus=='In-Active'){
		 
	 $query2 = "SELECT* from taskassignment  WHERE  empId = '".$_POST["employee_id"]."' ";  
 $result2=mysqli_query($connect, $query2);
 if(mysqli_num_rows($result2)>0){
 While($row=mysqli_fetch_array( $result2)){
	  $cehckFlag=true;
	  $query23 = "SELECT* from subtask  WHERE  empId = '".$_POST["employee_id"]."' and taskId='".$row["taskId"]."'";  
 $result23=mysqli_query($connect, $query23);
if(mysqli_num_rows($result23)>0){
	 
	 $cehckFlag=true;
	 
	 
 }
 
 }
	 
 }
	 
	}
	
	$query22 = "SELECT* from employee  WHERE  cnic = '$cnic' AND empId!='".$_POST["employee_id"]."'";  
 $result22=mysqli_query($connect, $query22);
	if(mysqli_num_rows($result22)>0){
		 
		$my_cnic_flag=true;
	}
		$query22 = "SELECT* from employee  WHERE  email = '$email' AND empId!='".$_POST["employee_id"]."'";  
 $result22=mysqli_query($connect, $query22);
	if(mysqli_num_rows($result22)>0){
	 
		$my_flag=true;
	}
	if($position=='Administrator'){
	$query22 = "SELECT* from employee  WHERE  position = 'Administrator' AND empId!='".$_POST["employee_id"]."'";  
 $result22=mysqli_query($connect, $query22);
	if(mysqli_num_rows($result22)>0){
	 
		$adminFlag=true;
	}
	}
	 if($cehckFlag==false && $adminFlag==false && $my_flag==false && $my_cnic_flag==false){
		  $insertResult=true;
		  
	 if (array_sum($_FILES['images']['error']) > 0) {
		 
	$query = "
    UPDATE employee SET
	empName='$empName',
	cnic='$cnic',
	dob='$dob', 
	email='$email', 
	contactNo='$contactNo', 
	salary='$salary',
	 jobStatus='$jobStatus',
	 workStatus='$workStatus',
	address ='$address',
	gender ='$gender', 
	 position='$position'
	 WHERE empId='".$_POST["employee_id"]."'";  
	 
           $message = 'Data Updated';  
	 $id=$_POST["employee_id"];

	 }
else{
	 
	$query = "
    UPDATE employee SET
	empName='$empName',
	cnic='$cnic',
	dob='$dob', 
	email='$email', 
	contactNo='$contactNo', 
	salary='$salary',
	 jobStatus='$jobStatus',
	 workStatus='$workStatus',
	address ='$address',
	gender ='$gender', 
	image ='$targetPath', 
	 position='$position'
	 WHERE empId='".$_POST["employee_id"]."'";  
           $message = 'Data Updated';  
	 $id=$_POST["employee_id"];
	}
	 
	  mysqli_query($connect, $query);  
	  
	  
	 $query33="DELETE FROM employeeroles WHERE empId='".$_POST["employee_id"]."'";  
	  mysqli_query($connect, $query33);  
				     
	$rolls=$_POST["skills"];
		foreach($rolls as $roll)
				  {     $name1='aname'.$roll;
					  if(isset($_POST[$name1])){
						 
					 	 $name1= $_POST[$name1];
						 
						$query1 = "INSERT INTO employeeroles(empId,roleId,experience)  VALUES ('$id', '$roll','$name1')";
						 mysqli_query($connect, $query1);  
				     }
					 else{
						  
						$query1 = "INSERT INTO employeeroles(empId,roleId)  VALUES ('$id', '$roll')";
						 mysqli_query($connect, $query1); 
						 
					 }
				 
				
				  }
	
		$query28 = "DELETE FROM employeelanguage WHERE empId = '".$_POST["employee_id"]."'";  
	mysqli_query($connect, $query28);
	
	
	if(isset($_POST["Languages"])){
	
		
		    $languages=$_POST["Languages"];
			 
				  foreach($languages as $language)
				  {
				 $query2 = "INSERT INTO employeelanguage(empId,languageId)  VALUES ('$id', '$language')";
				
				 mysqli_query($connect, $query2);  
				
				  }
			 }
	
		$query222 = "SELECT* from employee  WHERE position='Project Manager'";
	
	$result222=mysqli_query($connect, $query222);
	 $id1 =$_SESSION['id'];
	while($row222=mysqli_fetch_array($result222)){
		$empId1=$row222['empId'];
		
		
	$query24 = "INSERT INTO notification (notificationType,notificationTypeId,notificationDetails,receiverId,time,date,senderId)  
     VALUES ('5','$id','$empName','$empId1','$time','$date','$id1')";	
		mysqli_query($connect, $query24);
		
	}
	
	 }
	 
	
}
	
else{
	
	 
   	$query222 = "SELECT* from employee  WHERE email='$email'";
	$result222=mysqli_query($connect, $query222);
	if(mysqli_num_rows($result222)==0){
		
		$query22 = "SELECT* from employee  WHERE cnic='$cnic'";
	$result22=mysqli_query($connect, $query22);
	if(mysqli_num_rows($result22)==0){
		$query22 = "SELECT* from employee  WHERE position='Administrator'";
	$result22=mysqli_query($connect, $query22);
	if(mysqli_num_rows($result22)==0){
	
	 function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
	
	$pswd=randomPassword();
	$password=md5($pswd);
	
	
	
	
	
	$jobStatus='Employee';
	$date = date("Y-m-d");
	$time = date("h:i:sa");
	$query = "
    INSERT INTO employee(empName,cnic,dob,email,contactNo,salary,jobStatus,workStatus,address, gender,position,image,password,regDate)  
     VALUES ('$empName', '$cnic', '$dob', '$email', '$contactNo', '$salary', '$jobStatus', '$workStatus', '$address', '$gender', 
	 '$position','$targetPath','$password','$date')

	 ";
	 mysqli_query($connect, $query);
	  $insertResult=true;
	 $query2 = "SELECT empId FROM employee ORDER BY empId DESC LIMIT 1";
	$result = mysqli_query($connect, $query2);
	 $row = mysqli_fetch_array($result);  
	 $id=$row['empId'];
	
	
	if($row['empId']!='')
	{
        $fileName=$row['empId'];
				$txt='';
					 $myfile = fopen('../files/empFiles/'.$fileName.'.txt', "w") or die("Unable to open file!");
			
				
					  
					  $start = date('Y-m-d',strtotime("-1 days"));
					 $end = date('Y-m-d', strtotime('+5 years'));



					$begin = new DateTime($start );
					$end = new DateTime($end );

					$daterange = new DatePeriod($begin, new DateInterval('P1D'), $end);

					foreach($daterange as $date1){
						
						if($date1->format('l')=='Sunday')
						{
							$txt.=  substr($date1->format('l'),0,3).' '.$date1->format("Y-m-d")."  0\n";
						}
						else{
							
							$txt.=  substr($date1->format('l'),0,3).' '.$date1->format("Y-m-d")."  8\n";
						}
					}
										
					 
					fwrite($myfile, $txt);
					
					fclose($myfile);
	}
	
	
	
	
	 
	 $rolls=$_POST["skills"];
		 foreach($rolls as $roll)
				  {     $name1='aname'.$roll;
					  if(isset($_POST[$name1])){
						 
					 $name1= $_POST[$name1];
						 
						$query1 = "INSERT INTO employeeroles(empId,roleId,experience)  VALUES ('$id', '$roll','$name1')";
						 mysqli_query($connect, $query1);  
				     }
					 else{
						  
						$query1 = "INSERT INTO employeeroles(empId,roleId)  VALUES ('$id', '$roll')";
						 mysqli_query($connect, $query1); 
						 
					 }
				 
				
				  }
	
	
	
	
	if(isset($_POST["Languages"])){
		 
		
		    $languages=$_POST["Languages"];
			 
				  foreach($languages as $language)
				  {
				 $query2 = "INSERT INTO employeelanguage(empId,languageId)  VALUES ('$id', '$language')";
				
				 mysqli_query($connect, $query2);  
				
				  }
			 }
	 
	 
	 
	 
	 
	 
	
	$query222 = "SELECT* from employee  WHERE position='Project Manager'";
	
	$result222=mysqli_query($connect, $query222);
	 $id1 =$_SESSION['id'];
	while($row222=mysqli_fetch_array($result222)){
		$empId1=$row222['empId'];
		
		
	$query24 = "INSERT INTO notification (notificationType,notificationTypeId,notificationDetails,receiverId,time,date,senderId)  
     VALUES ('4','$id','$empName','$empId1','$time','$date','$id1')";	
		mysqli_query($connect, $query24);
		
	}
	
	
	
	
	
require '../PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                            // Enable SMTP authentication
$mail->Username = 'pps.fyp@gmail.com';          // SMTP username
$mail->Password = '090078601'; 					// SMTP password
$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                 // TCP port to connect to

$mail->setFrom('pps.fyp@gmail.com', 'Project Planner & Scheduler');
$mail->addReplyTo('pps.fyp@gmail.com', 'Project Planner & Scheduler');
$mail->addAddress($email);   // Add a recipient


$mail->isHTML(true);  // Set email format to HTML

$bodyContent='';
$bodyContent = "Dear " . $empName . " <br>Your account has been sucessfully registered in Project Planner & Scheduler."."<br>". "Your password is: <b>" . $pswd ."</b><br>"."Thanks!";

$mail->Subject = 'Account Registered Successfully..!';
$mail->Body    = $bodyContent;

if(!$mail->send()) {
    echo '<script>alert("Mailer Error:".$mail->ErrorInfo;)</script>';
     
} else {
    echo '<script>alert("Mail has been sent to employees account sucessfully..!!")</script>';
	
}
	}else{
		 
		 //echo '<script>alert("This email address already exist in our record..!!<br>Please enter another email address")</script>';
		 $adminFlag=true;
	 }
	
	}
	 else{
		 
		 //echo '<script>alert("This email address already exist in our record..!!<br>Please enter another email address")</script>';
		 $my_cnic_flag=true;
	 }
	 
	
	} 
	 
	 else{
		 
		 //echo '<script>alert("This email address already exist in our record..!!<br>Please enter another email address")</script>';
		 $my_flag=true;
	 }
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
}
    
	if($my_flag){
		
		echo 'no';
	}
	else if($my_cnic_flag){
		
		echo 'no5';
		
	}
	else  if($cehckFlag)
	{
		echo 'no3';
		
	}
	else  if($adminFlag)
	{
		echo 'no4';
		
	}
	else if($insertResult)
    {
 
		
		if($_POST["employee_id"]!=''){
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
                     </form><center><div class="row"  id="fadeOut">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-check"></i>  <strong>Account Updated</strong> 
							</div>
                    </div>
                </div><center>';
		}
		else{
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
                     </form><center id="fadeOut"><div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-check"></i>  <strong>Account Created</strong> 
							</div>
                    </div>
                </div><center>';
			
		
		
		
		}
     $select_query = "SELECT * FROM employee";
     $result = mysqli_query($connect, $select_query);
     $output .= '
      <div id="employee_table">	
	<table id="example23" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>     <tr>  
                        <th>Id</th>
						 <th>Image</th>
                     <th>Name</th>
                     <th>Email</th>
                     <th>Role</th>
                     <th>Work Status</th>
                       <th><center>Actions</center></th>
					     
                    </tr>

     </thead>  <tbody>';
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
					 $output .= '</ul></td><td>';		
					 
					 
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
					  
					  
					  
						
					 $output .= '	</td><td>
						
						<button type="button" name="view" value="view" id="' . $row["empId"] . '" class="btn btn-warning btn-xs view_data" ><i  class="fa fa-search-plus"></i> View</button> 
						
                     	 <button type="button" name="edit" value="edit" id="'.$row["empId"] .'" class="btn btn-info btn-xs edit_data" ><i class="fa fa-pencil-square-o" ></i> Edit</button>
						 
						 <button type="button" name="delete" value="delete" id="' . $row["empId"] . '" class="btn btn-danger btn-xs delete_data" ><i class="fa fa-trash-o"></i> Delete</button></td>
						 </td>  
                        
                
				   </tr>
	   
      ';
     }
     $output .= '</tbody></table></div></div></div>';
	  echo "<script>
	
  $(function(){
    var table = $('#example23').DataTable( {
        responsive: true
    } );
 
   
  });
    ('#fadeOut').delay(3000).fadeOut('slow');
  </script>";
  echo " <script>
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
		    $('#insert').val('Insert');  
            $('#insert_form')[0].reset();  
			 </script>										
             
      ";
	  
    }
	else{
		
		 echo "Server Down";
	}
    echo $output;

?>

