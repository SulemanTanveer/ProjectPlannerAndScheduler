 <?php

   include("config.php");
   $query = "SELECT * FROM employee";
   $result = mysqli_query($connect, $query);
  	$count1 = mysqli_num_rows($result);
   
   $query = "SELECT * FROM employee WHERE jobStatus='Employee'";
   $result = mysqli_query($connect, $query);
  	 $count2 = mysqli_num_rows($result);

   $query = "SELECT * FROM employee WHERE jobStatus='Ex-Employee'";
   $result = mysqli_query($connect, $query);
	$count3 = mysqli_num_rows($result);
	 $array[] =array();
	  $array[0]=$count1;
	   $array[1]=$count2;
	   $array[2]=$count3;	
         echo json_encode($array);
		   
 	?>
