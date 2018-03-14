
<?php
include("config.php"); 
  

 $output = '';
 
 $query1 = "select * from teammember WHERE teamId= '".$_POST["proj_id"]."'";
$result1 = mysqli_query($connect,$query1);
$count1=0;
$count2=0;
 $count3=0;
$count4=0;
$count5=0;
$count6=0;
 $count7=0;
$count8=0;
while($row1 = mysqli_fetch_array($result1))
{
	
$query2 = "select * from employee WHERE empId='".$row1["empId"]."'  AND workStatus='Active'";
$result2 = mysqli_query($connect,$query2);
if( mysqli_num_rows($result2)>0){
  $count1++;
}

$query3 = "select * from employee WHERE empId='".$row1["empId"]."'  AND workStatus='In-Active'";
$result3 = mysqli_query($connect,$query3);
if( mysqli_num_rows($result3)>0){
	
	$count2++;
}


$query8 = "select * from rolls WHERE empId='".$row1["empId"]."'  AND rollName='System Analyst'";
$result8= mysqli_query($connect,$query8);
if( mysqli_num_rows($result8)>0){
	
	$count3++;
}

$query3 = "select * from rolls WHERE empId='".$row1["empId"]."'  AND rollName='Database Designer'";
$result3 = mysqli_query($connect,$query3);
if( mysqli_num_rows($result3)>0){
	
	$count4++;
}

$query4 = "select * from rolls WHERE empId='".$row1["empId"]."'  AND rollName='Programmer'";
$result4 = mysqli_query($connect,$query4);
if( mysqli_num_rows($result4)>0){
	
	$count5++;
}
$query5= "select * from rolls WHERE empId='".$row1["empId"]."'  AND rollName='Tester'";
$result5 = mysqli_query($connect,$query5);
if( mysqli_num_rows($result5)>0){
	
	$count6++;
}
$query6 = "select * from rolls WHERE empId='".$row1["empId"]."'  AND rollName='Web Developer'";
$result6 = mysqli_query($connect,$query6);
if( mysqli_num_rows($result6)>0){
	
	$count7++;
}
$query7 = "select * from rolls WHERE empId='".$row1["empId"]."'  AND rollName='App Developer'";
$result7 = mysqli_query($connect,$query7);
if( mysqli_num_rows($result7)>0){
	
	$count8++;
}



}

 



//////////////////////////////////////////////////////////////////////////
/////////////////Team History////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////

$Counterr=0;
$query = "SELECT * FROM project WHERE teamId= '".$_POST["proj_id"]."'";
 $result = mysqli_query($connect, $query);
$array=array();
$array4=array();
    while($row2 = mysqli_fetch_array($result))
    {
		
		$query2 = "SELECT assignmentDate FROM project  WHERE projId= '".$row2['projId']."' ";
        $result2 = mysqli_query($connect, $query2);
		 $row3 = mysqli_fetch_array($result2);
		$array[] =substr($row3['assignmentDate'], 0, 4);
		
	}
	 $query = "SELECT * FROM project WHERE teamId= '27'";
 $result = mysqli_query($connect, $query);
	while($row2 = mysqli_fetch_array($result))
    {
		
		$query4 = "SELECT assignmentDate FROM project  WHERE projId= '".$row2['projId']."' AND projStatus='Completed'";
        $result4 = mysqli_query($connect, $query4);
		
		if(mysqli_num_rows($result4)>0){
	$Counterr++;}}


  
 
