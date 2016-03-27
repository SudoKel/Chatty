<?php
	session_start();

	// unset all session variables
	$_SESSION = array();

	// destroy the session
	session_destroy();


	header("location: index.php");
?>