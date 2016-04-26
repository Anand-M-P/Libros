

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

		<div   class="navbar  navbar-default navbar-fixed-top" > 
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
	                	<li class="active"><a href="profile.php" >Profile</a></li>
	                    <li><a href="faq.html">FAQ</a></li>
	                    <li><a href="about.html">About Us</a></li>
	                    <li><a href="www.facebook.com"><i class="fa fa-facebook"></i></a></li>
	                    <li><a href="www.twitter.com"><i class="fa fa-twitter"></i></a></li>	                    
	                    <li><a href="www.instagram.com"><i class="fa fa-instagram"></i></a></li>
	                    <li><a href="www.plus.google.com"><i class="fa fa-google-plus"></i></a></li>
	                    <li><a onclick="$('#bookReview').hide(); $('#updateReview').hide(); $('#readReview').show()"> <button class="btn btn-sm btn-primary"> <span class="glyphicon glyphicon-book"></span> Read Review </button> </a></li>
	                     <li><a onclick="$('#bookReview').hide(); $('#readReview').hide(); $('#updateReview').show()"> <button class="btn btn-sm btn-primary"> <span class="glyphicon glyphicon-book"></span> Update Review </button> </a></li>
	                    <li><a href="new_review.html"> <button class="btn btn-sm btn-primary"> <span class="glyphicon glyphicon-pencil"></span> Add a Review </button> </a></li>
	                    <li class="pull right"><a href="logout.php"><button class="btn btn-sm btn-primary"> <span class="glyphicon glyphicon-off"></span> Log Out</button></a></li>                                    
	                </ul>            	
	            </div>
	        </div>
	    </div><!-- End of Navbar -->
		
		<div class="container" id ="bookReview"> 
			<div class="row">
				<div class="col-12">
					<h2 style="padding:5px; color: #ff6d6d"> Recent Reviews </h2>
					<?php

					require_once 'connect.php';
					require_once 'session.php';

					$username = $_SESSION['username'];

					$query = "SELECT * FROM `review` WHERE `username`='$username'";
					$query_run=mysql_query($query);

					if($query_run){
						if(mysql_num_rows($query_run)==NULL){//checks the num of rows returnes is null
							echo ("<div class=\"alert alert-info\" role=\"alert\" style=\"margin-top: 100px\">
											        <strong><span class=\"glyphicon glyphicon-warning-sign\"> </span></strong> No results found. Click `Add a Review` to make your first review.
											      </div>
												  <a href=\"profile.php\"><button class=\"btn btn-md btn-success\"><span class=\"glyphicon glyphicon-user\"></span> Try Again </button></a>"
												  );		
						}
						else{

							$count_rows = mysql_num_rows($query_run);
							echo "<button style=\" padding: 10px;\"class=\"btn btn-md btn-Success\"> Books Reviewed <span class=\"badge\"> $count_rows </span> </button>";
							echo "<br> <br>";

							while ($query_row = mysql_fetch_assoc($query_run)) {

								$title = $query_row['title'] ;
								$isbn = $query_row['isbn'] ;
								$author = $query_row['author'];
								$publisher = $query_row['publisher'];
								$rating = $query_row['rating'];
								$review = $query_row['review'];

								echo "
								<div class=\"col-12\">
									<div class=\"panel panel-primary\">
				            			<div class=\"panel-heading\">
				              				<h3 class=\"panel-title\"> $title </h3>
				            			</div>
				            			<div class=\"panel-body\">
				              				<div class=\"col-sm-4\"><h4> <b> Title </b></h3>$title</div>
				              				<div class=\"col-sm-4\"><h4> <b> ISBN </b></h3>$isbn</div>
				              				<div class=\"col-sm-4\"><h4> <b> Author </b></h3>$author</div>
				              				<div class=\"col-sm-4\"><h4> <b> Publisher </b></h3>$publisher</div>
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

   		<div class="container" align="center" id="readReview" style="display: none; position:absolute;" >
   			<form class="form-inline" role="form" action="read_review.php" method="POST" id="search">
			  	<div class="form-group">
			    	<label class="sr-only" for="bookTitle">Eg: The Client</label>
			    	<div class="input-group">
			     		<input onkeyup="findmatch();" id ="title" type="text" class="form-control" name="title" placeholder="Eg: The Client" required autofocus>			     		
			    	</div>	
			  	</div>
			  	<button type="submit" class="btn btn-primary">Search <span class="glyphicon glyphicon-search"></span></button>
			</form>
			<div class="row"> 
				<br>  				
			    <div id="results"></div>
   			</div>
   		</div>

   		<div class="container" align="center" id="updateReview" style="display: none;" >
   			<form class="form-inline" role="form" action="update_review.php" method="POST">
			  	<div class="form-group">
			    	<label class="sr-only" for="bookTitle">Eg: The Client</label>
			    	<div class="input-group">
			     		<input onkeyup="findmatch();" type="text" id ="title" class="form-control"  name="title" placeholder="Title" required autofocus>
			     		<textarea class="form-control" row="15" name="newReview" placeholder="New Review" required></textarea>
			    	</div>
			  	</div>
			  	<button type="submit" class="btn btn-primary">Update <span class="glyphicon glyphicon-pencil"></span></button>
			</form>
			<div class="row"> 
				<br>  				
			    <div id="results"></div>
   			</div>
   		</div>



   		<script type="text/javascript">

			function findmatch(){
				//document.getElementById('results').innerHTML = "This is working"+document.getElementById('title').value ;
				if(window.XMLHttpRequest){
					xmlhttp = new XMLHttpRequest();
				}
				else{
					xmlhttp = new ActiveObject('Microsoft.XMLHTTP');
				}

				xmlhttp.onreadystatechange = function (){
					if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
						document.getElementById('results').innerHTML = xmlhttp.responseText;
					}
				}

				xmlhttp.open('GET', 'search.php?title='+document.getElementById('title').value, true);
				//document.getElementById('results').innerHTML = ""+document.getElementById('title').value ;
				xmlhttp.send();
			}

		</script>
   		
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










