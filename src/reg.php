<?php
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

	if($conn->query($sql) === TRUE)
	{
		echo "true";
	}
	else
		echo "false";
	
	$conn->close();

?>