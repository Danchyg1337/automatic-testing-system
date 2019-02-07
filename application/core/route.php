<?php

class Route{
	
	static function start(){
		$controller_name = "Main";
		$action_name = "index";
		
		$routes = explode('/', $_SERVER["REQUEST_URI"]);
		
		if(!empty($routes['1'])){
			$sign = explode('?', $routes['1']);
			unset($GLOBALS['get']);
			$controller_name = $sign['0'];
			if(!empty($sign['1'])){
			$variab = explode('=', $sign['1']);
			
			$GLOBALS["${variab[0]}"]=$variab['1'];
			}
		}
		
		if(!empty($routes['2'])){
			$action_name = $routes['2'];
		}
		
		$model_name = "model_".$controller_name;
		$controller_name = "Controller_".$controller_name;
		$action_name = "action_".$action_name;
		
		$model_file = strtolower($model_name).".php";
		$model_path = "application/models/".$model_file;
		
		if(file_exists($model_path)){
			include "application/models/".$model_file;
		}
		
		$controller_file = strtolower($controller_name).".php";
		
		$controller_path = "application/controllers/".$controller_file;
		
		if(file_exists($controller_path)){
			include "application/controllers/".$controller_file;
		}
		else{
			Route::ErrorPage404();
		}
		
		
		$controller = new $controller_name;
		$action = $action_name;
		
		if(method_exists($controller, $action))
		{	
			$controller->$action();
		}
		else
		{
			Route::ErrorPage404();
		}
		
		
	}
	
	static function ErrorPage404(){
		header("Location: application/views/404.php");
		
	}
	
	
}