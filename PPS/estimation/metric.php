<?php  
 
 session_start();  
 include('../Project Manager/checkSession.php'); 
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
                <a class="navbar-brand" href="../Project Manager/dashboard.php">Project Manager Panel</a>
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
                            <a href="../Project Manager/inbox.php" onclick='return false;' >Read All Messages</a>
                        </li>
                    </ul>
                </li>
				   <li class="dropdown">
                    <a href="#"  id="checkBadge" class="dropdown-toggle" data-toggle="dropdown">
						<script src="../Project Manager/js/projManagerScript.js"></script>
							<link rel="stylesheet" href="../css/badge.css">
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
                            <a href="../Project Manager/notifications.php">View All Notifications</a>
                        </li>
                          
                    </ul>
					
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 
					<?php if(isset($_SESSION['username']))  
                {  
                 echo $_SESSION['name'];   
                 
                }  
                 ?><b class="caret"></b></a> 
				 
				 
				 <ul class="dropdown-menu">
                        <li>
                            <a href="../Project Manager/outbox.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="../Project Manager/inbox.php"><i class="fa fa-fw fa-arrow-down"></i> Inbox</a>
                        </li>
                        <li>
							<a href="../Project Manager/outbox.php"><i class="fa fa-fw fa-arrow-up"></i> Outbox</a>
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
                    
					 <li>
                        <a href="../Project Manager/dashboard.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
					<li >
                        <a href="../Project Manager/staff.php"><i class="fa fa-fw fa-briefcase"></i> Staff</a>
                    </li>
                     <li >
                        <a href="../Project Manager/project.php"><i class="fa fa-fw fa-clipboard"></i> Projects</a>
                    </li>
					 <li >
                        <a href="../Project Manager/team.php"><i class="fa fa-fw fa-users"></i> Team</a>
                    </li>
					 
					<li >
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo2"><i class="fa fa-fw fa-arrows-v"></i> Estimation <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo2" class="collapse">
                            <li>
                                <a href="FP.php">Function Point </a>
                            </li>
                            <li>
                                <a href="UCP.php">Use Case Point</a>
                            </li>
							 <li>
                                <a href="EE.php">Empirical Model</a>
                            </li>
							
							<li>
                                <a href="cocomo.php">Basic COCOMO Model </a>
                            </li>
							
                        </ul>
                    </li>
					<li class="active" >
                        <a href="metric.php"><i class="fa fa-calculator"></i>  Metrics</a>
                    </li>
					<li >
                        <a href="currency.php"><i class="fa fa-money"></i> Currency Converter</a>
                    </li>
					<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-envelope"></i> Messages<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                           
						   <li class="active">
							<a href="../Project Manager/inbox.php"><i class="fa fa-fw fa-arrow-down"></i> Inbox</a>
							</li>
                           
						  
                             <li>
							<a href="../Project Manager/outbox.php"><i class="fa fa-fw fa-arrow-up"></i> Outbox</a>
							</li>
                          
                        </ul>
                    </li>
					<li >
                        <a href="setting.php"><i class="fa fa-cogs" aria-hidden="true"></i> Settings</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

		<?php
		include("config.php");
		$query = "SELECT * FROM fp_metric";
											  
											   $result = mysqli_query($connect, $query);
														
										       $count1 = mysqli_num_rows($result);
		
		
		
										$query1 = "SELECT * FROM ucp_metric";
											  
											   $result1 = mysqli_query($connect, $query1);
														
										       $count2 = mysqli_num_rows($result1);
		
		
		$query2 = "SELECT * FROM ee_metric";
											  
											   $result2 = mysqli_query($connect, $query2);
														
										       $count3 = mysqli_num_rows($result2);
											   $query3 = "SELECT * FROM cocomo_metric";
											  
											   $result3 = mysqli_query($connect, $query3);
														
										       $count4 = mysqli_num_rows($result3);
		
		?>		
		
		
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Metrics <small>Metrics Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-clipboard"></i> Metrics
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">                              <div class="col-xs-3">
                                        <i class="fa fa-clipboard fa-5x"></i>
                                    </div>
                                    <div  class="col-xs-9 text-right">
									
									<?php

										
										

										        echo '<div id="fpNumber" class="huge">'. $count1.'</div>';
											
										?>
									
                                        
                                        <div>Function Point Metrics</div>
                                    </div>
                                </div>
                            </div>
                            <a  href="#" id="fpDetail" onclick="return false;" >
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
									<?php

										

										        echo '<div id="ucNumber" class="huge">'. $count2.'</div>';

										?>
                                        
                                        <div>UseCase Point Metrics</div>
                                    </div>
                                </div>
                            </div>
                            <a id="ucpDetail" href="#" onclick="return false;">
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
                                        <?php

		 								
												

										        echo '<div id="eeNumber" class="huge">'. $count3.'</div>';

										?>
                                        <div>Empirical Model Metrics</div>
                                    </div>
                                </div>
                            </div>
							
							
							
                            <a id="eeDetail" href="#" onclick="return false;">
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
                                        <i class="fa fa-spinner fa-5x" ></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php

		 								
											

										        echo '<div id="cocomoNumber" class="huge">'. $count4.'</div>';

										?>
                                        <div>Cocomo Model Metrics</div>
                                    </div>
                                </div>
                            </div>
							
							
							
                            <a id="cocomoDetail" href="#" onclick="return false;">
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
           
			  
				<div id="detail">
				
					
					 <div class="row">
                   <div class="col-lg-12">
						    <div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h3 class="panel-title"></i>Cost (Rupees)</h3>
                            </div>
                            <div class="panel-body">

 <ul id="costOption" style="list-style: none">

  <label class="checkbox-inline">
    <input  type="checkbox" name="costOption" value="1" checked="true" /> Actual</label>
  <label class="checkbox-inline">
    <input  type="checkbox" name="costOption" value="2" checked="true" /> FP</label>
  <label class="checkbox-inline">
    <input  type="checkbox" name="costOption" value="3" checked="true" /> UCP</label>
	 <label class="checkbox-inline"><input  type="checkbox" name="costOption" value="4" checked="true" /> EM</label>
	 <label class="checkbox-inline"><input  type="checkbox" name="costOption" value="5" checked="true" /> CM</label>
    
