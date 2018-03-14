<?php

	
   include("config.php");  
   
  
   $output2='';
	    $flag=false;
 $id='';	 
 
  $languageId='';
 
   $select_query = "SELECT * FROM project  WHERE projId = '".$_POST["proj_id"]."'";  
     $result = mysqli_query($connect, $select_query);
	 if(mysqli_num_rows($result)>0){
	 $row5 = mysqli_fetch_array($result);
    $select_query8 = "SELECT * FROM team WHERE teamId = '".$row5['teamId']."'";  
     $result8 = mysqli_query($connect, $select_query8);
	 	 if(mysqli_num_rows($result8)>0){
	$row8 = mysqli_fetch_array($result8);
		 $id=$row8['teamId'];
		 $name=$row8['teamName'];
		 		    $flag=true;
	 }}

    $output2 .="<select name='teamId1' id='opt3' class='form-control'>";
	
	
$output2.="<option value='Un Assign' selected>".'Un Assign'."</option>";

 if($flag){
	 $output2 .=" <option value='" . $id."' selected>".$name."</option>";
 }
  $sql="SELECT* FROM team WHERE teamStatus='In-Active'";
 $result = mysqli_query($connect, $sql);
  if(mysqli_num_rows($result)>0){
    while ($row = mysqli_fetch_array($result)) {
           
   $output2 .=" <option value='" . $row['teamId']."' >".$row['teamName']."</option>";
			 
			
  }}
     $output2 .="</select>";
	  
	  
  
			 
			   
   $output = '';
		
		  $projName='';
		  $projStatus='';
		  $deadline='';
		  $completionDate='';
		  $projStatus='';
		  $description='';
      $projId='';
      $select_query = "SELECT * FROM project WHERE projId = '".$_POST["proj_id"]."'";  
     $result = mysqli_query($connect, $select_query);
	  while($row = mysqli_fetch_array($result))
     {     $projId=$row["projId"];
		  $projName=$row["projName"];
		  $projStatus=$row["projStatus"];
		  $deadline=$row["deadline"];
		  $startDate=$row["startDate"];
		  $completionDate=$row["completionDate"]; 
		  $projStatus=$row["projStatus"];
		 $cur=$row["regDate"];
		  $description=$row["description"];
		   $languageId=$row["languageId"];
		   $InProgDate=$row["InProgDate"];
		  
	 }
	 
	  $output7  ="<select name='projLanguage2' id='projLanguage2' class='form-control'>";
	  $select_query7 = "SELECT * FROM language ";  
     $result7 = mysqli_query($connect, $select_query7);
	  while($row7 = mysqli_fetch_array($result7))
     {  
        if($row7["languageId"]==$languageId)
		{
			 $output7 .=" <option value='" . $row7["languageId"]."' selected>".$row7['languageName']."</option>";
			
		}
	else{
		 $output7 .=" <option value='" . $row7['languageId']."' >".$row7['languageName']."</option>";
		
	}
	
	}
 
	$output7 .="</select>";	
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	$output .= '<div class="col-lg-12">
                        
						    <div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h3 class="panel-title"></i>Projects</h3>
                            </div>
                            <div class="panel-body">
	 <form method="post"  id="insert_form1">
              
			   <div class="row">
			   
               <div class="col-xs-4">
                  <label>Project Name <sup><span style = "color: red;  font-size: 10px;" class="glyphicon glyphicon-asterisk"></span></sup></label><input type="text" name="projName" id="projName" value="'.$projName.'" placeholder="Enter Project Name " class="form-control" required>
                
               </div>
			      <div class="col-xs-4">
				<label>Assign To</label>';
			   $output .= ''.  $output2.'';
			   $output .= ' 	</div>
			   <div class="col-xs-4">';
			   
	 
	
	$output .= '    <label>Project Status <sup><span style = "color: red;  font-size: 10px;" class="glyphicon glyphicon-asterisk"></span></sup></label>
          
		   <select name="projStatus" id="opt4"  class="form-control" required>';
		   
		   if($projStatus=='Pending'){
				$output .= '<option value="Pending" selected>Pending</option>  
                          <option value="Completed" >Completed</option> ';
		   }
		   else  if($projStatus=='In-Progress'){
				$output .= '
                            <option value="In-Progress" selected>In-Progress</option>
					  	<option value="Completed" >Completed</option>';
		   }
		   else  if($projStatus=='Not Started'){
				$output .= '
							 <option value="Not Started" selected>Assign(Not Started)</option>
                             <option value="Completed" >Completed</option>';
		   }
               else  if($projStatus=='Completed'){
				$output .= '
							 <option value="Not Started" >Assign(Not Started)</option>
                           <option value="Completed" selected>Completed</option>   ';
		   }    
          $output .= '              </select>';
	
 
						
	////////////////////////////////////					
	 $select_query44 = "SELECT * FROM metric WHERE pID= '".$_POST["proj_id"]."' AND type='fp'";  
     $result44 = mysqli_query($connect, $select_query44);
	 $row44 = mysqli_fetch_array($result44);
	 
     $select_query444 = "SELECT * FROM fp_metric WHERE mID = '".$row44["mID"]."' ";  
     $result444 = mysqli_query($connect, $select_query444);
	 $row444 = mysqli_fetch_array($result444);	
