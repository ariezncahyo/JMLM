<?php
	session_start();
	//include DAL file
	include '../library/library.DAL.php';
	$manageData = new DAL_Library();
	
	//checking for values
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		//checking for empty username field
		if(!empty($_POST['email']) || !empty($_POST['password']))
		{
			//getting values of user from email
			$user_cred = $manageData->getValue_where('user_info','*','email_id',$_POST['email']);
			if(!empty($user_cred[0]))
			{
				if($user_cred[0]['password'] == md5($_POST['password']))
				{
					//creating login time
					if($_POST['login_time'] == 'on')
					{
						$login_time = time() + 7*24*60*60;
					}
					else
					{
						$login_time = time() + 1*24*60*60;
					}
					//create cookie for user id
					setcookie('DiHuangUser',$user_cred[0]['user_id'],$login_time,'/');
					//set session value
					$_SESSION['user_id'] = $user_cred[0]['user_id'];
					if($user_cred[0]['email_verification'] == 0)
					{
						$_SESSION['invalid'] == 'Email Not Verified';
					}
					
					$_SESSION['success'] = 'Login Successfull';
					header("Location: ../../profile.php");
				}
				else
				{
					$_SESSION['warning'] = 'Username Or Password Not Matched';
					header("Location: ../../login.php");
				}
			}
			else
			{
				$_SESSION['warning'] = 'Username Or Password Not Matched';
				header("Location: ../../login.php");
			}
		}
		else
		{
			$_SESSION['warning'] = 'Please Fill Up The Field Properly';
			header("Location: ../../login.php");
		}
		
	}
?>