</ul>
 <div id="nodata" style="visibility:hidden">No any option is checked</div>
<div id="chart_div" class="chart"></div>
							</div>
							</div>
                       </div>
                </div>
					
					
					 <div class="row">
                   
                         <div class="col-lg-12">
						    <div class="panel panel-green" >
                            <div class="panel-heading">
                                <h3 class="panel-title"></i>Size (KLOC)</h3>
                            </div>
                            <div class="panel-body">

<ul id="sizeOption" style="list-style: none">

  <label class="checkbox-inline">
    <input  type="checkbox" name="sizeOption" value="1" checked="true" /> Actual</label>
  <label class="checkbox-inline">
    <input  type="checkbox" name="sizeOption" value="2" checked="true" /> FP</label>
  <label class="checkbox-inline">
    <input  type="checkbox" name="sizeOption" value="3" checked="true" /> UCP</label>
	 <label class="checkbox-inline"><input  type="checkbox" name="sizeOption" value="4" checked="true" /> EM</label>
	 <label class="checkbox-inline"><input  type="checkbox" name="sizeOption" value="5" checked="true" /> CM</label>
    
</ul>
 <div id="nodata_size" style="visibility:hidden">No any option is checked</div>
<div id="chart_div_size" class="chart"></div>
 </div>
							</div>
                       
                   </div>
                </div>
					
				
				
					 <div class="row">
                     <div class="col-lg-12">
                       
						    <div class="panel panel-yellow" >
                            <div class="panel-heading">
                                <h3 class="panel-title"></i>Effort (Person Month)</h3>
                            </div>
                            <div class="panel-body">
<ul id="effortOption" style="list-style: none">

  <label class="checkbox-inline">
    <input  type="checkbox" name="effortOption" value="1" checked="true" /> Actual</label>
  <label class="checkbox-inline">
    <input  type="checkbox" name="effortOption" value="2" checked="true" /> FP</label>
  <label class="checkbox-inline">
    <input  type="checkbox" name="effortOption" value="3" checked="true" /> UCP</label>
	 <label class="checkbox-inline"><input  type="checkbox" name="effortOption" value="4" checked="true" /> EM</label>
	 <label class="checkbox-inline"><input  type="checkbox" name="effortOption" value="5" checked="true" /> CM</label>
    
</ul>
 <div id="nodata_effort" style="visibility:hidden">No any option is checked</div>
<div id="chart_div_effort" class="chart"></div>
								
                            </div>
							</div>
                       
                   </div>
                </div>
					
					
					 <div class="row">
                    <div class="col-lg-12">
						    <div class="panel panel-red" >
                            <div class="panel-heading">
                                <h3 class="panel-title"></i>Duration (Months)</h3>
                            </div>
                            <div class="panel-body">
