<?php
	session_start();
	$error='';

	if (isset($_POST['submit'])) 
	{
		if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['first_name']) || empty($_POST['last_name'])|| empty($_POST['email'])|| empty($_POST['phone_num'])|| empty($_POST['gender'])|| empty($_POST['DOBMonth'])|| empty($_POST['DOBDay'])|| empty($_POST['DOBYear'])|| empty($_POST['country'])) 
		{
			$error = "ERROR: A field has not been selected or filled out.";
		}
		else
		{
			$servername = "mysql.cs.mun.ca";
			$username = "cs3715_kssj13";
			$password = "orlando1";
			$database = "cs3715_kssj13";

			$conn = new mysqli($servername, $username, $password, $database);

			$fname = $_POST['first_name'];
			$lname = $_POST['last_name'];
			$mail = $_POST['email'];
			$num = $_POST['phone_num'];
			$sex = $_POST['gender'];
			$dob = $_POST['DOBYear']. "-". $_POST['DOBMonth'] ."-". $_POST['DOBDay'];
			$country = $_POST['country'];
			$uname = $_POST['username'];
			$pass = $_POST['password'];

			$sql = "INSERT INTO Info VALUES('','$fname','$lname','$mail','$num','$sex','$dob','$country', '$uname','$pass',0);";
			$result = $conn->query($sql);

			if($conn->query($sql) === TRUE)
			{
				header("location: index.php");
			} 
			else
			    $error = "ERROR: A field has not been selected or filled out.";
			
			$conn->close();
		}
	}
?>