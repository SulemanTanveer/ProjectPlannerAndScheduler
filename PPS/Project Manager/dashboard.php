<?php   
 session_start();  
 date_default_timezone_set('Asia/Karachi');

include('checkSession.php'); 
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate"); // HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0

?>
 <!DOCTYPE html>
<html lang="en">

<head>
       
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
			<meta http-equiv="Pragma" content="no-cache">
		<title>PPS</title>

		<!-- Bootstrap Core CSS -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom CSS -->
		<link href="../css/sb-admin.css" rel="stylesheet">

		<!-- Morris Charts CSS -->
		<link href="../css/plugins/morris.css" rel="stylesheet">

		<!-- Custom Fonts -->
		<link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

		<link rel="stylesheet" href="../css/badge.css">
		    <!-- jQuery -->
			<script src="../js/jquery.js"></script>
		<link rel="stylesheet" href="../css/dataTables.bootstrap.min.css" />  
		<link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.css">
	    <link rel="stylesheet" href="../css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="../css/dataTables.bootstrap.min.css">
		<link rel="stylesheet" href="../css/fixedHeader.bootstrap.min.css">
		<link rel="stylesheet" href="../css/responsive.bootstrap.min.css">
		<link rel="stylesheet" href="../css/badge.css">
		
	     
		<script src="../js/jquery.dataTables.min.js"></script>  
		<script src="../js/dataTables.bootstrap.min.js"></script>            
		<script src="../js/dataTables.fixedHeader.min.js"></script> 
		<script src="../js/dataTables.responsive.min.js"></script>
		 
		<script src="../js/responsive.bootstrap.min.js"></script>
	
		
		
		
		
		
		
		
	
		<!-- Morris Charts JavaScript -->
		<script src="../js/plugins/morris/raphael.min.js?<?php echo time(); ?>"></script>
		<script src="../js/plugins/morris/morris.min.js?<?php echo time(); ?>"></script>
		<script src="../js/plugins/morris/morris-data.js?<?php echo time(); ?>"></script>

		<!-- Flot Charts JavaScript -->
		<!--[if lte IE 8]><script src="js/excanvas.min.js"></script><![endif]-->
		<script src="../js/plugins/flot/jquery.flot.js?<?php echo time(); ?>"></script>
		<script src="../js/plugins/flot/jquery.flot.tooltip.min.js?<?php echo time(); ?>"></script>
		<script src="../js/plugins/flot/jquery.flot.resize.js?<?php echo time(); ?>"></script>
		<script src="../js/plugins/flot/jquery.flot.pie.js?<?php echo time(); ?>"></script>
		<script src="../js/plugins/flot/flot-data.js?<?php echo time(); ?>"></script>
		<!-- Bootstrap Core JavaScript -->
		<script src="../js/bootstrap.min.js?<?php echo time(); ?>"></script>
     
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
                    <li class="active">
                        <a href="dashboard.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
					<li >
                        <a href="staff.php"><i class="fa fa-fw fa-briefcase"></i> Staff</a>
                    </li>
                     <li >
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
                            Dashboard <small>Statistics Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
               
              
               

                
							   <div class="row">
                     <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i> Employees Statistics</h3>
                            </div>
                            <div class="panel-body">
							<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <?php
 $language_name=array();
$language_count=array();
 $proj_language_name=array();
$proj_language_count=array();
 $team_name=array();
$team_count=array();
 $proj_cost=array();
$proj_cost_name=array();

$query02 = "select * from team WHERE   teamStatus='Active'";
$result02 = mysqli_query($connect,$query02);
$count02 = mysqli_num_rows($result02);
 
$query03 = "select * from team WHERE   teamStatus='In-Active'";
$result03 = mysqli_query($connect,$query03);
$count03 = mysqli_num_rows($result03);
 
$query04 = "select * from team ";
$result04 = mysqli_query($connect,$query04);
$count04 = mysqli_num_rows($result04);





$query22 = "select * from project WHERE   projStatus='Pending'";
$result22 = mysqli_query($connect,$query22);
$count12 = mysqli_num_rows($result22);
 
$query33 = "select * from project WHERE   projStatus='Completed'";
$result33 = mysqli_query($connect,$query33);
$count135 = mysqli_num_rows($result33);
 
$query44 = "select * from project WHERE   projStatus='Not Started'";
$result44= mysqli_query($connect,$query44);
$count14 = mysqli_num_rows($result44);

$query55 = "select * from project WHERE   projStatus='In-Progress'";
$result55 = mysqli_query($connect,$query55);
$count15 = mysqli_num_rows($result55);
	
$query2 = "select * from employee WHERE   workStatus='Active'";
$result2 = mysqli_query($connect,$query2);
$count1 = mysqli_num_rows($result2);
 
$query3 = "select * from employee WHERE   workStatus='In-Active'";
$result3 = mysqli_query($connect,$query3);
$count2 = mysqli_num_rows($result3);
 
