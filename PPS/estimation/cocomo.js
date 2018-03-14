function calculated()
{
	var fp=document.getElementById('function_point').value;
	var method=document.getElementById('method').value;
	var language=document.getElementById('language').value
	var rate=document.getElementById('rate').value;
	var size=(parseInt(fp)*parseInt(language));
	size=(size/1000).toPrecision(3);;
	var effort;
	var time;
	document.getElementById("myTable1").rows[3].cells[1].innerHTML = size;
	
	if(method=="organic")
	{
		effort=2.4*( Math.pow(parseFloat(size),1.05));
		
		document.getElementById("myTable1").rows[1].cells[1].innerHTML = effort.toFixed(2);	
		time=2.5*( Math.pow(parseFloat(effort),0.35));
		document.getElementById("myTable1").rows[2].cells[1].innerHTML =time.toFixed(2);;
		
		var cost=parseFloat(effort)*parseFloat(rate);
	document.getElementById("myTable1").rows[4].cells[1].innerHTML =cost.toFixed(0);;
		
	}
	else if(method=="sdm")
	{
		effort=3.0*( Math.pow(parseFloat(size),1.12));
		
		document.getElementById("myTable1").rows[1].cells[1].innerHTML = effort.toFixed(2);
		time=2.5*( Math.pow(parseFloat(effort),0.35));
		document.getElementById("myTable1").rows[2].cells[1].innerHTML =time.toFixed(2);;
		var cost=parseFloat(effort)*parseFloat(rate);
	document.getElementById("myTable1").rows[4].cells[1].innerHTML =cost.toFixed(0);;
	}
	else if(method=="em")
	{
		effort=3.6*( Math.pow(parseFloat(size),1.20));
		
		document.getElementById("myTable1").rows[1].cells[1].innerHTML = effort.toFixed(2);
		time=2.5*( Math.pow(parseFloat(effort),0.32));
		document.getElementById("myTable1").rows[2].cells[1].innerHTML =time.toFixed(2);;
		var cost=parseFloat(effort)*parseFloat(rate);
	document.getElementById("myTable1").rows[4].cells[1].innerHTML =cost.toFixed(0);;
	}
	
		
	/////starting duration distribution here//////
	
	
	var small=document.getElementById('small').value;
	var inter=document.getElementById('inter').value;
	var medium=document.getElementById('medium').value;
	var large=document.getElementById('large').value;
	
	if(size <=parseFloat(small))
	{
		
		document.getElementById("myTable").rows[1].cells[1].innerHTML=(effort*0.24).toFixed(3);
		document.getElementById("myTable").rows[2].cells[1].innerHTML=(effort*0.24).toFixed(3);
		document.getElementById("myTable").rows[3].cells[1].innerHTML=(effort*0.32).toFixed(3);
		document.getElementById("myTable").rows[4].cells[1].innerHTML=(effort*0.20).toFixed(3);
	}
	else if(size <=parseFloat(inter))
	{
		document.getElementById("myTable").rows[1].cells[1].innerHTML=(effort*0.25).toFixed(3);
		document.getElementById("myTable").rows[2].cells[1].innerHTML=(effort*0.22).toFixed(3);
		document.getElementById("myTable").rows[3].cells[1].innerHTML=(effort*0.30).toFixed(3);
		document.getElementById("myTable").rows[4].cells[1].innerHTML=(effort*0.23).toFixed(3);
		
	}
	else if(size <=parseFloat(medium))
	{
		document.getElementById("myTable").rows[1].cells[1].innerHTML=(effort*0.26).toFixed(3);
		document.getElementById("myTable").rows[2].cells[1].innerHTML=(effort*0.21).toFixed(3);
		document.getElementById("myTable").rows[3].cells[1].innerHTML=(effort*0.27).toFixed(3);
		document.getElementById("myTable").rows[4].cells[1].innerHTML=(effort*0.26).toFixed(3);
		
	}
	else if(size <=parseFloat(large))
	{
		document.getElementById("myTable").rows[1].cells[1].innerHTML=(effort*0.27).toFixed(3);
		document.getElementById("myTable").rows[2].cells[1].innerHTML=(effort*0.19).toFixed(3);
		document.getElementById("myTable").rows[3].cells[1].innerHTML=(effort*0.25).toFixed(3);
		document.getElementById("myTable").rows[4].cells[1].innerHTML=(effort*0.29).toFixed(3);
		
	}
	else 
	{
		document.getElementById("myTable").rows[1].cells[1].innerHTML=(effort*0.28).toFixed(3);
		document.getElementById("myTable").rows[2].cells[1].innerHTML=(effort*0.18).toFixed(3);
		document.getElementById("myTable").rows[3].cells[1].innerHTML=(effort*0.22).toFixed(3);
		document.getElementById("myTable").rows[4].cells[1].innerHTML=(effort*0.32).toFixed(3);
		
	}
	
	
	/////storing values for 
	
	document.getElementById('effort').value=document.getElementById("myTable1").rows[1].cells[1].innerHTML;
	document.getElementById('cost').value=document.getElementById("myTable1").rows[4].cells[1].innerHTML;
	document.getElementById('duration').value=document.getElementById("myTable1").rows[2].cells[1].innerHTML;
	document.getElementById('size').value=document.getElementById("myTable1").rows[3].cells[1].innerHTML;
	document.getElementById('pDesign').value=document.getElementById("myTable").rows[1].cells[1].innerHTML;
	document.getElementById('dDesign').value=document.getElementById("myTable").rows[2].cells[1].innerHTML;
	document.getElementById('cut').value=document.getElementById("myTable").rows[3].cells[1].innerHTML;
	document.getElementById('it').value=document.getElementById("myTable").rows[4].cells[1].innerHTML;
	
	
	
	
	
	
	
	
}