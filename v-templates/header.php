<?php
	session_start();
	//include BLL file
	include 'v-includes/library/library.BLL.php';
	$manageContent = new BLL_Library();
	
	//checking for cookie and session variable simoultaneously
	if(isset($GLOBALS['_COOKIE']['DiHuangUser']) && !isset($_SESSION['user_id']) && $GLOBALS['_COOKIE']['DiHuangUser'] != 'Guest')
	{
		$_SESSION['user_id'] = $GLOBALS['_COOKIE']['DiHuangUser'];
	}
	else if(!isset($GLOBALS['_COOKIE']['DiHuangUser']) && isset($_SESSION['user_id']) && $_SESSION['user_id'] != 'Guest')
	{
		//setting cookie value
		setcookie('DiHuangUser',$_SESSION['user_id'],(time() + 1*24*60*60),'/');
	}
	
	//checking for user or guest user id
	if(isset($GLOBALS['_COOKIE']['DiHuangUser']))
	{
		if($_SESSION['user_id'] != $GLOBALS['_COOKIE']['DiHuangUser'] || substr($_SESSION['user_id'],0,4) != 'user')
		{
			$_SESSION['user_id'] = 'Guest';
		}
	}
	else if(!isset($GLOBALS['_COOKIE']['DiHuangUser']) && substr($_SESSION['user_id'],0,4) != 'user')
	{
		$_SESSION['user_id'] = 'Guest';
	}
		
?>