	<div class="col-lg-12 col-sm-12 col-md-12">
									    <div class="panel panel-green" >
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-cogs" aria-hidden="true"></i> Project Size</h3>
                            </div>
                            <div class="panel-body">
                                 
					  
<!-- /.row -->

								<div id="pSize_table">	
								
	<table id="sizeTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"
	>
    <thead>
           
					 
                    
                    
					   <th><center>Type</center></th> 
					    <th><center>Size (KLOC)</center></th> 
						
						
						 
                  </tr>
        </thead>
        <tbody>
		<?php
		include("config.php");
		$query = "SELECT * FROM projectsize";
		$result = mysqli_query($connect, $query);
            
			
			
                     while($row = mysqli_fetch_array($result))//fetch fp metric record
					 
                     {
					 
                     ?>
					  <tr>   
                      <td align="center"><?php echo $row["type"]; ?></td>
					  <td align="center"><?php echo $row["kloc"]; ?></td>
                    
					
				  
			   
			   </td>
			   
			   </tr>
                  
                  
				  <?php
                     }
                     ?>
		
		
		
		
		</tbody>
        
    </table>
	<div class="row">
	<div class="col-lg-4 col-md-3">
	</div>
	<div class="col-lg-4 col-md-6 col-sm-12">
	
	<button type="button" name="view"  id="Edit_P_Size" class="btn btn-warning  btn-block edit_pSize" > <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
	</div>
	<div class="col-lg-4 col-md-3 ">
	</div>
	</div>
	
	</div>
						
                            </div>
							</div>
			
			
			</div>
			
			


			
			
			
			
			