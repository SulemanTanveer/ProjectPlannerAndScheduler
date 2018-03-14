

<?php  
include("config.php"); 
include("time.php");
if(isset($_POST["employee_id"]))
{
 $output = '';
 
 $query = "SELECT * FROM inbox WHERE id= '".$_POST["employee_id"]."'";
 $result = mysqli_query($connect, $query);
 $output .= '  
      <style>
table{
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

.t01 td, th {
    border: 1px solid #fbc02d;
    text-align: left;
    padding: 8px;
}

.t01 tr:nth-child(even) {
    background-color: #ffee58      ;
}
</style> <table class="t01">';
$id='';
    while($row = mysqli_fetch_array($result))
    {
			$query2 = "SELECT * FROM employee  WHERE empId='".$row["sender"]."'";  
		$query3 = "UPDATE inbox SET open='1' WHERE id='".$_POST["employee_id"]."'"; 
		mysqli_query($connect, $query3);
					 $result2 = mysqli_query($connect, $query2);
             $time = time_passed($row['time']);
                     while($row2 = mysqli_fetch_array($result2))
                     {
					
					$filename=$row["fileName"];
					$val2=$row["fileName"].'-'.$row["filepath"];
					 
		
     $output .= '
	  <tr>  
            <td width="30%"><label>From</label></td>  
            <td width="70%">'.$row2["empName"].'<img style="width="70px" height="70px" src="' .$row2['image'] .'" width="80px" height="80px"  /></td>  
        </tr>
		<tr>  
            <td width="30%"><label>Sent</label></td>  
            <td width="70%">'.$row["date"].'<br>'.$time.'</td>  
			    
        </tr>
        <tr>  
            <td width="30%"><label>Subject</label></td>  
            <td width="70%">'.$row["subject"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Message</label></td>  
            <td width="70%">'.$row["message"].'</td>  
        </tr>
        <tr>
		 <td width="30%"><label>Attachments</label></td>
		  <td width="70%"><a onclick="return false;" href="#" id="' .$val2.'" class="check3" >' .$filename .'</a></td>  
      </tr>
			
            
		
		';
        
					 
				}

       
	}
				
    $output .= '</table></div>';
    echo $output;
		echo "<script>
	 $(document).on('click', '.check3', function(){
    
     var proj_id = $(this).attr('id');


     $.ajax({
      url:'downloadfilewrite.php',
      method:'POST',
      data:{proj_id:proj_id},
      success:function(data){
		  
   window.location = 'download.php';
  
      }
     });
    });
	
</script>
";

}
?>