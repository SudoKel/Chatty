<?php
	session_start();

	$user = $_SESSION['uName'];
	$chat = $_POST['chat'];

	$msg = $user . ": " . $chat . "\n";
	$src = "data/log.txt";

	file_put_contents($src, $msg, FILE_APPEND);

	$history = file($src);

	foreach($history as $msg)
		echo "<p>$msg</p>";
?>