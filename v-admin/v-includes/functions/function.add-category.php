<?php
	session_start();
	//include dal file
	include '../library/lib-DAL.php';
	$manageData = new ManageContent_DAL();
	
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		if($_POST['cat'][0] != -1)
		{
			//getting last value of category array
			$lastIndex = end($_POST['cat']);
			if($lastIndex == 'root')
			{
				$parentId = '';
				$level = 1;
			}
			else if($lastIndex == -1)
			{
				$parentId = prev($_POST['cat']);
				//getting level of parent
				$upperLevel = $manageData->getValue_where('product_category','*','categoryId',$parentId);
				$level = intval($upperLevel[0]['level']) + 1;
			}
			else
			{
				$parentId = $lastIndex;
				$level = end(array_keys($_POST['cat'])) + 2;
			}
			//getting current datetime
			$datetime = date('Y-m-d h:i:s a');
			//set status and active field of category
			$status = 1;
			$active = 0;
			//inserting values to database
			$column_name = array('name','parentId','level','date','active','status');
			$column_value = array($_POST['name'],$parentId,$level,$datetime,$active,$status);
			$insert = $manageData->insertValue('product_category',$column_name,$column_value);
			
			/* updating parent's childId field */
			if(!empty($parentId))
			{
				//get value of inserted category id
				$category = $manageData->getLastValue('product_category','*','status',1,'categoryId');
				//getting child id of parent element
				$chilOfParent = $manageData->getValue_where('product_category','*','categoryId',$parentId);
				if(!empty($chilOfParent[0]['childId']))
				{
					$childId = $chilOfParent[0]['childId'].','.$category[0]['categoryId'];
				}
				else
				{
					$childId = $category[0]['categoryId'];
				}
				//update the value
				$update = $manageData->updateValueWhere('product_category','childId',$childId,'categoryId',$parentId);
			}
			
			if($insert == 1)
			{
				$_SESSION['success'] = 'Category Insert Successfully';
			}
			else
			{
				$_SESSION['warning'] = 'Category Insertion Unsuccessfull';
			}
		}
		else
		{
			$_SESSION['warning'] = 'Please Select A Category';
		}
	}
	
	header("Location: ../../add-category.php");
?>