<ul id="durationOption" style="list-style: none">

  <label class="checkbox-inline">
    <input  type="checkbox" name="durationOption" value="1" checked="true" /> Actual</label>
  <label class="checkbox-inline">
    <input  type="checkbox" name="durationOption" value="2" checked="true" /> FP</label>
  <label class="checkbox-inline">
    <input  type="checkbox" name="durationOption" value="3" checked="true" /> UCP</label>
	 <label class="checkbox-inline"><input  type="checkbox" name="durationOption" value="4" checked="true" /> EM</label>
	 <label class="checkbox-inline"><input  type="checkbox" name="durationOption" value="5" checked="true" /> CM</label>
    
</ul>
 <div id="nodata_duration" style="visibility:hidden">No any option is checked</div>
<div id="chart_div_duration" class="chart"></div>

                            </div>
							</div>
                       
                   </div>
                </div>
					
				
				
				
				
				
				
			
				
			</div>

			<script>
			
					 $(document).on('click', '#fpDetail', function(){
    
    
   { 
    $.ajax({
      url:"fptable.php",
      method:"POST",
      data:{},
      success:function(data){
      
      $('#detail').html(data);
     
     
     
      }
   });
   
   $.ajax({
      url:"fpNumber.php",
      method:"POST",
      data:{},
      success:function(data){
      
      $('#fpNumber').html(data);
     
     
     
      }
   });
   
   
   
   
   
   
   
   
   
   }
  
    });
	 $(document).on('click', '#ucpDetail', function(){
    
    
   { 
    $.ajax({
      url:"ucptable.php",
      method:"POST",
      data:{},
      success:function(data){
      
      $('#detail').html(data);
     
     
     
      }
   });
   $.ajax({
      url:"ucNumber.php",
      method:"POST",
      data:{},
      success:function(data){
      
      $('#ucNumber').html(data);
     
     
     
      }
   });
   
   }
  
    });
	 $(document).on('click', '#eeDetail', function(){
    
    
   { 
    $.ajax({
      url:"eetable.php",
      method:"POST",
      data:{},
      success:function(data){
      
      $('#detail').html(data);
     
     
     
      }
   });
   $.ajax({
      url:"eeNumber.php",
      method:"POST",
      data:{},
      success:function(data){
      
      $('#eeNumber').html(data);
     
     
     
      }
   });
   
   }
  
    });
	 $(document).on('click', '#cocomoDetail', function(){
    
    
   { 
    $.ajax({
      url:"cocomotable.php",
      method:"POST",
      data:{},
      success:function(data){
      
      $('#detail').html(data);
     
     
     
      }
   });
   $.ajax({
      url:"cocomoNumber.php",
      method:"POST",
      data:{},
      success:function(data){
      
      $('#cocomoNumber').html(data);
     
     
     
      }
   });
   
   }
  
    });
   	
   	//delete Function point metric button //
	
	 $(document).on('click', '.delete_fpdata', function(){
     //$('#dataModal').modal();
	  
     var metric_id = $(this).attr("id");
	 
   if(confirm("Are you sure you want to delete this?")){ 
   
    $.ajax({
      url:"deleteFpMetric.php",
      method:"POST",
	  
	  async: false,
      data:{Metric_id:metric_id},
      success:function(data){
     
      $('#detail').html(data);
   
      }
   });
   
     $.ajax({
      url:"fpNumber.php",
      method:"POST",
      data:{},
      success:function(data){
      
      $('#fpNumber').html(data);
     
      }
   });
   
   
   }
   else 
   	return false;
    });
	
	///////////////delete ucp metric////////////////
	//delete use case point metric button //
	
	 $(document).on('click', '.delete_ucdata', function(){
     //$('#dataModal').modal();
     var metric_id = $(this).attr("id");
   if(confirm("Are you sure you want to delete this?")){ 
    $.ajax({
      url:"deleteUcMetric.php",
      method:"POST",
	  async: false,
      data:{Metric_id:metric_id},
      success:function(data){
     
      $('#detail').html(data);
   
      }
   });
   
     $.ajax({
      url:"ucNumber.php",
      method:"POST",
      data:{},
      success:function(data){
      
      $('#ucNumber').html(data);
     
      }
   });
   
   
   }
   else 
   	return false;
    });
	
	///////////////delete ee metric////////////////
	//delete ee metric button //
	
	 $(document).on('click', '.delete_eedata', function(){
     //$('#dataModal').modal();
     var metric_id = $(this).attr("id");
   if(confirm("Are you sure you want to delete this?")){ 
    $.ajax({
      url:"deleteEeMetric.php",
      method:"POST",
	  async: false,
      data:{Metric_id:metric_id},
      success:function(data){
     
      $('#detail').html(data);
   
      }
   });
   
     $.ajax({
      url:"eeNumber.php",
      method:"POST",
      data:{},
      success:function(data){
      
      $('#eeNumber').html(data);
     
      }
   });
   
   
   }
   else 
   	return false;
    });
	
	///////////////delete cocomo metric////////////////
	//delete cocomo metric button //
	
	 $(document).on('click', '.delete_cocomodata', function(){
     //$('#dataModal').modal();
     var metric_id = $(this).attr("id");
   if(confirm("Are you sure you want to delete this?")){ 
    $.ajax({
      url:"deleteCocomoMetric.php",
      method:"POST",
	  async: false,
      data:{Metric_id:metric_id},
      success:function(data){
     
      $('#detail').html(data);
   
      }
   });
   
     $.ajax({
      url:"cocomoNumber.php",
      method:"POST",
      data:{},
      success:function(data){
      
      $('#cocomoNumber').html(data);
     
      }
   });
   
   
   }
   else 
   	return false;
    });
	
	
