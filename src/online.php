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
		echo "<div class=\"title\">Online:</div>";
		// output data of each row
	    while($row = $result->fetch_assoc()) 
	    {
	        echo "<span class=\"onlineUser\">" . $row["username"] . "</span>";
	        echo "<br />";
	    }
	}

	$conn->close();
?>