$(".check_perm").change(function() {
	  
    if(this.checked) {
           $("#subtaskStatus").html("<option value='Not Started'>Assign(Not Started)</option><option value='In-Progress'>In-Progress</option>");
        
           
        } else  {
			 $("#subtaskStatus").html("<option value='Pending'>Pending</option>");
			$(".ccc").html('Start Date');
			$("#startDate").prop('required',false);
            }
			
		
			
			
    
});	

     $(document).on('click', '.edit_dataaa', function(){  
               var proj_id = $(this).attr("id");
						 
                
				 $.ajax({
				  url:"editSubtask.php",
				  method:"POST",
				  data:{proj_id:proj_id},
				  success:function(data){
					  
					
				 $('#uuu').html(data);
				 $('#edit_data_Modal2').modal('show');
				  }
				 });
         }); 
   
		///////////send attach file/////////////	
		 $("#select_image2").change(function (){
		 $('#file_data').html('');
		 $('#file_label').html('');
		  $('#file_label').html('<b>Selected Files:</b>');
		 var no=1;
        for(var i = 0 ; i <= this.files.length ; i++){
      var fileName = this.files[i].name;
      $('#file_data').append('<div class="name"><b>'+ (no++)+'</b>: ' + fileName + '</div>');
    }
      
     });		///////////send attach file/////////////	
		$('#file_form3').on("submit", function(event){  
     event.preventDefault();  
        
    if($('#select_image2').val()==''){
		   
		   alert('Please Select Files');
	   }
		else
     { 
      $.ajax({  
       url:"subtaskFile.php",  
       method:"POST",  
	   data:new FormData(this),  
       contentType:false, 
	   processData:false,
      
       beforeSend:function(){  
        $('#insert2').val("Attaching..");  
       }, 
  	   
       success:function(data){  
	   subtaskFileRefresh();
	   $('#file_data').html('');
        $('#file_form3')[0].reset();  
         
		$('#insert2').val("Attach"); 
        alert('File Attached');
		
       }  
      }); 



	  
     }

    }); 	
			
			
	///////////////////////////////////////
