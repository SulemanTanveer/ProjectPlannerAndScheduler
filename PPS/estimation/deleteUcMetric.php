<?php
include("config.php"); 
$query2 = "SELECT mID FROM ucp_metric WHERE ucpID = '".$_POST["Metric_id"]."'"; 
$metricID = mysqli_query($connect, $query2); 

$row = mysqli_fetch_array($metricID);


	$query = "DELETE FROM ucp_metric WHERE ucpID = '".$_POST["Metric_id"]."'";  
	$query1 = "Delete FROM metric WHERE mID = '".$row['mID']."'";  

$result = mysqli_query($connect, $query); 
$result1 = mysqli_query($connect, $query1); 
if($result&&$result1)
{
	echo '<center><div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-check"></i>  <strong>Use Case Point metric deleted </strong>
							</div>
                    </div>
                </div><center>';
}
else
{
	echo '<center><div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-check"></i>  <strong>Problem occured! Try again </strong>	</div>
                    </div>
                </div><center>';
	
	
}


?>

 <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
						    <div class="panel panel-green" >
                            <div class="panel-heading">
                                <h3 class="panel-title"></i>Use CasePoint Estimated Metrics</h3>
                            </div>
                            <div class="panel-body">
                                <!-- /.row -->
					  
<!-- /.row -->
<script>
/// this function will make the project table responsive with live search//	
 $(function(){
    var table = $('#example').DataTable( {
        responsive: true
    } );
 
    
  });	</script>
											<div id="functionPoint_table">	
								
	<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"
	>
    <thead>
            <th>Id</th>
                     <th>Project<br> Name</th>
					 
                    <th>Project<br> Status</th> 
					 <th>Use<br> Case<br>Points</th> 
                     <th>Effort<br>(person <br>months)</th>
					   
                       <th>Duration<br>(months)</th>
					    <th>Size<br>(KLOC)</th>
						 <th>Cost</th>
						
					
						 <th>Actions</th>
                  </tr>
        </thead>
        
        <tbody>
		<?php
		include("config.php");
		$query = "SELECT * FROM ucp_metric";
		$result = mysqli_query($connect, $query);
            
                     while($row = mysqli_fetch_array($result))//fetch fp metric record
					 
                     {
						 $query1 = "SELECT * FROM metric WHERE mID='{$row['mID']}'";
						 $result1 = mysqli_query($connect, $query1);
						 $row1 = mysqli_fetch_array($result1);//fetch metric table record get project id
						 $query2 = "SELECT * FROM project WHERE projId='{$row1['pID']}'";
						 $result2 = mysqli_query($connect, $query2);
						 $row2 = mysqli_fetch_array($result2);//fetching project table record
						 //row contain fp metric record
						 //row1 contain metric record
						 //row2 contain project record
						 
						 
                     ?>
                  <tr>   
                      <td><?php echo $row["ucpID"]; ?></td>
					  <td><?php echo $row2["projName"]; ?></td>
                     <td><?php echo $row2["projStatus"]; ?></td>
					 <td><?php echo $row["ucp"]; ?></td>
                    <td><?php echo $row["effort"]; ?></td>
                    <td><?php echo $row["duration"]; ?></td>  
					  <td><?php echo $row["size"]; ?></td>
                       <td><?php echo $row["cost"]; ?></td>
                   <td><input type="button" name="view" value="view" id="<?php echo $row["ucpID"]; ?>" class="btn btn-warning btn-xs view_data" />
                    
                     <input type="button" name="delete" value="delete" id="<?php echo $row["ucpID"]; ?>" class="btn btn-danger btn-xs delete_ucdata" /></td>
			   
			   </tr>
                  
                  
				  <?php
                     }
                     ?>
			</tbody>
    </table>
	</div>					