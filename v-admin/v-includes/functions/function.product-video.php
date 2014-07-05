<?php
	session_start();
	//include dal file
	include '../library/lib-DAL.php';
	$manageData = new ManageContent_DAL();
	
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		//get values from database
		$videos = $manageData->getValue_where('product_video','*','product_id',$_POST['pid']);
		if(empty($videos[0]))
		{
			$column_name = array('product_id','video','status');
			$column_value = array($_POST['pid'],$_POST['video'],1);
			$insert = $manageData->insertValue('product_video',$column_name,$column_value);
		}
		else
		{
			if(!empty($_POST['video']))
			{
				$update = $manageData->updateValueWhere('product_video','video',$_POST['video'],'product_id',$_POST['pid']);
			}
		}
		if($insert == 1 || $update == 1)
		{
			$_SESSION['success'] = 'Action Successfull!!';
		}
		else
		{
			$_SESSION['warning'] = 'Action Unsuccessfull!!';
		}
	}
	
	header("Location: ../../product-video.php?pid=".$_POST['pid']);
?>