$(".check_perm").change(function() {
	  
    if(this.checked) {
           $("#taskStatus").html("<option value='Not Started'>Assign(Not Started)</option><option value='In-Progress'>In-Progress</option>");
        
           
        } else  {
			 $("#taskStatus").html("<option value='Pending'>Pending</option>");
			$(".ccc").html('Start Date');
			$("#startDate").prop('required',false);
            }
			var n = $(".check_perm:checked").length;
 
   if(n>1){
			$("#workHours").hide();
			$("#wh").hide();
			$("#wh2").hide();
			$("#saturadayCheck").hide();
		}	
		else if(n<2){
			$("#workHours").show();
			$("#wh").show();
			$("#wh2").show();
			$("#saturadayCheck").show();
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

 $('#deadline').on("change", function(event){  
	  
    if(this.checked) {
           $("#taskStatus2").html("<option value='Not Started'>Assign(Not Started)</option><option value='In-Progress'>In-Progress</option><option value='Completed'>Completed</option>");
        
           
        } else  {
			 $("#taskStatus2").html("<option value='Pending'>Pending</option>");
			$(".ccc").html('Start Date');
			$("#startDate2").prop('required',false);
            }
    
}); 






//////////////edit task/////////////
 
 
   
   
   $(document).ready(function(){
	

   

	
	 $('#taskStatus').on("change", function(event){ 
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








	
	   //////////////////Gant Chart////////////////////
	   
	$(document).on('click', '#button1', function(){   

	var proj_id=$('#button1').val(); 
	 var wi  = window.open('about:blank', '_blank');
	  $('#img2').show();
 $.ajax({
 type: "POST",
 url: "ganttchart.php",
 data:{proj_id:proj_id},
 success: function(msg){

	//alert(msg);
     $('#img2').hide();
	if($.trim(msg) ==='No Tasks')  
                          {  
       alert("Create Tasks First");  
								                         
						 }  
   else {
	wi.location.href = 'graph/ganttchart.html';
   }
	
 },
 error: function(XMLHttpRequest, textStatus, errorThrown) {
    alert("Some error occured");
 }
 });
});
 
  	 $(document).on('click', '.edit_dataa', function(){  
               var proj_id = $(this).attr("id");
						 
                
				 $.ajax({
				  url:"editTask.php",
				  method:"POST",
				  data:{proj_id:proj_id},
				  success:function(data){
					 
					 $('#uu').html(data);
					
				 //$('#employee_table').html(data);
				 
				  $('#edit_data_Modal').modal('show');
				  }
				 });
         }); 
				 
				 
			////////////////set attach file project id//////////		 
	$(document).on('click', '.file_data2', function(){
     var proj_id = $(this).attr("id");
    $('#id2').val(proj_id);  
		 $('#file_data').html('');
	 $('#select_image2').val('');
	 $('#file_label').html('');
	
	
   $.ajax({
      url:"taskFileSelect.php",
      method:"POST",
      data:{proj_id:proj_id},
      success:function(data){
		  
		    $('#task_file_detail').html(data);
       $('#taskfiledataModal').modal('show');
     
      }
     });
	 		
			
			
			
			});
	
	  $(document).on('click', '.delete_dataa', function(){
     //$('#dataModal').modal();
     var proj_id = $(this).attr("id");
   if(confirm("Are you sure you want to delete this?")){ 
    $.ajax({
      url:"deleteTask.php",
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
	
	$('#insert_form2').on("submit", function(event){  
     var alertMsg='';
		var flag=true;
		var flag2=true;
	 event.preventDefault(); 
	var value= $("#proj_deadline").val();
	
	var value2= $("#proj_startdate").val();
	    
		
	  if($("#startDate").val()< $("#proj_startdate").val()){
	 alertMsg+='Project start date is '+ value2+ '\n';
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
 var  flag2=true;
  var d1 = $('#startDate').val();
  var d2 = $('#deadline').val();
	var result=workingDaysBetweenDates(d1,d2);
	 $('#workingdays').val(result);
	var c1=$('#workingdays').val();
	 var c2=$('#countsaturdays').val();
	 
	 
	  if($("#deadline").val() > $("#proj_deadline").val()){
	if (confirm("Are you sure to update project deadline?"))
	  {
		  $('#deadlineCheck').val('1');
	  }
	  else{
		  flag2=false;
	  }
	 
	}  if((c1+c2)<1){
		 
		 alert('No working day. Please enter valid dates');
		 flag2=false;
	 }
     
    if(flag2){
      $.ajax({  
       url:"insertTask.php",  
       method:"POST",  
	   data:new FormData(this),  
       contentType:false, 
	   processData:false,
      
       beforeSend:function(){  
        $('#insert').val("Inserting");  
       }, 
  	   
       success:function(data){  
	  alert(data);
	   $('#insert').val("Insert");  
        $('#insert_form2')[0].reset();  
        $('#add_data_Modal').modal('hide');  
        $('#employee_table').html(data);
        $('.modal-backdrop').remove();		
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

		


 
	   $('#add').click(function(){  
	         $("#saturadayCheck").attr("disabled", true);
              $('#insert').val("Insert");  
              $('#insert_form2')[0].reset();  
			  	$('#workingdays').val('');
		       $('#countsaturdays').val('');
         if(count>1){										
             
                $('#deadline').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });

			    $('#startDate').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
}
   	   
   	  
   	  }); 


 
   $(document).on('click', '.start', function(){
     
     var task_id = $(this).attr("id");
	 var id='#' + task_id;
     var check=$('#check_work').val();
	 
	 if(check==1)
	 {
     
	if(confirm("You are currently working on another task\nAre you sure to start this task?")){
     $.ajax({
      url:"setTaskActualStartDate.php",
      method:"POST",
      data:{task_id:task_id},
      success:function(data){
		 taskRefresh();
		$(id+".start").attr("disabled", true);
        $(id+".done").attr("disabled", false);
		 $('.'+ task_id).css("background-color", "#FDC305");
	    $('.'+ task_id).text("In-Progress");
	    alert('Task Started..!');
		
   $('#check_work').val('1');
       
      }
     });
	 }}
	 else{
		 	if(confirm("Are you sure to start task?")){
     $.ajax({
      url:"setTaskActualStartDate.php",
      method:"POST",
      data:{task_id:task_id},
      success:function(data){
		 taskRefresh();
		$(id+".start").attr("disabled", true);
        $(id+".done").attr("disabled", false);
		 $('.'+ task_id).css("background-color", "#FDC305");
	    $('.'+ task_id).text("In-Progress");
	    alert('Task Started..!');
      $('#check_work').val('1');
       
      }
     });
	 }
		  
	 }
	 
	 
	 
	 
    });
        
	
	
	$(document).on('click', '.done', function(){
     
     var task_id = $(this).attr("id");
	 var id='#' + task_id;
	 if(confirm("Are you sure task is completed?")){
     $.ajax({
      url:"setTaskActualCompletionDate.php",
      method:"POST",
      data:{task_id:task_id},
      success:function(data){
		  
	 taskRefresh();
        $(id+".done").attr("disabled", true);
	   $('.'+ task_id).css("background-color", "#00D211");
	    $('.'+ task_id).text("Completed");
         alert('Task Submitted..!');
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
	
	
   $(document).on('click', '.view_dataa', function(){
    
     var proj_id = $(this).attr("id");
     $.ajax({
      url:"selectTask.php",
	  async: false,
      method:"POST",
      data:{proj_id:proj_id},
      success:function(data){
		
       $('#employee_detail').html(data);
	    
    $('#dataModal').modal('show');
   
       
      }
     });
	  
	 $.ajax({
      url:"taskchart.php",
	  async: false,
      method:"POST",
      data:{proj_id:proj_id},
      success:function(data){
		  
		    $('#employee_detail22').html(data);
       
     
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
      
     });

	 
				///////////send attach file/////////////
	 $('#file_form2').on("submit", function(event){  
     event.preventDefault();  
        
      if($('#select_image2').val()==''){
		   
		   alert('Please Select Files');
	   }
		else
     {   
      $.ajax({  
       url:"taskFile.php",  
       method:"POST",
	     
	   data:new FormData(this),  
       contentType:false, 
	   processData:false,
      
       beforeSend:function(){  
        $('#insert1').val("Attaching..");  
       }, 
  	   
       success:function(data){ 
       event.preventDefault(); 	   
       taskFileRefresh();
        $('#file_form2')[0].reset();  
        $('#file_data').html('');
		$('#insert1').val("Attach"); 
        alert('File Attached');
		
       }  
      }); 

     

	  
     }

    }); 

  
   });
	
function taskFileRefresh(){
	
	
	var proj_id =$('#id2').val();
	 $.ajax({
      url:"taskFileSelect.php",
      method:"POST",
      data:{proj_id:proj_id},
      success:function(data){
		  
		    $('#task_file_detail').html(data);
        
     
      }
     });
}

function taskRefresh(){
	
	
	var projId =$('#projId').val();
	 $.ajax({
      url:"refreshTask.php",
      method:"POST",
      data:{projId:projId},
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
   

   var table = $('#example99').DataTable( {
         "bDestroy": true
    } );
 
   
    var table = $('#example8').DataTable( {
         "bDestroy": true
    } );
 