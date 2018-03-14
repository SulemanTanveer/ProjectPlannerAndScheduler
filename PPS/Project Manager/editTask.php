<?php
 
   include("config.php");  
   
   
   $output2='';
		$data=$_POST['proj_id']; 

		
	list($taskId, $projId) = explode("-", $data);		 


 	   
	$emp=0;	 
			   
$output = '';
  
     $select_query = "SELECT * FROM task WHERE taskId = '".$taskId."'";  
     $result = mysqli_query($connect, $select_query);
	  while($row = mysqli_fetch_array($result))
		 {   
			$taskname= $row['taskName'];
			$deadline= $row['deadline'];
			$startDate=$row['startDate'];
			$priority=$row['priority'];
		 
		$taskStatus=	$row['taskStatus'];
		 
		$taskHours=$row['taskHours'] ;
	  	$cur1=$row["creationDate"];		
		$description=$row["description"];		
				}
	$sql2="SELECT * FROM taskassignment WHERE taskId = '". $taskId."'";
$result2 = mysqli_query($connect, $sql2);
$count = mysqli_num_rows($result2);
if($count>0)
{
	$emp=1;
	
}

			 
$sql2="SELECT * FROM task WHERE taskId = '". $taskId."'";
$result2 = mysqli_query($connect, $sql2);
$row = mysqli_fetch_array($result2);
$start = $row["startDate"];
$dead = $row["deadline"]; 
    $output .= '
	   <div class="row">
		 <div class="col-lg-12">  
 <div id="show2"></div></div></div>
	 <div class="row">
			   <form method="post" id="insert_form4">     
    <div class="col-lg-4">
	 
						    <div class="panel panel-yellow" >
                            <div class="panel-heading">
                                <h3 class="panel-title"></i>SubTask Info</h3>
                            </div>
                            <div class="panel-body">
	 
	 
	 

	 
	<label>SubTask Name<sup><span style = "color: red;  font-size: 10px;" class="glyphicon glyphicon-asterisk"></span></label>
<input type="text" name="taskName2" id="taskName2"  value="' .$taskname .'" class="form-control" required> </br>';
          if($taskStatus=='In-Progress'){
					 $output .= ' <label class="ccc">Start Date<sup><span style = "color: red;  font-size: 10px;" class="glyphicon glyphicon-asterisk"></span></sup></label>';
					 }
					 else {
					 $output .= ' <label class="ccc">Start Date</label>';
					 }
					 
					  $today1=date('Y-m-d');
 $output .= '<input type="date" name="startDate2" id="startDate2" value="' .$startDate.'" class="form-control" required>
               ';     
			$output .= '   </br>  <label>Deadline <sup><span style = "color: red;  font-size: 10px;" class="glyphicon glyphicon-asterisk"></span></sup></label>
               
   
   <input type="date" name="deadline2" id="deadline2" value="' .$deadline.'"class="form-control" required>
   <input type="hidden" name="emp_id" id="emp_id" value="'.$emp .'"class="form-control">
   <input type="hidden" name="today" id="today" value="'.$today1 .'"class="form-control">
  <input type="hidden" name="orignal_task_status" id="orignal_task_status" value="'.$taskStatus .'"class="form-control">   ';
          
			  
			  
			$output .= '   <br> 
   
			 <label id="wh2">Task Hours</label>
			  
    <input type="number" id="taskHours2" name="taskHours2" class="form-control" value="' .$taskHours .'" min="1"  >
   <input type="hidden" name="curDate2" id="curDate1" value="'.$cur1 .'" class="form-control" required>
 <input type="hidden" name="proj_deadline2" id="proj_deadline2" value="'.$dead .'"class="form-control">
