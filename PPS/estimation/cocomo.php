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
					<li >
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
                            Basic Cocomo Model 
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-calculator" aria-hidden="true"></i> Estimation
                            </li>
							<li class ="active"> Function Point size calculation </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <!-- cocomo starts here -->
				
				<!-- function point calculation starts here-->
				 <script type="text/javascript" src ="fp.js">
          
        </script>
				<FORM NAME="FPform"> 
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
				?>
						
				<option value=<?php echo $row['languageId'] ?>> <?php echo $row['languageName'] ?></option>
			<?php	
			}			
?>	
						
						
						
						
					</select>
							 	</div>
					
					
					
					<div  class="col-lg-4 col-sm-4 col-md-4">
					<label>Select Project type</label>
					<select id="methods" name="methods" class="form-control" data-live-search="true">
						
						<option value="organic">organic</option>
						<option value="sdm" >semi detached model</option>
						<option value="em" >embeded model</option>
					</select>

					</div>
					
					<div  class="col-lg-4 col-sm-4 col-md-4">
					<label>Enter person per month rate</label>
						<input type="number" id="rate"	 class="form-control">
					</div>
					
					</div>
				</div>
				
				
				
				
				
							<div class="well">
					<div class="row"  > <!--for heading-->
				<strong> <div class="col-lg-12">
								<div class="col-lg-3 col-sm-3 col-md-3">
								Measurement Parameters
							 	</div>
								<div class="col-lg-2 col-sm-2 col-md-2">
								count
								
								</div>
									<div class="col-lg-4 col-sm-4 col-md-4">
											<div class="col-lg-4 col-sm-4 col-md-4">
											Simple
											</div>
											<div class="col-lg-4 col-sm-4 col-md-4">
											average
											</div>
											<div class="col-lg-4 col-sm-4 col-md-4">
											complex
											</div>
									</div>
											
									<div class="col-lg-3 col-sm-3 col-md-3"><center>
									Result </center>
									</div>
								
						
						   </div>
					
					
					
					


					</strong>
	
					
				</div>
				<!--heading for function points end above-->
				
					<div class="row"  > <!--first input row-->
				 <div class="col-lg-12">
								<div class="col-lg-3 col-sm-3 col-md-3">
								<label> External Inputs: </label>
							 	</div>
								<div class="col-lg-2 col-sm-2 col-md-2">
								<input type="number" id="ExternalInputs" value="" min="0" onchange="eipMul()" class="form-control" required>
								
								</div>
									<div class="col-lg-4 col-sm-4 col-md-4">
											<div class="col-lg-4 col-sm-4 col-md-4"> <div class="radio"><label>
											<input type="radio" name="EIp" onclick="eipMul()" value="3"  checked> 3	</label></div>
											</div>
											<div class="col-lg-4 col-sm-4 col-md-4">
												<div class="radio"><label>
											<input type="radio" name="EIp" onclick="eipMul()" value="4"> 4	</label></div>
											</div>
											<div class="col-lg-4 col-sm-4 col-md-4">
												<div class="radio"><label>
											<input type="radio" name="EIp" onclick="eipMul()" value="6"> 6	</label></div>
											</div>
									</div>
											
									<div class="col-lg-3 col-sm-3 col-md-3"><center>
									<INPUT TYPE="text" ID="EIp_display" NAME="EIps" VALUE="0" disabled class="form-control" >
									</center>
									</div>
								
						
						   </div>
					
					
					
					


					

				</div>
				
				
				
				
				
				
				
				
				
				
				
				
				<div class="row"  > <!--second input row-->
				 <div class="col-lg-12">
								<div class="col-lg-3 col-sm-3 col-md-3">
								<label>External Outputs:: </label>
							 	</div>
								<div class="col-lg-2 col-sm-2 col-md-2">
								<input type="number" id="ExternalOutputs" value="" min="0" onchange="eoMul()" class="form-control" required>
								
								</div>
									<div class="col-lg-4 col-sm-4 col-md-4">
											<div class="col-lg-4 col-sm-4 col-md-4"> <div class="radio"><label>
											<input type="radio" name="EOp" onclick="eoMul()" value="4"  checked> 4	</label></div>
											</div>
											<div class="col-lg-4 col-sm-4 col-md-4">
												<div class="radio"><label>
											<input type="radio" name="EOp" onclick="eoMul()" value="5"> 5	</label></div>
											</div>
											<div class="col-lg-4 col-sm-4 col-md-4">
												<div class="radio"><label>
											<input type="radio" name="EOp" onclick="eoMul()" value="7"> 7	</label></div>
											</div>
									</div>
											
									<div class="col-lg-3 col-sm-3 col-md-3"><center>
									<INPUT TYPE="text" ID="EOp_display" NAME="EOps" VALUE="0" disabled class="form-control" >
									</center>
									</div>
								
						
						   </div>
					
					
					
					


					
					

				</div>
				
				
				
				
				
				
				
				
				
				
				
				
				<div class="row"  > <!--Third input row-->
				 <div class="col-lg-12">
								<div class="col-lg-3 col-sm-3 col-md-3">
								<label>External Inquiries: </label>
							 	</div>
								<div class="col-lg-2 col-sm-2 col-md-2">
								<input type="number" id="ExternalInquiries" value="" onchange="eiMul()"  min="0"  class="form-control" required>
								
								</div>
									<div class="col-lg-4 col-sm-4 col-md-4">
											<div class="col-lg-4 col-sm-4 col-md-4"> <div class="radio"><label>
											<input type="radio" name="EIq" onchange="eiMul()" value="3"  checked> 3	</label></div>
											</div>
											<div class="col-lg-4 col-sm-4 col-md-4">
												<div class="radio"><label>
											<input type="radio" name="EIq" onchange="eiMul()" value="4"> 4	</label></div>
											</div>
											<div class="col-lg-4 col-sm-4 col-md-4">
												<div class="radio"><label>
											<input type="radio" name="EIq" onchange="eiMul()" value="6"> 6	</label></div>
											</div>
									</div>
											
									<div class="col-lg-3 col-sm-3 col-md-3"><center>
									<INPUT TYPE="text" ID="EIq_display" NAME="EIqs" VALUE="0" disabled class="form-control" >
									</center>
									</div>
								
						
						   </div>
					
					
					
					


					

				</div>
				
				
				
				
				
				
				
				
				
				
				
				
				<div class="row"  > <!--Fourth input row-->
				 <div class="col-lg-12">
								<div class="col-lg-3 col-sm-3 col-md-3">
								<label>Internal Logical Files: </label>
							 	</div>
								<div class="col-lg-2 col-sm-2 col-md-2">
								<input type="number" id="InternalLogicalFiles" value="" min="0" onchange="ilMul()" class="form-control" required>
								
								</div>
									<div class="col-lg-4 col-sm-4 col-md-4">
											<div class="col-lg-4 col-sm-4 col-md-4"> <div class="radio"><label>
											<input type="radio" name="ILF" onclick="ilMul()" value="7"  checked> 7	</label></div>
											</div>
											<div class="col-lg-4 col-sm-4 col-md-4">
												<div class="radio"><label>
											<input type="radio" name="ILF" onclick="ilMul()" value="10"> 10	</label></div>
											</div>
											<div class="col-lg-4 col-sm-4 col-md-4">
												<div class="radio"><label>
											<input type="radio" name="ILF" onclick="ilMul()" value="15"> 15	</label></div>
											</div>
									</div>
											
									<div class="col-lg-3 col-sm-3 col-md-3"><center>
									<INPUT TYPE="text" ID="ILF_display" NAME="ILFs" VALUE="0" disabled class="form-control" >
									</center>
									</div>
								
						   </div>
					
				</div>
				
				<div class="row"  > <!--Fifth input row-->
				 <div class="col-lg-12">
								<div class="col-lg-3 col-sm-3 col-md-3">
								<label>External interface Files: </label>
							 	</div>
								<div class="col-lg-2 col-sm-2 col-md-2">
								<input type="number" id="ExternalInterfaceFiles" value="" min="0" onchange="efMul()" class="form-control" required>
								
								</div>
									<div class="col-lg-4 col-sm-4 col-md-4">
											<div class="col-lg-4 col-sm-4 col-md-4"> <div class="radio"><label>
											<input type="radio" name="EIF" onclick="efMul()" value="5"  checked> 5	</label></div>
											</div>
											<div class="col-lg-4 col-sm-4 col-md-4">
												<div class="radio"><label>
											<input type="radio" name="EIF" onclick="efMul()" value="7"> 7	</label></div>
											</div>
											<div class="col-lg-4 col-sm-4 col-md-4">
												<div class="radio"><label>
											<input type="radio" name="EIF" onclick="efMul()" value="10"> 10	</label></div>
											</div>
									</div>
											
									<div class="col-lg-3 col-sm-3 col-md-3"><center>
									<INPUT TYPE="text" ID="EIF_display" NAME="EIFs" VALUE="0" disabled class="form-control" >
									</center>
									</div>
								
						
						   </div>
					
					
					<INPUT TYPE="hidden" ID="countTotal" NAME="CT" VALUE="0" class="form-control">
					


					

				</div>
				
					
				</div> <!-- div end for wel class-->
				
				
				<div class="row">
				<strong> <div class="col-lg-12"  > 
				
				<div class="col-lg-3 col-sm-3 col-md-3">
				 Rate each factor (Fi, i=1 to14) on a scale of 0 to 5:</div>
				<div class="col-lg-6 col-sm-6 col-md-6">
				<img class="img-responsive" src="scale.gif" alt="scale" >
				
				
				</div>
				
				
				
				
					</div></div>
					</strong><!--end of row-->
				
				<!-- factor 1--><div class="well">
									<div class="row">
			
									<div class="col-lg-12"  >
								
									<div class="col-lg-9 col-sm-9 col-md-9"> 
									
									F1. Does the system require reliable backup and recovery?
									
									</div>
									<div class="col-lg-3 col-sm-3 col-md-3">
									<input type="number" id="f1" value="0" min="0" max="5" class="form-control" >
									
				
									</div>
				
				
									</div>			
					
				</div>
				
				<!-- factor 2--><div class="row">
				
				 <div class="col-lg-12"  >
								
									<div class="col-lg-9 col-sm-9 col-md-9"> 
									
									F2. Are specialized data communications required to transfer information to or from the application?
									
									</div>
									<div class="col-lg-3 col-sm-3 col-md-3">
									<input type="number" id="f2" value="0" min="0" max="5" class="form-control">
									
				
									</div>
				
				
					</div></div>
					
				<!-- factor 3--><div class="row">
				
				 <div class="col-lg-12"  >
								
									<div class="col-lg-9 col-sm-9 col-md-9"> 
									
									F3. Are there distributed processing functions?
									
									</div>
									<div class="col-lg-3 col-sm-3 col-md-3">
									<input type="number" id="f3" value="0" min="0" max="5" class="form-control">
									
				
									</div>
				
				
					</div></div>
					
					<!-- factor 4--><div class="row">
				
				 <div class="col-lg-12"  >
								
									<div class="col-lg-9 col-sm-9 col-md-9"> 
									
									F4. Is performance critical?
									
									</div>
									<div class="col-lg-3 col-sm-3 col-md-3">
									<input type="number" id="f4" value="0" min="0" max="5" class="form-control">
									
				
									</div>
				
				
					</div>
					</div>
					<!-- factor 5--><div class="row">
				
				 <div class="col-lg-12"  >
								
									<div class="col-lg-9 col-sm-9 col-md-9"> 
									
									F5. Will the system run in an existing, heavily utilized operational environment?
									
									</div>
									<div class="col-lg-3 col-sm-3 col-md-3">
									<input type="number" id="f5" value="0" min="0" max="5" class="form-control">
									
				
									</div>
				
				
					</div></div>
					
					<!-- factor 6--><div class="row">
				
				 <div class="col-lg-12"  >
								
									<div class="col-lg-9 col-sm-9 col-md-9"> 
									
									F6. Does the system require online data entry?
									
									</div>
									<div class="col-lg-3 col-sm-3 col-md-3">
									<input type="number" id="f6" value="0" min="0" max="5" class="form-control">
									
				
									</div>
				
				
					</div></div>
					
					<!-- factor 7--><div class="row">
				
				 <div class="col-lg-12"  >
								
									<div class="col-lg-9 col-sm-9 col-md-9"> 
									
									F7. Does the online data entry require the input transaction to be built over multiple screens or operations?
									
									</div>
									<div class="col-lg-3 col-sm-3 col-md-3">
									<input type="number" id="f7" value="0" min="0" max="5" class="form-control">
									
				
									</div>
				
				
					</div></div>
					
					<!-- factor 8--><div class="row">
				
			 <div class="col-lg-12"  >
								
									<div class="col-lg-9 col-sm-9 col-md-9"> 
									
									F8. Are the ILFs updated online?
									
									</div>
									<div class="col-lg-3 col-sm-3 col-md-3">
									<input type="number" id="f8" value="0" min="0" max="5" class="form-control">
									
				
									</div>
				
				
					</div></div>
					
					<!-- factor 9--><div class="row">
				
				 <div class="col-lg-12"  >
								
									<div class="col-lg-9 col-sm-9 col-md-9"> 
									
									F9. Are the inputs, outputs, files, or inquiries complex?
									
									</div>
									<div class="col-lg-3 col-sm-3 col-md-3">
									<input type="number" id="f9" value="0" min="0" max="5" class="form-control">
									
				
									</div>
				
				
					</div></div>
					
					<!-- factor 10--><div class="row">
				
				 <div class="col-lg-12"  >
								
									<div class="col-lg-9 col-sm-9 col-md-9"> 
									
									F10. Is the internal processing complex?
								
									</div>
									<div class="col-lg-3 col-sm-3 col-md-3">
									<input type="number" id="f10" value="0" min="0" max="5" class="form-control">
									
				
									</div>
				
				
					</div></div>
					
					<!-- factor 11--><div class="row">
				
				 <div class="col-lg-12"  >
								
									<div class="col-lg-9 col-sm-9 col-md-9"> 
									
									F11. Is the code designed to be reusable?
									
									</div>
									<div class="col-lg-3 col-sm-3 col-md-3">
									<input type="number" id="f11" value="0" min="0" max="5" class="form-control">
									
				
									</div>
				
				
					</div></div>
					
					<!-- factor 12--><div class="row">
				
				 <div class="col-lg-12"  >
								
									<div class="col-lg-9 col-sm-9 col-md-9"> 
									
									F12. Are conversion and installation included in the design?
									
									</div>
									<div class="col-lg-3 col-sm-3 col-md-3">
									<input type="number" id="f12" value="0" min="0" max="5" class="form-control">
									
				
									</div>
				
				
					</div></div>
					
					<!-- factor 13--><div class="row">
				
				 <div class="col-lg-12"  >
								
									<div class="col-lg-9 col-sm-9 col-md-9"> 
									
									F13. Is the system designed for multiple installations in different organizations?
									
									</div>
									<div class="col-lg-3 col-sm-3 col-md-3">
									<input type="number" id="f13" value="0" min="0" max="5" class="form-control">
									
				
									</div>
				
				
					</div></div>
					
					<!-- factor 14--><div class="row">
				
				 <div class="col-lg-12"  >
								
									<div class="col-lg-9 col-sm-9 col-md-9"> 
									
									F14. Is the application designed to facilitate change and ease of use by the user?
									
									</div>
									<div class="col-lg-3 col-sm-3 col-md-3">
									<input type="number" id="f14" value="0" min="0" max="5" class="form-control">
									
				
									</div>
				
				
					</div></div>
					
			</div>
				
				
				
				<div class="row">
				 <div class="col-lg-12"  > <!-- display function points-->
				<div class="col-lg-3 col-sm-3 col-md-3">  <span class="pull-right">
				</div>
				
				<div class="col-lg-3 col-sm-3 col-md-3"> 
				<INPUT TYPE="hidden" ID="FunctionPoint" NAME="FP" VALUE="" class="form-control">
				 
				<button  class="btn btn-info btn-block"  type="reset">
				<i class="fa fa-refresh" aria-hidden="true"></i> Reset</button>
				
				</div>
				
				<div class="col-lg-3 col-sm-3 col-md-3"> 
				
				
				
				<button id="button" class="btn btn-success btn-block" onClick="" type="button"><i class="fa fa-calculator" aria-hidden="true"></i> Estimate<img src="../images/login.gif" id="img2" style="display:none; width:40px;height:40px;"/ ></button>
				
				</div>
				
					</div>
					 </div>
				
				
				
				</form>
				
				<script
 type="text/javascript" src ="cocomo.js">
         
		 	
	
		
        </script>
				
				
			
							
							
				
				
