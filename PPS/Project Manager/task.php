<?php  
 
 session_start(); 
include('checkSession.php'); 
 date_default_timezone_set('Asia/Karachi');
   include("config.php");
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
	 <script src="js/projManagerScript.js"></script>				
		 
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
                <a class="navbar-brand" href="dashboard.php">Project Manager Panel</a>
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
                            <a href="inbox.php" onclick='return false;' >Read All Messages</a>
                        </li>
                    </ul>
                </li>
				   <li class="dropdown">
                    <a href="#"  id="checkBadge" class="dropdown-toggle" data-toggle="dropdown">
					
							
<?php							

				   
								
							$query = "SELECT * FROM `notification` WHERE seen='0' AND receiverId='".$_SESSION['id']."'";  
												
													  
								   $result = mysqli_query($connect, $query);
									$count=0;		
								   while($row = mysqli_fetch_array($result)){
										   
								$count++;	   
							 
									   
								   }


								$query = "SELECT * FROM `task` WHERE deadlineFlag='0' ";  
												
													  
								   $result = mysqli_query($connect, $query);
											
								   while($row = mysqli_fetch_array($result)){
										   
										
									   $timestamp = $row['deadline'];
									   
									   $today = new DateTime(); // This object represents current date/time
							$today->setTime( 0, 0, 0 ); // reset time part, to prevent partial comparison

							$match_date = DateTime::createFromFormat( "Y-m-d", $timestamp );
							$match_date->setTime( 0, 0, 0 ); // reset time part, to prevent partial comparison

							$diff = $today->diff( $match_date );
							$diffDays = (integer)$diff->format( "%R%a" ); // Extract days count in interval

							if( $diffDays ==+1) {
								
								$count++;	   
							}
							 
									   
								   }

								   
							$query5 = "SELECT * FROM `subtask` WHERE deadlineFlag='0' ";  
									
										  
							   $result5 = mysqli_query($connect, $query5);
								 	
							   while($row = mysqli_fetch_array($result5)){
							   
							
						   $timestamp = $row['deadline'];
									   
									   $today = new DateTime(); // This object represents current date/time
							$today->setTime( 0, 0, 0 ); // reset time part, to prevent partial comparison

							$match_date = DateTime::createFromFormat( "Y-m-d", $timestamp );
							$match_date->setTime( 0, 0, 0 ); // reset time part, to prevent partial comparison

							$diff = $today->diff( $match_date );
							$diffDays = (integer)$diff->format( "%R%a" ); // Extract days count in interval

							if( $diffDays ==+1) {
								
								$count++;	   
							}
							 
									   
								   }
								   
								   
								 $query = "SELECT * FROM `project`   WHERE deadlineFlag='0' ";  
												
													  
								   $result = mysqli_query($connect, $query);
											
								   while($row = mysqli_fetch_array($result)){
										   
										
									   $timestamp = $row['deadline'];
									   
									   $today = new DateTime(); // This object represents current date/time
							$today->setTime( 0, 0, 0 ); // reset time part, to prevent partial comparison

							$match_date = DateTime::createFromFormat( "Y-m-d", $timestamp );
							$match_date->setTime( 0, 0, 0 ); // reset time part, to prevent partial comparison

							$diff = $today->diff( $match_date );
							$diffDays = (integer)$diff->format( "%R%a" ); // Extract days count in interval

							if( $diffDays ==+1) {
								
								$count++;	
								
								   }}   
								   
								   
							if($count>0)
								   {
									 echo' <span id="checkBadge2"  class="badge badge-notify">';
									  echo $count;
									  echo' </span>';  
														   
								   }
				  
								else{
									
									echo' <span>';
									  
									  echo' </span>';  
									
								}


				   ?>	
 	<script src="js/projManagerScript.js"></script>
					<i class="fa fa-bell"></i> 
					<b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                   
					<?php  
							$query = "SELECT * FROM `notification`  WHERE   receiverId='".$_SESSION['id']."' ORDER BY `notificationId` DESC  Limit 2 ";  
												
													  
						   $result = mysqli_query($connect, $query);
									
						   while($row = mysqli_fetch_array($result)){
								$Id1= $row['notificationTypeId'];
								$Id2= $row['notificationId'];
						        $Id= $Id1.'-'.$Id2;
						  if($row['notificationType']=='1'){
							 
									
							  
								
						echo"<li>
                            <a onclick='return false;' href='#' id='".$Id."' class='project_file_data'>"."<h5 class='media-heading'> <strong style='color:green;'>".$row['notificationDetails']."</strong></h5>";
							
							if($row['seen']=='0'){
									  echo' <span class="badge badge-notify pull-right">new';
									  echo' </span>';  
									}
							
							echo"<p class='small text-muted'><i class='fa fa-clock-o'></i> ".$row['date'].' at '.$row['time']." </p><span class='label label-success'>"."Project File Uplaoded</span> 
							
							</a>
                        </li><li class='divider'></li>";
							}
							 
							 
							 
							if($row['notificationType']=='2'){
							 
									
							  
								
						echo"<li>
                            <a onclick='return false;' href='#' id='".$Id."' class='task_file_data'>"."<h5 class='media-heading'> <strong style='color:#5bc0de	;'>".$row['notificationDetails']."</strong></h5>";
							
							if($row['seen']=='0'){
									  echo' <span class="badge badge-notify pull-right">new';
									  echo' </span>';  
									}
							
							echo"<p class='small text-muted'><i class='fa fa-clock-o'></i> ".$row['date'].' at '.$row['time']." </p><span class='label label-info'>"."Task File Uplaoded</span> 
							
							</a>
                        </li><li class='divider'></li>";
							} 
							 
							 
							if($row['notificationType']=='3'){
							 
									
							  
								
						echo"<li>
                            <a onclick='return false;' href='#' id='".$Id."' class='subtask_file_data'>"."<h5 class='media-heading'> <strong style='color:grey;'>".$row['notificationDetails']."</strong></h5>";
							
							if($row['seen']=='0'){
									  echo' <span class="badge badge-notify pull-right">new';
									  echo' </span>';  
									}
							
							echo"<p class='small text-muted'><i class='fa fa-clock-o'></i> ".$row['date'].' at '.$row['time']." </p><span class='label label-default'>"."Subtask File Uplaoded</span> 
							
							</a>
                        </li><li class='divider'></li>";
							}  
							 
							 if($row['notificationType']=='4'){
							 
									
							  
								
						echo"<li>
                            <a onclick='return false;' href='#' id='".$Id."' class='accnt_noti'>"."<h5 class='media-heading'> <strong style='color:green;'>".$row['notificationDetails']."</strong></h5>";
							
							if($row['seen']=='0'){
									  echo' <span class="badge badge-notify pull-right">new';
									  echo' </span>';  
									}
							
							echo"<p class='small text-muted'><i class='fa fa-clock-o'></i> ".$row['date'].' at '.$row['time']." </p><span class='label label-success'>"."New Account Created</span> 
							
							</a>
                        </li><li class='divider'></li>";
							}  
							 
							 
							  if($row['notificationType']=='5'){
							 
									
							  
								
						echo"<li>
                            <a onclick='return false;' href='#' id='".$Id."' class='accnt_noti'>"."<h5 class='media-heading'> <strong style='color:#d9534f;'>".$row['notificationDetails']."</strong></h5>";
							
							if($row['seen']=='0'){
									  echo' <span class="badge badge-notify pull-right">new';
									  echo' </span>';  
									}
							
							echo"<p class='small text-muted'><i class='fa fa-clock-o'></i> ".$row['date'].' at '.$row['time']." </p><span class='label label-danger'>"."Account Updated</span> 
							
							</a>
                        </li><li class='divider'></li>";
							} 
						  

							  if($row['notificationType']=='12'){
							 
									
							  
								
						echo"<li>
                            <a onclick='return false;' href='#' id='".$Id."' class='task_Noti'>"."<h5 class='media-heading'> <strong style='color:green;'>".$row['notificationDetails']."</strong></h5>";
							
							if($row['seen']=='0'){
									  echo' <span class="badge badge-notify pull-right">new';
									  echo' </span>';  
									}
							
							echo"<p class='small text-muted'><i class='fa fa-clock-o'></i> ".$row['date'].' at '.$row['time']." </p><span class='label label-success'>"."Task Completed</span> 
							
							</a>
                        </li><li class='divider'></li>";
							} 
						  

				if($row['notificationType']=='14'){
							 
									
							  
								
						echo"<li>
                            <a onclick='return false;' href='#' id='".$Id."' class='subtask_Noti'>"."<h5 class='media-heading'> <strong style='color:green;'>".$row['notificationDetails']."</strong></h5>";
							
							if($row['seen']=='0'){
									  echo' <span class="badge badge-notify pull-right">new';
									  echo' </span>';  
									}
							
							echo"<p class='small text-muted'><i class='fa fa-clock-o'></i> ".$row['date'].' at '.$row['time']." </p><span class='label label-success'>"."Subtask Completed</span> 
							
							</a>
                        </li><li class='divider'></li>";
							} 
						  

				if($row['notificationType']=='13'){
							 
									
							  
								
						echo"<li>
                            <a onclick='return false;' href='#' id='".$Id."' class='task_Noti'>"."<h5 class='media-heading'> <strong style='color:blue;'>".$row['notificationDetails']."</strong></h5>";
							
							if($row['seen']=='0'){
									  echo' <span class="badge badge-notify pull-right">new';
									  echo' </span>';  
									}
							
							echo"<p class='small text-muted'><i class='fa fa-clock-o'></i> ".$row['date'].' at '.$row['time']." </p><span class='label label-primary'>"."Task Started</span> 
							
							</a>
                        </li><li class='divider'></li>";
							} 
						  

					if($row['notificationType']=='15'){
							 
									
							  
								
						echo"<li>
                            <a onclick='return false;' href='#' id='".$Id."' class='subtask_Noti'>"."<h5 class='media-heading'> <strong style='color:blue;'>".$row['notificationDetails']."</strong></h5>";
							
							if($row['seen']=='0'){
									  echo' <span class="badge badge-notify pull-right">new';
									  echo' </span>';  
									}
							
							echo"<p class='small text-muted'><i class='fa fa-clock-o'></i> ".$row['date'].' at '.$row['time']." </p><span class='label label-primary'>"."Subtask Started</span> 
							
							</a>
                        </li><li class='divider'></li>";
							} 



						  }	   
								   
							 
							 
							 
							 ?>

					<?php  
							$query = "SELECT * FROM `project`  ";  
												
													  
						   $result = mysqli_query($connect, $query);
									
						   while($row = mysqli_fetch_array($result)){
								   
								
						   $timestamp = $row['deadline'];
									   
									   $today = new DateTime(); // This object represents current date/time
							$today->setTime( 0, 0, 0 ); // reset time part, to prevent partial comparison

							$match_date = DateTime::createFromFormat( "Y-m-d", $timestamp );
							$match_date->setTime( 0, 0, 0 ); // reset time part, to prevent partial comparison

							$diff = $today->diff( $match_date );
							$diffDays = (integer)$diff->format( "%R%a" ); // Extract days count in interval

							if( $diffDays ==+1) {
								
								$Id= $row['projId'];
						echo"<li>
                            <a onclick='return false;' href='#' id='".$row['projId']."' class='projAlert'>"."<h5 class='media-heading'><strong>".$row['projName']."</strong></h5>".
							"<p class='small text-muted'><i class='fa fa-clock-o'></i> ".$row['deadline']." </p><span class='label label-danger'>"."Project Deadline</span><br>
							
							</a>
                        </li><li class='divider'></li>";
							}
							 
									   
								   } 
							 
							 
							 
							 ?>

							<?php  
							$query = "SELECT * FROM `task`  ";  
												
													  
								   $result = mysqli_query($connect, $query);
											
								   while($row = mysqli_fetch_array($result)){
										   
										
									   $timestamp = $row['deadline'];
									   
									   $today = new DateTime(); // This object represents current date/time
							$today->setTime( 0, 0, 0 ); // reset time part, to prevent partial comparison

							$match_date = DateTime::createFromFormat( "Y-m-d", $timestamp );
							$match_date->setTime( 0, 0, 0 ); // reset time part, to prevent partial comparison

							$diff = $today->diff( $match_date );
							$diffDays = (integer)$diff->format( "%R%a" ); // Extract days count in interval

							if( $diffDays ==+1) {
								
								$Id= $row['taskId'];
						echo"<li>
                            <a onclick='return false;'  href='#' id='".$row['taskId']."' class='taskAlert'>"."<h5 class='media-heading'><strong>".$row['taskName']."</strong></h5>".
							"<p class='small text-muted'><i class='fa fa-clock-o'></i> ".$row['deadline']." </p><span class='label label-info'>"."Task Deadline</span><br>
							
							</a>
                        </li><li class='divider'></li>";
							}
							 
									   
								   } 
							 
							 
							 
							 ?>
					 
					<?php  
							$query = "SELECT * FROM `subtask`  ";  
												
													  
								   $result = mysqli_query($connect, $query);
											
								   while($row = mysqli_fetch_array($result)){
										   
										
									   $timestamp = $row['deadline'];
									   
									   $today = new DateTime(); // This object represents current date/time
							$today->setTime( 0, 0, 0 ); // reset time part, to prevent partial comparison

							$match_date = DateTime::createFromFormat( "Y-m-d", $timestamp );
							$match_date->setTime( 0, 0, 0 ); // reset time part, to prevent partial comparison

							$diff = $today->diff( $match_date );
							$diffDays = (integer)$diff->format( "%R%a" ); // Extract days count in interval

							if( $diffDays ==+1) {
								
								$Id= $row['subtaskId'];
						echo"<li>
                            <a onclick='return false;'  href='#' id='".$row['subtaskId']."' class='subtaskAlert'>"."<h5 class='media-heading'><strong>".$row['subtaskName']."</strong></h5>".
							"<p class='small text-muted'><i class='fa fa-clock-o'></i> ".$row['deadline']." </p><span class='label label-default'>"."Subask Deadline</span><br>
							
							</a>
                        </li><li class='divider'></li>";
							}
							 
									   
								   } 
							 
							 
							 
							 ?>
					 
                        <li>
                            <a href="notifications.php">View All Notifications</a>
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
                    <li  >
                        <a href="dashboard.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
					<li >
                        <a href="staff.php"><i class="fa fa-fw fa-briefcase"></i> Staff</a>
                    </li>
                     <li class="active">
                        <a href="project.php"><i class="fa fa-fw fa-clipboard"></i> Projects</a>
                    </li>
					 <li  >
                        <a href="team.php"><i class="fa fa-fw fa-users"></i> Team</a>
                    </li>
				
					<li  >
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo2"><i class="fa fa-fw fa-arrows-v"></i> Estimation <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo2" class="collapse">
                            <li>
                                <a href="../estimation/FP.php">Function Point </a>
                            </li>
                            <li>
                                <a href="../estimation/UCP.php">Use Case Point</a>
                            </li>
						 <li>
                                <a href="../estimation/EE.php">Emperical Model</a>
                            </li>
							
							<li>
                                <a href="../estimation/cocomo.php">Basic COCOMO Model </a>
                            </li>
							
                        </ul>
                    </li>
					<li  >
                        <a href="../estimation/metric.php"><i class="fa fa-calculator"></i>  Metrics</a>
                    </li>
					<li >
                        <a href="../estimation/currency.php"><i class="fa fa-money"></i> Currency Converter</a>
                    </li>
					<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-envelope"></i> Messages<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                           
						   <li class="active">
							<a href="inbox.php"><i class="fa fa-fw fa-arrow-down"></i> Inbox</a>
							</li>
                           
						  
                             <li>
							<a href="outbox.php"><i class="fa fa-fw fa-arrow-up"></i> Outbox</a>
							</li>
                          
                        </ul>
                    </li>
					<li >
                        <a href="../estimation/setting.php"><i class="fa fa-cogs" aria-hidden="true"></i> Settings</a>
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
                            Task <small>Tasks Overview</small>
                        </h1>
                      
						  <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-clipboard"></i>  <a href="project.php">Projects</a>
                            </li>
                            <li class="active">
                                 <i class="fa fa-pencil"></i> Tasks
                            </li>
							
                        </ol>
						
						
						
						
                    </div>
                </div>
                <!-- /.row -->
											<?php
												$query = "SELECT * FROM task WHERE projId='".$_GET["projId"]."'";  
											  
											   $result = mysqli_query($connect, $query); 
											   $count1= mysqli_num_rows($result);
														 
											   $query = "SELECT * FROM Task WHERE projId='".$_GET["projId"]."' AND taskStatus ='Completed'"; 
											   $result = mysqli_query($connect, $query);
											   $count2 = mysqli_num_rows($result);
												$query = "SELECT * FROM Task WHERE projId='".$_GET["projId"]."' AND taskStatus ='In-Progess'"; 
											     $result = mysqli_query($connect, $query);
												 $count3 = mysqli_num_rows($result);
													 $query = "SELECT * FROM Task WHERE projId='".$_GET["projId"]."' AND taskStatus ='Not Started'"; 
											     $result = mysqli_query($connect, $query);
												 $count4 = mysqli_num_rows($result);
										?>
                

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-pencil fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
									
										<div class="huge"><?php echo $count1?></div> 
                                        
                                        <div>Total Tasks</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-check fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
										<div class="huge"><?php echo $count2?></div> 
                                        
                                        <div>Completed</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow" >
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-spinner fa-5x" ></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                       	<div class="huge"><?php echo $count3?></div> 
                                        <div>In-Progess</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                     <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red" >
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-times fa-5x" ></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                       	<div class="huge"><?php echo $count4?></div> 
                                        <div>Not Started</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        
						    <div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h3 class="panel-title"></i>Tasks</h3>
                            </div>
                            <div class="panel-body">
                                
