
   $(document).ready(function(){
	   
	    $(document).bind('keypress', function(e) {
            if(e.keyCode==13){
                 $('#insert').trigger('click');
             }
        });		 
		 
	   
	   
    var table = $('#example').DataTable( {
        responsive: true
    } );
 new $.fn.dataTable.FixedHeader( table );
   
   

	////////////////////////////////////////////////////
   ////////////////Edit data validation///////////////////
   /////////////////////////////////////////////////////
   
         $(document).on('click', '.edit_data', function(){  
             $('#jobStatus').prop('disabled',  false);
			  var employee_id = $(this).attr("id");  
              $.ajax({  
                   url:"fetch.php",  
                   method:"POST",  
                   data:{employee_id:employee_id},  
                   dataType:"json",  
                   success:function(data){  
                        $('#empName').val(data[0].empName);  
                        $('#address').val(data[0].address);  
                        $('#gender').val(data[0].gender);  
                        $('#position').val(data[0].position);  
                        $('#dob').val(data[0].dob);  
                        $('#cnic').val(data[0].cnic);  
                        $('#email').val(data[0].email);  
                        $('#contactNo').val(data[0].contactNo);  
   					    $('#salary').val(data[0].salary);  
                        $('#jobStatus').val(data[0].jobStatus);  
                        $('#workStatus').val(data[0].workStatus);
						$('#employee_id').val(data[0].empId);  
						
						
						if (data[1].length!= 0){
						for (i = 0; i < data[1].length; ++i) {
				             
								
						
								 if(data[1][i].languageName=='C++')
								{
									$('#C++').prop('checked', true);
								}
								 if(data[1][i].languageName=='PHP')
								{
									$('#PHP').prop('checked', true);
								}
								 if(data[1][i].languageName=='.NET')
								{
								$('#dotNET').prop('checked', true);
							     }								
								 if(data[1][i].languageName=='Python')
								{
									$('#Python').prop('checked', true);
								}
								 if(data[1][i].languageName=='C#')
								{
									$('#Ch').prop('checked', true);
								}
								 if(data[1][i].languageName=='JavaScript')
								{
								$('#JavaScript').prop('checked', true);
							     }		
								  if(data[1][i].languageName=='SQL')
								{
									$('#SQL').prop('checked', true);
								}
								 if(data[1][i].languageName=='C')
								{
									$('#C').prop('checked', true);
								}
								 if(data[1][i].languageName=='Java')
								{
								$('#Java').prop('checked', true);
							     }		
								
						}
								
						}
						
						
						if (data[2].length!= 0){
						for (i = 0; i < data[2].length; ++i) {
				             
								
						
								 if(data[2][i].rollName=='System Analyst')
								{
									$('#System').prop('checked', true);
									$('#name1').val(data[2][i].experience);
									 $('#name1').prop('disabled', false);
								}
								 if(data[2][i].rollName=='Database Designer')
								{
									$('#Database').prop('checked', true);
									$('#name2').val(data[2][i].experience);
									 $('#name2').prop('disabled', false);
								}
								 if(data[2][i].rollName=='Programmer')
								{
								$('#Programmer').prop('checked', true);
								$('#name3').val(data[2][i].experience);
								 $('#name3').prop('disabled',false);
							     }								
								 if(data[2][i].rollName=='Tester')
								{
									$('#Tester').prop('checked', true);
									$('#name4').val(data[2][i].experience);
									 $('#name4').prop('disabled', false);
								}
								 if(data[2][i].rollName=='Web Developer')
								{
									$('#Web').prop('checked', true);
									$('#name5').val(data[2][i].experience);
									 $('#name5').prop('disabled', false);
								}
								 if(data[2][i].rollName=='App Developer')
								{
								$('#App').prop('checked', true);
								$('#name6').val(data[2][i].experience);
								 $('#name6').prop('disabled',false);
							     }		
								  	
								
						}
								
						}
						
								
                        $('#insert').val("Update");  
                        $('#add_data_Modal').modal('show');  
                   }  
              });  
         }); 
		 
		 
	////////////////////////////////////////////////////
   ////////////////fileds validation///////////////////
   /////////////////////////////////////////////////////	 
		 
		 
  $('#empName').keydown(function() {
 
 
     if(event.keyCode >= 48 && event.keyCode <= 57 ) {
		alert("Enter Alphabets Only");
		     event.preventDefault();  
		   return false;
		
  }
     
  
});




$("#contactNo").keyup(function () {
                    if ($(this).val().length == 2) {
                        $(this).val($(this).val() + "-");
                    }
                   
                }); 
				
$('#contactNo').keydown(function() {
 
 if ($(this).val().length == 10 &&event.keyCode != 8) {
  return false;
   
  }
     
	
	 if((event.keyCode >=48 && event.keyCode <= 57)  || (event.keyCode == 8) ) {
		
  }
      else{
		  alert("Only Numeric Values are Allowed");
		     event.preventDefault();  
	  }
  
});				
 $("#cnic").keyup(function () {
                    if ($(this).val().length == 5) {
                        $(this).val($(this).val() + "-");
                    }
                    else if ($(this).val().length == 13) {
                        $(this).val($(this).val() + "-");
                    }
                   
                }); 	

$('#cnic').keydown(function() {
 
 if ($(this).val().length == 15 &&event.keyCode != 8) {
  return false;
   
  }
     
	
	 if((event.keyCode >=48 && event.keyCode <= 57)  || (event.keyCode == 8) ) {
		
  }
      else{
		  alert("Only Numeric Values are Allowed");
		     event.preventDefault();  
	  }
  
});		

    var count=0; 
   	var email;
   	var nam;
	var contactNo;
   	var cnic;
	
    $('#insert_form').on("submit", function(event){  
	
     event.preventDefault();  
    var flag=true;
	var alertMsg='';
	
	email=$('#email').val();
	nam=$('#empName').val();
	contactNo=$('#contactNo').val();
	cnic=$('#cnic').val();
	if($("#dob").val() > $("#curDate").val()){
		
	 alertMsg+='Please enter valid date of birth'+ '\n';
	 flag=false;
	 $('#dob').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
	 
	}
	if ($('input[name="skills[]"]:checked').length == 0){
	    flag=false;
		alertMsg+='Please Select Roles'+ '\n';
		
	}
	if ($('input[name="Languages[]"]:checked').length == 0){
	    flag=false;
		alertMsg+='Please Select Languages'+ '\n';
		 
	}
	if (validateName(nam)==false) {
  
           flag=false;
       alertMsg+='Please Enter Valid Name'+ '\n';
	   
        }
	if (validateEmail(email)==false) {
  
           flag=false;
      alertMsg+='Please Enter Valid Email Address'+ '\n';
	   
        }
		
if (contactNo.length !=10) {
  
         flag=false;
     alertMsg+='Please Enter Valid Contact No'+ '\n';
	  $('#contactNo').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
	
        }
				
if (cnic.length !=15) {
  
           flag=false;
alertMsg+='Please Enter Valid CNIC'+ '\n';
 $('#cnic').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
	
        }
		
	if(flag){
     $.ajax({  
       url:"insert.php",  
       method:"POST",  
	   data:new FormData(this),  
       contentType:false, 
	   processData:false,
      
       beforeSend:function(){  
        $('#insert').val("Inserting..");  
       }, 
  	   
       success:function(data){  
	   
        $('#insert_form')[0].reset();  
        $('#add_data_Modal').modal('hide');  
        $('#employee_table').html(data);
       
       }  
      }); 

	}
 else{
	 alert(alertMsg);
	 count++;
 }
	 
    });
	
   //////////////////////////////////////////////////////////////
   ////////////////Email Validation function///////////////////
   //////////////////////////////////////////////////////////////
   
   function validateEmail(email) {

    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
"^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$"
    if (filter.test(email)) {
        return true;
       
    }
    else {
		
      
	   $('#email').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
	   
  
        return false;

   }
   }
   //////////////////////////////////////////////////////////////
   ////////////////Name Validation function///////////////////
   //////////////////////////////////////////////////////////////
function validateName(nam)
{
   var ck_name = /^[A-Za-z0-9 ]{2,20}$/;
   

    if (ck_name.test(nam)) {
        return true;
    }
    else {
		 
	   $('#empName').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
	   
  
        return false;
    }
}
    //////////////////////////////////////////////////////////////
    ////////////////Remove Red Glow of fileds///////////////////
	//////////////////////////////////////////////////////////////
		$('#age').click(function(){ 
			$('#jobStatus').prop('disabled', 'disabled');
		    $('#insert').val("Insert");  
           $('#insert_form')[0].reset();  
			if(count>1){										
             
                
			    $('#email').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	   $('#cnic').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	   $('#contactNo').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	   $('#dob').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
}
  
   	  });  
						



//////////////////////////////////////////////////////////////
//////////////////////////////delete emplyeee/////////////////
//////////////////////////////////////////////////////////////

   $(document).on('click', '.delete_data', function(){
   
     var employee_id = $(this).attr("id");
   if(confirm("Are you sure you want to delete this?")){ 
    $.ajax({
      url:"delete.php",
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
     ////////////////////////////////////////////////////
	//////////////////////////view data script///////////
	 ////////////////////////////////////////////////////
    $(document).on('click', '.view_data', function(){
		 
 $('#employee_detail').html('');   
   $('#employee_detail2').html('');
    $("#dataModal").modal('show');
     var employee_id = $(this).attr("id");
	 //alert(employee_id);
   $.ajax({
      url:"select.php",
      method:"POST",
	  async: false,
      data:{employee_id:employee_id},
      success:function(data){
		 
          var responsedata = $.parseJSON(data);
	    $('#employee_detail').html(responsedata[2]);
		 $('#employee_detail3').html(responsedata[3]);
	   $('#employee_detail4').html(responsedata[1]);
       $('#employee_detail0').html(responsedata[0]);  
	 
      }
     });
	 
	$.ajax({
      url:"empChart.php",
      method:"POST",
	  
      data:{employee_id:employee_id},
      success:function(data2){
		   
        $('#employee_detail2').html(data2);  
	
         
		 
      }
     });
    });
    
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
});});
////////////////////////////////////////////////////
////////////////table data validation////////////////
 ////////////////////////////////////////////////////
