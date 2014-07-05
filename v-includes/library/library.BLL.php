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
		
		/*
		- method for showing feature product list
		- Auth: Dipanjan
		*/
		function getFeatureProductList()
		{
			//get all values of eature product
			$products = $this->_DAL_Obj->getValueMultipleCondtn('feature_product','*',array('status'),array(1));
			//defining a counter for limit
			$pro_limit = 0;
			foreach($products as $product)
			{
				//getting product details value
				$pro_details = $this->_DAL_Obj->getValueMultipleCondtn('product_info','*',array('product_id','status'),array($product['product_id'],1));
				//checking that
				/* expiry date is not over
				 * product limit not over than 10  
				*/
				if(!empty($pro_details[0]) && (strtotime($pro_details[0]['exp_date']) > strtotime('now')) && $pro_limit < 10)
				{
					echo '<div class="col-sm-4">
							
								<div class="container-products prod-pg">
									<p class="prod-para">'.$pro_details[0]['name'].'</p>
									<p>'.substr($pro_details[0]['short_description'],0,100).'</p>
									<div class="row">
										
										<div class="col-sm-7">
											<p>'.substr($pro_details[0]['short_description'],0,50).'</p>
											
											<p class="prod-name"><a href="product-description.php?pro='.$pro_details[0]['product_id'].'" class="hvr-no-decortn color-inhrt">View More</a></p>
										</div>
										
										<div class="col-sm-5">
											<div class="img-container">
												<img src="images/nest.png" class="img-responsive" />
											</div>
										</div>
										
									</div>
								</div>
							
						</div>';
					
					//increament the counter
					$pro_limit++;
				}
			}
		}
		
		/*
		- method for showing product list of category
		- Auth: Dipanjan
		*/
		function getProductListOfCategory($category_id)
		{
			//getting all the child id of given category id
			$child = $this->getChildCategoryFromCategoryId($category_id);
			if(!empty($child))
			{
				//defining a counter for limit
				$pro_limit = 0;
				foreach($child as $key=>$value)
				{
					//gettting product according to category value
					$products = $this->_DAL_Obj->getValueMultipleCondtn('product_info','*',array('category','status'),array($value,1));
					if(!empty($products[0]))
					{
						foreach($products as $product)
						{
							//checking that
							/* expiry date is not over
							 * product limit not over than 20  
							*/
							if(strtotime($product['exp_date']) > strtotime('now') && $pro_limit < 20)
							{
								echo '<div class="col-sm-4">
							
										<div class="container-products prod-pg">
											<p class="prod-para">'.$product['name'].'</p>
											<p>'.substr($product['short_description'],0,100).'</p>
											<div class="row">
												
												<div class="col-sm-7">
													<p>'.substr($product['short_description'],0,50).'</p>
													
													<p class="prod-name"><a href="product-description.php?pro='.$product['product_id'].'" class="hvr-no-decortn color-inhrt">View More</a></p>
												</div>
												
												<div class="col-sm-5">
													<div class="img-container">
														<img src="images/nest.png" class="img-responsive" />
													</div>
												</div>
												
											</div>
										</div>
									
								</div>';
								
								//increament the counter
								$pro_limit++;
							}
						}
					}
				}
				//checking for pro limit
				if($pro_limit == 0)
				{
					echo '<div class="col-sm-12">
							<p class="prod-para">No Product Found</p>
						  </div>';
				}
			}
		}
		
		/*
		- method for getting array of nested child category of given category
		- Auth: Dipanjan
		*/
		function getChildCategoryFromCategoryId($category_id)
		{
			//define an empty array with initial category is given category id
			$cat = array($category_id);
			//getting values of child id
			$child = $this->_DAL_Obj->getValueMultipleCondtn('product_category','*',array('categoryId','status'),array($category_id,1));
			if(!empty($child[0]['childId']))
			{
				//calling recursive function to get nested child id
				$cat = $this->recursiveMethodForChildCategory($cat,$child[0]['childId']);
			}
			return $cat;
		}
		
		/*
		- recursive method for getting array of nested child category of given category
		- Auth: Dipanjan
		*/
		function recursiveMethodForChildCategory($category_array,$child)
		{
			$child_array = explode(',',$child);
			foreach($child_array as $key=>$value)
			{
				if(!in_array($value,$category_array))
				{
					array_push($category_array,$value);
					//getting child of these category
					$nestedChild = $this->_DAL_Obj->getValueMultipleCondtn('product_category','*',array('categoryId','status'),array($value,1));
					if(!empty($nestedChild[0]['childId']))
					{
						//calling this function for recursive action
						$category_array = $this->recursiveMethodForChildCategory($category_array,$nestedChild[0]['childId']);
					}
				}
			}
			return $category_array;
		}
		
		/*
		- method for getting relative products from product category
		- Auth: Dipanjan
		*/
		function getRelativeProductListOfCategory($category_id,$product_id)
		{
			//getting all the child id of given category id
			$relative_category = $this->getChildCategoryFromCategoryId($category_id);
			//getting all the parent id of given category id included
			$relative_category = $this->getParentCategoryFromCategoryId($relative_category,$category_id);
			//print_r($relative_category);
			if(!empty($relative_category))
			{
				//defining a counter for limit
				$pro_limit = 0;
				foreach($relative_category as $key=>$value)
				{
					//getting products according to this category
					$products = $this->_DAL_Obj->getValueMultipleCondtn('product_info','*',array('category','status'),array($value,1));
					if(!empty($products[0]))
					{
						foreach($products as $product)
						{
							//checking that
							/* expiry date is not over
							 * product limit not over than 4  
							 * product id must not be same with given product id
							*/
							if($product['product_id'] != $product_id && (strtotime($product['exp_date']) > strtotime('now')) && $pro_limit < 4)
							{
								echo '<div class="col-sm-3">
										<a href="product-description.php?pro='.$product['product_id'].'">
											<div class="rel-prod img-thumbnail">
												<img class="img-responsive" src="images/curly.jpg" />
												<p class="cart-prod-name-rel">'.$product['name'].'</p>
												<p class="price-cart-rel">'.$product['member_price'].'</p>
											</div>
										</a>
									</div>';
								
								//increament the counter
								$pro_limit++;
							}
							if($pro_limit > 3)
							{
								//break the loop
								break;
							}
						}
					}
				}
				//checking for pro limit
				if($pro_limit == 0)
				{
					echo '<div class="col-sm-12">
							<p class="cart-prod-name-rel">No Relative Product Found</p>
						  </div>';
				}
			}
		}
		
		/*
		- method for getting array of nested parent category of given category
		- Auth: Dipanjan
		*/
		function getParentCategoryFromCategoryId($cat_array,$category_id)
		{
			//insert category id to array if it is not exists
			if(!in_array($category_id,$cat_array))
			{
				array_push($cat_array,$category_id);
			}
			//getting values of parent id
			$parent = $this->_DAL_Obj->getValueMultipleCondtn('product_category','*',array('categoryId','status'),array($category_id,1));
			if(!empty($parent[0]['parentId']))
			{
				//calling recursive function to get nested child id
				$cat_array = $this->recursiveMethodForParentCategory($cat_array,$parent[0]['parentId']);
			}
			return $cat_array;
		}
		
		/*
		- recursive method for getting array of nested parent category of given category
		- Auth: Dipanjan
		*/
		function recursiveMethodForParentCategory($category_array,$parent_id)
		{
			if(!in_array($parent_id,$category_array))
			{
				array_push($category_array,$parent_id);
				//getting parent id of this category
				$nestedParent = $this->_DAL_Obj->getValueMultipleCondtn('product_category','*',array('categoryId','status'),array($parent_id,1));
				if(!empty($nestedParent[0]['parentId']))
				{
					//calling this function for recursive action
					$category_array = $this->recursiveMethodForParentCategory($category_array,$nestedParent[0]['parentId']);
				}
			}
			return $category_array;
		}
		
		
		
		/*
		- method for checking product video link
		- Auth: Dipanjan
		*/
		function getProductLink($product_id)
		{
			//get values from database
			$video = $this->_DAL_Obj->getValueMultipleCondtn('product_video','*',array('product_id','status'),array($product_id,1));
			if(!empty($video[0]['video']))
			{
				//getting keyword of link
				$keyword = substr(strrchr($video[0]['video'], "="), 1);
				if(!empty($keyword))
				{
					echo '<iframe width="600" height="400" src="//www.youtube.com/embed/'.$keyword.'" frameborder="0" allowfullscreen></iframe>';
				}
			}
			else
			{
				echo '<div class="col-sm-12">
						<p class="cart-prod-name-rel">No Video Found</p>
					  </div>';
			}
		}
		
	 }
?>