$output='';
if($Counterr>0){
 $output.=' <div id="columnchart_material"></div>';
 $output.="<script >
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Assign Projects', 'Completed Projects'],";
		  
		  $flag=false;
		  
         $query = "SELECT * FROM project WHERE teamId= '".$_POST["proj_id"]."'";
 $result = mysqli_query($connect, $query);
$array=array();
$array4=array();
    while($row2 = mysqli_fetch_array($result))
    {
		
		$query2 = "SELECT assignmentDate FROM project  WHERE projId= '".$row2['projId']."' ";
        $result2 = mysqli_query($connect, $query2);
		 $row3 = mysqli_fetch_array($result2);
		$array[] =substr($row3['assignmentDate'], 0, 4);
		
	}
	 $query = "SELECT * FROM project WHERE teamId='".$_POST["proj_id"]."'";
 $result = mysqli_query($connect, $query);
	while($row2 = mysqli_fetch_array($result))
    {
		
		$query4 = "SELECT assignmentDate FROM project  WHERE projId= '".$row2['projId']."' AND projStatus='Completed'";
        $result4 = mysqli_query($connect, $query4);
		
		if(mysqli_num_rows($result4)>0){
			 
		 $row4 = mysqli_fetch_array($result4);
		$array4[] =substr($row4['assignmentDate'], 0, 4);
		}
	}
					sort($array);
					sort($array4);
					$arrlength = count($array);
					$completed = array_count_values($array4);
					$assign = array_count_values($array);
					 for($i = 0; $i < $arrlength; $i++) {
					  if($i>0){
						  $counter2= $assign[$array[$i]];
					 if($array[$i]!=$array[$i-1]){
					   $counter= $completed[$array[$i]];
					   
					   if( $counter>0)
					   {   
				   
						   $output.= "['". $array[$i]."',".$counter2.','.$counter.'],';
						   
					   }
					   else{
						   $output.= "['". $array[$i]."',".$counter2.',"0"],';
						   
					   }
					  
					 
					  }}
					 else{
						 $counter2= $assign[$array[$i]];
						 
					   $counter= $completed[$array[$i]];
					   if( $counter>0)
					   {
						  $output.= "['". $array[$i]."',".$counter2.','.$counter.'],';
						   
					   }
					   else{
						    $output.= "['". $array[$i]."',".$counter2.',"0"],';
						   
					   }
					  
					  
					 $flag=true;
					 
						 
						 
					 }
					 
					 
					 
					 }
					 
 
		 
		  
		  
		  
		  
     $output.="   ]);

        var options = {
          chart: {
            title: 'Team Performance History',
            subtitle: 'Assign and Completed projects',";
			$output.=' bar: {groupWidth:"10%"},';
		     $output.=" 'width':500,
          'height':350
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
";
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
 ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	$output2='<div id="donutchart" style="width: 200px; height: 200px;"></div>
			
 
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart2);
      function drawChart2() {
		  
		   tooltip: {
        trigger:"none"
      }
        var data = google.visualization.arrayToDataTable([
		
          ["Task", "Hours per Day"],
          ["Active",  '.$count1.' ],
            
          ["In-Active",  '.$count2.' ] 
          
          


	  ]);

        var options = {
           
		  
		  title:"Team Members Work Status",
           pieSliceText: "value",
		  pieHole: 0.4,
		   
		  width:400,
           height:200
        };

        var chart = new google.visualization.PieChart(document.getElementById("donutchart"));
        chart.draw(data, options);
      }
    </script>';
	
	 $output3='<div id="piechart_3d" style="width: 200px; height: 200px;"></div>
			
 
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart4);
      function drawChart4() {
		  
		   tooltip: {
        trigger:"none"
      }
        var data = google.visualization.arrayToDataTable([
		
          
          ["Task", "Hours per Day"],
          ["System Analys",  '.$count3.' ],
            
          ["Database Designer",  '.$count4.' ] 
          ,
            
          ["Programmer",  '.$count5.' ] ,
            
          ["Tester",  '.$count6.' ] ,
            
          ["Web Developer",  '.$count7.' ] ,
            
          ["App Developer",  '.$count8.' ]   
          
		   
          


	  ]);

        var options = {
           
		  
		  title:"Team Members Roles",
          is3D: true,
		   pieSliceText: "value",
		   width:400,
           height:200
		   
        };

        var chart = new google.visualization.PieChart(document.getElementById("piechart_3d"));
        chart.draw(data, options);
      }
    </script>';
	
	
	
	
	
	  $array[] =array();
	  if($Counterr==0){
		  $output='<b>No Any Team History </b>';
		  
	  }
	  $array[0]=$output;
	   $array[1]=$output2;
	    $array[2]=$output3;
  echo json_encode($array);  

  
  
  ?>