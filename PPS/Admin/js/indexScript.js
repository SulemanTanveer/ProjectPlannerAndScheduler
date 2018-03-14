
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
   
   
    $(document).on('change', '#select_image', function(){  
   
   var ext = $('#select_image').val().split('.').pop().toLowerCase();
if($.inArray(ext, ['png','jpg','jpeg']) == -1) {
    alert('Invalid File Selection!\n Select only (png, jpg, jpeg) File');
	$('#select_image').val('');
}
	});
	////////////////////////////////////////////////////
   ////////////////Edit data validation///////////////////
   /////////////////////////////////////////////////////
   
         $(document).on('click', '.edit_data', function(){  
		 
		 $(".panel-body").prepend('<div id="loadingDiv"> </div>'); 
		 
             $('#jobStatus').prop('disabled',  false);
			  $('#rs').trigger('click');
			$('#aname1').prop('disabled', 'disabled');
			$('#aname2').prop('disabled', 'disabled');
			$('#aname3').prop('disabled', 'disabled');
			$('#aname4').prop('disabled', 'disabled');
			$('#aname5').prop('disabled', 'disabled');
			$('#aname6').prop('disabled', 'disabled');
			
			 // $('input:checkbox').removeAttr('checked');
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
				         var val;
						 val='#a'+data[1][i].languageId;
				          $(val).prop('checked', true);
								 
								
						}
								
						}
						
						if (data[2].length!= 0){
						for (i = 0; i < data[2].length; ++i) {
				             
							var val='#aname'+data[2][i].roleId;
					        $('#name'+data[2][i].roleId).prop('checked', true);
							$(val).val(data[2][i].experience);	
							$(val).prop('disabled', false);	
								  	
								
						}
								
						}
						$("#loadingDiv").hide();
						$('#employee_id').val(employee_id);  
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
		alert("Only Alphabets and Spaces are allowed ");
		     event.preventDefault();  
		   return false;
		
  }
     
  
});




$("#contactNo").keyup(function () {
                    if ($(this).val().length == 2) {
                        $(this).val($(this).val() + "-");
                    }
                   
                }); 
				
