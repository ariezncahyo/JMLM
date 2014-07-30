<?php
	/*
	 * Fetches data from BLL and also from DAL
	 * The UI calls the method to get Money MLM output
	 * @Auth Dipanjan
	 */
	 
	 //include the BLL layer
	 include_once 'lib-BLL.php';
	 
	 class Money_MLM extends BLL_manageData
	 {
	 	private $_BLL_obj;
		
		function __construct()
		{
			if(($this->_BLL_obj instanceof BLL_manageData) != TRUE)
			{
				$this->_BLL_obj = new BLL_manageData();
				return $this->_BLL_obj;
			}
				
		}
		
	 }
?>