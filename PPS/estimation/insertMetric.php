<?php
include("config.php");
date_default_timezone_set("Asia/Karachi");
if(!$connect){
	echo "connection failed";
	
}
else{
	$projId = mysqli_real_escape_string($connect, $_POST["projId"]);
	$functionPoint = mysqli_real_escape_string($connect, $_POST["fp1"]);  
    $effort = mysqli_real_escape_string($connect, $_POST["eff1"]);
    $size = mysqli_real_escape_string($connect, $_POST["size1"]);
	$cost = mysqli_real_escape_string($connect, $_POST["cost1"]);
	$duration = mysqli_real_escape_string($connect, $_POST["time1"]);
	$type="fp";

 $sql3="SELECT * FROM project WHERE projId='$projId'";
						$result3 = mysqli_query($connect, $sql3);
						
						$row3=mysqli_fetch_array($result3);
$pName=$row3['projName'];

$date=date("Y-m-d");
echo $date;

$query = " INSERT INTO metric(pID,type,regDate)  VALUES ('$projId', '$type','$date')";

 
if (mysqli_query($connect, $query)) {
    $last_id = mysqli_insert_id($connect);
 //   echo "New record created successfully. Last inserted ID is: " . $last_id;
 
	$query = " INSERT INTO fp_metric(mID,functionPoint,effort,size,cost,duration)
				VALUES ('$last_id', '$functionPoint','$effort','$size','$cost','$duration')";
	
				if (mysqli_query($connect, $query)){
					 //echo "FunctionPoint record created ";
					 
					echo '<center><div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-check"></i>  <strong>FunctionPoint metric saved to project </strong> '.$pName.'
							</div>
                    </div>
                </div><center>';
					 
					// echo "FunctionPoint metric saved to project ".$pName;
				}
				else {
				echo '<center><div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-check"></i>  <strong>Error: </strong> '. $query . "<br>" . mysqli_error($connect).'
							</div>
                    </div>
                </div></center>';
}
	
	
	
} else {
    echo '<center><div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-check"></i>  <strong>Error: </strong> '. $query . "<br>" . mysqli_error($connect).'
							</div>
                    </div>
                </div></center>';
}
 


}

?>