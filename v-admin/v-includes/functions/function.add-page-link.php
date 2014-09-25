<?php
session_start();
//include dal file
include '../library/lib-DAL.php';
$manageData = new ManageContent_DAL();
switch ($_POST['action']) {
	case 'INSERT':
		$column_name = array('name','page_link','top_links','navbar_links','footer_links','status');
		$column_value = array($_POST['pgname'],$_POST['pglink'],$_POST['toplink'],$_POST['navbar'],$_POST['footerlink'],1);
		//insert the values
		
		$insert = $manageData->insertValue('mypage_links',$column_name,$column_value);
		if($insert == 1)
		{
			$_SESSION['success'] = 'Insert Successfull';
		}
		else
		{
			$_SESSION['warning'] = 'Insert Unsuccessfull';
		}
		header("Location: ../../addPageLink.php");
		break;
	
	case 'UPDATE':
		if(isset($_POST['pgname']) && !empty($_POST['pgname']))
		{
			$upd1 = $manageData->updateValueWhere('mypage_links','name',$_POST['pgname'],'id',$_POST['id']);
		}
		if(isset($_POST['pglink']) && !empty($_POST['pglink']))
		{
			$upd2 = $manageData->updateValueWhere('mypage_links','page_link',$_POST['pglink'],'id',$_POST['id']);
		}
		if(isset($_POST['toplink'] ))
		{
			$upd3 = $manageData->updateValueWhere('mypage_links','top_links',$_POST['toplink'],'id',$_POST['id']);
		}
		if(isset($_POST['navbar']))
		{
			$upd4 = $manageData->updateValueWhere('mypage_links','navbar_links',$_POST['navbar'],'id',$_POST['id']);
		}
		if(isset($_POST['footerlink']))
		{
			$upd5 = $manageData->updateValueWhere('mypage_links','footer_links',$_POST['footerlink'],'id',$_POST['id']);
		}
		if(isset($_POST['status']))
		{
			$upd6 = $manageData->updateValueWhere('mypage_links','status',$_POST['status'],'id',$_POST['id']);
		}
		if($upd1==1 || $upd2==1 ||$upd3==1 ||$upd4==1 ||$upd5==1 ||$upd6==1)
		{
			$_SESSION['success'] = 'Update Successfull';
		}
		else
		{
			$_SESSION['warning'] = 'Update Unsuccessfull';
		}
		header("Location: ../../page-link-list.php");
		break;
	
	default:
		
		break;
}
?>