<html>

<body>

<div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Use Case Point Estimation
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-calculator" aria-hidden="true"></i> Estimation
                            </li>
							<li class ="active"> Use Case Point size calculation </li>
							<li class ="active"> Use Case Point Estimation </li>
                        </ol>
                    </div>
                </div>

<?php

	$f=$_REQUEST['UCP'];
	$language=$_REQUEST['Language'];
	
	$rate=$_REQUEST['Rate'];
	// echo $f;
		//echo $language;
			//echo $type;
			//	echo $rate;
			
			include("config.php");
		
			////////////////////////////////////////////////////////////////////////////////////
			//echo ($row[1]);
			//echo ($row[2]);
			///fetching effort rate and duration rate
			$effort=array();
			$duration=array();
			$size=array();
			
			$query = "SELECT * FROM project where languageId='".$language."' AND projStatus='Completed' "; 
			$result = mysqli_query($connect, $query);
			$i=0;
			
			while($row = mysqli_fetch_array($result))
			{
			
			$query1 = "SELECT * FROM metric where pID= '".$row['projId']."' AND type='actual'"; 
			$result1 = mysqli_query($connect, $query1);
			
		    $row1 = mysqli_fetch_array($result1);
		
			
			$query2 = "SELECT * FROM actualmetrics where mID='".$row1['mID']."' "; 
			$result2 = mysqli_query($connect, $query2);
			$row2 = mysqli_fetch_array($result2);
			
			$effort[$i]=$row2['effort']/$row2['ucp'];
			
			//$effort[$i]=$row2['ucpEffortProd'];
			$duration[$i]=$row2['duration']/$row2['ucp'];
			
			//$duration[$i]=$row2['ucpDurationProd'];
			
			$size[$i]=($row2['size']*1000)/$row2['ucp'];
			
			$i++;
			
		}
		
		
		$effortp=0;
		$durationp=0;
		$sizep=0;
					$arrlength=count($effort);
					if($arrlength>0)
					{
						for ($x = 0; $x < $arrlength; $x++) 
						{
							$effortp=$effortp+$effort[$x];
							$durationp=$durationp+$duration[$x];
							$sizep=$sizep+$size[$x];
							
						}
			$effortp=$effortp/$arrlength;
			$durationp=$durationp/$arrlength;
			$sizep=$sizep/$arrlength;
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

var lan = '<?php echo $sizep; ?>';
document.getElementById('language').value =  lan ;

var rate = '<?php echo $rate; ?>';
document.getElementById('rate').value =  rate ;

 var ep = '<?php echo $effortp; ?>';
document.getElementById('effort_Productivity').value =  ep ;

var dp = '<?php echo $durationp; ?>';
document.getElementById('duration_Productivity').value =  dp ;


</script>















<script
 type="text/javascript" src ="uc.js">
         
		 	
	
		
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
		
		
		<div class="row"><div id="result"> </div>
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
	 <tr> <td>Duration(months)</td> <td></td></tr>
       <tr> <td>Size (KLOC)</td> <td></td></tr>
       <tr> <td>Cost </td> <td></td></tr>
	  
    </tbody>
  </table>
				<!-- value stored to send to the modal  -->
	<input type="hidden" id="usecasepoint" value="">
	<input type="hidden" id="ucpEffort" value="">
	<input type="hidden" id="ucpSize" value="">
	<input type="hidden" id="ucpCost" value="">
	<input type="hidden" id="ucpDuration" value="">	
			
			</div>
		</div>
	
		
			
		
		
		<div  class="col-lg-3 col-sm-5 col-md-4">
		
		
		<div class="row">
			 <div  class="col-lg-10 col-sm-10 col-md-10">
			 <?php
			 if( $arrlength==0)
			 {
				 echo' <button id="addMetric" class="btn btn-success btn-block" disabled  ><i class="fa fa-plus-circle" aria-hidden="true"></i> Add to Project</button>';
			 }
			 else
			 {
				echo' <button id="addMetric" class="btn btn-success btn-block"  ><i class="fa fa-plus-circle" aria-hidden="true"></i> Add to Project</button>';
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
		
		</body>
		</html>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		