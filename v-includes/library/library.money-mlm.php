<?php
	/*
	 * Fetches data from DAL and creates UI
	 * The UI calls the method to get full HTML output
	 * @Auth Dipanjan
	 */
	 
	 //include the DAL layer
	 include 'library.DAL.php';
	 
	 class Money_MLM
	 {
	 	private $_DAL_Obj;
		
		function __construct()
		{
			//create the DAL
			$this->_DAL_Obj = new DAL_Library();
			return $this->_DAL_Obj;
		}
		
	 }
?>