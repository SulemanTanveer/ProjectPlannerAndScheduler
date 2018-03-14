	
$("#opt1").change(function() {
        var val = $(this).val();
		
		 if (val =='Un Assign')
        
		{
			 $("#teamStatus").val("In-Active");
			
            }
	 else {
             $("#teamStatus").val("Active");
        }
		
       		
			
		
    });
	
$("#projId1").change(function() {
        var val = $(this).val();
		
		 if (val =='Un Assign')
        
		{
			 $("#teamStatus1").val("In-Active");
			
            }
	 else {
             $("#teamStatus1").val("Active");
        }
			
    });
   $(document).ready(function(){
	    var table = $('#example4').DataTable( {
        "bDestroy": true
    } );
  new $.fn.dataTable.FixedHeader( table );  
   
$('#edit_form').on("submit", function(event){  
     event.preventDefault();  
         
	  
     {  
      $.ajax({  
       url:"updateTeam.php",  
       method:"POST",  
	   data:new FormData(this),  
       contentType:false, 
	   processData:false,
      
       beforeSend:function(){  
        $('#insert33').val("Updating..");  
       }, 
  	   
       success:function(data){  
			  refresh();  
       $('#edit_data_Modal').modal('hide');  
        $('#employee_table').html(data);
      	$('#insert33').val("Update");
      $('#add_data_Modal')[0].reset(); 
			
       }  
      }); 

     }
    
   });
	 
   	$('#age').click(function(){  
              $('#insert').val("Insert");  
             
         
   	   
   	  
   	  });  
         $(document).on('click', '.edit_data', function(){
     //$('#dataModal').modal();
     var proj_id = $(this).attr("id");
   { 
    $.ajax({
      url:"editTeam.php",
      method:"POST",
      data:{proj_id:proj_id},
      success:function(data){
      
     $('#team_details').html(data);
	$('#edit_data_Modal').modal('show');
     
      }
   });
   }
  
    });
   	
   	
   	
   	
   	
    $('#insert_form').on("submit", function(event){  
     event.preventDefault();  
         var value= $("#opt1").val();
	     if(!$('input.check_perm').is(':checked')) {
			 
           alert('Choose Members Please');
        
           
        }
		else
     {  
      $.ajax({  
       url:"insertTeam.php",  
       method:"POST",  
	   data:new FormData(this),  
       contentType:false, 
	   processData:false,
      
       beforeSend:function(){  
        $('#insert').val("Inserting..");  
       }, 
  	   
       success:function(data){ 
		$('#insert').val("Insert"); 	   
		refresh();
        $('#insert_form')[0].reset();  
        $('#add_data_Modal').modal('hide');  
        $('#employee_table').html(data);
        $('#select_image').val('');  
			 	
      $('#add_data_Modal')[0].reset();  		
       }  
      }); 

     }
    });
   
   $(document).on('click', '#totalTeam', function(){
     
		  var employee_id = $(this).attr("id");
              $.ajax({  
                   url:"total_team.php",  
                   method:"POST",  
                   data:{employee_id:employee_id},  
                  
                   success:function(data){  
                    
				    $('#employee_table').html(data);
                   }  
    });
});	 
      
 $(document).on('click', '#activeTeam', function(){
     
		  var employee_id = $(this).attr("id");
              $.ajax({  
                   url:"active_team.php",  
                   method:"POST",  
                   data:{employee_id:employee_id},  
                  
                   success:function(data){  
                    
				    $('#employee_table').html(data);
                   }  
    });
});	  

  $(document).on('click', '#Inactive', function(){
     
		  var employee_id = $(this).attr("id");
              $.ajax({  
                   url:"inactive_team.php",  
                   method:"POST",  
                   data:{employee_id:employee_id},  
                  
                   success:function(data){  
                    
				    $('#employee_table').html(data);
                   }  
    });
});	  
   
   
   
   
     $(document).on('click', '.delete_data', function(){
      
     var proj_id = $(this).attr("id");
   if(confirm("Are you sure you want to delete this?")){ 
    $.ajax({
      url:"deleteTeam.php",
      method:"POST",
      data:{proj_id:proj_id},
      success:function(data){
		   
   if($.trim(data) =='no')  
  {  
    alert('This team is already used in projects so can not be deleted..!');
  }
  else
  {
   refresh();
	 $("#loadingDiv").hide();
      $('#employee_table').html(data);
  }
     
      }
   });
   }
   else 
   	return false;
    });
    
	
   
    
	
	
    


	  $(document).on('click', '.view_data', function(){
	    
 $('#employee_detail').html('');   
   $('#employee_detail2').html('');
   $('#employee_detail3').html('');
   $('#employee_detail4').html('');
    
     var proj_id = $(this).attr("id");
   $.ajax({
      url:"selectTeam.php",
      method:"POST",
	  
      data:{proj_id:proj_id},
      success:function(data){
   
	  teamChart(proj_id);
       $('#employee_detail').html(data);
	     $("#loadingDiv").hide();
	   $("#dataModal").modal('show');
      }
     });
	
	 
	 
	 
    });
    
     
    
    
    
    
    
   });  
   
    function teamChart(proj_id){
	$.ajax({
      url:"teamChart.php",
      method:"POST",
	  
      data:{proj_id:proj_id},
      success:function(data){
		  
		   var responsedata = $.parseJSON(data);
		   
        
	  $('#employee_detail2').html(responsedata[0]);
        $('#employee_detail3').html(responsedata[1]);
		 $('#employee_detail4').html(responsedata[2]);
      }
     });
	 
	 }
	   
	
	
	 
	
 function refresh(){
	  $.ajax({
	 
      url:"refreshTeam.php",
      method:"POST",
	  
      data:{},
      success:function(data){
		  var responsedata = $.parseJSON(data);
 //  alert('Total:'+responsedata[0]+'cur:'+responsedata[1]+'ex:'+responsedata[2]);
	       
       $('#total_team').html(responsedata[0]); ;
	    $('#active_team').html(responsedata[1]); ;
        $('#inactive_team').html(responsedata[2]); ;
      }
     });
	  
}  
 	
	
	
	
    var table = $('#example').DataTable( {
        "bDestroy": true
    } );
  
    
 var table = $('#example3').DataTable( {
        "bDestroy": true
    } );
  
  
  var table = $('#example2').DataTable( {
        "bDestroy": true
    } );
   
  
 
