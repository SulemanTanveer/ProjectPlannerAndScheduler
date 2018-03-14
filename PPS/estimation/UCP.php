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
					 
					<li class="active" >
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
					<li   >
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

        <div id="page-wrapper">

            <div class="container-fluid">
<div id="page1">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Use Case Point Estimation
                        </h1>
                        <ol class="breadcrumb">
                             <li class="active">
                                <i class="fa fa-calculator" aria-hidden="true"></i> Estimation
                            </li>
							<li class ="active">  Use Case Point </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				
				
<!-- use case type calculation starts here-->
<script type="text/javascript" src ="uc.js">
</script>

				<FORM NAME="UCform">
				<div class="well">
					<div class="row"  >
						<div class="col-lg-4 col-sm-4 col-md-4">
						<label>Select language</label>
								<select id="language" name="language" class="form-control" data-live-search="true" >
						<?php
include("config.php");
			$query = "SELECT * FROM language "; 
			$result = mysqli_query($connect, $query);
			while($row = mysqli_fetch_array($result)){
				
					$query1 = "SELECT * FROM project WHERE projStatus='Completed' AND languageId='".$row['languageId']."'";
											  
					$result1 = mysqli_query($connect, $query1);
														
					$count = mysqli_num_rows($result1);
				
				if($count>0)
				{										
				echo"	<option value= ". $row['languageId']." >   ".$row['languageName']." </option>";
				}
				else
				{
				echo"	<option value= ". $row['languageId']." title='no previous record found for estimation'M disabled >   ".$row['languageName']." </option>";
				}
			}			
