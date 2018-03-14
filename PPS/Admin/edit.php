<?php
 include("config.php");
$output.='

<form method="post" action="" id="insert_form">
            <div class="well"> <div class="row">
               <div class="col-xs-4">
                  <label>Name<sup><span style = "color: red;  font-size: 10px;" class="glyphicon glyphicon-asterisk"></span></sup></label>
			  <input type="text" value="'.$$row['gender'].'" name="empName" id="empName" placeholder="Enter Employee Name " class="form-control" required>
                
               </div>
			  
			    <div class="col-xs-8">
			     <label>Select Image</label>  
	           
                 <input type="file" name="images[]" id="select_image" multiple />   <br />
                  </div> 
				  
				  </div>
				   <div class="row">
				  <div class="col-xs-4">
                  <label>Gender<sup><span style = "color: red;  font-size: 10px;" class="glyphicon glyphicon-asterisk"></span></sup></label>
                  <select name="gender" id="gender" class="form-control">';
if($row['gender']=='Male'){
				$output.='  <option value="Male" selected>Male</option>
                     <option value="Female">Female</option>';
}else{
	
		$output.='  <option value="Male">Male</option>
                     <option value="Female" selected>Female</option>';
	
}
          $output.='        </select>
               </div>
              <div class="col-xs-4">
                <label>Date Of Birth<sup><span style = "color: red;  font-size: 10px;" class="glyphicon glyphicon-asterisk"></span></sup></label>
               <input type="date" value="'.$row['dob'].'" name="dob" id="dob" class="form-control" required>  <br /> 
			    <input type="hidden" name="curDate" id="curDate" value="<?php echo date("Y-m-d");  ?>" class="form-control" required>   
                </div> 
				
				
				<div class="col-xs-4">
					 <label>CNIC<sup><span style = "color: red;  font-size: 10px;" class="glyphicon glyphicon-asterisk"></span></sup></label>
               <input type="text" value="'.$row['cnic'].'" name="cnic" id="cnic" placeholder="XXXXX-XXXXXXX-X" class="form-control" required>
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
       
			    <br />
				 <?php
		  include("config.php");
		   $query = "SELECT * FROM language ";
		   $result = mysqli_query($connect, $query);
            
                     while($row = mysqli_fetch_array($result))
                     {
						 
						 <input type="checkbox" class="Languages" name="Languages[]"  id="a'.$row['languageId'].'" value="'.$row['languageId'].'">'.$row['languageName'];
                    
       	 

			   
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
							<option value="Worker">Worker</option>                               
						   <option value="Administrator">Administrator</option>
                            <option value="Project Manager">Project Manager</option>
                            
                        </select>
						
					 </div> 
						   
				 <div class="col-xs-3">		   
               <label>Job Status<sup><span style = "color: red;  font-size: 10px;" class="glyphicon glyphicon-asterisk"></span></sup></label>
               
                    
			<select name="jobStatus" id="jobStatus"  class="form-control" required>
				<option value="Employee">Employee</option>
				<option value="Employee">Ex-Employee</option>
				
			</select>
                   
             </div>
			 <div class="col-xs-3">
               <label>Work Status<sup><span style = "color: red;  font-size: 10px;" class="glyphicon glyphicon-asterisk"></span></sup></label>
              
			    <select name="workStatus" id="workStatus"  class="form-control" required>
                            <option value="Active">Active</option>
                            <option value="In-Active">In-Active</option>
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
					
				
			  </form>';
?>
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