<?php
    include '../library/lib-DAL.php';
	$manageData = new ManageContent_DAL();
		
		$action = $manageData->updateValueWhere('product_info', 'status', $_POST['action'], 'product_id', $_POST['id']);
		
	
	header("location:../../list-product.php");
?>