<!-- function point calculation end here-->
         <!-- /.row --> 
				
				
				
				
				
				
				
				
				
				
				
				</div>

             <!-- cocomo end here-->


            </div>
            <!-- /.container-fluid -->
</div>
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
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="fa fa-users"></span> Add Metric to project</h4>
         </div>
         <div class="modal-body">
           
		   <form method="Post/Redirect/Get" id="insert_form">
         <div class="row">
			   <div class="main col-lg-12 myHalfCol">
    <div class="col-lg-5">

              
			   <div class="well">
			
			
			 <table  id="myTable2" class="table table-hover">
			 <center><h4>Metric Details</h4></center>
   
    <tbody>
	<tr> <td>Type</td> <td>Basic Cocomo Model</td></tr>
	
    <tr> <td>Effort (person  month)</td> <td id="eff1" name="eff" ></td></tr>
	 <tr> <td>Duration(months)</td> <td id="time1" name="time" ></td></tr>
       <tr> <td>Size (KLOC)</td> <td id="size1" name="size"></td></tr>
       <tr> <td>Cost </td> <td id="cost1" name="cost"></td></tr>
	   <tr> <td>Product Design</td> <td id="pdesign1" name="pdesign"></td></tr>
	 <tr> <td>Detailed Design</td> <td id="ddesign1" name="ddesign"></td></tr>
       <tr> <td>Code & Unit Test</td> <td id="cut1" name="cut"></td></tr>
       <tr> <td>Integration & Test</td> <td id="it1" name="it"></td></tr>
	  <tr> <td>project type</td> <td id="model1" name="model"></td></tr>
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

<script src="js/CocomoScript.js"></script>

<input type="hidden"  id="e" value="1234" class="form-control">
<input type="hidden"  id="s" value="1234" class="form-control">
<input type="hidden"  id="c" value="1234" class="form-control">
<input type="hidden"  id="d" value="1234" class="form-control">
<input type="hidden"  id="pd" value="1234" class="form-control">
<input type="hidden"  id="dd" value="1234" class="form-control">
<input type="hidden"  id="ct" value="1234" class="form-control">
<input type="hidden"  id="i" value="1234" class="form-control">
<input type="hidden"  id="m" value="1234" class="form-control">



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