<!-- /.row -->
								<div id="employee_table">	
								<!-- /.row -->              
					  <div class="row">
						<div class="col-lg-12">
							 <div class="form-group pull-right">
						    <button type="button"   id="add"   class="btn btn-success"><i class="glyphicon glyphicon-plus-sign"></i> Create Tasks</button>
						<input type='hidden' id='proj_status' value="
						<?php
						$select_query2="SELECT* from project WHERE projId = '".$_GET["projId"]."'";
						 $result2 = mysqli_query($connect, $select_query2);
                          $row2 = mysqli_fetch_array($result2);   
						 if($row2["projStatus"]=='Completed'){
							 echo '1';
						 } 
						 else{
							 echo '0';
							 
						 }
						 
						 ?>" >
						
						</div> 
							 <div class="form-group pull-left">
							 
						    <button id="button1" class="btn btn-danger" value="<?php echo $_GET["projId"];?>"><i class="fa fa-bar-chart"></i>Gantt Chart<img src="../images/oo.gif" id="img2" style="display:none; width:40px;height:40px;"/ ></button>
               </div> 
			   </div>
			   </div>
                     
	 
						
						
	<table id="example99" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
            <tr> 
			
			         <th><center>Id</center></th>
                       <th><center>Name</center></th>
					<th><center>Priority</center></th>
					<th><center>Status</center></th>
					<th><center>Deadline</center></th>
					 
		 
						<th><center>Subtasks</center></th>						
							<th><center>Actions</center></th>  
				
                  </tr>
        </thead>
        
        <tbody>
		 <?php
		include("config.php");
		
		 $select_query2 = "SELECT * FROM task WHERE projId = '".$_GET["projId"]."'";  
     $result2 = mysqli_query($connect, $select_query2);
     while($row2 = mysqli_fetch_array($result2))  {
    $task=$row2["taskId"];
   $proj=$_GET["projId"];
   $v='-';
   $id1= $task.$v.$proj;
   
                   ?>
                  <tr>   <td><?php echo $row2["taskId"]; ?></td>
                      <td><?php echo $row2["taskName"]; ?></td>
					  <td><?php echo $row2["priority"]; ?></td>
                  
                       <td ><center><?php 
					 if($row2["taskStatus"]=='Completed')
					 {
					 echo '<p  style="background-color: #00D211; color:white">'.$row2["taskStatus"].'</p>'; 
					 }
					 else  if($row2["taskStatus"]=='In-Progress'){
						 echo '<p  style="background-color: #FDC305; color:white">'.$row2["taskStatus"].'</p>'; 
					 }
					 else if($row2["taskStatus"]=='Not Started'){
						 echo '<p  style="background-color: #FE0000; color:white">'.$row2["taskStatus"].'</p>'; 
					 }
					 else if($row2["taskStatus"]=='Pending'){
						 echo '<p  style="background-color: #428bca; color:white">'.$row2["taskStatus"].'</p>'; 
					 }
					 ?> </center></td>
                     <td><?php echo $row2["deadline"]; ?></td>
				
				    <form method="GET"  action="subtask.php"  >
                  <td> <button type="submit" name="taskId" class="btn btn-primary btn-xs" value="<?php echo $row2["taskId"]; ?>"><i  class="fa fa-pencil"></i> Subtasks</button></td>
                    </form>
					   <td>
					   <center>
					   
					   <button name="file" value="files" id="<?php echo $row2["taskId"]; ?>" class="btn btn-success btn-xs file_data2" ><i  class="fa fa-paperclip"></i> Files</button>
                    <button type="button" name="view" value="view" id="<?php echo $row2["taskId"]; ?>" class="btn btn-warning btn-xs view_dataa" ><i  class="fa fa-search-plus"></i> View</button>
                   
					   
                      
					 
						 
					 
					
					<button type="button" name="edit" value="edit" id="<?php echo $id1; ?>" class="btn btn-info btn-xs edit_dataa"  ><i class="fa fa-pencil-square-o" ></i> Edit</button> 
                   
					 
					 
					 
					
					
					<button type="button" name="delete" value="delete" id="<?php echo $id1; ?>" class="btn btn-danger btn-xs delete_dataa" ><i class="fa fa-trash-o"></i> Delete</button>
                   
				 </center>
					
                   


				
			     
			   </tr>
                  
				  <?php
                     }
                     ?>
			</tbody>
    </table>
	</div>
						
		
				
				
					
								
								
								
                            </div>
							</div>
                        </div>
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
   <script>
				 
			
    </script>

  	 

    <!-- Morris Charts JavaScript -->
  
