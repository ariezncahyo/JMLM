<?php
	session_start();
	//include dal file
	include '../library/lib-DAL.php';
	$manageData = new ManageContent_DAL();
	
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		if(isset($_POST['order_status']) && !empty($_POST['order_status']))
		{
			$upd = $manageData->updateValueWhere('order_info','order_status',$_POST['order_status'],'order_id',$_POST['oid']);
		}
		
		if(isset($_POST['notes']) && !empty($_POST['notes']))
		{
			$upd = $manageData->updateValueWhere('order_info','notes',$_POST['notes'],'order_id',$_POST['oid']);
		}
		
	}
	
	header("Location: ../../order-info.php?oid=".$_POST['oid']."&action=status");
?>