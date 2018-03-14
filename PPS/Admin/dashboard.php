<?php   
 session_start();  
 date_default_timezone_set('Asia/Karachi');

header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate"); // HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0
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
        <script src="js/adminScript.js?<?php echo time(); ?>"></script>
		
		 
		
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
                            <a href="inbox.php"   >Read All Messages</a>
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
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i> Total Employees Vs Year</h3>
                            </div>
                            <div class="panel-body">
							  <form id="lineChart_form" method="post"  role="form">
							<div class="row">
							  <div class="col-xs-2">
							 
						   <label>From</label>
						   <?php
						  include("config.php");

						 $sql="SELECT MIN(`regDate`) FROM `employee`";
						 $result = mysqli_query($connect, $sql);
						 $row = mysqli_fetch_array($result);
						 $minYear=(int)substr($row[0],0,4);
						 $maxYear=(int)date("Y");
						  
						echo "<select id='from' name='from' class='form-control'>";
						echo" <option value=''>--From--</option>";
						
						for($i= $minYear;$i<=$maxYear;$i++){
					
						echo" <option value='" . $i."'> ".$i."</option>";
					}
						 echo "</select><br><br>";
						  
						   
						   ?>
						  
						  </div>
							
						   <div class="col-xs-2">
						   <label>To</label>
							 <?php
						  include("config.php");
                         
						 $sql="SELECT MIN(`regDate`) FROM `employee`";
						 $result = mysqli_query($connect, $sql);
						 $row = mysqli_fetch_array($result);
						 $minYear=(int)substr($row[0],0,4);
						 $maxYear=(int)date("Y");
						  
						echo "<select id='to' name='to' class='form-control'>";
						echo" <option value=''>--To--</option>";
						for($i= $minYear;$i<=$maxYear;$i++){
					    
							   echo" <option value='" . $i."'> ".$i."</option>";
						   
						
					}
						 echo "</select><br><br>";
						  
						   
						   ?>
							
							
						    </div>
							<br>
							 <div class="col-xs-2">
							 <button id="chartbtn" class="btn btn-danger" type="submit" ><i class="fa fa-bar-chart"></i>View Chart<img src="../images/oo.gif" id="img2" style="display:none; width:40px;height:40px;"/ ></button>
             
							
							</div>
							
							</div>
							</form>
							   <div id="from_t0"></div>
                                <div id="morris-line-chart"></div>
                                <div class="text-right">
                                    <a href="staff.php">View Details <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<script src="js/linechart.js"></script>
			 
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i> Employees Job Status</h3>
                            </div>
                            <div class="panel-body">
                                <div id="morris-donut-chart"></div>
                               
                            </div>
                        </div>
                    </div>
                  
                    <div class="col-lg-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i>Employees Work Status</h3>
                            </div>
                            <div class="panel-body">
                                <div id="morris-donut-chart2"></div>
                                
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

</html>
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
