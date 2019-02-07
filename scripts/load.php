<?php
if($_POST['select']=="c++"){
	$codefile="code.cpp";
	$freopen = "";
	$fileCr = $_SERVER['DOCUMENT_ROOT'].'/create.exe';
	$fileCo = $_SERVER['DOCUMENT_ROOT'].'/compare.exe';
	$fileRu = $_SERVER['DOCUMENT_ROOT'].'/run.exe';
	
	$file = fopen($codefile, 'w');
	$test = fwrite($file, $freopen.$_POST[code]); // Write code
	
	if($test){
	
	}
	else{
		header("Location: /result?error=Error while writing code");                                                                      // EXIT 
	}
	fclose($file);
	
	$create = exec($fileCr);
	if($create){
		header("Location: /result?error=Error while compiling!");	                                                                      // EXIT 
	}
}
if($_POST['select']=="python"){
	require_once "clearArray.php";
	$codefile="code.py";
	$fileC = 'code.py';
}


for($t=1;$t<=10;$t++){
	$fileCL = fopen('../place/cpp/error.txt', 'r');
	fclose($fileCL);
	if($_POST['select']=="c++"){
		$run = exec($fileRu." $_GET[id] $t");
		if($run){
			header("Location: /result?error=Error while running!");                                                                      // EXIT 
		}
		$compare = exec($fileCo." $_GET[id] $t");
		if($compare){
			header("Location: /result?error=Failed on test number $t");                                                                      // EXIT 
		}
		$file = fopen('../place/cpp/error.txt', 'r');
		if(fread($file, filesize('../place/cpp/error.txt')) == "Done!"){
			if($t==10){
				header("Location: /result?error=All correct!");
			}
		}
		else{
			header("Location: /result?error=Failed on test number $t");                                                                      // EXIT 
			break;
		}
		fclose($file);
	}
	
	
	if($_POST['select']=="python"){
		$freopen = "import sys\nsys.stdin = open('../input/$_GET[id]/$t.txt', 'r')\n";
		$file = fopen($codefile, 'w');
		$test = fwrite($file, $freopen.$_POST[code]); // Write code
		
		if($test){
			
		}
		else{
			header("Location: /result?error=Error while writing code");
			break;                                                                      // EXIT 
		}
		fclose($file);
		
	
		$command = escapeshellcmd($fileC);
		$output = shell_exec($command);
		$input = file("../output/$_GET[id]/$t.txt");
		//Clean array server
		$input=clearArr($input);
		
		//Clean input client
		$y = explode(' ', $output);
		$y = array_diff($y, array(''));
		$y = clearArr($y);
		//Degug
		//print_r($input);echo "<br>";
		//print_r($y);echo "<br>";
		//var_dump($y);echo "<br>";
		//var_dump($input);echo "<br>";
	
		if($y == $input){
			if($t==10){
				header("Location: /result?error=All correct!");
			}
		}
		else{
			header("Location: /result?error=Failed on test number $t");                                                                      // EXIT 
			break;
		}
	}
}
?>