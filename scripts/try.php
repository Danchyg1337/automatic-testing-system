<?php
$file = 'yeah.py';



if(end(explode(".", $file))=='py'){
$command = escapeshellcmd($file);
$output = shell_exec($command);
}
else{
	
}
$input = file('nums.txt');
for($t=0;$t<sizeof($input);$t++){
	$input[$t]=$input[$t][0];
}
print_r($input);
echo "<br>";
$y = explode(' ', $output);
$y = array_diff($y, array(''));
print_r($y);echo "<br>";
var_dump($y);echo "<br>";
var_dump($input);
if($y == $input){
	echo "hjg";
}
?>