<?php 
	$src = "data/log.txt";
	
	$history = file($src);

	foreach($history as $msg)
		echo "<p>$msg</p>";
?>