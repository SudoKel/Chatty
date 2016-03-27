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

			setInterval(function(){
				$.ajax({
					 	url:  "get.php",
					 	success: function(data)
					 	{
					 		$("#chatbox").html(data);
					 		var elem = document.getElementById("chatbox");
					 		elem.scrollTop = elem.scrollHeight;
						}
				 	});
			}, 500);
		</script>
	</head>
	<body>
		<ul>
			<li class="header"><a href="index.php">CHATTY</a></li>
			<li class="right"><a class="logout" href="logout.php">Logout</a></li>
			<li class="right"><span class="welcome">Welcome, <?php echo "$fname $lname"; ?></span></li>
		</ul>

		<div id="container">
			<div id="online">
				<?php 
					$servername = "mysql.cs.mun.ca";
					$username = "cs3715_kssj13";
					$password = "orlando1";
					$database = "cs3715_kssj13";

					$conn = new mysqli($servername, $username, $password, $database);
					$sql = "select username from Info where online = 1;";

					$result = $conn->query($sql);
	
					if($result->num_rows > 0)
					{
					    // output data of each row
					    while($row = $result->fetch_assoc()) 
					    {
					        echo $row["username"];
					        echo "<br />";
					    }
					}
				?>
			</div>
			<div id="chatbox"></div>
		</div>

		<form id="message">
			<table width="50%" align="center">
				<tr>
					<td><input type="text" id="chat" name="chat" /></td>
					<td><input type ="submit" id="submit" name="submit" value="Send" /></td>
				</tr>
			</table>
		</form>
	</body>
</html>

