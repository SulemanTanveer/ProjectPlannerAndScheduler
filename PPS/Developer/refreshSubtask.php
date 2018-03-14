<?php
include("config.php");
    
 session_start();  
 
if(isset($_POST['taskId']))  {
                                              
		$output = '';								
										
	   $count1=0;
		$count2=0;
		$count3=0;
		$count4=0;
		$select_query23 = "SELECT * FROM taskassignment WHERE taskId = '".$_POST['taskId']."' AND empId='".$_SESSION['id']."' ";  
			$result23 = mysqli_query($connect, $select_query23);
				while($row23 = mysqli_fetch_array($result23))  {


			 $select_query233 = "SELECT * FROM task WHERE taskId = '".$row23["taskId"]."'";  
			$result233 = mysqli_query($connect, $select_query233);

			while($row233 = mysqli_fetch_array($result233))  {


			 $select_query2 = "SELECT * FROM subtask WHERE taskId = '".$row233["taskId"]."'";  
			$result2 = mysqli_query($connect, $select_query2);
			while($row2 = mysqli_fetch_array($result2))  {

				$count1++;
				}}}
				
				
				$select_query23 = "SELECT * FROM taskassignment WHERE taskId = '".$_POST['taskId']."' AND empId='".$_SESSION['id']."' ";  
			$result23 = mysqli_query($connect, $select_query23);
				while($row23 = mysqli_fetch_array($result23))  {


			 $select_query233 = "SELECT * FROM task WHERE taskId = '".$row23["taskId"]."'";  
			$result233 = mysqli_query($connect, $select_query233);

			while($row233 = mysqli_fetch_array($result233))  {


			 $select_query2 = "SELECT * FROM subtask WHERE taskId = '".$row233["taskId"]."' AND subtaskStatus ='Completed'";  
			$result2 = mysqli_query($connect, $select_query2);
			while($row2 = mysqli_fetch_array($result2))  {

				$count2++;
				}}}
			$select_query23 = "SELECT * FROM taskassignment WHERE taskId = '".$_POST['taskId']."' AND empId='".$_SESSION['id']."' ";  
			$result23 = mysqli_query($connect, $select_query23);
				while($row23 = mysqli_fetch_array($result23))  {


			 $select_query233 = "SELECT * FROM task WHERE taskId = '".$row23["taskId"]."'";  
			$result233 = mysqli_query($connect, $select_query233);

			while($row233 = mysqli_fetch_array($result233))  {


			 $select_query2 = "SELECT * FROM subtask WHERE taskId = '".$row233["taskId"]."' AND subtaskStatus ='In-Progress'";  
			$result2 = mysqli_query($connect, $select_query2);
			while($row2 = mysqli_fetch_array($result2))  {

				$count3++;
				}}}
				$select_query23 = "SELECT * FROM taskassignment WHERE taskId = '".$_POST['taskId']."' AND empId='".$_SESSION['id']."' ";  
			$result23 = mysqli_query($connect, $select_query23);
				while($row23 = mysqli_fetch_array($result23))  {


			 $select_query233 = "SELECT * FROM task WHERE taskId = '".$row23["taskId"]."'";  
			$result233 = mysqli_query($connect, $select_query233);

			while($row233 = mysqli_fetch_array($result233))  {


			 $select_query2 = "SELECT * FROM subtask WHERE taskId = '".$row233["taskId"]."' AND subtaskStatus ='Not Started'";  
			$result2 = mysqli_query($connect, $select_query2);
			while($row2 = mysqli_fetch_array($result2))  {

				$count4++;
				}}} 
	 $array[] =array();
	  $array[0]=$count1;
	   $array[1]=$count2;
	   $array[2]=$count3;	
	    $array[3]=$count4;	
         echo json_encode($array);
	 
	 }