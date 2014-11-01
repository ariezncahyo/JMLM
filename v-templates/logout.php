<?php
	session_start();
	unset($_SESSION['user_id']);
	unset($_SESSION['invalid']);
	//unset the user id cookie
	setcookie('DiHuangUser','',time() - 3600,'/');
	
	//set session value
	$_SESSION['user_id'] = 'Guest';
	
	header("Location: ../login/");
?>