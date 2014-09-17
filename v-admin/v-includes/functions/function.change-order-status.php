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
			//get order details
			$order_details_prev = $manageData->getValue_where('order_info', '*', 'order_id', $_POST['oid']);
			$upd_status = $manageData->updateValueWhere('order_info','order_status',$_POST['order_status'],'order_id',$_POST['oid']);
			//get order details
			$order_details = $manageData->getValue_where('order_info', '*', 'order_id', $_POST['oid']);
			//checking for order complete
			if($order_details[0]['order_status'] == 'Completed' && $order_details_prev[0]['order_status'] != 'Completed' && $order_details[0]['user_id'] != 'Guest')
			{
				//getting order product details
				$order_product_details = $manageData->getValue_where('product_inventory_info', '*', 'order_id', $_POST['oid']);
				//inserting values to system money info
				//getting system balance
				$system_balance = $manageData->getLastValue('system_money_info', '*', 1, 1, 'id');
				$new_system_balance = $system_balance[0]['system_balance'] + $order_details[0]['total_amount'];
				$column_name = array('specification','credit','system_balance');
				$column_value = array($_POST['oid'],$order_details[0]['total_amount'],$new_system_balance);
				$insert = $manageData->insertValue('system_money_info', $column_name, $column_value);
				
				//calling function for distribute money
				$distribute = $money_mlm->getOrderPurchaseDetails($_POST['oid']);
			}
			
			//sending mail to user for order status
			if($order_details_prev[0]['order_status'] != $order_details[0]['order_status'])
			{
				//Auth: Debojyoti
				//getting userinfo
				$userinfo = $manageData->getValue_where('user_info', '*', 'user_id', $order_details[0]['user_id']);
				//getting system currency
				$system_currency = $manageData->getValue_where('system_currency', '*', 'field', 'product');
				//calling orderStatusMail method on class.mail.php
				$sendEmail->orderStatusMail($userinfo[0]['username'], $userinfo[0]['email_id'], $order_details[0]['order_id'], $order_details[0]['payment_method'], $order_details[0]['total_amount'], $system_currency[0]['currency'], $_POST['order_status']);
				//Auth: Debojyoti
			}
		}
		
		if(isset($_POST['notes']) && !empty($_POST['notes']))
		{
			$upd = $manageData->updateValueWhere('order_info','notes',$_POST['notes'],'order_id',$_POST['oid']);
		}
		
	}
	
	header("Location: ../../order-info.php?oid=".$_POST['oid']."&action=status");
?>