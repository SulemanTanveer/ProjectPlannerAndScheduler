
   $(document).ready(function(){
	
	
	$(document).bind('keypress', function(e) {
            if(e.keyCode==13){
                 $('#go').trigger('click');
             }
        }); 
		
		$(document).bind('keypress', function(e) {
            if(e.keyCode==13){
                 $('#go2').trigger('click');
             }
        }); 
   $(document).on('click', '#add', function(){   
              $('#insert').val("Insert");  
              $('#insert_form')[0].reset();  
         
   	   
   	  
   	  });  
         $(document).on('click', '#bbb', function(){ 
             $("#message_form")[0].reset();
			  $('#add_data_Modal').modal('show');
         });  
		 
	 $(document).on('click', '#total2', function(){
     
     var employee_id = $(this).attr("id");
     $.ajax({
      url:"reload.php",
      method:"POST",
      data:{employee_id:employee_id},
      success:function(data){
		 
       $('#employee_table').html(data);
      
      }
     });
    });	
	
	
	  $(document).on('click', '.reply_data', function(){
    	 $(".panel-body").prepend('<div id="loadingDiv"> </div>'); 
     var msg_id = $(this).attr("id");	
	
     $.ajax({
      url:"fetchMessage.php",
      method:"POST",
      data:{msg_id:msg_id},
      success:function(data){
		
		$("#loadingDiv").hide();
        $('#receiver2').val($.trim(data));  
		
       $('#add_data_Modal2').modal('show');
	
	  
      }
     });
    });

	
	 $(document).on('click', '.check3', function(){
	 
     //$('#dataModal').modal();
     var proj_id = $(this).attr('id');

	
     $.ajax({
      url:'downloadfilewrite.php',
      method:'POST',
      data:{proj_id:proj_id},
      success:function(data){
		 
   window.location = 'download.php';
  
      }
     });
    });
	
	
	
	
   	 $(document).on('click', '#seen2', function(){
    
     var employee_id = $(this).attr("id");
     $.ajax({
      url:"seenMessages.php",
      method:"POST",
      data:{employee_id:employee_id},
      success:function(data){
		 
       $('#employee_table').html(data);
      
      }
     });
    });
   	
   	 $(document).on('click', '#unseen2', function(){
 	 
     var employee_id = $(this).attr("id");
     $.ajax({
      url:"unseenMessages.php",
      method:"POST",
      data:{employee_id:employee_id},
      success:function(data){
		 
       $('#employee_table').html(data);
      
      }
     });
    });
	
	
	 $('#message_form2').on('submit', function(e){  
	 	 $(".panel-body").prepend('<div id="loadingDiv"> </div>'); 
              e.preventDefault();  
              $.ajax({  
                   url:"sendMessage.php",  
                   method:"POST",  
                   data:new FormData(this),  
                   contentType:false,  
                   //cache:false,  
                   processData:false,  
				    beforeSend:function(){  
					$('#go2').val("Sending..");  
				   }, 
				   
                   success:function(data)  
                   {  
                      $("#loadingDiv").hide();
					  $('#go2').val("Send"); 
						$('#add_data_Modal2').modal('hide');
						location.href ="outbox.php";
                   }  
              })  
         });
 
  
 

   
   
     $(document).on('click', '.delete_data', function(){
     	 $(".panel-body").prepend('<div id="loadingDiv"> </div>'); 
     var employee_id = $(this).attr("id");
   if(confirm("Are you sure you want to delete this?")){ 
    $.ajax({
      url:"deleteMessage.php",
      method:"POST",
      data:{employee_id:employee_id},
      success:function(data){
		    refresh();
    $("#loadingDiv").hide();
      $('#employee_table').html(data);
       
	  
     
     
      }
   });
   }
   else 
   	return false;
    });
    
     $(document).on('click', '.view_data', function(){
    	 $(".panel-body").prepend('<div id="loadingDiv"> </div>'); 
     var employee_id = $(this).attr("id");	
	 
	
     $.ajax({
      url:"selectMessage.php",
      method:"POST",
      data:{employee_id:employee_id},
      success:function(data){
		  refresh();
		  
		  
		  $("#loadingDiv").hide();
		  $('#employee_detail').html(data);
		 $('.'+ employee_id).css("background-color", "#00D211");
	    $('.'+ employee_id).text("Seen");
       $('#dataModal').modal('show');
	  
      }
     });
    });
	
 	  $('#bbb').on('click', function(e){  
             $("#message_form")[0].reset();
			  $('#add_data_Modal').modal('show');
         });
    

      $('#message_form').on('submit', function(e){  
	  	  
              e.preventDefault();  
              $.ajax({  
                   url:"sendMessage.php",  
                   method:"POST",  
                   data:new FormData(this),  
                   contentType:false,  
                   //cache:false,  
                   processData:false,  
				    beforeSend:function(){  
					$('#go').val("Sending..");  
				   }, 
				   
                   success:function(data)  
                   {   
				      $('#go').val("Send");  
                         $("#message_form")[0].reset();
					   $('#employee_table').html(data);
						$('#add_data_Modal').modal('hide');
                   }  
              })  
         });
    
   
     $(function(){
    var table = $('#example').DataTable( {
        responsive: true
    } );
 
    new $.fn.dataTable.FixedHeader( table );
  })

    function refresh(){
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
	  
} 
   });  
   
