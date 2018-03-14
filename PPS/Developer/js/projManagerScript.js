		//////////////////////
$("#checkBadge").click(function(){
					
					$("#checkBadge2").removeClass("badge-notify");
					$("#checkBadge2").removeClass("badge");
					$("#checkBadge2").html("");
				});
 			
$(document).on('click', '.projAlert', function(){
		 
 $('#employee_detail').html('');  
$('#employee_detail3').html(''); 
   $('#proj_progress').html('');
   $('#task_count').html('');
     $('#subtask_count').html('');
	   $('#proj_progress').html('');
   $('#lab').html('');
    $('#days').html('');
   
     var proj_id = $(this).attr("id");
	 
   $.ajax({
      url:"projectSelect.php",
      method:"POST",
	   
      data:{proj_id:proj_id},
      success:function(data){ 
	  	 alert(data);
	  $("#projectDetails").modal('show');
   
  var responsedata = $.parseJSON(data);
        projectChart(proj_id);
	    $('#employee_detail88').html(responsedata[2]);
		  $('#task_count').html(responsedata[0]);
	    $('#subtask_count').html(responsedata[1]);
	    $('#employee_detail0').html(responsedata[3]);
	       $('#comlete_task_count').html(responsedata[6]);
	    $('#comlete_subtask_count').html(responsedata[7]);
		 $('#metric_data').html(responsedata[8]);
		 
	   if($.trim(responsedata[5]) ==='Days Ago'){
	   $('#days').html(responsedata[4]);
	     $('#lab').html(responsedata[5]);
	   }
	   else{
		   $('#days').html(responsedata[4]);
		    $('#lab').html('Days Remaining');
	   }
	   	 
      }
     }); 
});
				

 	 function projectChart(proj_id){
	$.ajax({
      url:"projectChart.php",
      method:"POST",
	  
      data:{proj_id:proj_id},
      success:function(data2){
	  
	
		    if($.trim(data2) ==='No')  
		  { 
	    
	  }  
       else{ $('#employee_detail3').html(data2);  }
	
         
		 
      }
	    
     });} 				
				
				
				
				
				
				
				
				
				$(document).on('click', '.taskAlert', function(){
		  var deadlineFlag=1;
		  var proj_id = $(this).attr("id");
			 $('#count1').load('#count1');
     $.ajax({
      url:"selectTask.php",
      method:"POST",
      data:{proj_id:proj_id,deadlineFlag:deadlineFlag},
      success:function(data){
		
      
	   $('#task_detail').html(data);
       $('#taskDetails').modal('show');
      }
     });
});	
$(document).on('click', '.subtaskAlert', function(){
	var deadlineFlag=1;
		  var proj_id = $(this).attr("id");
			 $('#count1').load('#count1');
     $.ajax({
      url:"selectSubtask.php",
      method:"POST",
      data:{proj_id:proj_id,deadlineFlag:deadlineFlag},
      success:function(data){
		
      
	   $('#subtask_detail').html(data);
       $('#subtaskDetails').modal('show');
      }
     });
});	
////////////////////////////////////////////////////
   ////////////////alert message script///////////////////
   /////////////////////////////////////////////////////
		$(document).on('click', '.msgAlert', function(){
		  var employee_id = $(this).attr("id");
			
     $.ajax({
      url:"selectMessage.php",
      method:"POST",
      data:{employee_id:employee_id},
      success:function(data){
		refresh2();
      	 $('.'+ employee_id).css("background-color", "#00D211");
	    $('.'+ employee_id).text("Seen");
      
	   $('#message_detail').html(data);
       $('#messageDetails').modal('show');
      }
     });
}); 
function refresh2(){
	  $.ajax({
	 
      url:"refreshMsg.php",
      method:"POST",
	  
      data:{},
      success:function(data){
		  var responsedata = $.parseJSON(data);
 //  alert('Total:'+responsedata[0]+'cur:'+responsedata[1]+'ex:'+responsedata[2]);
	       
       $('#total1').html(responsedata[0]); ;
	    $('#seen1').html(responsedata[2]); ;
        $('#unseen1').html(responsedata[1]); ;
      }
     });
	  
}////////////////////////////////////////////////////
   ////////////////project file script///////////////////
   /////////////////////////////////////////////////////
		 $(document).on('click', '.project_file_data', function(){
			 
     var proj_id = $(this).attr("id");
    $('#id1').val(proj_id);  
	 var element1 = proj_id.split("-");
    var proj_id1=element1[1];
   $.ajax({
      url:"projectNotificationFileSelect.php",
      method:"POST",
      data:{proj_id:proj_id},
      success:function(data){
		   if($.trim(data) =='no')  
		  {     refresh();
		  $('.'+ proj_id1).css("background-color", "#00D211");
	    $('.'+ proj_id1).text("Seen");		
			   alert("Project Not Existed");  
				 				 
		 } 
		 else{
		  refresh();
		  $('.'+ proj_id1).css("background-color", "#00D211");
	    $('.'+ proj_id1).text("Seen");
		     
		    $('#project_file_detail').html(data);
       $('#projectFileModal').modal('show');
     
      }
	  
	  }
     });
			});
