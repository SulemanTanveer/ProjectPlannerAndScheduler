
   $(document).ready(function(){
	   
	  
    var table = $('#example').DataTable( {
        responsive: true
    } );
 new $.fn.dataTable.FixedHeader( table );
   
   

 
     ////////////////////////////////////////////////////
	//////////////////////////view data script///////////
	 ////////////////////////////////////////////////////
    $(document).on('click', '.view_data', function(){
		 $(".panel-body").prepend('<div id="loadingDiv"> </div>');  
 $('#employee_detail').html('');   
   $('#employee_detail2').html('');
   
     var employee_id = $(this).attr("id");
	 //alert(employee_id);
   $.ajax({
      url:"select.php",
      method:"POST",
	   
      data:{employee_id:employee_id},
      success:function(data){
		 $("#loadingDiv").hide();
		  $("#dataModal").modal('show');
		 empChart(employee_id);
          var responsedata = $.parseJSON(data);
	    $('#employee_detail').html(responsedata[2]);
		 $('#employee_detail3').html(responsedata[3]);
	   $('#employee_detail4').html(responsedata[1]);
       $('#employee_detail0').html(responsedata[0]);  
	
	 
      }
     });
	 
	
	 
	 
	 
    });
    
	function empChart(employee_id){
		
		$.ajax({
      url:"empChart.php",
      method:"POST",
	  
      data:{employee_id:employee_id},
      success:function(data2){
		   
        $('#employee_detail2').html(data2);  
	 
         
		 
      }
     });
	}
	
	$(document).on('click', '#total_emp', function(){
     //$('#dataModal').modal();
     var employee_id = $(this).attr("id");
     $.ajax({
      url:"total_emp.php",
      method:"POST",
      data:{employee_id:employee_id},
      success:function(data){
		
       $('#employee_table').html(data);
      
      }
     });
    });
	
		 $('#active').click(function(e) {
		 e.preventDefault();
		  var employee_id = $(this).attr("id");
              $.ajax({  
                   url:"active_emp.php",  
                   method:"POST",  
                   data:{employee_id:employee_id},  
                  
                   success:function(data){  
                   
				    $('#employee_table').html(data);
                   }  
    });
});
	 $('#Inactive').click(function(e) {
		 e.preventDefault();
		  var employee_id = $(this).attr("id");
              $.ajax({  
                   url:"Inactive_emp.php",  
                   method:"POST",  
                   data:{employee_id:employee_id},  
                  
                   success:function(data){  
                   
				    $('#employee_table').html(data);
                   }  
    });
});
	
	$('#on_leave').click(function(e) {
		 e.preventDefault();
		  var employee_id = $(this).attr("id");
              $.ajax({  
                   url:"on_leave.php",  
                   method:"POST",  
                   data:{employee_id:employee_id},  
                  
                   success:function(data){  
                   
				    $('#employee_table').html(data);
                   }  
    });
}); }); 
////////////////////////////////////////////////////
////////////////table data validation////////////////
 ////////////////////////////////////////////////////
