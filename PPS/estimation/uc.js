function UPCcalculate()
          {
			  //calculating uucw
			 var uc1 = document.UCform.simpleUC.value;
             var uc2 = document.UCform.averageUC.value;
			 var uc3 = document.UCform.complexUC.value; 
			 
			 
             var uucw = (parseInt(uc1) *5 )+ (parseInt(uc2)*10) +(parseInt(uc3)*15);
           // document.getElementById('totalUUCW').value = uucw; 
			  
			  //calculating uaw
			 var ua1 = document.UCform.simpleAC.value;
             var ua2 = document.UCform.averageAC.value;
			 var ua3 = document.UCform.complexAC.value; 
			 
			 
             var uaw = (parseInt(ua1) *1 )+ (parseInt(ua2)*2) +(parseInt(ua3)*3);
          //   document.getElementById('totalUAW').value = uaw; 
			  
			  //calculating technical factors
			  
			  var t1 = document.UCform.t1.value;
			  var t2 = document.UCform.t2.value;
			  var t3 = document.UCform.t3.value;
			  var t4 = document.UCform.t4.value;
			  var t5 = document.UCform.t5.value;
			  var t6 = document.UCform.t6.value;
			  var t7 = document.UCform.t7.value;
			  var t8 = document.UCform.t8.value;
			  var t9 = document.UCform.t9.value;
			  var t10 = document.UCform.t10.value;
			  var t11 = document.UCform.t11.value;
			  var t12 = document.UCform.t12.value;
			  var t13 = document.UCform.t13.value;
			 
			  var TTF=	(parseInt(t1) *2 )+
						(parseInt(t2) *1 )+
						(parseInt(t3) *1 )+
						(parseInt(t4) *1 )+
						(parseInt(t5) *1 )+
						(parseInt(t6) *0.5 )+
						(parseInt(t7) *0.5 )+
						(parseInt(t8) *2 )+
						(parseInt(t9) *1 )+
						(parseInt(t10) *1 )+
						(parseInt(t11) *1 )+
						(parseInt(t12) *1 )+
						(parseInt(t13) *1 );
						
		//	document.getElementById('totalFactor').value = TTF; 
			var TCF=0.6+(0.01*TTF);
		//	document.getElementById('totalTCF').value = TCF; 			
						
			// calculating environmental factor			
			  var e1 = document.UCform.e1.value;
			  var e2 = document.UCform.e2.value;
			  var e3 = document.UCform.e3.value;
			  var e4 = document.UCform.e4.value;
			  var e5 = document.UCform.e5.value;
			  var e6 = document.UCform.e6.value;
			  var e7 = document.UCform.e7.value;
			  var e8 = document.UCform.e8.value;
						
			var TEF=	(parseInt(e1) *1.5 )+
						(parseInt(e2) *-1 )+
						(parseInt(e3) *0.5 )+
						(parseInt(e4) *0.5 )+
						(parseInt(e5) *1 )+
						(parseInt(e6) *1 )+
						(parseInt(e7) *-1 )+
						(parseInt(e8) *2 );
//				document.getElementById('totalEF').value =TEF;	
			var ecf=	1.4+(-0.03*TEF);	
	//	document.getElementById('ECF').value = ecf;			
						
				//calculatye use case points
					var ucp=uucw*TCF*ecf;
				document.getElementById('UCP').value = ucp.toFixed(3);	
			  
		  }
		  
		  
		  function estimate()
          {
			    var fp=document.getElementById('function_point').value;
				
				var language=document.getElementById('language').value;
				var rate=document.getElementById('rate').value;
				var size=(parseFloat(fp)*parseInt(language));
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
		
			  document.getElementById("myTable1").rows[2].cells[1].innerHTML =time.toFixed(2);;
		
		
			  document.getElementById("myTable1").rows[4].cells[1].innerHTML =cost.toFixed(0);;
			  
			  
			  //////assigninig values to hidden type to send to the modal//
			  document.getElementById("usecasepoint").value=parseFloat(fp).toFixed(2);
			  document.getElementById("ucpEffort").value=effort.toFixed(2);
			  document.getElementById("ucpSize").value=parseFloat(size).toFixed(3)	;
			  document.getElementById("ucpCost").value=cost.toFixed(0);
			  document.getElementById("ucpDuration").value=time.toFixed(2);
			  
			  
			  
			  
			  
			  
			  
		  }
		  
		  
		  
		  
		  