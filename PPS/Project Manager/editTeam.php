<?php

  
   include("config.php");  
   
   $flag=false;
   $output2='';
		   $proj=''; 
	 $select_query = "SELECT * FROM team WHERE teamId = '".$_POST["proj_id"]."'";  
     $result = mysqli_query($connect, $select_query);
	  while($row = mysqli_fetch_array($result))
		  
     {    
		   
		   $select_query2 = "SELECT * FROM project WHERE    teamId = '".$_POST["proj_id"]."' AND projStatus!='Completed'";  
     $result2 = mysqli_query($connect, $select_query2);
if(mysqli_num_rows( $result2)>0){
	$flag=true;
}	
	while($row2 = mysqli_fetch_array($result2))
     {
		 
		  $projname=$row2['projName'];
		 $projstatus=$row2['projStatus'];
	 }
	

	 		} 

 $sql="SELECT* FROM project WHERE projStatus='Pending'";
 $result = mysqli_query($connect, $sql);
   
   if($flag)
 {
 $output2 .='<input type="text" value="'. $projname.'"  name="projId" id="projId1"  class="form-control" readonly><br>';
 }
 else{
	 
    $output2 .="<select name='projId' id='projId1' class='form-control'><option value='Un Assign'>".'Un Assign'."</option>";
 
 
    while ($row = mysqli_fetch_array($result)) {
            if(($proj!='0'&& $proj!=''))
 {
$output2 .=" <option value='" . $proj."' selected>".$projname."</option>";
 }  
                  $output2 .=" <option value='" . $row['projId']."'>".$row['projName']."</option>";
}
     $output2 .="</select><br>";
	  
 }		   
			 
			   
   $output = '';
  
    $project='Not Assigned';
      $select_query = "SELECT * FROM team WHERE teamId = '".$_POST["proj_id"]."'";  
     $result = mysqli_query($connect, $select_query);
	  while($row = mysqli_fetch_array($result))
     {
		 $team=$row["teamName"];
		  $status=$row["teamStatus"];
		 
	 
				
				$query9 = "SELECT * FROM project WHERE  teamId='".$row["teamId"]."' AND projStatus!='Completed'";
				$result9 = mysqli_query($connect, $query9);
			 
					
							if(mysqli_num_rows($result9)>0){
						  $row9 = mysqli_fetch_array($result9);
						 $project=$row9["projName"]; 
						 	}
						
						 else{
							 $project='Not Assigned';
						 }
 
		 
     $output .= '
	 <form method="post" id="edit_form">    
	 <div class="row">
			   <div class="main col-lg-12 myHalfCol">
    <div class="col-lg-4">
 
						    <div class="panel panel-red" >
                            <div class="panel-heading">
                                <h3 class="panel-title"></i>Team Info</h3>
                            </div>
                            <div class="panel-body">
	 
	 
	 
	 
	 
	 <div>
	  
	 <label>Team Name</label>
	 <input type="text" value="'.$team.'" name="teamName" id="teamName1"  class="form-control" required>
	  <input type="hidden" value="'.$_POST["proj_id"].'" name="team_id" id="team_id"  class="form-control" required>
	    <input type="hidden" value="'.$project.'" name="projId" id="projId"  class="form-control" required>
               </br>
			   
	
			   
		<label>Assign Project</label>   
			  <div id="rr"> '.$output2.'</div>
			    
	 		   <label>Team Status</label>
			   
			   <input name="teamStatus" type="text" value="'.$status.'"  id="teamStatus1"  class="form-control" readonly>
			   
               </br>
				
	 </div>
	





	</div></div></div> 
	 
	 <div class="col-lg-8">
	  
						    <div class="panel panel-yellow" >
                            <div class="panel-heading">
                                <h3 class="panel-title"></i>Add Team Members</h3>
                            </div>
                            <div class="panel-body">
         <div id="employeedf_table" >	
	<table id="example1" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
                <thead>
            <tr>
                
				 <th></th>
				  
                
                <th>Name</th>
                  <th>Roles</th>
             
                
            </tr>
        </thead><tbody> ';
	 }
	  $sql4="SELECT * FROM employee WHERE position='Developer' AND jobStatus='Employee'";
        $result4 = mysqli_query($connect, $sql4);
		while ($row1=mysqli_fetch_array($result4)) {
	  $sql2="SELECT * FROM employee WHERE empId = '".$row1['empId']."'";  
     $result2 = mysqli_query($connect, $sql2);
	  while ($row2=mysqli_fetch_array($result2)) {
		  
		  
		 
		
	  $sql2="SELECT empId FROM teammember WHERE empId = '".$row2["empId"]."' AND teamId = '".$_POST["proj_id"]."'";  
	  $result33 = mysqli_query($connect, $sql2);
	 if(mysqli_num_rows($result33)>0)
	 {
		  $output .=  "<tr><td><input type='button' value='✓' name='add_emp' id='{$row2['empId']}' class='btn btn-success btn-xs add_member' disabled>
	 "."<input type='button' value='X' name='add_emp' id='{$row2['empId']}' class='btn btn-danger btn-xs remove_member' ></td>".
	 '<td><img style=" border-radius: 50%;" src="' .$row2['image'] .'" width="40px" height="40px"  />' .$row2['empName'] .'</td>'."<td>";
     
		 
	//	$output.="<tr><td><input type = 'checkbox' class='check_perm2'  name = 'empList[]' value = '{$row2['empId']}' checked>
//		</td>";
		
	 }
	 else{
		   $output .=  "<tr><td><input type='button' value='✓' name='add_emp' id='{$row2['empId']}' class='btn btn-success btn-xs add_member' >
	 "."<input type='button' value='X' name='add_emp' id='{$row2['empId']}' class='btn btn-danger btn-xs remove_member' disabled></td>".
	 '<td><img style=" border-radius: 50%;" src="' .$row2['image'] .'" width="40px" height="40px"  />' .$row2['empName'] .'</td>'."<td>";
     
		 
		 
		 
		// $output.="<tr><td><input type = 'checkbox' class='check_perm2'  name = 'empList[]' value = '{$row2['empId']}' ></td>";
	 }
   //  $output .=   '<td><img style=" border-radius: 50%;" src="' .$row2['image'] .'" width="40px" height="40px"  />' 
	// .$row2['empName'] .'</td>'."<td>";
         
	
       	  $query2 = "SELECT * FROM employeeroles  WHERE empId='".$row2["empId"]."'";  
					 $result2 = mysqli_query($connect, $query2);
            
                     while($row2 = mysqli_fetch_array($result2))
                     {$query21 = "SELECT * FROM role  WHERE roleId='".$row2["roleId"]."'";  
					 $result21 = mysqli_query($connect, $query21);
            
                     while($row21 = mysqli_fetch_array($result21))
                     {
						 
				$output .= '&#x25BA; '.$row21['roleName'].' <b>('.$row2['experience'].' years)</b><br>';
					 }
					 }

	 
	 
	 
	 $output .=  "</td></tr>";     
		}}
     $output .= '</tbody></table>  </div> </div></div>  </div>  </div>  </div>
	 <input type="submit" name="insert" id="insert33" value="Update" class="btn btn-success update_info" />
				</form>';
	
	echo "<script>
  
    var table = $('#example1').DataTable( {
        responsive: true
    } );
 
    new $.fn.dataTable.FixedHeader( table );
   
  </script><script src='js/teamScript.js'></script>";
    
	
    echo $output;
	
	?>
	<script>
	$(document).on('click', '.add_member', function(){
     //$('#dataModal').modal();
     var emp_id = $(this).attr("id");
	 	 var id='#' + emp_id;
     $.ajax({
      url:"addMember.php",
      method:"POST",
      data:{emp_id:emp_id,team_id:$('#team_id').val()},
      success:function(data){
		  
		if($.trim(data) =='Yes') { // Everything is ok
        $(id+".add_member").attr("disabled", true);
        $(id+".remove_member").attr("disabled", false);
      alert('Member Addded');
      }
        
      
      }
     });
    });	
	$(document).on('click', '.remove_member', function(){
     //$('#dataModal').modal();
     var emp_id = $(this).attr("id");
	 	 var id='#' + emp_id;
     $.ajax({
      url:"removeMember.php",
      method:"POST",
      data:{emp_id:emp_id,team_id:$('#team_id').val()},
      success:function(data){
		  alert(data);
		if($.trim(data) =='Yes') { // Everything is ok
         alert('Member Removed');
		 $(id+".remove_member").attr("disabled", true);
        $(id+".add_member").attr("disabled", false);
      }
      else if($.trim(data) =='No'){
		  
		  alert('Tasks are assignned to member so it can not be removed..!');
	  }
      
	   
      }
     }); });
	</script>
 