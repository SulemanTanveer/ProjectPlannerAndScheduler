
    $(document).on('change', '#select_image', function(){  
   
   var ext = $('#select_image').val().split('.').pop().toLowerCase();
if($.inArray(ext, ['png','jpg','jpeg']) == -1) {
    alert('Invalid File Selection!\n Select only (png, jpg, jpeg) File');
	$('#select_image').val('');
}
	});


	
   $(document).ready(function(){
	   
	    $(document).bind('keypress', function(e) {
            if(e.keyCode==13){
                 $('#insert23').trigger('click');
             }
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
	var alertMsg='';
	email=$('#email').val();
	nam=$('#empName').val();
	contactNo=$('#contactNo').val();
	cnic=$('#cnic').val();
	var flag=true;
 if($("#dob").val() > $("#curDate").val()){
		
	 alertMsg+='Please enter valid date of birth'+ '\n';
	 flag=false;
	 $('#dob').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
	 
	}
	if ($('input[name="Languages[]"]:checked').length == 0){
	    flag=false;
		alertMsg+='Please Select Languages'+ '\n';
		 
	}
	if (validateName(nam)==false) {
  
           flag=false;
       alertMsg+='Please Enter Valid Name'+ '\n';
	   
        }
	if (validateEmail(email)==false||validateEmail2(email)==false) {
  
           flag=false;
      alertMsg+='Please Enter Valid Email Address'+ '\n';
	   
        }
		
if (!validateContact(contactNo)) {
  
         flag=false;
     alertMsg+='Please Enter Valid Contact No'+ '\n';
	  $('#contactNo').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
	
        }
				
if (!validateCNIC(cnic)) {
  
           flag=false;
alertMsg+='Please Enter Valid CNIC'+ '\n';
 $('#cnic').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
	
        }
		if(flag)
         
     {   event.preventDefault();  
	  $('#insert23').val('Updating..');  
      $.ajax({  
       url:"updateProfile.php",  
       method:"POST",  
	   data:new FormData(this),  
       contentType:false, 
	   processData:false,
      
  	   
       success:function(data){  
        
		 
    event.stopPropagation();
        $('#insert23').val('Update'); 
		 
		if($.trim(data)=='true'){
			
			alert('Profile updated successfully..!');
			 
           location.reload(); // then reload the page.(3)
     
			 
		}
		else if($.trim(data)=='false1'){
			
			alert('This CNIC and Email already exist in account\nEnter Valid Email and CNIC..!');
			 
         
     
			 
		}
		else if($.trim(data)=='false2'){
			
			alert('This Email already exist in account\nEnter Valid Email..!');
			 
         
     
			 
		}
		else if($.trim(data)=='false3'){
			
			alert('This CNIC already exist in account\nEnter Valid CNIC..!');
			 
         
     
			 
		}		
       }  
      });
	  }
	  
	  else{
	 alert(alertMsg);
	 event.preventDefault(); 
	 
 }
	  
    });
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
$(document).on('change', '#email', function(){
 
	if(validateEmail($('#email').val()))
	{
		$('#email').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
		
	}	
	else{
		 
	//	alert('Enter Valid Contact No');
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
      function validateEmail2(email) {
   
      $.ajax({  
       url:"emailValidation.php",  
       method:"POST",  
	    
	   data:{email:email},  
          success:function(data){
		  	 
       if($.trim(data) =='no')  {
		   
		   alert("This email is not exist");
		 	 
	   return false;	  
	   }	else{
		   
       return true;
	      
       }
       }  
      });
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
						
//////////////////////////////////////////////////////////////
    ////////////////current info///////////////////
	//////////////////////////////////////////////////////////////

        $('#button1').click(function(){  
             
              $.ajax({  
                   url:"profile fetch.php",  
                   method:"POST",  
                   data: "",
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
   					    $('#employee_id').val(data[0].id);  
						if (data[1].length!= 0){
						for (i = 0; i < data[1].length; ++i) {
				             
							var val;
						val='#a'+data[1][i].languageId;
				 alert(data[1][i].languageId);
						  $(val).attr('checked', true);
								 
							 	
								
						}
								
						}
                       
                       
                   }  
              });  
         }); 
   	
	////////////////////////////////////////////////
	//////////////////Change Password function///////
	////////////////////////////////////////////////
	
   	$('#pswd_form').on("submit", function(event){  
    event.preventDefault();  
        
		if( $('#new').val().length < 8) {
        alert("Error: Password must contain at least 8 characters!");
        $('#err').addClass('has-error');
		return false;
      }  
   else  { 
  $('#insert11').val('Updating..'); 
  $('#err').removeClass('has-error');  
      $.ajax({  
       url:"changePassword.php",  
       method:"POST",  
	   data:new FormData(this),  
       contentType:false, 
	   processData:false,
	   success:function(data){  
	   $('#insert11').val('Update');
		
		if($.trim(data)=='true'){
			
			alert('Password updated successfully..!');
			 $('#pswd_form')[0].reset();
			$('#pswd_data_Modal').modal('hide'); 
			  $('#err1').addClass('has-error');
		}
		else{
			 event.preventDefault(); 
			alert('Old password not matched');
			  $('#err1').addClass('has-error');
		}
			
        
		  
       }  
      }); 
 
     }

	 
    });
   
   	    
    
    
    
   });  