$query3 = "select * from employee WHERE   workStatus='On Leave'";
$result3 = mysqli_query($connect,$query3);
$count11 = mysqli_num_rows($result3);
 
$query8 = "select * from employeeroles WHERE roleId='1'";
$result8= mysqli_query($connect,$query8);
$count3 = mysqli_num_rows($result8);
 

$query3 = "select * from employeeroles WHERE roleId='2'";
$result3 = mysqli_query($connect,$query3);
$count4 = mysqli_num_rows($result3);
 

$query4 = "select * from employeeroles WHERE roleId='3'";
$result4 = mysqli_query($connect,$query4);
$count5 = mysqli_num_rows($result4);
 
$query5= "select * from employeeroles WHERE roleId='4'";
$result5 = mysqli_query($connect,$query5);
$count6 = mysqli_num_rows($result5);
 
$query6 = "select * from employeeroles WHERE roleId='5'";
$result6 = mysqli_query($connect,$query6);
$count7 = mysqli_num_rows($result6);
 
$query7 = "select * from employeeroles WHERE roleId='6'";
$result7 = mysqli_query($connect,$query7);
$count8 = mysqli_num_rows($result7);
 
$query = "select * from language ";
$result = mysqli_query($connect,$query);
while($row=mysqli_fetch_array($result)){
     $lan_id=$row['languageId'];
$query13 = "select * from employeelanguage WHERE   languageId='$lan_id'";
$result13 = mysqli_query($connect,$query13);
$count13 = mysqli_num_rows($result13);
	
}


$query144 = "select * from language";
$result144 = mysqli_query($connect,$query144);
$j=0;
 while($row144 = mysqli_fetch_array($result144)){
        $id=$row144['languageId'];
		$language_name[$j]=$row144['languageName'];
		
$query14 = "select * from employeelanguage WHERE   languageId='$id'";
$result14 = mysqli_query($connect,$query14);
$count14 = mysqli_num_rows($result14);
 $language_count[$j]=$count14 ;
 $j++;
 }
 
$query145 = "select * from language";
$result145 = mysqli_query($connect,$query145);
$j=0;
 while($row145 = mysqli_fetch_array($result145)){
        $id=$row145['languageId'];
		$proj_language_name[$j]=$row145['languageName'];
		
$query146 = "select * from project WHERE   languageId='$id'";
$result146 = mysqli_query($connect,$query146);
$count146 = mysqli_num_rows($result146);
 $proj_language_count[$j]=$count146 ;
 $j++;
 }
 
 
 
 
 
 
 
$query149 = "select * from team";
$result149 = mysqli_query($connect,$query149);
$j=0;
 while($row149 = mysqli_fetch_array($result149)){
        $id=$row149['teamId'];
		$team_name[$j]=$row149['teamName'];
		
$query1466 = "select * from project WHERE   teamId='$id' and projStatus='Completed'";
$result1466 = mysqli_query($connect,$query1466);
$count1466 = mysqli_num_rows($result1466);
 $team_count[$j]=$count1466 ;
 $j++;
 }
 
 
 
 $query000 = "select * from project WHERE   projStatus='Completed'";
$result000 = mysqli_query($connect,$query000);
 $j=0;
 while($row000 = mysqli_fetch_array($result000)){
        $id=$row000['projId'];
		$proj_cost_name[$j]=$row000['projName'];
		
  $query001 = "select * from metric WHERE   pID='$id' and type='actual'";
$result001 = mysqli_query($connect,$query001);
$row001= mysqli_fetch_array($result001);
 $mid=  $row001['mID'];
 $query002 = "select * from actualmetrics WHERE   mID='$mid'  ";
$result002 = mysqli_query($connect,$query002);
$row002= mysqli_fetch_array($result002)  ;  
 $proj_cost[$j]=$row002['cost'];

$j++;
 }
 
 
 
 
 
 
