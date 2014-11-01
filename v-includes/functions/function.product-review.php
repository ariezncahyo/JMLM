<?php
	session_start();
	//include DAL file
	include '../library/library.DAL.php';
	$manageData = new DAL_Library();
	
	//checking for values
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		switch ($_POST['action']) 
		{
			case 'insert':
				{
					$column_name = array('product_id', 'user_id', 'review', 'date', 'status');
					$column_values = array($_POST['proid'], $_SESSION['user_id'], $_POST['review'], date('Y-m-d h:i:s'), 1);	
					$insert = $manageData->insertValue('product_review_info', $column_name, $column_values);
				}
				break;
			
			case 'update':
				{
					$column_name = array('product_id', 'user_id');
					$column_value = array($_POST['proid'], $_SESSION['user_id']);	
					$update = $manageData->updateValueMultipleCondition('product_review_info', 'review', $_POST['review'], $column_name, $column_value);
					$update_time = $update = $manageData->updateValueMultipleCondition('product_review_info', 'date', date('Y-m-d h:i:s'), $column_name, $column_value);				
				}
				break;
		}	
		
		header("location:../../product-review/".$_POST['proid']);
	}
?>