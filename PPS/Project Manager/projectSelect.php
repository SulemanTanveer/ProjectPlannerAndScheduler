

<?php  
 
include("config.php");  date_default_timezone_set('Asia/Karachi');
if(isset($_POST["proj_id"]))
{
 $output = '';
 if(isset($_POST["deadlineFlag"])){
  $query8 = "UPDATE project SET deadlineFlag='1' WHERE projId= '".$_POST["proj_id"]."'";
			mysqli_query($connect, $query8);
 }
 

			
 $query22 = "SELECT * FROM project  WHERE projId= '".$_POST["proj_id"]."'";
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
</style> <div class="row">
                     <div class="col-lg-12">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i> Project Information</h3>
                            </div>
                            <div class="panel-body"><table class="t04">';
$deadline='';
$query = "SELECT * FROM project WHERE projId= '".$_POST["proj_id"]."'";
 $result = mysqli_query($connect, $query);
    while($row = mysqli_fetch_array($result))
    {
		$deadline=$row["deadline"];
		
		$query6= "SELECT * FROM employee WHERE empId= '".$row["registeredBy"]."'";
       $result6 = mysqli_query($connect, $query6);
	   $row6 = mysqli_fetch_array($result6);
      $regBy=$row6['empName'];
		
		
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
            <td  width="40%"><label>Registered By</label></td>  
            <td  >'.$regBy.'</td>  
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
	
    $output .= '</table>  </div></div></div></div>';
	/////////////////////////////////////////////////
	
	$output22='';
	 $output22 .= '<div class="row">
                     <div class="col-lg-12">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i> Project Metric</h3>
                            </div>
                            <div class="panel-body">
	 <table class="t04"><tr>  
            <th > </th>  
            <th >Effort</th>  
			 <th >Duration </th>  
            <th >Size</th>  
			 <th >Cost</th>  

        </tr>
         
         
        ';
 $query22 = "SELECT * FROM metric WHERE pID= '".$_POST["proj_id"]."' and type='actual'";
 $result22 = mysqli_query($connect, $query22);
    
   if(mysqli_num_rows($result22)>0){
	 $row21 = mysqli_fetch_array($result22);
	 
	 $query221 = "SELECT * FROM actualmetrics WHERE mID= '".$row21["mID"]."' ";
 $result221 = mysqli_query($connect, $query221);
	 $row22 = mysqli_fetch_array($result221);
	 
	
	 $output22 .= '
	 <tr>  
             <th >Actual</th>  
            <td  >'.$row22["effort"].'</td>  
         <td  >'.$row22["duration"].'</td>  
		  <td  >'.$row22["size"].'</td>  
		   <td  >'.$row22["cost"].'</td>  
		
		</tr>
          
        ';
    }
	
	else{
		
		$output22 .= '
	 <tr>  
             <th >Actual</th>  
            <td  >--</td>  
			 <td  >--</td>  
			  <td  >--</td>  
			   <td  >--</td>  
         
		
		</tr> '; 
	}
	
	$query22 = "SELECT * FROM metric WHERE pID= '".$_POST["proj_id"]."'and type='fp'";
 $result22 = mysqli_query($connect, $query22);
    
   if(mysqli_num_rows($result22)>0){
	 $row21 = mysqli_fetch_array($result22);
	 
	 $query221 = "SELECT * FROM fp_metric WHERE mID= '".$row21["mID"]."' ";
 $result221 = mysqli_query($connect, $query221);
	 $row22 = mysqli_fetch_array($result221);
	 
	
	 $output22 .= '
	 <tr>  
             <th >Function Point</th>  
            <td  >'.$row22["effort"].'</td>  
         <td  >'.$row22["duration"].'</td>  
		  <td  >'.$row22["size"].'</td>  
		   <td  >'.$row22["cost"].'</td>  
		
		</tr>
          
        ';
    }
	
	else{
		
		$output22 .= '
	 <tr>  
                    <th >Function Point</th>  
            <td  >--</td>  
			 <td  >--</td>  
			  <td  >--</td>  
			   <td  >--</td>  
         
		
		</tr> '; 
	}  
	
	$query22 = "SELECT * FROM metric WHERE pID= '".$_POST["proj_id"]."' and type='ucp'";
 $result22 = mysqli_query($connect, $query22);
    
   if(mysqli_num_rows($result22)>0){
	 $row21 = mysqli_fetch_array($result22);
	 
	 $query221 = "SELECT * FROM ucp_metric WHERE mID= '".$row21["mID"]."' ";
 $result221 = mysqli_query($connect, $query221);
	 $row22 = mysqli_fetch_array($result221);
	 
	
	 $output22 .= '
	 <tr>  
             <th >Use Case Point</th>  
            <td  >'.$row22["effort"].'</td>  
         <td  >'.$row22["duration"].'</td>  
		  <td  >'.$row22["size"].'</td>  
		   <td  >'.$row22["cost"].'</td>  
		
		</tr>
          
        ';
    }
	
	else{
		
		$output22 .= '
	 <tr>  
              <th >Use Case Point</th>  
            <td  >--</td>  
			 <td  >--</td>  
			  <td  >--</td>  
			   <td  >--</td>  
         
		
		</tr> '; 
	}
	
	
	$query22 = "SELECT * FROM metric WHERE pID= '".$_POST["proj_id"]."' and type='ee'";
 $result22 = mysqli_query($connect, $query22);
    
   if(mysqli_num_rows($result22)>0){
	 $row21 = mysqli_fetch_array($result22);
	 
	 $query221 = "SELECT * FROM ee_metric WHERE mID= '".$row21["mID"]."' ";
 $result221 = mysqli_query($connect, $query221);
	 $row22 = mysqli_fetch_array($result221);
	 
	
	 $output22 .= '
	 <tr>  
             <th >Empirical Model</th>  
            <td  >'.$row22["effort"].'</td>  
         <td  >'.$row22["duration"].'</td>  
		  <td  >'.$row22["size"].'</td>  
		   <td  >'.$row22["cost"].'</td>  
		
		</tr>
          
        ';
    }
	
	else{
		
		$output22 .= '
	 <tr>  
            <th >Empirical Model</th>  
            <td  >--</td>  
			 <td  >--</td>  
			  <td  >--</td>  
			   <td  >--</td>  
         
		
		</tr> '; 
	}
	
	
	
	
	$query22 = "SELECT * FROM metric WHERE pID= '".$_POST["proj_id"]."' and type='cocomo'";
 $result22 = mysqli_query($connect, $query22);
    
   if(mysqli_num_rows($result22)>0){
	 $row21 = mysqli_fetch_array($result22);
	 
	 $query221 = "SELECT * FROM cocomo_metric WHERE mID= '".$row21["mID"]."' ";
 $result221 = mysqli_query($connect, $query221);
	 $row22 = mysqli_fetch_array($result221);
	 
	
	 $output22 .= '
	 <tr>  
             <th >Cocomo Model</th>  
            <td  >'.$row22["effort"].'</td>  
         <td  >'.$row22["duration"].'</td>  
		  <td  >'.$row22["size"].'</td>  
		   <td  >'.$row22["cost"].'</td>  
		
		</tr>
          
        ';
    }
	
	else{
		
		$output22 .= '
	 <tr>  
              <th >Cocomo Model</th>  
            <td  >--</td>  
			 <td  >--</td>  
			  <td  >--</td>  
			   <td  >--</td>  
         
		
		</tr> '; 
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
    $output22 .= '</table> </div></div></div></div>';
   
	
	
	
	
	
	
	
	///////////////////////////////////////////////////////
	
	$count1=0;
	$count2=0;
 $query2 = "SELECT * FROM task WHERE projId= '".$_POST["proj_id"]."'";
 $result2 = mysqli_query($connect, $query2);
$count1=mysqli_num_rows($result2);

 while($row2 = mysqli_fetch_array($result2))
    {
		$query3 = "SELECT * FROM subtask WHERE taskId= '".$row2["taskId"]."'";
  $result3=mysqli_query($connect, $query3);
  while($row3 = mysqli_fetch_array($result3))
    {
$count2++;
		
	}
 } 
 //////////////////////progress calculate//////////////
  $output3='';
 
 $total_count=0;
 $task_count=0;
 
  

 $query88  = "SELECT SUM(taskHours)  AS value_sum0 FROM  task WHERE projId= '".$_POST["proj_id"]."'";
 
 $result88 = mysqli_query($connect, $query88); 
 $row88 = mysqli_fetch_array($result88);

    $total_count=$row88['value_sum0'];
  
  $query6 = "SELECT * FROM task WHERE projId= '".$_POST["proj_id"]."'";
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
  if($check>0){
 $query6 = "SELECT * FROM task WHERE projId= '".$_POST["proj_id"]."' and taskStatus='Completed'";
 $result6 = mysqli_query($connect, $query6);
 $complet_task=mysqli_num_rows($result6);
 $id1=$_POST["proj_id"];
$query88 = "SELECT * FROM task WHERE projId= '$id1'";
	$result88 = mysqli_query($connect, $query88);
   while($row88 = mysqli_fetch_array($result88))
		{  
	$query8 = "SELECT * FROM subtask WHERE taskId= '".$row88["taskId"]."'";
	$result8 = mysqli_query($connect, $query8);
   while($row8 = mysqli_fetch_array($result8))
		{  

	if($row8['subtaskStatus']=='Completed')
	{
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
		    $array[8]=$output22;
		  
  echo json_encode($array);
	
	
	
	
	
	 
}
?>