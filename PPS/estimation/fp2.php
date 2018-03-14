<html>

<body>

<div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Function Point Estimation
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-calculator" aria-hidden="true"></i> Estimation
                            </li>
							<li class ="active"> Function Point size calculation </li>
							<li class ="active"> Function Point Estimation </li>
                        </ol>
                    </div>
                </div>

<?php

	$f=$_REQUEST['FP'];
	$language=$_REQUEST['Language'];
	
	$rate=$_REQUEST['Rate'];
	//echo $f;
		//echo $language;
			//echo $type;
			//	echo $rate;
			$effort=array();
			$duration=array();
			include("config.php");
			$query = "SELECT * FROM language where languageId= '".$language."'"; 
			$result = mysqli_query($connect, $query);
			$row = mysqli_fetch_array($result);
			
			$query11 = "SELECT * FROM project where languageId='".$language."' AND projStatus='Completed' "; 
			$result11 = mysqli_query($connect, $query11);
			$i=0;
		
		while($row11 = mysqli_fetch_array($result11))
			{
		
			///fetching effort rate and duration rate
			
			$query1 = "SELECT * FROM metric where pID= '".$row11['projId']."' AND type='actual'";//fetch actual metric
			$result1 = mysqli_query($connect, $query1);
			
			$row1 = mysqli_fetch_array($result1);
		
			
			$query2 = "SELECT * FROM actualmetrics where mID='".$row1['mID']."' "; 
			$result2 = mysqli_query($connect, $query2);
			$row2 = mysqli_fetch_array($result2);
			
			$effort[$i]=$row2['effort']/$row2['fp'];
			
			//$effort[$i]=$row2['fpEffortProd'];
			$duration[$i]=$row2['duration']/$row2['fp'];
			
			
			//$duration[$i]=$row2['fpDurationProd'];
			
			$i++;
			
		}
		
		
		$effortp=0;
		$durationp=0;
					$arrlength=count($effort);
					
					if($arrlength>0)
					{
						for ($x = 0; $x < $arrlength; $x++) 
						{
							$effortp=$effortp+$effort[$x];
							$durationp=$durationp+$duration[$x];
							
							
						}
			$effortp=$effortp/$arrlength;
			$durationp=$durationp/$arrlength;
					}
		//	echo($effortp);
		//	echo($durationp);
			
			
?>




<input type="hidden" id="function_point" value="">
<input type="hidden" id="language" value="">
<input type="hidden" id="languageId" value="">
<input type="hidden" id="rate" value="">
<input type="hidden" id="effort_Productivity" value="">
<input type="hidden" id="duration_Productivity" value="">



<script>
var fp = '<?php echo $f; ?>';
document.getElementById('function_point').value =  fp ;

var languageId = '<?php echo $language; ?>';
document.getElementById('languageId').value =  languageId ;

var lan = '<?php echo $row['LOCperFP']; ?>';
document.getElementById('language').value =  lan ;

var rate = '<?php echo $rate; ?>';
document.getElementById('rate').value =  rate ;

 var ep = '<?php echo $effortp; ?>';
document.getElementById('effort_Productivity').value =  ep ;

var dp = '<?php echo $durationp; ?>';
document.getElementById('duration_Productivity').value =  dp ;


</script>















<script
 type="text/javascript" src ="fp.js">
         
		 	
	
		
        </script>
		 
		
		
		<?php 

		if($arrlength==0)
		{echo '<center><div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <strong>No previous record found for estimation! </strong>
							</div>
                    </div>
                </div><center>';
			
		}
		
		
		
		
?>
		
		
		
		<div class="row">
		<div id="result"> </div>
		<div  class="col-lg-6 col-sm-7 col-md-7">
		
			<div class="well">
			
			
			 <table  id="myTable1" class="table table-hover">
			 <center><h4>Project Estimation</h4></center>
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
	
		
			
		
		
		<div  class="col-lg-3 col-sm-5 col-md-4">
		
		
		<div class="row">
			 <div  class="col-lg-10 col-sm-10 col-md-10">
			
			
			 <?php
			 if( $arrlength==0)
			 {
				 echo' <button id="addMetric" class="btn btn-success btn-block responsive-width" disabled  ><i class="fa fa-plus-circle" aria-hidden="true"></i> Add to Project</button>';
			 }
			 else
			 {
				echo' <button id="addMetric" class="btn btn-success btn-block responsive-width"  ><i class="fa fa-plus-circle" aria-hidden="true"></i> Add to Project</button>';
			 }
			 
			 
			 ?>
			</div>
		</div>
		<br>
		<div class="row">
			 <div  class="col-lg-10 col-sm-10 col-md-10">
					
			<button type="button" onClick="window.location.reload();" class="btn btn-info btn-block"><i class="fa fa-refresh" aria-hidden="true"></i> Re-Estimate</button>
			
			
		</div>
		</div>
		
		</div>
		</div>
		
	<!-- value stored to send to the modal  -->
	<input type="hidden" id="functionPoint" value="">
	<input type="hidden" id="fpEffort" value="">
	<input type="hidden" id="fpSize" value="">
	<input type="hidden" id="fpCost" value="">
	<input type="hidden" id="fpDuration" value="">	
		
		
		
		</body>
		</html>
		
		
		
		
		
		
		
		
		
		
		
		
		