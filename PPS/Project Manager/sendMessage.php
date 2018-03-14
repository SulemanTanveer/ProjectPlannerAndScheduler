

<?php
  
include("config.php");
   include("time.php");
 session_start();  
 date_default_timezone_set('Asia/Karachi');
 
 if(isset($_SESSION['username']))  {
	 
	 $output = '';
	 $receiver ='';
	$sender=$_SESSION['id'];
    $receiver = mysqli_real_escape_string($connect, $_POST["receiver"]); 
	$receiver=stripslashes($receiver);	
    $subject = mysqli_real_escape_string($connect, $_POST["subject"]);
	$subject=stripslashes($subject);
    $message = mysqli_real_escape_string($connect, $_POST["message"]);
	$message=stripslashes($message);
	 $check = mysqli_real_escape_string($connect, $_POST["outcheck"]);
	 $check=stripslashes($check);
	$date=date("Y/m/d");
	$time=date("h:i:sa");
	 $open ='0';
	  $query2 = "SELECT * FROM `employee` WHERE email='".$receiver."'";    
     $result2 = mysqli_query($connect, $query2);
	   
	   while($row2 = mysqli_fetch_array($result2))
     {
		 $receiverId=$row2["empId"];
	 }
	 
	 
	 
 if(!empty($_POST))
{
				$new_name='';  
                $sourcePath='';  
                $targetPath='';  
		
  if (array_sum($_FILES['filename']['error']) > 0) {
    // There was an error 


	   $query = " INSERT INTO inbox(sender,receiver,subject,message,date,time,open,filepath)  
     VALUES ('$sender', '$receiverId','$subject','$message','$date', '$time', '$open', '0')";    
    
	  $query21 = " INSERT INTO outbox(sender,receiver,subject,message,date,time,filepath)  
     VALUES ('$sender', '$receiverId','$subject','$message','$date', '$time',  '0')";    
     $result = mysqli_query($connect, $query);
	  $result21 = mysqli_query($connect, $query21);
   }
   else{  
      foreach($_FILES['filename']['name'] as $name => $value)  
      {  
           
		   
		   $file_name = explode(".", $_FILES['filename']['name'][$name]);  
           
               $new=$value;
                $new_name = rand() . '.'. $file_name[1];  
                $sourcePath = $_FILES["filename"]["tmp_name"][$name];  
                $targetPath = "../files/messagefiles/".$new_name;  
			
                move_uploaded_file($sourcePath, $targetPath);  
				 
				
            
      }  
    $query = " INSERT INTO inbox(sender,receiver,subject,message,date,time,open,filepath,fileName)  
     VALUES ('$sender', '$receiverId','$subject','$message','$date', '$time', '$open', '$targetPath', '$new')";    
	  $query21 = " INSERT INTO outbox(sender,receiver,subject,message,date,time,filepath,fileName)  
     VALUES ('$sender', '$receiverId','$subject','$message','$date', '$time','$targetPath', '$new')"; 
     $result = mysqli_query($connect, $query);
	  $result21 = mysqli_query($connect, $query21);
 }
    
 
	

 
 if($result21 &&  $check=='in'){

                                              
		$output = '';								
				 $output .= '<div class="col-lg-12">
                         
						    <div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h3 class="panel-title"></i>Inbox</h3>
                            </div>
                            <div class="panel-body">';						
      $query = "SELECT * FROM `inbox` WHERE receiver='".$_SESSION['id']."'";      
     $result = mysqli_query($connect, $query);
     $output .= '<form>               
					  <div class="row">
						<div class="col-lg-12">
							 <div class="form-group pull-right">
						   <button type="button" name="age" id="bbb" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-success"><i class="glyphicon glyphicon-envelope"></i> New Message</button>
						</div> </div> </div>
                     </form><center><div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-check"></i>  <strong> Message Has Been Sent Successfully</strong> 
							</div>
                    </div>
                </div><center>
      <div id="employee_table">	
	<table id="example5" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
               <thead>      <tr> <th>#</th>
			
                     <th>To</th>
					  <th>Email</th> 
					 <th>Subject</th>
					 
                     <th>Sent</th>
					  <th><center>Status</center></th>
                      <th>Attachments</th>
                       <th><center>Actions</center></th>
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
						   <td>' . $row["date"] ."<br>".$time.'</td><td><center>'; 
							 
						  
							 if($row["open"]=='1')
					 {
					$output .=  '<p class="'.$row["id"].'" style="background-color: #00D211; color:white">Seen</p>'; 
					 }
					 else  {
						 $output .=  '<p  class="'.$row["id"].'" style="background-color: #FE0000; color:white">Unseen</p>'; 
					 }
							
							
					$output .= 		' </center></td><td><a href="#" id="' . $val2 . '" class="check3" onclick="return false;">' . $filename. '</a></td>
                     
					 <td>
					 
					 <button type="button" name="view" value="view" id="' . $row["id"] . '" class="btn btn-warning btn-xs view_data" ><i  class="fa fa-search-plus"></i> View</button>  
                      <button type="button" name="reply" value="reply" id="' . $row["id"] . '" class="btn btn-info btn-xs reply_data" > <i class="fa fa-reply"></i> Reply</button>
                      <button type="button" name="delete" value="delete" id="' . $row["id"] . '" class="btn btn-danger btn-xs delete_data" ><i class="fa fa-trash-o"></i> Delete</button>
					  </td>
			 
				   </tr>
	   
      ';
					 } }
     $output .= '</tbody></table></div>';
	  echo "<script>
  $(function(){
    var table = $('#example5').DataTable( {
        responsive: true
    } );
 
    
  });
  $('#bbb').on('click', function(e){  
   $('#go').val('Send'); 
   $('#go2').val('Send');    
             $('#message_form')[0].reset();
			  $('#message_form2')[0].reset();
         });
    
  </script>";
}

else  if($result21 && $check=='out'){

                                              
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
						   <button type="button" name="age" id="bbb" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-success"><i class="glyphicon glyphicon-envelope"></i> New Message</button>
						</div> </div> </div>
                     </form><center><div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-check"></i>  <strong> Message Has Been Sent Successfully</strong> 
							</div>
                    </div>
                </div><center>
      <div id="employee_table">	
	<table id="example5" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>      <tr>  
			
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
                          
                 		  <td> <img src="' .$row2['image'] .'" width="40px" height="40px" style=" border-radius: 50%;" " />' . $row2["empName"] . '</td>  
						   <td>' . $row2["email"] . '</td>  
							<td>' . $row["subject"] . '</td>  						   
						   <td>' . $row["date"] ."<br>".$time.'</td> 
							 <td><a href="#" id="' . $val2. '" class="check3">'.$filename.'</a></td>
						
                      <td><button type="button" name="view" value="view" id="' . $row["id"] . '" class="btn btn-warning btn-xs view_data" ><i  class="fa fa-search-plus"></i> View</button> 
                     <button type="button" name="delete" value="delete" id="' . $row["id"] . '" class="btn btn-danger btn-xs delete_data" ><i class="fa fa-trash-o"></i> Delete</button></td>
                  
				   </tr>
	   
      ';
					 } }
     $output .= '</tbody></table></div>';
	  echo "<script>
  $(function(){
    var table = $('#example5').DataTable( {
        responsive: true
    } );
 
    
  });
  $('#bbb').on('click', function(e){  
   $('#go').val('Send'); 
   $('#go2').val('Send');    
             $('#message_form')[0].reset();
			  $('#message_form2')[0].reset();
         });
    
  </script>";
}


	else{
		
		 echo "Server Down";
	}
	
	
 }}
    echo $output;

?>
 
