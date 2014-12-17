<?php
	session_start();
	$page_title = 'Language Set';
	//checking for invalid user
	if(isset($_SESSION['invalid']))
	{
		header("Location: invalid-user/");
	}
	//checking for language
	if(isset($_GET['language']))
	{
		$_SESSION['language'] = $_GET['language'];
	}
	header('location:'.$_SERVER['HTTP_REFERER']);
?>
