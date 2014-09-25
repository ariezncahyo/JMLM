<?php
	session_start();
	//include DAL file
	include '../library/library.DAL.php';
	$manageData = new DAL_Library();
	
	//include class mail
	include '../library/class.mail.php';
	$mail = new mailFunction();
	
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		if(isset($_POST['forgot_email']) && !empty($_POST['forgot_email']))
		{
			$user_details = $manageData->getValue_where('user_info', '*', 'email_id', $_POST['forgot_email']);
			$name = $user_details[0]['f_name'].' '.$user_details[0]['l_name'];
			if(!empty($user_details[0]))
			{
				$new_pass = uniqid();
				$upd = $manageData->updateValueWhere('user_info', 'password', md5($new_pass), 'email_id', $_POST['forgot_email']);
				$mailsent = $mail->forgotPasswordMail($user_details[0]['email_id'], $user_details[0]['username'], $new_pass, $name);
				if($mailsent == 1)
				{
					$_SESSION['success'] = 'Your new password is send to your mail';
					header("Location: ../../forgot-password.php");
				}
				else 
				{
					$_SESSION['warning'] = 'Changing password is unsuccessfull';
					header("Location: ../../forgot-password.php");	
				}
			}
			
		}
	}
	
	
?>