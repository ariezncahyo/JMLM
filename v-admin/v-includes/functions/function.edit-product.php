<?php
	session_start();
	//include dal file
	include '../library/lib-DAL.php';
	$manageData = new ManageContent_DAL();
	
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		if(isset($_POST['name']) && !empty($_POST['name']))
		{
			$upd = $manageData->updateValueWhere('product_info','name',$_POST['name'],'product_id',$_POST['pid']);
		}
		
		if($_POST['cat'][0] != -1)
		{
			if(end($_POST['cat']) == -1)
			{
				$category = prev($_POST['cat']);
			}
			else
			{
				$category == end($_POST['cat']);
			}
			$upd = $manageData->updateValueWhere('product_info','category',$category,'product_id',$_POST['pid']);
		}
		
		if(isset($_POST['short_des']) && !empty($_POST['short_des']))
		{
			$upd = $manageData->updateValueWhere('product_info','short_description',$_POST['short_des'],'product_id',$_POST['pid']);
		}
		
		if(isset($_POST['des']) && !empty($_POST['des']))
		{
			$upd = $manageData->updateValueWhere('product_info','description',$_POST['des'],'product_id',$_POST['pid']);
		}
		
		if(isset($_POST['old_price']) && !empty($_POST['old_price']))
		{
			$upd = $manageData->updateValueWhere('product_info','old_price',$_POST['old_price'],'product_id',$_POST['pid']);
		}
		
		if(isset($_POST['guest_price']) && !empty($_POST['guest_price']))
		{
			$upd = $manageData->updateValueWhere('product_info','guest_price',$_POST['guest_price'],'product_id',$_POST['pid']);
		}
		
		if(isset($_POST['member_price']) && !empty($_POST['member_price']))
		{
			$upd = $manageData->updateValueWhere('product_info','member_price',$_POST['member_price'],'product_id',$_POST['pid']);
		}
		
		if(isset($_POST['special_price']) && !empty($_POST['special_price']))
		{
			$upd = $manageData->updateValueWhere('product_info','special_price',$_POST['special_price'],'product_id',$_POST['pid']);
		}
		
		if(isset($_POST['pv']) && !empty($_POST['pv']))
		{
			$upd = $manageData->updateValueWhere('product_info','point_value',$_POST['pv'],'product_id',$_POST['pid']);
		}
		
		if(isset($_POST['stock']) && !empty($_POST['stock']))
		{
			$upd = $manageData->updateValueWhere('product_info','stock',$_POST['stock'],'product_id',$_POST['pid']);
			/* updating remaining stock */
			$processing_quan = $manageData->getValue_where('product_inventory_info','*','product_id',$_POST['pid']);
			//declaring a counter
			$pro_process = 0;
			if(!empty($processing_quan[0]))
			{
				foreach($processing_quan as $quantity)
				{
					$pro_process = $pro_process + intval($quantity['quantity']);
				}
			}
			$remaining_stock = intval($_POST['stock']) - intval($pro_process);
			//updating remaining stock value
			$upd = $manageData->updateValueWhere('product_info','remaining_stock',intval($remaining_stock),'product_id',$_POST['pid']);
		}
		
		
		if(isset($_POST['exp_date']) && !empty($_POST['exp_date']))
		{
			$upd = $manageData->updateValueWhere('product_info','exp_date',$_POST['exp_date'],'product_id',$_POST['pid']);
		}
		
		if(isset($_POST['maxpick']) && !empty($_POST['maxpick']))
		{
			$upd = $manageData->updateValueWhere('product_info','maxpick',$_POST['maxpick'],'product_id',$_POST['pid']);
		}
		
		//getting values from feature table
		$feature = $manageData->getValue_where('feature_product','*','product_id',$_POST['pid']);
		if($_POST['feature'] == 'active')
		{
			if(empty($feature[0]))
			{
				//insert the value
				$insert_feature = $manageData->insertValue('feature_product',array('product_id','status'),array($_POST['pid'],1));
			}
		}
		else if($_POST['feature'] == 'deactive')
		{
			if(!empty($feature[0]))
			{
				//delete the value
				$delete_feature = $manageData->deleteValue('feature_product','product_id',$_POST['pid']);
			}
		}
	}
	
	header("Location: ../../edit-product.php?pid=".$_POST['pid']);
?>