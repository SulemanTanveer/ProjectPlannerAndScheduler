<?php

										include("config.php");
										$query = "SELECT * FROM ee_metric";
											  
											   $result = mysqli_query($connect, $query);
														
										       $count1 = mysqli_num_rows($result);

										     
											echo $count1;
										?>