<input type="hidden" name="proj_startdate2" id="proj_startdate2" value="'.$start .'" class="form-control">
   <input type="hidden" id="countsaturdays2" name="countsaturdays" value="0"class="form-control" >
      <input type="hidden" id="deadlineCheck2" name="deadlineCheck2" value="0"class="form-control" >
	    <input type="hidden" id="workingdays2" name="workingdays" value="0"class="form-control" >
 <input name="saturadayCheck2" id="saturadayCheck2" style="width:15px;height:15px" type="checkbox" > <b>Include Saturday</b> 
		 <input name="saturadayCheck3" id="saturadayCheck3"  value="0" type="hidden" >  
			 ';

		

		$output .= '  
 
			   
			  
			  
			   </br><label>Task Status<sup><span style = "color: red;  font-size: 10px;" class="glyphicon glyphicon-asterisk"></span></sup></label>
			   <select name="taskStatus2" id="taskStatus2" class="form-control" required>';
		   
		   if($taskStatus=='Pending'){
					$output .= '<option value="Pending" selected>Pending</option>
								 ';
		   }
		   else  if($taskStatus=='In-Progress'){
					$output .= '<option value="Pending" >Pending</option>  
					  
                            <option value="In-Progress" selected>In-Progress</option>
                             ';
		   }
		   else  if($taskStatus=='Not Started'){
					$output .= '<option value="Not Started" selected>Assign(Not Started)</option>  <option value="Pending" >Pending</option>  
					  ';
		   }
            else  if($taskStatus=='Completed'){
				$output .= '<option value="Pending" >Pending</option>  
				  ';
		   }               
         $output .= '               </select>';
		 
			$output .= '   
			   </br><label>Priority</label>
			   <select name="priority2" id="priority2" class="form-control" required>';
		   
		   if($priority=='Low'){
				$output .= '<option value="Low" selected>Low</option>  
                            <option value="Medium">Medium</option>
                            <option value="High">High</option>';
		   }
		   else  if($priority=='Medium'){
				$output .= '<option value="Low" >Low</option>
                            <option value="Medium" selected>Medium</option>
                            <option value="High">High</option>';
		   }
            else  if($priority=='High'){
				$output .= '<option value="Low" >Low</option>  
                            <option value="Medium">Medium</option>
                            <option value="High" selected>High</option>';
		   }               
       



	   $output .= '           </select> 
		 
               </br>

 <label>Description</label>
	<textarea name="description" id="description" class="form-control" >'.$description .'</textarea>



	</div></div></div>
	 
	
        
	 ';
$id='';
	$query13 = "SELECT* FROM project WHERE projId = '".$projId."'";  
    $result13 = mysqli_query($connect, $query13);
     $row13=mysqli_fetch_array($result13);  
$id= $row13['teamId'];

	  $output .= '
	 
	
			   
    <div class="col-lg-8">
	
						    <div class="panel panel-red" >
                            <div class="panel-heading">
                                <h3 class="panel-title"></i>Team Membres</h3>
                            </div>
                            <div class="panel-body">';
	$query1 = "SELECT* FROM teammember WHERE teamId = '".$id."'";  
    $result1 = mysqli_query($connect, $query1);
     

	$output .= ' <table id="example818" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
	<thead>
            <tr>
                
				 <th></th>
				
                
                <th>Name</th>
                  <th>Roles</th>
             
                
            </tr>
        </thead><tbody>';

   
    
   while ($row1=mysqli_fetch_array($result1)) {  
	 
	 
	  $sql2="SELECT * FROM employee WHERE empId = '".$row1['empId']."'";  
     $result2 = mysqli_query($connect, $sql2);
	  while ($row2=mysqli_fetch_array($result2)) {
		  
		  
		
		
	  $sql33="SELECT * FROM taskassignment WHERE empId = '".$row1['empId']."' AND taskId = '".$taskId."'  ";  
     $result33 = mysqli_query($connect, $sql33);
	 if(mysqli_num_rows($result33)>0)
	 {
		$output.="<tr><td><input type = 'checkbox' class='check_perm2'  name = 'empList[]' value = '{$row2['empId']}' checked></td>";
		
	 }
	 else{
		 $output.="<tr><td><input type = 'checkbox' class='check_perm2'  name = 'empList[]' value = '{$row2['empId']}' ></td>";
	 }
     $output .=    '<td><img style=" border-radius: 50%;" src="' .$row2['image'] .'" width="40px" height="40px"  />' .$row2['empName'] .'</td>'."<td>";
         
	  $query2 = "SELECT * FROM employeeroles  WHERE empId='".$row2['empId']."'";  
					 $result2 = mysqli_query($connect, $query2);
            
                     while($row2 = mysqli_fetch_array($result2))
                     {$query21 = "SELECT * FROM role  WHERE roleId='".$row2["roleId"]."'";  
					 $result21 = mysqli_query($connect, $query21);
            
                     while($row21 = mysqli_fetch_array($result21))
                     {
						 
			$output .= ''.$row21['roleName'].' <b>('.$row2['experience'].' years)</b><br>';
					 }
					 }
		 

	 
	 
	 
	 $output .=  "</td></tr>";     
   }}

