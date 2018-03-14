
<?php
$connect = mysqli_connect("localhost", "root", "", "fyp");
 $output='';
 $output2='';
  $taskId=$_POST["proj_id"];
$query="Select* from taskassignment where taskId='$taskId'";
 $result = mysqli_query($connect, $query); 
if(mysqli_num_rows( $result)==1){
	$query="Select* from task where taskId='$taskId'";
 $result3 = mysqli_query($connect, $query); 
 $row3=mysqli_fetch_array($result3);
	$output2.=" <center><b style='font-size: 30px;'>Task Hours: </b> <b class='huge' style=' color:green'>".$row3['taskHours']."</b> </center><br>";
		}else{
		 $output='No';
		 
	 }
 
	 
	 
 
if($output=='No')
{
	 
}
else{
	echo $output2;
}
	
	 
	 
?>