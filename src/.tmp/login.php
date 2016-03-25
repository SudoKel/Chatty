<?php

	session_start();

 //    $username = $_POST['username'];
 //    $password = $_POST['password'];
	// $_SESSION['uid'] = $username;
	// $_SESSION['pwd'] = $password;

	// echo $_SESSION['uid']; // debug
	// echo $_SESSION['pwd']; // debug
	 // foreach ($_POST as $key => $value) {
  //       echo "<tr>";
  //       echo "<td>";
  //       echo $key." ";
  //       echo "</td>";
  //       echo $value." ";
  //       echo "</td>";
  //       echo "</tr>";
  //       echo "<br>";
  //   }

    $error = "";                // error message
    $uname_error = "";          // error message if username does not exist
    $pwd_error = "";            // error message if password does not match username

    if (isset($_POST['submit'])) {
        if (empty($_POST['username']) || empty($_POST['password'])) {
            $error = "Please provide your username or password";
        }
        else {
            $username=$_POST['uname'];
            $password=$_POST['pwd'];
            $connection = mysql_connect("localhost", "root", "");   // connect to server

            // prevent MySQL injection by h@ck3rz
            $username = stripslashes($username);  
            $password = stripslashes($password);
            $username = mysql_real_escape_string($username);
            $password = mysql_real_escape_string($password);
            
            $db = mysql_select_db("company", $connection);  // select database
            
            $query = mysql_query("select * from login where password='$password' AND username='$username'", $connection);   // query to get info of registered users
            $rows = mysql_num_rows($query);
            if ($rows == 1) {
                $_SESSION['login_user']=$username; // initialize session
               // header("location: profile.php"); // go to profile page (or chat page?)
                echo 'success!';  // debug
            } 
            else {
                $error = "Username or password is invalid";
            }
            mysql_close($connection); // close connection
        }
    }


?>	