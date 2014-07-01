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
		
		/*
		- method for getting sub category list according category
		- Auth: Dipanjan
		*/
		function getSubCategoryList($userData)
		{
			//getting values from category
			$subCats = $this->manageContent->getValueMultipleCondtn('product_category','*',array('parentId','status'),array($userData['category'],1));
			if(!empty($subCats[0]))
			{
				echo '<div class="form-group">
						<label class="control-label admin_form_label col-sm-3">Select Category</label>
						<div class="col-sm-5">
							<select class="form-control nested_cat" name="cat[]">
								<option value="-1">-- Select A Category --</option>';
							
					foreach($subCats as $subCat)
					{
						echo '<option value="'.$subCat['categoryId'].'">'.$subCat['name'].'</option>';
					}
							
				echo 	'</select>
						</div>
						<div class="clearfix"></div>
						</div>';
			}
		}
		
		/*
		- method for getting nested category list according category
		- Auth: Dipanjan
		*/
		function getNestedCategoryList($userData)
		{
			//getting values from category
			$subCats = $this->manageContent->getValueMultipleCondtn('product_category','*',array('parentId','status'),array($userData['category'],1));
			if(!empty($subCats[0]))
			{
				echo '<div class="form-group">
						<label class="control-label admin_form_label col-sm-3">Select Category</label>
						<div class="col-sm-5">
							<select class="form-control nested_cat" name="cat[]">
								<option value="-1">-- Select A Category --</option>';
							
					foreach($subCats as $subCat)
					{
						echo '<option value="'.$subCat['categoryId'].'">'.$subCat['name'].'</option>';
					}
							
				echo 	'</select>
						</div>
						<div class="clearfix"></div>
						</div>';
			}
		}
		
		/*
		- method for setting active category 
		- Auth: Dipanjan
		*/
		function setActiveCategory($userData)
		{
			//print_r($userData);
			//getting active category array
			$active = explode(',',$userData['category']);
			//print_r($active);
			if(!empty($active[0]))
			{
				//set all active value to 0
				$updateValue = $this->manageContent->updateValueWhere('product_category','active',0,'active',1);
				//update new value
				foreach($active as $key=>$value)
				{
					$updateNew = $this->manageContent->updateValueWhere('product_category','active',1,'categoryId',$value);
				}
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
		//for product nested category list according category
		case 'subcat':
		{
			$subCat = $fetchData->getSubCategoryList($GLOBALS['_POST']);
			break;
		}
		//for product nested category list according category
		case 'nested_cat':
		{
			$nestedCat = $fetchData->getNestedCategoryList($GLOBALS['_POST']);
			break;
		}
		//for product active category
		case 'active_cat':
		{
			$activeCat = $fetchData->setActiveCategory($GLOBALS['_POST']);
			break;
		}
		default:
		{
			break;	
		}
	}

?>