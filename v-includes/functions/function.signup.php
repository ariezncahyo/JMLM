<?php
	session_start();
	//include DAL file
	include '../library/library.DAL.php';
	$manageData = new DAL_Library();
	
	//checking for values
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		//checking for password and confirm password must be same
		if($_POST['password'] == $_POST['con_password'])
		{
			//making user id
			$user_id = uniqid('user');
			//set user status
			$status = 1;
			$column_name = array('user_id','f_name','l_name','gender','dob','addr_1','addr_2','city','state','country','postal_code','phone','company','username','email_id','password','email_verification','status');
			$column_value = array($user_id,$_POST['f_name'],$_POST['l_name'],$_POST['gender'],$_POST['dob'],$_POST['addr1'],$_POST['addr2'],$_POST['city'],$_POST['state'],$_POST['country'],$_POST['postal_code'],$_POST['phone'],$_POST['company'],$_POST['username'],$_POST['email'],md5($_POST['password']),1,$status);
			//insert user info to database
			$insert = $manageData->insertValue('user_info',$column_name,$column_value);
			if($insert == 1)
			{
				//creating login time
				$login_time = time() + 1*24*60*60;
				//create cookie for user id
				setcookie('DiHuangUser',$user_id,$login_time,'/');
				//set session value
				$_SESSION['user_id'] = $user_id;
				
				$_SESSION['success'] = 'Registration Successfull!!';
				header("Location: ../../profile.php");
			}
			else
			{
				$_SESSION['warning'] = 'Registration Unsuccessfull!!';
				header("Location: ../../signup.php");
			}
		}
		else
		{
			$_SESSION['warning'] = 'Password Fields Not Matched';
			header("Location: ../../signup.php");
		}
	}
?>