$output .= ' </tbody></table>';

$output .= ' </div></div></div>';



$output.=' 


<div class="row">
<div class="col-lg-11">
<input type="hidden" name="taskId2" id="taskId2" value="' .$taskId .'"  class="form-control">
<input type="hidden" name="projId2" id="projId2" value="' .$projId .'"  class="form-control">
			   <input type="submit" name="insert" id="insert2" value="Update" class="btn btn-success pull-right" />
</div></div>
 ';
 $output.='</form></div> ';
$output.=" <script>
  
    var table = $('#example818').DataTable( {
        responsive: true
    } );
 
       
        </script>";
 
    echo $output;
	
	?>
<script>

 
    
	 //////////////////set include sat value////////////////
 $("#saturadayCheck2").change(function() {
      
  if($('#saturadayCheck2:checkbox:checked').length > 0){
	   $('#saturadayCheck3').val('1');
	  
  }
  else{
	  $('#saturadayCheck3').val('0');
	  
  }
			
			
		 if($('#deadline2').val()!=''&& $('#startDate2').val()!='') {
  
if($('#deadline2').val()>= $('#startDate2').val()){
	
	if($('.check_perm2:checkbox:checked').length ==1){
	    var empId=  $('.check_perm2:checkbox:checked').val();
		 var deadline=$('#deadline2').val();
		  var startDate= $('#startDate2').val();
		var incSat= $('#saturadayCheck3').val();
		   
		   $.ajax({
      url:"checkWH2.php",
      method:"POST",
      data:{deadline:deadline,startDate:startDate,incSat:incSat,empId:empId},
      success:function(data){
		   
		    $('#show2').html(data);
   
     
      }
     });	  
  }
	else{
			
			$('#show2').html('');
		}		
}	else{
			
			$('#show2').html('');
		}
		
		} 	
		else{
			
			$('#show2').html('');
		}		
			
			
			});    







 $('.check_perm2').on("change", function(event){  
	  if($("#emp_id").val() >0){
		    
		  if($("#orignal_task_status").val()=='Not Started'){
			 
			   $("#taskStatus2").html("<option value='Not Started'>Assign(Not Started)</option>");
			  
		  }
		  else{
		  
		   $("#taskStatus2").html("<option value='"+$("#orignal_task_status").val()+'>'+$("#orignal_task_status").val()+"</option>");
		  }  

		  }
	  
   else if($('.check_perm2:checkbox:checked').length ==0){  
          $("#taskStatus2").html("<option value='Pending'>Pending</option>");
           
        }  

		else	{
			if($("#orignal_task_status").val()=='Completed'){
			 $("#taskStatus2").html(" <option value='Pending' selected>Pending</option><option value='Completed' selected>Completed</option>");
			}
			else{
				
				     $("#taskStatus2").html("<option value='Not Started'>Assign(Not Started)</option>");
			}
			 
            }
    	 if($('#deadline2').val()!=''&& $('#startDate2').val()!='') {
  
if($('#deadline2').val()>= $('#startDate2').val()){
	
	if($('.check_perm2:checkbox:checked').length ==1){
	    var empId=  $('.check_perm2:checkbox:checked').val();
		 var deadline=$('#deadline2').val();
		  var startDate= $('#startDate2').val();
		var incSat= $('#saturadayCheck3').val();
		   
		   $.ajax({
      url:"checkWH2.php",
      method:"POST",
      data:{deadline:deadline,startDate:startDate,incSat:incSat,empId:empId},
      success:function(data){
		   
		    $('#show2').html(data);
   
     
      }
     });	  
  }
	else{
			
			$('#show2').html('');
		}		
}	else{
			
			$('#show2').html('');
		}
		
		} 	
		else{
			
			$('#show2').html('');
		}
});	 
var count3=0;
$('#insert_form4').on('submit', function(event){  
     
	 var alertMsg='';
		var flag=true;
		var flag2=true;
	 event.preventDefault(); 
	var value= $("#task_deadline2").val();
	
	var value2= $("#task_startdate2").val();
	    
		 
	  if($("#startDate2").val()< $("#task_startdate2").val()){
	 alertMsg+='Task start date is '+ value2+ '\n';
	 alertMsg+='Please enter valid deadline'+ '\n';
	 flag=false;
	  flag2=false;
	 $('#deadline2').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
	 
	}
	  if(flag2){ 
	 if($("#deadline2").val() < $("#curDate1").val()){
		
	 alertMsg+='Please enter valid deadline'+ $("#curDate1").val()+'\n';
	 flag=false;
	 $('#deadline2').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
	 
	}
	  
if($("#startDate2").val()!=''){
		  
		  if($("#emp_id").val() >0){
	 if($("#startDate2").val() < $("#curDate1").val()){
		
	 alertMsg+='Please enter valid start date'+ '\n';
	 flag=false;
	 $('#startDate2').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
	 
		  }}
		  else{
			  if($("#startDate2").val() < $("#today").val()){
		
	 alertMsg+='Please enter valid start date'+ '\n';
	 flag=false;
	 $('#startDate2').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
	 
		  }}
			  
		  }
	  if($("#startDate2").val() > $("#deadline2").val()){
		
	 alertMsg+='Please enter valid dates'+ '\n';
	 flag=false;
	 $('#startDate2').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
	  $('#deadline2').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
	
	}
	    
	  } 
		if(flag) 
     
     {  var flag2=true;
	  var d1 = $('#startDate2').val();
  var d2 = $('#deadline2').val();
	var result=workingDaysBetweenDates(d1,d2);
	 $('#workingdays2').val(result);
	 if($("#deadline2").val() > $("#task_deadline2").val()){
	if (confirm("Are you sure to update project deadline?"))
	  {
		  $('#deadlineCheck2').val('1');
	  }
	  else{
		  flag2=false;
	  }
	 
	}  
     
    if(flag2){
	 
	 
      $.ajax({  
       url:'taskUpdateValidation.php',  
       method:'POST',  
	   data:new FormData(this),  
       contentType:false, 
	   processData:false,
      
       beforeSend:function(){  
        $('#insert2').val('Updating..');  
       }, 
  	   
       success:function(data){  
	     
        alert($.trim(data));
location.href = 'http://localhost/PPS/Project%20Manager/task.php?projId='+$('#projId2').val();		
       }  
      }); 

	}

	  
     }else{
		
		 alert(alertMsg);
	 count++;
	}
 
	 
   });	

