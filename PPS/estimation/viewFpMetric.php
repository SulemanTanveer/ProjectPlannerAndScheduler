

<?php  
include("config.php"); 
if(isset($_POST["proj_id"]))
{
 $output = '';
 
 $query = "SELECT * FROM fp_metric WHERE fpID= '".$_POST["proj_id"]."'";
 $result = mysqli_query($connect, $query);
 
 
 
 
?> 
      <style>

	  table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 0px 
    text-align: left;
    padding: 2px;
}


</style> 
<?php
    $row = mysqli_fetch_array($result);
  
		
		 $query1 = "SELECT * FROM metric WHERE mID= '".$row["mID"]."'";
		$result1 = mysqli_query($connect, $query1);
		$row1 = mysqli_fetch_array($result1);
		
		$query2 = "SELECT * FROM project WHERE projId= '".$row1["pID"]."'";
		$result2 = mysqli_query($connect, $query2);
		$row2 = mysqli_fetch_array($result2);
		
		
		if($row2["projStatus"]=='Completed')
		
		{
			$query11 = "SELECT * FROM metric WHERE pID= '".$row1["pID"]."' AND type='actual'";
		$result11 = mysqli_query($connect, $query11);
		$row11 = mysqli_fetch_array($result11);
			
			
			
			$query3 = "SELECT * FROM actualmetrics WHERE mID= '".$row11["mID"]."'";
		$result3 = mysqli_query($connect, $query3);
		$row3 = mysqli_fetch_array($result3);
		}
		
		
		
		?>
		
   
	 
	 
	 <div class="row"> 
	 
	 <div class="col-lg-6 col-sm-6 col-md-6"  >
	 
	 
	 
	
						    <div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h3 class="panel-title"> Metrics Detail</h3>
                            </div>
                            <div class="panel-body">
							<table  >
							
	<tr><th width="40%">						
	 <label> Metric ID  </label></th><td><?php echo $row["fpID"]?></td>
</tr>
<tr>	<th width="40%"> 
	 <label> Metric Type  </label></th><td>Function Point</td>	
	 </tr>
	 <tr>	 <th width="40%">
	 <label> Function Points  </label>	</th><td><?php echo $row["functionPoint"]?></td>
	 </tr>
	 <tr><th width="40%">
	 <label> Estimation Date  </label></th><td><?php echo $row1["regDate"]?></td>
</tr>

	 </table>
	 </div>
	 </div>
	
	 
	 </div>
	 	 
	 
	 <div class="col-lg-6 col-sm-6 col-md-6"  >
	 
	 
						    <div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h3 class="panel-title"></i> Project Detail</h3>
                            </div>
     
                       <div class="panel-body">
	<table>				 
<tr>	<th width="40%"> 
	 <label> Project ID  </label>	</th><td><?php echo $row2["projId"]?></td>

</tr>
<tr>	<th width="40%"> 	 <label> Project Name  </label>	</th><td><?php echo $row2["projName"]?></td>
	</tr>
<tr>	<th width="40%">  <label> Status  </label>	</th><td><?php echo $row2["projStatus"]?></td>
</tr>
<tr>	<th width="40%"> 	 <label> Reg Date </label>	</th><td><?php echo $row2["regDate"]?></td></tr>
</table>
	 </div>
	 </div>
	
	 </div>
	 	 
	 </div>
	 
	
  
  <div class="row">
                    <div class="col-lg-12">
                     
						    <div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h3 class="panel-title"></i>Function Point Estimated Metrics</h3>
                            </div>
                            <div class="panel-body">
  
  
	 <table id="FpMetricDetail" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
	 <tr> <th> </th> <th> Estimated</th><th> Actual</th><th> Difference</th><th>Deviation %</th><th> Result</th> </tr>
	<?php
	if($row2["projStatus"]=='Completed'){
		
	//	$effortD=round(($row["effort"]/$row3["effort"])*100,2);
	//	$durationD=round(($row["duration"]/$row3["duration"])*100,2);
	//	$sizeD=round(($row["size"]/$row3["size"])*100,2);
	//	$costD=round(($row["cost"]/$row3["cost"])*100,2);
		
		$effortD=$row["effort"]-$row3["effort"];
		$durationD=$row["duration"]-$row3["duration"];
		$sizeD=$row["size"]-$row3["size"];
		$costD=$row["cost"]-$row3["cost"];
		
		$effortPD=round(($effortD/$row3["effort"])*100,2);
		$durationPD=round(($durationD/$row3["duration"])*100,2);
		$sizePD=round(($sizeD/$row3["size"])*100,2);
		$costPD=round(($costD/$row3["cost"])*100,2);
		
		
		
		if($effortD>0)
			$effortR='above';
		else if($effortD<0)
			$effortR='below';
		else
			$effortR='equal';
		
		if($durationD>0)
			$durationR='above';
		else if($durationD<0)
			$durationR='below';
		else
			$durationR='equal';
		
		if($sizeD>0)
			$sizeR='above';
		else if($sizeD<0)
			$sizeR='below';
		else
			$sizeR='equal';
		
		if($costD>0)
			$costR='above';
		else if($costD<0)
			$costR='below';
		else
			$costR='equal';
		
		
	
		
	?>

	<tr> <th>Effort (person month) </th> <td><?php echo $row["effort"]?> </td><td> <?php echo $row3["effort"]?></td><td><?php echo $effortD ?> </td><td><?php echo $effortPD.' %'; ?></td><td> <?php echo $effortR ?></td> </tr>
	 
	 
	 <tr> <th>Duration (months) </th> <td> <?php echo $row["duration"]?></td><td> <?php echo $row3["duration"]?></td><td> <?php echo $durationD ?></td><td><?php echo $durationPD.' %'; ?></td><td> <?php echo $durationR ?></td> </tr>
	 
	 
	 <tr> <th>Size (KLOC) </th> <td> <?php echo $row["size"]?></td><td> <?php echo $row3["size"]?></td><td> <?php echo $sizeD ?></td><td><?php echo $sizePD.' %'; ?></td><td> <?php echo $sizeR ?></td> </tr>
	 
	 
	 <tr> <th>Cost (Rupees)</th> <td> <?php echo $row["cost"]?></td><td> <?php echo $row3["cost"]?></td><td> <?php echo $costD ?></td><td><?php echo $costPD.' %'; ?></td><td> <?php echo $costR ?></td> </tr>
	 <?php 
	}
	else
	{
	 ?>
	 <tr> <th>Effort (person month) </th> <td><?php echo $row["effort"]?> </td><td> --</td><td> --</td><td> --</td><td> --</td> </tr>
	 
	 
	 <tr> <th>Duration (months) </th> <td> <?php echo $row["duration"]?></td><td> --</td><td> --</td><td> --</td><td> --</td> </tr>
	 
	 
	 <tr> <th>Size (KLOC)</th> <td> <?php echo $row["size"]?></td><td>-- </td><td> --</td><td> --</td><td> --</td> </tr>
	 
	 
	 <tr> <th>Cost (Rupees)</th> <td> <?php echo $row["cost"]?></td><td>-- </td><td> --</td><td> --</td><td> --</td> </tr>
	 
	 <?php
	}
	 ?>
	 
	 
	 </table>
	 </div>
	  
	 
	 </div>
	
	 </div>
	 
	 
	 
 
	 
	 
	
  <?php
}
?>