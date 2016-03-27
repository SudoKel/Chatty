<?php
	session_start();

	$user = $_SESSION['uName'];

	$servername = "mysql.cs.mun.ca";
	$username = "cs3715_kssj13";
	$password = "orlando1";
	$database = "cs3715_kssj13";

	$conn = new mysqli($servername, $username, $password, $database);
	$update = "update Info set online = 0 where username = '$user';";

	$conn->query($update);

	$sql = "select username from Info where online = 1;";

	$result = $conn->query($sql);

	if($result->num_rows == 0)
	{
		$src = "data/log.txt";
		file_put_contents($src, "");
	}

	$conn->close();

	// unset all session variables
	$_SESSION = array();

	// destroy the session
	session_destroy();


	header("location: index.php");
?>