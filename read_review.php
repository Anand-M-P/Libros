

<html>
	<head>
		<!--Linking resources-->
		<!-- Website Title & Description for Search Engine purposes -->
		<title>Libros | Share Book Reviews and Recommendations With Your Friends, Join Book Clubs</title>
		<meta name="description" content="Share Book Recommendations With Your Friends, Write Reviews, Connect with Friends, Joi Groups">
		
		<!-- Mobile viewport optimized -->
		<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		
		<!-- Bootstrap CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-glyphicons.css" rel="stylesheet">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"><!--for social glyphs-->
		
		<!-- Custom CSS -->
		<link rel="stylesheet" href="css/style.css">

		<!-- Include Modernizr in the head, before any other Javascript -->
		<script src="js/modernizr-2.6.2.min.js"></script>
		
		<!-- Bootstrap Javascript -->
		<script src="js/bootstrap.min.js"></script>

	</head>

	<body style="background-image:none; background-color: #eee;"><!--background="images/background.jpg"-->

		<div   class="navbar  navbar-default navbar-fixed-top"> 
	        <div class="container">
		        <!-- Brand Logo/Name -->
	            <a class="navbar-brand" href="index.html"><img src="images/logo1.png" alt="Your Logo"></a>
	            
	            <button class="navbar-toggle" data-toggle = "collapse" data-target=".navHeaderCollapse">
	            	<span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>  
	           	</button> 
	            
	            <div class="collapse navbar-collapse navHeaderCollapse" >            
	            	<ul class="nav navbar-nav navbar-right">                
	                	<li><a href="profile.php" > <button class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-arrow-left"></span> Go Back</button></a></li>	        
	                    <li><a href="new_review.html"> <button class="btn btn-sm btn-primary"> <span class="glyphicon glyphicon-pencil"></span> Add a Review </button> </a></li>
	                    <li class="pull right"><a href="logout.php"><button class="btn btn-sm btn-danger"> <span class="glyphicon glyphicon-off"></span> Log Out</button></a></li>                                    
	                </ul>            	
	            </div>
	        </div>
	    </div><!-- End of Navbar -->
		
		<div class="container" id ="bookReview"> 
			<div class="row">
				<div class="col-12">
					<?php

					require_once 'connect.php';
					require_once 'session.php';

					$username = $_SESSION['username'];
					$title= $_POST['title'];

					$query = "SELECT * FROM `review` WHERE `title`='$title'";
					$query_run=mysql_query($query);
					$query_run2=mysql_query($query);//to get the general info
					if($query_run){
						if(mysql_num_rows($query_run)==NULL){//checks the num of rows returnes is null
							echo ("<div class=\"alert alert-info\" role=\"alert\" style=\"margin-top: 100px\">
											        <strong><span class=\"glyphicon glyphicon-warning-sign\"> </span></strong>  It appears \"<u>$title</u>\" is not in the database. Please make sure you have entered the title correctly.
											      </div>
												  <a href=\"profile.php\"><button class=\"btn btn-md btn-danger\"><span class=\"glyphicon glyphicon-user\"></span> Try Again </button></a>"
												  );		
						}
						else{

							$count_rows = mysql_num_rows($query_run);

							$query_row = mysql_fetch_assoc($query_run2);//To get the general info about the book
							$title = $query_row['title'] ; //Placed here since we need this only one time unile in profile.php
							$isbn = $query_row['isbn'] ;
							$author = $query_row['author'];
							$publisher = $query_row['publisher'];

							
							echo "<h2 style=\"padding:5px; color: #ff6d6d\"> General Information </h2>";

							echo "
								<div class=\"col-12\">
									<div class=\"panel panel-success\">
				            			<div class=\"panel-heading\">
				              				<h3 class=\"panel-title\"> General Info: $title </h3>
				            			</div>
				            			<div class=\"panel-body\">
				              				<div class=\"col-sm-4\"><h4> <b> Title </b></h3>$title</div>
				              				<div class=\"col-sm-4\"><h4> <b> ISBN </b></h3>$isbn</div>
				              				<div class=\"col-sm-4\"><h4> <b> Author </b></h3>$author</div>
				              				<div class=\"col-sm-4\"><h4> <b> Publisher </b></h3>$publisher</div>
				            			</div>
				          			</div>
								</div> <br> <h2 style=\"padding:5px; color: #ff6d6d\"> User Reviews </h2>";

							echo "<button style=\" padding: 10px;\"class=\"btn btn-md btn-Success\"> Total Reviews <span class=\"badge\"> $count_rows </span> </button>";
							echo "<br> <br>";

							while ($query_row = mysql_fetch_assoc($query_run)) {

								$rating = $query_row['rating'];
								$review = $query_row['review'];
								$user = $query_row['username'];

								echo "
								<div class=\"col-12\">
									<div class=\"panel panel-primary\">
				            			<div class=\"panel-heading\">
				              				<h3 class=\"panel-title\"> Usename: $user </h3>
				            			</div>
				            			<div class=\"panel-body\">
				              				<div class=\"col-sm-4\"><h4> <b> Rating </b><span class=\"glyphicon glyphicon-thumbs-up success\"> </span></h3>$rating</div> 
				              				<div class=\"col-sm-12\"><h4> <b> Review </b></h3>$review</div> 
				            			</div>
				          			</div>
								</div>" ;									
							}
						}

					}
				?>					
				</div>
			</div>
   		</div>	

   		
		<!-- First try for the online version of jQuery-->
		<script src="http://code.jquery.com/jquery.js"></script>
		
		<!-- If no online access, fallback to our hardcoded version of jQuery -->
		<script>window.jQuery || document.write('<script src=" js/jquery-1.8.2.min.js " ><\/script>')</script> 
		
		<!-- Bootstrap JS -->
		<script src="js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="js/script.js"></script>
	</body>
</html>









