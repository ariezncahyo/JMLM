<?php
	session_start();
	//include dal file
	include '../library/lib-DAL.php';
	$manageData = new ManageContent_DAL();
	
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
			}
			
		}
		
		if(isset($_POST['notes']) && !empty($_POST['notes']))
		{
			$upd = $manageData->updateValueWhere('membership_order_info','notes',$_POST['notes'],'membership_order_id',$_POST['oid']);
		}
		
	}
	
	header("Location: ../../membership-order-info.php?oid=".$_POST['oid']."&action=status");
?>