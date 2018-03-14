
$('#c1').click(function(){  
              $('#insert').val("Insert");  
              $('#insert_form')[0].reset();  
         
   	   
   	  
   	  }); 
	  
////////////////////////////////////////
/////////////////////////////////////////	
/////////////////////////////////////////
 
     $('#projLanguage2').change(function(e) {
		  if( $('#orginal_language').val()!=$('#projLanguage2').val())
		 {       
			 alert('This will loss  project metrics data if exists! ');
			 
			 
			 
		 }
});	
//////////////////////////////// 
 
$('#button').unbind().click(function(e) {
	 
		 e.preventDefault();
		 
		 var flag=true;
		 var altMsg="";
		  
		 //validation of ExternalInputs ////
		 if( $('#ExternalInputs').val()==""||!validateNumber($('#ExternalInputs').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid External Inputs! \n";
			 $('#ExternalInputs').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		 else{
			 $('#ExternalInputs').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
		 }
		 
		  //validation of ExternalOutputs ////
		 if( $('#ExternalOutputs').val()==""||!validateNumber($('#ExternalOutputs').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid  External Outputs! \n";
			 $('#ExternalOutputs').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }else{
			 $('#ExternalOutputs').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
		 }
		 
		  //validation of ExternalInquiries ////
		 if( $('#ExternalInquiries').val()==""||!validateNumber($('#ExternalInquiries').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid  External Inquiries! \n";
			 $('#ExternalInquiries').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		 else{
			 $('#ExternalInquiries').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
		 }
		  //validation of InternalLogicalFiles ////
		 if( $('#InternalLogicalFiles').val()==""||!validateNumber($('#InternalLogicalFiles').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid  Internal Logical Files! \n";
			 $('#InternalLogicalFiles').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }else{
			 $('#InternalLogicalFiles').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
		 }
		  //validation of ExternalInterfaceFiles ////
		 if( $('#ExternalInterfaceFiles').val()==""||!validateNumber($('#ExternalInterfaceFiles').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid  External Interface Files! \n";
			 $('#ExternalInterfaceFiles').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }else{
			 $('#ExternalInterfaceFiles').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
		 }
		 ///////////////////////////VALIDATIONFOR FOR 14 FACTORS ///////////////////////////////
		  //validation of F1 ////
		 if( $('#f1').val()==""||!validateFactors($('#f1').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of F1! \n";
			 $('#f1').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }else{
			 $('#f1').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
		 }
		  //validation of F2 ////
		 if( $('#f2').val()==""||!validateFactors($('#f2').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of F2! \n";
			 $('#f2').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }else{
			 $('#f2').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
		 }
		  //validation of F3 ////
		 if( $('#f3').val()==""||!validateFactors($('#f3').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of F3! \n";
			 $('#f3').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		 else{
			 $('#f3').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
		 }
		  //validation of F4 ////
		 if( $('#f4').val()==""||!validateFactors($('#f4').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of F4! \n";
			 $('#f4').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }else{
			 $('#f4').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
		 }
		 
		  //validation of F5 ////
		 if( $('#f5').val()==""||!validateFactors($('#f5').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of F5! \n";
			 $('#f5').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }else{
			 $('#f5').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
		 }
		  //validation of F6 ////
		 if( $('#f6').val()==""||!validateFactors($('#f6').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of F6! \n";
			 $('#f6').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		 else{
			 $('#f6').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
		 }
		  //validation of F7 ////
		 if( $('#f7').val()==""||!validateFactors($('#f7').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of F7! \n";
			 $('#f7').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }else{
			 $('#f7').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
		 }
		 
		  //validation of F8 ////
		 if( $('#f8').val()==""||!validateFactors($('#f8').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of F8! \n";
			 $('#f8').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }else{
			 $('#f8').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
		 }
		 
		  //validation of F9 ////
		 if( $('#f9').val()==""||!validateFactors($('#f9').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of F9! \n";
			 $('#f9').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }else{
			 $('#f9').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
		 }
		 
		  //validation of F10 ////
		 if( $('#f10').val()==""||!validateFactors($('#f10').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of F10! \n";
			 $('#f10').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }else{
			 $('#f10').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
		 }
		 
		  //validation of F11 ////
		 if( $('#f11').val()==""||!validateFactors($('#f11').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of F11! \n";
			 $('#f11').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }else{
			 $('#f11').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
		 }
		  //validation of F12 ////
		 if( $('#f12').val()==""||!validateFactors($('#f12').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of F12! \n";
			 $('#f12').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }else{
			 $('#f12').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
		 }
		 
		  //validation of F13 ////
		 if( $('#f13').val()==""||!validateFactors($('#f13').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of F13! \n";
			 $('#f13').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }else{
			 $('#f13').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
		 }
		 
		  //validation of F14 ////
		 if( $('#f14').val()==""||!validateFactors($('#f14').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of F14! \n";
			 $('#f14').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }else{
			 $('#f14').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
		 }
		 
		 
		 if(flag){
		 	 
			calculate();
			   $('#modal1').modal('hide'); 
   	   $('#modal2').modal('hide');
		    
		 }
		 else{
			 
			 alert(altMsg);
		 }
	
});
////////	 
	 
	 
	 
	 
	 
 

$('#ucpCalculate').click(function(e) {
		 e.preventDefault();
		  var flag=true;
		  var altMsg="";
		  
		 //validation of simpleUC ////
		 if( $('#simpleUC').val()==""||!validateNumber($('#simpleUC').val()))
		 {	
			 flag=false;
			 altMsg+="Enter valid simple use case! \n";
			 $('#simpleUC').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
			 
		 }
		 else{
			 $('#simpleUC').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
		 }
		 //validation of averageUC ////
		 if( $('#averageUC').val()==""||!validateNumber($('#averageUC').val()))
		 {	
			 flag=false;
			 altMsg+="Enter valid average use case! \n";
			 $('#averageUC').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
			 
		 }
		 else{
			 $('#averageUC').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
		 }
		 //validation of complexUC ////
		 if( $('#complexUC').val()==""||!validateNumber($('#complexUC').val()))
		 {	
			 flag=false;
			 altMsg+="Enter valid complex use case! \n";
			 $('#complexUC').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
			 
		 }
		 else{
			 $('#complexUC').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
		 }
		 //validation of simpleAC ////
		 if( $('#simpleAC').val()==""||!validateNumber($('#simpleAC').val()))
		 {	
			 flag=false;
			 altMsg+="Enter valid simple actor! \n";
			 $('#simpleAC').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
			 
		 }
		 else{
			 $('#simpleAC').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
		 }
		 //validation of averageAC ////
		 if( $('#averageAC').val()==""||!validateNumber($('#averageAC').val()))
		 {	
			 flag=false;
			 altMsg+="Enter valid average actor! \n";
			 $('#averageAC').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
			 
		 }
		 else{
			 $('#averageAC').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
		 }
		 //validation of complexAC ////
		 if( $('#complexAC').val()==""||!validateNumber($('#complexAC').val()))
		 {	
			 flag=false;
			 altMsg+="Enter valid complex actor! \n";
			 $('#complexAC').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
			 
		 }
		 else{
			 $('#complexAC').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
		 }
		 ///////////////////////////VALIDATIONFOR FOR 13 TECHNICAL FACTORS ///////////////////////////////
		  //validation of T1 ////
		 if( $('#t1').val()==""||!validateFactors($('#t1').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of T1! \n";
			 $('#t1').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		 else{
			 $('#t1').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
		 }
		  //validation of T2 ////
		 if( $('#t2').val()==""||!validateFactors($('#t2').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of T2! \n";
			 $('#t2').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		 else{
			 $('#t2').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
		 }
		  //validation of T3 ////
		 if( $('#t3').val()==""||!validateFactors($('#t3').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of T3! \n";
			 $('#t3').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		 else{
			 $('#t3').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
		 }
		  //validation of T4 ////
		 if( $('#t4').val()==""||!validateFactors($('#t4').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of T4! \n";
			 $('#t4').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		 else{
			 $('#t4').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
		 }
		  //validation of T5 ////
		 if( $('#t5').val()==""||!validateFactors($('#t5').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of T5! \n";
			 $('#t5').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		 else{
			 $('#t5').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
		 }
		  //validation of T6 ////
		 if( $('#t6').val()==""||!validateFactors($('#t6').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of T6! \n";
			 $('#t6').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		 else{
			 $('#t6').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
		 }
		  //validation of T7 ////
		 if( $('#t7').val()==""||!validateFactors($('#t7').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of T7! \n";
			 $('#t7').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		 else{
			 $('#t7').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
		 }
		  //validation of T8 ////
		 if( $('#t8').val()==""||!validateFactors($('#t8').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of T8! \n";
			 $('#t8').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		 else{
			 $('#t8').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
		 }
		  //validation of T9 ////
		 if( $('#t9').val()==""||!validateFactors($('#t9').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of T9! \n";
			 $('#t9').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		 else{
			 $('#t9').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
		 }
		  //validation of T10 ////
		 if( $('#t10').val()==""||!validateFactors($('#t10').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of T10! \n";
			 $('#t10').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		 else{
			 $('#t10').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
		 }
		  //validation of T11 ////
		 if( $('#t11').val()==""||!validateFactors($('#t11').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of T11! \n";
			 $('#t11').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		 else{
			 $('#t11').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
		 }
		  //validation of T12 ////
		 if( $('#t12').val()==""||!validateFactors($('#t12').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of T12! \n";
			 $('#t12').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		 else{
			 $('#t12').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
		 }
		  //validation of T13 ////
		 if( $('#t13').val()==""||!validateFactors($('#t13').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of T13! \n";
			 $('#t13').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		 else{
			 $('#t13').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
		 }
		 ///////////////////////////VALIDATIONFOR FOR 8 ENVIRONMENTAL FACTORS ///////////////////////////////
		  //validation of E1 ////
		 if( $('#e1').val()==""||!validateFactors($('#e1').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of E1! \n";
			 $('#e1').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		 else{
			 $('#e1').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
		 }
		  //validation of E2 ////
		 if( $('#e2').val()==""||!validateFactors($('#e2').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of E2! \n";
			 $('#e2').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		 else{
			 $('#e2').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
		 }
		  //validation of E3 ////
		 if( $('#e3').val()==""||!validateFactors($('#e3').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of E3! \n";
			 $('#e3').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		 else{
			 $('#e3').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
		 }
		  //validation of E4 ////
		 if( $('#e4').val()==""||!validateFactors($('#e4').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of E4! \n";
			 $('#e4').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		 else{
			 $('#e4').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
		 }
		  //validation of E5 ////
		 if( $('#e5').val()==""||!validateFactors($('#e5').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of E5! \n";
			 $('#e5').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		 else{
			 $('#e5').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
		 }
		  //validation of E6 ////
		 if( $('#e6').val()==""||!validateFactors($('#e6').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of E6! \n";
			 $('#e6').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		 else{
			 $('#e6').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
		 }
		  //validation of E7 ////
		 if( $('#e7').val()==""||!validateFactors($('#e7').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of E7! \n";
			 $('#e7').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		 else{
			 $('#e7').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
		 }
		  //validation of E8 ////
		 if( $('#e8').val()==""||!validateFactors($('#e8').val()))
		 {
			 flag=false;
			 altMsg+="Enter valid value of E8! \n";
			 $('#e8').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
		 }
		 else{
			 $('#e8').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
		 }
		  if(flag){
		  
		  UCPcalculate();
		     $('#modal2').modal('hide');
	}
		 else{
			 
			 alert(altMsg);
		 }
	
});
	  
//////////////////////////////////////////////////////
///////////////////////////////////////////////////
///////////////////////////////////////////////////////
////////////////////////////	
	  
	  
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
		
	 
		if(val=='Completed')
		
		{
				$('#add1').prop('disabled', false);	
			$('#add2').prop('disabled', false);	
			$('#add3').prop('disabled', false);	
			$('#cost4').prop('disabled', false);	
			$('#FunctionPoint').prop('disabled', false);	
			$('#UCP').prop('disabled', false);	
			$('#size').prop('readonly', true);	
 
			$('#FunctionPoint').prop('readonly', true);	
			$('#UCP').prop('readonly', true);	
			$('#size').prop('readonly', true);	
			$("#FunctionPoint").prop('required',true);
				$("#UCP").prop('required',true);
				$("#size").prop('required',true);
							
		}
		else{
			$('#add1').prop('disabled', 'disabled');
			    $('#add2').prop('disabled', 'disabled');
			    $('#add3').prop('disabled', 'disabled');
			     $('#cost4').prop('disabled', 'disabled');
			    $('#FunctionPoint').prop('disabled', 'disabled');
			    $('#UCP').prop('disabled', 'disabled');
			     $('#size').prop('disabled', 'disabled');
			 
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
        $('#add_data_Modal22').modal('hide');  
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
			 
			   var alertMsg='';
		var flag=true;
	 event.preventDefault(); 
	 
	  
	   if($("#deadline22").val() < $("#curDate2").val()){
		 
	 alertMsg+='Please enter valid deadline'+ '\n';
	 flag=false;
	 $('#deadline22').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
	 
	}
	  
	  if($("#startDate").val()!=''){
	 if($("#startDate").val() < $("#curDate2").val()){
		
	 alertMsg+='Project Regestration Date is'+$("#curDate2").val()+'\nPlease enter valid start date'+ '\n';
	 flag=false;
	 $('#startDate').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
	 
	}
	  if($("#startDate").val() > $("#deadline22").val()){
		
	 alertMsg+='Please enter valid dates'+ '\n';
	 flag=false;
	 $('#startDate').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
	 
	}
	    
	  }
		if(flag)
     {  
               $.ajax({  
                   url:'projectValidation.php',  
                   method:'POST',  
                   data:new FormData(this),  
                   contentType:false,  
                   
                   processData:false,  
                   success:function(data)   
                   {  
				    
				   
				   if($.trim(data) =='0')  {
		   alert("Projects Tasks In Progress so status can not be updated");
					    ('#insert').val('Update');	 
						}
				     else if($.trim(data) =='1')  {
		   alert("Projects Tasks In Progress so Project can not be Assigned");
					    ('#insert').val('Update');
						}
					else	if($.trim(data) =='2'){
			  alert("Enter Valid Deadline");
			 $('#deadline').css({ "border": '#ccc 1px solid',"-webkit-border-radius":'4px'," -moz-border-radius":'4px'," border-radius":'4px',"-webkit-box-shadow":'0px 0px 4px #FF0000',"-moz-box-shadow":'0px 0px 4px #FF0000',"box-shadow":'0px 0px 4px #FF0000'});
	        ('#insert').val('Update');
						}
						else if($.trim(data) =='yes'){
							
							   projectUpdate();
						}
				    
                   }  
             	 }); 
	 
	 
	 
	 }

else{
		 $('#insert').val('Update'); 
		 alert(alertMsg);
	    count1++;
	}



	 
         });
		 
 	
   ///////////////////////////
   
 function  projectUpdate(){
	   $('#insert').val('Updating..'); 
	    var form = $('#insert_form1')[0]; // You need to use standard javascript object here
var formData = new FormData(form);
$.ajax({  
                   url:'projectUpdate.php',  
                   method:'POST',  
                   data:formData,  
                   contentType:false,  
                   
                   processData:false,  
                   success:function(data)  
                   {  
				    $('#insert').val('Update'); 
                       alert(data);
						location.href = 'project.php';
                   }  
             	 });
	 
	   
	   
   }
   
   
     $('.edit_data').click(function(){ 
			
           
			if(count1>1){										
             
                $('#deadline').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });

			    $('#startDate').css({ "border": '#ccc 1px solid', "outline": 'none',"-webkit-box-shadow":'0px 0px 4px #FFFFFF',"-moz-box-shadow":'0px 0px 4px #FFFFFF',"box-shadow":'0px 0px 4px #FFFFFF' });
}
  
   	  });    
   
   
   
   
   
  
   
   
     $(document).on('click', '.delete_data', function(){
     //$('#dataModal').modal();
     var proj_id = $(this).attr("id");
    
  
    $.ajax({
      url:"projectDeleteValidation.php",
      method:"POST",
      data:{proj_id:proj_id},
      success:function(data){
		  
		  	 
		  if($.trim(data) =='no') 
			  {
				  alert('Task are Assigned so it can not be deleted');
				  
			  }
		  else if ($.trim(data) =='cmp'){
			  
       if(confirm("The Project is completed and it may effect the team history and project estimation\nAre you sure you want to delete this?")){
		   deleteCmpProj(proj_id);
		   
	   }
	   
	   else{
		   return false;
	    }
    
		  }
		  else if($.trim(data) =='pen'){
			  
			  deleteProj(proj_id);
			  
		  } 
      
      }
   });
   
    });
    
	
	function deleteProj(proj_id){
     
     
   if(confirm("Are you sure you want to delete this?")){ 
   	$(".panel-body").prepend('<div id="loadingDiv"> </div>');   
    $.ajax({
      url:"projectDelete.php",
      method:"POST",
      data:{proj_id:proj_id},
      success:function(data){
		  	$("#loadingDiv").hide();
		  if($.trim(data) =='no') 
			  {
				  alert('Task are Assigned so it can not be deleted')
				  
			  }
		  else{
       
      $('#employee_table').html(data);
		  }
      
      }
   });
   }
   else 
   	return false;
   }
  function deleteCmpProj(proj_id){
     
     
   
   	$(".panel-body").prepend('<div id="loadingDiv"> </div>');   
    $.ajax({
      url:"projectDelete.php",
      method:"POST",
      data:{proj_id:proj_id},
      success:function(data){
		  	$("#loadingDiv").hide();
		  if($.trim(data) =='no') 
			  {
				  alert('Task are Assigned so it can not be deleted')
				  
			  }
		  else{
       
      $('#employee_table').html(data);
		  }
      
      }
   });
    
   }   
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
	  	    
	  $("#projectDetails").modal('show');
   
  var responsedata = $.parseJSON(data);

        projectChart(proj_id);
	    $('#employee_detail88').html(responsedata[2]);
		  $('#task_count').html(responsedata[0]);
	    $('#subtask_count').html(responsedata[1]);
	    $('#employee_detail0').html(responsedata[3]);
	       $('#comlete_task_count').html(responsedata[6]);
	    $('#comlete_subtask_count').html(responsedata[7]);
		 $('#metric_data').html(responsedata[8]);
		 
	   if($.trim(responsedata[5]) ==='Days Ago'){
	   $('#days').html(responsedata[4]);
	     $('#lab').html(responsedata[5]);
	   }
	   else{
		   $('#days').html(responsedata[4]);
		    $('#lab').html('Days Remaining');
	   }
	   	 $("#loadingDiv").hide();
      }
     }); 

    });
   	 function projectChart(proj_id){
	$.ajax({
      url:"projectChart.php",
      method:"POST",
	  
      data:{proj_id:proj_id},
      success:function(data2){
	   
	
		    if($.trim(data2) ==='No')  
		  { 
	    
	  }  
       else{ $('#employee_detail3').html(data2);  }
	
         
		 
      }
	    
     });} 	
		$(document).on('click', '#in_prog', function(){
		 
		 
		  var employee_id = $(this).attr("id");
              $.ajax({  
                   url:"inProgress_proj.php",  
                   method:"POST",  
                   data:{employee_id:employee_id},  
                  
                   success:function(data){  
                     
				    $('#employee_table').html(data);
                   }  
    });
}); 
    $(document).on('click', '#completed_proj', function(){
     
		  var employee_id = $(this).attr("id");
              $.ajax({  
                   url:"completed_proj.php",  
                   method:"POST",  
                   data:{employee_id:employee_id},  
                  
                   success:function(data){  
                    
				    $('#employee_table').html(data);
                   }  
    });
});	
	  $(document).on('click', '#not_strted', function(){
     
		  var employee_id = $(this).attr("id");
              $.ajax({  
                   url:"not_started_proj.php",  
                   method:"POST",  
                   data:{employee_id:employee_id},  
                  
                   success:function(data){  
                    
				    $('#employee_table').html(data);
                   }  
    });
});	
	
	$(document).on('click', '#total_proj', function(){
$("#yyy").prepend('<div id="loadingDiv"> </div>');   
     var employee_id = $(this).attr("id");
     $.ajax({
      url:"total_proj.php",
      method:"POST",
      data:{},
      success:function(data){
		  $("#loadingDiv").fadeOut();
       $('#employee_table').html(data);
      
      }
     });
    });
	
	
	
	
	
	
	
    var table = $('#example1').DataTable( {
        responsive: true
    } );
 
    new $.fn.dataTable.FixedHeader( table );

   });
   //////////////////////////////////////////////////////////
   /////////////////////////////////////////////////////////
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