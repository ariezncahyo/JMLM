<?php
	session_start();
	//include BLL file
	include 'v-includes/library/library.BLL.php';
	$manageContent = new BLL_Library();
	
	//include Money Mlm class
	include 'v-includes/library/library.money-mlm.php';
	$moneyMLM = new Money_MLM();
	
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
	if(isset($GLOBALS['_COOKIE']['DiHuangUser']) && isset($_SESSION['user_id']))
	{
		if($_SESSION['user_id'] != $GLOBALS['_COOKIE']['DiHuangUser'] || substr($_SESSION['user_id'],0,4) != 'user')
		{
			$_SESSION['user_id'] = 'Guest';
		}
	}
	else if(!isset($GLOBALS['_COOKIE']['DiHuangUser']) && !isset($_SESSION['user_id']))
	{
		$_SESSION['user_id'] = 'Guest';
	}
	
	//checking validiation
	if(isset($_SESSION['user_id']))
	{
		if(substr($_SESSION['user_id'],0,4) == 'user')
		{
			$userStatus = $manageContent->getMemberValidiation();
			if($userStatus[0]['membership_activation'] != 1)
			{
				$_SESSION['invalid'] = 'Membership deactivated';
			}
			elseif($userStatus[0]['email_verification'] == 0)
			{
				$_SESSION['invalid'] = 'Email Not Verified';
			}
			else
			{
				unset($_SESSION['invalid']);
			}
		}
	}
	
	//including the base url
	$baseUrl = $manageContent->getBaseUrl();
	
	//include language
	if(isset($_SESSION['language']))
	{
		$lang = $_SESSION['language'];
		$langFileNames = scandir('languages/');
		for($i=2;$i<count($langFileNames);$i++)
		{
			$langarr = explode('-', $langFileNames[$i]);	
			if($lang == $langarr[0])
			{
				include 'languages/'.$langFileNames[$i];	
				break;
			}
		}
	}
	else
	{
		include 'languages/English-lang.php';
	}		
?>