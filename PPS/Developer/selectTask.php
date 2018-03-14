

<?php  
include("config.php"); 
 session_start();
if(isset($_POST["proj_id"]))
{
$flag=false;
 $output = '';
 $count1=0;
 $count2=0;
 $count3=0;
 $count4=0;
 $query55 = "SELECT * FROM subtask WHERE taskId='".$_POST["proj_id"]."' AND empId='".$_SESSION['id']."'";
 $result55 = mysqli_query($connect, $query55);		
$count55 = mysqli_num_rows($result55);
if($count55>0){
$flag=true;
$query = "SELECT * FROM subtask WHERE taskId='".$_POST["proj_id"]."' AND subtaskStatus ='Pending' AND empId='".$_SESSION['id']."'"; 
$result = mysqli_query($connect, $query);		
$count1 = mysqli_num_rows($result);
$query = "SELECT * FROM subtask WHERE taskId='".$_POST["proj_id"]."' AND subtaskStatus ='Not Started'  AND empId='".$_SESSION['id']."'"; 
$result = mysqli_query($connect, $query);		
$count2 = mysqli_num_rows($result);
$query = "SELECT * FROM subtask WHERE taskId='".$_POST["proj_id"]."' AND subtaskStatus ='In-Progress' AND empId='".$_SESSION['id']."'"; 
$result = mysqli_query($connect, $query);		
$count3 = mysqli_num_rows($result);
$query = "SELECT * FROM subtask WHERE taskId='".$_POST["proj_id"]."' AND subtaskStatus ='Completed' AND empId='".$_SESSION['id']."'"; 
$result = mysqli_query($connect, $query);		
$count4 = mysqli_num_rows($result);
}
  if(isset($_POST["deadlineFlag"])){
  $query2 = "UPDATE task SET deadlineFlag2='1' WHERE taskId= '".$_POST["proj_id"]."'";
			mysqli_query($connect, $query2);
  }
 
 $query = "SELECT * FROM task WHERE taskId= '".$_POST["proj_id"]."'";
 $result = mysqli_query($connect, $query);

			
			
			
 $output .= '  
      <style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

.t05 td, th {
    border: 1px solid #64b5f6 ;
    text-align: left;
    padding: 8px;
}

.t05 tr:nth-child(even) {
    background-color: #bbdefb   ;
}
</style> <table class="t05">';
$name='';
$img='';
   $row = mysqli_fetch_array($result);
    if($row["actualCompletionDate"]=='0000-00-00'){
			$compDate='Not Completed';
			
		}
		else{
			$compDate=$row["actualCompletionDate"];
		}
	 if($row["actualStartDate"]=='0000-00-00'){
			$strtDate='Not Started';
			
		}
		else{
			$strtDate=$row["actualStartDate"];
		}
		
		
	/////////////////progress/////////////	
$total_count=0;
 $task_count=0;
 $progress=0;
 $check=0;
$query888 = "SELECT * FROM task WHERE  taskId= '".$_POST["proj_id"]."'";
	$result888 = mysqli_query($connect, $query888);
	$row888 = mysqli_fetch_array($result888);
 if($row888['taskStatus']=='Completed'){
	 
	 $progress=100;
 }
 else{
	$query8 = "SELECT * FROM subtask WHERE  taskId= '".$_POST["proj_id"]."'";
	$result8 = mysqli_query($connect, $query8);
	if($check=mysqli_num_rows($result8)>0){
   while($row8 = mysqli_fetch_array($result8))
	   
		{  

	if($row8['subtaskStatus']=='Completed')
	{
		$total_count=$total_count+$row8['subtaskHours'];
		$task_count=$task_count+$row8['subtaskHours'];
		
	}
		else{
			$total_count=$total_count+$row8['subtaskHours'];
			
		}
		
	}
	}
	
 }
	
 
////////////////////


	
     $output .= '
	 <tr >  
            <td><label>Id</label></td>  
            <td >'.$row["taskId"].'</td>  
			<td valign="top" rowspan="10" style="background-color:white">
			
			
			<label>Task Progress</label>';
			if($check>0){
	 
	 $progress=($task_count/ $total_count)*100;
	 $progress= round($progress);
			    $output .= '<div class="progress">
   <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:'.$progress.'%">
      '.$progress.'%
    </div>
  
			</div>';
			}
		else if($progress==0){
			 $output .= ' <div class="progress"><div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style=" color:Black;width:'.$progress.'%">
      '.$progress.'%
    </div>
  
			</div>';
		}	
		else  {
			 $output .= ' <div class="progress"><div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style=" width:'.$progress.'%">
      '.$progress.'%
    </div>
  
			</div>';
		}	
			
if($flag){
   $output .= '
<div id="piechart_3d"  ></div>
			

    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
		  
		   tooltip: {
        trigger:"none"
      }
        var data = google.visualization.arrayToDataTable([
		
          ["Task", "Hours per Day"],
          ["Pending",  '.$count1.' ],
           ["In-Progress",  '.$count3.' ],
          ["Assign(Not Started)",  '.$count2.' ],
       
          ["Completed",  '.$count4.' ]
          
          


	  ]);

        var options = {
           tooltip: {trigger: "none"},
		  
		  title:"Subtasks",
          is3D: true,
		   pieSliceText: "value",
		   width:330,
           height:250
		   
        };

        var chart = new google.visualization.PieChart(document.getElementById("piechart_3d"));
        chart.draw(data, options);
      }
    </script>';
}		
		$output .= '	
			</td>
        </tr>
       <tr>  
            <td ><label>Task Name</label></td>  
            <td>'.$row["taskName"].'</td>  
			
        </tr>
		
		 <tr>  
            <td ><label>Status</label></td>  
            <td >'.$row["taskStatus"].'</td>  
        </tr>
		<tr>  
            <td ><label>Priority</label></td>  
            <td >'.$row["priority"].'</td>  
        </tr>
	<tr>  
            <td ><label>Start Date</label></td>  
            <td >'.$row["startDate"].'</td>  
        </tr>
		<tr>  
            <td ><label>Deadline</label></td>  
            <td >'.$row["deadline"].'</td>  
        </tr>
		<tr>  
            <td ><label>Actual Start Date</label></td>  
            <td >'.$strtDate.'</td>  
        </tr>
		<tr>  
            <td ><label>Actual Completion Date</label></td>  
            <td >'.$compDate.'</td>  
        </tr> <tr>  
            <td ><label>Description</label></td>  
            <td  >'.$row["description"].'</td>  
        </tr><tr>  
		
            <td ><label>Assign to</label></td>
       
            <td >
	
	';
	
	$sql3="SELECT * FROM taskassignment WHERE taskId= '".$_POST["proj_id"]."'";
			 $result3 = mysqli_query($connect, $sql3);
	      while ($row3=mysqli_fetch_array($result3)) {
		$sql2="SELECT * FROM employee WHERE empId = '".$row3['empId']."'";  
     $result2 = mysqli_query($connect, $sql2);
	  while ($row2=mysqli_fetch_array($result2)) {
		 
		   $output .= '<img style=" border-radius: 50%;" src="' .$row2["image"] .'" width="40px" height="40px"  />  
	 
		 '.$row2["empName"].'</br>';
		  
	  }
		
    }
	
		
			
    $output .= '</td>  </tr></table></div>';
    echo $output;
}
?>