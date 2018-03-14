////////////////////////////////////
	 $('#lineChart_form').on("submit", function(event){  
	 $('#img2').show();		
     event.preventDefault();  
    var flag=true;
	var alertMsg='';
	
	if($("#to").val()=='' || $("#from").val()==''){
		 $('#img2').hide();	
	 alertMsg+='Please select Years';
	 flag=false;
		 
	}
	if($("#to").val() < $("#from").val()){
		 $('#img2').hide();	
	 alertMsg+='Please select valid Years';
	 flag=false;
		 
	}
		
	if(flag){
     $.ajax({  
       url:"linechart.php",  
       method:"POST",  
	   data:new FormData(this),  
       contentType:false, 
	   processData:false, 
  	   
       success:function(data){  
	   
location.reload();
        
       }  
      }); 

	}
 else{
	 alert(alertMsg);
	
 }
	 	 
    });