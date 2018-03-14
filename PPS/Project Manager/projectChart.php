
<?php
 
$connect = mysqli_connect("localhost", "root", "", "fyp");
 $output='';
$id=$_POST['proj_id'];
    	$sql="SELECT* FROM task WHERE projId='".$id."' ";
     $result = mysqli_query($connect, $sql);
	 if(mysqli_num_rows($result)>0){
     while($row = mysqli_fetch_array($result)){
			       $taskId=  $row['taskId'];
				   $taskName=  $row['taskName'];
				 $taskStatus=  $row['taskStatus'];
				 $startDate = str_replace('-', ',',$row['startDate']);
				 $deadline = str_replace('-', ',', $row['deadline']);
				/////////////////progress//////////////////
				 $progress=  0;
				 $check=0;
				  if($taskStatus=='Completed'){
	 
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
				 if($check>0){
				  $progress=($task_count/ $total_count)*100;
	              $progress= round($progress);
				 }
				 
				 
				 
				 /////////////////////////////////
				 $newId=  $taskId.$taskName;
				 
				 
	$sql3="SELECT* FROM taskdependency WHERE childTaskId='".$taskId."' ";
     $result3 = mysqli_query($connect, $sql3);
	 if(mysqli_num_rows($result3)>0){
		 
		 $output.="['{$newId}','{$taskName}','{$taskStatus}',new Date({$startDate}),new Date({$deadline}),null,{$progress},'";
     
	 while($row3 = mysqli_fetch_array($result3)){
				
				$sql6="SELECT* FROM task WHERE taskId='".$row3["parentTaskId"]."' ";
				  $result6 = mysqli_query($connect, $sql6);
				 while($row6 = mysqli_fetch_array($result6)){
					 
				$output.="".$row3["parentTaskId"].$row6["taskName"].",";
	
				 }
	 }
	 $output.="'],";
  }	
	else{
		 $output.="['{$newId}','{$taskName}','{$taskStatus}',new Date({$startDate}),new Date({$deadline}),null,{$progress},null],";
	}	
	
	$sql2="SELECT* FROM subtask WHERE taskId='$taskId'";  
     $result2 = mysqli_query($connect, $sql2);
	  if(mysqli_num_rows($result2)>0){
		  
     while($row2 = mysqli_fetch_array($result2)){
			       $subtaskId=  $row2['subtaskId'];
				
				   $subtaskName=  $row2['subtaskName'];
				 $substartDate = str_replace('-',',',$row2['startDate']);
				 $subdeadline = str_replace('-', ',', $row2['deadline']);
				
				
				$subtaskStatus=  $row2['subtaskStatus'];	
				$newId=  $subtaskId.$subtaskName;				
		 
			if($subtaskStatus=='Completed'){
				 $subprogress=  '0';
			}
			else{
				 $subprogress=  '100';
				
			}
			$sql3="SELECT* FROM subtaskdependency WHERE childSubtaskId='".$subtaskId."' ";
     $result3 = mysqli_query($connect, $sql3);
	 if(mysqli_num_rows($result3)>0){
		 
		 $output.="['{$newId}','{$subtaskName}','{$subtaskStatus}',new Date({$substartDate}),new Date({$subdeadline}),null,{$subprogress},'";
     
	 while($row3 = mysqli_fetch_array($result3)){
				
								$sql6="SELECT* FROM subtask WHERE subtaskId='".$row3["parentSubtaskId"]."' ";
				  $result6 = mysqli_query($connect, $sql6);
				 while($row6 = mysqli_fetch_array($result6)){
					 
				$output.="".$row3["parentSubtaskId"].$row6["subtaskName"].",";
	
				 }

			
	 }
	 $output.="'],";
  }	
	else{
		$output.="['{$newId}','{$subtaskName}','{$subtaskStatus}',new Date({$substartDate}),new Date({$subdeadline}),null,{$subprogress},null],";
	}
			
			
				
			   
	 }   
				   
		}
	 }}
	 else{
		 $output='No';
		 
	 }
	 $output2=' ';
	$output2.=" 
	

  <script  >
    google.charts.load('current', {'packages':['gantt']});
    google.charts.setOnLoadCallback(drawChart);

    function daysToMilliseconds(days) {
      return days * 24 * 60 * 60 * 1000;
    }

    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Task ID');
      data.addColumn('string', 'Task Name');
      data.addColumn('string', 'Project Status');
      data.addColumn('date', 'Start Date');
      data.addColumn('date', 'End Date');
      data.addColumn('number', 'Duration');
      data.addColumn('number', 'Percent Complete');
      data.addColumn('string', 'Dependencies');

      data.addRows([";
	  
	  
		
		
		$output2.=$output;
		
		
		$output2.=" 	
      ]);

     var options = {
           
          gantt: {
            criticalPathEnabled: false,
            criticalPathStyle: {
              stroke: '#e64a19',
              strokeWidth: 5
            }
          }
        };

      var chart = new google.visualization.Gantt(document.getElementById('chart_div'));

      chart.draw(data, options);
	  
$(window).resize(function(){
  drawChart();
   
});
    }
  </script>


 

";

$output2.='<div class="row"  >
                     <div class="col-lg-12">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-fw fa-bar-chart-o"></i>Gantt Chart</h3>
                            </div>
                            <div class="panel-body">
							<div id="chart_div"></div>
			  <div   >

			 </div>  
			  </div> 
			  </div>  
			  </div>
			
				</div>';
				
				
				

  			
				
				
				
if($output=='No')
{
	echo $output;
}
else{
	echo $output2;
}
	
	 
	 
?>