<?php
    include '../library/lib-DAL.php';
	$manageData = new ManageContent_DAL();
	if(isset($_POST['sub']) && !empty($_POST['sub']))
	{
		$manageData->deleteValue('mypage', 'page_id', $_POST['id']);
	}
	header("location:../../pageList.php");
?>