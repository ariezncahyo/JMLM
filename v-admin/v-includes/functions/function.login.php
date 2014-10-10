<?php
	session_start();
	//include dal file
	include '../library/lib-DAL.php';
	$manageData = new ManageContent_DAL();
	
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		//getting values regarding username
		$adminCred = $manageData->getValue_where('admin_info','*','username',$_POST['username']);
		if(!empty($adminCred[0]))
		{
			if($adminCred[0]['password'] == $_POST['password'])
			{
				$_SESSION['admin'] = $adminCred[0]['username'];
				$_SESSION['success'] = 'Login Successfully!!';
				header("Location: ../../admin.php");
			}
			else
			{
				$_SESSION['warning'] = 'UserName Or Password Is Invalid!!';
				header("Location: ../../index.php");
			}
		}
		else
		{
			$_SESSION['warning'] = 'UserName Or Password Is Invalid!!';
			header("Location: ../../index.php");
		}
	}
?>