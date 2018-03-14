
   $(document).ready(function(){
 $('#logout').click(function(){  
           var action = "logout";  
           $.ajax({  
                url:"../action.php",  
                method:"POST",  
                data:{action:action},  
                success:function()  
                {  
                     window.location.href="../index.php";
                }  
           });  
      });
   	$('#add').click(function(){  
              $('#insert').val("Insert");  
              $('#insert_form')[0].reset();  
         
   	   
   	  
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
     
     var employee_id = $(this).attr("id");	
	
 
   

	
     $.ajax({
      url:"selectMessage.php",
      method:"POST",
      data:{employee_id:employee_id},
      success:function(data){
       $('#employee_detail').html(data);
	  
       $('#dataModal').modal('show');
	 // $("#t").load(" #t");
	 
	  
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
					   $('#employee_table').html(data);
					     $("#message_form")[0].reset();
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
   
 