////////////////////////////////////////////////////
   ////////////////task file script///////////////////
   /////////////////////////////////////////////////////		 
	$(document).on('click', '.task_file_data', function(){
     var proj_id = $(this).attr("id");
    $('#id2').val(proj_id);  
	 
    var element1 = proj_id.split("-");
    var proj_id1=element1[1];

	 
	
   $.ajax({
      url:"taskNotificationFileSelect.php",
      method:"POST",
      data:{proj_id:proj_id},
      success:function(data){
		   if($.trim(data) =='no')  
		  {   refresh();
		  $('.'+ proj_id1).css("background-color", "#00D211");
	    $('.'+ proj_id1).text("Seen");  
			   alert("Task Not Existed");  
										 
		 } 
		 else{
		  refresh();
		  $('.'+ proj_id1).css("background-color", "#00D211");
	    $('.'+ proj_id1).text("Seen");
		    $('#task_file_detail').html(data);
       $('#taskFileModal').modal('show');
     
      }}
     });
			});
			
////////////////////////////////////////////////////
   ////////////////subtask file script///////////////////
   /////////////////////////////////////////////////////	 
		 $(document).on('click', '.subtask_file_data', function(){
     var proj_id = $(this).attr("id");
    $('#id3').val(proj_id); 
 var element1 = proj_id.split("-");
    var proj_id1=element1[1];	
   $.ajax({
      url:"subtaskNotificationFileSelect.php",
      method:"POST",
      data:{proj_id:proj_id},
      success:function(data){
		   if($.trim(data) =='no')  
		  {     refresh();
		  $('.'+ proj_id1).css("background-color", "#00D211");
	    $('.'+ proj_id1).text("Seen"); 
			   alert("Subtask Not Existed");  
										 
		 } 
		 else{
		  refresh();
		  $('.'+ proj_id1).css("background-color", "#00D211");
	    $('.'+ proj_id1).text("Seen");
	  $('#subtask_file_detail').html(data);
       $('#subtaskFileModal').modal('show');
     
      }}
     });
			});
/////////////////////////////////////////////////////////////////////////
   ////////////////project assignment notification script///////////////////