</body>

</html>

 <!-- Model Form -->
<div id="add_data_Modal" class="modal fade">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" style=" background-color: #00C851;color:white;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
             <center><h4><span class="fa fa-pencil"></span> Create Task</h4></center>
         </div>
         <div class="modal-body">
	
				
		    <form method="post" id="insert_form2">
      <div class="row">
		 <div class="col-lg-12">  
 <div id="show"></div></div></div>

	  <div class="row">
			   
			   

    <div class="col-lg-4">
	
	
	
	 <div class="panel panel-red">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i>Task Info</h3>
                            </div>
                            <div class="panel-body">
                                 
	
	
	
<label>Task Name<sup><span style = "color: red;  font-size: 10px;" class="glyphicon glyphicon-asterisk"></span></label>
<input type="text" name="taskName" placeholder="Enter Task Name" id="taskName"  class="form-control" required>
               </br>
			     <label class="ccc">Start Date</label>
<input type="date" name="startDate" id="startDate" class="form-control" required>
 <input type="hidden" name="curDate" id="curDate" value="<?php echo date("Y-m-d");  ?>" class="form-control" required>
 <input type="hidden" name="proj_deadline" id="proj_deadline" value="<?php $sql2="SELECT * FROM project WHERE projId = '". $_GET["projId"]."'";$result2 = mysqli_query($connect, $sql2);$row = mysqli_fetch_array($result2);echo $row["deadline"]; ?>" class="form-control">
