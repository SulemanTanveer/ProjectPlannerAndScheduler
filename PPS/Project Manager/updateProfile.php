<?php
 
 include("config.php");
session_start();  
 
if(!$connect){
	echo "connection failed";
	
}

$flag=False;
$emailFlag=false;
$cnicFlag=false;
$flagi=true;
if(!empty($_POST))
{
	
	$emailFlag=false;
		$flagi=true;
    $empName = mysqli_real_escape_string($connect, $_POST["empName"]);  
	$empName =stripslashes( $empName);
    $cnic = mysqli_real_escape_string($connect, $_POST["cnic"]);
	$cnic=stripslashes( $cnic);
    
    $email = mysqli_real_escape_string($connect, $_POST["email"]);
	$email=stripslashes( $email);
    $contactNo = mysqli_real_escape_string($connect, $_POST["contactNo"]);
    $contactNo=stripslashes( $contactNo);
    $address = mysqli_real_escape_string($connect, $_POST["address"]); 
	$address=stripslashes( $address);	
    $gender = mysqli_real_escape_string($connect, $_POST["gender"]);  
     $gender=stripslashes( $gender);
   	$query222 = "SELECT* from employee  WHERE email='$email' and empId != '".$_SESSION['id']."'";  
	$result222=mysqli_query($connect, $query222);
	if(mysqli_num_rows($result222)>0){
		$emailFlag=true;
		$flagi=false;
	}
	   	$query22 = "SELECT* from employee  WHERE cnic='$cnic' and empId != '".$_SESSION['id']."'";  
	$result22=mysqli_query($connect, $query22);
	if(mysqli_num_rows($result22)>0){
		$cnicFlag=true;
		$flagi=false;
	}
	 if($flagi){
	
	            $new_name='';  
                $sourcePath='';  
                $targetPath='';  
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
           {  
                $new_name = rand() . '.'. $file_name[1];  
                $sourcePath = $_FILES["filename"]["tmp_name"][$name];  
                $targetPath = "../files/taskfiles/".$new_name;  
			
                move_uploaded_file($sourcePath, $targetPath);  
				
           }  
      }  
    
 }
}
	
   
	

		 if (array_sum($_FILES['filename']['error']) > 0) {
	 $query0 = "
    UPDATE employee SET
	empName='$empName',
	cnic='$cnic',
	 
	email='$email', 
	contactNo='$contactNo', 
	address ='$address',
	gender ='$gender'
	  WHERE empId='".$_SESSION['id']."'";  
	   mysqli_query($connect, $query0);
	  $id=$_SESSION['id'];
	  if(isset($_POST["Languages"])){
		  	$query2 = "DELETE FROM employeelanguage WHERE empId = '".$_SESSION['id']."'";  
			mysqli_query($connect, $query2);
		    $languages=$_POST["Languages"];
			 
				   foreach($languages as $language)
				  {
				 $query2 = "INSERT INTO employeelanguage(empId,languageId)  VALUES ('$id', '$language')";
				
				 mysqli_query($connect, $query2);  
				
				  }
			 }
	  $flag=true;
	  echo 'true';
	  
	  }
else{
	$query2 = "
    UPDATE employee SET
	empName='$empName',
	cnic='$cnic',
	 
	email='$email', 
	contactNo='$contactNo', 

	address ='$address',
	gender ='$gender', 
 
	 image='$targetPath'
	 WHERE empId='".$_SESSION['id']."'";  
	 mysqli_query($connect, $query2);
	 
	  $id=$_SESSION['id'];
	if(isset($_POST["Languages"])){
		$query2 = "DELETE FROM employeelanguage WHERE empId = '".$_SESSION['id']."'";  
			mysqli_query($connect, $query2);
		     $languages=$_POST["Languages"];
			 
				  foreach($languages as $language)
				  {
				 $query2 = "INSERT INTO employeelanguage(empId,languageId)  VALUES ('$id', '$language')";
				
				 mysqli_query($connect, $query2);  
				
				  }
			 }
	  $flag=true;  
	  echo 'true';
	 }
	 
	}
         
	else if($emailFlag&&$cnicFlag){
		
		 echo 'false1';
	}
	else if($emailFlag){
		
		 echo 'false2';
	}
     else if($cnicFlag){
		
		 echo 'false3';
	}
 

  
  
}

  
?>
 
