<?php
class Model_Task extends Model
{
	
	public function get_data()
	{	
		global $db;
		
		$ark = array();
			$task=array();
			$about = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM tasks WHERE id=$GLOBALS[id]"));
			array_push($task, array('name'=>$about[name], 'text'=>$about[text], 'input'=>$about[input], 'output'=>$about[output]));
			$ark['task']=$task;
			
			include "sidebar.php";
			return $ark;
			

			

		
	}

}
