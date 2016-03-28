<?php
	session_start();

	if(isset($_SESSION['uName']) && !empty($_SESSION['uName']))
	{
		header("location: chat.php");
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Sign In</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<script src="script/bg-slider.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#submit").click(function(e){
					e.preventDefault();
					var username = $("#uname").val();
					var password = $("#pwd").val();
				 	$.ajax({
						type: "POST",
					 	url:  "login.php",
					 	data: {username: username, password: password},
					 	success: function(data)
					 	{
					 		console.log(data);
					 		if(data == 'true')
					 		{
					 			window.location = "chat.php";
					 		}
					 		else if(data == 'false')
					 		{
					 			$("#err1").css('display','inline');
					 			$("#err2").css('display','none');
					 		}
					 		else
					 		{
					 			$("#err1").css('display','none');
					 			$("#err2").css('display','inline');
					 		}
						}
				 	});
				});
			});
		</script>
	</head>
	<body>
		<ul>
			<li class="header"><a href="index.php"><img src="img/logo.png" alt="Chatty" height="50px"></a></li>
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
					<td colspan="2"><input id="submit" type="submit" name="submit" value="Sign in"></td>
				</tr>
				<tr align="center">
					<td colspan="2">Don't have an account? <a href="registration.php">Sign up</a>!</td>
				</tr>
			</table>
		</form>

		<div id="err1" class="errorLogin"><p style="text-align: center">Invalid username or password!</p></div>
		<div id="err2" class="errorLogin"><p style="text-align: center">User already signed in!</p></div>

		

	</body>
</html>