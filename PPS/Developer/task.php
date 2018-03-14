<?php   
 session_start();   
 date_default_timezone_set('Asia/Karachi');
 include('config.php');
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
                <a class="navbar-brand" href="project.php">Developer Panel</a>
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

								$query0 = "SELECT * FROM `taskassignment` WHERE empId='".$_SESSION['id']."' ";  
							    $result0 = mysqli_query($connect, $query0);
											
								   while($row0 = mysqli_fetch_array($result0)){
									   
									   
								  
								
								
								$query = "SELECT * FROM `task` WHERE deadlineFlag2='0' and taskId='".$row0['taskId']."'";  
												
													  
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
                               }
								   
							$query5 = "SELECT * FROM `subtask` WHERE deadlineFlag2='0' and empId='".$_SESSION['id']."'";  
									
										  
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
							$query = "SELECT * FROM `notification`  WHERE  receiverId='".$_SESSION['id']."' ORDER BY `notificationId` DESC   Limit 2";  
												
													  
						   $result = mysqli_query($connect, $query);
									
						   while($row = mysqli_fetch_array($result)){
								$Id1= $row['notificationTypeId'];
								$Id2= $row['notificationId'];
						        $Id= $Id1.'-'.$Id2;
						  if($row['notificationType']=='1'){
							 
									
							  
								
						echo"<li>
                            <a onclick='return false;' href='#' id='".$Id."' class='project_file_data'>"."<h5 class='media-heading'> <strong style='color:green;'>".$row['notificationDetails']."</strong>";
							
							if($row['seen']=='0'){
									  echo' <span class="badge badge-notify pull-right">new';
									  echo' </span>';  
									}
							
							echo"</h5><p class='small text-muted'><i class='fa fa-clock-o'></i> ".$row['date'].' at '.$row['time']." </p><span class='label label-success'>"."Project File Uplaoded</span> 
							
							</a>
                        </li><li class='divider'></li>";
							}
							 
							 
							 
							if($row['notificationType']=='2'){
							 
									
							  
								
						echo"<li>
                            <a onclick='return false;' href='#' id='".$Id."' class='task_file_data'>"."<h5 class='media-heading'> <strong style='color:#5bc0de	;'>".$row['notificationDetails']."</strong> ";
							
							if($row['seen']=='0'){
									  echo' <span class="badge badge-notify pull-right">new';
									  echo' </span>';  
									}
							
							echo"</h5><p class='small text-muted'><i class='fa fa-clock-o'></i> ".$row['date'].' at '.$row['time']." </p><span class='label label-info'>"."Task File Uplaoded</span> 
							
							</a>
                        </li><li class='divider'></li>";
							} 
							 
							 
							if($row['notificationType']=='3'){
							 
									
							  
								
						echo"<li>
                            <a onclick='return false;' href='#' id='".$Id."' class='subtask_file_data'>"."<h5 class='media-heading'> <strong style='color:grey;'>".$row['notificationDetails']."</strong> ";
							
							if($row['seen']=='0'){
									  echo' <span class="badge badge-notify pull-right">new';
									  echo' </span>';  
									}
							
							echo"</h5><p class='small text-muted'><i class='fa fa-clock-o'></i> ".$row['date'].' at '.$row['time']." </p><span class='label label-default'>"."Subtask File Uplaoded</span> 
							
							</a>
                        </li><li class='divider'></li>";
							}  
							 
							 if($row['notificationType']=='6'){
							 
									
							  
								
						echo"<li>
                            <a onclick='return false;' href='#' id='".$Id."' class='proj_assignment'>"."<h5 class='media-heading'> <strong style='color:green;'>".$row['notificationDetails']."</strong>  ";
							
							if($row['seen']=='0'){
									  echo' <span class="badge badge-notify pull-right">new';
									  echo' </span>';  
									}
							
							echo"</h5><p class='small text-muted'><i class='fa fa-clock-o'></i> ".$row['date'].' at '.$row['time']." </p><span class='label label-success'>"."New Project Assigned</span> 
							
							</a>
                        </li><li class='divider'></li>";
							}  
							 
							 
							  if($row['notificationType']=='7'){
							 
									
							  
								
						echo"<li>
                            <a onclick='return false;' href='#' id='".$Id."' class='proj_assignment'>"."<h5 class='media-heading'> <strong style='color:blue;'>".$row['notificationDetails']."</strong> ";
							
							if($row['seen']=='0'){
									  echo' <span class="badge badge-notify pull-right">new';
									  echo' </span>';  
									}
							
							echo"</h5><p class='small text-muted'><i class='fa fa-clock-o'></i> ".$row['date'].' at '.$row['time']." </p><span class='label label-primary'>"."Project Updated</span> 
							
							</a>
                        </li><li class='divider'></li>";
							} 
							
						  if($row['notificationType']=='8'){
							 
									
							  
								
						echo"<li>
                            <a onclick='return false;' href='#' id='".$Id."' class='task_assignment'>"."<h5 class='media-heading'> <strong style='color:green;'>".$row['notificationDetails']."</strong> ";
							
							if($row['seen']=='0'){
									  echo' <span class="badge badge-notify pull-right">new';
									  echo' </span>';  
									}
							
							echo"</h5><p class='small text-muted'><i class='fa fa-clock-o'></i> ".$row['date'].' at '.$row['time']." </p><span class='label label-success'>"."New Task Assigned</span> 
							
							</a>
                        </li><li class='divider'></li>";
							} 
								
							 
							  if($row['notificationType']=='9'){
							 
									
							  
								
						echo"<li>
                            <a onclick='return false;' href='#' id='".$Id."' class='task_assignment'>"."<h5 class='media-heading'> <strong style='color:blue;'>".$row['notificationDetails']."</strong> ";
							
							if($row['seen']=='0'){
									  echo' <span class="badge badge-notify pull-right">new';
									  echo' </span>';  
									}
							
							echo"</h5><p class='small text-muted'><i class='fa fa-clock-o'></i> ".$row['date'].' at '.$row['time']." </p><span class='label label-primary'>"."Task Updated</span> 
							
							</a>
                        </li><li class='divider'></li>";
							} 
							
							
							if($row['notificationType']=='10'){
							 
									
							  
								
						echo"<li>
                            <a onclick='return false;' href='#' id='".$Id."' class='subtask_assignment'>"."<h5 class='media-heading'> <strong style='color:green;'>".$row['notificationDetails']."</strong> ";
							
							if($row['seen']=='0'){
									  echo' <span class="badge badge-notify pull-right">new';
									  echo' </span>';  
									}
							
							echo"</h5><p class='small text-muted'><i class='fa fa-clock-o'></i> ".$row['date'].' at '.$row['time']." </p><span class='label label-success'>"."New Subtask Assigned</span> 
							
							</a>
                        </li><li class='divider'></li>";
							} 
								
							 
							  if($row['notificationType']=='11'){
							 
									
							  
								
						echo"<li>
                            <a onclick='return false;' href='#' id='".$Id."' class='subtask_assignment'>"."<h5 class='media-heading'> <strong style='color:blue;'>".$row['notificationDetails']."</strong> ";
							
							if($row['seen']=='0'){
									  echo' <span class="badge badge-notify pull-right">new';
									  echo' </span>';  
									}
							
							echo"</h5><p class='small text-muted'><i class='fa fa-clock-o'></i> ".$row['date'].' at '.$row['time']." </p><span class='label label-primary'>"."Subtask Updated</span> 
							
							</a>
                        </li><li class='divider'></li>";
							} 
							
							
							
							
							
							
							
						   }	   
								   
							 
							 
							 
							 ?>

							<?php  
								$query0 = "SELECT * FROM `taskassignment` WHERE empId='".$_SESSION['id']."' ";  
							    $result0 = mysqli_query($connect, $query0);
											
								   while($row0 = mysqli_fetch_array($result0)){
									   
									   
								  
								
								
								$query = "SELECT * FROM `task` WHERE    taskId='".$row0['taskId']."'";  
									
												
													  
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
							 
							 
								   }
							 ?>
					<?php  
							$query = "SELECT * FROM `subtask`  where empId ='".$_SESSION['id']."' ";  
												
													  
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
                      
                     <li class="active">
                        <a href="project.php"><i class="fa fa-fw fa-clipboard"></i> Projects</a>
                    </li>
					 <li >
                        <a href="team.php"><i class="fa fa-fw fa-users"></i> Team</a>
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
											$count1=0;
											$count2=0;
											$count3=0;
											$count4=0;
											    $select_query22= "SELECT * FROM task WHERE projId = '".$_GET["projId"]."'";  
												$result22 = mysqli_query($connect, $select_query22);
												while($row22 = mysqli_fetch_array($result22))  {
													
												$select_query23 = "SELECT * FROM taskassignment WHERE taskId = '".$row22["taskId"]."' AND empId='".$_SESSION['id']."' ";  
												$result23 = mysqli_query($connect, $select_query23);
												while($row23 = mysqli_fetch_array($result23))  { 
																				   $count1++;
												}}
											 $select_query22= "SELECT * FROM task WHERE projId = '".$_GET["projId"]."'";  
											 $result22 = mysqli_query($connect, $select_query22);
													while($row22 = mysqli_fetch_array($result22))  {
														
												 $select_query23 = "SELECT * FROM taskassignment WHERE taskId = '".$row22["taskId"]."' AND empId='".$_SESSION['id']."' ";  
											 $result23 = mysqli_query($connect, $select_query23);
													while($row23 = mysqli_fetch_array($result23))  {
												
												
												 $select_query2 = "SELECT * FROM task WHERE taskId = '".$row23["taskId"]."' AND taskStatus ='Completed'";  
											 $result2 = mysqli_query($connect, $select_query2);
											 
											 while($row2 = mysqli_fetch_array($result2))  {
													$count2++;
													
													}}}
												 $select_query22= "SELECT * FROM task WHERE projId = '".$_GET["projId"]."'";  
											 $result22 = mysqli_query($connect, $select_query22);
													while($row22 = mysqli_fetch_array($result22))  {
														
												 $select_query23 = "SELECT * FROM taskassignment WHERE taskId = '".$row22["taskId"]."' AND empId='".$_SESSION['id']."' ";  
											 $result23 = mysqli_query($connect, $select_query23);
													while($row23 = mysqli_fetch_array($result23))  {
												 
												 
												 $select_query2 = "SELECT * FROM task WHERE taskId = '".$row23["taskId"]."' AND taskStatus ='In-Progress'";  
											 $result2 = mysqli_query($connect, $select_query2);
											  
											 while($row2 = mysqli_fetch_array($result2))  {
													$count3++;
													
													}}}
												 
													  $select_query22= "SELECT * FROM task WHERE projId = '".$_GET["projId"]."'";  
											 $result22 = mysqli_query($connect, $select_query22);
													while($row22 = mysqli_fetch_array($result22))  {
														
												 $select_query23 = "SELECT * FROM taskassignment WHERE taskId = '".$row22["taskId"]."' AND empId='".$_SESSION['id']."' ";  
											 $result23 = mysqli_query($connect, $select_query23);
													while($row23 = mysqli_fetch_array($result23))  {
												
												
												 $select_query2 = "SELECT * FROM task WHERE taskId = '".$row23["taskId"]."' AND taskStatus ='Not Started'";  
											 $result2 = mysqli_query($connect, $select_query2);
											 
											 while($row2 = mysqli_fetch_array($result2))  {
													$count4++;
													
													}}}
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
									
										<div class="huge" id="tt"><?php echo $count1?></div> 
                                        
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
										<div class="huge" id="ct"><?php echo $count2?></div> 
                                        
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
                                       	<div class="huge" id="in_prog"><?php echo $count3?></div> 
                                        <div>In-Progress</div>
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
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-times fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
									
										<div class="huge" id="nt_st"><?php echo $count4?></div> 
                                        
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
  <input type="hidden" value='  <?php  include('config.php');
				
				$count=0;
				$query = "
    SELECT* from taskAssignment  WHERE empId='".$_SESSION['id']."' ";  
    $result= mysqli_query($connect, $query);
