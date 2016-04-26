<?php

	require_once 'connect.php';
	require_once 'session.php';

	$username = $_SESSION['username'];

	$query = "SELECT * FROM `review` WHERE `username`='$username'";
	$query_run=mysql_query($query);

	if($query_run){
		if(mysql_num_rows($query_run)==NULL){//checks the num of rows returnes is null
			echo ("<div class=\"alert alert-info\" role=\"alert\" style=\"margin-top: 100px\">
							        <strong><span class=\"glyphicon glyphicon-warning-sign\"> </span></strong> No results found
							      </div>
								  <a href=\"index.html\"><button class=\"btn btn-md btn-danger\"><span class=\"glyphicon glyphicon-user\"></span> Try Again </button></a>"
								  );		
		}
		else{
			while ($query_row = mysql_fetch_assoc($query_run)) {

				$title = $query_row['title'] ;
				$isbn = $query_row['isbn'] ;
				$author = $query_row['author'];
				$publisher = $query_row['publisher'];
				$rating = $query_row['rating'];
				$review = $query_row['review'];

				echo "
				<div class=\"col-12\">
					<div class=\"panel panel-default\">
            			<div class=\"panel-heading\">
              				<h3 class=\"panel-title\"> $title </h3>
            			</div>
            			<div class=\"panel-body\">
              				$title
              				$isbn
              				$publisher
              				$rating
              				$review
            			</div>
          			</div>
				</div>" ;	
				
			}
		}

	}
?>