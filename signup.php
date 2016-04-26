

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

	<body ><!--background="images/background.jpg"-->

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
	                	<li class="active"><a href="index.html" >Home</a></li>
	                    <li><a href="faq.html">FAQ</a></li>
	                    <li><a href="about.html">About Us</a></li>
	                    <li><a href="www.facebook.com"><i class="fa fa-facebook"></i></a></li>
	                    <li><a href="www.twitter.com"><i class="fa fa-twitter"></i></a></li>	                    
	                    <li><a href="www.instagram.com"><i class="fa fa-instagram"></i></a></li>
	                    <li><a href="www.plus.google.com"><i class="fa fa-google-plus"></i></a></li>                                    
	                </ul>            	
	            </div>
	        </div>
	    </div><!-- End of Navbar -->

		 
		<div class="container"> 
			<div class="row">
				<div class="col-12 pull-left">
					<?php

					require_once 'connect.php';

					/* Function to add a new Registered User to the Database */
					function NewUser() {  

					 $userName  =  mysql_real_escape_string ($_POST['username']);
					 $email = mysql_real_escape_string($_POST['email']);
					 $fname = mysql_real_escape_string($_POST['firstname']);
					 $lname = mysql_real_escape_string($_POST['lastname']);
					 $password = mysql_real_escape_string($_POST['passwd']);
					 $password_hash = md5($password);
					 $cnfrm_password = mysql_real_escape_string($_POST['cpasswd']);

					 if ($password == $cnfrm_password) {
						 $query = "INSERT INTO  `userlog`(`username`, `email`, `fname`, `lname`, `password`) VALUES ('$userName', '$email', '$fname', '$lname', '$password_hash')";
						 $query_run = mysql_query($query);
						 if(! $query_run){
						 	echo ("<div class=\"alert alert-danger\" role=\"alert\" style=\"margin-top: 100px\">
							        <strong><span class=\"glyphicon glyphicon-warning-sign\"> </span></strong> Sorry something went wrong! Check your inputs
							      </div>
								  <a href=\"index.html\"><button class=\"btn btn-md btn-danger\"><span class=\"glyphicon glyphicon-user\"></span> Try Again </button></a>"
								  );
						 }
						 else
						 {

						 	echo ("<div class=\"alert alert-success\" role=\"alert\" style=\"margin-top: 100px\">
							        <strong><span class=\"glyphicon glyphicon-ok-sign\"> </span></strong> You have successfully registered your account!
							      </div>
								  <a href=\"index.html\"><button class=\"btn btn-md btn-primary\"><span class=\"glyphicon glyphicon-user\"></span> Login </button></a>"
								  );

						 }
					 }
					 else{
					 	echo ("<div class=\"alert alert-danger\" role=\"alert\" style=\"margin-top: 100px\">
							        <strong><span class=\"glyphicon glyphicon-warning-sign\"> </span></strong> Password Mismatch!
							      </div>
								  <a href=\"index.html\"><button class=\"btn btn-md btn-danger\"><span class=\"glyphicon glyphicon-user\"></span> Try Again </button></a>"
								  );
					 }
					} 

					function SignUp() {
					 if(!empty($_POST['username'])) {

					 	$userName = mysql_real_escape_string($_POST['username']);
					 	$email = mysql_real_escape_string($_POST['email']);
					 	$query = "SELECT * FROM `userlog` WHERE `username` = '$userName' OR `email` = '$email' ";
					 	$query_run = mysql_query($query);
						$query_num_rows = mysql_num_rows($query_run);


					 	if(! $query_run){
					 		echo ("<div class=\"alert alert-danger\" role=\"alert\" style=\"margin-top: 100px\">
						        <strong><span class=\"glyphicon glyphicon-warning-sign\"> </span></strong> Sorry something went wrong! Query error.
						      </div>
							  <a href=\"index.html\"><button class=\"btn btn-md btn-danger\"><span class=\"glyphicon glyphicon-refresh\"></span> Try Again </button></a>"
							  );
					 	}

					 	else{
					 		if($query_num_rows == 0) { // Create a new user if not already existing
					 			NewUser();
					 		}
					 		else {
						 		echo ("<div class=\"alert alert-danger\" role=\"alert\" style=\"margin-top: 100px\">
							        <strong><span class=\"glyphicon glyphicon-warning-sign\"> </span></strong> Sorry username or email-id already exists!
							      </div>
								  <a href=\"index.html\"><button class=\"btn btn-md btn-danger\"><span class=\"glyphicon glyphicon-refresh\"></span> Try Again </button></a>"
								  );
					 		} 
					 	}
					  } 
					} //function SignUP

					  	
				  	$password = mysql_real_escape_string($_POST['passwd']);
				  	$password_len = strlen($password);
				  	if($password_len < 8)
				  	{
				  		echo ("<div class=\"alert alert-danger\" role=\"alert\" style=\"margin-top: 100px\">
					        <strong><span class=\"glyphicon glyphicon-warning-sign\"> </span></strong> Password should be atleast 8 characters.
					      </div>
						  <a href=\"index.html\"><button class=\"btn btn-md btn-danger\"><span class=\"glyphicon glyphicon-refresh\"></span> Try Again </button></a>"
						  );
				  	}
				  	else{
				  		SignUp();
				  	}

			?><!--End of PHP code-->

				</div>
			</div>
   		</div>	

   		<!-- Footer -->
   		<footer class="footer navbar-fixed-bottom">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
					<h6>Copyright &copy; 2015 Libros Inc </h6>
					</div><!-- end col-sm-2 -->
					
					<div class="col-sm-4">
						<h6 align="center">A Project By Anand MP</h6>
						
					</div><!-- end col-sm-4 -->
					
					<div class="col-sm-2">
						<a href="#" ><h6> <span class="glyphicon glyphicon glyphicon-th-list"></span> Terms Of Use </h6></a>
					</div><!-- end col-sm-2 -->
					
					<div class="col-sm-2">						
						<a href="#"><h6> <span class="glyphicon glyphicon-user"></span> Privacy </h6></a>
					</div><!-- end col-sm-2 -->

					<div class="col-sm-2">
						<a href="#"><h6> <span class="glyphicon glyphicon glyphicon glyphicon-thumbs-up"></span> Help </h6></a>
					</div><!-- end col-sm-2 -->

				</div><!-- end row -->
			</div><!-- end container -->
		</footer>
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