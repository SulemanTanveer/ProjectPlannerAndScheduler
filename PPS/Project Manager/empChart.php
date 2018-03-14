 <?php
 
 
 $connect = mysqli_connect("localhost", "root", "", "fyp");
 $employee_id=$_POST['employee_id'];
 
  $role_name=array();
$role_count=array();
  $query144 = "select * from role";
$result144 = mysqli_query($connect,$query144);
$j=0;
 while($row144 = mysqli_fetch_array($result144)){
        $id=$row144['roleId'];
		$role_name[$j]=$row144['roleName'];
		
$query14 = "select * from employeeroles WHERE   roleId='$id' AND empID='$employee_id'";
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
  $output='';
  
  
 $output.="
    <script  >
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);
 
      function drawChart() {
        var data = new google.visualization.arrayToDataTable([
          ['Roles', 'Years'],";
		 
for($i=0;$i<sizeof($role_name);$i++)
		{
			
			
		 $output.=	 "['".$role_name[$i]."',".$role_count[$i]."],";
			
			
			
			
		}		
		 
		
      $output.=" ]);     var options = {
           
          width: 800,
		  height: 300,
          legend: { position: 'none' },
         
          bars: 'horizontal', // Required for Material Bar Charts.
          axes: {
            x: {
              0: { side: 'top', label: 'Experience'} // Top x-axis.
            }
          },
          bar: { groupWidth: '90%' }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        chart.draw(data, options);
		 
		 
		 
					
      };
	  
	 $(window).resize(function(){
  drawChart();
  
});
		
    </script>
  
  ";
    
  $output.='<br><div class="row"  >
                     <div class="col-lg-12">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-fw fa-bar-chart-o"></i>Employee roles and experince</h3>
                            </div>
                            <div class="panel-body"><div id="top_x_div"    ></div> <div   >

			 </div>  
			  </div> 
			  </div>  
			  </div>
			
				</div>'; 
	
	
	echo $output;
	?>