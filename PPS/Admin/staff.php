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
		<script src="js/indexScript.js"></script>
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
                    <li >
                        <a id="dash_board" href="#" onclick='return false;'><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
					<li class="active">
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
                            Staff <small>Accounts</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-users"></i> Staff                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <?php

                                               include("config.php");
											   $query = "SELECT * FROM employee";
											   $result = mysqli_query($connect, $query);
														
										       $count1 = mysqli_num_rows($result);
											   
											   $query = "SELECT * FROM employee WHERE jobStatus='Employee'";
											   $result = mysqli_query($connect, $query);
														
										       $count2 = mysqli_num_rows($result);
											
											   $query = "SELECT * FROM employee WHERE jobStatus='Ex-Employee'";
											   $result = mysqli_query($connect, $query);
														
										       $count3 = mysqli_num_rows($result);
										         

										?>

                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
									<div class="huge" id="total"><?php  echo $count1;?></div>
									
                                        
                                        <div>Total Employees</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#" id="total_emp" onclick='return false;'>
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
					 
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-briefcase fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
									<div class="huge" id="cur"><?php  echo $count2;?></div>
                                        
                                        <div>Current Employees</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#" id="current_emp" onclick='return false;'>
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
							 
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-red" >
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user-times fa-5x" ></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
										<div class="huge" id="ex"><?php  echo $count3;?></div>
                                        <div>Ex-Employees</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#" id="ex_emp" onclick='return false;'>
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
                    
