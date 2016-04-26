<?php 

require_once 'connect.php';
session_start();//starting session
$error = '';

if(isset($_POST['username'])&&isset($_POST['password'])){
	$username= mysql_real_escape_string($_POST['username']);
	$password= mysql_real_escape_string($_POST['password']);

	$password_hash=md5($_POST['password']);
	if(!empty($username) && !empty($password)){
		$query="SELECT `ID` FROM `userlog` WHERE `username` = '$username' AND `password` ='$password_hash' ";// change it to hash after including md5 hash.
		$query_run= mysql_query($query);
		if($query_run){
			
			$query_num_rows = mysql_num_rows($query_run);
			if ($query_num_rows==0) {
				header('Location: invalid.html');
			}
			else if ($query_num_rows==1){
				$_SESSION['username']=$username;
				header('Location: profile.php');
			}
		}	
	}
}

?>
