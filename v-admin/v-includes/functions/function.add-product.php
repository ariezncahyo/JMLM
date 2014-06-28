<?php
	session_start();
	//include dal file
	include '../library/lib-DAL.php';
	$manageData = new ManageContent_DAL();
	
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		//create product id
		$product_id = uniqid('pro');
		//getting sub category
		if(isset($_POST['sub_cat']))
		{
			$subcat = $_POST['sub_cat'];
		}
		else
		{
			$subcat = '';
		}
		//get current date time
		$datetime = date('Y-m-d h:i:s a');
		//setting status
		$status = 1;
		//inserting values in product table
		$column_name_pro = array('product_id','category','sub_category','name','description','old_price','guest_price','member_price','special_price','distribution_rate','stock','exp_date','maxpick','date','status');
		$column_value_pro = array($product_id,$_POST['cat'],$_POST['sub_cat'],$_POST['name'],$_POST['des'],$_POST['old_price'],$_POST['guest_price'],$_POST['member_price'],$_POST['special_price'],$_POST['distribution_rate'],$_POST['stock'],$_POST['exp_date'],$_POST['maxpick'],$datetime,$status);
		$insert_pro = $manageData->insertValue('product_info',$column_name_pro,$column_value_pro);
		
		if($_POST['feature'] == 'active')
		{
			//inserting values in feature product table
			$column_name_feature = array('product_id','status');
			$column_value_feature = array($product_id,$status);
			$insert_feature = $manageData->insertValue('feature_product',$column_name_feature,$column_value_feature);
		}
			
		if($insert_pro == 1)
		{
			echo $insert_pro;
			$_SESSION['success'] = 'Product Uploaded Successfully';
		}
		else
		{
			$_SESSION['warning'] = 'Product Uploaded Unsuccessfully';
		}
	}
	
	header("Location: ../../add-product.php");
?>