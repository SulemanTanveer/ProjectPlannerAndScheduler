 <?php
 $connect = mysqli_connect("localhost", "root", "", "fyp");
  $output='<div id="top_x_div"    ></div> 			';
  
  
  
  
 $output.="
    <script  >
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Roles', 'Years'],";
		 
		 $query = "SELECT * FROM rolls WHERE empId= '".$_POST["employee_id"]."'";
 $result = mysqli_query($connect, $query);

    while($row = mysqli_fetch_array($result))
    {
		 $output.=' ["'.$row['rollName'].'", '.$row['experience'].'    ],';
		
		
	}
		 
		 
		
      $output.=" ]);     var options = {
          title: 'Employee roles and experince',
          width: 800,
		  height: 300,
          legend: { position: 'none' },
          chart: { title: 'Employee roles and experince'  },
          bars: 'horizontal', // Required for Material Bar Charts.
          axes: {
            x: {
              0: { side: 'top', label: 'Years'} // Top x-axis.
            }
          },
          bar: { groupWidth: '90%' }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        chart.draw(data, options);
      };
    </script>
  
  ";
    
  
	
	
	echo $output;
	?>