////////////////////////////////////////////////////
   ///////////////logout script///////////////////
   /////////////////////////////////////////////////////
	
  $(document).on('click', '#logout', function(){
           var action = "logout";  
		   
           $.ajax({  
                url:"../login.php",  
                method:"POST",  
                data:{action:action},  
                success:function(data)  
                {    
			if($.trim(data) ==='Yes')  
                          {     
                               alert("destroyyyyy");  
								                         
						 }  
                // location.href = "../index.php"
                }  
           });  
      });