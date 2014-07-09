<?php
	session_start();
	//include the DAL library to use the model layer methods
	include 'library.DAL.php';
	
	//class for fetching data of ajax request
	class fetchData
	{
		public $manageContent;
		
		/*
		- method for constructing DAL, Utility, Mail class
		- Auth: Dipanjan
		*/	
		function __construct()
		{
			$this->manageContent = new DAL_Library();
		}
		
		/*
		- method for getting unique username
		- Auth: Dipanjan
		*/
		function getUniqueItem($userData,$category)
		{
			//get values from database
			if($category == 'username')
			{
				$getValues = $this->manageContent->getValue_where('user_info','*','username',$userData['username']);
			}
			else if($category == 'email')
			{
				$getValues = $this->manageContent->getValue_where('user_info','*','email_id',$userData['email']);
			}
			if(!empty($getValues[0]))
			{
				echo 1;
			}
			else
			{
				echo 0;
			}
		}
			
	}
	
	/* receiving data from UI layer Form */
	//making object of class fetchData 
	$fetchData = new fetchData();
	//applying switch case
	switch($GLOBALS['_POST']['refData'])
	{
		//for unique username checking
		case 'usernameChecking':
		{
			$emailChecking = $fetchData->getUniqueItem($GLOBALS['_POST'],'username');
			break;
		}
		//for unique email checking
		case 'emailChecking':
		{
			$emailChecking = $fetchData->getUniqueItem($GLOBALS['_POST'],'email');
			break;
		}
		default:
		{
			break;	
		}
	}

?>