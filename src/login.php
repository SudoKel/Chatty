<?php
	session_start();

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

		$sql = "select fName, lName, online from Info where username = '$uname' and password = '$pass';";
		$result = $conn->query($sql);

		if($result->num_rows == 1)
		{
			while($row = $result->fetch_assoc()) 
		    {
		        $fname  = $row["fName"];
		        $lname  = $row["lName"];
		    	$online	= $row["online"];
		    }

		    if($online == 1)
		    {
		    	echo "online";
		    }
		    else
		    {
		    	$_SESSION["fName"] = $fname;
		    	$_SESSION["lName"] = $lname;
		    	$_SESSION["uName"] = $uname;
				$update = "update Info set online = 1 where username = '$uname'";
				$conn->query($update);
				
				echo "true";
		    }
		}
		else
			echo "false";
			
	}
		
	$conn->close();
?>