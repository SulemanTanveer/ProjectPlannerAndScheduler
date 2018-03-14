<?php   
 session_start();  
$connect = mysqli_connect("localhost", "root", "", "PPS");
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>PPS</title>  
           <link rel="stylesheet" href="css/bootstrap.min.css" />  
            <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
          <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<style>
body  {
    background-image: url("images/bg.jpg");
  
}
</style>
</head>     
	 <body>  
           <br />  
           <div class="container" style="width:700px;">  
                <h1 align="center">Project Planner & Scheduler</h1><br />  
				<center><img src="images/mainLogo.png" style=" width:300px;height:100px;"/ ></center>
                <br />  
                <br />  
                <br />  
                <br />  
                <br />  
               
                <?php if(isset($_SESSION['username']))  
                {  
                   
                 
				   $query = "  SELECT * FROM employee WHERE empId = '". $_SESSION['id']."'";  
					$result = mysqli_query($connect, $query);  
     
					while($row = mysqli_fetch_array($result))
					 {
						 $position=$row['position'];
						  
						 if($position=='Project Manager'){
							  header('Location: Project Manager/dashboard.php');
						 }
						 else if($position=='Administrator'){
							  header('Location: Admin/dashboard.php');
						 }
						 else if($position=='Developer'){
							  header('Location:Developer/project.php');
						 }
					 }

				}
               
                 ?>
                    
<div >
		 <label>Email</label>  
		 <div class="input-group">
		 		<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                     <input type="text" name="username" id="username" class="form-control" />  </div>
                     <br />  
                     <label>Password</label>  
					 <div class="input-group">
		 		<span class="input-group-addon"><i class="fa fa-lock fa" aria-hidden="true"></i></span>
                     <input type="password" name="password" id="password" class="form-control" />  </div>
                     <br /> 
                     <button type="button" name="login_button" id="login_button" class="btn btn-primary btn-lg btn-block loginButton"><span><i class="fa fa-sign-in fa" aria-hidden="true"></i></span> Login<img src="images/login.gif" id="img1" style="display:none; width:40px;height:40px;"/ ></button> 
                     <center><h4> <a href='' id='pswd_modal'onclick='return false;'   style='color:black;'>Forgot Password?</a> </h4></center>
         
	   </div>						              
			    
                  
           </div>  
           <br />  
		   
	
      </body>  
 </html>  
 
 <div id="dataModal" class="modal fade" >
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header" style=" background-color: #4285F4 ;color:white;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
           <center> <h4 class="modal-title"><span class="glyphicon glyphicon-lock"></span>&nbsp&nbspRecover Password</h4> </center>
         </div>
         <div class="modal-body" id="message_detail">
		 
		 
		  <label>Please Enter Email</label>  
		 <div class="input-group">
		 		<span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                     <input type="email" name="email1" placeholder='Please enter email address associated with your account'id="email1" class="form-control" required>  
		</div>       <br> <button type="button" name="login_button2" id="login_button2" class="btn btn-primary  pull-right"><span><i class="fa fa-sign-in fa" aria-hidden="true"></i></span> Submit<img src="images/login.gif" id="img1" style="display:none; width:40px;height:40px;"/ ></button> 
              <center> <img src="images/2.gif" id="img22" style="display:none; height"/ ></center>
			   
			   
			   <br>   
		 </div>
 
        
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div>
      </div>
   </div>
</div>
 
 
  <script>  
 $(document).ready(function(){  
 $(document).bind('keypress', function(e) {
            if(e.keyCode==13){
                 $('#login_button').trigger('click');
             }
        });
		
	
		
		
      $('#login_button').click(function(){  
           var username = $('#username').val();  
           var password = $('#password').val(); 
           $('#img1').show();		   
           if(username != '' && password != '')  
           {
                $.ajax({  
                    url:"login.php",  
                     method:"POST",  
                     data: {username:username, password:password},  
                     success:function(data)  
                     {  
                          
						  $('#img1').hide();
                          if($.trim(data) ==='No')  
                          {     
                               alert("Invalid Username or Password\nPlease enter correct username and password");  
								                         
						 }  
                          else  if($.trim(data) ==='Project Manager')  
                          {  
                              window.location.href="Project Manager/dashboard.php";
                          } 
						  else  if($.trim(data) ==='Administrator')  
                          {  
                              window.location.href="Admin/dashboard.php";
                          }   
						else  if($.trim(data) ==='Developer')  
                          {  
                              window.location.href="Developer/project.php";
                          }    						  
                     }  
                });  
           }  
           else  
           {   $('#img1').hide();
                alert("Both Fields are required");  
           }  
      });  
       
	   
	   
	  
	    $('#login_button2').click(function(){  
           var email = $('#email1').val();  
          var flag1=false;
           if(email!= '')  
           {
			   if (validateEmail(email)==false) {
  
             
           alert('Please Enter Valid Email Address');
	   
        }else {   
				 $('#img22').show();		 
              
			  
			 $.ajax({  
                    url:"forgotPassword.php",  
                     method:"POST",  
                     data: {email:email},  
                     success:function(data)  
                     {       alert(data);
						  $('#img22').hide();
						  
                          $('#dataModal').modal('hide');
						
                     }  
                });
			 
			 


				
		   }}
           else  
           {    
                alert("Please Enter Your Email");  
           }  
      });
	   
	   
	   
	   
	   
	   
	   
 });  
 
   //////////////////////////////////////////////////////////////
   ////////////////Email Validation function///////////////////
   //////////////////////////////////////////////////////////////
   var count=0;
   function validateEmail(email) {

    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
"^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$"
    if (filter.test(email)) {
        return true;
       
    }
    else {
		 
	   $('#email1').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
	    count++;
        return false;

   }
   }
 
		 $('#pswd_modal').click(function(){ 
		   $('#email1').val('');
		    $('#email1').focus();
           $('#dataModal').modal('show');
		   if(count>0){
		   $('#email1').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
		   }
		 });   
	   
 </script>