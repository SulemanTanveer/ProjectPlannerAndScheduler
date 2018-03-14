<?php
?>
 <div class="row">
                    <div class="col-lg-12">
                       
						    <div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h3 class="panel-title"></i>Function Point Estimated Metrics</h3>
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
            <tr> <th>Id</th>
                     <th>Project<br> Name</th>
					 
                    
                    
					   <th>Project<br> Status</th> 
					   <th>Project<br>Language</th>
					    <th>Function<br> Points</th> 
						 <th>Effort<br>(person<br> months)</th>
                       <th>Duration<br>(months)</th>
					    <th>Size<br>(KLOC)</th>
						 <th>Cost</th>
						
						
						 <th>Actions</th>
                  </tr>
        </thead>
        
        <tbody>
		<?php
		include("config.php");
		$query = "SELECT * FROM fp_metric";
		$result = mysqli_query($connect, $query);
            
                     while($row = mysqli_fetch_array($result))//fetch fp metric record
					 
                     {
						 $query1 = "SELECT * FROM metric WHERE mID='{$row['mID']}'";
						 $result1 = mysqli_query($connect, $query1);
						 $row1 = mysqli_fetch_array($result1);//fetch metric table record get project id
						 $query2 = "SELECT * FROM project WHERE projId='{$row1['pID']}'";
						 $result2 = mysqli_query($connect, $query2);
						 $row2 = mysqli_fetch_array($result2);//fetching project table record
						 $query3 = "SELECT * FROM language WHERE languageId='{$row2['languageId']}'";
						 $result3 = mysqli_query($connect, $query3);
						 $row3 = mysqli_fetch_array($result3);//fetching language record
						 
						 
						 
						 
						 //row contain fp metric record
						 //row1 contain metric record
						 //row2 contain project record
						 
						 
                     ?>
                  <tr>   
                      <td><?php echo $row["fpID"]; ?></td>
					  <td><?php echo $row2["projName"]; ?></td>
                     <td><?php echo $row2["projStatus"]; ?></td>
					 <td><?php echo $row3["languageName"]; ?></td>
					 <td><?php echo $row["functionPoint"]; ?></td>
                    <td><?php echo $row["effort"]; ?></td>
                    <td><?php echo $row["duration"]; ?></td>  
					  <td><?php echo $row["size"]; ?></td>
                       <td><?php echo $row["cost"]; ?></td>
                   <td><button type="button" name="view" value="view" id="<?php echo $row["fpID"]; ?>" class="btn btn-warning btn-xs view_Fdata" > <i class="fa fa-search-plus"></i> View</button>
				   <button type="button" name="delete" value="delete" id="<?php echo $row["fpID"]; ?>" class="btn btn-danger btn-xs delete_fpdata" ><i class="fa fa-trash-o"></i> Delete</button>
			   
			   
			   
			   
			   </td>
			   
			   
			   
			   </tr>
                  
                  
				  <?php
                     }
                     ?>
			</tbody>
    </table>
	</div>
								
								
								
								
								
                            </div>
							</div>
                    
                    </div>
                </div>
                <!-- /.row -->


    <!-- Scripting starts from here for Edit View Delete -->


<script>
//view metric button function//
   $(document).on('click', '.view_Fdata', function(){
     //$('#dataModal').modal();
     var fpid = $(this).attr("id");
   $.ajax({
      url:"viewFpMetric.php",
      method:"POST",
      data:{proj_id:fpid},
      success:function(data){
       $('#metrics_detail').html(data);
       $('#dataModal').modal('show');
      }
     });
    });
	
	
	
	
	
</script>






