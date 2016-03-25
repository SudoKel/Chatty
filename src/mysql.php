<?php
	//create connection
	$con = mysqli_connect("mysql.cs.mun.ca", "cs3715_kssj13", "orlando1");

	//check connection
	if ($con->connect_error) 
	{
	    die("Connection failed: " . $con->connect_error);
	} 

	$schema = "DROP SCHEMA IF EXISTS world;".
		      "CREATE SCHEMA world;";

	//create and select database
	mysqli_query($con, $schema);
	mysqli_select_db($con, “world”);

	$table = "SET AUTOCOMMIT=0;".
			 "CREATE TABLE `Info`(".
			 "`ID` int(11) NOT NULL AUTO_INCREMENT,".
			 "`fName` char(99) Not NULL DEFAULT'',".
			 "`lName` char(99) NOT NULL DEFAULT '',".
			 "`email` char(99) NOT NULL DEFAULT '',".
			 "`phonenum` int(99) NOT NULL DEFAULT '',".
			 "`sex` char(10) NOT NULL DEFAULT '',".
			 "`dob` Date NOT NULL DEFAULT '',".
			 "`Country` int(99) NOT NULL DEFAULT '',".
			 "`username` char(99) NOT NULL DEFAULT'',".
			 "`password` char(99) NOT NULL DEFAULT '',".
			 "PRIMARY KEY (`ID`),".
			 "KEY `phonenum` (`phonenum`))".
			 "ENGINE=InnoDB AUTO_INCREMENT=4080 DEFAULT CHARSET=latin1;";

	$insert = "insert into Info values('Kelwin','Joanes','kssj13@mun.ca','7097642504','m','1990-04-25','Tanzania','kelel','joanes2016')";

	mysqli_query($con, $table);
	mysqli_query($con, $insert);

	$sql = "select fName, lName FROM Info";
	$result = $con->query($sql);

	if ($result->num_rows > 0) 
	{
	    // output data of each row
	    while($row = $result->fetch_assoc()) 
	    {
	        echo "Welcome, " . $row["fName"] . " " . $row["lName"];
	    }
	} 
	else 
	{
	    echo "0 results";
	}

	$con->close();
?>