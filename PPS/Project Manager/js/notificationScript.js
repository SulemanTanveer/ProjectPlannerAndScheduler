
   $(document).ready(function(){
	
 
	
	 	
   	 $(document).on('click', '#total', function(){
     //$('#dataModal').modal();
     var employee_id = $(this).attr("id");
     $.ajax({
      url:"totalNotifications.php",
      method:"POST",
      data:{employee_id:employee_id},
      success:function(data){
		//alert(data);
       $('#employee_table').html(data);
      
      }
     });
    });
	
	
	
   	 $(document).on('click', '#seen', function(){
     //$('#dataModal').modal();
     var employee_id = $(this).attr("id");
     $.ajax({
      url:"seenNotifications.php",
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
      url:"unseenNotifications.php",
      method:"POST",
      data:{employee_id:employee_id},
      success:function(data){
		//alert(data);
       $('#employee_table').html(data);
      
      }
     });
    });
	
 

   
   
     $(document).on('click', '.delete_data', function(){
     //$('#dataModal').modal();
     var employee_id = $(this).attr("id");
   if(confirm("Are you sure you want to delete this?")){ 
    $.ajax({
      url:"deleteNotification.php",
      method:"POST",
      data:{employee_id:employee_id},
      success:function(data){
    
      $('#employee_table').html(data);
       
     
     
      }
   });
   }
   else 
   	return false;
    });
    
     $(document).on('click', '.view_data', function(){
  $('#message_detail').html('');
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

     
   
     $(function(){
    var table = $('#example').DataTable( {
        responsive: true
    } );
 
    
  });

    
   });  
   
 