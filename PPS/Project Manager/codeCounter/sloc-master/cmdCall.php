



<?php
$files=0;
$index=0;
$SourceCode=0;

$total=0;
$source=0;
$empty=0;
$comment=0;
$single=0;
$block=0;
$mixed=0;
$todo=0;


exec('node index.js', $out);
//var_dump($out);
$files= sizeof($out)/8;
$output1="\n Total files: ".$files;
while($files>0)
{
	$total=$total+ filter_var($out[$index++], FILTER_SANITIZE_NUMBER_INT); 
	$source=$source+filter_var($out[$index++], FILTER_SANITIZE_NUMBER_INT); 
	$comment=$comment+filter_var($out[$index++], FILTER_SANITIZE_NUMBER_INT); 
	$single=$single+filter_var($out[$index++], FILTER_SANITIZE_NUMBER_INT); 
	$block=$block+filter_var($out[$index++], FILTER_SANITIZE_NUMBER_INT); 
	$mixed=$mixed+filter_var($out[$index++], FILTER_SANITIZE_NUMBER_INT); 
	$empty=$empty+filter_var($out[$index++], FILTER_SANITIZE_NUMBER_INT); 
	$todo=$todo+filter_var($out[$index++], FILTER_SANITIZE_NUMBER_INT); 
	$files--;
}
$output1.= "\n Total lines: ".$total;
$output1.= "\n Source lines: ".$source;
$output1.= "\n Empty lines: ".$empty;
$output1.= "\n Comment lines: ".$comment;
$output1.= " \n Single line: ".$single;
$output1.= "\n  Block: ".$block;
$output1.= "\n mixed: ".$mixed;
 

$SourceCode=($total-$empty)/1000;
 
 $array[] =array();
	  $array[0]=$output1;
	   $array[1]=$SourceCode;
	   echo json_encode($array);
	
?> 

