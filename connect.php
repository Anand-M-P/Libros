<?php

$hostname = "localhost" ;
$username = "root" ;
$password = "" ;
$db_name = "bookReview" ;

$con=mysql_connect($hostname, $username, $password); 
if (! $con) {
	die("Failed to connect to Database " . mysql_error());
}

$db=mysql_select_db($db_name, $con);
if (! $db) {
	die("Failed to select database " . mysql_error());
}

if (mysqli_connect_errno($con)) { 
	echo "Failed to connect to MySQL: " . mysqli_connect_error(); 
}
/* 
else {
 echo "Successfully connected to your database "; 
} */

?>