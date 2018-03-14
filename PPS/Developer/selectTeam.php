

<?php  
include("config.php"); 
if(isset($_POST["proj_id"]))
{
 $output = '';
 
 $query = "SELECT * FROM team WHERE teamId= '".$_POST["proj_id"]."'";
 $result = mysqli_query($connect, $query);
 $query2 = "SELECT * FROM teammember WHERE teamId= '".$_POST["proj_id"]."'";
 $result2 = mysqli_query($connect, $query2);
 $output .= '  
     <style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}
.t04 tbody tr:hover {
  background: #C7D1DD;
}
td, th {
    border: 1px solid #b3b3ff;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>  <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i> 
								Team Details</h3>
                            </div>
                            <div class="panel-body"><table class="t04">';
    while($row = mysqli_fetch_array($result))
    { $count1=7;
$count2=7;$count3=7;$count4=7;
$time=time();
     $output .= '
	 <tr>  
            <td ><label>Id</label></td>  
            <td >'.$row["teamId"].'</td> 
			 ';
			 
		 
    
		     $output .= ' 
			
			
			
			</tr> 
             <tr><td ><label>Name</label></td>  
            <td >'.$row["teamName"].'</td>
			
  
 
  ';
  $output .= '
    
   
			</td>
			
			
			
			</tr>  
			 <tr><td ><label>Current Project</label></td><td> ';

 
				
				$query9 = "SELECT * FROM project WHERE teamId='".$row["teamId"]."' AND projStatus!='Completed'";
				$result9 = mysqli_query($connect, $query9);
			 
					
							if(mysqli_num_rows($result9)>0){
						  $row9 = mysqli_fetch_array($result9);
						  $output .= '	    ' . $row9["projName"] . ''; 
						 	}
						
						 else{
							 $output.='Not Assigned';
						 }

					 
            
						
				 $output .= '</td>
			
			</tr>  
			 <tr><td ><label>Status</label></td>  
            <td >'.$row["teamStatus"].'</td>  
		
		
		
		</tr><tr><td><label>Team Members</label></td>  
        
        <td>
	
        ';
     while($row2 = mysqli_fetch_array($result2)){
		$sql2="SELECT * FROM employee WHERE empId = '".$row2['empId']."'";  
     $result3 = mysqli_query($connect, $sql2);
	  while ($row3=mysqli_fetch_array($result3)) {
		 
		   $output .= '
	 
		 <img style=" border-radius: 50%;" src="' .$row3["image"] .'" width="40px" height="40px"  />'.$row3["empName"].'<b>('.$row3["workStatus"].')</b></br>';
		  
	  }}}
    $output .= '</td></tr>
	
	 ';
	
	
	
	
	
	
	$output .= '
	
	</td></tr>
	
	
	
	</table></div></div></div>';
    echo $output;
}
?>