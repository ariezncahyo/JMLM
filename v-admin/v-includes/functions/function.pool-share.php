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
		$today = date('Y-m-d h:m:s a');
		//getting pool sharing details
		$poolshare = $manageData->getLastValue('pool_sharing_info', '*', 1, 1, 'id');
		//getting system pv
		$system_pv = $manageData->getLastValue('system_pv_info', '*', 1, 1, 'id');
		if(!empty($poolshare[0]))
		{
			//getting date from and date to
			$date_from = strtotime($poolshare[0]['date_to']);
			$date_to = $poolshare[0]['next_date'];
			
			$pv_info = $manageData->getValue('system_pv_info', '*');
			if(!empty($pv_info[0]))
			{
				//declaring a variable
				$distributing_pv = 0;
				foreach($pv_info as $pv)
				{
					/*if(strtotime($pv['date']) >= strtotime($date_from) && strtotime($pv['date']) <= strtotime($date_to))
					{
						$distributing_pv = $distributing_pv + $pv['credit'];
					}*/
					$distributing_pv = $distributing_pv + $pv['credit'];
				}
			}
		}
		else
		{
			//getting date from and date to
			$date_from = '';
			$date_to = $today;
			$distributing_pv = $system_pv[0]['system_pv_balance'];
		}
		
		//create transaction id
		$trans_id = uniqid('trans');
		//insert transaction details
		$insert_trans = $manageData->insertValue('fee_transaction_info', array('transaction_id','fee_type'), array($trans_id,'PS'));
		if(!empty($distributing_pv))
		{
			//distribute pool sharing pv
			$dis_pv = $money_mlm->distributePsPointValue($trans_id, $distributing_pv);
			//insert values to system pv info
			$insert_system_pv = $manageData->insertValue('system_pv_info', array('specification','debit','system_pv_balance','date'), array($trans_id,$dis_pv,($system_pv[0]['system_pv_balance'] - $dis_pv),$today));
			//insert values to pool sharing info table
			$column_name = array('specification','system_pv','distributed_pv','date_from','date_to','distributed_date','next_date','status');
			$next_date_stamp = strtotime($date_to . " +30 days");
			$next_date = date("Y-m-d h:m:s a",$next_date_stamp);
			$column_value = array($trans_id,$distributing_pv,$dis_pv,$date_from,$date_to,$today,$next_date,1);
			$insert = $manageData->insertValue('pool_sharing_info', $column_name, $column_value);
			
			if($insert == 1)
			{
				$_SESSION['success'] = 'Pool Sharing Successfull';
			}
			else
			{
				$_SESSION['warning'] = 'Pool Sharing Unsuccessfull';
			}
		}
		else
		{
			$_SESSION['warning'] = 'Distributing Point Value is NULL';
		}
			
	}
	
	header("Location: ../../poolShareList.php");
?>