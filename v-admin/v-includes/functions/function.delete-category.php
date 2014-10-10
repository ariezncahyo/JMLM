<?php
	$pageTitle = 'Delete Category';
	if(!isset($GLOBALS['_GET']['id']))
	{
		header("Location:../../admin.php");
	}
	$id = $GLOBALS['_GET']['id'];
	
	include '../library/lib-DAL.php';
	$manageData = new ManageContent_DAL();
	
	switch ($GLOBALS['_GET']['op']) {
		case 'del':
			
			//getting data of product 
			$productData = $manageData->getValue_where('product_category', '*', 'categoryId', $id);
			//checking if product has a parent 
			if(!empty($productData[0]['parentId']))
			{
				//getting parent data of the product	
				$parentData = $manageData->getValue_where('product_category', '*','categoryId', $productData[0]['parentId']);
				//getting childids of the parent of the product
				$child_db = $parentData[0]['childId'];
				//converting string into array
				$childIds = explode(',', $child_db);
				if(!empty($childIds))
				{
					foreach($childIds as $key=>$value)
					{
						//checking if value of an element of the array is equal to the product id	
						if($value == $id)
						{
							$index = $key;
							break;
						}
					}
				}
				//removing the product from childid array of the parent
				unset($childIds[$index]);
				//rearranging the position of the array values
				$childIds = array_values($childIds);
				//making string of parent child ids of the array
				if( !empty($childIds) )
				{
					$val_str = "";
					foreach ($childIds as $val)
					{
							$val_str = $val.",";
					}
					$childIds = substr($val_str, 0, -1);
				}
				else 
				{
					$childIds = 'NULL';
				}
				
				//update value
				$updParent = $manageData->updateValueWhere('product_category', 'childId', $childIds ,'categoryId', $productData[0]['parentId']);
				
			}
			//recursive function to delete subsequent childids
			function recursiveChildDeletion($id, $manageData)
			{
				$childData = $manageData->getValue_where('product_category', '*', 'categoryId', $id);
				$manageData->deleteValue('product_category', 'categoryId', $id);	
				if(!empty($childData[0]['childId']))
				{
					$childIdArray = explode(',', $childData[0]['childId']);
					foreach($childIdArray as $childId)
					{
						recursiveChildDeletion($childId, $manageData);
					}
				}
			}
			//calling child deletion function
			recursiveChildDeletion($id, $manageData);
			
			break;
		
		case 'activate':
			
			$productData = $manageData->getValue_where('product_category', '*', 'categoryId', $id);
			if($productData[0]['status'] != 1)
			{
				$updStatus = $manageData->updateValueWhere('product_category', 'status', 1, 'categoryId', $id);
			}
			break;
		
		case 'deactivate':
			
			$productData = $manageData->getValue_where('product_category', '*', 'categoryId', $id);
			if($productData[0]['status'] != 0)
			{
				$updStatus = $manageData->updateValueWhere('product_category', 'status', 0, 'categoryId', $id);
			}
			break;
		
		default:
			
			break;
	}
	
	
	header("location:../../list-category.php");	
?>