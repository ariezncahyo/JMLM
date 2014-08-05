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
			return $fee_text;
		}
		
		/*
		- method for getting the value of the pagination
		- Auth : Dipanjan
		*/
		function wallet_pagination($page,$rows,$pageUrl,$max_no_index,$limit)
		{	
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
					echo '<li><a href="'.$pageUrl.'p=0">&laquo;</a></li>';
				}
				elseif( $page != 0 )
				{
					echo '<li><a href="'.$pageUrl.'p='.($page-1).'">&laquo;</a></li>';
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
						echo '><a href="'.$pageUrl.'p='.($i-1).'">'.$i.'</a></li>' ;
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
					echo '<li><a href="'.$pageUrl.'p='.($page + 1).'">&raquo;</a></li>' ;
				}
				//for the last button
				//echo '<li><a href="'.$PageUrl.'?p='.($no_page - 1).'&limit='.$limit.'">Last</a></li>' ;
				echo	 '</ul>
					</div>';
			}
			
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
							<a href="products.php?cat='.$value['categoryId'].'&l='.$value['level'].'" class="hvr-no-decortn">
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
											
											<p class="prod-name"><a href="product-description.php?pro='.$pro_details[0]['product_id'].'" class="hvr-no-decortn color-inhrt">View More</a></p>
										</div>
										
										<div class="col-sm-5">
											<div class="img-container">
												<img src="'.$img.'" class="img-responsive" />
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
													
													<p class="prod-name"><a href="product-description.php?pro='.$product['product_id'].'" class="hvr-no-decortn color-inhrt">View More</a></p>
												</div>
												
												<div class="col-sm-5">
													<div class="img-container">
														<img src="'.$img.'" class="img-responsive" />
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
										<a href="product-description.php?pro='.$product['product_id'].'">
											<div class="rel-prod img-thumbnail">
												<img class="img-responsive" src="'.$img.'" />
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
								<div class="col-sm-2 col-xs-5">
									<img src="images/curly.jpg" class="img-responsive" />
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
			//get values from database
			$pro_details = $this->_DAL_Obj->getValueWhereAsc('product_image','*',array('product_id'),array($product_id),'img_order');
			if(!empty($pro_details[0]))
			{
				echo '<div class="img-prod-cart">';
						/*<li>
							<img class="img-responsive" src="images/basket-egg.jpg" />
						</li>
						<li>
							<img class="img-responsive" src="images/basket-egg.jpg" />
						</li>
						<div class="clearfix"></div>*/
				foreach($pro_details as $pic)
				{
					echo '<li>
							<img class="img-responsive" src="images/product/'.$pic['image'].'" />
						</li>';
				}
				
				echo '</div>';
			}
			else
			{
				echo '<div class="img-prod-cart">
						<img class="img-responsive" src="images/250x300.gif" />
					</div>';
			}
		}
		
		/*
		- method for getting user money details
		- Auth: Dipanjan
		*/
		function getUserMoneyList($page)
		{
			//setting limit
			$limit = 20;
			//calculate the rows number to be shown in this page
			$startNo = $page*$limit;
			$endNo = ($page + 1)*$limit;
			//get values of user money
			$userMoney = $this->_DAL_Obj->getValueMultipleCondtnDesc('user_money_info', '*', array('user_id'), array($_SESSION['user_id']));
			//get total row
			$userRow = $this->_DAL_Obj->getRowValueMultipleCondition('user_money_info', array('user_id'), array($_SESSION['user_id']));
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
	                                <td>'.$trans_details[0]['order_id'].'</td>
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
							$mem_order_details = $this->_DAL_Obj->getValueMultipleCondtn('membership_order_info', '*', array('order_id'),array($trans_details[0]['order_id']));
							echo '<tr>
	                                <td>'.$sl_no.'</td>
	                                <td>'.$trans_details[0]['order_id'].'</td>
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
		function getUserPointValueList($page)
		{
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
	                                <td>'.$trans_details[0]['order_id'].'</td>
	                                <td>'.$product[0]['name'].'</td>
	                                <td>'.$order_details[0]['quantity'].'</td>
	                                <td>'.substr($order_info[0]['date'],0,strpos($order_info[0]['date'], ' ')).'</td>
	                                <td>'.$money['earn_pv'].'</td>
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
		- method for getting user total money calculation
		- Auth: Dipanjan
		*/
		function getUserTotalMoney()
		{
			//get user total money
			$grand_total = $this->_DAL_Obj->getLastValue('user_money_info', '*', 'user_id', $_SESSION['user_id'], 'id');
			$withdraw_money = 0;
			$net_total = ($grand_total[0]['total_money'] - $withdraw_money);
			//get system currency
			$system_currency = $this->getSystemCurrency('product');
			echo '<tr>
                    <td class="amt-color" colspan="6" style="text-align: right;">Gross Amount</td>
                    <td>'.$system_currency.$grand_total[0]['total_money'].'</td>
                </tr>
                <tr>
                    <td class="amt-color" colspan="6" style="text-align: right;">Withdrew Amount</td>
                    <td>'.$system_currency.$withdraw_money.'</td>
                </tr>
                <tr>
                    <td class="amt-color" colspan="6" style="text-align: right;">Net Amount</td>
                    <td>'.$system_currency.$net_total.'</td>
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
                    <td>'.$total_pv[0]['total_pv'].'</td>
                </tr>';
		}
		
	 }
?>