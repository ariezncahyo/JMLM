<?php
	session_start();
	//include dal file
	include '../library/lib-DAL.php';
	$manageData = new ManageContent_DAL();
	
	switch ($GLOBALS['_POST']['fn'])
	{
		case md5('edit_mem_price'):
		{
			if(isset($_POST['price']) && !empty($_POST['price']))
			{
				$update = $manageData->updateValueWhere('membership_info', 'price', $_POST['price'], 'id', 1);
			}
			header("Location: ../../misc-details.php");
			break;
		}
		
		case md5('edit_currency'):
		{
			if(isset($_POST['currency']) && !empty($_POST['currency']))
			{
				$update = $manageData->updateValueWhere('system_currency', 'currency', $_POST['currency'], 'field', 'product');
			}
			header("Location: ../../misc-details.php");
			break;
		}
		
		case md5('edit_ship_charge'):
		{
			if(isset($_POST['shipping_cost']) && !empty($_POST['shipping_cost']))
			{
				$update = $manageData->updateValueWhere('shipping_cost_info','shipping_cost', $_POST['shipping_cost'], 'id',1);
			}
			header("Location: ../../misc-details.php");
			break;
		}
		default:
		{
			break;
		}	
		
	}
?>