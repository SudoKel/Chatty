<?php
	include('login.php'); // Includes Login Script
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Sign In</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<script src="script/bg-slider.js"></script>
	</head>
	<body>
		<ul>
			<li class="header"><a href="index.php">CHATTY</a></li>
			<li class="right"><a href="registration.php">Sign Up</a></li>
			<li class="right"><a href="index.php">Sign In</a></li>
		</ul>
		<br />
		<br />
		<form id="login" action="" method="post">
			<table id="tbl" align="center">
				<tr>
					<th colspan="2">Sign In</th>
				</tr>
				<tr>
					<td>Username:</td>
					<td>
						<input type="text" name="username" id="uname" placeholder="Username" />
					</td>
				</tr>
				<tr>
					<td>Password:</td>
					<td>
						<input type="password" name="password" id="pwd" placeholder="************" />
					</td>
				</tr>
				<tr align="center">
					<td colspan="2"><input type="submit" name="submit" value="Sign in"></td>
				</tr>
			</table>
		</form>

		<?php echo "<div class=\"error\">$error</div>"; ?>

		<br />
		<div id="signup">Don't have an account? <a href="registration.php">Sign up</a>!</div>

	</body>
</html>