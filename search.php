<?php

include 'connect.php';
include 'session.php';

if(isset($_GET['title'])){
	 $title = $_GET['title'];
}

if(!empty($title)){

	$query = "SELECT DISTINCT `title` FROM `review` WHERE `title` LIKE '%".mysql_real_escape_string($title)."%'";
	$query_run = mysql_query($query);
	echo "Did you mean? <br>";
	while ($query_row = mysql_fetch_assoc($query_run)) {
		echo $title = $query_row['title'].'<br>';
	}
}
?> 