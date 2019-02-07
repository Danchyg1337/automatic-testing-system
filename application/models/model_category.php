<?php
class Model_Category extends Model
{
	
	public function get_data()
	{	
		global $db;
		
		$ark = array();
			$max = mysqli_fetch_assoc(mysqli_query($db, "SELECT COUNT(id) AS 'count' FROM tasks WHERE id_cat=$GLOBALS[id]"));
			$ark['max_tasks']=$max['count'];
			$tasks = array();
			$quer = mysqli_query($db, "SELECT * FROM tasks WHERE id_cat=$GLOBALS[id]");
			while ($add = mysqli_fetch_assoc($quer)){
			$name1 = $add[name];
			$id = $add[id];
			array_push($tasks, array('name'=>"$name1", 'id'=>"$id"));	
			}
			$ark['tasks']=$tasks;
			
			$cat_name=array();
			$about = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM categories WHERE id=$GLOBALS[id]"));
			array_push($cat_name, array('name'=>$about[name], 'text'=>$about[text]));
			$ark['cat_name']=$cat_name;
			
			include "sidebar.php";
			return $ark;
			

			

		
	}

}
