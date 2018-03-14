<?php
	
include("config.php");
$lang=$_REQUEST['LanguageID'];
	$sql2="SELECT * FROM project WHERE projStatus!='Completed' AND languageId='".$lang."'";
     $result2 = mysqli_query($connect, $sql2);
	 
	 
	 
	  $output = '';
	$output .= ' <table id="example3" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
	<thead>
            <tr>
                <th></th>
                <th>Id</th>
                <th>Name</th>
                 <th>Status</th>
                
            </tr>
        </thead><tbody>';
$count=0;
     while ($row2=mysqli_fetch_array($result2)) {
		 $var=$row2['projId'];
		
	 $sql3="SELECT * FROM metric WHERE pID='$var' AND type='ucp'";
     $result3 = mysqli_query($connect, $sql3);
	 if(mysqli_num_rows($result3)>0)
	 {
		
	 }
	 else
	 {
     $output .=  "<tr><td><input type = 'radio' onclick='setId()' name = 'project' value = '{$row2['projId']}' /></td>"."<td>{$row2['projId'] }</td>"."<td>{$row2['projName']}</td>"."<td>{$row2['projStatus']}</td>";
	 $count++;
	 }
                ;
    }
    $output .= '</tbody></table>';
	
	  if( $count==0){
		 $sql22="SELECT * FROM language WHERE languageId='".$lang."'";
		 $result22 = mysqli_query($connect, $sql22);
		 $row22=mysqli_fetch_array($result22);
		 
		 
		 echo '<center><div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <strong>There is no any project found in '.$row22['languageName'].' to add estimation </strong>
							</div>
                    </div>
                </div><center>';
		 
		 
	 }
	
    echo $output;
	
?>		
<script>
/// this function will make the project table responsive with live search//	
 $(function(){
    var table = $('#example3').DataTable( {
        responsive: true
    } );
 
    
  });	</script>