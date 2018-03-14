   <?php 
  
 include("config.php");
 if(isset($_POST["proj_id"]))  
 {  
      $query = "SELECT * FROM task WHERE taskId = '".$_POST["proj_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>