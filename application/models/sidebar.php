<?php
$max3 = mysqli_fetch_assoc(mysqli_query($db, "SELECT COUNT(id) AS 'count' FROM categories"));
			$ark['max_cats']=$max3['count'];
			$cats = array();
			for($t=1;$t<=$max3['count'];$t++){
			$name = mysqli_fetch_assoc(mysqli_query($db, "SELECT name FROM categories WHERE id=$t"));
			array_push($cats, array('name'=>"$name[name]", 'id'=>"$t"));	
			}
			$ark['cats']=$cats;
?>