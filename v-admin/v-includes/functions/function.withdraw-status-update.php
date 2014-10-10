<?php
	//include dal file
	include '../library/lib-DAL.php';
	$manageData = new ManageContent_DAL();
	
	if($_SERVER['REQUEST_METHOD'] == 'GET')
	{	
		if(isset($_GET['withdraw_id']) && !empty($_GET['withdraw_id']))
		{
			//updating status of withdraw	
			$manageData->updateValueWhere('withdraw_info','status',1,'withdraw_id',$_GET['withdraw_id']);
			//getting the processed withdraw amount
			$withdrawn_amount=$_GET['amount'];
			//getting userid
			$userid=$_GET['userid'];
			//getting processing withdraw amount from database
			$a=$manageData->getValue_where('user_profile_info','processing_withdraw_amount','user_id',$userid);
			$processing_withdraw_amount=$a[0]['processing_withdraw_amount'];
			//getting processing withdraw amont
			$latest_processing_withdraw_amount=$processing_withdraw_amount-$withdrawn_amount;
			//updating withdraw amount in database
			$manageData->updateValueWhere('user_profile_info','withdraw_amount',$withdrawn_amount,'user_id',$userid);
			//updating latest processing withdraw amount in database
			$manageData->updateValueWhere('user_profile_info','processing_withdraw_amount',$latest_processing_withdraw_amount,'user_id',$userid);
		}	
	}
	header("Location: ../../user-withdraw-info.php");
?>