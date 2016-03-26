<?php
	$servername = "mysql.cs.mun.ca";
	$username = "cs3715_kssj13";
	$password = "orlando1";
	$database = "cs3715_kssj13";

	//create connection
	$conn = new mysqli($servername, $username, $password, $database);

	//check connection
	if ($conn->connect_error)
	    die("Connection failed: " . $conn->connect_error);
 	else echo "Connection successful!";

 	echo "<br />";
 	echo "<br />";

 	$delete = "drop table Info;";

 	if ($conn->query($delete) === TRUE)
	    echo "Table dropped successfully";
	else
	    echo "Error dropping table: " . $conn->error;

	echo "<br />";
 	echo "<br />";

	$table = "CREATE TABLE `Info`(".
			 "`ID` int(11) NOT NULL AUTO_INCREMENT,".
			 "`fName` char(99) Not NULL,".
			 "`lName` char(99) NOT NULL,".
			 "`email` char(99) NOT NULL,".
			 "`phonenum` int(99) NOT NULL,".
			 "`sex` char(10) NOT NULL,".
			 "`dob` Date NOT NULL,".
			 "`Country` int(99) NOT NULL,".
			 "`username` char(99) NOT NULL,".
			 "`password` char(99) NOT NULL,".
			 "PRIMARY KEY (`ID`),".
			 "KEY `phonenum` (`phonenum`))".
			 "ENGINE=InnoDB AUTO_INCREMENT=4080 DEFAULT CHARSET=latin1;";

	if ($conn->query($table) === TRUE)
	    echo "Table Info created successfully";
	else
	    echo "Error creating table: " . $conn->error;

	echo "<br />";
 	echo "<br />";

	$insert = "insert into Info values('','Kelwin','Joanes','kssj13@mun.ca','7097642504','M','1990-04-25','Tanzania','kelel','joanes2016');";

	if ($conn->query($insert) === TRUE)
	    echo "Data inserted successfully";
	else
	    echo "Error inserting data: " . $conn->error;

	$sql = "select fName, lName from Info;";
	$result = $conn->query($sql);

	echo "<br />";
 	echo "<br />";

	if($result->num_rows > 0)
	{
	    // output data of each row
	    while($row = $result->fetch_assoc()) 
	    {
	        echo "Welcome, " . $row["fName"] . " " . $row["lName"];
	    }
	} 
	else
	    echo "0 results";

	$conn->close();
?>