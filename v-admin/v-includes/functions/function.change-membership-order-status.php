<?php
	session_start();
	//include money mlm class
	include '../library/library.money-mlm.php';
	$money_mlm = new Money_MLM();
	//include dal file
	include_once '../library/lib-DAL.php';
	$manageData = new ManageContent_DAL();
	//include email class file
	include_once '../library/class.mail.php';
	$sendEmail = new mailFunction();
	
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		if(isset($_POST['order_status']) && !empty($_POST['order_status']))
		{
			$order_details_prev = $manageData->getValue_where('membership_order_info', '*', 'membership_order_id', $_POST['oid']);
			$upd_status = $manageData->updateValueWhere('membership_order_info','order_status',$_POST['order_status'],'membership_order_id',$_POST['oid']);
			// getting values of order id
			$order_details_updated = $manageData->getValue_where('membership_order_info', '*', 'membership_order_id', $_POST['oid']);
			if($upd_status == 1 && $_POST['order_status'] == 'Completed' && $order_details_prev[0]['order_status'] != 'Completed')
			{
				//update membership
				$update_membership = $manageData->updateValueWhere('user_info', 'membership_activation', 1, 'user_id', $order_details_updated[0]['user_id']);
				//inserting values to system money info
				//getting system balance
				$system_balance = $manageData->getLastValue('system_money_info', '*', 1, 1, 'id');
				$new_system_balance = $system_balance[0]['system_balance'] + $order_details_updated[0]['amount'];
				$column_name = array('specification','credit','system_balance');
				$column_value = array($_POST['oid'],$order_details_updated[0]['amount'],$new_system_balance);
				$insert = $manageData->insertValue('system_money_info', $column_name, $column_value);
				
				//calling function for distribute money
				$distribute = $money_mlm->getMembershipPurchaseDetails($_POST['oid']);
			}
			
			//sending mail to user for order status
			if($order_details_prev[0]['order_status'] != $order_details_updated[0]['order_status'])
			{
				//Auth: Debojyoti
				//getting userinfo
				$userinfo = $manageData->getValue_where('user_info', '*', 'user_id', $order_details_updated[0]['user_id']);
				//getting system currency
				$system_currency = $manageData->getValue_where('system_currency', '*', 'field', 'product');
				//calling membershipEmail method on class.mail.php
				$sendEmail->membershipEmail($userinfo[0]['username'], $userinfo[0]['email_id'], $order_details_updated[0]['membership_order_id'], $order_details_updated[0]['payment_method'], $order_details_updated[0]['amount'], $system_currency[0]['currency'], $_POST['order_status']);
				//Auth: Debojyoti
			}
			
		}
		
		if(isset($_POST['notes']) && !empty($_POST['notes']))
		{
			$upd = $manageData->updateValueWhere('membership_order_info','notes',$_POST['notes'],'membership_order_id',$_POST['oid']);
		}
		
	}
	
	header("Location: ../../membership-order-info.php?oid=".$_POST['oid']."&action=status");
?>