<input type="hidden" name="proj_startdate" id="proj_startdate" value="<?php $sql2="SELECT * FROM project WHERE projId = '". $_GET["projId"]."'";$result2 = mysqli_query($connect, $sql2);$row = mysqli_fetch_array($result2);echo $row["startDate"];?>" class="form-control">
			   
			   
			   
			   </br>
			   <label>Deadline<sup><span style = "color: red;  font-size: 10px;" class="glyphicon glyphicon-asterisk"></span></label>
<input type="date" name="deadline" id="deadline" class="form-control" required>
               
               </br>
			   <label>Priority<sup><span style = "color: red;  font-size: 10px;" class="glyphicon glyphicon-asterisk"></span></label>
			   <select name="priority" id="priority" class="form-control" required>
			   <option value="Low">Low</option>
			   <option value="Normal">Normal</option>
				<option value="High">High</option>
			  			  
			  </select>
			  </br>
			    
			  <label id='wh' hidden>Task Hours<sup><span style = "color: red;  font-size: 10px;" class="glyphicon glyphicon-asterisk"></span></label>
			  
    <input type="hidden" id="taskHours"name="taskHours" class="form-control" value="0"  min='1'>
      <input type="hidden" id="countsaturdays" name="countsaturdays" value='0'class="form-control" >
	    <input type="hidden" id="workingdays" name="workingdays" value='0'class="form-control" >
			    <input type="hidden" id="deadlineCheck" name="deadlineCheck" value='0' class="form-control" >
  <input name='saturadayCheck' id='saturadayCheck' style='width:15px;height:15px' type='checkbox' hidden> <b id='wh2' hidden>Include Saturday </br></br></b> 
		 <input name='saturadayCheck1' id='saturadayCheck1'  value='0' type='hidden' >  
		   
			  
			   <label>Task Status</label>
			   <select name="taskStatus" id="taskStatus" class="form-control" required>
			   <option value="Pending">Pending</option>
			   
			  			  
			  </select>
               </br>
			<label>Predecessors</label>  
			   
			   
			    <?php
      include("config.php");

         $query = "SELECT* FROM task WHERE projId = '".$_GET["projId"]."'";  
  $result = mysqli_query($connect, $query);
    ?>
   <select  class="form-control"id="selectShift" name="selectShift[]" multiple="multiple">
  
   <?php
     while($row = mysqli_fetch_array($result))
     { 
    ?>

   <option name="dependency[]" id ="<?php echo $row['taskId']; ?>"  value="<?php echo $row['taskId']; ?>">
	<?php echo $row['taskName']; ?></option>
    <?php
        }
    ?>
    </select>
	<br>
	 <label>Description</label>
	<textarea name='description' id='description' class="form-control" ></textarea>
	
	<br>
			     <label>Attach File</label> <br><label class="btn btn-default btn-file">
					Attach File <i class="fa fa-paperclip"></i>
					<input type="file" name="filename[]" id="select_image" style="display: none;" >
				</label>
			     </br>
    </div>    </div>    </div>

  
	<div class="col-lg-8"  >
	<div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i>Team Members</h3>
                            </div>
                            <div class="panel-body">
                     <label>Assign To</label>              
	
	<?php
	
