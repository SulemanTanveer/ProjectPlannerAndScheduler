

<?php  
include("config.php"); 
if(isset($_POST["proj_id"]))
{
 $output = '';
 
 $query = "SELECT * FROM task WHERE taskId= '".$_POST["proj_id"]."'";
 $result = mysqli_query($connect, $query);
  $query2 = "UPDATE task SET deadlineFlag='1' WHERE taskId= '".$_POST["proj_id"]."'";
			mysqli_query($connect, $query2);
 $output .= '  
      <style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #b3b3ff;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style> <table>';
$name='';
$img='';
    while($row = mysqli_fetch_array($result))
    {
		
     $output .= '
	 <tr>  
            <td width="30%"><label>Id</label></td>  
            <td width="70%">'.$row["taskId"].'</td>  
        </tr>
       <tr>  
            <td width="30%"><label>Task Name</label></td>  
            <td width="70%">'.$row["taskName"].'</td>  
        </tr>
		
		 <tr>  
            <td width="30%"><label>Status</label></td>  
            <td width="70%">'.$row["taskStatus"].'</td>  
        </tr>
		<tr>  
            <td width="30%"><label>Priority</label></td>  
            <td width="70%">'.$row["priority"].'</td>  
        </tr>
		<tr>  
            <td width="30%"><label>Deadline</label></td>  
            <td width="70%">'.$row["deadline"].'</td>  
        </tr>
		<tr>  
            <td width="30%"><label>Start Date</label></td>  
            <td width="70%">'.$row["startDate"].'</td>  
        </tr>
		<tr>  
		
            <td width="30%"><label>Assign to</label></td>
       
            <td width="70%">
	
	';
	
	$sql3="SELECT * FROM taskassignment WHERE taskId= '".$_POST["proj_id"]."'";
			 $result3 = mysqli_query($connect, $sql3);
	      while ($row3=mysqli_fetch_array($result3)) {
		$sql2="SELECT * FROM employee WHERE empId = '".$row3['empId']."'";  
     $result2 = mysqli_query($connect, $sql2);
	  while ($row2=mysqli_fetch_array($result2)) {
		 
		   $output .= '<img style=" border-radius: 50%;" src="' .$row2["image"] .'" width="40px" height="40px"  />  
	 
		 '.$row2["empName"].'</br>';
		  
	  }
		
    }
	}
		
			
    $output .= '</td>  </tr></table></div>';
    echo $output;
}
?>