<?php
	session_start();// Starting Session
	// Establishing Connection with Server by passing server_name, user_id and password as a parameter
	$connection = mysql_connect("localhost", "root", "");
	// Selecting Database
	$db = mysql_select_db("bookReview", $connection);
	// Storing Session
	$user_check=$_SESSION['username'];
	// SQL Query To Fetch Complete Information Of User
	$ses_sql=mysql_query("SELECT `username` FROM `userlog` 	WHERE `username` ='$user_check'");
	$row = mysql_fetch_assoc($ses_sql);
	$login_session =$row['username'];
	if(!isset($login_session)){
	mysql_close($connection); // Closing Connection
	header('Location: index.html'); // Redirecting To Home Page
	}
?>