<!-- /.row -->
								<div id="employee_table">	
								
								<div class="col-lg-12">
                        
						    <div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h3 class="panel-title"></i>Accounts</h3>
                            </div>
                            <div class="panel-body">
                                <!-- /.row -->
					  <form>               
					  <div class="row">
						<div class="col-lg-12">
							 <div class="form-group pull-right">
						   <button type="button" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-success"><i class="fa fa-plus"></i> Create Account</button>
						</div> </div> </div>
                     </form>
						
							
	<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
            <tr>
                     <th>Id</th> 
					 <th>Image</th>
                     <th>Name</th>
                     <th>Email</th>
                     <th><center>Roles</center></th>
                     <th>Work Status</th>
                     <th><center>Actions</center></th>
					    
                  </tr>
        </thead>
        
        <tbody>
		 <?php
		  include("config.php");
		   $query = "SELECT * FROM employee  ";
		   $result = mysqli_query($connect, $query);
            
                     while($row = mysqli_fetch_array($result))
                     {
                     ?>
                  <tr>   
                      <td><?php echo $row["empId"]; ?></td>
					  <td><center> <img class="img-circle" src=" <?php echo $row['image'];?> " width="40px" height="40px" /></center></td>
                      <td><?php echo $row["empName"]; ?></td>
                     <td><?php echo $row["email"]; ?></td>
                     <td><ul style="list-style-type:square">
					 <?php 
					 
					  $query2 = "SELECT * FROM employeeroles  WHERE empId='".$row["empId"]."'";  
					 $result2 = mysqli_query($connect, $query2);
            
                     while($row2 = mysqli_fetch_array($result2))
                     {$query21 = "SELECT * FROM role  WHERE roleId='".$row2["roleId"]."'";  
					 $result21 = mysqli_query($connect, $query21);
            
                     while($row21 = mysqli_fetch_array($result21))
                     {
						 
					echo '<li>'.$row21["roleName"].'</li>'; 
					 }
					 }
					 ?></ul></td>
                     <td ><center><?php 
					 if($row["workStatus"]=='Active')
					 {
					 echo '<p  style="background-color: #00D211; color:white">'.$row["workStatus"].'</p>'; 
					 }
					 else  if($row["workStatus"]=='In-Active'){
						 echo '<p  style="background-color: #FE0000; color:white">'.$row["workStatus"].'</p>'; 
					 }
					 else{
						 echo '<p  style="background-color: #FDC305; color:white">'.$row["workStatus"].'</p>'; 
					 }
					 ?> </center></td>
                      <td>  <button type="button" name="view" value="view" id="<?php echo $row["empId"]; ?>" class="btn btn-warning btn-xs view_data" /><i  class="fa fa-search-plus"></i> View</button>
                     
                    <button type="button" name="edit" value="edit" id="<?php echo $row["empId"]; ?>" class="btn btn-info btn-xs edit_data" /><i class="fa fa-pencil-square-o" ></i> Edit</button>
                     <?php  if($row["workStatus"]=='Administrator'){?>
                      <button type="button" name="delete" value="delete" id="<?php echo $row["empId"]; ?>" title='Can not be deleted' class="btn btn-danger btn-xs delete_data" disabled><i class="fa fa-trash-o"></i> Delete</button>
                 <?php    } else{?>
				 
				 <button type="button" name="delete" value="delete" id="<?php echo $row["empId"]; ?>" class="btn btn-danger btn-xs delete_data" /><i class="fa fa-trash-o"></i> Delete</button>
                
				  <?php    } ?>
				 
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
             <center><h4><span class="glyphicon glyphicon-user"></span> Register Employee</h4></center>
         </div>
         <div class="modal-body">
<form method="post" action="" id="insert_form">
            <div class="well"> <div class="row">
               <div class="col-xs-4">
                  <label>Name<sup><span style = "color: red;  font-size: 10px;" class="glyphicon glyphicon-asterisk"></span></sup></label>
			  <input type="text" name="empName" id="empName" placeholder="Enter Employee Name " class="form-control" required>
                
               </div>
			  
			    <div class="col-xs-8">
			     <label>Select Image</label>  
	           
                 <input type="file" name="images[]" id="select_image"  />   <br />
                  </div> 
				  
				  </div>
				   <div class="row">
				  <div class="col-xs-4">
                  <label>Gender<sup><span style = "color: red;  font-size: 10px;" class="glyphicon glyphicon-asterisk"></span></sup></label>
                  <select name="gender" id="gender" class="form-control">
                     <option value="Male">Male</option>
                     <option value="Female">Female</option>
                  </select>
               </div>
              <div class="col-xs-4">
                <label>Date Of Birth<sup><span style = "color: red;  font-size: 10px;" class="glyphicon glyphicon-asterisk"></span></sup></label>
               <input type="date" name="dob" id="dob" class="form-control" required>  <br /> 
			    <input type="hidden" name="curDate" id="curDate" value="<?php echo date("Y-m-d");  ?>" class="form-control" required>   
                </div> 
				
				
				<div class="col-xs-4">
					 <label>CNIC<sup><span style = "color: red;  font-size: 10px;" class="glyphicon glyphicon-asterisk"></span></sup></label>
               <input type="text" name="cnic" id="cnic" placeholder="XXXXX-XXXXXXX-X" class="form-control" required>
                </div>
				
				
				
				</div>
				<div class="row">
				  <div class="col-xs-4">
				 
               <label>Email<sup>
			   <span style = "color: red;  font-size: 10px;" class="glyphicon glyphicon-asterisk"></span></sup></label>
               <input type="text" name="email" placeholder="Enter Email " id="email" class="form-control" data-error="That email address is invalid" required>
             </div>
				
				  <div class="col-xs-4">
				  <label>Contact No<sup><span style = "color: red;  font-size: 10px;" class="glyphicon glyphicon-asterisk"></span></sup></label>
                <div class="input-group">
				<span class="input-group-addon">03</span>
			   <input type="text" name="contactNo" placeholder="XX-XXXXXXX"id="contactNo" class="form-control" required>
			   </div>
                </div>

				<div class="col-xs-4">
                <label>Address<sup><span style = "color: red;  font-size: 10px;" class="glyphicon glyphicon-asterisk"></span></sup></label>
			   <textarea name="address" id="address" class="form-control"placeholder="Enter Employee Address "  required></textarea>
              </div> 
				
				
				</div>
				</div>
				
				 
				
				  <div class="well"> 
				<div class="row">
				
				 <div class="col-xs-12">
             <label>Roles<sup><span style = "color: red;  font-size: 10px;" class="glyphicon glyphicon-asterisk"></span></sup></label>
              
			    <br />
				
				
					 <?php
		  include("config.php");
		   $query = "SELECT * FROM `role` ORDER BY `role`.`roleId` ASC";
		   $result = mysqli_query($connect, $query);
            
                     while($row = mysqli_fetch_array($result))
                     {
						  
                     	echo ' <input type="checkbox" class="skills" name="skills[]" 
					 
					 onclick="checkFun(\'name'.$row['roleId'].'\');"
					   id="name'.$row['roleId'].'" value="'.$row['roleId'].'">'.$row['roleName'];?>
       	 

			   
				&nbsp&nbsp  
				
					 <?php }
					 
				
				 
					 
					 ?>
			 
								
						  
			  
				</div> 
			  </div> 
			  <br />
              <div class="row">
                
			  
			  
			   <div class="col-xs-2">
               <label>System Analysing Experience</label>
               <input type="number" min="0" placeholder="Enter Years" id="aname1" name="aname1" disabled="disabled" class="form-control" >
               </div> 
			   <div class="col-xs-2">
               <label>Database Designing Experience</label>
               <input type="number" min="0" placeholder="Enter Years" id="aname2" name="aname2" disabled="disabled" class="form-control" >
               </div> 
			    <br /><div class="col-xs-2">
               <label>Programming Experience</label>
               <input type="number" min="0" placeholder="Enter Years" id="aname3" name="aname3" disabled="disabled" class="form-control" >
               </div>
				 <div class="col-xs-2">
               <label>Testing Experience</label>
               <input type="number" min="0" placeholder="Enter Years" id="aname4" name="aname4" disabled="disabled" class="form-control" >
               </div>		   
				 <div class="col-xs-2">
               <label>Web Developing Experience</label>
               <input type="number" min="0" placeholder="Enter Years" id="aname5" name="aname5" disabled="disabled" class="form-control" >
               </div>
			    <div class="col-xs-2">
               <label>App Developing Experience</label>
               <input type="number" min="0" placeholder="Enter Years" id="aname6" name="aname6" disabled="disabled" class="form-control" >
               </div>
			  </div>
			 <hr>
				<div class="row">
				
			  <div class="col-xs-12">
             <label>Languages<sup><span style = "color: red;  font-size: 10px;" class="glyphicon glyphicon-asterisk"></span></sup></label>
             	<script>
					function checkFun(var1) {
								
					var cc='#'+var1;
					if($(cc).prop('checked') == true){
						cc='#a'+var1;
					$(cc).prop('disabled', false);
				   $(cc).focus()
				   
}
					 else{
						 cc='#a'+var1;
					   $(cc).prop('disabled', true);
					 $(cc).val('');
					   $(cc).attr("placeholder", "Enter Years");
				    
					}}
                  </script>	
			    <br />
				 <?php
		  include("config.php");
		   $query = "SELECT * FROM language ";
		   $result = mysqli_query($connect, $query);
            
                     while($row = mysqli_fetch_array($result))
                     {
						 
						echo '<input type="checkbox" class="Languages" name="Languages[]"  id="a'.$row['languageId'].'" value="'.$row['languageId'].'">'.$row['languageName'];
                     ?>
       	 

			   
				&nbsp&nbsp  
				
					 <?php }
					 
					 
					 
					 
					 
					 
					 ?>
					 
					 
				</div> 
			  </div> 
			  	  </div> 
			  
			<div class="well">
              <div class="row">
                
			  
			  
			   <div class="col-xs-3">
               <label>Monthly Salary<sup><span style = "color: red;  font-size: 10px;" class="glyphicon glyphicon-asterisk"></span></sup></label>
              <div class="form-group input-group">
			 <span class="input-group-addon">Rs</span>  
			 <input type="text" placeholder="Enter Salary " name="salary" id="salary" class="form-control" required>
               </div> </div> 
			      <div class="col-xs-3">
               <label>Position<sup><span style = "color: red;  font-size: 10px;" class="glyphicon glyphicon-asterisk"></span></sup></label>
             
			 
			 <select name="position" id="position"  class="form-control" required>
			   
				<option value="Developer">Developer</option>
               <option value="Project Manager">Project Manager</option>				
				 <option value="Administrator">Administrator</option>
                           
				 	
						</select>
						
					 </div> 
						   
				 <div class="col-xs-3">		   
               <label>Job Status<sup><span style = "color: red;  font-size: 10px;" class="glyphicon glyphicon-asterisk"></span></sup></label>
               
                    
			<select name="jobStatus" id="jobStatus"  class="form-control" required>
				<option value="Employee">Employee</option>
				<option value="Ex-Employee">Ex-Employee</option>
				
			</select>
                   
             </div>
			 <div class="col-xs-3">
               <label>Work Status<sup><span style = "color: red;  font-size: 10px;" class="glyphicon glyphicon-asterisk"></span></sup></label>
              
			    <select name="workStatus" id="workStatus"  class="form-control" required>
                           <option value="In-Active">In-Active</option>
							 <option value="Active">Active</option>
                            <option value="On Leave">On Leave</option>    
                        </select>
               
              </div>
			  </div>
			   </div> 
			  
			  
			  
			 <br />
               <input type="hidden" name="employee_id" id="employee_id">
                <div class="row"><div class="col-xs-12">
				 <button type="reset" id="rs"class="btn btn-default">Reset</button>
			     <input type="submit" name="insert" id="insert" class="btn btn-success pull-right" value="Insert" >
              </div> </div>
				   <br />
					
				
			  </form>

 

        


		</div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
<div id="dataModal" class="modal fade">
   <div class="modal-dialog modal-lg" >
      <div class="modal-content">
         <div class="modal-header" style=" background-color: #D4C5EE;color:black;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <center><h4><span class="glyphicon glyphicon-user"></span>&nbsp&nbspEmployee Details</h4></center>
         </div>
         <div class="modal-body" id="employee_detail">
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