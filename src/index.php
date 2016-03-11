<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en-US">
	<head>
	</head>

	<body>

		<form id="login" action="login.php" method="post">
			<h2>Sign In</h2>  <br>
			* Username:<input type="text" name="username" id="username"> <br> <br>
			* Password:<input type="password" name="password" id="pwd"> <br> <br>
			<input type="submit" name="submit" value="Submit">
		</form>
		<br>
		<a href="registration.php">New users, register here</a>

	</body>
</html>