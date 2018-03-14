
<?php
$connect = mysqli_connect("localhost", "root", "", "fyp");
 $output='';
  $subtaskId=$_POST["proj_id"];
$query="Select* from taskassignment where taskId='$taskId'";
 $result = mysqli_query($connect, $query); 
if(mysqli_num_rows( $result)==1){
	
	  $fileName="../files/taskWorkHourFiles/".$taskId.".txt";
	  $output2=' ';
	if(file_exists ($fileName)) {
	 
$file = fopen($fileName,"r");
$counter=0;
 
while(! feof($file))
  {
  $line=fgets($file);
   $counter++;
  }
 $counter--;
fclose($file);

	
	
$lines = file($fileName);
$output2='';
$workhrs=0;
$total=0;
 for($i=0;$i<$counter;$i++){

	  
	  
 $workhrs = (int)substr($lines[$i],16,17);
 $total=$total+$workhrs;
  
		
 }
 $output='';
 for($i=0;$i<$counter;$i++){

	  
	  
 $date = strtotime(substr($lines[$i],4,10));
 $m = date("m", $date)-1 ;
 $d = date("d", $date);
 $y = date("Y", $date);	   
	
 
  
		$output.="  [ new Date( ". $y.",".$m.",".$d."),".substr($lines[$i],16,17)."],";
 } 
	$output2.=" <center><b style='font-size: 30px;'>Task Hours: </b> <b class='huge' style=' color:green'>".$total."</b> </center><br>";
		}else{
		 $output='No';
		 
	 }
 }
	 else{
		 $output='No';
		 
	 }
	 
	/*$output2.=' 
	

 <script type="text/javascript">
     google.charts.load("current", {packages:["calendar"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
       var dataTable = new google.visualization.DataTable();
       dataTable.addColumn({ type: "date", id: "Date" });
       dataTable.addColumn({ type: "number", id:"Won/Loss" });
       dataTable.addRows([';
	  
	  
		
		
		 $output2.=$output.']);';
		
		
	$output2.='      
      

       var chart = new google.visualization.Calendar(document.getElementById("calendar_basic"));

       var options = {
     title: " Work Hour  Schedule",
     
    calendar: {
        underYearSpace: 5, 
		cellSize:15, // Bottom padding for the year labels.
      yearLabel: {
        fontName:"Times-Roman",
        fontSize: 23,
        color: "#1A8763",
        bold: true,
        italic: true
      }
    }
  };

       chart.draw(dataTable, options);
   }
   chart.draw(data, options);
	  $(window).resize(function(){
        drawChart();
        });  </script>'; 

$output2.=' 
							<div id="calendar_basic"></div>
			 ';
				
	*/			
		

  			
 		
				
				
if($output=='No')
{
	 
}
else{
	echo $output2;
}
	
	 
	 
?>