$('#salary').keydown(function() {
	if($(this).val().length == 7 ){
			
			return false;
		}
	
  if((event.keyCode >=48 && event.keyCode <= 57)  || (event.keyCode == 8) ) {
		
		 
		
  }
      else{
		  alert("Only Numeric Values are Allowed");
		     event.preventDefault();  
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
	var salary;
    $('#insert_form').on("submit", function(event){  
	
     event.preventDefault();  
    var flag=true;
	var alertMsg='';
	
	email=$('#email').val();
	nam=$('#empName').val();
	contactNo=$('#contactNo').val();
	cnic=$('#cnic').val();
	salary=$('#salary').val();
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
		
if (!validateContact(contactNo)) {
  
         flag=false;
     alertMsg+='Please Enter Valid Contact No'+ '\n';
	  $('#contactNo').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
	
        }
				
if (cnic.length !=15 || !validateCNIC(cnic)) {
  
           flag=false;
alertMsg+='Please Enter Valid CNIC'+ '\n';
 $('#cnic').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
	
        }
		
		
	if (validateSalary(salary)==false) {
  
           flag=false;
alertMsg+='Please Enter Valid Salary'+ '\n';
 $('#salary').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
	
        }
		 
if (
getYears($("#dob").val())<$("#aname1").val() ||
getYears($("#dob").val())<$("#aname2").val() ||
getYears($("#dob").val())<$("#aname3").val() ||
getYears($("#dob").val())<$("#aname4").val() ||
getYears($("#dob").val())<$("#aname5").val() ||
getYears($("#dob").val())<$("#aname6").val()  

		 ) 
		 {
  
    flag=false;
alertMsg+='Please Enter Valid Date of birth and experience';
 $('#dob').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
	
        }
		var flagy=false;
	if(flag){
	  
   
if($('#employee_id').val()!=''){
	 
	 insert();
	
}
else{
   $.ajax({  
       url:"emailValidation.php",  
       method:"POST",  
	    
	   data:new FormData(this),  
       contentType:false, 
	   processData:false,
      
       beforeSend:function(){  
        $('#insert').val("Inserting..");  
       }, 
  	   
       success:function(data){
		  	 
       if($.trim(data) =='no')  {
		   
		   alert("This email is not exist");
		 	 
	    $('#insert').val("Insert");	  
	   }	else{
		   
         	   insert();
	      
       }
       }  
      }); 
}
	  
	  
	  
	  
	  
	  
	  
	}
 else{
	 alert(alertMsg);
	 count++;
 }
	 
    });
	
  


function insert(){
	
 var form = $('#insert_form')[0]; // You need to use standard javascript object here
var formData = new FormData(form);
	   $.ajax({  
       url:"insert.php",  
       method:"POST",  
	    
	   data:formData,  
       contentType:false, 
	   processData:false,
     beforeSend:function(){  
        $('#insert').val("Inserting..");  
       },
  	   
       success:function(data){
		  refresh();
 		  
       if($.trim(data) =='no')  {
		   alert("This email is already exist in our record. \nPlease enter another email address.");
		  $("#loadingDiv").hide();
		  $('#insert').val("Insert");  
	      $('#employee_id').val('');
          event.preventDefault();		  
	   }	
	   else  if($.trim(data) =='no3')  {
		   alert("Employee is currently doing some tasks so work status can not be updated  .");
		  $("#loadingDiv").hide();
		  $('#insert').val("Update");  
	     
          event.preventDefault();		  
	   }
	   else if($.trim(data) =='no5'){
		   
		    alert("This CNIC is already exist in our record. \nPlease enter valid CNIC. .");
		  $("#loadingDiv").hide();
		  $('#insert').val("Update");  
	     
          event.preventDefault(); 
		   
	   }
	    else if($.trim(data) =='no4'){
		   
		    alert("Administrator is already exist..\nSelect Valid Position");
		  $("#loadingDiv").hide();
		  $('#insert').val("Update");  
	     
          event.preventDefault(); 
		   
	   }
	   else{	
         	   
	   	$("#loadingDiv").hide();
	    $('#insert').val("Insert");  
	    $('#employee_id').val('');  
        $('#insert_form')[0].reset();  
        $('#add_data_Modal').modal('hide');  
        $('#employee_table').html(data);
	
       }
       }  
      }); 
	
}

$(document).on('change', '#empName', function(){
	 
	if(validateName($('#empName').val()))
	{
		$('#empName').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
		
	}	
	else{
		 
	//	alert('Enter Valid Name');
	}
});

$(document).on('change', '#cnic', function(){
	 
	 
	 
	if(validateCNIC($('#cnic').val()))
	{
		
		 $('#cnic').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
	}	
	else{
		 
		//alert('Enter Valid CNIC');
	}
});

$(document).on('change', '#contactNo', function(){
	 
	if(validateContact($('#contactNo').val()))
	{
		$('#contactNo').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
		
	}	
	else{
		 
	//	alert('Enter Valid Contact No');
	}
});

$(document).on('change', '#salary', function(){
	 
	if(validateSalary($('#salary').val()))
	{
		$('#salary').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
		
	}	
	else{
		 
	//	alert('Enter Valid Salary');
	}
});


$(document).on('change', '#email', function(){
 
	if(validateEmail($('#email').val()))
	{
		$('#email').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
		
	}	
	else{
		 
	//	alert('Enter Valid Salary');
	}
});











$(document).on('change', '#jobStatus', function(){
	 var form = $('#insert_form')[0]; // You need to use standard javascript object here
var formData = new FormData(form);
	 $.ajax({
	 
      url:"empValidation.php",
      method:"POST",
	   data:formData,
	   contentType:false, 
	   processData:false,
      success:function(data){
		  alert(data);
		 if($.trim(data) =='no'){
			 
			 alert('Employee is currently doing some task');
			 $("#jobStatus").html("<option value='Employee' selected>Employee</option><option value='Ex-Employee'>Ex-Employee</option>");
	 
			$("#workStatus").html("<option value='Active'>Active</option><option value='In-Active'>In-Active</option><option value='On Leave'>On Leave</option>");
	 
		 }
		 else if($('#jobStatus').val()=='Ex-Employee')
	{
	 $("#workStatus").html("<option value='In-Active'>In-Active</option>");
		
	}
 
      }
     });
 
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
   var ck_name = /^[A-Za-z ]{2,20}$/;
   

    if (ck_name.test(nam)) {
        return true;
		 
    }
    else {
		 
	     
  
        return false;
    }
}

function validateCNIC(nam)
{
   var ck_name = /^[0-9]{5}-[0-9]{7}-[0-9]{1}$/;
   

    if (ck_name.test(nam)) {
        return true;
	    
    }
    else {
		 
	   $('#cnic').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
	   
  
        return false;
    }
}
  
function validateContact(nam)
{
   var ck_name = /^[0-9]{2}-[0-9]{7}$/;
   

    if (ck_name.test(nam)) {
        return true;
	    
    }
    else {
		 
	   $('#contactNo').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
	   
  
        return false;
    }
}
  
  
 function validateSalary(nam)
{
   var ck_name = /^[0-9]{0,7}$/;
   

    if (ck_name.test(nam)) {
        return true;
	    
    }
    else {
		 
	   $('#salary').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
	   
  
        return false;
    }
} 
  
  
  
  
  
  
  
  
  //////////////////////////////////////////////////////////////
    ////////////////Remove Red Glow of fileds///////////////////
	//////////////////////////////////////////////////////////////
		$('#age').click(function(){
             $('#employee_id').val('');			
			$('#jobStatus').prop('disabled', 'disabled');
			$('#aname1').prop('disabled', 'disabled');
			$('#aname2').prop('disabled', 'disabled');
			$('#aname3').prop('disabled', 'disabled');
			$('#aname4').prop('disabled', 'disabled');
			$('#aname5').prop('disabled', 'disabled');
			$('#aname6').prop('disabled', 'disabled');
			$('input:checkbox').removeAttr('checked');
		    $('#insert').val("Insert");  
            $('#insert_form')[0].reset();  
			if(count>1){										
             
        $('#salary').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
        
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
     $(".panel-body").prepend('<div id="loadingDiv"> </div>'); 
	  
    $.ajax({
      url:"delete.php",
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
     ////////////////////////////////////////////////////
	//////////////////////////view data script///////////
	 ////////////////////////////////////////////////////
     $(document).on('click', '.view_data', function(){
		 $(".panel-body").prepend('<div id="loadingDiv"> </div>');  
     var employee_id = $(this).attr("id");
     $.ajax({
      url:"select.php",
      method:"POST",
      data:{employee_id:employee_id},
      success:function(data){
		  $("#loadingDiv").hide();
       $('#employee_detail').html(data);
       $('#dataModal').modal('show');
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
    
     $(document).on('click', '#current_emp', function(){
     //$('#dataModal').modal();
     var employee_id = $(this).attr("id");
     $.ajax({
      url:"current_emp.php",
      method:"POST",
      data:{employee_id:employee_id},
      success:function(data){
		
       $('#employee_table').html(data);
      
      }
     });
    });
     $(document).on('click', '#ex_emp', function(){
     var employee_id = $(this).attr("id");
     $.ajax({
      url:"ex_emp.php",
      method:"POST",
      data:{employee_id:employee_id},
      success:function(data){
		
       $('#employee_table').html(data);
      
      }
     });
    });
    
   });  
   
   
   
   function refresh(){
	  $.ajax({
	 
      url:"refreshEmp.php",
      method:"POST",
	  
      data:{},
      success:function(data){
		  var responsedata = $.parseJSON(data);
 //  alert('Total:'+responsedata[0]+'cur:'+responsedata[1]+'ex:'+responsedata[2]);
	       
       $('#total').html(responsedata[0]); ;
	    $('#cur').html(responsedata[1]); ;
        $('#ex').html(responsedata[2]); ;
      }
     });
	  
}
   
   
   
////////////////////////////////////////////////////
////////////////table data validation////////////////
 ////////////////////////////////////////////////////
function getYears(birthday) {
    var now = new Date();
    var past = new Date(birthday);
    var nowYear = now.getFullYear();
    var pastYear = past.getFullYear();
    var age = nowYear - pastYear;

    return age;
}

