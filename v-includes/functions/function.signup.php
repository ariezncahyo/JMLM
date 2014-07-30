<?php
	session_start();
	//include DAL file
	include '../library/library.DAL.php';
	$manageData = new DAL_Library();
	
	//include class mail
	include '../library/class.mail.php';
	$mail = new mailFunction();
	
	//checking for values
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		//checking for password and confirm password must be same
		if($_POST['password'] == $_POST['con_password'])
		{
			//making user id
			$user_id = uniqid('user');
			//getting level of member
			$m_level = $manageData->getValue_where('member_level_info', '*', 'member_category', 'Member');
			//set user status
			$status = 1;
			$column_name = array('user_id','f_name','l_name','gender','dob','addr_1','addr_2','city','state','country','postal_code','phone','company','username','email_id','password','email_verification','membership_activation','member_level','status');
			$column_value = array($user_id,$_POST['f_name'],$_POST['l_name'],$_POST['gender'],$_POST['dob'],$_POST['addr1'],$_POST['addr2'],$_POST['city'],$_POST['state'],$_POST['country'],$_POST['postal_code'],$_POST['phone'],$_POST['company'],$_POST['username'],$_POST['email'],md5($_POST['password']),0,0,$m_level[0]['member_level'],$status);
			//insert user info to database
			$insert = $manageData->insertValue('user_info',$column_name,$column_value);
			if($insert == 1)
			{
				/* checking for referal user */
				if(!empty($_POST['ref_user']))
				{
					//getting id of reference user
					$ref_user = $manageData->getValue_where('user_mlm_info', '*','user_id',$_POST['ref_user']);
					$column_name_ref = array('user_id','parent_id','member_level','status');
					$column_value_ref = array($user_id,$ref_user[0]['id'],$m_level[0]['member_level'],$status);
					$insert_ref = $manageData->insertValue('user_mlm_info',$column_name_ref,$column_value_ref);
					//getting the id of this user id
					$id = $manageData->getValue_where('user_mlm_info', '*','user_id',$user_id);
					//update referal child id field
					if(!empty($ref_user[0]['child_id']))
					{
						$child_id = $ref_user[0]['child_id'].','.$id[0]['id'];
						$upd = $manageData->updateValueMultipleCondition('user_mlm_info', 'child_id', $child_id, array('user_id'), array($ref_user[0]['user_id']));
					}
					else
					{
						$child_id = $id[0]['id'];
						$upd = $manageData->updateValueMultipleCondition('user_mlm_info', 'child_id', $child_id, array('user_id'), array($ref_user[0]['user_id']));
					}
				}
				else
				{
					$column_name_ref = array('user_id','member_level','status');
					$column_value_ref = array($user_id,$m_level[0]['member_level'],$status);
					$insert_ref = $manageData->insertValue('user_mlm_info',$column_name_ref,$column_value_ref);
				}
				
				//creating login time
				$login_time = time() + 1*24*60*60;
				//create cookie for user id
				setcookie('DiHuangUser',$user_id,$login_time,'/');
				//set session value
				$_SESSION['user_id'] = $user_id;
				
				//sending email to verify email
				$mailSend = $mail->activationLink($_POST['email'],$_POST['username'],$user_id);
				
				$_SESSION['success'] = 'Registration Successfull!!';
				header("Location: ../../buy-membership.php");
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