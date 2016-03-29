<?php

/*
  CS3715 FINAL PROJECT
  MEMBERS: KELWIN JOANES, OLUWATOMISIN JENROLA, SAAHIL BUDHRANI
  DATE SUBMITTED: 29/03/16
  WEB APP NAME: CHATTY
 */

	// start session
	session_start();

	// get username from session array
	$user = $_SESSION['uName'];

	// retrieve chat message from the post array
	$chat = $_POST['chat'];

	// append username and their respective chat message to a string
	$msg = "<span class=\"user\">$user: </span>" . $chat . "\n";

	// location of chat log file
	$src = "data/log.txt";

	// append the string to the chat log file
	file_put_contents($src, $msg, FILE_APPEND);

	// retrieve all lines of text from the file
	$history = file($src);

	// echo each line as a paragraph
	foreach($history as $msg)
		echo "<p>$msg</p>";
?>