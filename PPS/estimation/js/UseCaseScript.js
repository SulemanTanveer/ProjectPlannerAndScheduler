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
		 //validation of simpleUC ////
		 if( $('#simpleUC').val()==""||!validateNumber($('#simpleUC').val()))
		 {	
			 flag=false;
			 altMsg+="Enter valid simple use case! \n";
			 $('#simpleUC').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
			 
		 }
		 //validation of averageUC ////
		 if( $('#averageUC').val()==""||!validateNumber($('#averageUC').val()))
		 {	
			 flag=false;
			 altMsg+="Enter valid average use case! \n";
			 $('#averageUC').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
			 
		 }
		 //validation of complexUC ////
		 if( $('#complexUC').val()==""||!validateNumber($('#complexUC').val()))
		 {	
			 flag=false;
			 altMsg+="Enter valid complex use case! \n";
			 $('#complexUC').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
			 
		 }
		 //validation of simpleAC ////
		 if( $('#simpleAC').val()==""||!validateNumber($('#simpleAC').val()))
		 {	
			 flag=false;
			 altMsg+="Enter valid simple actor! \n";
			 $('#simpleAC').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
			 
		 }
		 //validation of averageAC ////
		 if( $('#averageAC').val()==""||!validateNumber($('#averageAC').val()))
		 {	
			 flag=false;
			 altMsg+="Enter valid average actor! \n";
			 $('#averageAC').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
			 
		 }
		 //validation of complexAC ////
		 if( $('#complexAC').val()==""||!validateNumber($('#complexAC').val()))
		 {	
			 flag=false;
			 altMsg+="Enter valid complex actor! \n";
			 $('#complexAC').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
			 
		 }
		 ///////////////////////////VALIDATIONFOR FOR 13 TECHNICAL FACTORS ///////////////////////////////
		  //validation of T1 ////
		 if( $('#t1').val()==""||!validateFactors($('#t1').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of T1! \n";
			 $('#t1').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		  //validation of T2 ////
		 if( $('#t2').val()==""||!validateFactors($('#t2').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of T2! \n";
			 $('#t2').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		  //validation of T3 ////
		 if( $('#t3').val()==""||!validateFactors($('#t3').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of T3! \n";
			 $('#t3').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		  //validation of T4 ////
		 if( $('#t4').val()==""||!validateFactors($('#t4').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of T4! \n";
			 $('#t4').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		  //validation of T5 ////
		 if( $('#t5').val()==""||!validateFactors($('#t5').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of T5! \n";
			 $('#t5').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		  //validation of T6 ////
		 if( $('#t6').val()==""||!validateFactors($('#t6').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of T6! \n";
			 $('#t6').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		  //validation of T7 ////
		 if( $('#t7').val()==""||!validateFactors($('#t7').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of T7! \n";
			 $('#t7').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		  //validation of T8 ////
		 if( $('#t8').val()==""||!validateFactors($('#t8').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of T8! \n";
			 $('#t8').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		  //validation of T9 ////
		 if( $('#t9').val()==""||!validateFactors($('#t9').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of T9! \n";
			 $('#t9').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		  //validation of T10 ////
		 if( $('#t10').val()==""||!validateFactors($('#t10').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of T10! \n";
			 $('#t10').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		  //validation of T11 ////
		 if( $('#t11').val()==""||!validateFactors($('#t11').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of T11! \n";
			 $('#t11').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		  //validation of T12 ////
		 if( $('#t12').val()==""||!validateFactors($('#t12').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of T12! \n";
			 $('#t12').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		  //validation of T13 ////
		 if( $('#t13').val()==""||!validateFactors($('#t13').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of T13! \n";
			 $('#t13').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		 ///////////////////////////VALIDATIONFOR FOR 8 ENVIRONMENTAL FACTORS ///////////////////////////////
		  //validation of E1 ////
		 if( $('#e1').val()==""||!validateFactors($('#e1').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of E1! \n";
			 $('#e1').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		  //validation of E2 ////
		 if( $('#e2').val()==""||!validateFactors($('#e2').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of E2! \n";
			 $('#e2').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		  //validation of E3 ////
		 if( $('#e3').val()==""||!validateFactors($('#e3').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of E3! \n";
			 $('#e3').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		  //validation of E4 ////
		 if( $('#e4').val()==""||!validateFactors($('#e4').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of E4! \n";
			 $('#e4').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		  //validation of E5 ////
		 if( $('#e5').val()==""||!validateFactors($('#e5').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of E5! \n";
			 $('#e5').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		  //validation of E6 ////
		 if( $('#e6').val()==""||!validateFactors($('#e6').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of E6! \n";
			 $('#e6').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		  //validation of E7 ////
		 if( $('#e7').val()==""||!validateFactors($('#e7').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of E7! \n";
			 $('#e7').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		  //validation of E8 ////
		 if( $('#e8').val()==""||!validateFactors($('#e8').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of E8! \n";
			 $('#e8').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		 
		  if(flag){
		  $('#img2').show();
		  UPCcalculate();
		  var ucp = $("#UCP").val();
		  var language=$("#language").val();
		  
		  var rate=$("#rate").val();
              $.ajax({  
                   url:"ucp2.php",  
                   method:"POST",  
                   data:{UCP:ucp,
				   Rate:rate,
				   Language:language
				  
				   },  
                  
                   success:function(data){  
                    $('#img2').hide();
				    $('#page1').html(data);
					estimate();
                   }  
				   
    });
	
	}
		 else{
			 
			 alert(altMsg);
		 }
	
});
////////////////////////////////////////////////////////////////////////////

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
	
	document.getElementById("uc").value=document.getElementById("myTable2").rows[1].cells[1].innerHTML;
	document.getElementById("e").value=document.getElementById("eff").innerHTML;
	document.getElementById("s").value=document.getElementById("size").innerHTML;
	document.getElementById("c").value=document.getElementById("cost").innerHTML;
	document.getElementById("d").value=document.getElementById("time").innerHTML;
	
}

 $('#insert_form').on("submit", function(event){  
     event.preventDefault();  
      var ucp =$("#uc").val(); 
	  var eff = $("#e").val(); 
	  var size = $("#s").val(); 
	  var cost = $("#c").val(); 
	  var time = $("#d").val(); 
	  var pid = $("#proj_id").val();   
     if(pid==""){
		 alert ("please select any project before add metric!")
	 }
	 else{
      $.ajax({  
       url:"ucp_insert.php",  
       method:"POST",  
	  // data:new FormData(this),  
      // contentType:false, 
	  // processData:false,
      
       beforeSend:function(){  
        $('#Insert').val("Inserting..");  
       }, 
	   
	   data:{projId:pid,
				   eff1:eff,
				   size1:size,
				   cost1:cost,
				   time1:time,
				   fp1:ucp
				  
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
      
     var _fp = $('#usecasepoint').val();
	 var  _effort= $('#ucpEffort').val();
	 var _size = $('#ucpSize').val();
	 var _cost = $('#ucpCost').val();
	 var _duration = $('#ucpDuration').val();
   
      $('#ucps').html(_fp);
	  $('#eff').html(_effort);
	  $('#time').html(_duration);
	  $('#size').html(_size);
	  $('#cost').html(_cost);
	  $('#proj_id').val("");
	  var _languageId = $('#languageId').val();
	  
	  
       $('#add_data_Modal').modal('show');
    //////////////////////////////////
   $.ajax({  
       url:"UcProjectList.php",  
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

/////USE CASE TYPE VALIDATION
$("#simpleUC").unbind().change(function(){
	
	if(validateNumber($('#simpleUC').val()))
	{
		 $('#simpleUC').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	}	
	else{
		 
		$('#simpleUC').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter Valid simple use case!');
	}
});

$("#averageUC").unbind().change(function(){
	
	if(validateNumber($('#averageUC').val()))
	{
		 $('#averageUC').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	}	
	else{
		 
		$('#averageUC').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter Valid average use case!');
	}
});

$("#complexUC").unbind().change(function(){
	
	if(validateNumber($('#complexUC').val()))
	{
		 $('#complexUC').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	}	
	else{
		 
		$('#complexUC').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter Valid complex use case!');
	}
});
//ACTOR TYPE VALIDATION//
$("#simpleAC").unbind().change(function(){
	
	if(validateNumber($('#simpleAC').val()))
	{
		 $('#simpleAC').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	}	
	else{
		 
		$('#simpleAC').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter Valid simple actor!');
	}
});

$("#averageAC").unbind().change(function(){
	
	if(validateNumber($('#averageAC').val()))
	{
		 $('#averageAC').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	}	
	else{
		 
		$('#averageAC').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter Valid average actor!');
	}
});

$("#complexAC").unbind().change(function(){
	
	if(validateNumber($('#complexAC').val()))
	{
		 $('#complexAC').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	}	
	else{
		 
		$('#complexAC').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter Valid complex actor!');
	}
});
//TECHNICAL FACTOR VALIDATION
$("#t1").unbind().change(function(){
	
	if(validateFactors($('#t1').val()))
	{
		
		 $('#t1').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
	}	
	else{
		 $('#t1').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter value of T1 from 0 to 5!');
	}
});

$("#t2").unbind().change(function(){
	
	if(validateFactors($('#t2').val()))
	{
		
		 $('#t2').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
	}	
	else{
		 $('#t2').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter value of T2 from 0 to 5!');
	}
});

$("#t3").unbind().change(function(){
	
	if(validateFactors($('#t3').val()))
	{
		
		 $('#t3').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
	}	
	else{
		 $('#t3').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter value of T3 from 0 to 5!');
	}
});

$("#t4").unbind().change(function(){
	
	if(validateFactors($('#t4').val()))
	{
		
		 $('#t4').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
	}	
	else{
		 $('#t4').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter value of T4 from 0 to 5!');
	}
});

$("#t5").unbind().change(function(){
	
	if(validateFactors($('#t5').val()))
	{
		
		 $('#t5').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
	}	
	else{
		 $('#t5').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter value of T5 from 0 to 5!');
	}
});

$("#t6").unbind().change(function(){
	
	if(validateFactors($('#t6').val()))
	{
		
		 $('#t6').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
	}	
	else{
		 $('#t6').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter value of T6 from 0 to 5!');
	}
});

$("#t7").unbind().change(function(){
	
	if(validateFactors($('#t7').val()))
	{
		
		 $('#t7').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
	}	
	else{
		 $('#t7').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter value of T7 from 0 to 5!');
	}
});

$("#t8").unbind().change(function(){
	
	if(validateFactors($('#t8').val()))
	{
		
		 $('#t8').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
	}	
	else{
		 $('#t8').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter value of T8 from 0 to 5!');
	}
});

$("#t9").unbind().change(function(){
	
	if(validateFactors($('#t9').val()))
	{
		
		 $('#t9').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
	}	
	else{
		 $('#t9').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter value of T9 from 0 to 5!');
	}
});

$("#t10").unbind().change(function(){
	
	if(validateFactors($('#t10').val()))
	{
		
		 $('#t10').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
	}	
	else{
		 $('#t10').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter value of T10 from 0 to 5!');
	}
});

$("#t11").unbind().change(function(){
	
	if(validateFactors($('#t11').val()))
	{
		
		 $('#t11').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
	}	
	else{
		 $('#t11').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter value of T11 from 0 to 5!');
	}
});

$("#t12").unbind().change(function(){
	
	if(validateFactors($('#t12').val()))
	{
		
		 $('#t12').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
	}	
	else{
		 $('#t12').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter value of T12 from 0 to 5!');
	}
});

$("#t13").unbind().change(function(){
	
	if(validateFactors($('#t13').val()))
	{
		
		 $('#t13').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
	}	
	else{
		 $('#t13').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter value of T13 from 0 to 5!');
	}
});

//ENVIRONMENTAL FACTORS//

$("#e1").unbind().change(function(){
	
	if(validateFactors($('#e1').val()))
	{
		
		 $('#e1').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
	}	
	else{
		 $('#e1').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter value of E1 from 0 to 5!');
	}
});

$("#e2").unbind().change(function(){
	
	if(validateFactors($('#e2').val()))
	{
		
		 $('#e2').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
	}	
	else{
		 $('#e2').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter value of E2 from 0 to 5!');
	}
});

$("#e3").unbind().change(function(){
	
	if(validateFactors($('#e3').val()))
	{
		
		 $('#e3').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
	}	
	else{
		 $('#e3').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter value of E3 from 0 to 5!');
	}
});

$("#e4").unbind().change(function(){
	
	if(validateFactors($('#e4').val()))
	{
		
		 $('#e4').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
	}	
	else{
		 $('#e4').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter value of E4 from 0 to 5!');
	}
});

$("#e5").unbind().change(function(){
	
	if(validateFactors($('#e5').val()))
	{
		
		 $('#e5').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
	}	
	else{
		 $('#e5').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter value of E5 from 0 to 5!');
	}
});

$("#e6").unbind().change(function(){
	
	if(validateFactors($('#e6').val()))
	{
		
		 $('#e6').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
	}	
	else{
		 $('#e6').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter value of E6 from 0 to 5!');
	}
});

$("#e7").unbind().change(function(){
	
	if(validateFactors($('#e7').val()))
	{
		
		 $('#e7').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
	}	
	else{
		 $('#e7').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter value of E7 from 0 to 5!');
	}
});

$("#e8").unbind().change(function(){
	
	if(validateFactors($('#e8').val()))
	{
		
		 $('#e8').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
	
	}	
	else{
		 $('#e8').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		alert('Enter value of E8 from 0 to 5!');
	}
});
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

/////USE CASE TYPE VALIDATION
$('#simpleUC').keydown(function(event) {
	  var ch = (window.Event) ? event.which : event.keyCode;
	  if((ch >= 48 && ch <= 57)||(ch>=0 && ch<=31 )||(ch>=37&&ch<=40)||ch==46) {
		    
		}
    	else{
		event.preventDefault(); 
		 alert("Only positive whole numbers are allowed!");
		return false;
		}
      });
	  
$('#averageUC').keydown(function(event) {
	  var ch = (window.Event) ? event.which : event.keyCode;
	  if((ch >= 48 && ch <= 57)||(ch>=0 && ch<=31 )||(ch>=37&&ch<=40)||ch==46) {
		    
		}
    	else{
		event.preventDefault(); 
		 alert("Only positive whole numbers are allowed!");
		return false;
		}
      });
	  
$('#complexUC').keydown(function(event) {
	  var ch = (window.Event) ? event.which : event.keyCode;
	  if((ch >= 48 && ch <= 57)||(ch>=0 && ch<=31 )||(ch>=37&&ch<=40)||ch==46) {
		    
		}
    	else{
		event.preventDefault(); 
		 alert("Only positive whole numbers are allowed!");
		return false;
		}
      });
	
/////ACTOR TYPE VALIDATION
$('#simpleAC').keydown(function(event) {
	  var ch = (window.Event) ? event.which : event.keyCode;
	  if((ch >= 48 && ch <= 57)||(ch>=0 && ch<=31 )||(ch>=37&&ch<=40)||ch==46) {
		    
		}
    	else{
		event.preventDefault(); 
		 alert("Only positive whole numbers are allowed!");
		return false;
		}
      });
	  
$('#averageAC').keydown(function(event) {
	  var ch = (window.Event) ? event.which : event.keyCode;
	  if((ch >= 48 && ch <= 57)||(ch>=0 && ch<=31 )||(ch>=37&&ch<=40)||ch==46) {
		    
		}
    	else{
		event.preventDefault(); 
		 alert("Only positive whole numbers are allowed!");
		return false;
		}
      });
	  
$('#complexAC').keydown(function(event) {
	  var ch = (window.Event) ? event.which : event.keyCode;
	  if((ch >= 48 && ch <= 57)||(ch>=0 && ch<=31 )||(ch>=37&&ch<=40)||ch==46) {
		    
		}
    	else{
		event.preventDefault(); 
		 alert("Only positive whole numbers are allowed!");
		return false;
		}
      });
/////TECHNICAL FACTOR VALIDATION//
 $('#t1').keydown(function(event) {
       var ch = (window.Event) ? event.which : event.keyCode;
	  if((ch >= 48 && ch <= 53)||(ch>=0 && ch<=31 )||(ch>=37&&ch<=40)||ch==46) {
		      
		}
    	else{
		event.preventDefault(); 
		 alert("Only positive whole numbers from 0 to 5 are allowed!");
		return false;
		}
      });

$('#t2').keydown(function(event) {
       var ch = (window.Event) ? event.which : event.keyCode;
	  if((ch >= 48 && ch <= 53)||(ch>=0 && ch<=31 )||(ch>=37&&ch<=40)||ch==46) {
		      
		}
    	else{
		event.preventDefault(); 
		 alert("Only positive whole numbers from 0 to 5 are allowed!");
		return false;
		}
      });
	  
$('#t3').keydown(function(event) {
       var ch = (window.Event) ? event.which : event.keyCode;
	  if((ch >= 48 && ch <= 53)||(ch>=0 && ch<=31 )||(ch>=37&&ch<=40)||ch==46) {
		      
		}
    	else{
		event.preventDefault(); 
		 alert("Only positive whole numbers from 0 to 5 are allowed!");
		return false;
		}
      });
	  
$('#t4').keydown(function(event) {
       var ch = (window.Event) ? event.which : event.keyCode;
	  if((ch >= 48 && ch <= 53)||(ch>=0 && ch<=31 )||(ch>=37&&ch<=40)||ch==46) {
		      
		}
    	else{
		event.preventDefault(); 
		 alert("Only positive whole numbers from 0 to 5 are allowed!");
		return false;
		}
      });
	  
$('#t5').keydown(function(event) {
       var ch = (window.Event) ? event.which : event.keyCode;
	  if((ch >= 48 && ch <= 53)||(ch>=0 && ch<=31 )||(ch>=37&&ch<=40)||ch==46) {
		      
		}
    	else{
		event.preventDefault(); 
		 alert("Only positive whole numbers from 0 to 5 are allowed!");
		return false;
		}
      });
	  
$('#t6').keydown(function(event) {
       var ch = (window.Event) ? event.which : event.keyCode;
	  if((ch >= 48 && ch <= 53)||(ch>=0 && ch<=31 )||(ch>=37&&ch<=40)||ch==46) {
		      
		}
    	else{
		event.preventDefault(); 
		 alert("Only positive whole numbers from 0 to 5 are allowed!");
		return false;
		}
      });
	  
	  
$('#t7').keydown(function(event) {
       var ch = (window.Event) ? event.which : event.keyCode;
	  if((ch >= 48 && ch <= 53)||(ch>=0 && ch<=31 )||(ch>=37&&ch<=40)||ch==46) {
		      
		}
    	else{
		event.preventDefault(); 
		 alert("Only positive whole numbers from 0 to 5 are allowed!");
		return false;
		}
      });
	  
$('#t8').keydown(function(event) {
       var ch = (window.Event) ? event.which : event.keyCode;
	  if((ch >= 48 && ch <= 53)||(ch>=0 && ch<=31 )||(ch>=37&&ch<=40)||ch==46) {
		      
		}
    	else{
		event.preventDefault(); 
		 alert("Only positive whole numbers from 0 to 5 are allowed!");
		return false;
		}
      });
	  
$('#t9').keydown(function(event) {
       var ch = (window.Event) ? event.which : event.keyCode;
	  if((ch >= 48 && ch <= 53)||(ch>=0 && ch<=31 )||(ch>=37&&ch<=40)||ch==46) {
		      
		}
    	else{
		event.preventDefault(); 
		 alert("Only positive whole numbers from 0 to 5 are allowed!");
		return false;
		}
      });
	  
$('#t10').keydown(function(event) {
       var ch = (window.Event) ? event.which : event.keyCode;
	  if((ch >= 48 && ch <= 53)||(ch>=0 && ch<=31 )||(ch>=37&&ch<=40)||ch==46) {
		      
		}
    	else{
		event.preventDefault(); 
		 alert("Only positive whole numbers from 0 to 5 are allowed!");
		return false;
		}
      });
	  
$('#t11').keydown(function(event) {
       var ch = (window.Event) ? event.which : event.keyCode;
	  if((ch >= 48 && ch <= 53)||(ch>=0 && ch<=31 )||(ch>=37&&ch<=40)||ch==46) {
		      
		}
    	else{
		event.preventDefault(); 
		 alert("Only positive whole numbers from 0 to 5 are allowed!");
		return false;
		}
      });
	  
$('#t12').keydown(function(event) {
       var ch = (window.Event) ? event.which : event.keyCode;
	  if((ch >= 48 && ch <= 53)||(ch>=0 && ch<=31 )||(ch>=37&&ch<=40)||ch==46) {
		      
		}
    	else{
		event.preventDefault(); 
		 alert("Only positive whole numbers from 0 to 5 are allowed!");
		return false;
		}
      });
	  
$('#t13').keydown(function(event) {
       var ch = (window.Event) ? event.which : event.keyCode;
	  if((ch >= 48 && ch <= 53)||(ch>=0 && ch<=31 )||(ch>=37&&ch<=40)||ch==46) {
		      
		}
    	else{
		event.preventDefault(); 
		 alert("Only positive whole numbers from 0 to 5 are allowed!");
		return false;
		}
      });
//	environmental factors validation
$('#e1').keydown(function(event) {
       var ch = (window.Event) ? event.which : event.keyCode;
	  if((ch >= 48 && ch <= 53)||(ch>=0 && ch<=31 )||(ch>=37&&ch<=40)||ch==46) {
		      
		}
    	else{
		event.preventDefault(); 
		 alert("Only positive whole numbers from 0 to 5 are allowed!");
		return false;
		}
      });

$('#e2').keydown(function(event) {
       var ch = (window.Event) ? event.which : event.keyCode;
	  if((ch >= 48 && ch <= 53)||(ch>=0 && ch<=31 )||(ch>=37&&ch<=40)||ch==46) {
		      
		}
    	else{
		event.preventDefault(); 
		 alert("Only positive whole numbers from 0 to 5 are allowed!");
		return false;
		}
      });

$('#e3').keydown(function(event) {
       var ch = (window.Event) ? event.which : event.keyCode;
	  if((ch >= 48 && ch <= 53)||(ch>=0 && ch<=31 )||(ch>=37&&ch<=40)||ch==46) {
		      
		}
    	else{
		event.preventDefault(); 
		 alert("Only positive whole numbers from 0 to 5 are allowed!");
		return false;
		}
      });

$('#e4').keydown(function(event) {
       var ch = (window.Event) ? event.which : event.keyCode;
	  if((ch >= 48 && ch <= 53)||(ch>=0 && ch<=31 )||(ch>=37&&ch<=40)||ch==46) {
		      
		}
    	else{
		event.preventDefault(); 
		 alert("Only positive whole numbers from 0 to 5 are allowed!");
		return false;
		}
      });

$('#e5').keydown(function(event) {
       var ch = (window.Event) ? event.which : event.keyCode;
	  if((ch >= 48 && ch <= 53)||(ch>=0 && ch<=31 )||(ch>=37&&ch<=40)||ch==46) {
		      
		}
    	else{
		event.preventDefault(); 
		 alert("Only positive whole numbers from 0 to 5 are allowed!");
		return false;
		}
      });

$('#e6').keydown(function(event) {
       var ch = (window.Event) ? event.which : event.keyCode;
	  if((ch >= 48 && ch <= 53)||(ch>=0 && ch<=31 )||(ch>=37&&ch<=40)||ch==46) {
		      
		}
    	else{
		event.preventDefault(); 
		 alert("Only positive whole numbers from 0 to 5 are allowed!");
		return false;
		}
      });

$('#e7').keydown(function(event) {
       var ch = (window.Event) ? event.which : event.keyCode;
	  if((ch >= 48 && ch <= 53)||(ch>=0 && ch<=31 )||(ch>=37&&ch<=40)||ch==46) {
		      
		}
    	else{
		event.preventDefault(); 
		 alert("Only positive whole numbers from 0 to 5 are allowed!");
		return false;
		}
      });

$('#e8').keydown(function(event) {
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