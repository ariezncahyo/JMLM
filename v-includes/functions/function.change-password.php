<?php
	session_start();
	//include DAL file
	include '../library/library.DAL.php';
	$manageData = new DAL_Library();
	
	
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		//getting user old password
		$userDetails = $manageData->getValue_where('user_info', '*', 'user_id', $_SESSION['user_id']);
		if($userDetails[0]['password'] == md5($_POST['old_pass']))
		{
			if($_POST['new_pass'] == $_POST['re_pass'] && !empty($_POST['new_pass']))
			{
				$upd = $manageData->updateValueWhere('user_info', 'password', md5($_POST['new_pass']), 'user_id', $_SESSION['user_id']);
				if($upd == 1)
				{
					$_SESSION['success'] = 'Password is changed successfully';
				}
				else
				{
					$_SESSION['warning'] = 'Password changning unsuccessfull';
				}
			}
			else
			{
				$_SESSION['warning'] = 'Please correctly match new password';
			}
		}
		else
		{
			$_SESSION['warning'] = 'Old Pass word is incorrect';
		}
	}
	
	header("Location: ../../change-password/");
?>