</script>
			
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


<div id="dataModal" class="modal fade">
   <div class="modal-dialog modal-lg">
      <div class="modal-content ">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Metric Details</h4>
         </div>
         <div class="modal-body" id="metrics_detail">
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>


 
  <style>
  .chart {
  width: 100%; 
 
}
  </style>
 
 <!-- Cost comparison  Charts JavaScript starts from here -->
  
  
    
 <?php
include("config.php"); 
		$acost = array();
		$fpcost = array();
		$ucpcost = array();
		$eecost = array();
		$cmcost = array();
		$pname = array();
		
		$aduration = array();
		$fpduration = array();
		$ucpduration = array();
		$eeduration = array();
		$cmduration = array();
		$pnameD = array();
		
		$asize = array();
		$fpsize = array();
		$ucpsize = array();
		$eesize = array();
		$cmsize = array();
		$pnameS = array();
		
		$aeffort = array();
		$fpeffort = array();
		$ucpeffort = array();
		$eeeffort = array();
		$cmeffort = array();
		$pnameE = array();
		
		$query = "SELECT * FROM project Where projStatus='Completed'";
		$result = mysqli_query($connect, $query);
            $count=0;
                     while($row = mysqli_fetch_array($result))
					 
                     {
						 $pname[$count]=$row['projName'];
						 
						 
						 $query1 = "SELECT * FROM metric WHERE pID='{$row['projId']}' AND type='actual'";
						 $result1 = mysqli_query($connect, $query1);
						 $row1 = mysqli_fetch_array($result1);
						 
						 $query11 = "SELECT * FROM actualmetrics WHERE mID='{$row1['mID']}'";
						 $result11 = mysqli_query($connect, $query11);
						 $row11 = mysqli_fetch_array($result11);
						 if($row11['cost']>0)
						 {
						 $acost[$count]=$row11['cost'];
						 }
						 else
						 {
						 $acost[$count]=0;
						 }
						  if($row11['size']>0)
						 {
						 $asize[$count]=$row11['size'];
						 }
						 else
						 {
						 $asize[$count]=0;
						 }
						 
						  if($row11['effort']>0)
						 {
						 $aeffort[$count]=$row11['effort'];
						 }
						 else
						 {
						 $aeffort[$count]=0;
						 }
						 
						  
						 
						 if($row11['duration']>0)
						 {
						 $aduration[$count]=$row11['duration'];
						 }
						 else
						 {
						 $aduration[$count]=0;
						 }
						 
						 
						 
						 $query2 = "SELECT * FROM metric WHERE pID='{$row['projId']}' AND type='fp'";
						 $result2 = mysqli_query($connect, $query2);
						 $row2 = mysqli_fetch_array($result2);
						
						 $query22 = "SELECT * FROM fp_metric WHERE mID='{$row2['mID']}'";
						 $result22 = mysqli_query($connect, $query22);
						 $row22 = mysqli_fetch_array($result22);
						 
						  if($row22['cost']>0)
						 {
						 $fpcost[$count]=$row22['cost'];
						 }
						 else
						 {
						 $fpcost[$count]=0;
						 }
						 
						 
						  if($row22['size']>0)
						 {
						 $fpsize[$count]=$row22['size'];
						 }
						 else
						 {
						 $fpsize[$count]=0;
						 }
						 if($row22['effort']>0)
						 {
						 $fpeffort[$count]=$row22['effort'];
						 }
						 else
						 {
						 $fpeffort[$count]=0;
						 }
						 
						  if($row22['duration']>0)
						 {
						 $fpduration[$count]=$row22['duration'];
						 }
						 else
						 {
						 $fpduration[$count]=0;
						 }
						 
						 
						 
						 
						 
						 
						 $query3 = "SELECT * FROM metric WHERE pID='{$row['projId']}' AND type='ucp'";
						 $result3 = mysqli_query($connect, $query3);
						 $row3 = mysqli_fetch_array($result3);
						
						 $query33 = "SELECT * FROM ucp_metric WHERE mID='{$row3['mID']}'";
						 $result33 = mysqli_query($connect, $query33);
						 $row33 = mysqli_fetch_array($result33);
						 
						 if($row33['cost']>0)
						 {
						 $ucpcost[$count]=$row33['cost'];
						 }
						 else
						 {
						 $ucpcost[$count]=0;
						 }
						  if($row33['size']>0)
						 {
						 $ucpsize[$count]=$row33['size'];
						 }
						 else
						 {
						 $ucpsize[$count]=0;
						 }
						 
						 
						 
						 if($row33['effort']>0)
						 {
						 $ucpeffort[$count]=$row33['effort'];
						 }
						 else
						 {
						 $ucpeffort[$count]=0;
						 }
						 
						 
						 
						 
						 if($row33['duration']>0)
						 {
						 $ucpduration[$count]=$row33['duration'];
						 }
						 else
						 {
						 $ucpduration[$count]=0;
						 }
						 
						 
						
						 
						 
						 
						 
						 
						 
						 
						 
						 
						 $query4 = "SELECT * FROM metric WHERE pID='{$row['projId']}' AND type='ee'";
						 $result4 = mysqli_query($connect, $query4);
						 $row4 = mysqli_fetch_array($result4);
						
						 $query44 = "SELECT * FROM ee_metric WHERE mID='{$row4['mID']}'";
						 $result44 = mysqli_query($connect, $query44);
						 $row44 = mysqli_fetch_array($result44);
						 
						 if($row44['cost']>0)
						 {
						 $eecost[$count]=$row44['cost'];
						 }
						 else
						 {
						 $eecost[$count]=0;
						 }
						 
						 if($row44['size']>0)
						 {
						 $eesize[$count]=$row44['size'];
						 }
						 else
						 {
						 $eesize[$count]=0;
						 }
						 
						 if($row44['effort']>0)
						 {
						 $eeeffort[$count]=$row44['effort'];
						 }
						 else
						 {
						 $eeeffort[$count]=0;
						 }
						 
						 
						 if($row44['duration']>0)
						 {
						 $eeduration[$count]=$row44['duration'];
						 }
						 else
						 {
						 $eeduration[$count]=0;
						 }
						 
						 
						 
						 
						 
						 
						 
						 
						 $query5 = "SELECT * FROM metric WHERE pID='{$row['projId']}' AND type='cocomo'";
						 $result5 = mysqli_query($connect, $query5);
						 $row5 = mysqli_fetch_array($result5);
						
						 $query55 = "SELECT * FROM cocomo_metric WHERE mID='{$row5['mID']}'";
						 $result55 = mysqli_query($connect, $query55);
						 $row55 = mysqli_fetch_array($result55);
						 
						 if($row55['cost']>0)
						 {
						 $cmcost[$count]=$row55['cost'];
						 }
						 else
						 {
						 $cmcost[$count]=0;
						 }								
						 if($row55['size']>0)
						 {
						 $cmsize[$count]=$row55['size'];
						 }
						 else
						 {
						 $cmsize[$count]=0;
						 }	
						 
						 if($row55['effort']>0)
						 {
						 $cmeffort[$count]=$row55['effort'];
						 }
						 else
						 {
						 $cmeffort[$count]=0;
						 }
						 
						 if($row55['duration']>0)
						 {
						 $cmduration[$count]=$row55['duration'];
						 }
						 else
						 {
						 $cmduration[$count]=0;
						 }	
						 
						$count++;
					 }
	 
				
 
