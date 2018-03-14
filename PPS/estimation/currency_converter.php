<?php
  function convertCurrency($amount, $from, $to){
    $url  = "https://www.google.com/finance/converter?a=$amount&from=$from&to=$to";
    $data = file_get_contents($url);
    preg_match("/<span class=bld>(.*)<\/span>/",$data, $converted);
    $converted = preg_replace("/[^0-9.]/", "", $converted[1]);
    return round($converted, 3);
  }

  
  
  
  
  # Call function 
$am=$_REQUEST['Amount'];
$Fr=$_REQUEST['From'];
$To=$_REQUEST['To'];

  echo ('
<div class="well">
					<div class="row"  > <div class="col-lg-12"  >  <center> <br>   ');
 
  echo '<h2>Currency Rate <br> <b>'.convertCurrency(1,$Fr, $To).'</b>';  
  echo '</h2>';
  if($am!=0)
  echo '<h2>Converted Amount <br> <b>'.convertCurrency($am, $Fr, $To).'</b></h2></div></div></div>';
  else
	  echo '<h2>Converted Amount <br> <b>0</b></h2></div></div></div>';
	  
  ?>
  