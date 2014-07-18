<?php
	session_start();
	//include dal file
	include '../library/lib-DAL.php';
	$manageData = new ManageContent_DAL();
	
	/* codes for making an string from an array */
	function makeAString($input_array)
	{
		//defining a string
		$str = '';
		if(!empty($input_array))
		{
			foreach($input_array as $key=>$value)
			{
				$str = $str.','.$value;
			}
		}
		$str = substr($str,1);
		return $str;
	}
	
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		switch($GLOBALS['_POST']['op'])
		{
			case 'set_product':
			{
				//get product id
				$product_id = $_POST['pro'];
				$specification = $_POST['speci'];
				//getting values from table
				$values = $manageData->getValueMultipleCondtn('product_customization','*',array('product_id','specification'),array($product_id,$specification));
				if(empty($values[0]))
				{
					header("Location: ../../product-custom.php?pid=".$product_id."&speci=".$specification."&action=add");
				}
				else
				{
					header("Location: ../../product-custom.php?pid=".$product_id."&speci=".$specification."&action=edit");
				}
				break;
			}
			
			case 'add_pro':
			{
				//getting string of input array
				$value = makeAString($_POST['pro']);
				$column_name = array('product_id','specification','value','status');
				$column_value = array($_POST['pid'],$_POST['speci'],$value,1);
				$insert = $manageData->insertValue('product_customization',$column_name,$column_value);
				if($insert == 1)
				{
					$_SESSION['success'] = 'Insert Successfull';
				}
				else
				{
					$_SESSION['warning'] = 'Insert Unsuccessfull';
				}
				header("Location: ../../product-custom.php?pid=".$_POST['pid']."&speci=".$_POST['speci']."&action=edit");
				break;
			}
			
			case 'edit_pro':
			{
				//getting string of input array
				$value = makeAString($_POST['pro']);
				if(!empty($value))
				{
					$update = $manageData->updateValueMultipleCondition('product_customization','value',$value,array('product_id','specification'),array($_POST['pid'],$_POST['speci']));
				}
				if($update == 1)
				{
					$_SESSION['success'] = 'Update Successfull';
				}
				else
				{
					$_SESSION['warning'] = 'Update Unsuccessfull';
				}
				header("Location: ../../product-custom.php?pid=".$_POST['pid']."&speci=".$_POST['speci']."&action=edit");
				break;
			}
			
		}
	}
	
?>