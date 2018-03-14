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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
		<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
		<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
		<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
	    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
		<script src="https://cdn.datatables.net/fixedheader/3.1.2/js/dataTables.fixedHeader.min.js"></script> 
		<script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script> 
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js "></script>
	   <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>
		
			
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
					<li  >
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
					<li class="active" >
                        <a href="setting.php"><i class="fa fa-cogs" aria-hidden="true"></i> Settings</a>
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
                        <i class="fa fa-cogs" aria-hidden="true"></i> Settings
							
                        </h1>
						
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-cogs" aria-hidden="true"></i> Settings
                            </li>
							
                        </ol>
                    </div>
					
                </div>
                <!-- /.row -->
				<div class="row">
				<div class="col-lg-2 col-sm-3 col-md-4">
				<button id="language" class="btn btn-primary btn-block"  >Language </button>
				
                </div>
				<div class="col-lg-2 col-sm-3 col-md-4">
				<button id="pSize" class="btn btn-success btn-block"  > Project Size </button>
				
                </div>
				
	 
            </div>
			<br>
			<div class="row" id="change">
			<div class="col-lg-12 col-sm-12 col-md-12">
									    <div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-cogs" aria-hidden="true"></i> Language</h3>
                            </div>
                            <div class="panel-body">
                                 <div class="row">
						<div class="col-lg-12">
							 <div class="form-group pull-right">
						   <button type="button" name="age" id="addLanguage" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-success"><i class="glyphicon glyphicon-plus-sign"></i> Add Language</button>
						</div> </div> </div>
					  
