<?php   
 session_start();  
  date_default_timezone_set('Asia/Karachi');
  include('checkSession.php');
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
       
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>PPS</title>

		<!-- Bootstrap Core CSS -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom CSS -->
		<link href="../css/sb-admin.css" rel="stylesheet">

		<!-- Morris Charts CSS -->
		<link href="../css/plugins/morris.css" rel="stylesheet">

		<!-- Custom Fonts -->
		<link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="../css/dataTables.bootstrap.min.css" />  
		<link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.css">
	    <link rel="stylesheet" href="../css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="../css/dataTables.bootstrap.min.css">
		<link rel="stylesheet" href="../css/fixedHeader.bootstrap.min.css">
		<link rel="stylesheet" href="../css/responsive.bootstrap.min.css">
		<link rel="stylesheet" href="../css/badge.css">
		
		<script src="../js/jquery.min.js"></script>    
		<script src="../js/jquery.dataTables.min.js"></script>  
		<script src="../js/dataTables.bootstrap.min.js"></script>            
		<script src="../js/dataTables.fixedHeader.min.js"></script> 
		<script src="../js/dataTables.responsive.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/responsive.bootstrap.min.js"></script>
		<script src="js/profile.js"></script>
		<script src="js/adminScript.js"></script>
		 
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="dashboard.php">Admin Panel</a>
            <?php
				   include("config.php");
										if(isset($_SESSION['username']))  {
										$query = "SELECT * FROM `employee` WHERE empId='".$_SESSION['id']."' ";
										
											   $result = mysqli_query($connect, $query);
										        $row2 = mysqli_fetch_array($result);
										} 


										?>
					
				<img class="img-circle pull-right" src="<?php echo $row2["image"]; ?>" width="35px" height="35px" style='  margin-top:8px;'/></div>

            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                  <li class="dropdown">
                   <a href="#" class="dropdown-toggle" data-toggle="dropdown">
				 
				   <?php
				   include("config.php");
										if(isset($_SESSION['username']))  {
				    $query = "SELECT * FROM `inbox` WHERE receiver='".$_SESSION['id']."' AND open='0' ";  
										
											  
											   $result = mysqli_query($connect, $query);
														
										       $count2 = mysqli_num_rows($result);
										
										}
										
										if($count2>0)
								   {
									 echo' <span class="badge badge-notify">';
									  echo $count2;
									  echo' </span>';  
														   
								   }
				  
								else{
									
									echo' <span>';
									  
									  echo' </span>';  
									
								}
									
				   ?>
				  
				<i class="fa fa-envelope"></i> <b class="caret"></b></a>
                  <ul class="dropdown-menu message-dropdown"> 
					
                       
                          
									<?php
                                    if(isset($_SESSION['username']))  {
				    $query = "SELECT * FROM `inbox` WHERE receiver='".$_SESSION['id']."' ORDER BY id DESC ";  
					$result = mysqli_query($connect, $query);
                     while($row= mysqli_fetch_array($result))
                     {
						$query2 = "SELECT * FROM `employee` WHERE empId='".$row["sender"]."'";  
						$result2 = mysqli_query($connect, $query2);
                     while($row2 = mysqli_fetch_array($result2))
                     {     
									
									?>
									<li class="message-preview">
									  <a href="#" onclick="return false;" id="<?php echo $row['id'];?> " class='msgAlert'>
                                <div class="media">
                                    <span class="pull-left">
									<img  src=" <?php echo $row2['image'];?> " width="40px" height="40px" />
                                    </span>
                                    <div class="media-body"><?php 
									if($row['open']=='0'){
									  echo' <span class="badge badge-notify pull-right">new';
									  echo' </span>';  
									}
									  ?>
                                        <h5 class="media-heading"><strong><?php echo $row2['empName'];?> </strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> <?php echo $row['date'].' at '.$row['time'];    ?>  </p>
                                       <?php  
								if(strlen($row['message']) >= 25){
						$message = substr($row['message'],0,25)."..";
					}else {
						$message = $row['message'];
					}?> <p> <?php echo$message?></p>
                                    </div>
                                </div>
                            </a>
                        </li>
					 <?php 
					 }
									}}
					 ?>
                       
                        <li class="message-footer">
                            <a href="inbox.php">Read All Messages</a>
                        </li>
                    </ul>
                </li>
				
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 
					<?php if(isset($_SESSION['username']))  
                {  
                 echo $_SESSION['name'];   
                 
                }  
                 ?><b class="caret"></b></a>  <ul class="dropdown-menu">
                        <li>
                            <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="inbox.php"><i class="fa fa-fw fa-arrow-down"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="outbox.php"><i class="fa fa-fw fa-arrow-up"></i> Outbox</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                           <a href="../logout.php"  ><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
		 
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li >
                        <a id="dash_board" href="#" onclick='return false;'><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
					<li >
                        <a href="staff.php"><i class="fa fa-fw fa-briefcase"></i> Staff</a>
                    </li>
                    
					  <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-envelope"></i> Messages<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                           
						   <li >
							<a href="inbox.php"><i class="fa fa-fw fa-arrow-down"></i> Inbox</a>
							</li>
                           
						  
                             <li>
							<a href="outbox.php"><i class="fa fa-fw fa-arrow-up"></i> Outbox</a>
							</li>
                          
                        </ul>
                    </li>
					
					 <li  class="active">
                        <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Profile <small>Edit Profile</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-user"></i> Profile Settings
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
<div class="container" >


  <div class="row">
   <form method="post" action="" class="form-horizontal" id="insert_form">
    <!-- left column -->
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="text-center">
	    <?php
		include("config.php");
   $query = "SELECT * FROM employee where empId= '".$_SESSION["id"]."'"; 
   $result = mysqli_query($connect, $query);
            
                      $row = mysqli_fetch_array($result);
                     {
                     ?>
                
                    
					 <img class="img-circle " src=" <?php echo $row['image'];?> " width="200px" height="200px"/></center></td>
                      
			   
			 
                  
				  <?php
                     }
                     ?>
        
		
        <h6>Upload a different photo...</h6>
		
        <input type="file" name="filename[]" id="select_image"   class="text-center center-block well well-sm" >
      </div>
	  
	  <br />  

    </div>
	
    <!-- edit form column -->
    <div class="col-md-6 col-sm-6 col-xs-12 personal-info">
      
	   <div class="row">
  
  <div class="col-xs-10">
   <div class='huge'> Profile Information </div>
	 </div> 
	 <div class="col-xs-2">
 <button id="button" data-toggle="modal" data-target="#pswd_data_Modal" class="btn  btn-success pull-right" href="#" type="button">Change Password <span class="glyphicon glyphicon-lock"></span></button>						

 </div>
	 
	 </div>
  
     

            <br>
               <div class="col-xs-8">
                  <label>Name<sup><span style = "color: red;  font-size: 10px;" class="glyphicon glyphicon-asterisk"></span></sup></label>
				  <input type="text" value="<?php echo $row["empName"]; ?>" name="empName" id="empName" placeholder="Enter Employee Name " class="form-control" required>
                </br>
               </div>
			    
					<div class="col-xs-5">
					 <label>CNIC<sup><span style = "color: red;  font-size: 10px;" class="glyphicon glyphicon-asterisk"></span></sup></label>
               <input type="text" value="<?php echo $row["cnic"]; ?>" name="cnic" id="cnic" placeholder="*****-******-*" class="form-control" required>
                 <input type="hidden" value="<?php echo $row["empId"]; ?>" name="empId" id="empId"  class="form-control" >
               
				</div>
				
			  <div class="col-xs-3">
                  <label>Gender<sup><span style = "color: red;  font-size: 10px;" class="glyphicon glyphicon-asterisk"></span></sup></label>
                  <select name="gender" id="gender" class="form-control">
				  <?php
				  if($row["gender"]=='Male'){
				  ?>
				  <option value="Male" selected>Male</option>
				  <option value="Female">Female</option>
				   <?php
				  }
				  else{
				  ?><option value="Male" >Male</option>
                     <option value="Female" selected>Female</option>
					  <?php
				  }
				  
				  ?>
                  </select>
                <br /></div>
                
				  <div class="col-xs-12">
                <label>Address<sup><span style = "color: red;  font-size: 10px;" class="glyphicon glyphicon-asterisk"></span></sup></label>
			   <textarea name="address"   id="address" class="form-control"placeholder="Enter Employee Address "  required><?php echo $row["address"]; ?> </textarea>
               <br /> </div> 
               <div class="col-xs-6">
               <label>Email<sup><span style = "color: red;  font-size: 10px;" class="glyphicon glyphicon-asterisk"></span></sup></label>
               <input type="text" value="<?php echo $row["email"]; ?>" name="email" id="email" class="form-control" required>
              </div> <div class="col-xs-6">
               <label>Contact No<sup><span style = "color: red;  font-size: 10px;" class="glyphicon glyphicon-asterisk"></span></sup></label>
                <div class="input-group">
				<span class="input-group-addon">03</span>
			   <input type="text" value="<?php echo $row["contactNo"]; ?>" name="contactNo" placeholder="XX-XXXXXXX"id="contactNo" class="form-control" required>
			   </div>
              <br /> </div> 
			
				
			  <div class="col-xs-12">
             <label>Languages<sup><span style = "color: red;  font-size: 10px;" class="glyphicon glyphicon-asterisk"></span></sup></label>
             
			    <br />
			  <?php
		  include("config.php");
		   $query = "SELECT * FROM language ";
		   $result = mysqli_query($connect, $query);
            
                     while($row = mysqli_fetch_array($result))
                     { 
						  $query2 = "SELECT * FROM employeelanguage where empId= '".$_SESSION["id"]."'"; 
		                $result2 = mysqli_query($connect, $query2);
					 
						 
                while($row2 = mysqli_fetch_array($result2))
                     {   
						 if($row2['languageId']==$row['languageId']){
						 echo '<input type="checkbox" class="Languages" name="Languages[]"  id="a'.$row2['languageId'].'" value="'.$row2['languageId'].'" checked>'.$row['languageName'];
						echo '&nbsp&nbsp ';
						$flag=false;
						break;
						}
						else  {
							$flag=true;
						 }
 
						}
						if($flag){
							echo '<input type="checkbox" class="Languages" name="Languages[]"  id="a'.$row['languageId'].'" value="'.$row['languageId'].'">'.$row['languageName'];
						 echo '&nbsp&nbsp ';
						}
						
						
						}
						 
					 
					 
					   ?></div> 
			 
			  
			   <br />
			   	 
               
        <div class="form-group">
          <label class="col-md-3 control-label"></label>
       <div class="col-md-1 pull-right">
             <br>  <input type="submit" name="insert" id="insert23" class="btn btn-primary " value="Update" >
            
          </div>
        </div>
     
    </div>
	 </form>
  </div>
