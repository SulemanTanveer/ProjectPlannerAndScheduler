   <?php  
 include("config.php");
 if(isset($_POST["employee_id"]))  
 {  
      $query = "SELECT * FROM employee WHERE empId = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
	 
	 $query2 = "SELECT * FROM employeelanguage WHERE empId = '".$_POST["employee_id"]."'";  
      $result2 = mysqli_query($connect, $query2);  
      if( mysqli_num_rows($result2)>0){
		 while($row2 = mysqli_fetch_array($result2))
		  {
		  $rows2[]= $row2;
		  }
	  }
		 
		 
		 
		 
		 
		 
		 
		 
$query3 = "SELECT * FROM employeeroles WHERE empId = '".$_POST["employee_id"]."'";  
      $result3 = mysqli_query($connect, $query3);  
      if( mysqli_num_rows($result3)>0){
		 while($row3 = mysqli_fetch_array($result3))
		  {
		  $rows3[]= $row3;
		  }
	  }
		 



		 
	   $array[] =array();
	  $array[0]=$row;
	   $array[1]=$rows2;
	    $array[2]=$rows3;
      echo json_encode($array);  
 }  
 ?>