while($row=mysqli_fetch_array($result)){
	
	$query2 = "SELECT* from subtask  WHERE empId='".$_SESSION['id']."' and taskId='".$row['taskId']."' and actualCompletionDate='0000-00-00 00:00:00' and actualStartDate!='0000-00-00 00:00:00'";  
    $result2= mysqli_query($connect, $query2);
	 if(mysqli_num_rows($result2)>0){
				 $count++;
				 
				 
				 }
	else{
		$query3 = "SELECT* from task Where taskId='".$row['taskId']."' and actualCompletionDate='0000-00-00 00:00:00' and actualStartDate!='0000-00-00 00:00:00'";  
    $result3= mysqli_query($connect, $query3);
	 if(mysqli_num_rows($result3)>0){
				 $count++;
				 
				 
				 }
		
		
	}			 
	
}  if($count==0) {
 
	 echo '0';
  }
else{
	
	echo '1';
}
 ?>  ' id="check_work">
				 
	 
		
						
	<table id="example99" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
           



		   <tr> 
			
			         <th>Id</th>
                       <th>Name</th>
					<th>Priority</th>
					<th><center>Status</center></th>
					<th>Deadline</th>
					 
		 
						<th>Subtasks</th>						
						<th ><center>Actions</center></th>
				
                  </tr>
        </thead>
        
        <tbody>
		 <?php
		include("config.php");
		 $select_query22= "SELECT * FROM task WHERE projId = '".$_GET["projId"]."'";  
     $result22 = mysqli_query($connect, $select_query22);
		    while($row22 = mysqli_fetch_array($result22))  {
					  $flagi=false;
			 $select_query263 = "SELECT * FROM taskassignment WHERE taskId = '".$row22["taskId"]."'  ";  
     $result263 = mysqli_query($connect, $select_query263);		  
					  
					  if(mysqli_num_rows($result263)>1){
			 $flagi=true;
		 }
		 $select_query23 = "SELECT * FROM taskassignment WHERE taskId = '".$row22["taskId"]."' AND empId='".$_SESSION['id']."' ";  
     $result23 = mysqli_query($connect, $select_query23);

	 	 
		    while($row23 = mysqli_fetch_array($result23))  {
					
		 $select_query88 = "SELECT * FROM subtask WHERE taskId = '".$row23["taskId"]."' AND empId='".$_SESSION['id']."' ";  
     $result88 = mysqli_query($connect, $select_query88);
		 if(mysqli_num_rows($result88)>0){
		  $flagi=true;
		 }
		 $select_query2 = "SELECT * FROM task WHERE taskId = '".$row23["taskId"]."'";  
     $result2 = mysqli_query($connect, $select_query2);
	 
     while($row2 = mysqli_fetch_array($result2))  {
  
   
                   ?>
                  <tr>   <td><?php echo $row2["taskId"]; ?></td>
                      <td><?php echo $row2["taskName"]; ?></td>
					  <td><?php echo $row2["priority"]; ?></td>
                    <td ><center><?php 
					
					 if($row2["taskStatus"]=='Completed')
					 {
					 echo '<p class="'.$row2["taskId"].'"  style="background-color: #00D211; color:white">'.$row2["taskStatus"].'</p>'; 
					 }
					 else  if($row2["taskStatus"]=='In-Progress'){
						 echo '<p  class="'.$row2["taskId"].'"style="background-color: #FDC305; color:white">'.$row2["taskStatus"].'</p>'; 
					 }
					 else if($row2["taskStatus"]=='Not Started'){
						 echo '<p  class="'.$row2["taskId"].'" style="background-color: #FE0000; color:white">'.$row2["taskStatus"].'</p>'; 
					 }
					 
					 ?> </center></td>
                    
                     <td><?php echo $row2["deadline"]; ?></td>
				
				    <form method="GET"  action="subtask.php"  >
                  <td> <button title="View Subtask"type="submit" name="taskId" class="btn btn-primary btn-xs" value="<?php echo $row2["taskId"]; ?>"><i  class="fa fa-pencil"></i> Subtasks</button></td>
                    </form>
					   <td>
					   <?php
					   if($flagi){
						 
					   ?>
					    <button title="Do Subtask" name="start" value="start" id="<?php echo $row2["taskId"]; ?>" class="btn btn-info btn-xs start" disabled><i  class="fa fa-play"></i> Start</button> 
                       <button   title="Do Subtask" name="done" value="done" id="<?php echo $row2["taskId"]; ?>" class="btn btn-success btn-xs done" disabled><i  class="fa fa-check"></i> Done</button> 
                    <?php
					   }
					   else{
					?>
					   
					   
					   <?php
					   if(($row2["actualStartDate"]=='0000-00-00 00:00:00')&&$row2["actualCompletionDate"]=='0000-00-00 00:00:00')
					   {?>
						  <button title="Start Task"name="start" value="start" id="<?php echo $row2["taskId"]; ?>" class="btn btn-info btn-xs start" ><i  class="fa fa-play"></i> Start</button> 
                       <button   title="Submit Task"name="done" value="done" id="<?php echo $row2["taskId"]; ?>" class="btn btn-success btn-xs done" disabled><i  class="fa fa-check"></i> Done</button> 
                    
						   
					   <?php
					   }
					   else if(($row2["actualStartDate"]!='0000-00-00 00:00:00')&& $row2["actualCompletionDate"]=='0000-00-00 00:00:00')
					   {
						   ?>
						   <button title="Task Started" name="start" value="start" id="<?php echo $row2["taskId"]; ?>" class="btn btn-info btn-xs start" disabled><i  class="fa fa-play"></i> Start</button> 
                       <button   title="Submit Task"name="done" value="done" id="<?php echo $row2["taskId"]; ?>" class="btn btn-success btn-xs done" ><i  class="fa fa-check"></i> Done</button> 
                    
						   
					  <?php }  
					   else if(($row2["actualStartDate"]!='0000-00-00 00:00:00')&& $row2["actualCompletionDate"]!='0000-00-00 00:00:00')
					   { ?>
						   <button title="Task Completed" name="start" value="start" id="<?php echo $row2["taskId"]; ?>" class="btn btn-info btn-xs start" disabled><i  class="fa fa-play"></i> Start</button> 
                       <button   title="Task Completed" name="done" value="done" id="<?php echo $row2["taskId"]; ?>" class="btn btn-success btn-xs done" disabled><i  class="fa fa-check"></i> Done</button> 
                    
						   
					   <?php  }}
					   ?>
					   
					   
					   
					   
					   
					   <button title="Attach Files" name="file" value="files" id="<?php echo $row2["taskId"]; ?>" class="btn btn-default btn-xs file_data2" ><i  class="fa fa-paperclip"></i> Files</button>
                    <button  title="View Task" name="view" value="view" id="<?php echo $row2["taskId"]; ?>" class="btn btn-warning btn-xs view_dataa" ><i  class="fa fa-search-plus"></i> View</button>
                    </td>
			   </tr>
                  
				  <?php
			}}}
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
			   <div class="main col-lg-12 myHalfCol">
			   
			   
				

    <div class="col-lg-4">
	 <div class="panel panel-red">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i>Task Info</h3>
                            </div>
                            <div class="panel-body">
                                 
	
	
	