if(mysqli_num_rows($result444)){
	
	$func_point=$row444 ['functionPoint'];
	
}
else{
	$func_point='';
	
}

//////////////////////////////////

$select_query44 = "SELECT * FROM metric WHERE pID= '".$_POST["proj_id"]."' AND type='ucp'";  
     $result44 = mysqli_query($connect, $select_query44);
	 $row44 = mysqli_fetch_array($result44);
	 
     $select_query444 = "SELECT * FROM ucp_metric WHERE mID = '".$row44["mID"]."' ";  
     $result444 = mysqli_query($connect, $select_query444);
	 $row444 = mysqli_fetch_array($result444);	
if(mysqli_num_rows($result444)){
	
	$ucp_point=$row444 ['ucp'];
	
}
else{
	$ucp_point='';
	
}
		
						
	////////////////////////////////////////					
				 	
		      $output .= '  		   </div>
				
			   
			   </div>
			  <br>  
			   <div class="row">
					<div class="col-xs-3">
					 <label>Deadline <sup><span style = "color: red;  font-size: 10px;" class="glyphicon glyphicon-asterisk"></span></sup></label>
               <input type="date" name="deadline" value="'. $deadline.'" id="deadline22" placeholder="Deadline" class="form-control" required>
                </div>
					<div class="col-xs-3"> <input type="hidden" name="orginal_language" value="'.$languageId .'"  id="orginal_language" class="form-control" >
              ';
					 
				 
					 $output .= ' <label class="ccc">Start Date<sup><span style = "color: red;  font-size: 10px;" class="glyphicon glyphicon-asterisk"></span></sup></label>';
					  $query5 = "SELECT * FROM task WHERE projId = '$projId'  " ;  
      $result5 = mysqli_query($connect, $query5);  
	  if(mysqli_num_rows( $result5 )==0){
		  
		  $output .= ' <input type="hidden" name="curDate2" id="curDate2" value="'.$cur .'" class="form-control" required>
			   <input type="date" name="startDate" value="'.$startDate .'"  id="startDate" placeholder="Start Date" class="form-control" >
                  <input type="hidden" name="in_proj_date" value="'.$InProgDate .'"  id="in_proj_date" class="form-control" >
             
				</div>
			   
				';
		   
	  }
             else{  $output .= ' <input type="hidden" name="curDate2" id="curDate2" value="'.$cur .'" class="form-control" required>
			   <input type="date" name="startDate" value="'.$startDate .'"  id="startDate" placeholder="Start Date" class="form-control" readonly>
                  <input type="hidden" name="in_proj_date" value="'.$InProgDate .'"  id="in_proj_date" class="form-control" >
              
				</div>
			   
				';
			 }
				
			   $output .= '  
				
				<div class="col-xs-3">
					 <label>Major Language</label>';
                $output .=$output7;
				
				if($projStatus=='Completed'){
               $output .= '   </div>
				
					<div class="col-xs-3">
					 <label>Description</label>
               <textarea name="description"  id="description"  class="form-control" >'.$description .'</textarea>
                 </div>
				 
				 
				 
				 </div>	   
				<br>

				
				
				
				
				
				<div class="row">
	 <div class="col-xs-3"><label>Function Point</label>
	<div class="input-group">
      <input type="text" class="form-control" id="FunctionPoint" value="'.$func_point.'"  name="FunctionPoint" readonly>
      <div class="input-group-btn">
        <button class="btn btn-success" type="button" data-toggle="modal" id="add1" data-target="#modal1"><i class="glyphicon glyphicon-plus-sign"></i></button>
      </div>
    </div>
	</div>
	 <div class="col-xs-3"> <label>Usecase Point</label>
	<div class="input-group">
      <input type="text" class="form-control" id="UCP" value="'.$ucp_point.'"  name="UCP" readonly>
      <div class="input-group-btn">
        <button class="btn btn-success" type="button" data-toggle="modal" id="add2" data-target="#modal2"><i class="glyphicon glyphicon-plus-sign"></i></button>
      </div>
    </div>
	</div>
	 <div class="col-xs-3"> <label>Size (KLOC)</label>
	<div class="input-group">
      <input type="text" class="form-control" id="size"placeholder="Size" name="size" readonly>
      <div class="input-group-btn">
        <button class="btn btn-success" type="button" data-toggle="modal" id="add3" data-target="#modal3"><i class="glyphicon glyphicon-plus-sign"></i></button>
      </div>
    </div>
	</div>
		 <div class="col-xs-3"> <label>COST (RS)</label>
	<div class="input-group">
      <input type="number" class="form-control" id="cost4" placeholder="Search" name="cost">
     
    </div>
	</div>
	
	
</div>

				
				
			 <input type="hidden" name="proj_id" id="proj_id" value="'.$projId .'" class="form-control">
              <br />
			  <div class="form-group pull-right">
			   <input type="submit" name="insert" id="insert" value="Update" class="btn btn-primary" />
			    </div>
				
                </form>
	
	
	';
				}
				else{
					
					  $output .= '   </div>
				
					<div class="col-xs-3">
					 <label>Description</label>
               <textarea name="description"  id="description"  class="form-control" >'.$description .'</textarea>
                 </div>
				 
				 
				 
				 </div>	   
				<br>
 
				<div class="row">
	 <div class="col-xs-3"><label>Function Point</label>
	<div class="input-group">
      <input type="text" class="form-control" id="FunctionPoint" value="'.$func_point.'"  name="FunctionPoint" disabled>
      <div class="input-group-btn">
        <button class="btn btn-success" type="button" data-toggle="modal" id="add1" data-target="#modal1" disabled><i class="glyphicon glyphicon-plus-sign"></i></button>
      </div>
    </div>
	</div>
	 <div class="col-xs-3"> <label>Usecase Point</label>
	<div class="input-group">
      <input type="text" class="form-control" id="UCP" value="'.$ucp_point.'"  name="UCP" disabled>
      <div class="input-group-btn">
        <button class="btn btn-success" type="button" data-toggle="modal" id="add2" data-target="#modal2" disabled><i class="glyphicon glyphicon-plus-sign"></i></button>
      </div>
    </div>
	</div>
	 <div class="col-xs-3"> <label>Size (KLOC)</label>
	<div class="input-group">
      <input type="text" class="form-control" id="size"placeholder="Size" name="size" disabled>
      <div class="input-group-btn">
        <button class="btn btn-success" type="button" data-toggle="modal" id="add3" data-target="#modal3" disabled><i class="glyphicon glyphicon-plus-sign"></i></button>
      </div>
    </div>
	</div>
		 <div class="col-xs-3"> <label>COST (RS)</label>
	<div class="input-group">
      <input type="number" class="form-control" id="cost4" placeholder="Search" name="cost" disabled>
     
    </div>
	</div>
	
	
</div>

				
				
			 <input type="hidden" name="proj_id" id="proj_id" value="'.$projId .'" class="form-control">
              <br />
			  <div class="form-group pull-right">
			   <input type="submit" name="insert" id="insert" value="Update" class="btn btn-primary" />
			    </div>
				
                </form>
	
	
	';
					
				}
	
	echo"
	<script src='js/projectScript.js'></script>
	";
	
	
    echo $output;
	
	?>
	<script>
 

	</script>
	
   <div id="modal1" class="modal fade">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" style=" background-color:#5cb85c ;color:white;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
           <center> <h4 class="modal-title"> &nbsp&nbsp Function Point</h4> </center>
         </div>
         <div class="modal-body" id="modal1_detail">
	 
		 
		 
		 				<!-- function point calculation starts here-->
				 <script type="text/javascript" src ="../estimation/fp.js">
          
        </script>
				<FORM NAME="FPform">
					
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
				<img class="img-responsive" src="../estimation/scale.gif" alt="scale" >
				
				
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
				
				<div class="row"> <INPUT TYPE="hidden" ID="factorTotal" NAME="FT" VALUE="0" class="form-control">
				 <div class="col-lg-12"  > <!-- display function points-->
				
				
				<div class="col-lg-3 col-sm-3 col-md-3"> 
			<!--	<INPUT TYPE="text" ID="FunctionPoint" NAME="FP" VALUE="" class="form-control"> -->
				</div>
				
				<div class="col-lg-3 col-sm-3 col-md-3"> 
				
				<button  class="btn btn-info btn-block"  type="reset">
				<i class="fa fa-refresh" aria-hidden="true"></i> Reset</button>
				
				</div>
				
				
				
				<div class="col-lg-3 col-sm-3 col-md-3"> 
				
				
				<button id="button" class="btn btn-success btn-block" onClick="" type="button"><i class="fa fa-calculator" aria-hidden="true"></i> Calculate<img src="../images/login.gif" id="img2" style="display:none; width:40px;height:40px;"/ ></button>
				
				
				</div>
				
				
				
					
					</div>
					 </div>
				
				
				
				</form>
				
