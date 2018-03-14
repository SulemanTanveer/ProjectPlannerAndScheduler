 
$(".check_perm").change(function() {
	  $('.check_perm').not(this).prop('checked', false);  
 
			
		 var n = $('.check_perm:checkbox:checked').length;
 
     if(n==1){
			 $("#subtaskStatus").html("<option value='Not Started'>Assign(Not Started)</option>");
			
			$("#subtaskHours").prop('type','number');
			$("#subtaskHours").val('1');
			 
			$("#subtaskHours").show();
			$("#wh").show();
			$("#wh2").show();
			$("#saturadayCheck").show();
		}
else{
	$("#subtaskHours").val('0')
	$("#subtaskHours").hide();
			$("#wh").hide();
			$("#wh2").hide();
			$("#saturadayCheck").hide();
	$("#subtaskStatus").html("<option value='Pending'>Pending</option>");
}		
		 if($('#deadline').val()!=''&& $('#startDate').val()!='') {
  
if($('#deadline').val()>= $('#startDate').val()){
	
	if($('.check_perm:checkbox:checked').length ==1){
	    var empId=  $('.check_perm:checkbox:checked').val();
		 var deadline=$('#deadline').val();
		  var startDate= $('#startDate').val();
		var incSat= $('#saturadayCheck1').val();
		   var taskId= $('#taskId').val();
		     var tasks_count= $('#tasks_count').val();
 var subtasks_count= $('#subtasks_count').val();
		  
			 if(tasks_count>1 || subtasks_count>0){
		   $.ajax({
      url:"checkWH2.php",
      method:"POST",
      data:{deadline:deadline,startDate:startDate,incSat:incSat,empId:empId,taskId:taskId},
      success:function(data){
		   
		    $('#show').html(data);
   
     
      }
			 });}	
else{
	 $.ajax({
      url:"checkWH1.php",
      method:"POST",
      data:{deadline:deadline,startDate:startDate,incSat:incSat,empId:empId,taskId:taskId},
      success:function(data){
		   
		    $('#show').html(data);
   
     
      }
     });	
	
	
	
}
	 
  }
	else{
			
			$('#show').html('');
		}		
}	} 	
		else{
			
			$('#show').html('');
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
		 
	
if($('#deadline').val()>= $('#startDate').val()){
	
	if($('.check_perm:checkbox:checked').length ==1){
	    var empId=  $('.check_perm:checkbox:checked').val();
		 var deadline=$('#deadline').val();
		  var startDate= $('#startDate').val();
		var incSat= $('#saturadayCheck1').val();
		   var taskId= $('#taskId').val();
		   var tasks_count= $('#tasks_count').val();
		     var subtasks_count= $('#subtasks_count').val();
		    
			 if(tasks_count>1 || subtasks_count>0){
		   $.ajax({
      url:"checkWH2.php",
      method:"POST",
      data:{deadline:deadline,startDate:startDate,incSat:incSat,empId:empId,taskId:taskId},
      success:function(data){
		   
		    $('#show').html(data);
   
     
      }
			 });}	
else{
	 $.ajax({
      url:"checkWH1.php",
      method:"POST",
      data:{deadline:deadline,startDate:startDate,incSat:incSat,empId:empId,taskId:taskId},
      success:function(data){
		   
		    $('#show').html(data);
   
     
      }
     });	
	
	
	
}	  
  }
		
}
else{
			
			$('#show').html('');
		}	
		}  
    else{
			
			$('#show').html('');
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

if($('#deadline').val()>= $('#startDate').val()){
	
	if($('.check_perm:checkbox:checked').length ==1){
	    var empId=  $('.check_perm:checkbox:checked').val();
		 var deadline=$('#deadline').val();
		  var startDate= $('#startDate').val();
		var incSat= $('#saturadayCheck1').val();
		   var taskId= $('#taskId').val();
		   var tasks_count= $('#tasks_count').val();
		   var subtasks_count= $('#subtasks_count').val();
 
			 if(tasks_count>1 || subtasks_count>0){
		   $.ajax({
      url:"checkWH2.php",
      method:"POST",
      data:{deadline:deadline,startDate:startDate,incSat:incSat,empId:empId,taskId:taskId},
      success:function(data){
		   
		    $('#show').html(data);
   
     
      }
	});}	
else{
	 $.ajax({
      url:"checkWH1.php",
      method:"POST",
      data:{deadline:deadline,startDate:startDate,incSat:incSat,empId:empId,taskId:taskId},
      success:function(data){
		   
		    $('#show').html(data);
   
     
      }
     });	
	
	
	
}
  }
			
}else{
			
			$('#show').html('');
		}
		}  
    else{
			
			$('#show').html('');
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

   $(document).ready(function(){
	   
	   
	 $('#subtaskStatus').on("change", function(event){ 
        var val = $(this).val();
		
		 if(val='Pending'){
			 
			 $('#empList').attr('checked', false); 
			 
		 }
		
    });


	 
	 //////////////////set include sat value////////////////
 $("#saturadayCheck").change(function() {
      
  if($('#saturadayCheck:checkbox:checked').length > 0){
	   $('#saturadayCheck1').val('1');
	  
  }
  else{
	  $('#saturadayCheck1').val('0');
	  
  }
			
			
			
		 if($('#deadline').val()!=''&& $('#startDate').val()!='') {
  
if($('#deadline').val()>= $('#startDate').val()){
	
	if($('.check_perm:checkbox:checked').length ==1){
	    var empId=  $('.check_perm:checkbox:checked').val();
		 var deadline=$('#deadline').val();
		  var startDate= $('#startDate').val();
		var incSat= $('#saturadayCheck1').val();
		   var taskId= $('#taskId').val();
		     var tasks_count= $('#tasks_count').val();
			 var subtasks_count= $('#subtasks_count').val();
		    
			 if(tasks_count>1 || subtasks_count>0){
		   $.ajax({
      url:"checkWH2.php",
      method:"POST",
      data:{deadline:deadline,startDate:startDate,incSat:incSat,empId:empId,taskId:taskId},
      success:function(data){
	 
		    $('#show').html(data);
   
     
      }
			 });}	
else{
	 $.ajax({
      url:"checkWH1.php",
      method:"POST",
      data:{deadline:deadline,startDate:startDate,incSat:incSat,empId:empId,taskId:taskId},
      success:function(data){
		    
		    $('#show').html(data);
   
     
      }
     });	
	
	
	
}
	 
  }
	else{
			
			$('#show').html('');
		}		
}	} 	
		else{
			
			$('#show').html('');
		}		
			
			
			
			
			
			
			
			
			
			
			});    
	   
	     
	  
	 var table = $('#example99').DataTable( {
        responsive: true
    } );
 
    new $.fn.dataTable.FixedHeader( table );
   
	  $(document).on('click', '.delete_dataaa', function(){
     
     var proj_id = $(this).attr("id");
   
    $.ajax({
      url:"deleteSubtaskValidation.php",
      method:"POST",
      data:{proj_id:proj_id},
      success:function(data){
		 
     if($.trim(data)=='no')
	 {
		 alert('Subtask is in progress so can not be deleted..!');
		 
	 }
      else if($.trim(data)=='cmp')
	 {
		 deleteCmpSubTask(proj_id);
		 
	 }
	  else if($.trim(data)=='yes')
	 {
		 deleteSubTask(proj_id);
		 
	 }
	 
     
     
     
      }
   });
    
    });
	
	function deleteSubTask(proj_id){
		
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
		
		
	}
		function deleteCmpSubTask(proj_id){
		
		 if(confirm("Subtask Is Completed. \n It may effect projects effort\nAre you sure you want to delete this?")){
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
		
		
		
		
		
		
	}
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
		
	 
		  if($('#tasks_count').val()>1){
			  
			  
		$.ajax({  
       url:"subtaskHoursValidationCheck.php",  
       method:"POST",
       data:new FormData(this),  
       contentType:false, 
	   processData:false,
       beforeSend:function(){  
        $('#insert').val("Inserting");  
       }, 
  	   
       success:function(data){  
	      
	    if($.trim(data) =='yes') {
			 
			 insertSubtask();
		}
		else  if($.trim(data) =='no'){ 
			alert('Please Enter Valid Task Hours');
			$('#insert').val("Insert"); 
			
		}
		else{
			alert(data);
		}
       }  
      });
		
			  
			  
		  }
		  else{
			  
			$.ajax({  
       url:"subtaskHoursValidationCheck2.php",  
       method:"POST",
       data:new FormData(this),  
       contentType:false, 
	   processData:false,
       beforeSend:function(){  
        $('#insert').val("Inserting");  
       }, 
  	   
       success:function(data){  
	       
	    if($.trim(data) =='yes') {
			 
			 insertSubtask();
		}
		else  if($.trim(data) =='no'){ 
			alert('Please Enter Valid Task Hours');
			$('#insert').val("Insert"); 
			
		}
		 
       }  
      });
		  
		  }
		
		
		
		
		
		
		
		
		
	


	}
	  
     }
else{
		
		 alert(alertMsg);
	 count++;
	}
	 
   });
   
 
 function insertSubtask(){
	 	
		var form = $('#insert_form3')[0]; // You need to use standard javascript object here
var formData = new FormData(form);
		
      $.ajax({  
       url:"insertSubTask.php",  
       method:"POST",  
	   data:formData,  
       contentType:false, 
	   processData:false,
      
       beforeSend:function(){  
        $('#insert').val("Inserting..");  
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

   
  
	
   
 
   
      
   var table = $('#example8').DataTable( {
        responsive: true
    } );
 
    new $.fn.dataTable.FixedHeader( table );

   
   
   
   
   
   var table = $('#example5').DataTable( {
        responsive: true
    } );
 
    new $.fn.dataTable.FixedHeader( table );

   
   
     

   
   
   
   
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
  