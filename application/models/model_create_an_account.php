<?php
class Model_Create_an_account extends Model
{
	
	public function get_data()
	{	
		global $db;
		
		$ark = array();
			$max_b = mysqli_fetch_assoc(mysqli_query($db, "SELECT COUNT(id) AS 'count' FROM blogs"));
			$rand_b=0;
			$random_b=array();
			for($t=0;$t<6;$t++){
			$rand_b=rand(1, $max_b['count']);
			$image_b = mysqli_fetch_assoc(mysqli_query($db, "SELECT image FROM blogs WHERE id=$rand_b"));
			$head_b = mysqli_fetch_assoc(mysqli_query($db, "SELECT head FROM blogs WHERE id=$rand_b"));
			$text_b = mysqli_fetch_assoc(mysqli_query($db, "SELECT text FROM blogs WHERE id=$rand_b"));
			$date_b = mysqli_fetch_assoc(mysqli_query($db, "SELECT date FROM blogs WHERE id=$rand_b"));
			array_push($random_b, array('Text'=>"$text_b[text]", 'Head'=>"$head_b[head]", 'Image'=>"$image_b[image]", 'ID'=>"$rand_b", 'Date'=>"$date_b[date]"));
			}
			$ark['random_b']=$random_b;
			
			return $ark;
			
		

			

		
	}

}