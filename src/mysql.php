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

 	echo "<br />"
; 	echo "<br />";

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
			 "`Country` char(99) NOT NULL,".
			 "`username` char(99) NOT NULL,".
			 "`password` char(99) NOT NULL,".
			 "`online` TINYINT(1),".
			 "PRIMARY KEY (`ID`),".
			 "KEY `phonenum` (`phonenum`))".
			 "ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;";

	if ($conn->query($table) === TRUE)
	    echo "Table Info created successfully";
	else
	    echo "Error creating table: " . $conn->error;

	echo "<br />";
 	echo "<br />";

	$insert = "insert into Info values('','Kelwin','Joanes','kssj13@mun.ca','7097642504','Male','1990-04-25','TZ','kelel','joanes2016',0);";

	if ($conn->query($insert) === TRUE)
	    echo "Data inserted successfully";
	else
	    echo "Error inserting data: " . $conn->error;

	$sql = "select fName, lName from Info;";
	$result = $conn->query($sql);

	echo "<br />";
 	echo "<br />";

 	$insert = "insert into Info values('','Saahil','Budhrani','saahil@mun.ca','7083664450','Male','1991-05-23','BZ','saahil','saahil',0);";

	if ($conn->query($insert) === TRUE)
	    echo "Data inserted successfully";
	else
	    echo "Error inserting data: " . $conn->error;

	$sql = "select fName, lName from Info;";
	$result = $conn->query($sql);

	echo "<br />";
 	echo "<br />";

 	$insert = "insert into Info values('','Tomisin','Jenrola','tomi@mun.ca','7083664450','Male','1991-05-23','NG','tomisin','tomisin',0);";

	if ($conn->query($insert) === TRUE)
	    echo "Data inserted successfully";
	else
	    echo "Error inserting data: " . $conn->error;

	$sql = "select * from Info;";
	$result = $conn->query($sql);

	echo "<br />";
 	echo "<br />";


	if($result->num_rows > 0)
	{
		echo "<table border=\"1\">";
		echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone No.</th><th>Sex</th><th>DOB</th><th>Country</th><th>Username</th><th>Password</th></tr>";
	    // output data of each row
	    while($row = $result->fetch_assoc()) 
	    {
	    	echo "<tr>";
	        echo  "<td>" . $row["ID"] . "</td><td>" . $row["fName"] . "</td><td>" . $row["lName"] . "</td><td>" . $row["email"] . "</td><td>" . $row["phonenum"] . "</td><td>" . $row["sex"] . "</td><td>" . $row["dob"] . "</td><td>" . $row["Country"] . "</td><td>" . $row["username"] . "</td><td>" . 
	        	$row["password"] . "</td>";
	        echo "</tr>";
	    }
	    echo "</table>";
	} 
	else
	    echo "0 results";

	$conn->close();
?>