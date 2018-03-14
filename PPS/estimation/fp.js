function calculate()
          {
		  //calculating external inputs//
             var eip1 = document.FPform.ExternalInputs.value;
             var eip2 = document.FPform.EIp.value;
             var eip3 = parseInt(eip1) * parseInt(eip2);
             document.getElementById('EIp_display').value = eip3;
		//calculating external outputs
			 var eop1 = document.FPform.ExternalOutputs.value;
             var eop2 = document.FPform.EOp.value;
             var eop3 = parseInt(eop1) * parseInt(eop2);
             document.getElementById('EOp_display').value = eop3;
		//calculating external inquiries
			 var eiq1 = document.FPform.ExternalInquiries.value;
             var eiq2 = document.FPform.EIq.value;
             var eiq3 = parseInt(eiq1) * parseInt(eiq2);
             document.getElementById('EIq_display').value = eiq3;
		//calculating internal logical files 
			 var ilf1 = document.FPform.InternalLogicalFiles.value;
             var ilf2 = document.FPform.ILF.value;
             var ilf3 = parseInt(ilf1) * parseInt(ilf2);
             document.getElementById('ILF_display').value = ilf3;
		//calculating external interface files 
			 var eif1 = document.FPform.ExternalInterfaceFiles.value;
             var eif2 = document.FPform.EIF.value;
             var eif3 = parseInt(eif1) * parseInt(eif2);
             document.getElementById('EIF_display').value = eif3;		 
		// display count total 
		var count=eip3+eop3+eiq3+ilf3+eif3;
			
		//count 14 factors
		var F1 = document.FPform.f1.value;
		var F2 = document.FPform.f2.value;
		var F3 = document.FPform.f3.value;
		var F4 = document.FPform.f4.value;
		var F5 = document.FPform.f5.value;
		var F6 = document.FPform.f6.value;
		var F7 = document.FPform.f7.value;
		var F8 = document.FPform.f8.value;
		var F9 = document.FPform.f9.value;
		var F10 = document.FPform.f10.value;
		var F11 = document.FPform.f11.value;
		var F12 = document.FPform.f12.value;
		var F13 = document.FPform.f13.value;
		var F14 = document.FPform.f14.value;
		var factor=0;
		factor=parseInt(F1)+parseInt(F2)+parseInt(F3)+parseInt(F4)+parseInt(F5)+parseInt(F6)+parseInt(F7)+parseInt(F8)+parseInt(F9)+parseInt(F10)+parseInt(F11)+parseInt(F12)+parseInt(F13)+parseInt(F14);
		
		
		// calculating function points 
		var fp=count*(0.65+0.01*factor);
		document.getElementById('FunctionPoint').value = fp.toFixed(3);
		
		
		
          }
		  
		  
		  function estimate()
          {
			    var fp=document.getElementById('function_point').value;
				
				var language=document.getElementById('language').value;
				var rate=document.getElementById('rate').value;
				var size=(parseInt(fp)*parseInt(language));
				var effortprod=document.getElementById('effort_Productivity').value
				var durationprod=document.getElementById('duration_Productivity').value
				size=(size/1000).toPrecision(3);
				document.getElementById("myTable1").rows[3].cells[1].innerHTML = size;
				var effort;
				var time;
				 effort=parseFloat(fp)*parseFloat(effortprod);
			  time=parseFloat(fp)*parseFloat(durationprod);
				var cost=parseFloat(effort)*parseFloat(rate);
			  
			  
			  document.getElementById("myTable1").rows[1].cells[1].innerHTML = effort.toFixed(2);	
		
			  document.getElementById("myTable1").rows[2].cells[1].innerHTML =time.toFixed(2);
		
		
			  document.getElementById("myTable1").rows[4].cells[1].innerHTML =cost.toFixed(0);
			  
			  
			  //////assigninig values to hidden type to send to the modal//
			  document.getElementById("functionPoint").value=parseFloat(fp).toFixed(2);
			  document.getElementById("fpEffort").value=effort.toFixed(2);
			  document.getElementById("fpSize").value=parseFloat(size).toFixed(3)	;
			  document.getElementById("fpCost").value=cost.toFixed(0);
			  document.getElementById("fpDuration").value=time.toFixed(2);
			  
			 
			  
		  }
		  
		
					function eipMul() { 
					 var num1 = document.getElementById('ExternalInputs').value; 
					 var num2 = document.FPform.EIp.value;
					document.getElementById('EIp_display').value=parseInt(num1)*parseInt(num2);
					
					
					
					
					}
					function eoMul() { 
					 var num1 = document.getElementById('ExternalOutputs').value; 
					 var num2 = document.FPform.EOp.value;
					document.getElementById('EOp_display').value=parseInt(num1)*parseInt(num2);
					
					
					
					
					}
					
					function eiMul() { 
					 var num1 = document.getElementById('ExternalInquiries').value; 
					 var num2 = document.FPform.EIq.value;
					document.getElementById('EIq_display').value=parseInt(num1)*parseInt(num2);
					
					
					
					
					}
					
					function ilMul() { 
					 var num1 = document.getElementById('InternalLogicalFiles').value; 
					 var num2 = document.FPform.ILF.value;
					document.getElementById('ILF_display').value=parseInt(num1)*parseInt(num2);
					
					
					
					
					}
					
					function efMul() { 
					 var num1 = document.getElementById('ExternalInterfaceFiles').value; 
					 var num2 = document.FPform.EIF.value;
					document.getElementById('EIF_display').value=parseInt(num1)*parseInt(num2);
					
					
					
					
					}
				
		  