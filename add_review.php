<?php

	require_once 'connect.php';//for connecting to the database
	require_once 'session.php';

	$username = $_SESSION['username'];
	$title = mysql_real_escape_string($_POST['title']);
	$isbn = mysql_real_escape_string($_POST['isbn']);
	$author = mysql_real_escape_string($_POST['author']);
	$publisher = mysql_real_escape_string($_POST['publisher']);
	$rating = mysql_real_escape_string($_POST['rating']);
	$review = mysql_real_escape_string($_POST['review']);

	$query = "INSERT INTO  `review`(`username`, `title`, `isbn`, `author`, `publisher`, `rating`, `review`) VALUES ('$username', '$title', '$isbn', '$author', '$publisher', '$rating', '$review')";
	$query_run = mysql_query($query);
	if($query_run){
		header('Location: profile.php');
	}
	else{
		header('Location: new_review.php');
	}


?>