$output='';
$output='<script src="jsapi.js"></script>';
 $output.='<script>

google.load("visualization", "1", {packages: ["corechart"]});
google.setOnLoadCallback(drawChart);

function drawChart() {
  var data = google.visualization.arrayToDataTable([';
  
 $output.="['projects', 'Actual Cost', 'Function Point Cost', 'Use Case Point Cost','Empirical Model Cost','Cocomo Cost'],";
	
if(sizeof($pname)==0)
{
	$output.= "['',0,0,0,0,0,]";
	
}



	for( $i=0;$i<sizeof($pname);$i++)
		  {
		  $output.= "['". $pname[$i]."',".$acost[$i].','.$fpcost[$i].','.$ucpcost[$i].','.$eecost[$i].','.$cmcost[$i]."],";
		  }
	
	
	
	



 $output.="   ]);";
 $output.="showEvery = 1;
  var costOptionColors = ['purple','blue', 'green', 'orange','red'];
  var options = {
    strictFirstColumnType: true,
    colors: costOptionColors,
    width: '100%',
    height: '70%',
    'legend': {
      'position': 'right'
    },
    hAxis: {
      
     title: 'Projects',
      
    },
    vAxis: {
      viewWindowMode: 'explicit',
	  title: 'Rupees',
	
      viewWindow: {
       
        min: 0
      }
    },
    textStyle: {
      fontName: 'Ariel',
     
      bold: false
    },
    interpolateNulls: false,
    
    series: {
		
      1: {
        type: 'bars'
      },
	   2: {
        type: 'bars'
      },
	   0: {
        type: 'bars'
      }
	  ,
	   3: {
        type: 'bars'
      }
	  ,
	   4: {
        type: 'bars'
      }
	  
    },
    chartArea: {
      left: 40,
      top: 20
      
    }
  };

  var view = new google.visualization.DataView(data);
  var chart = new google.visualization.LineChart($('#chart_div')[0]);
  chart.draw(view, options);
  
		function resizeHandler () {
        chart.draw(view, options);
    }
    if (window.addEventListener) {
        window.addEventListener('resize', resizeHandler, false);
    }
    else if (window.attachEvent) {
        window.attachEvent('onresize', resizeHandler);
    }

  $('#costOption').find(':checkbox').change(function() {
    var cols = [0];
    var colors = [];
	var flag=false;
    options.costOption = null;
    $('#costOption').find(':checkbox:checked').each(function() {
      var value = parseInt($(this).attr('value'));
	    flag=true;
      cols.push(value);
      colors.push(costOptionColors[value - 1]);
	   options.series = {
			 1: {
        type: 'bars'
      },
	   2: {
        type: 'bars'
      },
	   0: {
        type: 'bars'
      }
	  ,
	   3: {
        type: 'bars'
      },
	   4: {
        type: 'bars'
      }
	  
		};
      
	  
    });
	if(flag==false)
	{";
$output.='
		 document.getElementById("nodata").style.visibility = "visible";
		 document.getElementById("chart_div").style.visibility = "hidden";
		
	}else{
		document.getElementById("nodata").style.visibility = "hidden";
		document.getElementById("chart_div").style.visibility = "visible";
    view.setColumns(cols);
    options.colors = colors;
    chart.draw(view, options);
	}
	
	
	
	
  });

 

}


</script>';


	  
  
echo $output;
 
  
  
  	?>
	
	<!-- Cost comparison  Charts JavaScript Ends from here -->
	
<!-- Size comparison  Charts JavaScript starts from here -->
	  
 <?php
include("config.php"); 
	
		
		
	 
				
 
$output='';
$output='<script src="jsapi.js"></script>';
 $output.='<script>

google.load("visualization", "1", {packages: ["corechart"]});
google.setOnLoadCallback(drawChart);

function drawChart() {
  var data = google.visualization.arrayToDataTable([';
  
 $output.="['projects', 'Actual size', 'Function Point size', 'Use Case Point size','Empirical Model size','Cocomo size'],";
	

if(sizeof($pname)==0)
{
	$output.= "['',0,0,0,0,0,]";
	
}


	for( $i=0;$i<sizeof($pname);$i++)
		  {
		  $output.= "['". $pname[$i]."',".$asize[$i].','.$fpsize[$i].','.$ucpsize[$i].','.$eesize[$i].','.$cmsize[$i]."],";
		  }
	
	
	
	



 $output.="   ]);";
 $output.="showEvery = 1;
  var sizeOptionColors = ['purple','blue', 'green', 'orange','red'];
  var options = {
    strictFirstColumnType: true,
    colors: sizeOptionColors,
    width: '100%',
    height: '70%',
    'legend': {
      'position': 'right'
    },
    hAxis: {
      
     title: 'Projects',
      
    },
    vAxis: {
      viewWindowMode: 'explicit',
	  title: 'KLOC',
      viewWindow: {
       
        min: 0
      }
    },
    textStyle: {
      fontName: 'Ariel',
     
      bold: false
    },
    interpolateNulls: false,
    
    series: {
		
      1: {
        type: 'bars'
      },
	   2: {
        type: 'bars'
      },
	   0: {
        type: 'bars'
      }
	  ,
	   3: {
        type: 'bars'
      }
	  ,
	   4: {
        type: 'bars'
      }
	  
    },
    chartArea: {
      left: 40,
      top: 20
      
    }
  };

  var view = new google.visualization.DataView(data);
  var chart = new google.visualization.LineChart($('#chart_div_size')[0]);
  chart.draw(view, options);
  
		function resizeHandler () {
        chart.draw(view, options);
    }
    if (window.addEventListener) {
        window.addEventListener('resize', resizeHandler, false);
    }
    else if (window.attachEvent) {
        window.attachEvent('onresize', resizeHandler);
    }

  $('#sizeOption').find(':checkbox').change(function() {
    var cols = [0];
    var colors = [];
	var flag=false;
    options.sizeOption = null;
    $('#sizeOption').find(':checkbox:checked').each(function() {
      var value = parseInt($(this).attr('value'));
	    flag=true;
      cols.push(value);
      colors.push(sizeOptionColors[value - 1]);
	   options.series = {
			 1: {
        type: 'bars'
      },
	   2: {
        type: 'bars'
      },
	   0: {
        type: 'bars'
      }
	  ,
	   3: {
        type: 'bars'
      },
	   4: {
        type: 'bars'
      }
	  
		};
      
	  
    });
	if(flag==false)
	{";
$output.='
		 document.getElementById("nodata_size").style.visibility = "visible";
		 document.getElementById("chart_div_size").style.visibility = "hidden";
		
	}else{
		document.getElementById("nodata_size").style.visibility = "hidden";
		document.getElementById("chart_div_size").style.visibility = "visible";
    view.setColumns(cols);
    options.colors = colors;
    chart.draw(view, options);
	}
	
	
	
	
  });

}

</script>';

echo $output;
 
  
  	?>
	
	<!-- Size comparison  Charts JavaScript Ends from here -->
	
<!-- Effort comparison  Charts JavaScript starts from here -->
 <?php

		
		
	
	 
				
 
$output='';
$output='<script src="jsapi.js"></script>';
 $output.='<script>

google.load("visualization", "1", {packages: ["corechart"]});
google.setOnLoadCallback(drawChart);

function drawChart() {
  var data = google.visualization.arrayToDataTable([';
  
 $output.="['projects', 'Actual effort', 'Function Point effort', 'Use Case Point effort','Empirical Model effort','Cocomo effort'],";
	

if(sizeof($pname)==0)
{
	$output.= "['',0,0,0,0,0,]";
	
}


	for( $i=0;$i<sizeof($pname);$i++)
		  {
		  $output.= "['". $pname[$i]."',".$aeffort[$i].','.$fpeffort[$i].','.$ucpeffort[$i].','.$eeeffort[$i].','.$cmeffort[$i]."],";
		  }
	
	
	
	



 $output.="   ]);";
 $output.="showEvery = 1;
  var effortOptionColors = ['purple','blue', 'green', 'orange','red'];
  var options = {
    strictFirstColumnType: true,
    colors: effortOptionColors,
    width: '100%',
    height: '70%',
    'legend': {
      'position': 'right'
    },
    hAxis: {
      
     title: 'Projects',
      
    },
    vAxis: {
      viewWindowMode: 'explicit',
	  title: 'Months',
      viewWindow: {
       
        min: 0
      }
    },
    textStyle: {
      fontName: 'Ariel',
     
      bold: false
    },
    interpolateNulls: false,
    
    series: {
		
      1: {
        type: 'bars'
      },
	   2: {
        type: 'bars'
      },
	   0: {
        type: 'bars'
      }
	  ,
	   3: {
        type: 'bars'
      }
	  ,
	   4: {
        type: 'bars'
      }
	  
    },
    chartArea: {
      left: 40,
      top: 20
      
    }
  };

  var view = new google.visualization.DataView(data);
  var chart = new google.visualization.LineChart($('#chart_div_effort')[0]);
  chart.draw(view, options);
  
		function resizeHandler () {
        chart.draw(view, options);
    }
    if (window.addEventListener) {
        window.addEventListener('resize', resizeHandler, false);
    }
    else if (window.attachEvent) {
        window.attachEvent('onresize', resizeHandler);
    }

  $('#effortOption').find(':checkbox').change(function() {
    var cols = [0];
    var colors = [];
	var flag=false;
    options.sizeOption = null;
    $('#effortOption').find(':checkbox:checked').each(function() {
      var value = parseInt($(this).attr('value'));
	    flag=true;
      cols.push(value);
      colors.push(effortOptionColors[value - 1]);
	   options.series = {
			 1: {
        type: 'bars'
      },
	   2: {
        type: 'bars'
      },
	   0: {
        type: 'bars'
      }
	  ,
	   3: {
        type: 'bars'
      },
	   4: {
        type: 'bars'
      }
	  
		};
      
	  
    });
	if(flag==false)
	{";
$output.='
		 document.getElementById("nodata_effort").style.visibility = "visible";
		 document.getElementById("chart_div_effort").style.visibility = "hidden";
		
	}else{
		document.getElementById("nodata_effort").style.visibility = "hidden";
		document.getElementById("chart_div_effort").style.visibility = "visible";
    view.setColumns(cols);
    options.colors = colors;
    chart.draw(view, options);
	}
	
	
	
	
  });

}

</script>';

echo $output;
 
  
  	?>
		<!-- effort comparison  Charts JavaScript Ends from here -->
	
<!-- duration comparison  Charts JavaScript starts from here -->


 <?php
 
$output='';
$output='<script src="jsapi.js"></script>';
 $output.='<script>

google.load("visualization", "1", {packages: ["corechart"]});
google.setOnLoadCallback(drawChart);

function drawChart() {
  var data = google.visualization.arrayToDataTable([';
  
 $output.="['projects', 'Actual Duration', 'Function Point Duration', 'Use Case Point Duration','Empirical Model Duration','Cocomo Duration'],";
	


if(sizeof($pname)==0)
{
	$output.= "['',0,0,0,0,0,]";
	
}

	for( $i=0;$i<sizeof($pname);$i++)
		  {
		  $output.= "['". $pname[$i]."',".$aduration[$i].','.$fpduration[$i].','.$ucpduration[$i].','.$eeduration[$i].','.$cmduration[$i]."],";
		  }
	
	
	
	



 $output.="   ]);";
 $output.="showEvery = 1;
  var durationOptionColors = ['purple','blue', 'green', 'orange','red'];
  var options = {
    strictFirstColumnType: true,
    colors: durationOptionColors,
    width: '100%',
    height: '70%',
    'legend': {
      'position': 'right'
    },
    hAxis: {
      
     title: 'Projects',
      
    },
    vAxis: {
      viewWindowMode: 'explicit',
	  title: 'Months',
      viewWindow: {
       
        min: 0
      }
    },
    textStyle: {
      fontName: 'Ariel',
     
      bold: false
    },
    interpolateNulls: false,
    
    series: {
		
      1: {
        type: 'bars'
      },
	   2: {
        type: 'bars'
      },
	   0: {
        type: 'bars'
      }
	  ,
	   3: {
        type: 'bars'
      }
	  ,
	   4: {
        type: 'bars'
      }
	  
    },
    chartArea: {
      left: 40,
      top: 20
      
    }
  };

  var view = new google.visualization.DataView(data);
  var chart = new google.visualization.LineChart($('#chart_div_duration')[0]);
  chart.draw(view, options);
  
		function resizeHandler () {
        chart.draw(view, options);
    }
    if (window.addEventListener) {
        window.addEventListener('resize', resizeHandler, false);
    }
    else if (window.attachEvent) {
        window.attachEvent('onresize', resizeHandler);
    }

  $('#durationOption').find(':checkbox').change(function() {
    var cols = [0];
    var colors = [];
	var flag=false;
    options.sizeOption = null;
    $('#durationOption').find(':checkbox:checked').each(function() {
      var value = parseInt($(this).attr('value'));
	    flag=true;
      cols.push(value);
      colors.push(durationOptionColors[value - 1]);
	   options.series = {
			 1: {
        type: 'bars'
      },
	   2: {
        type: 'bars'
      },
	   0: {
        type: 'bars'
      }
	  ,
	   3: {
        type: 'bars'
      },
	   4: {
        type: 'bars'
      }
	  
		};
      
	  
    });
	if(flag==false)
	{";
$output.='
		 document.getElementById("nodata_duration").style.visibility = "visible";
		 document.getElementById("chart_div_duration").style.visibility = "hidden";
		
	}else{
		document.getElementById("nodata_duration").style.visibility = "hidden";
		document.getElementById("chart_div_duration").style.visibility = "visible";
    view.setColumns(cols);
    options.colors = colors;
    chart.draw(view, options);
	}
	
	
	
	
  });

}

</script>';

echo $output;
 
  
  	?>
	
	

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
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>