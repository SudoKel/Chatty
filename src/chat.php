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
	</head>
	<body>
		<ul>
			<li class="header"><a href="index.php">CHATTY</a></li>
			<li class="right"><a class="logout" href="logout.php">Logout</a></li>
			<li class="right"><span class="welcome">Welcome, <?php echo "$fname $lname"; ?></span></li>
		</ul>

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
	</body>
</html>

