<?php 

	function dd($var, $die=TRUE)
	{
		echo '<pre>';
		var_dump($var);
		echo '</pre>';
		if ($die) die;
	}

 ?>

