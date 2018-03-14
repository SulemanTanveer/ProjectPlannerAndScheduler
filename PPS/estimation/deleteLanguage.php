<?php

include("config.php"); 
$langId = mysqli_real_escape_string($connect, $_POST["Language_id"]);
$query = "SELECT * FROM project WHERE languageId = '".$langId."'"; 

$result = mysqli_query($connect, $query);
 $count = mysqli_num_rows($result);

if( $count>0)
{
	echo '<center><div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-check"></i> Language used in project cannot be deleted!</strong> 
							</div>
                    </div>
                </div><center>';
}
else
{
	
	$query1 = "Delete FROM language WHERE languageId = '".$langId."'";  
	$result1 = mysqli_query($connect, $query1);
	if($result1)
{
	echo '<center><div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-check"></i>  <strong>Language deleted successfully!  </strong>
							</div>
                    </div>
                </div></center>';
}
else
{
	echo '<center><div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-check"></i>  <strong>Problem occured! Try again </strong>	</div>
                    </div>
                </div></center>';
	
	
}
	
	
	
	
	
	
}




?>
<div class="row" id="change">
			<div class="col-lg-12 col-sm-12 col-md-12">
									    <div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-cogs" aria-hidden="true"></i> Language</h3>
                            </div>
                            <div class="panel-body">
                                 <div class="row">
						<div class="col-lg-12">
							 <div class="form-group pull-right">
						   <button type="button" name="age" id="addLanguage" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-success"><i class="glyphicon glyphicon-plus-sign"></i> Add Language</button>
						</div> </div> </div>
					  
<!-- /.row -->

								<div id="language_table">	
								
	<table id="langTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"
	>
    <thead>
           
					 
                    
                    
					   <th>Language Id</th> 
					    <th>Name</th> 
						 <th>LOC per Function Point</th>  
						
						
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
                      
                   <td><button type="button" name="view" value="view" id="<?php echo $row["languageId"]; ?>" class="btn btn-warning btn-xs edit_language" > <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
				   <button type="button" name="delete" value="delete" id="<?php echo $row["languageId"]; ?>" class="btn btn-danger btn-xs delete_language" ><i class="fa fa-trash-o"></i> Delete</button>
			   
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
			<script>
/// this function will make the project table responsive with live search//	
 $(function(){
    var table = $('#langTable').DataTable( {
        responsive: true
    } );
 
    
  });	</script>