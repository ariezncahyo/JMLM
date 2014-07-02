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
		
		/*
		- method for showing product category list in sidebar
		- Auth: Dipanjan
		*/
		function getCategoryListInSidebar($level,$categoryId)
		{
			if($level == 1)
			{
				//getting parent category list
				$parent_cat = $this->_DAL_Obj->getValueMultipleCondtn('product_category','*',array('level','status'),array($level,1));
			}
			else
			{
				//getting parent category list
				$parent_cat = $this->_DAL_Obj->getValueMultipleCondtn('product_category','*',array('level','categoryId','status'),array($level,$categoryId,1));
			}
			
			if(!empty($parent_cat[0]))
			{
				echo '<div class="panel-group" id="accordion'.$parent_cat[0]['level'].'">';
				
				foreach($parent_cat as $parent)
				{
					//get category list
					$cat_list = $this->_DAL_Obj->getValueMultipleCondtn('product_category','*',array('parentId','status'),array($parent['categoryId'],1));
					
					/*//setting the anchor
					if(empty($cat_list[0]))
					{
						$anchr = '<h4 class="panel-title" data-toggle="collapse" data-parent="#accordion'.$parent['level'].'">
									<a href="products.php?cat='.$parent['categoryId'].'&l='.$parent['level'].'">'.$parent['name'].'</a>
								  </h4>';
					}
					else
					{
						$anchr = '<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion'.$parent['level'].'" href="#collapse'.$parent['categoryId'].'">'.$parent['name'].'</a>
								  </h4>';
					}*/
					
					echo '<div class="panel panel-default panel-custom">
							<div class="panel-heading">
							  <h4 class="panel-title" data-toggle="collapse" data-parent="#accordion'.$parent['level'].'">
									<a href="products.php?cat='.$parent['categoryId'].'&l='.$parent['level'].'">'.$parent['name'].'</a>
								  </h4>
							</div>';
					
					if(!empty($cat_list[0]))
					{
						echo '<div id="collapse'.$parent['categoryId'].'" class="panel-collapse collapse'; if($parent['categoryId'] == $categoryId) { echo 'in'; } echo '">
							  <div class="panel-body">';
								//calling recursive function
								$this->getNestedCategoryListInSidebar($cat_list,$level,$categoryId);
								
						echo '</div>
							</div>';
					}
					
					echo '</div>';
				}
				
				echo '</div>';
			}
		}
		
		
		/*
		- method for showing nested product category list in sidebar
		- Auth: Dipanjan
		*/
		function getNestedCategoryListInSidebar($cat_list,$page_level,$categoryId)
		{
			if(!empty($cat_list[0]))
			{
				echo '<div class="panel-group" id="accordion'.$cat_list[0]['level'].'">';
				foreach($cat_list as $cat)
				{
					//get category list
					$cat_list_child = $this->_DAL_Obj->getValueMultipleCondtn('product_category','*',array('parentId','status'),array($cat['categoryId'],1));
					//setting the anchor
					/*if(intval($cat['level']) >= (intval($page_level) + 1) || empty($cat_list_child[0]))
					{
						$anchr = '<h4 class="panel-title" data-toggle="collapse" data-parent="#accordion'.$cat['level'].'">
									<a href="products.php?cat='.$cat['categoryId'].'&l='.$cat['level'].'">'.$cat['name'].'</a>
								  </h4>';
					}
					else
					{
						$anchr = '<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion'.$cat['level'].'" href="#collapse'.$cat['categoryId'].'">'.$cat['name'].'</a>
								  </h4>';
					}*/
					
					echo '<div class="panel panel-default panel-custom">
							<div class="panel-heading">
							  <h4 class="panel-title" data-toggle="collapse" data-parent="#accordion'.$cat['level'].'">
									<a href="products.php?cat='.$cat['categoryId'].'&l='.$cat['level'].'">'.$cat['name'].'</a>
								  </h4>
							</div>';
							
					if(!empty($cat_list_child[0]))
					{
						echo  '<div id="collapse'.$cat['categoryId'].'" class="panel-collapse collapse'; if($cat['categoryId'] == $categoryId) { echo 'in'; } echo '">
							  	<div class="panel-body">';
								//calling recursive function
								$this->getNestedCategoryListInSidebar($cat_list_child,$page_level,$categoryId);
								
						echo '</div>
							</div>';
					}
							
					echo  '</div>';
				}
				echo '</div>';
			}
		}
	 }
?>