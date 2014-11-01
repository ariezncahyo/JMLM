<?php
	session_start();
	//include DAL file
	include '../library/library.DAL.php';
	$manageData = new DAL_Library();
	
	//checking for values
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
	
		$column_name = array('user_id','ac_holder_name','ac_number','bank_name','branch_name','ifsc_code','tax_number');
		$column_value = array($_SESSION['user_id'],$_POST['ac_holder_name'],$_POST['ac_number'],$_POST['bank_name'],$_POST['branch_name'],$_POST['ifsc_code'],$_POST['tax_number']);
		
		//insert bank details to data base
		$insert = $manageData->insertValue('user_bank_info',$column_name,$column_value);
		
	}
	
	header("Location: ../../bank-account/");
?>