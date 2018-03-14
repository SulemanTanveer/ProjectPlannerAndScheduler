

<?php session_start();
 $id33 =$_SESSION['id'];
include("config.php");  date_default_timezone_set('Asia/Karachi');
if(isset($_POST["proj_id"]))
{
	
	
	$data = $_POST["proj_id"];
  
list($projId, $notiId) = explode("-", $data);

			
 $query = "SELECT * FROM project WHERE projId= '".$projId ."'";
 $result = mysqli_query($connect, $query);
 

$query44 = "UPDATE notification SET seen='1' WHERE notificationId= '".$notiId."'";  
				     mysqli_query($connect, $query44); 
  if(mysqli_num_rows($result)>0){ 







	
 $output = '';
  
			
 $query = "SELECT * FROM project WHERE projId= '".$projId ."'";
 $result = mysqli_query($connect, $query);

			
 $query22 = "SELECT * FROM project  WHERE projId= '".$projId ."'";
 $result22 = mysqli_query($connect, $query22);
$row22 = mysqli_fetch_array($result22);
$query222 = "SELECT * FROM team WHERE teamId= '".$row22['teamId']."'";
 $result222 = mysqli_query($connect, $query222);
if( mysqli_num_rows( $result222 )>0){
	$row222 = mysqli_fetch_array($result222);
	 $name= $row222['teamName'];
}


else{

 $name='Un Assigned';
}
 
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
.t04 td, th {
    border: 1px solid #b3b3ff  ;
    text-align: left;
    padding: 8px;
}

.t04 tr:nth-child(even) {
    background-color: #f2f2f2  ;
}
</style> <table class="t04">';
$deadline='';
    while($row = mysqli_fetch_array($result))
    {
		$deadline=$row["deadline"];
     $output .= '
	 <tr>  
            <td width="40%"><label>Id</label></td>  
            <td  >'.$row["projId"].'</td>  
        </tr>
        <tr>  
            <td   width="40%"><label>Name</label></td>  
            <td  >'.$row["projName"].'</td>  
        </tr>
        <tr>  
            <td   width="40%"><label>Registration Date</label></td>  
            <td  >'.$row["regDate"].'</td>  
        </tr>
       
		<tr>  
            <td  width="40%"><label>Start Date</label></td>  
            <td  >'.$row["startDate"].'</td>  
        </tr>
        <tr>  
            <td   width="40%"><label>Deadline</label></td>  
            <td  >'.$row["deadline"].'</td>  
        </tr>
        <tr>  
            <td   width="40%"><label>Completion Date</label></td>  
            <td  >'.$row["completionDate"].'</td>  
        </tr>
		 
        <tr>  
            <td  width="40%"><label>Project Status</label></td>  
            <td  >'.$row["projStatus"].'</td>  
        </tr>
        <tr>  
            <td   width="40%"><label>Description</label></td>  
            <td  >'.$row["description"].'</td>  
        </tr>
	<tr>  
            <td   width="40%"><label>Assig to</label></td>  
            <td  >'.$name.'</td>  
        </tr>
        ';
    }
    $output .= '</table></div>';
	
	
	$count1=0;
	$count2=0;
$sql1="SELECT* FROM task  WHERE projId= '".$projId ."'";
     $result1 = mysqli_query($connect, $sql1);
	 if(mysqli_num_rows($result1)>0){
     while($row1 = mysqli_fetch_array($result1)){
		 
		 $sql2="SELECT* FROM taskassignment WHERE taskId='".$row1['taskId']."' AND empId='".$id33."'";
     $result2 = mysqli_query($connect, $sql2);
	 
     while($row2 = mysqli_fetch_array($result2)){
		 $count1++;
		 
		 
		 $query3 = "SELECT * FROM subtask WHERE taskId= '".$row2["taskId"]."'";
  $result3=mysqli_query($connect, $query3);
  while($row3= mysqli_fetch_array($result3))
    {
$count2++;
		
	}
		 
	 }}}
	 
 
 
 //////////////////////progress calculate//////////////
  $output3='';
 
 $total_count=0;
 $task_count=0;
 
  

 $query88  = "SELECT SUM(taskHours)  AS value_sum0 FROM  task WHERE projId= '".$projId ."'";
 
 $result88 = mysqli_query($connect, $query88); 
 $row88 = mysqli_fetch_array($result88);

    $total_count=$row88['value_sum0'];
  
  $query6 = "SELECT * FROM task WHERE projId= '".$projId ."'";
 $result6 = mysqli_query($connect, $query6);
 if($check=mysqli_num_rows($result6)>0){
while($row6 = mysqli_fetch_array($result6))
    {  

if($row6['taskStatus']=='Completed')
{
	
	$task_count=$task_count+$row6['taskHours'];
	
}


else{
	$query8 = "SELECT * FROM subtask WHERE taskId= '".$row6["taskId"]."'";
	$result8 = mysqli_query($connect, $query8);
   while($row8 = mysqli_fetch_array($result8))
		{  

	if($row8['subtaskStatus']=='Completed')
	{
		$task_count=$task_count+$row8['subtaskHours'];
		
		
	}
		
		
		}
	
	
}


	}

	}
else{
	
	$progress=0;
}
	


	
	 if($check>0){
	 
	 $progress=($task_count/ $total_count)*100;
	 $progress= round($progress);
	 $output3=' <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:'.$progress.'%">
      '.$progress.'%
    </div>';
	 }
	 else if($progress==0){
		  $output3=' <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="color:Black;width:0%">
      0%
    </div>';
	 }
	else{
		  $output3=' <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style=" width:0%">
      0%
    </div>';
	 }
 ///////////////////////////////////////////////////////
 $complet_task=0;
 $complet_subtask=0;
$sql1="SELECT* FROM task  WHERE projId= '".$projId ."'";
     $result1 = mysqli_query($connect, $sql1);
	 
     while($row1 = mysqli_fetch_array($result1)){
		 
		 $sql2="SELECT* FROM taskassignment WHERE taskId='".$row1['taskId']."' AND empId='".$id33."'";
     $result2 = mysqli_query($connect, $sql2);
	 
     while($row2 = mysqli_fetch_array($result2)){
		 $sql21="SELECT* FROM task  WHERE taskId= '".$row2["taskId"]."' AND taskStatus='Completed'";
     $result22 = mysqli_query($connect, $sql21);
		  while($row22 = mysqli_fetch_array($result22)){
		  $complet_task++;
		 
		 
		
		 
	 }
	 
	 
  $query3 = "SELECT * FROM subtask WHERE taskId= '".$row2["taskId"]."' AND empId='$id33'";
  $result3=mysqli_query($connect, $query3);
  while($row3= mysqli_fetch_array($result3))
    {
		if($row3['subtaskStatus']=='Completed'){
$complet_subtask++;
		}
	}
	 
	 
	 }
	 
	 
	 
	 
	 
	 
	 } 
 
 
 
///////////////////////////////////////////////////////	
 
 
	
	$now = time(); // or your date as well
$deadline1 = strtotime($deadline);
$datediff = $deadline1-$now;

$output4=floor($datediff / (60 * 60 * 24));
$output5='';
if($output4<-1){
	$output4=($output4*-1)-1;
	$output4=$output4;
	$output5='Days Ago';
}
else{
	
	$output4=($output4+1);

}
	
	 $array[] =array();
	  $array[0]=$count1;
	   $array[1]=$count2;
	  
	    $array[2]=$output;
		   $array[3]=$output3;
		 $array[4]=$output4;
		  $array[5]=$output5;
		   $array[6]=$complet_task;
		    $array[7]=$complet_subtask;
		  
		  
  echo json_encode($array);
	
	
	
  }
  else{
	  
	  	echo 'no';
  }
	
	 
}
?>