include("config.php");
$id='';

 $query = "SELECT* FROM project  WHERE projId = '".$_GET["projId"]."'";  
  $result = mysqli_query($connect, $query);
  
  while($row = mysqli_fetch_array($result))
     {        
 $id= $row["teamId"];
		 
	 }
	 
	$query1 = "SELECT* FROM teammember WHERE teamId = '".$id."'";  
    $result1 = mysqli_query($connect, $query1);
     
	  $output = '';
	$output .= '	<table id="example8" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
	<thead>
            <tr>
                <th></th>
				 
				  
                
                <th>Name</th>
                 <th>Role</th>
               
                
            </tr>
        </thead><tbody>';

     while ($row1=mysqli_fetch_array($result1)) {  
	  $sql2="SELECT * FROM employee WHERE empId = '".$row1['empId']."'";  
     $result2 = mysqli_query($connect, $sql2);
	  while ($row2=mysqli_fetch_array($result2)) {
		 
			  
     $output .=  "<tr><td><input type = 'checkbox' class='check_perm'  name = 'empList[]' value = '{$row2['empId']}' /></td>".
	 '<td><img style=" border-radius: 50%;" src="' .$row2['image'] .'" width="40px" height="40px"  />' .$row2['empName'] .'</td>'."<td>";
		 
 $query2 = "SELECT * FROM employeeroles  WHERE empId='".$row2['empId']."'";  
					 $result2 = mysqli_query($connect, $query2);
            
                     while($row2 = mysqli_fetch_array($result2))
                     {$query21 = "SELECT * FROM role  WHERE roleId='".$row2["roleId"]."'";  
					 $result21 = mysqli_query($connect, $query21);
            
                     while($row21 = mysqli_fetch_array($result21))
                     {
						 
			$output .= '<li>'.$row21['roleName'].' <b>('.$row2['experience'].' years)</b></li>';
					 }
					 }
		$output .= '  </ul></td> ';
	  
	 
	 
	 
	 
                
	 }}
    $output .= '</tbody></table>';
    echo $output;
	
