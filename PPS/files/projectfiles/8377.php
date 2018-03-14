 
 <?php
 
  include("config.php");
		  include("config.php");
		   $query = "SELECT * FROM language ";
		   $result = mysqli_query($connect, $query);
            
                     while($row = mysqli_fetch_array($result))
                     { 
						  $query2 = "SELECT * FROM employeelanguage where empId= '7'"; 
		                $result2 = mysqli_query($connect, $query2);
					 
						 
                while($row2 = mysqli_fetch_array($result2))
                     {    
						 if($row2['languageId']==$row['languageId']){
						 echo '<input type="checkbox" class="Languages" name="Languages[]"  id="a'.$row2['languageId'].'" value="'.$row2['languageId'].'" checked>'.$row['languageName'];
						echo '&nbsp&nbsp ';
						$flag=false;
						break;
						}
						else  {
							$flag=true;
						 }
 
						}
						if($flag){
							echo '<input type="checkbox" class="Languages" name="Languages[]"  id="a'.$row['languageId'].'" value="'.$row['languageId'].'">'.$row['languageName'];
						 echo '&nbsp&nbsp ';
						}
						
						
						}
					 

					  
				/*	 
					 if($row2['languageId']==$row['languageId']){
						 echo '<input type="checkbox" class="Languages" name="Languages[]"  id="a'.$row2['languageId'].'" value="'.$row2['languageId'].'" checked>'.$row['languageName'];
						echo '&nbsp&nbsp ';
						$flag=false;
						}
						else  {
							$flag=true;
						 }
 
						}
						if($flag){
							echo '<input type="checkbox" class="Languages" name="Languages[]"  id="a'.$row['languageId'].'" value="'.$row['languageId'].'">'.$row['languageName'];
						 echo '&nbsp&nbsp ';
						}
						
						
						}
	
*/
	?>