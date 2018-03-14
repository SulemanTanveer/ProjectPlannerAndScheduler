 <?php
 
 $connect = mysqli_connect("localhost", "root", "", "fyp");
  $output='<div id="top_x_div"    ></div> 			';
  
   $data = $_POST["employee_id"];
  
list($empId, $notiId) = explode("-", $data);
  
   
 
  $role_name=array();
$role_count=array();
  $query144 = "select * from role";
$result144 = mysqli_query($connect,$query144);
$j=0;
 while($row144 = mysqli_fetch_array($result144)){
        $id=$row144['roleId'];
		$role_name[$j]=$row144['roleName'];
		
$query14 = "select * from employeeroles WHERE   roleId='$id' AND empID='$empId'";
$result14 = mysqli_query($connect,$query14);
 
 if(mysqli_num_rows($result14)>0){
	 $row14 = mysqli_fetch_array($result14);
	  $role_count[$j]=$row14['experience']  ;

 }
 else{
	 $role_count[$j]=0;
	 
 }
 $j++;
 }
  
 $output.="
    <script  >
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Roles', 'Years'],";
		 
	  for($i=0;$i<sizeof($role_name);$i++)
		{
			
			
		 $output.=	 "['".$role_name[$i]."',".$role_count[$i]."],";
			
			
			
			
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