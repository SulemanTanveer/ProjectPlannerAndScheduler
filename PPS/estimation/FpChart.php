
<?php
include("config.php"); 
 
$output='';

 $output.=' <div id="columnchart_material"></div>';
 $output.="<script >
      google.charts.load('current', {'packages':['corechart', 'bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
		  var chartDiv = document.getElementById('columnchart_material');
        var data = google.visualization.arrayToDataTable([
          ['Projects', 'Actual Cost', 'Function Point Cost'],";
		  
		  
		$acost = array();
		$fpcost = array();
		$pname = array();
		
		$query = "SELECT * FROM project Where projStatus='Completed'";
		$result = mysqli_query($connect, $query);
            $count=0;
                     while($row = mysqli_fetch_array($result))
					 
                     {
						 $pname[$count]=$row['projName'];
						 
						 
						 $query1 = "SELECT * FROM metric WHERE pID='{$row['projId']}' AND type='actual'";
						 $result1 = mysqli_query($connect, $query1);
						 $row1 = mysqli_fetch_array($result1);
						 
						 $query11 = "SELECT * FROM actualmetrics WHERE mID='{$row1['mID']}'";
						 $result11 = mysqli_query($connect, $query11);
						 $row11 = mysqli_fetch_array($result11);
						 $acost[$count]=$row11['cost'];
						 
						 
						 
						 $query2 = "SELECT * FROM metric WHERE pID='{$row['projId']}' AND type='fp'";
						 $result2 = mysqli_query($connect, $query2);
						 $row2 = mysqli_fetch_array($result2);
						
						 $query22 = "SELECT * FROM fp_metric WHERE mID='{$row2['mID']}'";
						 $result22 = mysqli_query($connect, $query22);
						 $row22 = mysqli_fetch_array($result22);
						 $fpcost[$count]=$row22['cost'];
						
						$count++;
					 }
	 
					 
 
		 
		  
		  
		  
		  
		  
		  for( $i=0;$i<sizeof($pname);$i++)
		  {
		  		  $output.= "['". $pname[$i]."',".$acost[$i].','.$fpcost[$i].'],';
		  }
     $output.="   ]);
	 
	 
	 
	  var options = {
         
          series: {
            0: {targetAxisIndex: 0},
            1: {targetAxisIndex: 1}
          },
          title: 'Actual Cost VS Function Point Estimated Cost',
          vAxes: {
            // Adds titles to each axis.
            0: {title: 'Rupees'},
            1: {title: 'Amount'},
			
          }
	 
	  
	 

        
        };

      
		
		function drawClassicChart() {
          var classicChart = new google.visualization.ColumnChart(chartDiv);
          classicChart.draw(data, options);
         
        }
drawClassicChart();
		
		
		
		function resizeHandler () {
        drawChart()
    }
    if (window.addEventListener) {
        window.addEventListener('resize', resizeHandler, false);
    }
    else if (window.attachEvent) {
        window.attachEvent('onresize', resizeHandler);
    }
		
		
		
      }
    </script>
";
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
 ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	
	
	
	
	  $array[] =array();
	  $array[0]=$output;
	  
  echo json_encode($array);  
  
  
  
  ?>