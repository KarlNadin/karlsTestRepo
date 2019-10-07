<?php
session_start();
require_once "auth-fns.php";
if(isLoggedIn())
{
	header( "Location: index.php" ); //they are logged in, send them to the homepage
}else{
	if(isset($_POST['login'])){ //they have submitted the login form
		$username=$_POST['username'];
		$password=$_POST['password'];
		if(login($username,$password))
		{
			header( "Location: index.php" ); //successful login go to the home page
		}else{
			$error_msg="Wrong login details."; //incorrect username or password
		}
	}
}
require "views/login-view.php";
