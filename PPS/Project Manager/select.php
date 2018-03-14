

<?php  
	
include("config.php"); 
if(isset($_POST["employee_id"]))
{
 $output = '';
 $count1=0;
 $count2=0;
  $count3=0;
 $query = "SELECT * FROM taskassignment WHERE empId= '".$_POST["employee_id"]."'";
 $result = mysqli_query($connect, $query);

    while($row = mysqli_fetch_array($result))
    {
		$query2 = "SELECT * FROM task WHERE taskStatus= 'Completed' And taskId= '".$row["taskId"]."'";
		$result2 = mysqli_query($connect, $query2);
		if(mysqli_num_rows($result2)>0){
			
			$count1++;
		}
		
		
	}
 

$query3 = "SELECT * FROM subtask WHERE subtaskStatus= 'Completed' AND  empId= '".$_POST["employee_id"]."'  ";
		$result3 = mysqli_query($connect, $query3);
		$count2=mysqli_num_rows($result3);
			
	
	 $query = "SELECT * FROM teammember WHERE empId= '".$_POST["employee_id"]."'";
 $result = mysqli_query($connect, $query);

    while($row = mysqli_fetch_array($result))
    {
$query3 = "SELECT * FROM project WHERE teamId= '".$row["teamId"]."'";
		$result3 = mysqli_query($connect, $query3);
		 while($row2 = mysqli_fetch_array($result3))
    {
		$query4 = "SELECT * FROM project WHERE projId= '".$row2["projId"]."' And projStatus= 'Completed' ";
		$result4 = mysqli_query($connect, $query4);
		if(mysqli_num_rows($result3)>0){
			
			$count3++;
		}
	}
		
		
		
	}
	
	
	
 $query = "SELECT * FROM employee WHERE empId= '".$_POST["employee_id"]."'";
 $result = mysqli_query($connect, $query);
 

 
 
 
 
 $output .= '  
      <style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

.table1 tbody tr:hover {
  background: #C7D1DD;
}
tr:nth-child(even){background-color: #f2f2f2}
td, th {
    border: 1px solid #b3b3ff;
    text-align: left;
    padding: 8px;
}
 
</style> <table class="table1">';
$id='';
    while($row = mysqli_fetch_array($result))
    {
		
	 $id=$row["empId"];
					$val=$row["salary"];
					 $val2='Rs. '.$val.'/-';
		
     $output .= '
	 <tr><td colspan="4"><center><img style=" border-radius: 50%;" src="' .$row['image'] .'" width="80px" height="80px"  /></center></td></tr>
         <tr>  
            <td><label>Id</label></td>  
            <td>'.$row["empId"].'</td>  
			<td ><label>Name</label></td>  
            <td >'.$row["empName"].'</td>  
             </tr> <tr> 
            <td ><label>Gender</label></td>  
            <td >'.$row["gender"].'</td>  
     
        
            <td ><label>Position</label></td>  
            <td >'.$row["position"].'</td>  
           </tr>
             <tr>  
			 <td ><label>Date of Birth</label></td>  
            <td >'.$row["dob"].'</td>  
      
     
            <td ><label>Reg Date</label></td>  
            <td >'.$row["regDate"].'</td>  
          </tr>
             <tr> <td ><label>Address</label></td>  
            <td >'.$row["address"].'</td>  
       
        
            <td ><label>Email</label></td>  
            <td >'.$row["email"].'</td>  
          </tr>
            <tr>   
			<td ><label>Cnic</label></td>  
            <td >'.$row["cnic"].'</td>  
        
       
            <td><label>Salary</label></td>  
            <td >'. $val2.'</td>  
          </tr>
           <tr><td ><label>Job Status</label></td>  
            <td >'.$row["jobStatus"].'</td>  
        
       
            <td ><label>Work Status</label></td>  
            <td >'.$row["workStatus"].'</td>  
        </tr> <tr>
		 
		';
        
					 
				}

       
	 
 $output .= '<td ><label>Languages</label></td> <td colspan="3"> ';
	$query2 = "SELECT * FROM employeelanguage  WHERE empId='".$_POST["employee_id"]."'";  
					 $result2 = mysqli_query($connect, $query2);
            
                     while($row2 = mysqli_fetch_array($result2))
                     {$query21 = "SELECT * FROM language  WHERE languageId='".$row2["languageId"]."'";  
					 $result21 = mysqli_query($connect, $query21);
            
                     while($row21 = mysqli_fetch_array($result21))
                     {
						 
				$output .= '&#x25BA; '.$row21['languageName'].'<br>';
					 }
					 }
	
	
	
	 $output .= '</td ></tr></table></div>';
     $array[] =array();
	  $array[0]=$count1;
	   $array[1]=$count2;
	  
	    $array[2]=$output;
		 $array[3]=$count3;
  echo json_encode($array);
}
?>