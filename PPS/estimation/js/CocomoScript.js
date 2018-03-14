$('#button').click(function(e) {
		 e.preventDefault();
		  var flag=true;
		 var altMsg="";
		 //validation of LANGUAGE ////
		  if( $( "#language" ).find( "option:selected" ).text()=="")
		 {
			 flag=false;
			 altMsg+="There must be language for estimation! \n";
			 $('#language').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		 
		 //validation of PERSON MONTH RATE ////
		 if( $('#rate').val()==""||!validateNumber($('#rate').val()))
		 {	
			 flag=false;
			 altMsg+="Enter valid Rate! \n";
			 $('#rate').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
			 
		 }
		 //validation of ExternalInputs ////
		 if( $('#ExternalInputs').val()==""||!validateNumber($('#ExternalInputs').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid External Inputs! \n";
			 $('#ExternalInputs').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		  //validation of ExternalOutputs ////
		 if( $('#ExternalOutputs').val()==""||!validateNumber($('#ExternalOutputs').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid  External Outputs! \n";
			 $('#ExternalOutputs').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		 
		  //validation of ExternalInquiries ////
		 if( $('#ExternalInquiries').val()==""||!validateNumber($('#ExternalInquiries').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid  External Inquiries! \n";
			 $('#ExternalInquiries').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		 
		  //validation of InternalLogicalFiles ////
		 if( $('#InternalLogicalFiles').val()==""||!validateNumber($('#InternalLogicalFiles').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid  Internal Logical Files! \n";
			 $('#InternalLogicalFiles').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		  //validation of ExternalInterfaceFiles ////
		 if( $('#ExternalInterfaceFiles').val()==""||!validateNumber($('#ExternalInterfaceFiles').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid  External Interface Files! \n";
			 $('#ExternalInterfaceFiles').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		 ///////////////////////////VALIDATIONFOR FOR 14 FACTORS ///////////////////////////////
		  //validation of F1 ////
		 if( $('#f1').val()==""||!validateFactors($('#f1').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of F1! \n";
			 $('#f1').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		  //validation of F2 ////
		 if( $('#f2').val()==""||!validateFactors($('#f2').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of F2! \n";
			 $('#f2').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		  //validation of F3 ////
		 if( $('#f3').val()==""||!validateFactors($('#f3').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of F3! \n";
			 $('#f3').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		 
		  //validation of F4 ////
		 if( $('#f4').val()==""||!validateFactors($('#f4').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of F4! \n";
			 $('#f4').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		 
		  //validation of F5 ////
		 if( $('#f5').val()==""||!validateFactors($('#f5').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of F5! \n";
			 $('#f5').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		  //validation of F6 ////
		 if( $('#f6').val()==""||!validateFactors($('#f6').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of F6! \n";
			 $('#f6').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		 
		  //validation of F7 ////
		 if( $('#f7').val()==""||!validateFactors($('#f7').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of F7! \n";
			 $('#f7').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		 
		  //validation of F8 ////
		 if( $('#f8').val()==""||!validateFactors($('#f8').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of F8! \n";
			 $('#f8').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		 
		  //validation of F9 ////
		 if( $('#f9').val()==""||!validateFactors($('#f9').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of F9! \n";
			 $('#f9').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		 
		  //validation of F10 ////
		 if( $('#f10').val()==""||!validateFactors($('#f10').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of F10! \n";
			 $('#f10').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		 
		  //validation of F11 ////
		 if( $('#f11').val()==""||!validateFactors($('#f11').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of F11! \n";
			 $('#f11').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		  //validation of F12 ////
		 if( $('#f12').val()==""||!validateFactors($('#f12').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of F12! \n";
			 $('#f12').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		 
		  //validation of F13 ////
		 if( $('#f13').val()==""||!validateFactors($('#f13').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of F13! \n";
			 $('#f13').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		 
		  //validation of F14 ////
		 if( $('#f14').val()==""||!validateFactors($('#f14').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of F14! \n";
			 $('#f14').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		 
		 if(flag){
		  $('#img2').show();
		  calculate();
		  var fp = $("#FunctionPoint").val();
		  var language=$("#language").val();
		  var type=$("#methods").val();
		  var rate=$("#rate").val();
              $.ajax({  
                   url:"cocomo2.php",  
                   method:"POST",  
                   data:{FP:fp,
				   Rate:rate,
				   Language:language,
				   Type:type
				   
				   
				   
				   },  
                  
                   success:function(data){  
                    $('#img2').hide();
				    $('#page1').html(data);
					calculated();
                   }  
				   
               });
		     }
		 else{
			  alert(altMsg);
		     }
		
});
///////////////////////////////////////////////////////////////////////////////////////////////////
$(function(){
    var table = $('#example3').DataTable( {
        responsive: true
    } );
 
    
  });
  
  function setId()
{var id = document.getElementsByName('project');
var rate_value;
for(var i = 0; i < id.length; i++){
    if(id[i].checked){
         
		
		 document.getElementById("proj_id").value=id[i].value;
		// alert(id[i].value);
    }
}
	
	
	document.getElementById("e").value=document.getElementById("eff1").innerHTML;
	document.getElementById("s").value=document.getElementById("size1").innerHTML;
	document.getElementById("c").value=document.getElementById("cost1").innerHTML;
	document.getElementById("d").value=document.getElementById("time1").innerHTML;
	document.getElementById("pd").value=document.getElementById("pdesign1").innerHTML;
	document.getElementById("dd").value=document.getElementById("ddesign1").innerHTML;
	document.getElementById("ct").value=document.getElementById("cut1").innerHTML;
	document.getElementById("i").value=document.getElementById("it1").innerHTML;
	document.getElementById("m").value=document.getElementById("model1").innerHTML;	
}


				 $('#insert_form').on("submit", function(event){  
     event.preventDefault();  
      
	  var eff = $("#e").val(); 
	  var size = $("#s").val(); 
	  var cost = $("#c").val(); 
	  var time = $("#d").val();
		var pdesign =$("#pd").val(); 
		var ddesign =$("#dd").val(); 
		var cut =$("#ct").val(); 
		var it =$("#i").val(); 
		var mod =$("#m").val(); 	

	  var pid = $("#proj_id").val();   
     
	  if(pid==""){
		 alert ("please select any project before add metric!")
	 }
	 else{
	 
      $.ajax({  
       url:"cocomo_insert.php",  
       method:"POST",  
	
       beforeSend:function(){  
        $('#Insert').val("Inserting..");  
       }, 
	   
	   data:{projId:pid,
				   eff2:eff,
				   size2:size,
				   cost2:cost,
				   time2:time,
				   productd:pdesign,
				   detaild:ddesign,
				   codetest:cut,
				   integration:it,
				   model:mod
				  
				   },
	   
  	   
       success:function(data){  
       
		
        $('#add_data_Modal').modal('hide');  
		$('#Insert').val("Add Metric"); 
        $('#result').html(data);
       		
       }  
      }); 
	 }
     
    });
	
	$('#addMetric').click(function(){  
              $('#insert').val("Insert");  
              $('#insert_form')[0].reset();  
         
   	   
   	  
   	  });
		
	  $(document).on('click', '#addMetric', function(){
      
     
	 var  _effort= $('#effort').val();
	 var _size = $('#size').val();
	 var _cost = $('#cost').val();
	 var _duration = $('#duration').val();
   
    var  _pdesign= $('#pDesign').val();
	 var _ddesign = $('#dDesign').val();
	 var _cut = $('#cut').val();
	 var _it = $('#it').val();
    var _model = $('#method').val();
	
	if(_model=='em')
{
	_model='embeded model';
}
else if(_model=='sdm')
{
	_model='semi detached model';
}
	
	
   
      $('#eff1').html(_effort);
	  $('#time1').html(_duration);
	  $('#size1').html(_size);
	  $('#cost1').html(_cost);
	  $('#pdesign1').html(_pdesign);
	  $('#ddesign1').html(_ddesign);
	  $('#cut1').html(_cut);
	  $('#it1').html(_it);
	  $('#model1').html(_model); 
	  $('#proj_id').val("");
       $('#add_data_Modal').modal('show');
    //////////////////////////////////
	 var _languageId = $('#languageId').val();
   $.ajax({  
       url:"cocomoProjectList.php",  
       method:"POST",  
	   data:{LanguageID:_languageId,
		
			
				   },
	  
       success:function(data){  
       
		
          
		
        $('#projectshow').html(data);
       		
       }  
      }); 
   
   
   
    });
	
	
	
	
//////////Validation on input fields on change events starts here//////////////////

$("#rate").unbind().change(function(){
	
	if(validateNumber($('#rate').val()))
	{
		
		 $('#rate').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
	}	
	else{
		 
		$('#rate').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter Valid Rate!');
	}
});

	
$("#ExternalInputs").unbind().change(function(){
	
	if(validateNumber($('#ExternalInputs').val()))
	{
		
		 $('#ExternalInputs').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
	}	
	else{
	
		
		$('#ExternalInputs').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		
		
		alert('Enter Valid External Inputs!');
		
	}
});
	

	$("#ExternalOutputs").unbind().change(function(){
	
	if(validateNumber($('#ExternalOutputs').val()))
	{
		
		 $('#ExternalOutputs').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
	}	
	else{
		 $('#ExternalOutputs').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter Valid External Outputs!');
	}
});


	$("#ExternalInquiries").unbind().change(function(){
	
	if(validateNumber($('#ExternalInquiries').val()))
	{
		
		 $('#ExternalInquiries').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
	}	
	else{
		 $('#ExternalInquiries').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter Valid External Inquiries !');
	}
});
	
$("#InternalLogicalFiles").unbind().change(function(){
	
	if(validateNumber($('#InternalLogicalFiles').val()))
	{
		
		 $('#InternalLogicalFiles').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
	}	
	else{
		 $('#InternalLogicalFiles').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter Valid Internal Logical Files!');
	}
});
	
$("#ExternalInterfaceFiles").unbind().change(function(){
	
	if(validateNumber($('#ExternalInterfaceFiles').val()))
	{
		
		 $('#ExternalInterfaceFiles').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
	}	
	else{
		 $('#ExternalInterfaceFiles').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter Valid External Interface Files!');
	}
});

$("#f1").unbind().change(function(){
	
	if(validateFactors($('#f1').val()))
	{
		
		 $('#f1').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
	}	
	else{
		 $('#f1').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter value of F1 from 0 to 5!');
	}
});

$("#f2").unbind().change(function(){
	
	if(validateFactors($('#f2').val()))
	{
		
		 $('#f2').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
	}	
	else{
		 $('#f2').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter value of F2 from 0 to 5!');
	}
});

$("#f3").unbind().change(function(){
	
	if(validateFactors($('#f3').val()))
	{
		
		 $('#f3').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
	}	
	else{
		 $('#f3').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter value of F3 from 0 to 5!');
	}
});

$("#f4").unbind().change(function(){
	
	if(validateFactors($('#f4').val()))
	{
		
		 $('#f4').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
	}	
	else{
		 $('#f4').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter value of F4 from 0 to 5!');
	}
});

$("#f5").unbind().change(function(){
	
	if(validateFactors($('#f5').val()))
	{
		
		 $('#f5').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
	}	
	else{
		 $('#f5').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter value of F5 from 0 to 5!');
	}
});

$("#f6").unbind().change(function(){
	
	if(validateFactors($('#f6').val()))
	{
		
		 $('#f6').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
	}	
	else{
		 $('#f6').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter value of F6 from 0 to 5!');
	}
});

$("#f7").unbind().change(function(){
	
	if(validateFactors($('#f7').val()))
	{
		
		 $('#f7').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
	}	
	else{
		 $('#f7').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter value of F7 from 0 to 5!');
	}
});

$("#f8").unbind().change(function(){
	
	if(validateFactors($('#f8').val()))
	{
		
		 $('#f8').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
	}	
	else{
		 $('#f8').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter value of F8 from 0 to 5!');
	}
});

$("#f9").unbind().change(function(){
	
	if(validateFactors($('#f9').val()))
	{
		
		 $('#f9').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
	}	
	else{
		 $('#f9').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter value of F9 from 0 to 5!');
	}
});

$("#f10").unbind().change(function(){
	
	if(validateFactors($('#f10').val()))
	{
		
		 $('#f10').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
	}	
	else{
		 $('#f10').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter value of F10 from 0 to 5!');
	}
});

$("#f11").unbind().change(function(){
	
	if(validateFactors($('#f11').val()))
	{
		
		 $('#f11').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
	}	
	else{
		 $('#f11').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter value of F11 from 0 to 5!');
	}
});

$("#f12").unbind().change(function(){
	
	if(validateFactors($('#f12').val()))
	{
		
		 $('#f12').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
	}	
	else{
		 $('#f12').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter value of F12 from 0 to 5!');
	}
});

$("#f13").unbind().change(function(){
	
	if(validateFactors($('#f13').val()))
	{
		
		 $('#f13').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
	}	
	else{
		 $('#f13').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter value of F13 from 0 to 5!');
	}
});

$("#f14").unbind().change(function(){
	
	if(validateFactors($('#f14').val()))
	{
		
		 $('#f14').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
	}	
	else{
		 $('#f14').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter value of F14 from 0 to 5!');
	}
});
/////////////////Validation for on key press starts here///////////////
 /////////////////Validation for on key press starts here///////////////
  $('#rate').keydown(function(event) {
	  var ch = (window.Event) ? event.which : event.keyCode;
	  if((ch >= 48 && ch <= 57)||(ch>=0 && ch<=31 )||(ch>=37&&ch<=40)||ch==46) {
		    
		}
    	else{
		event.preventDefault(); 
		 alert("Only positive whole numbers are allowed!");
		return false;
		}
      });



  $('#ExternalInputs').keydown(function(event) {
       var ch = (window.Event) ? event.which : event.keyCode;
	  if((ch >= 48 && ch <= 57)||(ch>=0 && ch<=31 )||(ch>=37&&ch<=40)||ch==46) {
		   
		}
    	else{
		event.preventDefault(); 
		 alert("Only positive whole numbers are allowed!");
		return false;
		}
      });


  $('#ExternalOutputs').keydown(function(event) {
      var ch = (window.Event) ? event.which : event.keyCode;
	  if((ch >= 48 && ch <= 57)||(ch>=0 && ch<=31 )||(ch>=37&&ch<=40)||ch==46) {
		      
		}
    	else{
		event.preventDefault(); 
		 alert("Only positive whole numbers are allowed!");
		return false;
		}
      });
	  
	    $('#ExternalInquiries').keydown(function(event) {
       var ch = (window.Event) ? event.which : event.keyCode;
	  if((ch >= 48 && ch <= 57)||(ch>=0 && ch<=31 )||(ch>=37&&ch<=40)||ch==46) {
		      
		}
    	else{
		event.preventDefault(); 
		 alert("Only positive whole numbers are allowed!");
		return false;
		}
      });
	  
	    $('#InternalLogicalFiles').keydown(function(event) {
      var ch = (window.Event) ? event.which : event.keyCode;
	  if((ch >= 48 && ch <= 57)||(ch>=0 && ch<=31 )||(ch>=37&&ch<=40)||ch==46) {
		    
		}
    	else{
		event.preventDefault(); 
		 alert("Only positive whole numbers are allowed!");
		return false;
		}
      });
	  
	    $('#ExternalInterfaceFiles').keydown(function(event) {
      var ch = (window.Event) ? event.which : event.keyCode;
	  if((ch >= 48 && ch <= 57)||(ch>=0 && ch<=31 )||(ch>=37&&ch<=40)||ch==46) {
		     
		}
    	else{
		event.preventDefault(); 
		 alert("Only positive whole numbers are allowed!");
		return false;
		}
      });


	  
	  
	  
	  
  $('#f1').keydown(function(event) {
       var ch = (window.Event) ? event.which : event.keyCode;
	  if((ch >= 48 && ch <= 53)||(ch>=0 && ch<=31 )||(ch>=37&&ch<=40)||ch==46) {
		      
		}
    	else{
		event.preventDefault(); 
		 alert("Only positive whole numbers from 0 to 5 are allowed!");
		return false;
		}
      });	  

 $('#f2').keydown(function(event) {
       var ch = (window.Event) ? event.which : event.keyCode;
	  if((ch >= 48 && ch <= 53)||(ch>=0 && ch<=31 )||(ch>=37&&ch<=40)||ch==46) {
		       
		}
    	else{
		event.preventDefault(); 
		 alert("Only positive whole numbers from 0 to 5 are allowed!");
		return false;
		}
      });
	  
	   $('#f3').keydown(function(event) {
      var ch = (window.Event) ? event.which : event.keyCode;
	  if((ch >= 48 && ch <= 53)||(ch>=0 && ch<=31 )||(ch>=37&&ch<=40)||ch==46) {
		      
		}
    	else{
		event.preventDefault(); 
		 alert("Only positive whole numbers from 0 to 5 are allowed!");
		return false;
		}
      });
	  
	   $('#f4').keydown(function(event) {
       var ch = (window.Event) ? event.which : event.keyCode;
	  if((ch >= 48 && ch <= 53)||(ch>=0 && ch<=31 )||(ch>=37&&ch<=40)||ch==46) {
		      
		}
    	else{
		event.preventDefault(); 
		 alert("Only positive whole numbers from 0 to 5 are allowed!");
		return false;
		}
      });
	  
	   $('#f5').keydown(function(event) {
       var ch = (window.Event) ? event.which : event.keyCode;
	  if((ch >= 48 && ch <= 53)||(ch>=0 && ch<=31 )||(ch>=37&&ch<=40)||ch==46) {
		       
		}
    	else{
		event.preventDefault(); 
		 alert("Only positive whole numbers from 0 to 5 are allowed!");
		return false;
		}
      });
	  
	   $('#f6').keydown(function(event) {
       var ch = (window.Event) ? event.which : event.keyCode;
	  if((ch >= 48 && ch <= 53)||(ch>=0 && ch<=31 )||(ch>=37&&ch<=40)||ch==46) {
		       
		}
    	else{
		event.preventDefault(); 
		 alert("Only positive whole numbers from 0 to 5 are allowed!");
		return false;
		}
      });
	  
	   $('#f7').keydown(function(event) {
       var ch = (window.Event) ? event.which : event.keyCode;
	  if((ch >= 48 && ch <= 53)||(ch>=0 && ch<=31 )||(ch>=37&&ch<=40)||ch==46) {
		       
		}
    	else{
		event.preventDefault(); 
		 alert("Only positive whole numbers from 0 to 5 are allowed!");
		return false;
		}
      });
	  
	   $('#f8').keydown(function(event) {
       var ch = (window.Event) ? event.which : event.keyCode;
	  if((ch >= 48 && ch <= 53)||(ch>=0 && ch<=31 )||(ch>=37&&ch<=40)||ch==46) {
		       
		}
    	else{
		event.preventDefault(); 
		 alert("Only positive whole numbers from 0 to 5 are allowed!");
		return false;
		}
      });
	  
	   $('#f9').keydown(function(event) {
       var ch = (window.Event) ? event.which : event.keyCode;
	  if((ch >= 48 && ch <= 53)||(ch>=0 && ch<=31 )||(ch>=37&&ch<=40)||ch==46) {
		       
		}
    	else{
		event.preventDefault(); 
		 alert("Only positive whole numbers from 0 to 5 are allowed!");
		return false;
		}
      });
	  
	   $('#f10').keydown(function(event) {
       var ch = (window.Event) ? event.which : event.keyCode;
	  if((ch >= 48 && ch <= 53)||(ch>=0 && ch<=31 )||(ch>=37&&ch<=40)||ch==46) {
		      
		}
    	else{
		event.preventDefault(); 
		 alert("Only positive whole numbers from 0 to 5 are allowed!");
		return false;
		}
      });
	  
	   $('#f11').keydown(function(event) {
      var ch = (window.Event) ? event.which : event.keyCode;
	  if((ch >= 48 && ch <= 53)||(ch>=0 && ch<=31 )||(ch>=37&&ch<=40)||ch==46) {
		       
		}
    	else{
		event.preventDefault(); 
		 alert("Only positive whole numbers from 0 to 5 are allowed!");
		return false;
		}
      });
	  
	   $('#f12').keydown(function(event) {
       var ch = (window.Event) ? event.which : event.keyCode;
	  if((ch >= 48 && ch <= 53)||(ch>=0 && ch<=31 )||(ch>=37&&ch<=40)||ch==46) {
		       
		}
    	else{
		event.preventDefault(event); 
		 alert("Only positive whole numbers from 0 to 5 are allowed!");
		return false;
		}
      });
	  
	   $('#f13').keydown(function(event) {
       var ch = (window.Event) ? event.which : event.keyCode;
	  if((ch >= 48 && ch <= 53)||(ch>=0 && ch<=31 )||(ch>=37&&ch<=40)||ch==46) {
		      
		}
    	else{
		event.preventDefault(event); 
		 alert("Only positive whole numbers from 0 to 5 are allowed!");
		return false;
		}
      });
	  
	   $('#f14').keydown(function(event) {
       var ch = (window.Event) ? event.which : event.keyCode;
	  if((ch >= 48 && ch <= 53)||(ch>=0 && ch<=31 )||(ch>=37&&ch<=40)||ch==46) {
		      
		}
    	else{
		event.preventDefault(); 
		 alert("Only positive whole numbers from 0 to 5 are allowed!");
		return false;
		}
      });
	
	
/////////////////////////Validation FUNCTIONS starts from here//////////////////
function validateNumber(num)
{
   var ck_num = /^\+?([0-9]\d*)$/;
 return  ck_num.test(num);

}

function validateFactors(num)
{
   var ck_num = /^\+?([0-5]{1})$/;
 return  ck_num.test(num);

}			