

<?php  
include("config.php"); 
if(isset($_POST["employee_id"]))
{
 $output = '';
 
 $query = "SELECT * FROM employee WHERE empId= '".$_POST["employee_id"]."'";
 $result = mysqli_query($connect, $query);
 $output .= '  
      <style>
table#t02{
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}
#t02 tbody tr:hover {
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
</style> <table id="t02">';
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
        </tr>
		<tr>  
            <td ><label>Role</label></td> 
<td>			
			
            
		
		';
        
					 
				}

       	  $query2 = "SELECT * FROM employeeroles  WHERE empId='".$_POST["employee_id"]."'";  
					 $result2 = mysqli_query($connect, $query2);
            
                     while($row2 = mysqli_fetch_array($result2))
                     {$query21 = "SELECT * FROM role  WHERE roleId='".$row2["roleId"]."'";  
					 $result21 = mysqli_query($connect, $query21);
            
                     while($row21 = mysqli_fetch_array($result21))
                     {
						 
				$output .= '&#x25BA; '.$row21['roleName'].' <b>('.$row2['experience'].' years)</b><br>';
					 }
					 }
		 

				
    $output .= '</td>';
	
	
	
	 $output .= '<td ><label>Languages</label></td> <td> ';
	 
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
    echo $output;
}
?>