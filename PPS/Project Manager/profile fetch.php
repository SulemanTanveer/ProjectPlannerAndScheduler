   <?php
   
		include("config.php");
  session_start();  
      $query = "SELECT * FROM employee WHERE empId = '".$_SESSION["id"]."'"; 
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
	 $query2 = "SELECT * FROM employeelanguage WHERE empId = '".$_SESSION["id"]."'";  
      $result2 = mysqli_query($connect, $query2);  
      if( mysqli_num_rows($result2)>0){
		 while($row2 = mysqli_fetch_array($result2))
		  {
		  $rows2[]= $row2;
		  }
	  }
	  $array[] =array();
	  $array[0]=$row;
	   $array[1]=$rows2;
	   
      echo json_encode($array);  
     
  
 ?>