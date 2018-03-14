<?php
include("config.php");
date_default_timezone_set("Asia/Karachi");
if(!$connect){
	echo "connection failed";
	
}
else{
	$projId = mysqli_real_escape_string($connect, $_POST["projId"]);
	 
    $effort = mysqli_real_escape_string($connect, $_POST["eff2"]);
    $size = mysqli_real_escape_string($connect, $_POST["size2"]);
	$cost = mysqli_real_escape_string($connect, $_POST["cost2"]);
	$duration = mysqli_real_escape_string($connect, $_POST["time2"]);
	$productdesign = mysqli_real_escape_string($connect, $_POST["productd"]); 
	$detaildesign = mysqli_real_escape_string($connect, $_POST["detaild"]); 
	$codetest = mysqli_real_escape_string($connect, $_POST["codetest"]); 
	$integrate = mysqli_real_escape_string($connect, $_POST["integration"]); 
	$model = mysqli_real_escape_string($connect, $_POST["model"]); 
	
$type="cocomo";
	


	
 $sql3="SELECT * FROM project WHERE projId='$projId'";
						$result3 = mysqli_query($connect, $sql3);
						
						$row3=mysqli_fetch_array($result3);
$pName=$row3['projName'];



$date=date("Y-m-d");

$query = " INSERT INTO metric(pID,type,regDate)  VALUES ('$projId', '$type','$date')";

 
if (mysqli_query($connect, $query)) {
    $last_id = mysqli_insert_id($connect);
 //   echo "New record created successfully. Last inserted ID is: " . $last_id;
 
	$query = " INSERT INTO cocomo_metric(mID,effort,size,cost,duration,pType,pDesign,dDesign,codeTest,intTest)
				VALUES ('$last_id','$effort','$size','$cost','$duration','$model','$productdesign','$detaildesign','$codetest','$integrate')";
	
				if (mysqli_query($connect, $query)){
					 //echo "cocomo record created ";
					 
					echo '<center><div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-check"></i>  <strong>cocomo metric saved to project </strong> '.$pName.'
							</div>
                    </div>
                </div><center>';
					 
					// echo "cocomo metric saved to project ".$pName;
				}
				else {
				echo '<center><div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-check"></i>  <strong>Error: </strong> '. $query . "<br>" . mysqli_error($connect).'
							</div>
                    </div>
                </div><center>';
}
	
	
	
} else {
    echo '<center><div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-check"></i>  <strong>Error: </strong> '. $query . "<br>" . mysqli_error($connect).'
							</div>
                    </div>
                </div><center>';
}
 


}

?>