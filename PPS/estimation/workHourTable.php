	<div class="col-lg-12 col-sm-12 col-md-12">
									    <div class="panel panel-yellow" >
                            <div class="panel-heading">
                                <h3 class="panel-title"></i>Language</h3>
                            </div>
                            <div class="panel-body">
                                
					  
<!-- /.row -->
<script>
/// this function will make the project table responsive with live search//	
 $(function(){
    var table = $('#Table').DataTable( {
        responsive: true
    } );
 
    
  });	</script>
								<div id="language_table">	
								
	<table id="Table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"
	>
    <thead>
           
					 
                    
                    
					   <th>Language Id</th> 
					    <th>Name</th> 
						 <th>LOC per Function Point</th>  
						<th>LOC per Use Case Point</th>
						
						 <th>Actions</th>
                  </tr>
        </thead>
        <tbody>
		<?php
		include("config.php");
		$query = "SELECT * FROM language";
		$result = mysqli_query($connect, $query);
            
                     while($row = mysqli_fetch_array($result))//fetch fp metric record
					 
                     {
					 
                     ?>
					  <tr>   
                      <td><?php echo $row["languageId"]; ?></td>
					  <td><?php echo $row["languageName"]; ?></td>
                    
					  <td><?php echo $row["LOCperFP"]; ?></td>
                       <td><?php echo $row["LOCperUCP"]; ?></td>
                   <td><button type="button" name="view" value="view" id="<?php echo $row["languageId"]; ?>" class="btn btn-warning btn-xs view_Fdata" > <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
				   <button type="button" name="delete" value="delete" id="<?php echo $row["languageId"]; ?>" class="btn btn-danger btn-xs delete_fpdata" ><i class="fa fa-trash-o"></i> Delete</button>
			   
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