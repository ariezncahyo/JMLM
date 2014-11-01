<?php
	session_start();
	//include DAL file
	include '../library/library.DAL.php';
	$manageData = new DAL_Library();
	
	//include class mail
	include '../library/class.mail.php';
	$mail = new mailFunction();
	
	//include utility class
	include '../library/class.utility.php';
	$utility = new utility();
	
	//checking for values
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		//create membership order id
		$mem_order_id = uniqid('mem_order');
		$membership_details = $manageData->getValue_where('membership_info', '*', 'status', 1);
		$amount = $membership_details[0]['price'];
		$date = date('Y-m-d h:m:s a');
		$ip = $utility->getIpAddress();
		$order_status = 'Processing';
		
		$column_name = array('membership_order_id','membership_id','user_id','payment_method','amount','date','ip','order_status');
		$column_value = array($mem_order_id,$membership_details[0]['membership_id'],$_SESSION['user_id'],$_POST['buy_mem'],$amount,$date,$ip,$order_status);
		
		$insert = $manageData->insertValue('membership_order_info', $column_name, $column_value);
		
		//getting userinfo
		$userinfo = $manageData->getValue_where('user_info', '*', 'user_id', $_SESSION['user_id']);
		$username = $userinfo[0]['f_name'].' '.$userinfo[0]['l_name'];
		$userEmailId = $userinfo[0]['email_id'];
		$membershipId = $membership_details[0]['membership_id'];
		$paymentMethod = $_POST['buy_mem'];
		$mail->mailForMembershipProductPurchase($userEmailId, $username, $mem_order_id, $membershipId, $paymentMethod, $amount, $date);
		
		if($insert == 1)
		{
			$_SESSION['mem_order_id'] = $mem_order_id;
			header("Location: ../../membership-purchased/");
		}
		else
		{
			$_SESSION['warning'] = 'Processing Unsuccessfull!!';
			header("Location: ../../buy-membership/");
		}
		
	}
?>