<!DOCTYPE html>
<html>
<body>



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
echo "<br> total files are".$files;
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
echo "<br>total: ".$total;
echo "<br>source: ".$source;
echo "<br>empty: ".$empty;
echo "<br>comment: ".$comment;
echo "<br>single: ".$single;
echo "<br>block: ".$block;
echo "<br>mixed: ".$mixed;
echo "<br>todo: ".$todo;

$SourceCode=$total-$empty;



?> 

</body>
</html>