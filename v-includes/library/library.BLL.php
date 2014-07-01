<?php
	/*
	 * Fetches data from DAL and creates UI
	 * The UI calls the method to get full HTML output
	 * @Auth Dipanjan
	 */
	 
	 //include the DAL layer
	 include 'library.DAL.php';
	 
	 class BLL_Library
	 {
	 	private $_DAL_Obj;
		
		function __construct()
		{
			//create the DAL
			$this->_DAL_Obj = new DAL_Library();
			return $this->_DAL_Obj;
		}
		
		/*
		- method for getting product active category list on home page 
		- Auth: Dipanjan
		*/
		function getActiveProductCategoryList()
		{
			//get active product list
			$getValue = $this->_DAL_Obj->getValueMultipleCondtn('product_category','*',array('active','status'),array(1,1));
			if(!empty($getValue[0]))
			{
				foreach($getValue as $value)
				{
					echo '<div class="col-sm-3">
							<a href="products.php" class="hvr-no-decortn">
								<div class="container-products">
									<p class="prod-para">'.$value['name'].'</p>
									<div class="row">
										<div class="col-sm-12">
											<div class="img-container">
												<img src="images/prod1.png" class="img-responsive center-block" />
											</div>
										</div>
									</div>
								</div>
							</a>
						</div>';
				}
			}
		}
		
		/*
		- method for showing product list of a category
		- Auth: Dipanjan
		*/
		function getProductListOfCategory()
		{
			//get all values
			$products = $this->_DAL_Obj->getValueMultipleCondtn('product_info','*',array('status'),array(1));
			//defining a counter for limit
			$pro_limit = 0;
			foreach($products as $product)
			{
				if($pro_limit <= 6)
				{
					echo '<div class="col-sm-4">
							
								<div class="container-products prod-pg">
									<p class="prod-para">'.$product['name'].'</p>
									<p>'.substr($product['short_description'],0,100).'</p>
									<div class="row">
										
										<div class="col-sm-7">
											<p>'.substr($product['short_description'],0,50).'</p>
											
											<p class="prod-name"><a href="product-description.php" class="hvr-no-decortn color-inhrt">View More</a></p>
										</div>
										
										<div class="col-sm-5">
											<div class="img-container">
												<img src="images/nest.png" class="img-responsive" />
											</div>
										</div>
										
									</div>
								</div>
							
						</div>';
				}
				
				//increament the counter
				$pro_limit++;
			}
		}
		
		/*
		- method for showing product details in product details page
		- Auth: Dipanjan
		*/
		function getProductDetailsInDescriptionPage($product_id)
		{
			//get product details
			return $this->_DAL_Obj->getValue_where('product_info','*','product_id',$product_id);
		}
		
	 }
?>