
$('#c1').click(function(){  
              $('#insert').val("Insert");  
              $('#insert_form')[0].reset();  
         
   	   
   	  
   	  }); 
	  	////////////////set attach file project id//////////		 
		 $(document).on('click', '.file_data', function(){
			 $(".panel-body").prepend('<div id="loadingDiv"> </div>');   
     var proj_id = $(this).attr("id");
    $('#id1').val(proj_id);  
	 $('#file_data').html('');
	 $('#select_image2').val('');
	 $('#file_label').html('');
   $.ajax({
      url:"projectFileSelect.php",
      method:"POST",
      data:{proj_id:proj_id},
      success:function(data){
		    $("#loadingDiv").fadeOut();
		    $('#file_detail').html(data);
       $('#filedataModal').modal('show');
     
      }
     });
			});
			
			
			
			 $(document).on('click', '.edit_data', function(){
  	$(".panel-body").prepend('<div id="loadingDiv"> </div>');   
     var proj_id = $(this).attr("id");
   { 
    $.ajax({
      url:"projectEdit.php",
      method:"POST",
      data:{proj_id:proj_id},
      success:function(data){
      	$("#loadingDiv").fadeOut();
      $('#employee_table').html(data);
     
     
     
      }
   });
   }
  
    });
   $(document).ready(function(){
	   
	   ////////////////////////////////////
	////////////////proj status dropdown////////////
////////////////////////////////////////////////	
  $('#opt1').on("change", function(event){ 
        var val = $(this).val();
		
        if (val == 'Un Assign') {
            $("#opt2").html("<option value='Pending'>Pending</option>");
			$("#cc").html('Start Date');
			$("#startDate").prop('required',false);
        } else  {
            $("#opt2").html("<option value='Not Started'>Assign(Not Started)</option><option value='In-Progress'>In-Progress</option>");
        } 
    });
	
	 $('#opt2').on("change", function(event){ 
        var val = $(this).val();
		
        if (val == 'In-Progress') {
            $("#cc").html('Start Date<sup><span style = "color: red;  font-size: 10px;" class="glyphicon glyphicon-asterisk"></span></sup>');
			$("#startDate").prop('required',true);
        } else  {
           $("#cc").html('Start Date');
			$("#startDate").prop('required',false);
        } 
    });
	 ////////////////////////////////////
	////////////////edit proj status dropdown////////////
////////////////////////////////////////////////	
  $('#opt3').on("change", function(event){ 
        var val = $(this).val();
		
        if (val == 'Un Assign') {
            $("#opt4").html("<option value='Pending'>Pending</option>");
			$(".ccc").html('Start Date');
			$("#startDate").prop('required',false);
        } else  {
            $("#opt4").html("<option value='Not Started'>Assign(Not Started)</option><option value='In-Progress'>In-Progress</option><option value='Completed'>Completed</option>");
        } 
    });
	
	 $('#opt4').on("change", function(event){ 
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
	
	
function projFileRefresh(){
	
	var proj_id=$('#id1').val();
	 
   $.ajax({
      url:"projectFileSelect.php",
      method:"POST",
      data:{proj_id:proj_id},
      success:function(data){
		     
		    $('#file_detail').html(data);
       
     
      }
     });
	
	
}	
	
	
  $('#file_form').on("submit", function(event){  
     event.preventDefault();  
	 
       if($('#select_image2').val()==''){
		   
		   alert('Please Select Files');
	   }
		else
     {   
      $.ajax({  
       url:"projectFile.php",  
       method:"POST",  
	   data:new FormData(this),  
       contentType:false, 
	   processData:false,
      
       beforeSend:function(){  
        $('#insert1').val("Attaching..");  
       }, 
  	   
       success:function(data){  
	    projFileRefresh();
        $('#file_form')[0].reset();  
         $('#file_label').html('');
		$('#insert1').val("Attach"); 
		$('#file_data').html('');
        alert("Files Attached"); 
		
		
       }  
      }); 

     }

    }); 
   	
 
 
 
 
 
 
 $(document).on('click', '.task_data', function(){
     //$('#dataModal').modal();
     var proj_id = $(this).attr("id");
   { 
    $.ajax({
      url:"task.php",
      method:"POST",
      data:{proj_id:proj_id},
      success:function(data){
      
      $('#employee_table').html(data);
     
     
     
      }
   });
   }
  
			});
   
	
	  $('#add3').click(function(){  
              $('#insert').val("Insert");  
              $('#insert_form')[0].reset();  
         
   	  }); 	  
	  
///////////////////////////////////////////////
/////////////////Register Project/////////////
/////////////////////////////////////////////        

   	
   var count=0;
   	
    $('#insert_form').on("submit", function(event){  
		var alertMsg='';
		var flag=true;
	 event.preventDefault(); 
	  
	  
	   if($("#deadline").val() < $("#curDate22").val()){
		 
	 alertMsg+='Please enter valid deadline' +'\n';
	 flag=false;
	 $('#deadline').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
	 
	}
	  
	  if($("#startDate").val()!=''){
		 
	 if($("#startDate").val() < $("#curDate22").val()){
		
	 alertMsg+='Please enter valid start date'+ '\n';
	 flag=false;
	 $('#startDate').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
	 
	}
	  if($("#startDate").val() > $("#deadline").val()){
		
	 alertMsg+='Please enter valid dates'+ '\n';
	 flag=false;
	 $('#startDate').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
	 
	}
	    
	  }
		if(flag)
     {  
      $.ajax({  
       url:"projectInsert.php",  
       method:"POST",  
	   data:new FormData(this),  
       contentType:false, 
	   processData:false,
      
       beforeSend:function(){  
        $('#insert').val("Inserting");  
       }, 
  	   
       success:function(data){  
        
		  $('#insert').val("Insert");  
        $('#add_data_Modal').modal('hide');  
        $('#employee_table').html(data);
       $('#insert_form')[0].reset(); 		
       }  
      });  
	  }
	else{
		
		 alert(alertMsg);
	 count++;
	}
	  
	  });
	  
 $('#add').click(function(){ 
			
           $('#insert_form')[0].reset();  
			if(count>1){										
             
                $('#deadline').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });

			    $('#startDate').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
}
  
   	  });    
   var count1=0;
   /////////////////////////edit project/////
   $('#insert_form1').on('submit', function(e){  
              e.preventDefault();  
			   $('#insert').val('Updating..'); 
			   var alertMsg='';
		var flag=true;
	 event.preventDefault(); 
	 
	  
	   if($("#deadline").val() < $("#curDate2").val()){
		
	 alertMsg+='Please enter valid deadline'+ '\n';
	 flag=false;
	 $('#deadline').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
	 
	}
	  
	  if($("#startDate").val()!=''){
	 if($("#startDate").val() < $("#curDate2").val()){
		
	 alertMsg+='Please enter valid start date'+ '\n';
	 flag=false;
	 $('#startDate').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
	 
	}
	  if($("#startDate").val() > $("#deadline").val()){
		
	 alertMsg+='Please enter valid dates'+ '\n';
	 flag=false;
	 $('#startDate').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
	 
	}
	    
	  }
		if(flag)
     {  
              $.ajax({  
                   url:'projectUpdate.php',  
                   method:'POST',  
                   data:new FormData(this),  
                   contentType:false,  
                   
                   processData:false,  
                   success:function(data)  
                   {  
				    $('#insert').val('Update'); 
                       alert(data);
						location.href = 'project.php';
                   }  
	 }) }

else{
		 $('#insert').val('Update'); 
		 alert(alertMsg);
	 count1++;
	}



	 
         });
		 
		 
		  $('.edit_data').click(function(){ 
			
           
			if(count1>1){										
             
                $('#deadline').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });

			    $('#startDate').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
}
  
   	  });    
   
   ///////////////////////////
   
     $(document).on('click', '.delete_data', function(){
		 $(".panel-body").prepend('<div id="loadingDiv"> </div>'); 
     //$('#dataModal').modal();
     var proj_id = $(this).attr("id");
   if(confirm("Are you sure you want to delete this?")){ 
   	$(".panel-body").prepend('<div id="loadingDiv"> </div>');   
    $.ajax({
      url:"projectDelete.php",
      method:"POST",
      data:{proj_id:proj_id},
      success:function(data){
		  alert(data);
       	$("#loadingDiv").fadeOut();
      $('#employee_table').html(data);
      
      }
   });
   }
   else 
   	return false;
    });
    
     
	 ////////////////////////////////////////////////////
	//////////////////////////view data script///////////
	 ////////////////////////////////////////////////////
    $(document).on('click', '.view_data', function(){
		  
	$(".panel-body").prepend('<div id="loadingDiv"> </div>');   
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
	  	  $("#loadingDiv").hide();
		 // projChart(proj_id);
	  $("#projectDetails").modal('show');
   
  var responsedata = $.parseJSON(data);

	    $('#employee_detail88').html(responsedata[2]);
		  $('#task_count').html(responsedata[0]);
	    $('#subtask_count').html(responsedata[1]);
	    $('#employee_detail0').html(responsedata[3]);
	       $('#comlete_task_count').html(responsedata[6]);
	    $('#comlete_subtask_count').html(responsedata[7]);
		$('#employee_detail55').html(responsedata[8]);
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
    

function projChart(proj_id){
	
	$.ajax({
      url:"projectChart.php",
      method:"POST",
	  
      data:{proj_id:proj_id},
      success:function(data2){
		 //  $("#loading").fadeOut("slow");
		    if($.trim(data2) ==='No')  
		  { 
	    
	  }  
       else{ $('#employee_detail3').html(data2);  }
	
         
		 
      }
     });
	
}


	
		$(document).on('click', '#in_prog', function(){
		 $("#yyy").prepend('<div id="loadingDiv"> </div>');   
		 
		  var employee_id = $(this).attr("id");
              $.ajax({  
                   url:"inProgress_proj.php",  
                   method:"POST",  
                   data:{employee_id:employee_id},  
                  
                   success:function(data){  
                     $("#loadingDiv").fadeOut();
				    $('#employee_table').html(data);
                   }  
    });
}); 
    $(document).on('click', '#completed_proj', function(){
  $("#yyy").prepend('<div id="loadingDiv"> </div>');   
		  var employee_id = $(this).attr("id");
              $.ajax({  
                   url:"completed_proj.php",  
                   method:"POST",  
                   data:{employee_id:employee_id},  
                  
                   success:function(data){  
                     $("#loadingDiv").fadeOut();
				    $('#employee_table').html(data);
                   }  
    });
});	
	
	
	$(document).on('click', '#total_proj', function(){
    
     var employee_id = $(this).attr("id");
     $.ajax({
      url:"total_proj.php",
      method:"POST",
      data:{},
      success:function(data){
		  
       $('#employee_table').html(data);
      
      }
     });
    });
	
$(document).on('click', '#ns_proj', function(){
    
     var employee_id = $(this).attr("id");
     $.ajax({
      url:"not_started_proj.php",
      method:"POST",
      data:{},
      success:function(data){
		  
       $('#employee_table').html(data);
      
      }
     });
    });
	
	
	
	
	
    var table = $('#example1').DataTable( {
        responsive: true
    } );
 
    new $.fn.dataTable.FixedHeader( table );

   });