?>	
						
						
					</select>
							 	</div>
					
					
					
					<div  class="col-lg-4 col-sm-4 col-md-4">
					

					</div>
					
					<div  class="col-lg-4 col-sm-4 col-md-4">
					<label>Enter person per month rate</label>
						<input type="number" id="rate"	 class="form-control">
					</div>
					
					</div>
				</div>
				
				
								<div class="row">
								
										<div class="col-lg-6 col-sm-6 col-md-6"><!-- for usecase inputs-->
										<div class="well">
											<div class="row"><center><strong>
											Use case types </strong>
											 </strong>
											</center>
											</div>
											<div class="row">
											<div class="col-lg-12 col-sm-12 col-md-12">
												<div class="col-lg-5 col-sm-5 col-md-5">
												Simple:
												
												</div>
												<div class="col-lg-2 col-sm-2 col-md-2">
												5X
												
												</div>
												
												<div class="col-lg-5 col-sm-5 col-md-5">
												<input type="number" id="simpleUC" value="" min="0" class="form-control">
												
												</div>
												
												
											</div>
											
											</div>
											
											
											<div class="row">
											<div class="col-lg-12 col-sm-12 col-md-12">
												<div class="col-lg-5 col-sm-5 col-md-5">
												Average:
												
												</div>
												<div class="col-lg-2 col-sm-2 col-md-2">
												10X
												
												</div>
												
												<div class="col-lg-5 col-sm-5 col-md-5">
												<input type="number" id="averageUC" value="" min="0" class="form-control">
												
												</div>
												
												
											</div>
											
											</div>
											
											
											<div class="row">
											<div class="col-lg-12 col-sm-12 col-md-12">
												<div class="col-lg-5 col-sm-5 col-md-5">
												Complex:
												
												</div>
												<div class="col-lg-2 col-sm-2 col-md-2">
												15X
												
												</div>
												
												<div class="col-lg-5 col-sm-5 col-md-5">
												<input type="number" id="complexUC" value="" min="0" class="form-control">
												
												</div>
												
												
											</div>
											
											</div>
											
										<!--	<div class="row">
											total UUCW=<INPUT TYPE="text" ID="totalUUCW" NAME="TU" VALUE="0" class="form-control">
											
											
											</div>-->
									
									</div>
									
									
									
										</div>
										<div class="col-lg-6 col-sm-6 col-md-6"><!-- actor inputs-->
									<div class="well">
											<div class="row"><center><strong>
											Actor types </strong>
											 </strong>
											</center>
											</div>
											<div class="row">
											<div class="col-lg-12 col-sm-12 col-md-12">
												<div class="col-lg-5 col-sm-5 col-md-5">
												Simple:
												
												</div>
												<div class="col-lg-2 col-sm-2 col-md-2">
												1X
												
												</div>
												
												<div class="col-lg-5 col-sm-5 col-md-5">
												<input type="number" id="simpleAC" value="" min="0" class="form-control">
												
												</div>
												
												
											</div>
											
											</div>
													
													
													
											<div class="row">
											<div class="col-lg-12 col-sm-12 col-md-12">
												<div class="col-lg-5 col-sm-5 col-md-5">
												Average:
												
												</div>
												<div class="col-lg-2 col-sm-2 col-md-2">
												2X
												
												</div>
												
												<div class="col-lg-5 col-sm-5 col-md-5">
												<input type="number" id="averageAC" value="" min="0" class="form-control">
												
												</div>
												
												
											</div>
											
											</div>
											
													
											<div class="row">
											<div class="col-lg-12 col-sm-12 col-md-12">
												<div class="col-lg-5 col-sm-5 col-md-5">
												Complex:
												
												</div>
												<div class="col-lg-2 col-sm-2 col-md-2">
												3X
												
												</div>
												
												<div class="col-lg-5 col-sm-5 col-md-5">
												<input type="number" id="complexAC" value="" min="0" class="form-control">
												
												</div>
												
												
											</div>
											
											</div>
											
											<!--<div class"row">
											total UAW=<INPUT TYPE="text" ID="totalUAW" NAME="TA" VALUE="0" class="form-control">
											
											</div>-->
											
											</div>
											</div>
									

            </div> 
			<div class="row">
				
					<div class="col-lg-6 col-sm-6 col-md-6"><!-- for technical factor-->
					<div class="well">
			
						<div class="row"><center><strong>
											Technical Factors </strong>
											 </strong>
											</center>
											</div>
			
						<div class="row">
					
							<div calss="col-lg-12">
								<div class="col-lg-8 col-sm-8 col-md-8">
						
									T1:Distributed system	
						
								</div>
						
								<div class="col-lg-4 col-sm-4 col-md-4">
									<input type="number" id="t1" value="" min="0" class="form-control">	
								</div>
						
							</div>
					
						</div>
			
			
						<div class="row">
					
							<div calss="col-lg-12">
								<div class="col-lg-8 col-sm-8 col-md-8">
						
									T2:Performance		
						
								</div>
						
								<div class="col-lg-4 col-sm-4 col-md-4">
									<input type="number" id="t2" value="" min="0" class="form-control">	
								</div>
						
							</div>
					
						</div>
			
			
			
			
			
			
			
			
						<div class="row">
					
							<div calss="col-lg-12">
								<div class="col-lg-8 col-sm-8 col-md-8">
						
									T3:End user efficiency			
						
								</div>
						
								<div class="col-lg-4 col-sm-4 col-md-4">
									<input type="number" id="t3" value="" min="0" class="form-control">	
								</div>
						
							</div>
					
						</div>
			
			
			
			
			
			
			
						<div class="row">
					
							<div calss="col-lg-12">
								<div class="col-lg-8 col-sm-8 col-md-8">
						
									T4:Complec internal process			
						
								</div>
						
								<div class="col-lg-4 col-sm-4 col-md-4">
									<input type="number" id="t4" value="" min="0" class="form-control">	
								</div>
						
							</div>
					
						</div>
						
						
						
						
						<div class="row">
					
							<div calss="col-lg-12">
								<div class="col-lg-8 col-sm-8 col-md-8">
						
									T5:Reusabillity			
						
								</div>
						
								<div class="col-lg-4 col-sm-4 col-md-4">
									<input type="number" id="t5" value="" min="0" class="form-control">	
								</div>
						
							</div>
					
						</div>
						
						
						
						
						<div class="row">
					
							<div calss="col-lg-12">
								<div class="col-lg-8 col-sm-8 col-md-8">
						
									T6:Easy to install			
						
								</div>
						
								<div class="col-lg-4 col-sm-4 col-md-4">
									<input type="number" id="t6" value="" min="0" class="form-control">	
								</div>
						
							</div>
					
						</div>
						
						
						
						
						<div class="row">
					
							<div calss="col-lg-12">
								<div class="col-lg-8 col-sm-8 col-md-8">
						
									T7:Easy to use			
						
								</div>
						
								<div class="col-lg-4 col-sm-4 col-md-4">
									<input type="number" id="t7" value="" min="0" class="form-control">	
								</div>
						
							</div>
					
						</div>
						
						
						
						
						<div class="row">
					
							<div calss="col-lg-12">
								<div class="col-lg-8 col-sm-8 col-md-8">
						
									T8:Portable			
						
								</div>
						
								<div class="col-lg-4 col-sm-4 col-md-4">
									<input type="number" id="t8" value="" min="0" class="form-control">	
								</div>
						
							</div>
					
						</div>
						
						
						
						
						<div class="row">
					
							<div calss="col-lg-12">
								<div class="col-lg-8 col-sm-8 col-md-8">
						
									T9:Easy to change			
						
								</div>
						
								<div class="col-lg-4 col-sm-4 col-md-4">
									<input type="number" id="t9" value="" min="0" class="form-control">	
								</div>
						
							</div>
					
						</div>
						
						
						
						
						<div class="row">
					
							<div calss="col-lg-12">
								<div class="col-lg-8 col-sm-8 col-md-8">
						
									T10:Concurrency				
						
								</div>
						
								<div class="col-lg-4 col-sm-4 col-md-4">
									<input type="number" id="t10" value="" min="0" class="form-control">	
								</div>
						
							</div>
					
						</div>
						
						
						
						<div class="row">
					
							<div calss="col-lg-12">
								<div class="col-lg-8 col-sm-8 col-md-8">
						
									T11:Special security feature			
						
								</div>
						
								<div class="col-lg-4 col-sm-4 col-md-4">
									<input type="number" id="t11" value="" min="0" class="form-control">	
								</div>
						
							</div>
					
						</div>
						
						
						
						
						<div class="row">
					
							<div calss="col-lg-12">
								<div class="col-lg-8 col-sm-8 col-md-8">
						
									T12:Provide direct access to third party		
						
								</div>
						
								<div class="col-lg-4 col-sm-4 col-md-4">
									<input type="number" id="t12" value="" min="0" class="form-control">	
								</div>
						
							</div>
					
						</div>
						
						
						
						
						<div class="row">
					
							<div calss="col-lg-12">
								<div class="col-lg-8 col-sm-8 col-md-8">
						
									T13:Distributed system				
						
								</div>
						
								<div class="col-lg-4 col-sm-4 col-md-4">
									<input type="number" id="t13" value="" min="0" class="form-control">	
								</div>
						
							</div>
					
						</div>
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
					</div>
					</div>
					
					<div class="col-lg-6 col-sm-6 col-md-6"> <!-- for environment factors-->
					<div class="well">
					<div class="row"><center><strong>
											Environmental Factors </strong>
											 </strong>
											</center>
											</div>
						
												<div class="row">
					
													<div calss="col-lg-12">
														<div class="col-lg-8 col-sm-8 col-md-8">
						
															E1:Familarity with UML			
						
														</div>
						
													<div class="col-lg-4 col-sm-4 col-md-4">
														<input type="number" id="e1" value="" min="0" class="form-control">	
													</div>
						
													</div>
					
												</div>
						
														
												<div class="row">
					
													<div calss="col-lg-12">
														<div class="col-lg-8 col-sm-8 col-md-8">
						
															E2:Pert time workers			
						
														</div>
						
													<div class="col-lg-4 col-sm-4 col-md-4">
														<input type="number" id="e2" value="" min="0" class="form-control">	
													</div>
						
													</div>
					
												</div>
												
												
												<div class="row">
					
													<div calss="col-lg-12">
														<div class="col-lg-8 col-sm-8 col-md-8">
						
															E3:Analyst capability			
						
														</div>
						
													<div class="col-lg-4 col-sm-4 col-md-4">
														<input type="number" id="e3" value="" min="0" class="form-control">	
													</div>
						
													</div>
					
												</div>
												
												
												<div class="row">
					
													<div calss="col-lg-12">
														<div class="col-lg-8 col-sm-8 col-md-8">
						
															E4:Application experience			
						
														</div>
						
													<div class="col-lg-4 col-sm-4 col-md-4">
														<input type="number" id="e4" value="" min="0" class="form-control">	
													</div>
						
													</div>
					
												</div>
												
												
												<div class="row">
					
													<div calss="col-lg-12">
														<div class="col-lg-8 col-sm-8 col-md-8">
						
															E5:Object oriented experience			
						
														</div>
						
													<div class="col-lg-4 col-sm-4 col-md-4">
														<input type="number" id="e5" value="" min="0" class="form-control">	
													</div>
						
													</div>
					
												</div>
												
												
												<div class="row">
					
													<div calss="col-lg-12">
														<div class="col-lg-8 col-sm-8 col-md-8">
						
															E6:Motivation				
						
														</div>
						
													<div class="col-lg-4 col-sm-4 col-md-4">
														<input type="number" id="e6" value="" min="0" class="form-control">	
													</div>
						
													</div>
					
												</div>
												
												
												<div class="row">
					
													<div calss="col-lg-12">
														<div class="col-lg-8 col-sm-8 col-md-8">
						
															E7:Difficult programming language			
						
														</div>
						
													<div class="col-lg-4 col-sm-4 col-md-4">
														<input type="number" id="e7" value="" min="0" class="form-control">	
													</div>
						
													</div>
					
												</div>
												
												
												<div class="row">
					
													<div calss="col-lg-12">
														<div class="col-lg-8 col-sm-8 col-md-8">
						
															E8:Stable requirement				
						
														</div>
						
													<div class="col-lg-4 col-sm-4 col-md-4">
														<input type="number" id="e8" value="" min="0" class="form-control">	
													</div>
						
													</div>
					
												</div>
						
						
						
						
			</div>
			
	<!--		
			total UUCW=<INPUT TYPE="text" ID="totalUUCW" NAME="TU" VALUE="0">
			total UAW=<INPUT TYPE="text" ID="totalUAW" NAME="TA" VALUE="0">
			 Total=<INPUT TYPE="text" ID="totalFactor" NAME="TF" VALUE="0"><br>
 TCF=<INPUT TYPE="text" ID="totalTCF" NAME="TCF" VALUE="0"><br>
 total ef<INPUT TYPE="text" ID="totalEF" NAME="TU" VALUE="0">
 ECF=	<INPUT TYPE="text" ID="ECF" NAME="ecf" VALUE="0"> -->
 
