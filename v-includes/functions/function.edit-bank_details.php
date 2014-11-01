<?php
	session_start();
	//include DAL file
	include '../library/library.DAL.php';
	$manageData = new DAL_Library();
	
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		
		//checking the name field and update it
		if(isset($_POST['ac_holder_name']) && !empty($_POST['ac_holder_name']))
		{
			$upd = $manageData->updateValueWhere('user_bank_info','ac_holder_name',$_POST['ac_holder_name'],'user_id',$_SESSION['user_id']);
		}
		//checking the account number field and update it
		if(isset($_POST['ac_number']) && !empty($_POST['ac_number']))
		{
			$upd = $manageData->updateValueWhere('user_bank_info','ac_number',$_POST['ac_number'],'user_id',$_SESSION['user_id']);
		}
		//checking the bank name field and update it
		if(isset($_POST['bank_name']) && !empty($_POST['bank_name']))
		{
			$upd = $manageData->updateValueWhere('user_bank_info','bank_name',$_POST['bank_name'],'user_id',$_SESSION['user_id']);
		}
		//checking the branch name field and update it
		if(isset($_POST['branch_name']) && !empty($_POST['branch_name']))
		{
			$upd = $manageData->updateValueWhere('user_bank_info','branch_name',$_POST['branch_name'],'user_id',$_SESSION['user_id']);
		}
		//checking the ifcs field and update it
		if(isset($_POST['ifsc_code']) && !empty($_POST['ifsc_code']))
		{
			$upd = $manageData->updateValueWhere('user_bank_info','ifsc_code',$_POST['ifsc_code'],'user_id',$_SESSION['user_id']);
		}
		//checking the tax number field and update it
		if(isset($_POST['tax_number']) && !empty($_POST['tax_number']))
		{
			$upd = $manageData->updateValueWhere('user_bank_info','tax_number',$_POST['tax_number'],'user_id',$_SESSION['user_id']);
		}
		
	}
	
	header("Location: ../../bank-account/");
	
		
		
?>
	