/////////////////////////////////////////////////////////////////////
$(document).on('click', '.proj_assignment', function(){
	
		  $('#employee_detail').html('');  
$('#employee_detail3').html(''); 
   $('#proj_progress').html('');
   $('#task_count').html('');
     $('#subtask_count').html('');
	   $('#proj_progress').html('');
   $('#lab').html('');
    $('#days').html('');
   
     var proj_id = $(this).attr("id");
	     $('#id1').val(proj_id);  
	 var element1 = proj_id.split("-");
    var proj_id1=element1[1];
   $.ajax({
      url:"projectNotificationSelect.php",
      method:"POST",
	   
      data:{proj_id:proj_id},
      success:function(data){
 if($.trim(data) =='no')  
		  {     refresh();
		  $('.'+ proj_id1).css("background-color", "#00D211");
	    $('.'+ proj_id1).text("Seen");
			   alert("Project Not Existed");  
										 
		 } 
		 else{		  
	  	 refresh();
		  $('.'+ proj_id1).css("background-color", "#00D211");
	    $('.'+ proj_id1).text("Seen");
	  $("#projectDetails").modal('show');
   
  var responsedata = $.parseJSON(data);
     //  projectChart(proj_id);
	    $('#employee_detail88').html(responsedata[2]);
		  $('#task_count').html(responsedata[0]);
	    $('#subtask_count').html(responsedata[1]);
	    $('#employee_detail0').html(responsedata[3]);
	       $('#comlete_task_count').html(responsedata[6]);
	    $('#comlete_subtask_count').html(responsedata[7]);
		 $('#metric_data').html(responsedata[8]);
		 
	   if($.trim(responsedata[5]) ==='Days Ago'){
	   $('#days').html(responsedata[4]);
	     $('#lab').html(responsedata[5]);
	   }
	   else{
		   $('#days').html(responsedata[4]);
		    $('#lab').html('Days Remaining');
	   }
	   	 
      }}
     }); 
});
	/////////////////////////////////////////////////////////////////////////
   ////////////////task assignment notification script///////////////////
/////////////////////////////////////////////////////////////////////			
 $(document).on('click', '.task_assignment', function(){
	 
	 
		  var proj_id = $(this).attr("id");
			  var element1 = proj_id.split("-");
    var proj_id1=element1[1];
     $.ajax({
      url:"selectNotificationTask.php",
      method:"POST",
      data:{proj_id:proj_id},
      success:function(data){
		   if($.trim(data) =='no')  
		  {     refresh();
		 $('.'+ proj_id1).css("background-color", "#00D211");
	    $('.'+ proj_id1).text("Seen");
			   alert("Task Not Existed");  
										 
		 } 
		 else{
		    refresh();
		 $('.'+ proj_id1).css("background-color", "#00D211");
	    $('.'+ proj_id1).text("Seen");
	   $('#task_detail').html(data);
       $('#taskDetails').modal('show');
      }}
     });
});	


/////////////////////////////////////////////////////////////////////////
   ////////////////subtask assignment notification script///////////////////
/////////////////////////////////////////////////////////////////////
$(document).on('click', '.subtask_assignment', function(){
		  	  var proj_id = $(this).attr("id");
			  var element1 = proj_id.split("-");
    var proj_id1=element1[1];
     $.ajax({
      url:"selectNotificationSubTask.php",
      method:"POST",
      data:{proj_id:proj_id},
      success:function(data){
		   if($.trim(data) =='no')  
		  {      refresh();
		 $('.'+ proj_id1).css("background-color", "#00D211");
	    $('.'+ proj_id1).text("Seen");
      
			   alert("Subtask Not Existed");  
										 
		 } 
		 else{
		    refresh();
		 $('.'+ proj_id1).css("background-color", "#00D211");
	    $('.'+ proj_id1).text("Seen");
      
	   $('#subtask_detail').html(data);
       $('#subtaskDetails').modal('show');
      }}
     });
});	

   function refresh(){
	  $.ajax({
	 
      url:"refreshNotifications.php",
      method:"POST",
	  
      data:{},
      success:function(data){
		  var responsedata = $.parseJSON(data);
 //  alert('Total:'+responsedata[0]+'cur:'+responsedata[1]+'ex:'+responsedata[2]);
	       
       $('#total').html(responsedata[0]); ;
	    $('#unseen').html(responsedata[2]); ;
        $('#seen').html(responsedata[1]); ;
      }
     });
	  
}  
