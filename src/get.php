<?php 
	// location of chat log file
	$src = "data/log.txt";
	
	// retrieve all lines of text from the file
	$history = file($src);

	// echo each line as a paragraph
	foreach($history as $msg)
		echo "<p>$msg</p>";
?>