
<?php
$file1 = file_get_contents("fileTemplate.php");
@ $fp = fopen("fileTemplate.php", 'r+');
$path2 = "download.php";
@ $fp2 = fopen("download.php", 'wb');
$file2 = file_get_contents($path2);
if ($file1 !== $file2)
{
	file_put_contents($path2, $file1);
	
 $output="";
$file = "download.php";
$content = file($file); //Read the file into an array. Line number => line content
$data=$_POST['proj_id'];
list($name, $path) = explode("-", $data);


$output='';
$output.='$file="'.$path.'";';
$output.='$file2="'.$name.'";';

foreach($content as $lineNumber => &$lineContent) { //Loop through the array (the "lines")
   if($lineNumber == 8) { //Remember we start at line 0.
   
		   $lineContent .= $output. PHP_EOL;
	
	}
}

$allContent = implode("", $content); //Put the array back into one string
file_put_contents($file, $allContent); //Overwrite the file with the new content

}
?>