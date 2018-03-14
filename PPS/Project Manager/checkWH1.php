<?php
 
 date_default_timezone_set('Asia/Karachi');
 
  $start=$_POST['startDate'];
  $end=$_POST['deadline'];
   $empID=$_POST['empId'];
 $fileName2=$_POST['empId'];
 $incSat=$_POST['incSat'];
  $fileName="../files/empFiles/".$fileName2.".txt";
$file       = file($fileName);
$line_number1 = false;
$line_number2 = false;

  
   $file = fopen($fileName,"r");
$counter=0;
 
while(! feof($file))
  {
  $line=fgets($file);
  
  if(substr($line,4,10)==$start){
    $line_number1=$counter;
  }
    if(substr($line,4,10)==$end){
    $line_number2=$counter;
  }
  
  $counter++;
  }
 
 
fclose($file);
if($line_number1!=false){
 if(!$line_number2){
	  
  count_last_date($fileName,$end);
	if( count_last_date($fileName,$end)){
	  graph( $fileName,$line_number1,$end,$start,$empID);
	}
 }
 else{
	 graph( $fileName,$line_number1,$end,$start,$empID);
	 
 }
 
}
 function count_last_date($fileName,$end){
	 
	
		 
   $contents = file($fileName, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
	 
	  $size = count($contents);
		  $line = $contents[$size-1] ;
	
	
					 
					$date = new DateTime(substr($line,4,10) );
					$date->modify('+1 day');
					  $start= $date->format('Y-m-d');
				 	 $end = date($end);
					$date1 = new DateTime( $end);
					$date1->modify('+1 day');
					  $end= $date1->format('Y-m-d');
$txt='';

					$begin = new DateTime($start );
					$end = new DateTime($end );

					$daterange = new DatePeriod($begin, new DateInterval('P1D'), $end);

					foreach($daterange as $date){
						if($date->format('l')=='Sunday')
						{
							$txt.=  substr($date->format('l'),0,3).' '.$date->format("Y-m-d")."  0\n";
						}
						else{
							
							$txt.=  substr($date->format('l'),0,3).' '.$date->format("Y-m-d")."  8\n";
						}
	 
					}
	 file_put_contents($fileName, $txt.PHP_EOL , FILE_APPEND | LOCK_EX);
	   
	 $lines = file($fileName);
 
// Pop the last item from the array 
array_pop($lines);
 
// Join the array back into a string
$file = join('', $lines);
 
// Write the string back into the file 
$file_handle = fopen($fileName, 'w');
fputs($file_handle, $file);
fclose($file_handle);
	   
	    
        
	   
	   
 return true;
 
 }
 
function graph( $fileName,$line_number1,$end,$start,$empID){
	 $line_number2='';
 include("config.php");    
  $query = "SELECT * FROM employee WHERE empId='$empID'";
	$result = mysqli_query($connect, $query);
  $row = mysqli_fetch_array($result);
  $empName=$row["empName"];
 $file = fopen($fileName,"r");
$counter=0;
 
while(! feof($file))
  {
  $line=fgets($file);
  
   
   if(substr($line,4,10)==$end){
	   
     $line_number2=$counter;
  }
  
  $counter++;
  }
 
 
fclose($file);

 $date = strtotime($end);
 $date2 = strtotime($start);
 $y = date("Y", $date);	
$y2 = date("Y", $date2);
	
	if($line_number2!=''){
	if($y==$y2){
		 
  $output2='  
 <div id="calendar_basic"  style="height:160px"  ></div><br>';
	
	$hours= emp_avaiable_wh($fileName,$line_number1,$line_number2);
 if($hours==0){
  $output2.=" <center><b style='font-size: 30px;'>Available Hours: </b> <b class='huge' style=' color:red'>".$hours."</b> </center><br>";
 }else{
 $output2.=" <center><b style='font-size: 30px;'>Available Hours: </b> <b class='huge' style=' color:green'>".$hours."</b> </center><br>";
 }	}
else{
	 
	$output2='  
 <div id="calendar_basic" style="height:300px"   ></div><br>';
 $hours= emp_avaiable_wh($fileName,$line_number1,$line_number2);
 if($hours==0){
  $output2.=" <center><b style='font-size: 30px;'>Available Hours: </b> <b class='huge' style=' color:red'>".$hours."</b> </center><br>";
 }else{
 $output2.=" <center><b style='font-size: 30px;'>Available Hours: </b> <b class='huge' style=' color:green'>".$hours."</b> </center><br>";
 }
}
	}

 
 $output2.='
    <script type="text/javascript">
     google.charts.load("current", {packages:["calendar"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
       var dataTable = new google.visualization.DataTable();
       dataTable.addColumn({ type: "date", id: "Date" });
       dataTable.addColumn({ type: "number", id:"Won/Loss" });
       dataTable.addRows([';
	 $counter55=0; 
  $taskfileName='';	 
 
$lines = file($fileName);
$myflag=true;

   $taskfileName="../files/taskWorkHourFiles/".$_POST['taskId'].".txt";
	  $taskLines = file($taskfileName);
	  $file = fopen($taskfileName,"r");
while(! feof($file))
  {
  $line=fgets($file);
     $counter55++;
 }
  $counter55--;
 
 $counter2=0;
 for($i=$line_number1;$i<=$line_number2;$i++){

	  
	  
	   $date = strtotime(substr($lines[$i],4,10));
 	 $m = date("m", $date)-1 ;
 $d = date("d", $date);
 $y = date("Y", $date);	   
	
  
  
		
		 if($counter2<$counter55){  
	if( substr($lines[$i],4,10) == substr($taskLines[$counter2],4,10)){
	 	 
   $taskReplacehour=(int)substr($taskLines[$counter2],16,17);
     $empReplacehour=(int)substr($lines[$i],16,17);
	$add= $taskReplacehour+ $empReplacehour;

	 $output2.="  [ new Date( ". $y.",".$m.",".$d."),".$add."],";
	$counter2++;
	}
	else{ 
	
	
	if($_POST['incSat']=='1'){
  
		$output2.="  [ new Date( ". $y.",".$m.",".$d."),".substr($lines[$i],16,17)."],";
 }
 else{
	 
	  if(substr($lines[$i],0,3)=='Sat'){
		  
	 $output2.="  [ new Date( ". $y.",".$m.",".$d."),0],";
	  }
	  else{
		   $output2.="  [ new Date( ". $y.",".$m.",".$d."),".substr($lines[$i],16,17)."],";
		  
	  }
 }
		
		
		
		
	}
	}
	else{ 
	
	
	
	if($_POST['incSat']=='1'){
  
		$output2.="  [ new Date( ". $y.",".$m.",".$d."),".substr($lines[$i],16,17)."],";
 }
 else{
	 
	  if(substr($lines[$i],0,3)=='Sat'){
		  
	 $output2.="  [ new Date( ". $y.",".$m.",".$d."),0],";
	  }
	  else{
		   $output2.="  [ new Date( ". $y.",".$m.",".$d."),".substr($lines[$i],16,17)."],";
		  
	  }
 }
	
	
	
	
	
	
	
	}
 } 
   
	 
	 
 
	 

	 $output2.='      
         ]);

       var chart = new google.visualization.Calendar(document.getElementById("calendar_basic"));

       var options = {
     title: "'.$empName.' Work Hour  Schedule",
     
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
    </script>';

 
echo $output2; 
}


 function emp_avaiable_wh($fileName,$line_number1,$line_number2){
 $empTotal_WH=0;
  
$lines = file($fileName); 
$taskfileName="../files/taskWorkHourFiles/".$_POST['taskId'].".txt";
	  $taskLines = file($taskfileName); 
	  $file = fopen($taskfileName,"r");
	  $counter55=0;
while(! feof($file))
  {
  $line=fgets($file);
     $counter55++;
 }
   $counter55--;

	    $counter2=0;
if($_POST['incSat']=='1') {
for($i=$line_number1;$i<=$line_number2;$i++){
	if($counter2<$counter55){
	  if(substr($lines[$i],4,10)==substr($taskLines[$counter2],4,10)){
		  
		  $cont2= (int)substr($taskLines[$counter2],16,17)+(int)substr($lines[$i],16,17);
		 $counter2++; 
	  }
	 else{
		 $cont2= substr($lines[$i],16,17);
	 }
	 
	}
	 else{
		 $cont2= substr($lines[$i],16,17);
	 }
	
	$empTotal_WH=$empTotal_WH+$cont2;
	
}
$flag=true;
}
 else{
	 
	for($i=$line_number1;$i<=$line_number2;$i++){
	
	  if(substr($lines[$i],0,3)=='Sat'){
		  
		  
	  }
	 else{
	 
	if($counter2<$counter55){
	  if(substr($lines[$i],4,10)==substr($taskLines[$counter2],4,10)){
		  
		  $cont2= (int)substr($taskLines[$counter2],16,17)+(int)substr($lines[$i],16,17);
		 $counter2++; 
	  }
	 else{
		 $cont2= substr($lines[$i],16,17);
	 }
	 
	}
	 else{
		 $cont2= substr($lines[$i],16,17);
	 }
	 $empTotal_WH=$empTotal_WH+$cont2;
	 
	 }
} 
	 
	$flag=false; 
	 
 }
  
  return $empTotal_WH;
  
  }
?>