?>	
<script type="text/javascript" src="graph/loader.js"></script>			

  
   
</div></div></div> </div>

	
              
			
				
				
				
				
<div class="row">
<div class="col-lg-11"  >
	 		  <input type="hidden" name="proj_id" id="proj_id"  class="form-control">
			  <input type="hidden" name="projId" id="projId" value="<?php echo $_GET["projId"];?>" class="form-control">
			   <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success pull-right" />
			    </div> 
				</div>
				 
                </form>

 
	
				
				


		</div>
		
         <div class="modal-footer"><div class="col-xs-12">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>  </div> </div>
      </div>
   </div>
</div>

<div id="dataModal" class="modal fade">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header" style=" background-color: #42a5f5      ;color:white;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
           <center> <h4 class="modal-title"><span class="fa fa-pencil"></span>&nbsp&nbsp Task Details</h4> </center>
         </div>
         <div class="modal-body" id="employee_detail">
         
		 
		 </div>
		 
		 
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>







<script src="js/taskScript.js "></script>
 <!-- Model Form -->
<div id="edit_data_Modal" class="modal fade">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header" style=" background-color:#0088CC;color:white;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
             <center><h4><span class="fa fa-pencil"></span> Edit Task</h4></center>
         </div>
         <div class="modal-body">
           
		   
         <div class="row">
			   <div id='uu' class="main col-lg-12 myHalfCol">
    
				</div>



	
				
				


		</div>
         <div class="modal-footer"><div class="col-xs-12">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>  </div> </div>
      </div>
   </div>
