<?php
	/*
	 * Fetches data from DAL and creates UI
	 * The UI calls the method to get full HTML output
	 * @Auth Dipanjan
	 */
	 
	 //include the DAL layer
	 include 'library.DAL.php';
	 //include 'library.money-mlm.php';
	 
	 class BLL_Library
	 {
	 	private $_DAL_Obj;
		
		function __construct()
		{
			if(($this->_DAL_Obj instanceof DAL_Library) != TRUE)
			{
				//create the DAL
				$this->_DAL_Obj = new DAL_Library();
				return $this->_DAL_Obj;
			}
				
		}
		
		/*
		- method for getting smember validiation
		- Auth: Dipanjan
		*/
		function getMemberValidiation()
		{
			//get member validiation
			return $this->_DAL_Obj->getValue_where('user_info','*','user_id',$_SESSION['user_id']);
			
		}
		
		/*
		- method for verify user email
		- Auth: Dipanjan
		*/
		function verifyUserEmail($user_id)
		{
			//update email verification value
			$update = $this->_DAL_Obj->updateValueWhere('user_info','email_verification',1,'user_id',$user_id);
		}
		
		/*
		- method for getting system currency
		- Auth: Dipanjan
		*/
		function getSystemCurrency($field)
		{
			$sytem_currency = $this->_DAL_Obj->getValue_where('system_currency','*','field',$field);
			return $sytem_currency[0]['currency'];
		}
		
		/*
		- method for getting shiiping cost of system
		- Auth: Dipanjan
		*/
		function getShippingCost()
		{
			$sytem_currency = $this->_DAL_Obj->getValue_where('shipping_cost_info','*','status',1);
			return $sytem_currency[0]['shipping_cost'];
		}
		
		/*
		- method for getting member or guest
		- Auth: Dipanjan
		*/
		function getUserPrice()
		{
			if(substr($_SESSION['user_id'],0,4) == 'user')
			{
				$price = 'member_price';
			}
			else
			{
				$price = 'guest_price';
			}
			return $price;
		}
		
		/*
		- method for getting membership info
		- Auth: Dipanjan
		*/
		function getMembershipInfo()
		{
			return $this->_DAL_Obj->getValue_where('membership_info', '*', 'status',1);
		}
		
		/*
		- method for getting fee type
		- Auth: Dipanjan
		*/
		function getFeeType($fee_type)
		{
			if($fee_type == 'OF')
			{
				$fee_text = 'Overriding Fees';
			}
			elseif ($fee_type == 'PC') {
				$fee_text = 'Personal Commision';
			}
			elseif ($fee_type == 'RF') {
				$fee_text = 'Referral Fees';
			}
			elseif ($fee_type == 'PV') {
				$fee_text = 'Point Value';
			}
			elseif ($fee_type == 'PS') {
				$fee_text = 'Pool Sharing';
			}
			return $fee_text;
		}
		
		/*
		- method for getting the value of the pagination
		- Auth : Dipanjan
		*/
		function wallet_pagination($page,$rows,$pageUrl,$max_no_index,$limit)
		{
			$baseUrl = $this->getBaseUrl();
			//used in the db for getting o/p
			$startPoint = $page*$limit ;
			//no of page to be displayed
			$no_page = $rows/$limit ;
			//show pagination when there is more than one page is there
			if($no_page > 1)
			{
				if($rows%$limit == 0)
				{
					$no_page = intval($no_page);
				}
				else
				{
					$no_page = intval($no_page) + 1;
				}
				
				//set no of index to be displayed
				$no_index = 1 ;
				
				//generate the pagination UI
				echo '<div class="wal_pagination pull-right">
                    	<ul class="pagination">';
				//logic for setting the prev button
				//condition for escaping the -ve page index when $page = 0
				if( ($page-1) < 0 && $page != 0 )
				{
					echo '<li><a href="'.$baseUrl.$pageUrl.'p=0">&laquo;</a></li>';
				}
				elseif( $page != 0 )
				{
					echo '<li><a href="'.$baseUrl.$pageUrl.'p='.($page-1).'">&laquo;</a></li>';
				}
				/*for the indexes*/
				//index initilization variable
				if( ( $page + 1 ) >= ( $no_page - $max_no_index + 1))
				{
					$inti_i = $no_page - $max_no_index + 1 ;
				}
				else
				{
					$inti_i = $page + 1 ;
				}
				for( $i = $inti_i ; $i <= $no_page ; $i++ )
				{
					if( $i > 0 )
					{
						echo '<li ';
						//codes for active class
						if( $page == ( $i - 1 ) )
						{
							echo ' class="active" ';
						}
						echo '><a href="'.$baseUrl.$pageUrl.'p='.($i-1).'">'.$i.'</a></li>' ;
						//increment the index no by 1
						$no_index++ ;
						if( $no_index > $max_no_index )
						{
							break ;
						}
					}
				}
				if( $page != ( $no_page - 1 ) )
				{
					//for the next button
					echo '<li><a href="'.$baseUrl.$pageUrl.'p='.($page + 1).'">&raquo;</a></li>' ;
				}
				//for the last button
				//echo '<li><a href="'.$PageUrl.'?p='.($no_page - 1).'&limit='.$limit.'">Last</a></li>' ;
				echo	 '</ul>
					</div>';
			}
			
		}

		/*
		- method for getting the value of the pagination
		- Auth : Dipanjan
		*/
		function Uipagination($page,$rows,$pageUrl,$max_no_index,$limit,$paginationName)
		{
			$baseUrl = $this->getBaseUrl();
			//used in the db for getting o/p
			$startPoint = $page*$limit ;
			//no of page to be displayed
			$no_page = $rows/$limit ;
			//show pagination when there is more than one page is there
			if($no_page > 1)
			{
				if($rows%$limit == 0)
				{
					$no_page = intval($no_page);
				}
				else
				{
					$no_page = intval($no_page) + 1;
				}
				
				//set no of index to be displayed
				$no_index = 1 ;
				
				//generate the pagination UI
				echo '<div class="wal_pagination pull-right">
                    	<ul class="pagination">';
				//logic for setting the prev button
				//condition for escaping the -ve page index when $page = 0
				
				if( ($page-1) < 0 && $page != 0 )
				{
					echo '<li><a href="'.$baseUrl.$pageUrl.$paginationName.'=0">&laquo;</a></li>';
				}
				elseif( $page != 0 )
				{
					echo '<li><a href="'.$baseUrl.$pageUrl.$paginationName.'='.($page-1).'">&laquo;</a></li>';
				}
				/*for the indexes*/
				//index initilization variable
				if( ( $page + 1 ) >= ( $no_page - $max_no_index + 1))
				{
					$inti_i = $no_page - $max_no_index + 1 ;
				}
				else
				{
					$inti_i = $page + 1 ;
				}
				for( $i = $inti_i ; $i <= $no_page ; $i++ )
				{
					if( $i > 0 )
					{
						echo '<li ';
						//codes for active class
						if( $page == ( $i - 1 ) )
						{
							echo ' class="active" ';
						}
						echo '><a href="'.$baseUrl.$pageUrl.$paginationName.'='.($i-1).'">'.$i.'</a></li>' ;
						//increment the index no by 1
						$no_index++ ;
						if( $no_index > $max_no_index )
						{
							break ;
						}
					}
				}
				if( $page != ( $no_page - 1 ) )
				{
					//for the next button
					echo '<li><a href="'.$baseUrl.$pageUrl.$paginationName.'='.($page + 1).'">&raquo;</a></li>' ;
				}
				//for the last button
				//echo '<li><a href="'.$PageUrl.'?p='.($no_page - 1).'&limit='.$limit.'">Last</a></li>' ;
				echo	 '</ul>
					</div>';
			}
			
		}

		/*
		- method for getting user info details 
		- Auth: Dipanjan
		*/
		function getUserInfoDetails($user_id)
		{
			return $this->_DAL_Obj->getValue_where('user_info', '*', 'user_id', $user_id);
		}
		
		/*
		- method for getting user level details 
		- Auth: Dipanjan
		*/
		function getUserLevelDetails($user_level)
		{
			//get values of user level
			return $this->_DAL_Obj->getValue_where('member_level_info', '*', 'member_level', $user_level);
		}
		
		/*
		- method for getting product active category list on home page 
		- Auth: Dipanjan
		*/
		function getActiveProductCategoryList()
		{
			$baseUrl = $this->getBaseUrl();
			//get active product list
			$getValue = $this->_DAL_Obj->getValueMultipleCondtn('product_category','*',array('active','status'),array(1,1));
			if(!empty($getValue[0]))
			{
				foreach($getValue as $value)
				{
					echo '<div class="col-sm-3">
							<a href="'.$baseUrl.'products/cat/'.$value['categoryId'].'/l/'.$value['level'].'" class="hvr-no-decortn">
								<div class="container-products">
									<p class="prod-para">'.$value['name'].'</p>
									<div class="row">
										<div class="col-sm-12">
											<div class="img-container">
												<img src="'.$baseUrl.$value['image'].'" class="img-responsive center-block" />
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
					$baseUrl = $this->getBaseUrl();
					echo '<div class="panel panel-default panel-custom">
							<div class="panel-heading">
							  <h4 class="panel-title" data-toggle="collapse" data-parent="#accordion'.$parent['level'].'">
									<a href="'.$baseUrl.'products/cat/'.$parent['categoryId'].'/l/'.$parent['level'].'">'.$parent['name'].'</a>
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
			$baseUrl = $this->getBaseUrl();
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
									<a href="'.$baseUrl.'products/cat/'.$cat['categoryId'].'/l/'.$cat['level'].'">'.$cat['name'].'</a>
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
			$baseUrl = $this->getBaseUrl();
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
					//getting product image
					$pro_img = $this->_DAL_Obj->getValueMultipleCondtn('product_image','*',array('product_id','img_order'),array($product['product_id'],1));
					if(!empty($pro_img[0]))
					{
						$img = 'images/product/'.$pro_img[0]['image'];
					}
					else
					{
						$img = 'images/200x200.gif';
					}
					echo '<div class="col-sm-4">
								<div class="container-products prod-pg">
									<p class="prod-para">'.$pro_details[0]['name'].'</p>
									<p>'.substr($pro_details[0]['short_description'],0,100).'</p>
									<div class="row">
										
										<div class="col-sm-7">
											<p>'.substr($pro_details[0]['short_description'],0,50).'</p>
											
											<p class="prod-name"><a href="'.$baseUrl.'product-description/'.$pro_details[0]['product_id'].'" class="hvr-no-decortn color-inhrt">View More</a></p>
										</div>
										
										<div class="col-sm-5">
											<div class="img-container">';
									echo    '<img src="'.$baseUrl.$img.'" class="img-responsive" />
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
			$baseUrl = $this->getBaseUrl();
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
								//getting product image
								$pro_img = $this->_DAL_Obj->getValueMultipleCondtn('product_image','*',array('product_id','img_order'),array($product['product_id'],1));
								if(!empty($pro_img[0]))
								{
									$img = 'images/product/'.$pro_img[0]['image'];
								}
								else
								{
									$img = 'images/200x200.gif';
								}
								
								echo '<div class="col-sm-4">
										<div class="container-products prod-pg">
											<p class="prod-para">'.$product['name'].'</p>
											<p>'.substr($product['short_description'],0,100).'</p>
											<div class="row">
												
												<div class="col-sm-7">
													<p>'.substr($product['short_description'],0,50).'</p>
													
													<p class="prod-name"><a href="'.$baseUrl.'product-description/'.$product['product_id'].'" class="hvr-no-decortn color-inhrt">View More</a></p>
												</div>
												
												<div class="col-sm-5">
													<div class="img-container">
														<img src="'.$baseUrl.$img.'" class="img-responsive" />
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
					echo '<div class="col-sm-12 no-product-found-label">
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
			$baseUrl = $this->getBaseUrl();
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
								//getting product image
								$pro_image = $this->_DAL_Obj->getValueMultipleCondtn('product_image','*',array('product_id','img_order'),array($product['product_id'],1));
								if(!empty($pro_image[0]))
								{
									$img = 'images/product/'.$pro_image[0]['image'];
								}
								else
								{
									$img = 'images/250x250.gif';
								}
								
								echo '<div class="col-sm-3">
										<a href="'.$baseUrl.'product-description/'.$product['product_id'].'">
											<div class="rel-prod img-thumbnail">
												<img class="img-responsive" src="'.$baseUrl.$img.'" />
												<p class="cart-prod-name-rel">'.$product['name'].'</p>
												<p class="price-cart-rel">'.$this->getSystemCurrency('product').$product['member_price'].'</p>
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
		
		/*
		- method for getting product customization values
		- Auth: Dipanjan
		*/
		function getProductCustomValue($product_id)
		{
			//get values from database
			$getValues = $this->_DAL_Obj->getValueMultipleCondtn('product_customization','*',array('product_id','status'),array($product_id,1));
			if(!empty($getValues[0]))
			{
				//defining integers for name and id
				$label_id = 'label1';
				$name = 'speci1';
				$id = 'speci1';
				foreach($getValues as $getValue)
				{
					//getting values in ana array
					$value = explode(',',$getValue['value']);
					echo '<div class="form-group">
                                <label class="lbl-cart" id="'.$label_id.'">'.$getValue['specification'].'</label>
                                <select class="form-control form-cart" name="'.$name.'" id="'.$id.'">
                                    <option value="-1">select one</option>';
					if(!empty($value))
					{
						foreach($value as $key=>$array_value)
						{
							echo '<option value="'.$array_value.'">'.$array_value.'</option>';
						}
					}
					
                    echo  '</select>
							<div class="form-error" id="err_'.$id.'"></div>
                         </div>';
				
					//increment the variable
					$label_id = 'label'.(intval(substr($label_id,5)) + 1);
					$name = 'speci'.(intval(substr($name,5)) + 1);
					$id = 'speci'.(intval(substr($id,5)) + 1);
					
				}
				
			}
		}
		
		/*
		- method for getting no of product in cart
		- Auth: Dipanjan
		*/
		function getTotalProductInCart()
		{
			//getting value of user id cookie
			if(isset($GLOBALS['_COOKIE'][$_SESSION['user_id']]))
			{
				$cookie_value = $GLOBALS['_COOKIE'][$_SESSION['user_id']];
				$total_product = explode(':',$cookie_value);
				echo $total_product[0];
			}
			else
			{
				echo 0;
			}
		}
		
		/*
		- method for getting selected product list in view cart
		- Auth: Dipanjan
		*/
		function getProductListInCart()
		{
			/*echo '<pre>';
			print_r($GLOBALS['_COOKIE']);
			echo '</pre>';*/
			//initialize total amount variable
			$total_amount = 0;
			//getting no of items selected
			$pro_value = explode(':',$GLOBALS['_COOKIE'][$_SESSION['user_id']]);
			$items_selected = $pro_value[1];
			//getting product details cookie 
			for($i=1; $i<=$items_selected; $i++)
			{
				$get_cookie_value = $GLOBALS['_COOKIE'][$_SESSION['user_id'].'pro:'.$i];
				//get each value part in an array
				$allValue = explode(':',$get_cookie_value);
				//getting product id
				$pid = substr(strrchr($allValue[0],'='),1);
				//getting quantity
				$quantity = substr(strrchr($allValue[1],'='),1);
				//getting max length of specification
				$maxSpeciLength = substr(strrchr(end($allValue),'='),1);
				//getting product details
				$pro_details = $this->_DAL_Obj->getValue_where('product_info','*','product_id',$pid);
				if(!empty($pro_details[0]))
				{
					//getting usre price
					$user_price = $pro_details[0][$this->getUserPrice()];
					//getting total amount
					$amount = $quantity * intval($user_price);
					echo '<div class="view-cart-container">
							<div class="row">
								<div class="col-sm-1">
									<div class="rmv"><button class="btn btn-link btn-rmv" name="pro:'.$i.'">x</button></div>
								</div>
								<div class="col-sm-5 col-xs-7">
									<p class="prod-v-crt-name">'.$pro_details[0]['name'].'</p>';
						if($maxSpeciLength != 0)
						{
							for($j=1; $j<=$maxSpeciLength; $j++)
							{
								echo '<p class="prod-details-v-cart">
										<span class="lbl-det">'.substr(strrchr($allValue[(2*$j)],'='),1).' :</span>
										<span class="lbl-rslt">'.substr(strrchr($allValue[(2*$j)+1],'='),1).' </span>
									</p>';
							}
						}
						echo	'</div>
								<div class="col-sm-2 col-xs-6">
									<div class="quant-cart-v-cart">
										<p class="price-cart-rel">'.$this->getSystemCurrency('product').$user_price.'</p>
										<p class="mult-v-cart">x</p>
										<div class="quant-num">
											<input type="text" class="form-control form-cart form-cart_int" id="pro:'.$i.'" name="'.$pro_details[0]['maxpick'].'" value="'.$quantity.'"/>
										</div>
									</div>
								</div>
								<div class="col-sm-2 col-xs-6">
									<p class="price-cart-rel">'.$this->getSystemCurrency('product').$amount.'</p>
								</div>
							</div>
						</div>';
				}//end of if condition
				//calculating total amount
				$total_amount = $total_amount + $amount;
			}//end of for loop
			//return total amount of the cart
			return $total_amount;
		}
		
		/*
		- method for getting user info
		- Auth: Dipanjan
		*/
		function getUserInfo()
		{
			if($_SESSION['user_id'] != 'Guest')
			{
				return $this->_DAL_Obj->getValue_where('user_info','*','user_id',$_SESSION['user_id']);
			}
		}
		
		/*
		- method for getting checkout shipping charges
		- Auth: Dipanjan
		*/
		function getShippingChargesInCheckoutPage()
		{
			//get shipping charges
			$ship = $this->_DAL_Obj->getValue_where('shipping_cost_info','*','id',1);
			echo '<p>Shipping Charges(Shipment Will Deliver Shortly. Working days does not include Sat and Sun)</p>
                  <p class="ship-text-span"> Total.   '.$this->getSystemCurrency('product').' '.$ship[0]['shipping_cost'].'</p>';
		}
		
		/*
		- method for getting checkout shipping charges
		- Auth: Dipanjan
		*/
		function getAmountDetailsInCheckoutPage()
		{
			//get order list
			$total_amount = $this->getOrderListInCheckoutPage();
			//get shipping charges
			$ship = $this->_DAL_Obj->getValue_where('shipping_cost_info','*','id',1);
			//get grand total
			$grand_total = intval($total_amount) + intval($ship[0]['shipping_cost']);
			//setting total in session value
			$_SESSION['total_amount'] = $grand_total;
			//showing grand total
			echo '<tr>
					<td colspan="4" class="brdr-right-nul"><span>Subtotal</span></td>
					<td><span>'.$this->getSystemCurrency('product').$total_amount.'</span></td>
				</tr>
				<tr>
					<td colspan="4" class="brdr-right-nul"><span>Shipping & Handling Charges(Shipment Will Deliver Shortly. Working days does not include Sat and Sun)</span></td>
					<td><span>'.$this->getSystemCurrency('product').$ship[0]['shipping_cost'].'</span></td>
				</tr>
				<tr>
					<td colspan="4" class="brdr-right-nul"><span class="grand-head">Grand Total</span></td>
					<td><span>'.$this->getSystemCurrency('product').$grand_total.'</span></td>
				</tr>';
		}
		
		/*
		- method for getting checkout order list
		- Auth: Dipanjan
		*/
		function getOrderListInCheckoutPage()
		{
			//initialize total amount variable
			$total_amount = 0;
			//getting no of items selected
			$pro_value = explode(':',$GLOBALS['_COOKIE'][$_SESSION['user_id']]);
			$items_selected = $pro_value[1];
			//getting product details cookie 
			for($i=1; $i<=$items_selected; $i++)
			{
				$get_cookie_value = $GLOBALS['_COOKIE'][$_SESSION['user_id'].'pro:'.$i];
				//get each value part in an array
				$allValue = explode(':',$get_cookie_value);
				//getting product id
				$pid = substr(strrchr($allValue[0],'='),1);
				//getting quantity
				$quantity = substr(strrchr($allValue[1],'='),1);
				//getting max length of specification
				$maxSpeciLength = substr(strrchr(end($allValue),'='),1);
				//getting product details
				$pro_details = $this->_DAL_Obj->getValue_where('product_info','*','product_id',$pid);
				if(!empty($pro_details[0]))
				{
					//getting usre price
					$user_price = $pro_details[0][$this->getUserPrice()];
					//getting total amount
					$amount = $quantity * intval($user_price);
						
					echo '<tr>
							<td class="col-sm-7">
								<h5>'.$pro_details[0]['name'].'</h5>
							</td>
							<td>';
					
					if($maxSpeciLength != 0)
					{
						for($j=1; $j<=$maxSpeciLength; $j++)
						{
							echo '<span>'.substr(strrchr($allValue[(2*$j)],'='),1).' :</span>
								<span>'.substr(strrchr($allValue[(2*$j)+1],'='),1).' </span><br>';
						}
					}
					
					echo '</td>
							<td><span>'.$this->getSystemCurrency('product').$user_price.'</span></td>
							<td>'.$quantity.'</td>
							<td><span>'.$this->getSystemCurrency('product').$amount.'</span></td>
						</tr>';
					
				}//end of if condition
				//calculating total amount
				$total_amount = $total_amount + $amount;
			}//end of for loop
			//return total amount of the cart
			return $total_amount;
		}
		
		/*
		- method for unset product cart cookies
		- Auth: Dipanjan
		*/
		function destroyProductCookie()
		{
			//getting no of items selected
			$pro_value = explode(':',$GLOBALS['_COOKIE'][$_SESSION['user_id']]);
			$items_selected = $pro_value[1];
			//getting product details cookie 
			for($i=1; $i<=$items_selected; $i++)
			{
				$cookie_name = $_SESSION['user_id'].'pro:'.$i;
				//delete this cookie
				setcookie($cookie_name, '', time() - 3600, '/');
			}
			//delete user id cookie
			setcookie($_SESSION['user_id'], '', time() - 3600, '/');
			
		}
		
		/*
		- method for getting username of login person
		- Auth: Dipanjan
		*/
		function getUsernameOfUser()
		{
			//get user info
			$user_info = $this->_DAL_Obj->getValue_where('user_info','*','user_id',$_SESSION['user_id']);
			if(!empty($user_info[0]))
			{
				echo 'Welcome '.$user_info[0]['username'];
			}
		}
		
		/*
		- method for getting product image
		- Auth: Dipanjan
		*/
		function getProductImageInDetailsPage($product_id)
		{
			$baseUrl = $this->getBaseUrl();
			//get values from database
			$pro_details = $this->_DAL_Obj->getValueWhereAsc('product_image','*',array('product_id'),array($product_id),'img_order');
			if(!empty($pro_details[0]))
			{
				/* new code */
				echo '<div class="img-prod-cart" id="prod_main">
						<img class="img-responsive" src="'.$baseUrl.'images/product/'.$pro_details[0]['image'].'" />
					</div>';
				
				echo '<div class="row">';
					
				if(!empty($pro_details[1]))
				{
					echo '<div class="col-sm-3 thumb_image" id="prod_img1">
							<img class="img-responsive" src="'.$baseUrl.'images/product/'.$pro_details[1]['image'].'" />
						</div>';
				}
				if(!empty($pro_details[2]))
				{
					echo '<div class="col-sm-3 thumb_image" id="prod_img2">
							<img class="img-responsive" src="'.$baseUrl.'images/product/'.$pro_details[2]['image'].'" />
						</div>';
				}
				if(!empty($pro_details[3]))
				{
					echo '<div class="col-sm-3 thumb_image" id="prod_img3">
							<img class="img-responsive" src="'.$baseUrl.'images/product/'.$pro_details[3]['image'].'" />
						</div>';
				}
				if(!empty($pro_details[4]))
				{
					echo '<div class="col-sm-3 thumb_image" id="prod_img4">
							<img class="img-responsive" src="'.$baseUrl.'images/product/'.$pro_details[4]['image'].'" />
						</div>';
				}
				
				echo '</div>';
				
			}
			else
			{
				echo '<div class="img-prod-cart">
						<img class="img-responsive" src="'.$baseUrl.'images/250x300.gif" />
					</div>';
			}
		}
		
		/*
		- method for getting user money details
		- Auth: Dipanjan
		*/
		function getUserMoneyList($page)
		{
			$baseUrl = $this->getBaseUrl();
			//setting limit
			$limit = 20;
			//calculate the rows number to be shown in this page
			$startNo = $page*$limit;
			$endNo = ($page + 1)*$limit;
			//get values of user money
			$userMoney = $this->_DAL_Obj->getValueLikelyMultiple('user_money_info', '*', array('user_id','specification'), array($_SESSION['user_id'],'trans'),'DESC',2000);
			//get total row
			$userRow = count($userMoney);
			if(!empty($userMoney[0]))
			{
				//initiate serial no variable
				$sl_no = 1;
				//the pagination counter 
				$page_result = 0;
				//get system currency
				$system_currency = $this->getSystemCurrency('product');
				foreach($userMoney as $money)
				{
					if($page_result >= $startNo && $page_result < $endNo)
					{
						//getting transaction details
						$trans_details = $this->_DAL_Obj->getValueMultipleCondtn('fee_transaction_info', '*', array('transaction_id'),array($money['specification']));
						
						if(substr($trans_details[0]['order_id'],0,5) == 'order')
						{
							//get order details
							$order_details = $this->_DAL_Obj->getValueMultipleCondtn('product_inventory_info', '*', array('order_id','product_id'),array($trans_details[0]['order_id'],$trans_details[0]['product_id']));
							$order_info = $this->_DAL_Obj->getValueMultipleCondtn('order_info', '*', array('order_id'),array($trans_details[0]['order_id']));
							//get product name
							$product = $this->_DAL_Obj->getValue_where('product_info', '*', 'product_id', $trans_details[0]['product_id']);
							echo '<tr>
	                                <td>'.$sl_no.'</td>
	                                <td><a href="'.$baseUrl.'order-details/'.$trans_details[0]['order_id'].'">'.$trans_details[0]['order_id'].'</a></td>
	                                <td>'.$product[0]['name'].'</td>
	                                <td>'.$order_details[0]['quantity'].'</td>
	                                <td>'.substr($order_info[0]['date'],0,strpos($order_info[0]['date'], ' ')).'</td>
	                                <td>'.$this->getFeeType($trans_details[0]['fee_type']).'</td>
	                                <td>'.$system_currency.$money['earn_money'].'</td>
	                            </tr>';
						}
						if(substr($trans_details[0]['order_id'], 0, 9) == 'mem_order')
						{
							//get order details
							$mem_order_details = $this->_DAL_Obj->getValueMultipleCondtn('membership_order_info', '*', array('membership_order_id'),array($trans_details[0]['order_id']));
							echo '<tr>
	                                <td>'.$sl_no.'</td>
	                                <td><a href="'.$baseUrl.'membership-order-details/'.$mem_order_details[0]['membership_order_id'].'">'.$trans_details[0]['order_id'].'</a></td>
	                                <td>Membership</td>
	                                <td>1</td>
	                                <td>'.substr($mem_order_details[0]['date'],0,strpos($mem_order_details[0]['date'], ' ')).'</td>
	                                <td>'.$this->getFeeType($trans_details[0]['fee_type']).'</td>
	                                <td>'.$system_currency.$money['earn_money'].'</td>
	                            </tr>';
						}
					}
						
					//increament the counter
					$sl_no++;
					$page_result++;
				}
			}
			return array($userRow,$limit);
		}

		/*
		- method for getting user money details
		- Auth: Dipanjan
		*/
		function getUserPointValueListByChild($page)
		{
			$baseUrl = $this->getBaseUrl();
			//setting limit
			$limit = 20;
			//calculate the rows number to be shown in this page
			$startNo = $page*$limit;
			$endNo = ($page + 1)*$limit;
			//get values of user money
			$userMoney = $this->_DAL_Obj->getValueMultipleCondtnDesc('user_point_info', '*', array('user_id'), array($_SESSION['user_id']));
			//get total row
			$userRow = $this->_DAL_Obj->getRowValueMultipleCondition('user_point_info', array('user_id'), array($_SESSION['user_id']));
			if(!empty($userMoney[0]))
			{
				//initiate serial no variable
				$sl_no = 1;
				//the pagination counter 
				$page_result = 0;
				foreach($userMoney as $money)
				{
					
					//getting transaction details
					$trans_details = $this->_DAL_Obj->getValueMultipleCondtn('fee_transaction_info', '*', array('transaction_id'),array($money['specification']));
					
					if(substr($trans_details[0]['order_id'],0,5) == 'order')
					{
						//get order details
						$order_details = $this->_DAL_Obj->getValueMultipleCondtn('product_inventory_info', '*', array('order_id','product_id'),array($trans_details[0]['order_id'],$trans_details[0]['product_id']));
						$order_info = $this->_DAL_Obj->getValueMultipleCondtn('order_info', '*', array('order_id'),array($trans_details[0]['order_id']));
						//get product name
						$product = $this->_DAL_Obj->getValue_where('product_info', '*', 'product_id', $trans_details[0]['product_id']);
						
						if($order_info[0]['user_id'] != $_SESSION['user_id'])
						{
							if($page_result >= $startNo && $page_result < $endNo)
							{
								echo '<tr>
		                                	<td>'.$sl_no.'</td>
		                                	<td><a href="'.$baseUrl.'order-details/'.$trans_details[0]['order_id'].'">'.$trans_details[0]['order_id'].'</a></td>
		                                	<td>'.$product[0]['name'].'</td>
		                                	<td>'.$order_details[0]['quantity'].'</td>
											<td>'.$this->getUserFromUserId($order_info[0]['user_id']).'</td>
											<td>'.substr($order_info[0]['date'],0,strpos($order_info[0]['date'], ' ')).'</td>
		                                	<td>'.$money['earn_pv'].'</td>
		                            	 </tr>';	 
							}
							//increment the counter
							$sl_no++;
							$page_result++;
							
						}
					}
					
				}
			}
			return array($page_result,$limit);
		}

		/*
		- method for getting user money details
		- Auth: Dipanjan
		*/
		function getUserPointValueListByHimself($page)
		{
			$baseUrl = $this->getBaseUrl();	
			//setting limit
			$limit = 20;
			//calculate the rows number to be shown in this page
			$startNo = $page*$limit;
			$endNo = ($page + 1)*$limit;
			//get values of user money
			$userMoney = $this->_DAL_Obj->getValueMultipleCondtnDesc('user_point_info', '*', array('user_id'), array($_SESSION['user_id']));
			//get total row
			$userRow = $this->_DAL_Obj->getRowValueMultipleCondition('user_point_info', array('user_id'), array($_SESSION['user_id']));
			if(!empty($userMoney[0]))
			{
				//initiate serial no variable
				$sl_no = 1;
				//the pagination counter 
				$page_result = 0;
				foreach($userMoney as $money)
				{
					
					//getting transaction details
					$trans_details = $this->_DAL_Obj->getValueMultipleCondtn('fee_transaction_info', '*', array('transaction_id'),array($money['specification']));
					
					if(substr($trans_details[0]['order_id'],0,5) == 'order')
					{
						//get order details
						$order_details = $this->_DAL_Obj->getValueMultipleCondtn('product_inventory_info', '*', array('order_id','product_id'),array($trans_details[0]['order_id'],$trans_details[0]['product_id']));
						$order_info = $this->_DAL_Obj->getValueMultipleCondtn('order_info', '*', array('order_id'),array($trans_details[0]['order_id']));
						//get product name
						$product = $this->_DAL_Obj->getValue_where('product_info', '*', 'product_id', $trans_details[0]['product_id']);
						
						if($order_info[0]['user_id'] == $_SESSION['user_id'])
						{
							if($page_result >= $startNo && $page_result < $endNo)
							{
								echo '<tr>
		                                	<td>'.$sl_no.'</td>
		                                	<td><a href="'.$baseUrl.'order-details/'.$trans_details[0]['order_id'].'">'.$trans_details[0]['order_id'].'</a></td>
		                                	<td>'.$product[0]['name'].'</td>
		                                	<td>'.$order_details[0]['quantity'].'</td>
											<td>'.substr($order_info[0]['date'],0,strpos($order_info[0]['date'], ' ')).'</td>
		                                	<td>'.$money['earn_pv'].'</td>
		                            	 </tr>';	 
							}
							//increment the counter
							$sl_no++;
							$page_result++;
							
						}
					}
					
				}
			}
			return array($page_result,$limit);
		}

		/*
		- method for getting user total money calculation
		- Auth: Dipanjan
		*/
		function getUserTotalMoney()
		{
			//get user total money
			$grand_total = $this->_DAL_Obj->getLastValue('user_money_info', '*', 'user_id', $_SESSION['user_id'], 'id');
			//user withdraw money
			$money = $this->_DAL_Obj->getValue_where('user_profile_info', '*', 'user_id', $_SESSION['user_id']);
			if(!empty($money[0]['withdraw_amount']))
			{
				$withdraw_money = $money[0]['withdraw_amount'];
			}
			else
			{
				$withdraw_money = 0;
			}
			//withdraw processing amount
			if(!empty($money[0]['processing_withdraw_amount']))
			{
				$with_pro_amount = $money[0]['processing_withdraw_amount'];
			}
			else
			{
				$with_pro_amount = 0;
			}
			
			//get system currency
			$system_currency = $this->getSystemCurrency('product');
			echo '<tr>
                    <td class="amt-color" colspan="6" style="text-align: right;">Gross Amount</td>
                    <td>'.$system_currency.$money[0]['gross_amount'].'</td>
                </tr>
                <tr>
                    <td class="amt-color" colspan="6" style="text-align: right;">Withdrew Amount</td>
                    <td>'.$system_currency.$withdraw_money.'</td>
                </tr>';
			if(!empty($money[0]['processing_withdraw_amount']))
			{
				echo '<tr>
	                    <td class="amt-color" colspan="6" style="text-align: right;">Processing Withdraw Amount</td>
	                    <td>'.$system_currency.$with_pro_amount.'</td>
	                </tr>';
			}
			
            echo '<tr>
                    <td class="amt-color" colspan="6" style="text-align: right;">Net Amount</td>
                    <td>'.$system_currency.$money[0]['net_amount'].'</td>
                </tr>';
		}
		
		/*
		- method for getting user total point value calculation
		- Auth: Dipanjan
		*/
		function getUserTotalPointValue()
		{
			//get user total money
			$total_pv = $this->_DAL_Obj->getLastValue('user_point_info', '*', 'user_id', $_SESSION['user_id'], 'id');
			
			echo '<tr>
                    <td class="amt-color" colspan="5" style="text-align: right;">Total Point Value</td>
                    <td>'; if(!empty($total_pv[0]['total_pv'])) { echo $total_pv[0]['total_pv'] ; } else { echo 0;}  echo '</td>
                </tr>';
		}
		
		/*
		- method for getting user total point value earned by child
		- Auth: Dipanjan
		*/
		function getUserTotalPointValueByChild($user_id)
		{
			//define an variable
			$pv = 0;
			//get user money details
			$userPv = $this->_DAL_Obj->getValueMultipleCondtn('user_point_info', '*', array('user_id'), array($user_id));
			if(!empty($userPv[0]))
			{
				foreach($userPv as $point)
				{
					//getting transaction details
					$trans_details = $this->_DAL_Obj->getValue_where('fee_transaction_info', '*', 'transaction_id', $point['specification']);
					if(substr($trans_details[0]['order_id'], 0, 5) == 'order')
					{
						//getting order details
						$order_details = $this->_DAL_Obj->getValue_where('order_info', '*', 'order_id', $trans_details[0]['order_id']);
						if($order_details[0]['user_id'] != $user_id)
						{
							$pv = $pv + $point['earn_pv'];
						}
					}
				}
			}

			echo '<tr>
                    <td class="amt-color" colspan="6" style="text-align: right;">Point Value Earned By Child</td>
                    <td>'.$pv.'</td>
                </tr>';
			
		}
		
		/*
		- method for getting user total point value earned by child
		- Auth: Dipanjan
		*/
		function getUserTotalPointValueByHimself($user_id)
		{
			//define an variable
			$pv = 0;
			//get user money details
			$userPv = $this->_DAL_Obj->getValueMultipleCondtn('user_point_info', '*', array('user_id'), array($user_id));
			if(!empty($userPv[0]))
			{
				foreach($userPv as $point)
				{
					//getting transaction details
					$trans_details = $this->_DAL_Obj->getValue_where('fee_transaction_info', '*', 'transaction_id', $point['specification']);
					if(substr($trans_details[0]['order_id'], 0, 5) == 'order')
					{
						//getting order details
						$order_details = $this->_DAL_Obj->getValue_where('order_info', '*', 'order_id', $trans_details[0]['order_id']);
						if($order_details[0]['user_id'] == $user_id)
						{
							$pv = $pv + $point['earn_pv'];
						}
					}
				}
			}

			echo '<tr>
                    <td class="amt-color" colspan="5" style="text-align: right;">Point Value Earned By Himself</td>
                    <td>'.$pv.'</td>
                </tr>';
			
		}
		
		/*
		- method for getting user net amount
		- Auth: Dipanjan
		*/
		function getUserNetAmount($user_id)
		{
			//user withdraw money
			$money = $this->_DAL_Obj->getValue_where('user_profile_info', '*', 'user_id', $user_id);
			//net amount
			$net_total = $money[0]['net_amount'];
			
			return $net_total;
		}

		/*
		- method for getting user bank details
		- Auth: Riju
		*/
		function getUserBankDetails()
		{
			$details=$this->_DAL_Obj->getValue_where('user_bank_info','*','user_id', $_SESSION['user_id']);
			return $details;
		}
		
		/*
		- method for getting page details
		- Auth: Debojyoti
		*/
		function getPageDetails($id)
		{
			$details=$this->_DAL_Obj->getValue_where('mypage','*','page_id', $id);
			if(isset($details[0]) && !empty($details[0]))
			return $details[0];
		}

		/*
		- method for getting order history for user
		- Auth: Riju
		*/
		function getOrderHistory()
		{
			$baseUrl = $this->getBaseUrl();	
			$orders = $this->_DAL_Obj->getValueMultipleCondtnDesc('order_info', '*', array('user_id','checkout_process'), array($_SESSION['user_id'],1));
			if(!empty($orders[0]))
			{
				foreach($orders as $order)
				{
					
					echo '<tr>
							<td><a href="'.$baseUrl.'order-details/'.$order['order_id'].'">'.$order['order_id'].'</a></td>
							<td>'.substr($order['date'], 0, strpos($order['date'], ' ')).'</td>
							<td>'.$this->getPaymentMethod($order['payment_method']).'</td>
							<td>'.$this->getSystemCurrency('product').$order['total_amount'].'</td>
							<td>'.$order['order_status'].'</td>
						</tr>';
				}
				
			}
			else
			{
				echo '<tr>
						<td colspan="5">Order History is Empty</td>
					</tr>';
			}
		}

		/*
		- method for getting payment method
		- Auth: riju
		*/
		function getPaymentMethod($value)
		{
			if($value == 'online')
			{
				$method = 'Online Payment';
			}
			else if($value == 'bank')
			{
				$method = 'Bank Transfer';
			}
			else if($value == 'cod')
			{
				$method = 'Cash On Delivery';
			}
			return $method;
		}
		
		/*
		- method for getting order basic details for user
		- Auth: riju
		*/
		function getUserOrderBasicDetails($order_id)
		{
			$basic = $this->_DAL_Obj->getValueMultipleCondtn('order_info', '*', array('order_id'), array($order_id));
			return $basic;
			
		}
		
		/*
		- method for getting member name
		- Auth: Riju
		*/
		function getUserFromUserId($user_id)
		{
			if($user_id != 'Guest')
			{
				$user_info = $this->_DAL_Obj->getValue_where('user_info','*','user_id',$user_id);
				return $user_info[0]['f_name'].' '.$user_info[0]['l_name'];
			}
			else
			{
				return 'Guest';
			}
		}
		
		/*
		- method for order billing and shipping details for user
		- Auth: Riju
		*/
		function getUserBillingAndShippingDetails($order_id,$add_mode)
		{
			$bill_details = $this->_DAL_Obj->getValueMultipleCondtn('order_shipping_info', '*', array('order_id','address_mode'), array($order_id,$add_mode));
			return $bill_details;
			
		}

		/*
		- method for ordered product details for user
		- Auth: Riju
		*/
		function getUserProductDetails($order_id)
		{
			$baseUrl = $this->getBaseUrl();	
			$pro_details = $this->_DAL_Obj->getValueMultipleCondtn('product_inventory_info','*',array('order_id'),array($order_id));
			if(!empty($pro_details[0]))
			{
				$amount = 0;
				foreach($pro_details as $product)
				{
					echo '<tr>
							<td>'.$this->getProductNameFromId($product['product_id']).'
								<a href = "'.$baseUrl.'product-review/'.$product['product_id'].'"><button class="btn">Review</button></a>
							</td>
							<td>'.$product['quantity'].'</td>
							<td>';
					if(!empty($product['specification']))
					{
						$speci = explode(',',$product['specification']);
						foreach($speci as $key=>$value)
						{
							echo $value.'<br>';
						}
					}
							
								
					echo '	</td>
						  	<td>'.$this->getSystemCurrency('product').$product['price'].'</td>	
						</tr>';
					$amount = $amount + $product['price'];
				 }
					$grand_total = intval($amount) + intval($this->getShippingCost());
					echo '<tr>
							<td colspan="3">Sub Total</td>
							<td>'.$this->getSystemCurrency('product').$amount.'</td>
						</tr>
						<tr>
							<td colspan="3">Shipping Charge</td>
							<td>'.$this->getSystemCurrency('product').$this->getShippingCost().'</td>
						</tr>
						<tr>
							<td colspan="3"><b>Grand Total</b></td>
							<td>'.$this->getSystemCurrency('product').$grand_total.'</td>
						</tr>';
				
					
			}
		}

		/*
		- method for getting product name
		- Auth: Riju
		*/
		function getProductNameFromId($product_id)
		{
			//get values from database
			$pro = $this->_DAL_Obj->getValue_where('product_info','*','product_id',$product_id);
			return $pro[0]['name'];
		}
		
		/*
		- method for getting withdraw history for user
		- Auth: Riju
		*/
		function getWithdrawHistory()
		{
			$withdraws = $this->_DAL_Obj->getValueWhere_descending('withdraw_info', '*', 'user_id', $_SESSION['user_id']);
			if(!empty($withdraws[0]))
			{
				foreach($withdraws as $withdraw)
				{
					echo '<tr>
							<td>'.$withdraw['withdraw_id'].'</td>
							<td>'.$withdraw['withdraw_method'].'</td>
							<td>'.$withdraw['date'].'</td>
							<td>'.$this->getSystemCurrency('product').$withdraw['amount'].'</td>
							<td>';
							if($withdraw['status']==0)
							{
								echo 'Processing';
							}
							else 
							{
								echo 'Processed';
							}
					
					echo '</td></tr>';			
							
				}
			}
			else
			{
				echo '<tr>
						<td colspan="5">Withdraw History is Empty</td>
					</tr>';
			}
		}
		
		/*
		- method for getting membership order details
		- Auth: Riju
		*/
		function getMembershipOrderDetails($order)
		{
			$mem_order = $this->_DAL_Obj->getValue_Where('membership_order_info', '*','membership_order_id',$order);
			return $mem_order;
		}
		
		/*
		- method for getting tree data
		- Auth: Debojyoti 
		*/
		function getTreeData($id, $level)
		{
			$baseUrl = $this->getBaseUrl();	
			//getting data about the id passed	
			$userData = $this->_DAL_Obj->getValue_where('user_mlm_info', '*', 'user_id', $id);	
			if($level==1)
			{
				$parentName = $this->_DAL_Obj->getValue_where('user_info', '*', 'user_id', $id);	
				$user_level = $this->getUserLevelDetails($parentName[0]['member_level']);	
				echo '<div class="wholesaler-block pull-left wholesaler-outline">
	                		<img src="'.$baseUrl.'images/user-icon.png" class="img-responsive" />
                    		<div class="text-center wholsaler-textblock">
                    			<p class="wholesaler"><b>'.$parentName[0]['f_name']." ".$parentName[0]['l_name'].'</b></p>
                    			<p class="subhead">'.$user_level[0]['member_category'].'</p>
                    			<p class="user">'.$id.'</p>
                    		</div>
                    	</div>';
				//echoing 1st level child starting div if parent has a 1st level child
				if(!empty($userData[0]['child_id']))
				{
					echo '<div class="local-member-block left-outline pull-left">';
				}
				else 
				{
					echo '<div style ="margin-top:8%" class="local-member-block left-outline pull-left">';
				}		
            }
			//checking if the user has child 
			if(!empty($userData[0]['child_id']))
			{
				$childIds = explode(',', $userData[0]['child_id']);
				foreach($childIds as $childId)
				{
					//getting data of child
					$childData = $this->_DAL_Obj->getValue_where('user_mlm_info', '*', 'id', $childId);	
					$childName = $this->_DAL_Obj->getValue_where('user_info', '*', 'user_id', $childData[0]['user_id']);
					$childLevel = $this->getUserLevelDetails($childName[0]['member_level']);
					//if level = 1,div class local-block local-small-outline pull-left will be echoed
					if($level == 1)
					{
						echo '<div class="local-block local-small-outline pull-left">
	                    			<a href ="'.$baseUrl.'tree/'.$childData[0]['user_id'].'"><img src="'.$baseUrl.$childLevel[0]['user_icon_link'].'" alt="local" class="img-responsive subicon-align" /></a>
		                    		<div class="text-center local-textblock">
		                    			<p class="local-small"><b>'.$childName[0]['f_name']." ".$childName[0]['l_name'].'</b></p>
		                    			<p class="subhead-small">'.$childLevel[0]['member_category'].'</p>
		                    			<p class="user-small">'.$childData[0]['user_id'].'</p>
		                    		</div>
	                    		</div>';
					}	
					//if level = 2,div class member-outline-small will be echoed;all of these divs will be under div class local-block member-outline pull-left
					if($level == 2)
					{
						echo '<div class="member-outline-small">
	                    			<a href = "'.$baseUrl.'tree/'.$childData[0]['user_id'].'"><img src="'.$baseUrl.$childLevel[0]['user_icon_link'].'" alt="member" class="img-responsive subicon-align" /></a>
		                    		<div class="text-center member-textblock">
		                    			<p class="local-small"><b>'.$childName[0]['f_name']." ".$childName[0]['l_name'].'</b></p>
		                    			<p class="subhead-small">'.$childLevel[0]['member_category'].'</p>
		                    			<p class="user-small">'.$childData[0]['user_id'].'</p>
		                    		</div> 
                    			</div>';
					}	
					//checking child will be discontinued if level will be equal to two
					if($level != 2)
					{
						//checking if this id has child
						if(!empty($childData[0]['child_id']))
						{
							//setting level variable to two	in case of level 2 members
							$level = 2;
							echo '<div class="local-block member-outline pull-left">';
							$this->getTreeData($childData[0]['user_id'], $level);
							echo '</div>';
							echo '<div class="clearfix"></div>';
							//setting level variable to one after echoing all level two members
							$level = 1;
						}
						else
						{
							echo '<div class="local-block member-outline pull-left" style = "margin-top:11%"><p class="wholesaler" style = "margin-left:5%;margin-top: 15%;margin-bottom: 10%;"><b>NO CHILD</b></p></div>';
							//echoing this div which would have been echoed if the present id had a child	
							echo '<div class="clearfix"></div>';
						}
					}
				}
			}
			//echoing 1st level child ending div if parent has a 1st level child
			if(!empty($userData[0]['child_id']) && $level == 1)
			{
				echo '</div>';
			}
			if(empty($userData[0]['child_id']) && $level == 1)
			{
				echo '<p class="wholesaler" style = "margin-left:5%;margin-top: 5%;"><b>NO CHILD</b></p></div>';
						//echoing this div which would have been echoed if the present id had a child	
						echo '<div class="clearfix"></div>';
			}
			
		}

		/*
		- method for getting product review
		- Auth: Debojyoti 
		*/
		function getProductReview($product_id)
		{
			$reviews = $this->_DAL_Obj->getValueWhere_descending('product_review_info', '*', 'product_id', $product_id);
			if(empty($reviews[0]['review']))
			{
				echo '<div class="col-sm-12">
						<p class="cart-prod-name-rel">No Reviews Available</p>
					  </div>';
			}
			else
			{
				$count = 1;		
				foreach($reviews as $review)
				{
					$userdata = $this->_DAL_Obj->getValue_where('user_info', '*', 'user_id', $review['user_id']);
					
					echo '<div class="review_outline">
								<h4 class="review_user">
									'.$userdata[0]['f_name'].' '.$userdata[0]['l_name'].'
								</h4>
								<p style="color: #838383;width: 70%;">
									'.$review['review'].'
								</p>
								<p>'.$review['date'].'</p>
							</div>';
					if($count >= 10)
					{
						break;
					}
					$count++;
				}
			}	
		}
		
		/*
		- method for knowing whether user has already reviewed or not 
		- Auth: Debojyoti
		*/
		function userReviewCheck($userid, $productid)
		{
			$column_name = array('product_id', 'user_id');
			$column_values = array($productid, $userid);	
			$reviewCheck = $this->_DAL_Obj->getValueMultipleCondtn('product_review_info', '*', $column_name, $column_values);
			return $reviewCheck;
		}

		/*
		- method for getting header page links
		- Auth: Debojyoti 
		*/
		function getHeaderPageLinks()
		{
			$column_name = array('top_links', 'status');	
			$column_value = array(1, 1);
			$links = $this->_DAL_Obj->getValueMultipleCondtn('mypage_links', '*', $column_name, $column_value);
			return $links;
		}
		
		/*
		- method for getting navbar page links
		- Auth: Debojyoti 
		*/
		function getNavbarPageLinks()
		{
			$column_name = array('navbar_links', 'status');	
			$column_value = array(1, 1);
			$links = $this->_DAL_Obj->getValueMultipleCondtn('mypage_links', '*', $column_name, $column_value);
			return $links;
		}
		
		/*
		- method for getting footer page links
		- Auth: Debojyoti 
		*/
		function getFooterPageLinks()
		{
			$column_name = array('footer_links', 'status');	
			$column_value = array(1, 1);
			$links = $this->_DAL_Obj->getValueMultipleCondtn('mypage_links', '*', $column_name, $column_value);
			return $links;
		}
		
		/*
		- method for getting the base url
		- Auth: Debojyoti 
		*/
		function getBaseUrl()
		{
			$baseUrl = $this->_DAL_Obj->getValue('admin_info', '*');
			return $baseUrl[0]['base_url'];
		}
	 }
?>