<?php
	session_start();
	//include dal file
	include '../library/lib-DAL.php';
	$manageData = new ManageContent_DAL();
	
	//add the upload class auth:riju
	include '../library/class.upload_file.php';
	$upload = new FileUpload();
	
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		//getting details of category
		$catDetails = $manageData->getValue_where('product_category', '*', 'categoryId', $_POST['id']);
		
		if(isset($_POST['name']) && !empty($_POST['name']))
		{
			$upd_name = $manageData->updateValueWhere('product_category', 'name', $_POST['name'], 'categoryId', $_POST['id']);
		}
		
		if(!empty($_FILES['picture']['name']))
		{
			//for uploading image of category
			$filename_desired = uniqid('cat');
			$input_name = $_FILES['picture'];
			$path = '../../../images/category/';
			$uplod = $upload->upload_file($filename_desired, $input_name, $path);
			$img_db = 'images/category/'.$uplod;
			$upd_img = $manageData->updateValueWhere('product_category', 'image', $img_db ,'categoryId', $_POST['id']);
		}
			
		
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
			
			//checking that parent element is similar to previous parent element or not
			if($parentId != $catDetails[0]['parentId'])
			{
				//getting child element of parent category
				$parentDetails = $manageData->getValue_where('product_category', '*', 'categoryId', $catDetails[0]['parentId']);
				$parent_child = explode(',', $parentDetails[0]['childId']);
				
				if(!empty($parent_child))
				{
					foreach($parent_child as $key=>$value)
					{
						if($value == $_POST['id'])
						{
							$index = $key;
							break;
						}
					}
				}
				
				//removing array element
				unset($parent_child[$index]);
				$parent_child = array_values($parent_child);
				
				//make string of parent child ids
				$parentChildId = convertArrayToString($parent_child);
				//update value
				$updParentChild = $manageData->updateValueWhere('product_category', 'childId', $parentChildId ,'categoryId', $parentDetails[0]['categoryId']);
			}
			
			//update category values
			//$updCat = $manageData->updateMultipleValueOneCondition('product_category', array('parentId','level','date'), array($parentId,$level,$datetime), 'categoryId', $_POST['id']);
			$updPar = $manageData->updateValueWhere('product_category', 'parentId', $parentId, 'categoryId', $_POST['id']);
			$updLevel = $manageData->updateValueWhere('product_category', 'level', $level, 'categoryId', $_POST['id']);
			$updDate = $manageData->updateValueWhere('product_category', 'date', $datetime, 'categoryId', $_POST['id']);
			//setting child's level
			if($level != $catDetails[0]['level'])
			{
				//calling recursive function
				changeChildLevel($manageData, $catDetails[0]['childId'], $level);
			}
			
			/* updating parent's childId field */
			if(!empty($parentId) && $parentId != $catDetails[0]['parentId'])
			{
				//get value of inserted category id
				$category = $_POST['id'];
				//getting child id of parent element
				$chilOfParent = $manageData->getValue_where('product_category','*','categoryId',$parentId);
				if(!empty($chilOfParent[0]['childId']))
				{
					$childId = $chilOfParent[0]['childId'].','.$category;
				}
				else
				{
					$childId = $category;
				}
				//update the value
				$update = $manageData->updateValueWhere('product_category','childId',$childId,'categoryId',$parentId);
			}
			
		}
	}

	//function for concat array element to string
	function convertArrayToString($val_array)
	{
		if( !empty($val_array) )
		{
			$val_str = "";
			
			foreach ($val_array as $val)
			{
					$val_str = $val.",";
			}
			
			return substr($val_str, 0, -1);
		}
	}
	
	//function for changing child level
	function changeChildLevel($manageData,$childString,$level)
	{
		if(!empty($childString))
		{
			$new_level = $level + 1;
			$childId = explode(',', $childString);
			if(!empty($childId))
			{
				foreach($childId as $key=>$value)
				{
					//update level
					$updLevel = $manageData->updateValueWhere('product_category', 'level', $new_level, 'categoryId', $value);
					//getting details
					$idDetails = $manageData->getValue_where('product_category', '*', 'categoryId', $value);
					if(!empty($idDetails[0]['childId']))
					{
						changeChildLevel($manageData, $idDetails[0]['childId'], $new_level);
					}
					
				}
			}
		}
	}
	
	header("Location: ../../edit-category.php?id=".$_POST['id']);
?>