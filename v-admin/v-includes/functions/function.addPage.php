<?php
session_start();
//include dal file
include '../library/lib-DAL.php';
$manageData = new ManageContent_DAL();
//include upload file
include '../library/class.upload_file.php';
$upload = new FileUpload();
switch ($_POST['action']) {
	case 'INSERT':
		//set unique page name
		$page_id = uniqid('p');
		//upload image to desired folder
		$imageName = $upload->upload_file($page_id,$_FILES['image'],'../../../images/');
		$curdate = date('Y-m-d');
		$curtime = date('h:i:s');
		//$extension = end(explode('.',$_FILES['image']['name']));
		$column_name = array('page_id','page_name','page_content','image','date','time','status');
		$column_value = array($page_id,$_POST['name'],$_POST['des'],$imageName,$curdate,$curtime,$_POST['status']);
		//insert the values
		$insert = $manageData->insertValue('mypage',$column_name,$column_value);
		if($insert == 1)
		{
			$_SESSION['success'] = 'Insert Successfull';
		}
		else
		{
			$_SESSION['warning'] = 'Insert Unsuccessfull';
		}
		header("Location: ../../addPage.php");
		break;
	
	case 'UPDATE':
		if(isset($_POST['name']) && !empty($_POST['name']))
		{
			$upd1 = $manageData->updateValueWhere('mypage','page_name',$_POST['name'],'page_id',$_POST['id']);
		}
		if(isset($_POST['des']) && !empty($_POST['des']))
		{
			$upd2 = $manageData->updateValueWhere('mypage','page_content',$_POST['des'],'page_id',$_POST['id']);
		}
		if(isset($_POST['status']))
		{
			$upd3 = $manageData->updateValueWhere('mypage','status',$_POST['status'],'page_id',$_POST['id']);
		}
		if(isset($_FILES['image']['name']) && !empty($_FILES['image']['name']))
		{
			$curdate = date('Y-m-d');
			$curtime = date('h:i:s');	
			//upload image to desired folder
			$upd5=$upload->upload_file($_POST['id'],$_FILES['image'],'../../../images/');	
			$upd4 = $manageData->updateValueWhere('mypage','image',$upd5,'page_id',$_POST['id']);
			
		}
		if($upd1==1 || $upd2==1 ||$upd3==1 ||(($upd4==1) || (($upd4==0) && (!empty($upd5)))))
		{
			$_SESSION['success'] = 'Update Successfull';
		}
		else
		{
			$_SESSION['warning'] = 'Update Unsuccessfull';
		}
		header("Location: ../../pageList.php");
		break;
	
	default:
		
		break;
}
?>