<!-- /.row -->

								<div id="language_table">	
								
	<table id="langTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"
	>
    <thead>
           
					 
                    
                    
					   <th>Language Id</th> 
					    <th>Name</th> 
						 <th>LOC per Function Point</th>  
						
						
						 <th>Actions</th>
                  </tr>
        </thead>
        <tbody>
		<?php
		include("config.php");
		$query = "SELECT * FROM language";
		$result = mysqli_query($connect, $query);
            
                     while($row = mysqli_fetch_array($result))//fetch fp metric record
					 
                     {
					 
                     ?>
					  <tr>   
                      <td><?php echo $row["languageId"]; ?></td>
					  <td><?php echo $row["languageName"]; ?></td>
                    
					  <td><?php echo $row["LOCperFP"]; ?></td>
                      
                   <td><button type="button" name="view" value="view" id="<?php echo $row["languageId"]; ?>" class="btn btn-warning btn-xs edit_language" > <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
				   <button type="button" name="delete" value="delete" id="<?php echo $row["languageId"]; ?>" class="btn btn-danger btn-xs delete_language" ><i class="fa fa-trash-o"></i> Delete</button>
			   
			   </td>
			   
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
   
	   <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
   

  

   
    
</body>

</html>


<div id="dataModal" class="modal fade">
   <div class="modal-dialog">
      <div class="modal-content ">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add Language</h4>
         </div>
         <div class="modal-body" id="add_language">
<form  method=" Post/Redirect/Get"id="AddLanguage"  >
		 <div class="row">
		 <div class="col-lg-3 col-md-4 col-sm-12">
		 <label> Language Name:</label></div>
		 <div class="col-lg-6 col-md-6 col-sm-12">
		 <input type="text" id="languageName" class="form-control" >
		 
		 
		 </div>
		 
		 </div>
		  <div class="row">
		 <div class="col-lg-3 col-md-4 col-sm-12">
		 <label> LOC per FP:</label></div>
		 <div class="col-lg-6 col-md-6 col-sm-12">
		 <input type="number" id="loc_per_fp" class="form-control" >
		 
		 
		 </div>
		 
		 </div>
		 <br>
		 <div class="row">
		 <div class="col-lg-2 col-md-1"> 
		 
		 </div>
		 
				<div class="col-lg-4 col-sm-6 col-md-5"> 
				<button  class="btn btn-info btn-block"  type="reset">
				<i class="fa fa-refresh" aria-hidden="true"></i> Reset</button>
				
				</div>
				
				
				
				<div class="col-lg-4 col-sm-6 col-md-5"> 
				
				
				<button type="submit" id="addLang" class="btn btn-success btn-block"  ><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Language<img src="../images/login.gif" id="img2" style="display:none; width:40px;height:40px;"/ ></button>
				
				
				</div>
				 <div class="col-lg-2 col-md-1"> 
		 </div>
		 
		 </div>
		 </form>
		 
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>





<div id="EditDataModal" class="modal fade">
   <div class="modal-dialog">
      <div class="modal-content ">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Language</h4>
         </div>
         <div class="modal-body" id="edit_language">
<form  method=" Post/Redirect/Get"id="edit_Language"  >
 <div class="row">
		 <div class="col-lg-3 col-md-4 col-sm-12">
		 <label> Language Id:</label></div>
		 <div class="col-lg-6 col-md-6 col-sm-12">
		 <input type="number" id="e_languageId" class="form-control" disabled >
		 
		 
		 </div>
		 
		 </div>
		 <div class="row">
		 <div class="col-lg-3 col-md-4 col-sm-12">
		 <label> Language Name:</label></div>
		 <div class="col-lg-6 col-md-6 col-sm-12">
		 <input type="text" id="e_languageName" class="form-control" >
		 
		 
		 </div>
		 
		 </div>
		  <div class="row">
		 <div class="col-lg-3 col-md-4 col-sm-12">
		 <label> LOC per FP:</label></div>
		 <div class="col-lg-6 col-md-6 col-sm-12">
		 <input type="number" id="e_loc_per_fp" class="form-control" >
		 
		 
		 </div>
		 
		 </div>
		 <br>
		 <div class="row">
		 <div class="col-lg-2 col-md-1"> 
		 
		 </div>
		 
				
				
				
				<div class="col-lg-4 col-sm-6 col-md-5"> 
				
				
				<button type="submit" id="updateLang" class="btn btn-success btn-block"  > Update<img src="../images/login.gif" id="img2" style="display:none; width:40px;height:40px;"/ ></button>
				
				
				</div>
				 <div class="col-lg-2 col-md-1"> 
		 </div>
		 
		 </div>
		 </form>
		 
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>





<!-- project size modal-->

<div id="pSizeDataModal" class="modal fade">
   <div class="modal-dialog">
      <div class="modal-content ">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Project Size</h4>
         </div>
         <div class="modal-body" id="edit_size">
<form  method=" Post/Redirect/Get"id="edit_pSize"  >
		 <div class="row">
		 <div class="col-lg-3 col-md-4 col-sm-12">
		 <label> Small:</label></div>
		 <div class="col-lg-6 col-md-6 col-sm-12">
		 <input type="text" id="pSmall" value="" class="form-control" >
		 
		 
		 </div>
		 
		 </div>
		  
		  
		   <div class="row">
		 <div class="col-lg-3 col-md-4 col-sm-12">
		 <label> Intermediate:</label></div>
		 <div class="col-lg-6 col-md-6 col-sm-12">
		 <input type="text" id="pInter" value="" class="form-control" >
		 
		 
		 </div>
		 
		 </div>
		 
		  <div class="row">
		 <div class="col-lg-3 col-md-4 col-sm-12">
		 <label> Medium:</label></div>
		 <div class="col-lg-6 col-md-6 col-sm-12">
		 <input type="text" id="pMedium" value="" class="form-control" >
		 
		 
		 </div>
		 
		 </div>
		 
		 
		  <div class="row">
		 <div class="col-lg-3 col-md-4 col-sm-12">
		 <label> Large:</label></div>
		 <div class="col-lg-6 col-md-6 col-sm-12">
		 <input type="text" id="pLarge" value="" class="form-control" >
		 
		 
		 </div>
		 
		 </div>
		  
		  
		  
		  
		  
		  
		  
		  
		<br>
		 <div class="row">
		
		 
				<div class="col-lg-3 col-sm-4 col-md-12"> 
				
				
				</div>
				
				
				
				<div class="col-lg-6 col-sm-6 col-md-5"> 
				
				
				<button type="submit" id="editPsize" class="btn btn-success btn-block"  > Update<img src="../images/login.gif" id="img2" style="display:none; width:40px;height:40px;"/ ></button>
				
				
				</div>
				 <div class="col-lg-2 col-md-1"> 
		 </div>
		 
		 </div>
		 </form>
		 
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>














<script>
 
/// this function will make the project table responsive with live search//	
 $(function(){
    var table = $('#langTable').DataTable( {
        responsive: true
    } );
 
    
  });	 
	
					 $(document).on('click', '#language', function(){
    
    
   { 
    $.ajax({
      url:"languageTable.php",
      method:"POST",
      data:{},
      success:function(data){
      
      $('#change').html(data);
     
     
     
      }
   });
    
   }
  
    });
	
	
			 $(document).on('click', '#pSize', function(){
    
    
   { 
    $.ajax({
      url:"projectSizeTable.php",
      method:"POST",
      data:{},
      success:function(data){
      
      $('#change').html(data);
     
     
     
      }
   });
    
   }
  
    });
   
   
    $(document).on('click', '#addLanguage', function(){

	   $("#loc_per_fp").val("");
	   $("#languageName").val(""); 
	   $('#loc_per_fp').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	   $('#languageName').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	   
       $('#dataModal').modal('show');
   
   
    });
   
   $(document).on('click', '.edit_language', function(){
      
	  $('#e_languageName').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	  $('#e_loc_per_fp').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	  
	  
	  
	  
       $('#EditDataModal').modal('show');
   document.getElementById('e_languageId').value=document.getElementById("langTable").rows[this.parentNode.parentNode.rowIndex].cells[0].innerHTML;
   
	document.getElementById('e_languageName').value=document.getElementById("langTable").rows[this.parentNode.parentNode.rowIndex].cells[1].innerHTML;
	document.getElementById('e_loc_per_fp').value=document.getElementById("langTable").rows[this.parentNode.parentNode.rowIndex].cells[2].innerHTML;
    });
   

  $(document).on('click', '#Edit_P_Size', function(){
	  $('#pSmall').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	  $('#pInter').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	  $('#pMedium').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	  $('#pLarge').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });

	  
	  
	  
	  
	  
	document.getElementById('pSmall').value =document.getElementById("sizeTable").rows[1].cells[1].innerHTML;
	document.getElementById('pInter').value =document.getElementById("sizeTable").rows[2].cells[1].innerHTML;
	document.getElementById('pMedium').value =document.getElementById("sizeTable").rows[3].cells[1].innerHTML;
	document.getElementById('pLarge').value =document.getElementById("sizeTable").rows[4].cells[1].innerHTML;	
	 
       $('#pSizeDataModal').modal('show');
   
   
    });
   
   
   

	$('#edit_Language').on("submit", function(event){  
     event.preventDefault();  
	 var langId=$("#e_languageId").val();
      var languageName =$("#e_languageName").val(); 
	  var LocPerFp = $("#e_loc_per_fp").val(); 
	        var flag=true;
		 var altMsg="";
		  //validation of loc_per_fp ////
		 if( $('#e_loc_per_fp').val()==""||!validateNumber($('#e_loc_per_fp').val()))
		 {	
			 flag=false;
			 altMsg+="Enter valid number of loc per fp! \n";
			 $('#loc_per_fp').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
			 
		 }
		  //validation of language ////
		 if( $('#e_languageName').val()==""||!validateLanguageName($('#e_languageName').val()))
		 {	
			 flag=false;
			 altMsg+="Enter valid name! \n";
			 $('#languageName').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
			 
		 }
		 
		 
		  if(flag){
		   
		   
		   
      $.ajax({  
       url:"updateLanguage.php",  
       method:"POST",  
	
       beforeSend:function(){  
        
$("#updateLang").html('Updating..');		
		
       }, 
	   
	   data:{
				  id:langId,
				   name:languageName,
				   loc:LocPerFp
				  
				   },
	   
  	   
       success:function(data){  
       
        $('#EditDataModal').modal('hide');  
		$("#updateLang").html('Update');
        $('#change').html(data);
		
       		
       }  
      }); 

     }
		 else{
			 
			 alert(altMsg);
		 }
    });   
   
   
   
   
   
   
   $('#edit_pSize').on("submit", function(event){  
     event.preventDefault();  
	 var small=$("#pSmall").val();
	  var inter=$("#pInter").val();
	   var medium=$("#pMedium").val();
	    var large=$("#pLarge").val();
      var flag=true;
	  var altMsg="";
	  
	    //validation of pSmall ////
		 if( $('#pSmall').val()==""||!validate3DecimalNumber($('#pSmall').val()))
		 {	
			 flag=false;
			 altMsg+="Enter valid Value of small! \n";
			 $('#pSmall').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
			 
		 }
		  //validation of inetr ////
		 if( $('#pInter').val()==""||!validate3DecimalNumber($('#pInter').val()))
		 {	
			 flag=false;
			 altMsg+="Enter valid Value of intermediat! \n";
			 $('#pInter').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
			 
		 }
		 
		  //validation of pmedium ////
		 if( $('#pMedium').val()==""||!validate3DecimalNumber($('#pMedium').val()))
		 {	
			 flag=false;
			 altMsg+="Enter valid Value of medium! \n";
			 $('#pMedium').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
			 
		 }
		  //validation of pSmall ////
		 if( $('#pLarge').val()==""||!validate3DecimalNumber($('#pLarge').val()))
		 {	
			 flag=false;
			 altMsg+="Enter valid Value of large! \n";
			 $('#pLarge').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
			 
		 }

		  //validation of ascending size ////
		  if(flag){
		  if(parseFloat(small)>=parseFloat(inter))
		  {
			  flag=false;
			 altMsg+="small should be less than the intermediat size \n";
		  }
		  
		  if(parseFloat(inter)>=parseFloat(medium))
		  {
			  flag=false;
			 altMsg+="inter should be less than the medium size \n";
		  }
		  
		  if(parseFloat(medium)>=parseFloat(large))
		  {
			  flag=false;
			 altMsg+="medium should be less than the large size \n";
		  }
		  }

		 if(flag){
      $.ajax({  
       url:"updateProjectSize.php",  
       method:"POST",  
	
       beforeSend:function(){  
        
$("#editPsize").html('Updating..');		
		
       }, 
	   
	   data:{
				  Small:small,
				   Inter:inter,
				    Medium:medium,
					Large:large
					 
				  
				   },
	   
  	   
       success:function(data){  
       
		
        $('#pSizeDataModal').modal('hide');  
		$("#editPsize").html('Update');
        $('#change').html(data);
		
       		
       }  
      }); 

     }
		 else{
			 
			 alert(altMsg);
		 }
	 
    });   
   
   
   
   
   
   
   
   
   
   
   
   
   
   

				 $('#AddLanguage').on("submit", function(event){  
     event.preventDefault();  
      var languageName =$("#languageName").val(); 
	  var LocPerFp = $("#loc_per_fp").val(); 
	       
		   var flag=true;
		 var altMsg="";
		  //validation of loc_per_fp ////
		 if( $('#loc_per_fp').val()==""||!validateNumber($('#loc_per_fp').val()))
		 {	
			 flag=false;
			 altMsg+="Enter valid number of loc per fp! \n";
			 $('#loc_per_fp').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
			 
		 }
		  //validation of loc_per_fp ////
		 if( $('#languageName').val()==""||!validateLanguageName($('#languageName').val()))
		 {	
			 flag=false;
			 altMsg+="Enter valid name! \n";
			 $('#languageName').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
			 
		 }
		 
		 
		  if(flag){
      $.ajax({  
       url:"insertLanguage.php",  
       method:"POST",  
	
       beforeSend:function(){  
        
$("#addLang").html('Inserting..');		
		
       }, 
	   
	   data:{
				 
				   name:languageName,
				   loc:LocPerFp
				  
				   },
	   
  	   
       success:function(data){  
       
		
        $('#dataModal').modal('hide');  
		$("#addLang").html('Add Language');
        $('#change').html(data);
		
       		
       }  
      }); 

     }
		 else{
			 
			 alert(altMsg);
		 }
    });
	
	
	//delete language
	 $(document).on('click', '.delete_language', function(){
     //$('#dataModal').modal();
     var language_id = $(this).attr("id");
   if(confirm("Are you sure you want to delete this?")){ 
    $.ajax({
      url:"deleteLanguage.php",
      method:"POST",
	  async: false,
      data:{Language_id:language_id},
      success:function(data){
     
      $('#change').html(data);
   
      }
   });
   
   }
   else 
   	return false;
    });
