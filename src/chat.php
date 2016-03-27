<?php
	session_start();

	$fname = $_SESSION['fName'];
	$lname = $_SESSION['lName'];
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Chat</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script type="text/javascript">
			// send messages
			$(document).ready(function(){
				$("#submit").click(function(e){
					e.preventDefault();
					var msg = $("#chat").val();
					$("#chat").val("");
				 	$.ajax({
						type: "POST",
					 	url:  "post.php",
					 	data: {chat: msg},
					 	success: function(data)
					 	{
					 		$("#chatbox").html(data);
						}
				 	});
				});
			});

			// default
			var autoScroll = true;

			function disableAutoScroll()
			{
				autoScroll = false;
			}

			function enableAutoScroll()
			{
				autoScroll = true;
			}

			// update chat messages
			setInterval(function(){
				$.ajax({
					 	url:  "get.php",
					 	success: function(data)
					 	{
					 		$("#chatbox").html(data);

					 		if(autoScroll)
					 		{
					 			var elem = document.getElementById("chatbox");
					 			elem.scrollTop = elem.scrollHeight;
					 		}
						}
				 	});
			}, 500);

			// update online users
			setInterval(function(){
				$.ajax({
					 	url:  "online.php",
					 	success: function(data)
					 	{
					 		$("#online").html(data);
						}
				 	});
			}, 500);		
		</script>
	</head>
	<body id="chatPage">
		<ul>
			<li class="header"><a href="index.php">CHATTY</a></li>
			<li class="right"><a class="logout" href="logout.php">Sign Out</a></li>
			<li class="right"><span class="welcome">Welcome, <?php echo "$fname $lname"; ?></span></li>
		</ul>

		<div id="container">
			<div id="online"></div>
			<div id="chatbox" onmouseover="disableAutoScroll()" onmouseout="enableAutoScroll()"></div>
		</div>

		<div id="chatContainer">
			<form id="message">
				<input type="text" id="chat" name="chat" />
				<input type ="submit" id="submit" name="submit" value="Send" />
			</form>
		</div>
	</body>
</html>

