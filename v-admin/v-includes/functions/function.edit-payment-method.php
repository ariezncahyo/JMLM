<?php
	session_start();
	//include dal file
	include '../library/lib-DAL.php';
	$manageData = new ManageContent_DAL();
	
	switch ($GLOBALS['_POST']['fn'])
	{
		case md5('edit_paypal_payment_method'):
		{
			$update = $manageData->updateValueWhere('admin_info', 'paypal_payment_method', $_POST['paypal_payment_method'], 'id', 1);
			header("Location: ../../payment_configuration.php");
			break;
		}
		
		default:
		{
			break;
		}	
		
	}
?>