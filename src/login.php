<?php
	if(!isset($_POST['username']) || !isset($_POST['password'])) 
	{
		echo "false";
	}
	else
	{
		$servername = "mysql.cs.mun.ca";
		$username = "cs3715_kssj13";
		$password = "orlando1";
		$database = "cs3715_kssj13";

		$conn = new mysqli($servername, $username, $password, $database);

		$uname = $_POST['username'];
		$pass = $_POST['password'];

		$sql = "select * from Info where username = '$uname' and password = '$pass';";
		$result = $conn->query($sql);

		if($result->num_rows == 1)
		{
			while($row = $result->fetch_assoc()) 
		    {
		        $_SESSION['fName'] = $row["fName"];
		        $_SESSION['lName'] = $row["lName"];
		    } 
			
			echo "true";
		} 
		else
		    echo "false";
		
		$conn->close();
	}
?>