function updateTask(){
	  var form = $('#insert_form4')[0]; // You need to use standard javascript object here
var formData = new FormData(form);
	  $.ajax({  
       url:'updateTask.php',  
       method:'POST',  
	   data:formData,  
       contentType:false, 
	   processData:false,
      
       beforeSend:function(){  
        $('#insert2').val('Updating..');  
       }, 
  	   
       success:function(data){  
	     
        $('#insert_form4')[0].reset();  
         $('#edit_data_Modal').modal('hide');  
     	  $('#deadlineCheck2').val('0');
       $('#employee_table').html(data);
	    $('#uu').html('');
        $('.modal-backdrop').remove();			
       }  
      }); 

	
	
	
	
}













   
	//////////////////edit subtask change/////////////////	
	$('#taskStatus2').on("change", function(event){ 
        var val = $(this).val();
		 
		if (val == 'In-Progress' || val == 'Not Started'|| val == 'Pending') {
            $("#completionDate2").prop('disabled',true);
        }
		
         
		
    });
			
			
		///////////////////////////////////////
//////////////////count saturaday edit/////////////////////
    $('#deadline2').on("change", function(event){  
    $("#saturadayCheck2").attr("checked", false);
	   $("#saturadayCheck2").attr("disabled", true);
	  
    if($('#deadline2').val()!=''&& $('#startDate2').val()!='') {
 
var startDate = new Date($('#startDate2').val());
var endDate = new Date($('#deadline2').val());
var totalSaturadays = 0;

for (var i = startDate; i <= endDate; ){
    if (i.getDay() == 6){
        totalSaturadays++;
    }
    i.setTime(i.getTime() + 1000*60*60*24);
}
if((totalSaturadays)>0)
{
       $("#saturadayCheck2").removeAttr("disabled");
           $('#countsaturdays2').val(totalSaturadays);
}
		 
	

  
if($('#deadline2').val()>= $('#startDate2').val()){
	
	if($('.check_perm2:checkbox:checked').length ==1){
	    var empId=  $('.check_perm2:checkbox:checked').val();
		 var deadline=$('#deadline2').val();
		  var startDate= $('#startDate2').val();
		var incSat= $('#saturadayCheck3').val();
		   
		   $.ajax({
      url:"checkWH2.php",
      method:"POST",
      data:{deadline:deadline,startDate:startDate,incSat:incSat,empId:empId},
      success:function(data){
		   
		    $('#show2').html(data);
   
     
      }
     });	  
  }
	else{
			
			$('#show2').html('');
		}		
}	else{
			
			$('#show2').html('');
		}	
	
	
	
	
	
	
	
	
	
	
	
	
		}  
    else{
			
			$('#show2').html('');
		}
}); 
  