?>
	
	
	<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      
	    google.charts.setOnLoadCallback(drawChart2);
		 google.charts.setOnLoadCallback(drawChart3);
      google.charts.setOnLoadCallback(drawChart4);
	  
     function drawChart4() {
        var data = google.visualization.arrayToDataTable([
	  ['Task', 'Hours per Day'],	<?php
		for($i=0;$i<sizeof($proj_language_name);$i++)
		{
			
			
		echo 	 "['".$proj_language_name[$i]."',".$proj_language_count[$i]."],";
			
			
			
			
		}		
        
        
		  
		  
		  ?>
        ]);

        var options = {
          title: 'Project Language Statistics',
		   pieSliceText: "value",
         is3D: true,
		   height:370,
		  width:450
        };

        var chart = new google.visualization.PieChart(document.getElementById('proj_piechart_3d'));
        chart.draw(data, options);
      }
	
	 function drawChart2() {
        var data = google.visualization.arrayToDataTable([
	  ['Task', 'Hours per Day'],	<?php
		for($i=0;$i<sizeof($language_name);$i++)
		{
			
			
		echo 	 "['".$language_name[$i]."',".$language_count[$i]."],";
			
			
			
			
		}		
        
        
		  
		  
		  ?>
        ]);

        var options = {
          title: 'Employees Language Statistics',
		   pieSliceText: "value",
         is3D: true,
		   height:370,
		  width:450
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
	
	
	 function drawChart3() {
        var data = google.visualization.arrayToDataTable([
          ["Task", "Hours per Day"],
          ["System Analys",  <?php echo $count3 ?> ],
            
          ["Database Designer", <?php echo$count4 ?> ] 
          ,
            
          ["Programmer",  <?php echo$count5 ?> ] ,
            
          ["Tester",  <?php echo$count6 ?> ] ,
            
          ["Web Developer",  <?php echo$count7 ?> ] ,
            
          ["App Developer", <?php echo $count8 ?> ]   
       


	   ]);

        var options = {
          title: 'Employees Roles Statistics',
         is3D: true, 
		 pieSliceText: "value",
		  height:370,
		  width:450
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_1'));
        chart.draw(data, options);
      }
	
	
	</script>
     <div class="row">
      <div class="col-lg-4">
    <div id="piechart_1"   ></div>
  
			 </div> 
		 <div class="col-lg-4">
     <div id="piechart_3d"   ></div>
  
  
			 </div>   	 
		 <div class="col-lg-1">
    
  
  
			 </div>    
			   <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-2">
                                        <i class="fa fa-user fa-3x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $count1; ?></div>
                                        <div>Active Employees!</div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                  
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-2">
                                        <i class="fa fa-user-times fa-3x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $count2; ?></div>
                                        <div>In-Active Employees!</div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-2">
                                        <i class="fa fa-user-o fa-3x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                       
                                        <div class="huge"><?php echo $count11; ?></div><div>On Leave Employees!</div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
			 </div>				    
                              
								
								
								
                                
                            </div>
                        </div>
                    </div>
               </div>
				<div class="row">
                     <div class="col-lg-12">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i> Project Statistics</h3>
                            </div>
                            <div class="panel-body">
							 <div class="row">
								  <div class="col-lg-4">
								<div id="proj_piechart_3d"   ></div>
							  </div> 

                                <div class="col-lg-5">
								<script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
		 ['Project', 'Cost' ],  
	<?php
	  	for($i=0;$i<sizeof($proj_cost_name);$i++)
		{
			
			
		echo 	 "['".$proj_cost_name[$i]."',".$proj_cost[$i]."],";
			
			
			
			
		}		
         
          
        
		 ?>
		]);

        var options = {
          chart: {
            title: 'Projects Cost' 
          } 
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material1'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script> 			 <div id="columnchart_material1" style="width:440px; height: 350px;"></div>
						 
								 
								 
							  </div> 
					<div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-2">
                                        <i class="fa fa-check fa-3x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $count135; ?></div>
                                        <div>Completed Projects!</div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                  
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-2">
                                        <i class="fa fa-times fa-3x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $count12; ?></div>
                                        <div>Pending Projects!</div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-2">
                                        <i class="fa fa-spinner fa-3x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                       
                                        <div class="huge"><?php echo $count15; ?></div>
										<div>In Progress!</div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
						
						
						   <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-2">
                                        <i class="fa fa-crosshairs fa-3x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $count14; ?></div>
                                        <div>(Assign)Not Started!</div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
















							  
							  </div> 

							
							    </div>
                        </div>
                    </div>
                
				</div>	
								
					
	<div class="row">
                     <div class="col-lg-12">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i> Team Statistics</h3>
                            </div>
                            <div class="panel-body">
 
						<div class="col-lg-9 "> 
						
						<script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
		 ['Team', 'Completed Projects' ],
	<?php
		for($i=0;$i<sizeof($team_name);$i++)
		{
			
			
		echo 	 "['".$team_name[$i]."',".$team_count[$i]."],";
			
			
			
			
		}		
         
          
        
		?>
		]);

        var options = {
          chart: {
            title: 'Team Performance',
            subtitle: 'Projects Completed by Team',
          },
		    colors: ['#1b9e77']
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
						
						 <div id="columnchart_material" style="width: 750px; height: 350px;"></div>
						
						</div>
 
					<div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-2">
                                        <i class="fa fa-check fa-3x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $count04; ?></div>
                                        <div>Total Teams!</div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                  
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-2">
                                        <i class="fa fa-times fa-3x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $count02; ?></div>
                                        <div>Active Teams!</div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-2">
                                        <i class="fa fa-spinner fa-3x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                       
                                        <div class="huge"><?php echo $count03; ?></div>
										<div>In-Active Teams</div>
                                    </div>
                                </div>
                            </div>
                           
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

   


</body>

</html>   <div id="messageDetails" class="modal fade">
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