<!-- function point calculation end here-->
		 
		 
		 
		 
	 
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div>
      </div>
   </div>
</div>
<div id="modal2" class="modal fade">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" style=" background-color:  #5cb85c  ;color:white;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
           <center> <h4 class="modal-title"> &nbsp&nbsp 

Usecase Point</h4> </center>
         </div>
         <div class="modal-body" id="modal2_detail">
		 
		 
		 
		 <!-- use case type calculation starts here-->



				<FORM NAME="UCform">
				 
				
				
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
 

			
			
				
			<div class="row">
			<div  class="col-lg-6 col-sm-6 col-md-6">
			<button  class="btn btn-info btn-block"  type="reset">
				<i class="fa fa-refresh" aria-hidden="true"></i> Reset</button></div>
			<div  class="col-lg-6 col-sm-6 col-md-6">
			<button id="ucpCalculate" class="btn btn-success btn-block" onClick="UCPcalculate()" type="button"><i class="fa fa-calculator" aria-hidden="true"></i> Calculate<img src="../images/login.gif" id="img2" style="display:none; width:40px;height:40px;"/ ></button>
			</div>
			</div>
			</div>
			
			
			
			</FORM>
			<!-- use case type calculation ends here-->
		 
		 
		 
		 
 
 
 
 
 
 
 
 
 
 
 
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div>
      </div>
   </div>
</div>
 