<?php
	session_start();
	//include DAL file
	include '../library/library.DAL.php';
	$manageData = new DAL_Library();
	//include class mail file
	include '../library/class.mail.php';
	$manageMail = new mailFunction();
	//checking for values
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		if(!empty($_POST['amount']) && !empty($_POST['with_pro']))
		{
			$amount = $_POST['amount'];
			$date = date('Y-m-d h:m:s a');
			/* get net amount of user */
			//get user total money
			$user_money = $manageData->getLastValue('user_money_info', '*', 'user_id', $_SESSION['user_id'], 'id');
			//user withdraw money
			$money = $manageData->getValue_where('user_profile_info', '*', 'user_id', $_SESSION['user_id']);
			
			//net amount
			$net_total = $money[0]['net_amount'];
			
			if($net_total >= $amount)
			{
				if(!empty($money[0]) && $user_money[0]['total_money'] == $money[0]['net_amount'])
				{
					//create withdraw id
					$withdraw_id = uniqid('withdraw');
					//insert values to withdraw info table
					$insert = $manageData->insertValue('withdraw_info', array('withdraw_id','user_id','withdraw_method','amount','date','status'), array($withdraw_id,$_SESSION['user_id'],$_POST['with_pro'],$amount,$date,0));
					
				 	$new_processing_amount = $money[0]['processing_withdraw_amount'] + $amount;
					$new_net_amount = $money[0]['net_amount'] - $amount;
					//update the value
					$update = $manageData->updateMultipleValueMulCondition('user_profile_info', array('processing_withdraw_amount','net_amount'), array($new_processing_amount,$new_net_amount), array('user_id'), array($_SESSION['user_id']));
					//insert values to user money info table
					$insert_money = $manageData->insertValue('user_money_info', array('user_id','specification','deduct_money','total_money'), array($_SESSION['user_id'],$withdraw_id,$amount,$new_net_amount));
					 
					$_SESSION['success'] = 'Your Request Has Been Sent. Your Order Id Is '.$withdraw_id;
					//getting user email id
					$userEmail = $manageData->getValue_where('user_info', "*", 'user_id', $_SESSION['user_id']);
					$toEmail = $userEmail[0]['email_id'];
					//getting username
					$toUsername = $userEmail[0]['f_name']." ".$userEmail[0]['l_name'];
					$userEmail1 = $manageData->getValue_where('withdraw_info', "*", 'user_id', $_SESSION['user_id']);
					//getting withdraw method
					$withdraw_method = $userEmail1[0]['withdraw_method'];
					//getting datetime
					$datetime = $userEmail1[0]['date'];
					$manageMail->mailForWithdrawInvoices($toEmail, $toUsername, $withdraw_id,$withdraw_method,$datetime);
				}
				else
				{
					$_SESSION['warning'] = 'Processing Error Occurred!!';
				}
					
			}
			else
			{
				$_SESSION['warning'] = 'You Have Not This Amount In Your Cart!!';
			}
				
		}
		else
		{
			$_SESSION['warning'] = 'You Have To Fill Up The Fields Properly!!';
		}
	}

	header("Location: ../../withdraw-amount.php");
?>