

<?php  

include("config.php"); 
if(isset($_POST["proj_id"]))
{
 $output = '';
 
 
				   
										
					   $query = "SELECT * FROM subtaskfiles  WHERE subtaskId= '".$_POST["proj_id"]."' ORDER BY subtaskFileId DESC ";
					  
					   $result = mysqli_query($connect, $query);
					   
					   
					   
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
.t04 th {
    background-color: #4CAF50;
    color: white;
}
tr:nth-child(even) {
    background-color: #dddddd;
}
</style> 

<table class="t04"><tr>
<th>Files</th>
<th>Time</th>
<th>Date</th>
<th>Attached by</th>
</tr>

';

    while($row = mysqli_fetch_array($result))
    {
		$query2 = "SELECT * FROM employee  WHERE empId= '".$row["attachedBy"] ."'";
					  
					   $result2 = mysqli_query($connect, $query2);
					 while($row2 = mysqli_fetch_array($result2))
    {
		$val2=$row["fileName"].'-'.$row["filePath"];
	 		
					 
		
     $output .= '
	     <tr>  
             <td ><a href="#"  id="'.$val2.'" class="check3" onclick="return false;">'. $row["fileName"] .'</a></td>  
			   <td >'.$row["uploadTime"].'</td>  
			  <td >'.$row["uploadDate"].'</td> 
			  <td > <img src="' .$row2['image'] .'" width="30px" height="30px"  />    '.$row2['empName'].'  </td>
      </tr>
       
		';
       
					 
	}
	
	}

    $output .= '</table></div>';
	
	$output.="<script>
	
	 $(document).on('click', '.check3', function(){
     //$('#dataModal').modal();
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
	
	
	
	</script>";
	
    echo $output;
}
?>