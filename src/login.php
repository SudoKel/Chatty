<?php

	session_start();

	$_SESSION['uid'] = $_POST['uname'];
	$_SESSION['pwd'] = $_POST['pwd'];
	$test = $_SESSION['uid'];

	// echo $test;
	// echo $_SESSION['uid']; // debug

	 foreach ($_POST as $key => $value) {
        echo "<tr>";
        echo "<td>";
        echo $key." ";
        echo "</td>";
        echo $value." ";
        echo "</td>";
        echo "</tr>";
        echo "<br>";
    }


?>	