<?php
	session_start();
	//include the DAL library to use the model layer methods
	include 'lib-DAL.php';
	
	//include the utility library to get the browser info
	include 'class.utility.php';
	
	//include the utility library to upload the user files
	include 'class.upload_file.php';
	
	//include the DAL library to send the mail
	include 'class.mail.php';
	
	//class for fetching data of ajax request
	class fetchData
	{
		public $manageContent;
		public $manageUtility;
		public $manageFileUploader;
		public $mailSent;
		
		/*
		- method for constructing DAL, Utility, Mail class
		- Auth: Dipanjan
		*/	
		function __construct()
		{
			$this->manageContent = new ManageContent_DAL();
			$this->manageUtility = new utility();
			$this->manageFileUploader = new FileUpload();
			$this->mailSent = new Mail();
		}
		
		/*
		- method for getting product sub category list according category
		- Auth: Dipanjan
		*/
		function getProductSubCategoryList($userData)
		{
			//getting values from category
			$subCats = $this->manageContent->getValueMultipleCondtn('subcategory','*',array('categoryId','status'),array($userData['category'],1));
			if(!empty($subCats[0]))
			{
				echo '<label class="control-label admin_form_label col-sm-3">Sub Category</label>
						<div class="col-sm-5">
							<select class="form-control" name="sub_cat">';
							
					foreach($subCats as $subCat)
					{
						echo '<option value="'.$subCat['subCategoryId'].'">'.$subCat['name'].'</option>';
					}
							
				echo 	'</select>
						</div>
						<div class="clearfix"></div>';
			}
		}
	}
	
	/* receiving data from UI layer Form */
	//making object of class fetchData 
	$fetchData = new fetchData();
	//applying switch case
	switch($GLOBALS['_POST']['refData'])
	{
		//for product sub category list according category
		case 'pro_cat':
		{
			$proSubCat = $fetchData->getProductSubCategoryList($GLOBALS['_POST']);
			break;
		}
		default:
		{
			break;	
		}
	}

?>