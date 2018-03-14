<?php

										include("config.php");
										$query = "SELECT * FROM fp_metric";
											  
											   $result = mysqli_query($connect, $query);
														
										       $count1 = mysqli_num_rows($result);

										     //   echo '<div class="huge">'. $count1.'</div>';
											echo $count1;
										?>