<html>

<body>

<div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Emperical Estimation 
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-calculator" aria-hidden="true"></i> Estimation
                            </li>
							<li class ="active"> Function Point size calculation </li>
							<li class ="active"> Emperical Estimation </li>
                        </ol>
                    </div>
                </div>

<?php

	$f=$_REQUEST['FP'];
	$language=$_REQUEST['Language'];
	$type=$_REQUEST['Type'];
	$rate=$_REQUEST['Rate'];
	//echo $f;
		//echo $language;
			//echo $type;
			//	echo $rate;
			
			include("config.php");
			$query = "SELECT * FROM language where languageId= '".$language."'"; 
			$result = mysqli_query($connect, $query);
			$row = mysqli_fetch_array($result);
			
			//echo ($row[1]);
			//echo ($row[2]);
	
?>

<input type="hidden" id="function_point" value="">
<input type="hidden" id="language" value="">
<input type="hidden" id="languageId" value="">
<input type="hidden" id="rate" value="">
<input type="hidden" id="method" value="">


<script>
 var fp = '<?php echo $f; ?>';
document.getElementById('function_point').value =  fp ;

var languageId = '<?php echo $language; ?>';
document.getElementById('languageId').value =  languageId ;

var lan = '<?php echo $row[2]; ?>';
document.getElementById('language').value =  lan ;

var rate = '<?php echo $rate; ?>';
document.getElementById('rate').value =  rate ;

var type = '<?php echo $type; ?>';
document.getElementById('method').value =  type ;



</script>

<?php

	
	//querey for getting the project size eg large, small, medium etc
			
			include("config.php");
			$query = "SELECT * FROM projectsize "; 
			$result = mysqli_query($connect, $query);
			$array=array();
			$i=0;
			while($row = mysqli_fetch_array($result)){
				
				$array[$i]=$row[1];		//assigning size to the array
				//echo ($array[$i]);
				$i++;
				
			}
		
	
?>

<input type="hidden" id="small" value="">
<input type="hidden" id="inter" value="">
<input type="hidden" id="medium" value="">
<input type="hidden" id="large" value="">


<script>
 var small = '<?php echo $array[0]; ?>';
document.getElementById('small').value =  small ;

var inter = '<?php echo $array[1]; ?>';
document.getElementById('inter').value =  inter ;

var medium = '<?php echo $array[2]; ?>';
document.getElementById('medium').value =  medium ;

var large = '<?php echo $array[3]; ?>';
document.getElementById('large').value =  large ;



</script>









<script
 type="text/javascript" src ="ee.js">
         
		 	
	
		
        </script>
		 
		
		
		
		
		
		
		<div class="row"><div id="result"> </div>
		<div  class="col-lg-5 col-sm-6 col-md-6">
		
			<div class="well">
			
			 <table  id="myTable1" class="table table-hover">
			  <center><h4>Project Estimation</h4></center>
			
					<select id="methods" name="methods" class="form-control" onchange="cal()"  >
						<option value="" disabled selected>estimate with another model</option>
						<option value="WF">Walston-Felix model</option>
						<option value="BB" >Bailey-Basili model</option>
						<option value="BS" >Boehm simple model</option>
						<option value="DM" >Doty model for KLOC</option>
					</select>
    <thead>
      <tr>
        <th>Fields</th>
        <th>Estimated Values</th>
        
      </tr>
    </thead>
    <tbody>
    <tr> <td>Effort (person  month)</td> <td></td></tr>
	<tr> <td>Duration (months)</td> <td></td></tr>
       <tr> <td>Size (KLOC)</td> <td></td></tr>
       <tr> <td>Cost </td> <td></td></tr>
	  
    </tbody>
  </table>
  </div>
			
			
			
			</div>
		
		<div  class="col-lg-5 col-sm-6 col-md-6">
		
			
   
			
			<div class="well">
			 <table  id="myTable" class="table table-hover">
			 <center><h4>Schedule Distribution</h4></center>
			<select id="methods" name="methods" class="form-control" onchange="cal()" style="visibility: hidden;" >
						<option value="" disabled selected>estimate with another model</option>
						
					</select>
    <thead>
      <tr>
        <th>Phases</th>
        <th>Duration (months) </th>
        
      </tr>
    </thead>
    <tbody>
    <tr> <td>Product Design</td> <td></td></tr>
	 <tr> <td>Detailed Design</td> <td></td></tr>
       <tr> <td>Code & Unit Test</td> <td></td></tr>
       <tr> <td>Integration & Test</td> <td></td></tr>
	  
    </tbody>
  </table>
			</div>
			
			
		
		</div>
 
		
			
		
		<div  class="col-lg-2 col-sm-8 col-md-6">
		<div class="row">
			 <div  class="col-lg-12 col-sm-8 col-md-8">
			<button id="addMetric" class="btn btn-success btn-block"  "><i class="fa fa-plus-circle" aria-hidden="true"></i> Add to Project</button>
			</div>
		</div>
		<br>
		<div class="row">
			 <div  class="col-lg-12 col-sm-8 col-md-8">
			<button type="button" onClick="window.location.reload();" class="btn btn-info btn-block"><i class="fa fa-refresh" aria-hidden="true"></i> Re-Estimate</button>
		</div>
		</div>
		</div>
		</div>
	<script>
	function cal() {
    document.getElementById('method').value =document.getElementById('methods').value ;
calculated();
}

</script>
		
		<input type="hidden" id="effort" value=""><br>
		<input type="hidden" id="cost" value=""><br>
		<input type="hidden" id="duration" value=""><br>
		<input type="hidden" id="size" value=""><br>
		<input type="hidden" id="pDesign" value=""><br>
		<input type="hidden" id="dDesign" value=""><br>
		<input type="hidden" id="cut" value=""><br>
		<input type="hidden" id="it" value="">	<br>
		</body>
		</html>
	
		