</div>

<div id="taskfiledataModal" class="modal fade">
   <div class="modal-dialog modal-lg ">
      <div class="modal-content">
         <div class="modal-header" style=" background-color:#5cb85c;color:white;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
             <center><h4><span class="fa fa-paperclip"></span> Attach Files</h4></center>
         </div>
        
		
		
		  <form method="post" action="" id="file_form2">
              
			   
			 <div class="row">
               
			   
				 <div class="col-xs-9">
				 <div class="modal-body" id="task_file_detail">
						</div>
						 </div>
						<div class="col-xs-3">
			    <label>Attach Files</label> <br><label class="btn btn-default btn-file">
					Attach Files <i class="fa fa-paperclip"></i>
					<input type="file" name="filei[]" id="select_image2" style="display: none;" multiple>
				</label>
				  <br><br><input type="submit" name="insert1" id="insert1" value="Attach" class="btn btn-success" />
				
				   <input type="hidden" name="id2" id="id2"  />
					 <br><br><label id='file_label'></label><div id='file_data'></div>
				   
				 </form> </div>
				 
				
			   </div>
				 
			 
				
         <div class="modal-footer">
            <button type="button" id="c1"class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
		 
		 
		 
      </div>
   </div>
</div>



 
 
   <div id="messageDetails" class="modal fade">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header" style=" background-color: #fbc02d ;color:white;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
           <center> <h4 class="modal-title"><span class="glyphicon glyphicon-envelope"></span>&nbsp&nbsp Message Details</h4> </center>
         </div>
         <div class="modal-body" id="message_detail">
		 
 
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div>
      </div>
   </div>
</div>
<div id="taskDetails" class="modal fade">
     <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" style=" background-color: #42a5f5      ;color:white;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
           <center> <h4 class="modal-title"><span class="fa fa-pencil"></span>&nbsp&nbsp Task Details</h4> </center>
         </div>
         <div class="modal-body" id="task_detail">
		 
 
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div>
      </div>
   </div>
</div>
<div id="subtaskDetails" class="modal fade">
   <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style=" background-color: #546e7a  ;color:white;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
           <center> <h4 class="modal-title"><span class="fa fa-pencil"></span>&nbsp&nbsp Subask Details</h4> </center>
         </div>
         <div class="modal-body" id="subtask_detail">
		 
 
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div>
      </div>
   </div>
</div>

<div id="projectDetails" class="modal fade">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" style=" background-color: #87afc7   ;color:white;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
           <center> <h4 class="modal-title"><span class="fa fa-clipboard"></span>&nbsp&nbsp Project Details</h4> </center>
         </div>
         <div class="modal-body" >
		  <div class="row">
		  <div class="col-xs-12">
		  <label>Overall Project Progress</label>
		  <div class="progress" id='employee_detail0'>
   
	
	
  </div>
  
  
  
