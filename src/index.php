<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Sign In</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
	</head>
	<body>
		<ul>
			<li class="header"><a href="index.php">CHATTY</a></li>
			<li class="right"><a href="registration.html">Sign Up</a></li>
			<li class="right"><a href="index.php">Sign In</a></li>
		</ul>
		<br />
		<br />
		<form id="login" action="" method="post">
			<table align="center">
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
		<br />
		<div id="signup">Don't have an account? <a href="registration.html">Sign up</a>!</div>


		<!-- php file to  -->
		<?php

		    $error = "";                // error message
		    $uname_error = "";          // error message if username does not exist
		    $pwd_error = "";            // error message if password does not match username

		    if (isset($_POST['submit'])) {
		        if (empty($_POST['username']) || empty($_POST['password'])) {
		            $error = "Please provide your username or password";
		        }
		        else {
		            $username=$_POST['uname'];
		            $password=$_POST['pwd'];
		            $connection = mysql_connect("localhost", "root", "");   // connect to server

		            // prevent MySQL injection by h@ck3rz
		            $username = stripslashes($username);  
		            $password = stripslashes($password);
		            $username = mysql_real_escape_string($username);
		            $password = mysql_real_escape_string($password);
		            
		            $db = mysql_select_db("company", $connection);  // select database
		            
		            $query = mysql_query("select * from login where password='$password' AND username='$username'", $connection);   // query to get info of registered users
		            $rows = mysql_num_rows($query);
		            if ($rows == 1) {
		                $_SESSION['login_user']=$username; // initialize session
		               // header("location: profile.php"); // go to profile page (or chat page?)
		                echo 'success!';  // debug
		            } 
		            else {
		                $error = "Username or password is invalid";
		            }
		            mysql_close($connection); // close connection
		        }
		    }


		?>	


	</body>
</html>