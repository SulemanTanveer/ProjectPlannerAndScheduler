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
                            SubTask <small>SubTasks Overview</small>
                        </h1>
                         <?php
				   $query = "SELECT projId FROM task WHERE taskId='".$_GET["taskId"]."'"; 
					$result = mysqli_query($connect, $query);
					$row5 = mysqli_fetch_array($result); 
						?>
						<ol class="breadcrumb">
                            <li>
                                <i class="fa fa-clipboard"></i>  <a href="project.php">Projects</a>
                            </li>
                            <li  >
                                 <i class="fa fa-pencil"></i> <a href="http://localhost/PPS/Developer/task.php?projId=<?php echo $row5['projId'];?>">Tasks</a>
                            </li>
							 <li class="active">
                                 <i class="fa fa-pencil"></i> SubTasks
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
											  $select_query23 = "SELECT * FROM taskassignment WHERE taskId = '".$_GET["taskId"]."' AND empId='".$_SESSION['id']."' ";  
												 $result23 = mysqli_query($connect, $select_query23);
														while($row23 = mysqli_fetch_array($result23))  {
													
													
													 $select_query233 = "SELECT * FROM task WHERE taskId = '".$row23["taskId"]."'";  
												 $result233 = mysqli_query($connect, $select_query233);
												 
												 while($row233 = mysqli_fetch_array($result233))  {
													
													
													 $select_query2 = "SELECT * FROM subtask WHERE taskId = '".$row233["taskId"]."'";  
												 $result2 = mysqli_query($connect, $select_query2);
												 while($row2 = mysqli_fetch_array($result2))  {
											   
														$count1++;
														}}}
														
														
														$select_query23 = "SELECT * FROM taskassignment WHERE taskId = '".$_GET["taskId"]."' AND empId='".$_SESSION['id']."' ";  
												 $result23 = mysqli_query($connect, $select_query23);
														while($row23 = mysqli_fetch_array($result23))  {
													
													
													 $select_query233 = "SELECT * FROM task WHERE taskId = '".$row23["taskId"]."'";  
												 $result233 = mysqli_query($connect, $select_query233);
												 
												 while($row233 = mysqli_fetch_array($result233))  {
													
													
													 $select_query2 = "SELECT * FROM subtask WHERE taskId = '".$row233["taskId"]."' AND subtaskStatus ='Completed'";  
												 $result2 = mysqli_query($connect, $select_query2);
												 while($row2 = mysqli_fetch_array($result2))  {
											   
														$count2++;
														}}}
											  	$select_query23 = "SELECT * FROM taskassignment WHERE taskId = '".$_GET["taskId"]."' AND empId='".$_SESSION['id']."' ";  
												 $result23 = mysqli_query($connect, $select_query23);
														while($row23 = mysqli_fetch_array($result23))  {
													
													
													 $select_query233 = "SELECT * FROM task WHERE taskId = '".$row23["taskId"]."'";  
												 $result233 = mysqli_query($connect, $select_query233);
												 
												 while($row233 = mysqli_fetch_array($result233))  {
													
													
													 $select_query2 = "SELECT * FROM subtask WHERE taskId = '".$row233["taskId"]."' AND subtaskStatus ='In-Progress'";  
												 $result2 = mysqli_query($connect, $select_query2);
												 while($row2 = mysqli_fetch_array($result2))  {
											   
														$count3++;
														}}}
														$select_query23 = "SELECT * FROM taskassignment WHERE taskId = '".$_GET["taskId"]."' AND empId='".$_SESSION['id']."' ";  
												 $result23 = mysqli_query($connect, $select_query23);
														while($row23 = mysqli_fetch_array($result23))  {
													
													
													 $select_query233 = "SELECT * FROM task WHERE taskId = '".$row23["taskId"]."'";  
												 $result233 = mysqli_query($connect, $select_query233);
												 
												 while($row233 = mysqli_fetch_array($result233))  {
													
													
													 $select_query2 = "SELECT * FROM subtask WHERE taskId = '".$row233["taskId"]."' AND subtaskStatus ='Not Started'";  
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
									
                                        	<div class="huge"id="tt"><?php echo $count1?></div> 
                                        <div>Total SubTasks</div>
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
										<div class="huge"id="ct"><?php echo $count2?></div> 
                                        
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
                                       	<div class="huge"id="in_prog"><?php echo $count3?></div> 
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
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-times fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
									
										<div class="huge"id="nt_st"><?php echo $count4?></div> 
                                        
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
                                <h3 class="panel-title"></i>SubTasks</h3>
                            </div>
                            <div class="panel-body">
                                
<!-- /.row -->
								<div id="employee_table">	
								<!-- /.row -->
					                
					 
						<?php
						$query = "SELECT projId FROM task WHERE taskId='".$_GET["taskId"]."'  "; 
					$result = mysqli_query($connect, $query);
					while($row = mysqli_fetch_array($result))  {
						?>
						
						 
						
					<?php 
					}
					
					?>
						
						</div> </div>
                   
	<table id="example99" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
            <tr> 
			
			         <th>Id</th>
                       <th>Name</th>
					<th>Start Date</th>
					<th><center>Status</center></th>
					<th>Deadline</th>
					<th ><center>Actions</center></th>
						
                  </tr>
        </thead>
        
        <tbody>
		 <?php
		include("config.php");
 
				
		 $select_query23 = "SELECT * FROM taskassignment WHERE taskId = '".$_GET["taskId"]."' AND empId='".$_SESSION['id']."' ";  
     $result23 = mysqli_query($connect, $select_query23);
		    while($row23 = mysqli_fetch_array($result23))  {
		
		
		 $select_query233 = "SELECT * FROM task WHERE taskId = '".$row23["taskId"]."'";  
     $result233 = mysqli_query($connect, $select_query233);
	 
     while($row233 = mysqli_fetch_array($result233))  {
		
		
		 $select_query2 = "SELECT * FROM subtask WHERE taskId = '".$row233["taskId"]."' and empId='".$_SESSION['id']."'";  
     $result2 = mysqli_query($connect, $select_query2);
     while($row2 = mysqli_fetch_array($result2))  {
   
   
                   
                     ?>
                  <tr>   <td><?php echo $row2["subtaskId"]; ?></td>
                      <td><?php echo $row2["subtaskName"]; ?></td>
					  <td><?php echo $row2["startDate"]; ?></td>
                     
					 <td ><center><?php 
					 if($row2["subtaskStatus"]=='Completed')
					 {
					 echo '<p   class="'.$row2["subtaskId"].'" style="background-color: #00D211; color:white">'.$row2["subtaskStatus"].'</p>'; 
					 }
					 else  if($row2["subtaskStatus"]=='In-Progress'){
						 echo '<p  class="'.$row2["subtaskId"].'"  style="background-color: #FDC305; color:white">'.$row2["subtaskStatus"].'</p>'; 
					 }
					 else if($row2["subtaskStatus"]=='Not Started'){
						 echo '<p   class="'.$row2["subtaskId"].'" style="background-color: #FE0000; color:white">'.$row2["subtaskStatus"].'</p>'; 
					 }
					 else if($row2["subtaskStatus"]=='Pending'){
						 echo '<p   class="'.$row2["subtaskId"].'" style="background-color: #428bca; color:white">'.$row2["subtaskStatus"].'</p>'; 
					 }
					 
					 ?> </center></td>
                     <td><?php echo $row2["deadline"]; ?></td>
				<td>
				   <center>
<?php
					   if(($row2["actualStartDate"]=='0000-00-00 00:00:00')&&$row2["actualCompletionDate"]=='0000-00-00 00:00:00')
					   {?>
						  <button name="start" title='Start Task' value="start" id="<?php echo $row2["subtaskId"]; ?>" class="btn btn-info btn-xs start1" ><i  class="fa fa-play"></i> Start</button> 
                       <button   name="done" title='Submit Task' value="done" id="<?php echo $row2["subtaskId"]; ?>" class="btn btn-success btn-xs done1" disabled><i  class="fa fa-check"></i> Done</button> 
                    
						   
					   <?php
					   }
					   else if(($row2["actualStartDate"]!='0000-00-00 00:00:00')&& $row2["actualCompletionDate"]=='0000-00-00 00:00:00')
					   {
						   ?>
						   <button name="start" title='Task Started' value="start" id="<?php echo $row2["subtaskId"]; ?>" class="btn btn-info btn-xs start1" disabled><i  class="fa fa-play"></i> Start</button> 
                       <button   name="done" value="done" title='Submit Task' id="<?php echo $row2["subtaskId"]; ?>" class="btn btn-success btn-xs done1" ><i  class="fa fa-check"></i> Done</button> 
                    
						   
					  <?php }  
					   else if(($row2["actualStartDate"]!='0000-00-00 00:00:00')&& $row2["actualCompletionDate"]!='0000-00-00 00:00:00')
					   { ?>
						   <button name="start"  title='Task Completed' value="start" id="<?php echo $row2["subtaskId"]; ?>" class="btn btn-info btn-xs start1" disabled><i  class="fa fa-play"></i> Start</button> 
                       <button   name="done" value="done" title='Task Completed' id="<?php echo $row2["subtaskId"]; ?>" class="btn btn-success btn-xs done1" disabled><i  class="fa fa-check"></i> Done</button> 
                    
						   
					 <?php  }
					   ?>
					   
				   
				   
				   

				   <button type="button" name="file" value="files" id="<?php echo $row2["subtaskId"]; ?>" class="btn btn-default btn-xs file_data3" ><i  class="fa fa-paperclip"></i> Files</button> 
                    <button type="button" name="view" value="view" id="<?php echo $row2["subtaskId"]; ?>" class="btn btn-warning btn-xs view_dataaa" ><i  class="fa fa-search-plus"></i> View</button>
                    
                 
					 
					</center>
					  
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
  

    <!-- Morris Charts JavaScript -->
    
</body>

</html>

 <!-- Model Form -->
<div id="add_data_Modal" class="modal fade">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header" style=" background-color: #00C851;color:white;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
             <center><h4><span class="fa fa-pencil"></span> Create Subtask</h4></center>
         </div>
         <div class="modal-body">
           
		    <form method="post" id="insert_form3">
         <div class="row">
			   <div class="main col-lg-12 myHalfCol">
     <div class="col-lg-4">
	 <div class="panel panel-red">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i>Task Info</h3>
                            </div>
                            <div class="panel-body">
<label>SubTask Name</label>
<input type="text" name="subtaskName" placeholder="Enter Subtask Name"  id="subtaskName"  class="form-control" required>
               </br>
			   <label>Deadline</label>
<input type="date" name="deadline" id="deadline" class="form-control" required>
               </br>
			    <label class="ccc">Start Date</label>
<input type="date" name="startDate" id="startDate" class="form-control" required>
 <input type="hidden" name="curDate" id="curDate" value="<?php echo date("Y-m-d");  ?>" class="form-control" required>
 <input type="hidden" name="task_deadline" id="task_deadline" value="<?php $sql2="SELECT * FROM task WHERE taskId = '". $_GET["taskId"]."'";$result2 = mysqli_query($connect, $sql2);$row = mysqli_fetch_array($result2);echo $row["deadline"]; ?>" class="form-control">
<input type="hidden" name="task_startdate" id="task_startdate" value="<?php $sql2="SELECT * FROM task WHERE taskId = '". $_GET["taskId"]."'";$result2 = mysqli_query($connect, $sql2);$row = mysqli_fetch_array($result2);echo $row["startDate"];?>" class="form-control">
	<input type="hidden" name="task_workhours" id="task_workhours" value="<?php $sql2="SELECT * FROM task WHERE taskId = '". $_GET["taskId"]."'";$result2 = mysqli_query($connect, $sql2);$row = mysqli_fetch_array($result2);echo $row["workHours"];?>" class="form-control">
              
			  </br>
			    
			  <label>Work Hours</label>
			  
    
    
   <input type="number" id="workHours"name="workHours" class="form-control" value="0" min="0" max="8">
      <input type="hidden" id="countsaturdays" name="countsaturdays" value='0'class="form-control" >
	    <input type="hidden" id="workingdays" name="workingdays" value='0'class="form-control" >
			    <input type="hidden" id="deadlineCheck" name="deadlineCheck" value='0' class="form-control" >
  <input name='saturadayCheck' id='saturadayCheck' style='width:15px;height:15px' type='checkbox' disabled> <b>Include Saturday</b> 
			  </br>
 
			 
 
			  </br>
			   <label>SubTask Status</label>
			   <select name="subtaskStatus" id="subtaskStatus" class="form-control" required>
			   <option value="Pending">Pending</option>
			   <option value="In-Progress">In-Progress</option>
				<option value="Complete">Complete</option>
			  			  
			  </select>
               </br>
			<label>Predecessors</label>  
			   
			   
			    <?php
      include("config.php");

         $query = "SELECT* FROM subtask WHERE taskId  = '".$_GET["taskId"]."'";  
  $result = mysqli_query($connect, $query);
    ?>
   <select  class="form-control"id="selectShift" name="selectShift[]" multiple="multiple">
  
   <?php
     while($row = mysqli_fetch_array($result))
     { 
    ?>

   <option name="dependency[]" id ="<?php echo $row['subtaskId']; ?>"  value="<?php echo $row['subtaskId']; ?>">
	<?php echo $row['subtaskName']; ?></option>
    <?php
        }
    ?>
    </select><br>
			
			      <label>Attach Files</label> <br><label class="btn btn-default btn-file">
					Attach Files <i class="fa fa-paperclip"></i>
					<input type="file" name="filei[]" id="select_image" style="display: none;" >
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


	
	  $output = '';
	$output .= ' <table id="example8" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
	<thead>
            <tr>
                <th></th>
				 
				  <th>W.H Left</th>

                <th>Name</th>
                 <th>Role</th>
              
                
            </tr>
        </thead><tbody>';
		 
		 
		 
 $query = "SELECT* FROM taskassignment WHERE taskId = '".$_GET["taskId"]."'";  
  $result = mysqli_query($connect, $query);
  $counting=mysqli_num_rows($result);
  		 
  while($row = mysqli_fetch_array($result))
     {        
  
	  $sql2="SELECT * FROM employee WHERE empId = '".$row['empId']."'";  
     $result2 = mysqli_query($connect, $sql2);
	  while ($row2=mysqli_fetch_array($result2)) {
		
		 if($counting>1){
     $output .=  "<tr><td><input type = 'radio' class='check_perm' name = 'empList' value = '{$row2['empId']}' /></td>"."<td><center>{$row2['workHours']}</center></td>".'<td><img style=" border-radius: 50%;" src="' .$row2['image'] .'" width="40px" height="40px"  />' .$row2['empName'] .'</td>'.
	 
		 "<td>";
		 }
		 else{
			  $queryaa = "SELECT* FROM task  WHERE taskId = '".$row["taskId"]."'";  
			 $resultaa = mysqli_query($connect, $queryaa);
			 $row = mysqli_fetch_array($resultaa);
			 $query888  = "SELECT SUM(workHours)  AS value_sum1 FROM  subtask WHERE taskId= '".$row["taskId"]."'";
		 $result888 = mysqli_query($connect, $query888); 
		 $row888 = mysqli_fetch_array($result888);
		
			$val= $row2['workHours'] +$row['workHours'];
			 $val=$val-$row888['value_sum1'];
			 
			 if($val==0){
			  $output .=  "<tr><td><input type = 'radio' class='check_perm' name = 'empList' value = '{$row2['empId']}' disabled></td>"."<td><center>{$val}</center></td>".'<td><img style=" border-radius: 50%;" src="' .$row2['image'] .'" width="40px" height="40px"  />' .$row2['empName'] .'</td>'.
	 	 "<td>";
			 }
			 else{
				  $output .=  "<tr><td><input type = 'radio' class='check_perm' name = 'empList' value = '{$row2['empId']}' /></td>"."<td><center>{$val}</center></td>".'<td><img style=" border-radius: 50%;" src="' .$row2['image'] .'" width="40px" height="40px"  />' .$row2['empName'] .'</td>'.
	 	 "<td>";
				 
			 }
		 
		 
		 }
		 
	 $query2 = "SELECT * FROM rolls  WHERE empId='".$row2['empId']."'";  
					 $result1 = mysqli_query($connect, $query2);
            
                     while($row = mysqli_fetch_array($result1))
                     {
					$output .= ''.$row['rollName'].' <b>('.$row['experience'].' years)</b><br>';
					 } 

	 
	 
	 
	 $output .=  "</td></tr>";
                
	  
	 }
	 
	 }
    $output .= '</tbody></table>';
    echo $output;
	
?>				
	<script src="js/subtaskScript.js"></script>
   
</div></div></div> 
<div class="row">
<div class="col-lg-12"  >
	 		  <input type="hidden" name="proj_id" id="proj_id"  class="form-control">
			  <input type="hidden" name="taskId" id="taskId" value="<?php echo $_GET["taskId"];?>" class="form-control">
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
   <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header" style=" background-color: #546e7a  ;color:white;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
           <center> <h4 class="modal-title"><span class="fa fa-pencil"></span>&nbsp&nbsp Subask Details</h4> </center>
         </div>
         <div class="modal-body" id="employee_detail">
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>









 <!-- Model Form -->
 <!-- Model Form -->
<div id="edit_data_Modal2" class="modal fade">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header" style=" background-color:#0088CC;color:white;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
             <center><h4><span class="fa fa-pencil"></span> Edit Subask</h4></center>
         </div>
         <div class="modal-body">
           
		   
         <div class="row">
			   <div id='uuu' class="main col-lg-12 myHalfCol">
    
				</div>



	
				
				


		</div>
         <div class="modal-footer"><div class="col-xs-12">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>  </div> </div>
      </div>
   </div>
</div>

<div id="subtaskfiledataModal" class="modal fade">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" style=" background-color:#5cb85c;color:white;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
             <center><h4><span class="fa fa-paperclip"></span> Attach Files</h4></center>
         </div>
        
		 <form method="post" action="" id="file_form3">
              
			   
			 <div class="row">
               
			   
				 <div class="col-xs-9">
				 <div class="modal-body" id="subtask_file_detail">
						</div>
						 </div>
						<div class="col-xs-3">
			    <label>Attach Files</label> <br><label class="btn btn-default btn-file">
					Attach Files <i class="fa fa-paperclip"></i>
					<input type="file" name="filei[]" id="select_image2" style="display: none;" multiple>
				</label>
				  <br><br><input type="submit" name="insert2" id="insert2" value="Attach" class="btn btn-success" />
				
				   <input type="hidden" name="id3" id="id3"  />
					 <br><br><label id='file_label'></label><div id='file_data'></div>
				   
				 </form>
		
		  </div>
				 
				
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
         <div class="modal-body" id="project_detail">
		 
 
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