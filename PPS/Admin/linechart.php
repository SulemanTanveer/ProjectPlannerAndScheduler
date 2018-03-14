
<?php
  include("config.php");
$file1 = file_get_contents("../js/plugins/morris/template.js");
@ $fp = fopen("../js/plugins/morris/template.js", 'r+');

$path2 = "../js/plugins/morris/morris-data.js";
@ $fp2 = fopen("../js/plugins/morris/morris-data.js", 'wb');
$file2 = file_get_contents($path2);


if ($file1 !== $file2)
{
	file_put_contents($path2, $file1);
 $output0="";
 $output1="";
  $output2="";
$file = "../js/plugins/morris/morris-data.js";
$content = file($file); //Read the file into an array. Line number => line content

             
			 if(isset($_POST['to']) && isset ($_POST['from']) ){
				        $minYear=(int)$_POST['from'];
						 $maxYear=(int)$_POST['to'];
			 }
             else{
						 $sql="SELECT MIN(`regDate`) FROM `employee`";
						 $result = mysqli_query($connect, $sql);
						 $row = mysqli_fetch_array($result);
						 $minYear=(int)substr($row[0],0,4);
						 $maxYear=(int)date("Y");
			 }
						
						for($i=$minYear;$i<=$maxYear;$i++){
					
                    					
				    $query1= "SELECT * FROM employee WHERE YEAR(`regDate`) = '$i'";
				   $result1 = mysqli_query($connect, $query1);
				  $count=mysqli_num_rows( $result1);
				 
				  if($count >0){
				   $output0.="{year:'".$i."',employees:".$count."},";
					
				   }
					
					
           

					}



		 $query = "SELECT * FROM employee WHERE jobStatus='Employee'";
		   $result = mysqli_query($connect, $query);
		   $count = mysqli_num_rows($result);
	      $query2 = "SELECT * FROM employee WHERE jobStatus='Ex-Employee'";
		   $result2 = mysqli_query($connect, $query2);
		   $count2 = mysqli_num_rows($result2);
		 
		 $output1='{label: "Current Employees",value:'.$count.'},{label: "Ex-Employees",value:'.$count2.'}';
         
		 
		   $query3 = "SELECT * FROM employee WHERE workStatus='Active'";
		   $result3 = mysqli_query($connect, $query3);
		   $count3 = mysqli_num_rows($result3);
	       $query4 = "SELECT * FROM employee WHERE workStatus='In-Active'";
		   $result4= mysqli_query($connect, $query4);
		   $count4 = mysqli_num_rows($result4);
		   $query5 = "SELECT * FROM employee WHERE workStatus='On Leave'";
		   $result5= mysqli_query($connect, $query5);
		   $count5 = mysqli_num_rows($result5);
		   
		 $output2='{label: "Active Employees",value:'.$count3.'},{label: "In Active Employees",value:'.$count4.'},{label: "On Leave Employees",value:'.$count5.'}';
	 
	 
	 foreach($content as $lineNumber => &$lineContent) { //Loop through the array (the "lines")
   
    if($lineNumber == 13) { //Remember we start at line 0.
        
		   $lineContent .= $output0. PHP_EOL;

   
	
	}
   
   if($lineNumber == 36) { //Remember we start at line 0.
        
		   $lineContent .= $output1. PHP_EOL;

   
	
	}
	 if($lineNumber == 54) { //Remember we start at line 0.
        
		   $lineContent .= $output2. PHP_EOL;

   
	
	}
	
}

$allContent = implode("", $content); //Put the array back into one string
file_put_contents($file, $allContent); //Overwrite the file with the new content
;



}


?>