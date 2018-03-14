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
		
      
	   $('#message_detail').html(data);
       $('#messageDetails').modal('show');
      }
     });
}); 


////////////////////////////////////////////////////
   ////////////////dash_board graphs script///////////////////
   /////////////////////////////////////////////////////
$(document).on('click', '#dash_board', function(){
     
     var employee_id = $(this).attr("id");
     $.ajax({
      url:"linechart.php",
      method:"POST",
      data:{},
      success:function(data){
		
        window.location.href="dashboard.php";
      
      }
     });
    });
	