</div> </div> 
		  <div class="row">
			<br>
			<div class="col-xs-6">
			
		   <div   id="employee_detail88">
		 
		  </div> 
		  </div>
			 
			
			<div class="col-lg-6 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-calendar fa-5x"></i>
                                     </div>
                                    <div class="col-xs-9 text-center">
									  <h3 > Deadline</h3>
										<div class="huge" id="days"></div> 
                                        <h4 id="lab"></h4>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
				<div class="col-xs-3">
				<div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-2">
                                        
                                    </div>
                                    <div class="col-xs-9  text-center">
									
										<div class="huge" id="task_count"></div> 
                                         <h5 ><b>&nbsp &nbsp&nbsp&nbsp&nbspTotal&nbsp&nbsp &nbsp&nbsp &nbsp  Tasks!</b></h5>
                                    </div>
                                </div>
						</div>
					</div>
			 
				<div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-2">
                                        
                                    </div>
                                    <div class="col-xs-9  text-center">
									
										<div class="huge" id="subtask_count"></div> 
                                         <h5  ><b>&nbsp&nbspTotal &nbsp&nbsp &nbsp   Subtasks!</b></h5>
                                    </div>
                                </div>
						</div>
					</div>
				
				</div>
				<div class="col-xs-3">
				<div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-2">
                                        
                                    </div>
                                    <div class="col-xs-9  text-center">
									
										<div class="huge"  id="comlete_task_count"> </div> 
                                        <b>  <h5  ><b>&nbsp   Completed &nbspTasks!</b></h5> </b>
                                    </div>
                                </div>
						</div>
					</div>
			 
				<div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-2">
                                        
                                    </div>
                                    <div class="col-xs-9  text-center">
									
										<div class="huge"  id="comlete_subtask_count"> </div> 
                                         <h5  ><b>Completed Subtasks! </b></h5>
                                    </div>
                                </div>
						</div>
					</div>
				
				</div>
			
			
			</div>
 <br>
 
		  <div id="metric_data">
			  </div>
 <div id="employee_detail3">
			 
 </div>
					
								
								 
 
 
 
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div>
      </div>
   </div>
</div>
<div id="subtaskFileModal" class="modal fade">
   <div class="modal-dialog modal-lg ">
      <div class="modal-content">
         <div class="modal-header" style=" background-color:#5cb85c;color:white;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
             <center><h4><span class="fa fa-paperclip"></span> Subtask Files</h4></center>
         </div> <div class="row"><div class="col-xs-12">
				 <div class="modal-body" id="subtask_file_detail">
						</div>
						 </div></div><div class="modal-footer">
            <button type="button" id="c1"class="btn btn-default" data-dismiss="modal">Close</button>
         </div></div>
   </div>
</div>


<div id="taskFileModal" class="modal fade">
   <div class="modal-dialog modal-lg ">
      <div class="modal-content">
         <div class="modal-header" style=" background-color:#5cb85c;color:white;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
             <center><h4><span class="fa fa-paperclip"></span> Task Files</h4></center>
         </div>
		 <div class="row">
               <div class="col-xs-12">
				 <div class="modal-body" id="task_file_detail">
						</div>
						 </div>
					</div>
			<div class="modal-footer">
            <button type="button" id="c1"class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
<div id="projectFileModal" class="modal fade">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
    <div class="modal-header" style=" background-color:#5cb85c;color:white;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
             <center><h4><span class="fa fa-paperclip"></span> Project Files</h4></center>
         </div> <div class="col-xs-12">
				 <div class="modal-body" id="project_file_detail">
						</div>
						 </div>	
         <div class="modal-footer">
            <button type="button" id="c1"class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
		 	 
      </div>
   </div>
</div>

<div id="empdataModal" class="modal fade">
   <div class="modal-dialog modal-lg" >
      <div class="modal-content">
         <div class="modal-header" style=" background-color: #D4C5EE;color:black;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <center><h4><span class="glyphicon glyphicon-user"></span>&nbsp&nbspEmployee Details</h4></center>
         </div>
         <div class="modal-body" >
		 
		 
		 <div class="row" >
		<div class="col-lg-9"  > 
	  <div id="employee_detail11"></div>
	  </div>
	  
	    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green" >
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                      <i class="fa fa-check fa-5x" ></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                       

		 							    

										       <div id='employee_detail33'class="huge"> </div>

										  
                            
                                          <div>Completed Projects</div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
						<br>
						
						<div class="panel panel-yellow" >
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                      <i class="fa fa-check fa-5x" ></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                       

		 							    

										       <div  class="huge" id='employee_detail00'></div>

										  
                            
                                          <div>Completed Tasks</div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
						<br>
						
						<div class="panel panel-red" >
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                      <i class="fa fa-check fa-5x" ></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                       

		 							    
                                  <div  class="huge" id='employee_detail44'></div>

										  
                            
                                          <div>Completed Subtasks</div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
	  
	  </div>
	  
	  <div class="row" >
		<div class="col-lg-9"  > 
	   
	   
	   <div id="employee_detail22"></div>
	   
	   
	   
	  </div>
	  
	 
	  
	  
	  
	   
	  
	  </div>
		 
		 
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>