///////////////////////////////////////////VAIDATIONS////////////

$("#pSmall").unbind().change(function(){
	
	if(validate3DecimalNumber($('#pSmall').val()))
	{
		
		 $('#pSmall').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
	}	
	else{
		 $('#pSmall').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter valid number upto 3 decimal places!');
	}
});
$("#pInter").unbind().change(function(){
	
	if(validate3DecimalNumber($('#pInter').val()))
	{
		
		 $('#pInter').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
	}	
	else{
		 $('#pInter').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter valid number upto 3 decimal places!');
	}
});
$("#pMedium").unbind().change(function(){
	
	if(validate3DecimalNumber($('#pMedium').val()))
	{
		
		 $('#pMedium').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
	}	
	else{
		 $('#pMedium').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter valid number upto 3 decimal places!');
	}
});
$("#pLarge").unbind().change(function(){
	
	if(validate3DecimalNumber($('#pLarge').val()))
	{
		
		 $('#pLarge').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
	}	
	else{
		 $('#pLarge').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter valid number upto 3 decimal places!');
	}
});
$("#loc_per_fp").unbind().change(function(){
	
	if(validateNumber($('#loc_per_fp').val()))
	{
		
		 $('#loc_per_fp').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
	}	
	else{
		 $('#loc_per_fp').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter valid whole number!');
	}
});
$("#e_loc_per_fp").unbind().change(function(){
	
	if(validateNumber($('#e_loc_per_fp').val()))
	{
		
		 $('#e_loc_per_fp').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
	}	
	else{
		 $('#e_loc_per_fp').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter valid whole number!');
	}
});
$("#languageName").unbind().change(function(){
	
	if(validateLanguageName($('#languageName').val()))
	{
		
		 $('#languageName').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
	}	
	else{
		 $('#languageName').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter valid language number!');
	}
});
$("#e_languageName").unbind().change(function(){
	
	if(validateLanguageName($('#e_languageName').val()))
	{
		
		 $('#e_languageName').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
	}	
	else{
		 $('#e_languageName').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter valid language number!');
	}
});
////////////////////KEYDOWN VALIDATIONS//////

 $('#pSmall').keydown(function(event) {
       var ch = (window.Event) ? event.which : event.keyCode;
	  if((ch >= 48 && ch <= 57)||(ch>=0 && ch<=31 )||(ch>=37&&ch<=40)||ch==46||ch==190) {
		      
		}
    	else{
		event.preventDefault(); 
		 alert("Only positive numbers upto 3 decimal places are allowed!");
		return false;
		}
      });	

 $('#pInter').keydown(function(event) {
       var ch = (window.Event) ? event.which : event.keyCode;
	  if((ch >= 48 && ch <= 57)||(ch>=0 && ch<=31 )||(ch>=37&&ch<=40)||ch==46||ch==190) {
		      
		}
    	else{
		event.preventDefault(); 
		 alert("Only positive numbers upto 3 decimal places are allowed!");
		return false;
		}
      });	
	
 $('#pMedium').keydown(function(event) {
       var ch = (window.Event) ? event.which : event.keyCode;
	  if((ch >= 48 && ch <= 57)||(ch>=0 && ch<=31 )||(ch>=37&&ch<=40)||ch==46||ch==190) {
		      
		}
    	else{
		event.preventDefault(); 
		alert("Only positive numbers upto 3 decimal places are allowed!");
		return false;
		}
      });	
	
 $('#pLarge').keydown(function(event) {
       var ch = (window.Event) ? event.which : event.keyCode;
	  if((ch >= 48 && ch <= 57)||(ch>=0 && ch<=31 )||(ch>=37&&ch<=40)||ch==46||ch==190) {
		      
		}
    	else{
		event.preventDefault(); 
		 alert("Only positive numbers are allowed!");
		return false;
		}
      });	
	 $('#loc_per_fp').keydown(function(event) {
       var ch = (window.Event) ? event.which : event.keyCode;
	  if((ch >= 48 && ch <= 57)||(ch>=0 && ch<=31 )||(ch>=37&&ch<=40)||ch==46) {
		      
		}
    	else{
		event.preventDefault(); 
		 alert("Only positive whole numbers are allowed!");
		return false;
		}
      });	
	   $('#e_loc_per_fp').keydown(function(event) {
       var ch = (window.Event) ? event.which : event.keyCode;
	  if((ch >= 48 && ch <= 57)||(ch>=0 && ch<=31 )||(ch>=37&&ch<=40)||ch==46) {
		      
		}
    	else{
		event.preventDefault(); 
		 alert("Only positive whole numbers are allowed!");
		return false;
		}
      });
	  
	
/////////////////////////Validation FUNCTIONS starts from here//////////////////
function validate3DecimalNumber(num)
{
   var ck_num =/^(\d+)?(?:\.\d{1,3})?$/;
   
 return  ck_num.test(num);

}	
function validateNumber(num)
{
   var ck_num = /^\+?([0-9]\d*)$/;
 return  ck_num.test(num);

}
		
function validateLanguageName(num)
{
   var ck_num = /^[a-zA-Z][a-zA-Z]*[-]{0,1}[a-zA-Z]*?[ ]?[0-9]?[#+_-]{0,2}?$/;
 return  ck_num.test(num);

}	
	
	

</script>




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