//////////////////count saturaday/////////////////////
   $('#deadline').on("change", function(event){  
    $("#saturadayCheck").attr("checked", false);
	   $("#saturadayCheck").attr("disabled", true);
	  
    if($('#deadline').val()!=''&& $('#startDate').val()!='') {
 
var startDate = new Date($('#startDate').val());
var endDate = new Date($('#deadline').val());
var totalSaturadays = 0;

for (var i = startDate; i <= endDate; ){
    if (i.getDay() == 6){
        totalSaturadays++;
    }
    i.setTime(i.getTime() + 1000*60*60*24);
}
if((totalSaturadays)>0)
{
       $("#saturadayCheck").removeAttr("disabled");
           $('#countsaturdays').val(totalSaturadays);
}
		 
	

		}  
    
}); 
   $('#startDate').on("change", function(event){  
	      $("#saturadayCheck").attr("checked", false);
		  $("#saturadayCheck").attr("disabled", true);
	  
	  
    if($('#deadline').val()!=''&& $('#startDate').val()!='') {
 
var startDate = new Date($('#startDate').val());
var endDate = new Date($('#deadline').val());
var totalSaturadays = 0;

for (var i = startDate; i <= endDate; ){
    if (i.getDay() == 6){
        totalSaturadays++;
    }
    i.setTime(i.getTime() + 1000*60*60*24);
}

if((totalSaturadays)>0)
{
       $("#saturadayCheck").removeAttr("disabled");
          $('#countsaturdays').val(totalSaturadays);
           
}

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
		 
	

		}  
});
 		
			
	////////////////set attach file project id//////////		 
		 $(document).on('click', '.file_data3', function(){
     var proj_id = $(this).attr("id");
    $('#id3').val(proj_id);  
	 $('#file_data').html('');
	 $('#select_image2').val('');
	 $('#file_label').html('');
   $.ajax({
      url:"subtaskFileSelect.php",
      method:"POST",
      data:{proj_id:proj_id},
      success:function(data){
		    $('#subtask_file_detail').html(data);
       $('#subtaskfiledataModal').modal('show');
     
      }
     });
			});
			
 
	function subtaskFileRefresh(){
		var proj_id=$('#id3').val();
		
		 $.ajax({
      url:"subtaskFileSelect.php",
      method:"POST",
      data:{proj_id:proj_id},
      success:function(data){
		    $('#subtask_file_detail').html(data);
       
      }
     });
	}
			
  $('.check_perm2').on("change", function(event){  
	  
    if(this.checked) {
           $("#taskStatus2").html("<option value='Not Started'>Assign(Not Started)</option><option value='In-Progress'>In-Progress</option><option value='Completed'>Completed</option>");
        
           
        } else  {
			 $("#taskStatus2").html("<option value='Pending'>Pending</option>");
			$(".ccc").html('Start Date');
			$("#startDate2").prop('required',false);
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
	 if($("#deadline2").val() < $("#curDate").val()){
		
	 alertMsg+='Please enter valid deadline'+ '\n';
	 flag=false;
	 $('#deadline2').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
	 
	}
	  
	  if($("#startDate2").val()!=''){
	 if($("#startDate2").val() < $("#curDate").val()){
		
	 alertMsg+='Please enter valid start date'+ '\n';
	 flag=false;
	 $('#startDate2').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
	 
	}
	  if($("#startDate2").val() > $("#deadline2").val()){
		
	 alertMsg+='Please enter valid dates'+ '\n';
	 flag=false;
	 $('#startDate2').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
	  $('#deadline2').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
	
	}
	    
	  }}
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
       url:'updateSubTask.php',  
       method:'POST',  
	   data:new FormData(this),  
       contentType:false, 
	   processData:false,
      
       beforeSend:function(){  
        $('#insert2').val('Updating..');  
       }, 
  	   
       success:function(data){  
	     alert(data);
        $('#insert_form4')[0].reset();  
        $('#edit_data_Modal2').modal('hide');  
     	  	$('#workingdays2').val('');
		$('#countsaturdays2').val('');
		$('#daedlineCheck2').val('0');
       $('#employee_table').html(data);
        $('.modal-backdrop').remove();		
       }  
      }); 

	}

	  
     }else{
		
		 alert(alertMsg);
	 count++;
	}
 
	 
   });						
	//////////////////edit subtask change/////////////////	
	$('#taskStatus2').on("change", function(event){ 
        var val = $(this).val();
		 
		if (val == 'In-Progress' || val == 'Not Started'|| val == 'Pending') {
            $("#completionDate2").prop('disabled',true);
        }
		
        if (val == 'In-Progress' || val == 'Completed') {
            $(".ccc").html('Start Date<sup><span style = "color: red;  font-size: 10px;" class="glyphicon glyphicon-asterisk"></span></sup>');
			$("#startDate2").prop('required',true);
        } 
		else  {
           $(".ccc").html('Start Date');
			$("#startDate2").prop('required',false);
        } 
		
		if(val == 'Completed'){
			 $(".cccc").html('Completion Date<sup><span style = "color: red;  font-size: 10px;" class="glyphicon glyphicon-asterisk"></span></sup>');
			$("#completionDate2").prop('required',true);
			$("#completionDate2").prop('disabled',false);
			
		}
				else  {
           $(".cccc").html('Completion  Date');
			$("#completionDate2").prop('required',false);
        } 
		
    });
	

   $(document).ready(function(){
	   
	   
	 $('#subtaskStatus').on("change", function(event){ 
        var val = $(this).val();
		
		if (val == 'In-Progress' || val == 'Not Started'|| val == 'Pending') {
            $("#completionDate").prop('disabled',true);
        }
		
        if (val == 'In-Progress' || val == 'Completed') {
            $(".ccc").html('Start Date<sup><span style = "color: red;  font-size: 10px;" class="glyphicon glyphicon-asterisk"></span></sup>');
			$("#startDate").prop('required',true);
        } 
		else  {
           $(".ccc").html('Start Date');
			$("#startDate").prop('required',false);
        } 
		
		if(val == 'Completed'){
			 $(".cccc").html('Completion Date<sup><span style = "color: red;  font-size: 10px;" class="glyphicon glyphicon-asterisk"></span></sup>');
			$("#completionDate").prop('required',true);
			$("#completionDate").prop('disabled',false);
			
		}
				else  {
           $(".cccc").html('Completion  Date');
			$("#completionDate").prop('required',false);
        } 
		
    });


	 
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   $('#add').click(function(){  
              $('#insert').val("Insert");  
              $('#insert_form3')[0].reset();  
         
   	   
   	  
   	  }); 
	  
	 var table = $('#example99').DataTable( {
        responsive: true
    } );
 
    new $.fn.dataTable.FixedHeader( table );
   
	  $(document).on('click', '.delete_dataaa', function(){
     //$('#dataModal').modal();
     var proj_id = $(this).attr("id");
   if(confirm("Are you sure you want to delete this?")){ 
    $.ajax({
      url:"deleteSubTask.php",
      method:"POST",
      data:{proj_id:proj_id},
      success:function(data){
     
      $('#employee_table').html(data);
     
     
     
      }
   });
   }
   else 
   	return false;
    });
	
	
	  var count=0;
	$('#insert_form3').on("submit", function(event){  
    var alertMsg='';
		var flag=true;
		var flag2=true;
	 event.preventDefault(); 
	var value= $("#task_deadline").val();
	
	var value2= $("#task_startdate").val();
	    
	 
	  if($("#startDate").val()< $("#task_startdate").val()){
	 alertMsg+='Task start date is '+ value2+ '\n';
	 alertMsg+='Please enter valid start date'+ '\n';
	 flag=false;
	  flag2=false;
	 $('#startDate').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
	 
	}
	  if(flag2){ 
	 if($("#deadline").val() < $("#curDate").val()){
		
	 alertMsg+='Please enter valid deadline'+ '\n';
	 flag=false;
	 $('#deadline').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
	 
	}
	  
	  if($("#startDate").val()!=''){
	 if($("#startDate").val() < $("#curDate").val()){
		
	 alertMsg+='Please enter valid start date'+ '\n';
	 flag=false;
	 $('#startDate').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
	 
	}
	  if($("#startDate").val() > $("#deadline").val()){
		
	 alertMsg+='Please enter valid dates'+ '\n';
	 flag=false;
	 $('#startDate').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
	  $('#deadline').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
	
	}
	    
	  }}
		if(flag)
      {  
  var d1 = $('#startDate').val();
  var d2 = $('#deadline').val();
	var result=workingDaysBetweenDates(d1,d2);
	 $('#workingdays').val(result);
  if($("#deadline").val() > $("#task_deadline").val()){
	if (confirm("Are you sure to update task deadline?"))
	  {
		  $('#deadlineCheck').val('1');
	  }
	  else{
		  flag2=false;
	  }
	 
	}  
     
    if(flag2){
      $.ajax({  
       url:"insertSubTask.php",  
       method:"POST",  
	   data:new FormData(this),  
       contentType:false, 
	   processData:false,
      
       beforeSend:function(){  
        $('#insert').val("Inserting");  
       }, 
  	   
       success:function(data){  
	  alert(data);
      
        $('#add_data_Modal').modal('hide');  
        $('#employee_table').html(data);
        $('.modal-backdrop').remove();	
		$('#insert_form3')[0].reset();  
		$('#workingdays').val('');
		$('#countsaturdays').val('');
		$('#daedlineCheck').val('0');
       }  
      }); 


	}
	  
     }
else{
		
		 alert(alertMsg);
	 count++;
	}
	 
   });
   
   
   
   
   
   $(document).on('click', '.start1', function(){
        var task_id = $(this).attr("id");
     var subtask_id = $(this).attr("id");
	 var id='#' + subtask_id;
	   var check=$('#check_work').val();
	  if(check==1)
	 {
	 if(confirm("You are currently working on another task\nAre you sure to start this task?")){
     $.ajax({
      url:"setSubtaskActualStartDate.php",
      method:"POST",
      data:{subtask_id:subtask_id},
      success:function(){
		  	 subtaskRefresh();
			  $('.'+ subtask_id).css("background-color", "#FDC305");
	    $('.'+ subtask_id).text("In-Progress");
		$(id+".start1").attr("disabled", true);
        $(id+".done1").attr("disabled", false);
	    alert('Subtask Started..!');
       $('#check_work').val('1');
       
      }
     });
	 }}
	 else{
		 if(confirm("Are you sure to start subtask?")){
     $.ajax({
      url:"setSubtaskActualStartDate.php",
      method:"POST",
      data:{subtask_id:subtask_id},
      success:function(){
		  	 subtaskRefresh();
			  $('.'+ subtask_id).css("background-color", "#FDC305");
	    $('.'+ subtask_id).text("In-Progress");
		$(id+".start1").attr("disabled", true);
        $(id+".done1").attr("disabled", false);
	    alert('Subtask Started..!');
       $('#check_work').val('1');
       
      }
     });
		 
		 
		 } 
	 }
	 
	 
    });    
	
	
	$(document).on('click', '.done1', function(){
     
     var subtask_id = $(this).attr("id");
	 var id='#' + subtask_id;
	  if(confirm("Are you sure subtask is completed?")){
     $.ajax({
      url:"setSubtaskActualCompletionDate.php",
      method:"POST",
      data:{subtask_id:subtask_id},
      success:function(){
	 subtaskRefresh();
	  $('.'+ subtask_id).css("background-color", "#00D211");
	    $('.'+ subtask_id).text("Completed");

        $(id+".done1").attr("disabled", true);
	    alert('Subtask Submitted..!');
    if($.trim(data) =='0'){
			     $('#check_work').val('0');
			  
		  }
		else {
			   $('#check_work').val('1');
			
		}  
       
      }
     });
	  }
    });    
	
   
   
   
   
   
   
   
 
    $(document).on('click', '.view_dataaa', function(){
     //$('#dataModal').modal();
     var proj_id = $(this).attr("id");
     $.ajax({
      url:"selectSubTask.php",
      method:"POST",
      data:{proj_id:proj_id},
      success:function(data){
		  
       $('#employee_detail').html(data);
       $('#dataModal').modal('show');
      }
     });
    });
    
 /////////////////edit subtask//////////// 

   
   $(document).on('click', '.add_memberr', function(){
     //$('#dataModal').modal();
     var proj_id = $(this).attr("id");
	  var id='#' + proj_id;
     $.ajax({
      url:"assignSubTask.php",
      method:"POST",
      data:{proj_id:proj_id,task_id2:$('#subtask_id').val()},
      success:function(data){
		  
		if($.trim(data) ==='Yes') { // Everything is ok
        
          $(id+".remove_memberr").attr("disabled", false);
        $(id+".add_memberr").attr("disabled", true);
       alert('Task Assigned');
      }
       else if($.trim(data) ==='No'){
		   
		   alert('Task Already Assigned to this member');
	   }
      
      }
     });
    });
   
   
	$(document).on('click', '.remove_memberr', function(){
     //$('#dataModal').modal();
     var proj_id = $(this).attr("id");
	  var id='#' + proj_id;
     $.ajax({
      url:"unassignSubTask.php",
      method:"POST",
      data:{proj_id:proj_id,task_id2:$('#subtask_id').val()},
      success:function(data){
		if($.trim(data) ==='Yes') { // Everything is ok
          $(id+".remove_memberr").attr("disabled", true);
        $(id+".add_memberr").attr("disabled", false);
		 alert('Task Unassigned');
        
      }
      
      }
     });
    });
	
   
 
   
      
   var table = $('#example8').DataTable( {
        responsive: true
    } );
 
    new $.fn.dataTable.FixedHeader( table );

   
   
   
   
   
   var table = $('#example5').DataTable( {
        responsive: true
    } );
 
    new $.fn.dataTable.FixedHeader( table );

   
   
     

   
   
   
   
   });

function subtaskRefresh(){
	
	
	var taskId =$('#taskId').val();
	 $.ajax({
      url:"refreshSubtask.php",
      method:"POST",
      data:{taskId:taskId},
      success:function(data){
	  var responsedata = $.parseJSON(data);
 //  alert('Total:'+responsedata[0]+'cur:'+responsedata[1]+'ex:'+responsedata[2]);
	       
       $('#tt').html(responsedata[0]); ;
	    $('#ct').html(responsedata[1]); ;
        $('#in_prog').html(responsedata[2]); ;
      $('#nt_st').html(responsedata[3]); ;
      }
     });
}   	

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
  