<?php
	session_start();
	//include DAL file
	include '../library/library.DAL.php';
	$manageData = new DAL_Library();
	
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
	
		//checking the first name field and update it
		if(isset($_POST['f_name']) && !empty($_POST['f_name']))
		{
			$upd = $manageData->updateValueWhere('user_info','f_name',$_POST['f_name'],'user_id',$_SESSION['user_id']);
		}
		//checking the last name field and update it
		if(isset($_POST['l_name']) && !empty($_POST['l_name']))
		{
			$upd = $manageData->updateValueWhere('user_info','l_name',$_POST['l_name'],'user_id',$_SESSION['user_id']);
		}
		//checking the gender field and update it
		if(isset($_POST['gender']) && !empty($_POST['gender']))
		{
			$upd = $manageData->updateValueWhere('user_info','gender',$_POST['gender'],'user_id',$_SESSION['user_id']);
		}
		
		//checking the dob field and update it
		if(isset($_POST['dob']) && !empty($_POST['dob']))
		{
			$upd = $manageData->updateValueWhere('user_info','dob',$_POST['dob'],'user_id',$_SESSION['user_id']);
		}
		
		//checking the first address field and update it
		if(isset($_POST['addr1']) && !empty($_POST['addr1']))
		{
			$upd = $manageData->updateValueWhere('user_info','addr_1',$_POST['addr1'],'user_id',$_SESSION['user_id']);
		}
		
		//checking the second address field and update it
		if(isset($_POST['addr2']))
		{
			$upd = $manageData->updateValueWhere('user_info','addr_2',$_POST['addr2'],'user_id',$_SESSION['user_id']);
		}
		
		//checking the city field and update it
		if(isset($_POST['city']) && !empty($_POST['city']))
		{
			$upd = $manageData->updateValueWhere('user_info','city',$_POST['city'],'user_id',$_SESSION['user_id']);
		}
		
		//checking the state field and update it
		if(isset($_POST['state']) && !empty($_POST['state']))
		{
			$upd = $manageData->updateValueWhere('user_info','state',$_POST['state'],'user_id',$_SESSION['user_id']);
		}
		
		//checking the country field and update it
		if(isset($_POST['country']) && !empty($_POST['country']))
		{
			$upd = $manageData->updateValueWhere('user_info','country',$_POST['country'],'user_id',$_SESSION['user_id']);
		}
		
		//checking the postal code field and update it
		if(isset($_POST['postal_code']) && !empty($_POST['postal_code']))
		{
			$upd = $manageData->updateValueWhere('user_info','postal_code',$_POST['postal_code'],'user_id',$_SESSION['user_id']);
		}
		
		//checking the phone number field and update it
		if(isset($_POST['phone']) && !empty($_POST['phone']))
		{
			$upd = $manageData->updateValueWhere('user_info','phone',$_POST['phone'],'user_id',$_SESSION['user_id']);
		}
		
		//checking the company field and update it
		if(isset($_POST['company']))
		{
			$upd = $manageData->updateValueWhere('user_info','company',$_POST['company'],'user_id',$_SESSION['user_id']);
		}
		
	}
	
			header("Location: ../../profile-setting.php");
			
?>
	