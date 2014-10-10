<?php
	/*
	 * Fetches data from BLL and also from DAL
	 * The UI calls the method to get Money MLM output
	 * @Auth Dipanjan
	 */
	 
	 //include the BLL layer
	 include_once 'library.BLL.php';
	 
	 class Money_MLM extends BLL_Library
	 {
	 	private $_BLL_obj;
		
		function __construct()
		{
			if(($this->_BLL_obj instanceof BLL_Library) != TRUE)
			{
				$this->_BLL_obj = new BLL_Library();
				return $this->_BLL_obj;
			}
				
		}
		
	 }
?>