<INPUT TYPE="hidden" ID="UCP" NAME="ucp" VALUE="0" >
			
			
				
			<div class="row">
			<div  class="col-lg-6 col-sm-6 col-md-6">
			<button  class="btn btn-info btn-block"  type="reset">
				<i class="fa fa-refresh" aria-hidden="true"></i> Reset</button></div>
			<div  class="col-lg-6 col-sm-6 col-md-6">
			<button id="button" class="btn btn-success btn-block" onClick="" type="button"><i class="fa fa-calculator" aria-hidden="true"></i> Estimate<img src="../images/login.gif" id="img2" style="display:none; width:40px;height:40px;"/ ></button>
			</div>
			</div>
			</div>
			
			
			
			</FORM>
			<!-- use case type calculation ends here-->
            <!-- /.container-fluid -->

			
			
			
        </div>
        <!-- /#page-wrapper -->
</div>
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
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="fa fa-users"></span> Add Metric to project</h4>
         </div>
         <div class="modal-body">
           
		   <form method="post" id="insert_form">
         <div class="row">
			   <div class="main col-lg-12 myHalfCol">
    <div class="col-lg-5">

              
			   <div class="well">
			
			
			 <table  id="myTable2" class="table table-hover">
			 <center><h4>Metric Details</h4></center>
   
    <tbody>
	<tr> <td>Type</td> <td>Use Case Point</td></tr>
	<tr> <td>Use Case Points</td> <td id="ucps" name="ucps" ></td></tr>
    <tr> <td>Effort (person  month)</td> <td id="eff" name="eff" ></td></tr>
	 <tr> <td>Duration(months)</td> <td id="time" name="time" ></td></tr>
       <tr> <td>Size (KLOC)</td> <td id="size" name="size"></td></tr>
       <tr> <td>Cost </td> <td id="cost" name="cost"></td></tr>
	  
    </tbody>
  </table>
			
			
			</div>
			  <div class="row"><div class="col-lg-5">
				
				<input type="submit" name="insert" id="Insert" value="Add Metric" class="btn btn-success " />  
				</div></div>
			   
			   
			   
    </div>
	
	
    <label>Select Project to Add Metric</label>
	<div id="projectshow" class="col-lg-7"  >
	
		

	
    </div>
</div>
<script src="js/UseCaseScript.js"></script>
<input type="hidden"  id="uc" value="" class="form-control">
<input type="hidden"  id="e" value="" class="form-control">
<input type="hidden"  id="s" value="" class="form-control">
<input type="hidden"  id="c" value="" class="form-control">
<input type="hidden"  id="d" value="" class="form-control">
	 		  <input type="hidden" name="proj_id" id="proj_id" value="" class="form-control">
			   
			    
				
                </form>
				
			
				
				
				
				
				
				
				

		</div>
         <div class="modal-footer"><div class="col-xs-12">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>  </div> </div>
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
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>