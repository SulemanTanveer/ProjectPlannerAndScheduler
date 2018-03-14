<?php

										include("config.php");
										$query1 = "SELECT * FROM ucp_metric";
											  
											   $result1 = mysqli_query($connect, $query1);
														
										       $count2 = mysqli_num_rows($result1);

										        echo  $count2;

										?>