<label>Task Name<sup><span style = "color: red;  font-size: 10px;" class="glyphicon glyphicon-asterisk"></span></label>
<input type="text" name="taskName" placeholder="Enter Task Name" id="taskName"  class="form-control" required>
               </br>
			   <label>Deadline<sup><span style = "color: red;  font-size: 10px;" class="glyphicon glyphicon-asterisk"></span></label>
<input type="date" name="deadline" id="deadline" class="form-control" required>
               </br>
			     <label class="ccc">Start Date</label>
<input type="date" name="startDate" id="startDate" class="form-control" required>
 <input type="hidden" name="curDate" id="curDate" value="<?php echo date("Y-m-d");  ?>" class="form-control" required>
 <input type="hidden" name="proj_deadline" id="proj_deadline" value="<?php $sql2="SELECT * FROM project WHERE projId = '". $_GET["projId"]."'";$result2 = mysqli_query($connect, $sql2);$row = mysqli_fetch_array($result2);echo $row["deadline"]; ?>" class="form-control">
<input type="hidden" name="proj_startdate" id="proj_startdate" value="<?php $sql2="SELECT * FROM project WHERE projId = '". $_GET["projId"]."'";$result2 = mysqli_query($connect, $sql2);$row = mysqli_fetch_array($result2);echo $row["startDate"];?>" class="form-control">
			   
               </br>
			   <label>Priority<sup><span style = "color: red;  font-size: 10px;" class="glyphicon glyphicon-asterisk"></span></label>
			   <select name="priority" id="priority" class="form-control" required>
			   <option value="Low">Low</option>
			   <option value="Normal">Normal</option>
				<option value="High">High</option>
			  			  
			  </select>
			  </br>
			    
			  <label id='wh'>Work Hours<sup><span style = "color: red;  font-size: 10px;" class="glyphicon glyphicon-asterisk"></span></label>
			  
    <input type="number" id="workHours"name="workHours" class="form-control" value="0" min="0" max="8">
      <input type="hidden" id="countsaturdays" name="countsaturdays" value='0'class="form-control" >
	    <input type="hidden" id="workingdays" name="workingdays" value='0'class="form-control" >
			    <input type="hidden" id="deadlineCheck" name="deadlineCheck" value='0' class="form-control" >
  <input name='saturadayCheck' id='saturadayCheck' style='width:15px;height:15px' type='checkbox' disabled> <b id='wh2'>Include Saturday </br></br></b> 
			  
			 
			  
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
    </select><br>
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

 $query = "SELECT* FROM projectassignment WHERE projId = '".$_GET["projId"]."'";  
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
				 
				  <th>W.H left</th>
                
                <th>Name</th>
                 <th>Role</th>
               
                
            </tr>
        </thead><tbody>';

     while ($row1=mysqli_fetch_array($result1)) {  
	  $sql2="SELECT * FROM employee WHERE empId = '".$row1['empId']."'";  
     $result2 = mysqli_query($connect, $sql2);
	  while ($row2=mysqli_fetch_array($result2)) {
		
		if($row2['workHours']=='0'){
			 $output .=  "<tr><td><input type = 'checkbox' class='check_perm'  name = 'empList[]' value = '{$row2['empId']}' disabled></td>"."<td><center>{$row2['workHours']}</center></td>".
	 '<td><img style=" border-radius: 50%;" src="' .$row2['image'] .'" width="40px" height="40px"  />' .$row2['empName'] .'</td>'."<td>";
		
			
		}
		else{
		
     $output .=  "<tr><td><input type = 'checkbox' class='check_perm'  name = 'empList[]' value = '{$row2['empId']}' /></td>"."<td><center>{$row2['workHours']}</center></td>".
	 '<td><img style=" border-radius: 50%;" src="' .$row2['image'] .'" width="40px" height="40px"  />' .$row2['empName'] .'</td>'."<td>";
		}
$query2 = "SELECT * FROM rolls  WHERE empId='".$row2['empId']."'";  
					 $result = mysqli_query($connect, $query2);
          $output .= '  <ul style="list-style-type:square">';
			
                     while($row = mysqli_fetch_array($result))
                     {
				$output .= '<li>'.$row['rollName'].' <b>('.$row['experience'].' years)</b></li>';
					 } 
		$output .= '  </ul></td> ';
	  
	 
	 
	 
	 
                
	 }}
    $output .= '</tbody></table>';
    echo $output;
	
?>	
 	

 
   
</div></div></div>
<div class="row">
<div class="col-lg-11"  >
	 		  <input type="hidden" name="proj_id" id="proj_id"  class="form-control">
			  <input type="hidden" name="projId" id="projId" value="<?php echo $_GET["projId"];?>" class="form-control">
			   <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success pull-right" />
			    </div> 
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
         <div class="modal-body" >
          <div id="employee_detail">   </div>
		  <div id="employee_detail22">   </div>
		 </div>
		 
		 
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>



 




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



	
				
				
	<script src="js/taskScript.js "></script>	

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
         <div class="modal-body" >
		 <div id="task_detail">   </div><br>
         
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
<script type="text/javascript" src="../js/loader.js"></script>	
<script src="js/projManagerScript.js"></script>