

<?php  
 
include("config.php"); 
if(isset($_POST["proj_id"]))
{
 $output = '';
  $data = $_POST["proj_id"];
  
list($subtaskId, $notiId) = explode("-", $data);
 $query = "SELECT * FROM subtask WHERE subtaskId= '".$subtaskId ."'";
 $result = mysqli_query($connect, $query);
  $query = "SELECT * FROM subtask WHERE subtaskId= '".$subtaskId ."'";
 $result = mysqli_query($connect, $query);
if(mysqli_num_rows($result)>0){

$query44 = "UPDATE notification SET seen='1' WHERE notificationId= '".$notiId."'";  
				     mysqli_query($connect, $query44); 

 $output .= '  
      <style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}
.t09 tbody tr:hover {
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
</style> <table class="t09">';
$name='';
$img='';
    while($row = mysqli_fetch_array($result))
    {
		if($row["completionDate"]=='0000-00-00'){
			$compDate='Not Completed';
			
		}
		else{
			$compDate=$row["completionDate"];
		}
     $output .= '
	 <tr>  
            <td width="30%"><label>Id</label></td>  
            <td width="70%">'.$row["subtaskId"].'</td>  
        </tr>
       <tr>  
            <td width="30%"><label>Task Name</label></td>  
            <td width="70%">'.$row["subtaskName"].'</td>  
        </tr>
		
		 <tr>  
            <td width="30%"><label>Status</label></td>  
            <td width="70%">'.$row["subtaskStatus"].'</td>  
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
            <td width="30%"><label>Completion Date</label></td>  
            <td width="70%">'.$compDate.'</td>  
        </tr>
		 
		<tr>  
		
            <td width="30%"><label>Assign to</label></td>
       
            <td width="70%">
	
	';
	
 if($row['empId']=='0'){
	 $output .= 'Not Assigned';
	 
 }
	else{	$sql2="SELECT * FROM employee WHERE empId = '".$row['empId']."'";  
     $result2 = mysqli_query($connect, $sql2);
	  $row2=mysqli_fetch_array($result2);

		 
		   $output .= '
	 
		 '.$row2["empName"].'<img style=" border-radius: 50%;" src="' .$row2["image"] .'" width="40px" height="40px"  />  </br>';
	} 
	 
		
    
	}
		
			
    $output .= '</td>  </tr></table></div>';
    echo $output;
}
else{
	echo 'no';
}

}
?>