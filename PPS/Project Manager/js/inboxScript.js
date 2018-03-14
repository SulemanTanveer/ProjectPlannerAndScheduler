
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
		 
	 $(document).on('click', '#total', function(){
    
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
     //$('#dataModal').modal();
     var msg_id = $(this).attr("id");	
	
     $.ajax({
      url:"fetchMessage.php",
      method:"POST",
      data:{msg_id:msg_id},
      success:function(data){
		
		
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
	
	
	
	
   	 $(document).on('click', '#seen', function(){
     //$('#dataModal').modal();
     var employee_id = $(this).attr("id");
     $.ajax({
      url:"seenMessages.php",
      method:"POST",
      data:{employee_id:employee_id},
      success:function(data){
		//alert(data);
       $('#employee_table').html(data);
      
      }
     });
    });
   	
   	 $(document).on('click', '#unseen', function(){
     //$('#dataModal').modal();
     var employee_id = $(this).attr("id");
     $.ajax({
      url:"unseenMessages.php",
      method:"POST",
      data:{employee_id:employee_id},
      success:function(data){
		//alert(data);
       $('#employee_table').html(data);
      
      }
     });
    });
	
	
	 $('#message_form2').on('submit', function(e){  
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
                      
					  $('#go2').val("Send"); 
						$('#add_data_Modal2').modal('hide');
						location.href ="outbox.php";
                   }  
              })  
         });
   
   
$('#close').click(function(){
	 $('#img2').show();
 $.ajax({
 type: "POST",
 url: "reload.php",
 data: "",
 success: function(msg){
	 $('#employee_table').html(msg);
	  $('#img2').hide();
	 $('#dataModal').modal('hide');

 },
 error: function(XMLHttpRequest, textStatus, errorThrown) {
    alert("Some error occured");
 }
 });
});
  
 

   
   
     $(document).on('click', '.delete_data', function(){
     //$('#dataModal').modal();
     var employee_id = $(this).attr("id");
   if(confirm("Are you sure you want to delete this?")){ 
    $.ajax({
      url:"deleteMessage.php",
      method:"POST",
      data:{employee_id:employee_id},
      success:function(data){
    
      $('#employee_table').html(data);
       $("#t").load(" #t");
	   $("#tttt").load(" #tttt");
	   $("#ttt").load(" #ttt");
	  $("#tt").load(" #tt");
	  
     
     
      }
   });
   }
   else 
   	return false;
    });
    
     $(document).on('click', '.view_data', function(){
		  $(".panel-body").prepend('<div id="loadingDiv"> </div>'); 
  $('#message_detail').html('');
     var employee_id = $(this).attr("id");	
	 $.ajax({
      url:"selectMessage.php",
      method:"POST",
      data:{employee_id:employee_id},
      success:function(data){
        refresh();
		  
		  
		  $("#loadingDiv").hide();
       $('#message_detail').html(data);
	   $('.'+ employee_id).css("background-color", "#00D211");
	    $('.'+ employee_id).text("Seen");
       $('#messageDetails').modal('show');
	  
	  
      }
     });
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
   function refresh(){
	  $.ajax({
	 
      url:"refreshMsg.php",
      method:"POST",
	  
      data:{},
      success:function(data){
		  var responsedata = $.parseJSON(data);
 //  alert('Total:'+responsedata[0]+'cur:'+responsedata[1]+'ex:'+responsedata[2]);
	       
       $('#total11').html(responsedata[0]); ;
	    $('#seen11').html(responsedata[2]); ;
        $('#unseen11').html(responsedata[1]); ;
      }
     });
	  
}  
   
     $(function(){
    var table = $('#example').DataTable( {
        responsive: true
    } );
 
    new $.fn.dataTable.FixedHeader( table );
  })

    
   });  
   
 