$('#startDate2').on("change", function(event){  
	     
     $("#saturadayCheck2").attr("checked", false);
	   $("#saturadayCheck2").attr("disabled", true);
	  
    if($('#deadline2').val()!=''&& $('#startDate2').val()!='') {
 
var startDate = new Date($('#startDate2').val());
var endDate = new Date($('#deadline2').val());
var totalSaturadays = 0;

for (var i = startDate; i <= endDate; ){
    if (i.getDay() == 6){
        totalSaturadays++;
    }
    i.setTime(i.getTime() + 1000*60*60*24);
}
if((totalSaturadays)>0)
{
       $("#saturadayCheck2").removeAttr("disabled");
           $('#countsaturdays2').val(totalSaturadays);
}
		 
	
  
if($('#deadline2').val()>= $('#startDate2').val()){
	
	if($('.check_perm2:checkbox:checked').length ==1){
	    var empId=  $('.check_perm2:checkbox:checked').val();
		 var deadline=$('#deadline2').val();
		  var startDate= $('#startDate2').val();
		var incSat= $('#saturadayCheck3').val();
		   
		   $.ajax({
      url:"checkWH2.php",
      method:"POST",
      data:{deadline:deadline,startDate:startDate,incSat:incSat,empId:empId},
      success:function(data){
		   
		    $('#show2').html(data);
   
     
      }
     });	  
  }
	else{
			
			$('#show2').html('');
		}		
}	else{
			
			$('#show2').html('');
		}
		}  else{
			
			$('#show2').html('');
		}
});




function workingDaysBetweenDates(d0, d1) {
	var holidays = ['2016-05-03','2016-05-05'];
    var startDate = parseDate(d0);
    var endDate = parseDate(d1);  
    // Validate input
    if (endDate < startDate) {
        return 0;
    }
    // Calculate days between dates
    var millisecondsPerDay = 86400 * 1000; // Day in milliseconds
    startDate.setHours(0,0,0,1);  // Start just after midnight
    endDate.setHours(23,59,59,999);  // End just before midnight
    var diff = endDate - startDate;  // Milliseconds between datetime objects    
    var days = Math.ceil(diff / millisecondsPerDay);
    
    // Subtract two weekend days for every week in between
    var weeks = Math.floor(days / 7);
    days -= weeks * 2;

    // Handle special cases
    var startDay = startDate.getDay();
    var endDay = endDate.getDay();
    
    // Remove weekend not previously removed.   
    if (startDay - endDay > 1) {
        days -= 2;
    }
    // Remove start day if span starts on Sunday but ends before Saturday
    if (startDay == 0 && endDay != 6) {
        days--;  
    }
    // Remove end day if span ends on Saturday but starts after Sunday
    if (endDay == 6 && startDay != 0) {
        days--;
    }
    
    return days;
}
           
function parseDate(input) {
	// Transform date from text to date
  var parts = input.match(/(\d+)/g);
  // new Date(year, month [, date [, hours[, minutes[, seconds[, ms]]]]])
  return new Date(parts[0], parts[1]-1, parts[2]); // months are 0-based
}
</script>	
	