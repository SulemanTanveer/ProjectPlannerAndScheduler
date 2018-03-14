
   $(document).ready(function(){

$(document).on('click', '#add', function(){  
              $('#insert').val("Insert");  
              $('#insert_form')[0].reset();  
         
   	   
   	  
   	  });  
  $(document).bind('keypress', function(e) {
            if(e.keyCode==13){
                 $('#go').trigger('click');
             }
        });        
$(document).on('click', '#bbb', function(){
             $("#message_form")[0].reset();
			  $('#add_data_Modal').modal('show');
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
                        
					   $('#employee_table').html(data);
						$('#add_data_Modal2').modal('hide');
                   }  
              })  
         });	
   	
   	
   	
    $('#insert_form').on("submit", function(event){  
     event.preventDefault();  
        
     {  
      $.ajax({  
       url:"insert.php",  
       method:"POST",  
	   data:new FormData(this),  
       contentType:false, 
	   processData:false,
      
       beforeSend:function(){  
        $('#insert').val("Inserting");  
       }, 
  	   
       success:function(data){  
        $('#insert_form')[0].reset();  
        $('#add_data_Modal').modal('hide');  
        $('#employee_table').html(data);
        $('#select_image').val('');  		
       }  
      }); 



	  
     }

    });
   
   
  
 

   
   
     $(document).on('click', '.delete_data', function(){
     //$('#dataModal').modal();
     var employee_id = $(this).attr("id");
   if(confirm("Are you sure you want to delete this?")){ 
    $.ajax({
      url:"deleteOutputMessage.php",
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
     //$('#dataModal').modal();
     var employee_id = $(this).attr("id");	
	
 
 
  // Example call to reload from original file

	
     $.ajax({
      url:"selectOutputMessage.php",
      method:"POST",
      data:{employee_id:employee_id},
      success:function(data){
       $('#employee_detail').html(data);
       $('#dataModal').modal('show');
	
	  
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

    
   });  
   
 