</div>

                 <!-- /.row -->


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
   

  

    <!-- Morris Charts JavaScript -->
    
</body>

</html>
<div id="pswd_data_Modal" class="modal fade">
   <div class="modal-dialog" >
      <div class="modal-content">
         <div class="modal-header" style=" background-color: #2EAB04;color:white;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
           <center> <h4><span class="glyphicon glyphicon-lock"></span> Change Password</h4></center>
         </div> <div class="modal-body" style="padding:40px 50px;">
           
		   <form id="pswd_form" method="post"  role="form">
             <label for="old">Old Password</label>
			<div id='err1'class="form-group input-group">
			 <span class="input-group-addon"><i  class="fa fa-eye"></i></span>
             
              <input type="password" class="form-control" name="old" id="old" placeholder="Enter Old Password" required>
            </div>
			      <label for="new"> New Password</label>
            <div id='err'class="form-group input-group">
			 <span class="input-group-addon"><i  class="fa fa-eye"></i></span>
        
              <input type="password" class="form-control" name="new" id="new" placeholder="Enter New Password" required>
            </div>
            <input type="submit" id="insert11" class="btn btn-success btn-block" value="Update">
             
          </form>
		  </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>

 
<div id="messageDetails" class="modal fade">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header" style=" background-color: #fbc02d ;color:white;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
           <center> <h4 class="modal-title"><span class="glyphicon glyphicon-envelope"></span>&nbsp&nbspMessage Details</h4> </center>
         </div>
         <div class="modal-body" id="message_detail">
		 
 
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div>
      </div>
   </div>
</div>