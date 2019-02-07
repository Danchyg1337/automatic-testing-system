<?php
function clearArr($array){
	for($t2=0;$t2<sizeof($array);$t2++){
			$array[$t2]=trim($array[$t2], " \n
			");
		}
	return $array;
}

?>