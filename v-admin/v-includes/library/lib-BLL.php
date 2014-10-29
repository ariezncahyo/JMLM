<?php
	//include the DAL library to use the model layer methods
	include 'lib-DAL.php';
	
	// business layer class starts here
	class BLL_manageData
	{
		public $manage_content;
		
		/*
		- method for constructing DAL class
		- Auth: Dipanjan
		*/
		function __construct()
		{
			if(($this->manage_content instanceof ManageContent_DAL) != TRUE)
			{
				//create the DAL
				$this->manage_content = new ManageContent_DAL();
				return $this->manage_content;
			}	
				
		}
		
		/*
		- method for getting system currency
		- Auth: Dipanjan
		*/
		function getSystemCurrency($field)
		{
			$sytem_currency = $this->manage_content->getValue_where('system_currency','*','field',$field);
			return $sytem_currency[0]['currency'];
		}
		
		/*
		- method for getting payment methode
		- Auth: Dipanjan
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
		- method for member name
		- Auth: Dipanjan
		*/
		function getUserFromUserId($user_id)
		{
			if($user_id != 'Guest')
			{
				$user_info = $this->manage_content->getValue_where('user_info','*','user_id',$user_id);
				return $user_info[0]['f_name'].' '.$user_info[0]['l_name'];
			}
			else
			{
				return 'Guest';
			}
		}
		
		/*
		- method for getting product name list
		- Auth: Dipanjan
		*/
		function getSystemProductList($product_id)
		{
			//get all values
			$product = $this->manage_content->getValueMultipleCondtn('product_info','*',array('status'),array(1));
			if(!empty($product[0]))
			{
				foreach($product as $pro)
				{
					if($pro['product_id'] == $product_id)
					{
						echo '<option value="'.$pro['product_id'].'" selected="selected">'.$pro['name'].'</option>';
					}
					else
					{
						echo '<option value="'.$pro['product_id'].'">'.$pro['name'].'</option>';
					}
				}
			}
		}
		
		/*
		- method for getting product name
		- Auth: Dipanjan
		*/
		function getProductNameFromId($product_id)
		{
			//get values from database
			$pro = $this->manage_content->getValue_where('product_info','*','product_id',$product_id);
			return $pro[0]['name'];
		}
		
		/*
		- method for getting shiiping cost of system
		- Auth: Dipanjan
		*/
		function getShippingCost()
		{
			$sytem_currency = $this->manage_content->getValue_where('shipping_cost_info','*','status',1);
			return $sytem_currency[0]['shipping_cost'];
		}
		
		/*
		- method for creating user cookie
		- Auth: Dipanjan
		*/
		function createUserCookie($user_id)
		{
			//creating user cookie
			$cookie_exp_time = time() + (24*3600);
			$setCookie = $this->createCookie('uid',$user_id,$cookie_exp_time);
		}
		
		/*
		- method for setting cookie
		- Auth: Dipanjan
		*/
		function createCookie($cookie_name,$cookie_value,$exp_time)
		{
			//creating the cookie
			$path = '/';
			setcookie($cookie_name,$cookie_value,$exp_time,$path);
		}
		
		/*
		- method for getting the value of the pagination
		- Auth : Dipanjan
		*/
		function pagination($page,$jobList,$user_id,$pageUrl,$max_no_index,$limit)
		{
			//getting no of rows to be fetched
			//initialize a parameter
			$rows = 0;
			if(!empty($jobList[0]))
			{
				foreach($jobList as $job)
				{
					//reject the jobs which have posted by this user
					//checking for job ending date exceeds the current date or not
					if($job['user_id'] != $user_id && time() <= strtotime($job['ending_date']))
					{
						//increment the counter
						$rows++;
					}
				}
			}
			
			//used in the db for getting o/p
			$startPoint = $page*$limit ;
			//no of page to be displayed
			$no_page = $rows/$limit ;
			//show pagination when there is more than one page is there
			if($no_page > 1)
			{
				$no_page = intval($no_page) + 1;
				//set no of index to be displayed
				$no_index = 1 ;
				
				//generate the pagination UI
				echo '<span class="pull-right">
						<ul class="pagination pagination-sm project_list_pagination_outline">';
				//logic for setting the prev button
				//condition for escaping the -ve page index when $page = 0
				
				if( ($page-1) < 0 && $page != 0 )
				{
					echo '<li><a class="pagination_arrow" href="'.$pageUrl.'p=0"> <img src="img/pagination_left_arrow.png" /></a></li>';
				}
				elseif( $page != 0 )
				{
					echo '<li><a class="pagination_arrow" href="'.$pageUrl.'p='.($page-1).'"> <img src="img/pagination_left_arrow.png" /></a></li>';
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
						echo '<li><a ';
						//codes for active class
						if( $page == ( $i - 1 ) )
						{
							echo ' class="pagination_active" ';
						}
						echo 'href="'.$pageUrl.'p='.($i-1).'">'.$i.'</a></li>' ;
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
					echo '<li><a class="pagination_arrow" href="'.$pageUrl.'p='.($page + 1).'"><img src="img/pagination_right_arrow.png" /> </a></li>' ;
				}
				//for the last button
				//echo '<li><a href="'.$PageUrl.'?p='.($no_page - 1).'&limit='.$limit.'">Last</a></li>' ;
				echo	 '</ul>
					</span>';
			}
			
		}
		
		/*
		- method for getting current datetime
		- Auth: Dipanjan
		*/
		function getCurrentDateTime()
		{
			$time = date('Y-m-d h:i:s a');
			return $time;
		}
		
		/*
		- method for getting current date
		- Auth: Dipanjan
		*/
		function getCurrentDate()
		{
			$date = date('Y-m-d');
			return $date;
		}
		
		/*
		- method for getting current time
		- Auth: Dipanjan
		*/
		function getCurrentTime()
		{
			$time = date('h:i:s a');
			return $time;
		}
		
		/*
		- method for getting product category list
		- Auth: Dipanjan
		*/
		function getProductCategoryList()
		{
			//get all values
			$list = $this->manage_content->getValueMultipleCondtn('product_category','*',array('status'),array(1));
			if(!empty($list[0]))
			{
				foreach($list as $pro)
				{
					if(empty($pro['parentId']))
					{
						echo '<option value="'.$pro['categoryId'].'">'.$pro['name'].'</option>';
					}
				}
			}
		}
		
		/*
		- method for getting product root category list
		- Auth: Dipanjan
		*/
		function getProductRootCategory()
		{
			//get all root values
			$list = $this->manage_content->getValueMultipleCondtn('product_category','*',array('status'),array(1));
			//echo root category option
			echo '<option value="root">Root Category</option>';
			if(!empty($list[0]))
			{
				foreach($list as $pro)
				{
					if(empty($pro['parentId']))
					{
						echo '<option value="'.$pro['categoryId'].'">'.$pro['name'].'</option>';
					}
				}
			}
		}
		
		/*
		- method for getting list of product
		- Auth: Dipanjan
		*/
		function getProductList()
		{
			//get values from database
			$products = $this->manage_content->getValue('product_info','*');
			if(!empty($products[0]))
			{
				foreach($products as $product)
				{
					//checking for feature product
					$feature = $this->manage_content->getValue_where('feature_product','*','product_id',$product['product_id']);
					if(!empty($feature[0]))
					{
						$feature_status = 'Yes';
					}
					else
					{
						$feature_status = 'No';
					}
					//checking for status
					if($product['status'] == 1)
					{
						$btn = '<button class="btn btn-success">Active</button>';
						$action = '<form action="v-includes/functions/function.product-action.php" method="post">
									<input type="hidden" name="id" value="'.$product['product_id'].'" />
									<input type="hidden" name="action" value="0" />
									<input type="submit" class="btn btn-danger" value="Deactivate" />
								</form>';
					}
					else
					{
						$btn = '<button class="btn btn-danger">Deactive</button>';
						$action = '<form action="v-includes/functions/function.product-action.php" method="post">
									<input type="hidden" name="id" value="'.$product['product_id'].'" />
									<input type="hidden" name="action" value="1" />
									<input type="submit" class="btn btn-success" value="Activate" />
								</form>';
					}
					//checking for video link
					$video = $this->manage_content->getValueMultipleCondtn('product_video','*',array('product_id','status'),array($product['product_id'],1));
					if(empty($video[0]))
					{
						$link_btn = 'Add Link';
					}
					else
					{
						$link_btn = 'Edit Link';
					}
					
					echo '<tr>
							<td>'.$product['name'].'</td>
							<td>'.$this->getValueFromId('product_category','categoryId',$product['category'],'name').'</td>
							<td>'.$product['date'].'</td>
							<td>'.$product['exp_date'].'</td>
							<td>'.$feature_status.'</td>
							<td><a href="product-info.php?pid='.$product['product_id'].'"><button class="btn btn-info">Product Details</button></a></td>
							<td>'.$btn.'</td>  
							<td>'.$action.'</td>  	
						  </tr>';
				}
			}
			else
			{
				echo '<tr>
                      	<td colspan="7">No Result Found</td>          	
                      </tr>';
			}
		}
		
		/*
		- method for getting value from id
		- Auth: Dipanjan
		*/
		function getValueFromId($table_name,$column_name,$column_value,$return_value)
		{
			//get value from database
			$getValue = $this->manage_content->getValue_where($table_name,'*',$column_name,$column_value);
			if(!empty($getValue[0]))
			{
				return $getValue[0][$return_value];
			}
		}
		
		/*
		- method for getting value from table id
		- Auth: Dipanjan
		*/
		function getInformationForEdit($table_name,$column_name,$column_value)
		{
			//get values from database
			$getValue = $this->manage_content->getValue_where($table_name,'*',$column_name,$column_value);
			if(!empty($getValue[0]))
			{
				return $getValue;
			}
		}
		
		/*
		- method for checking that the product is featured or not
		- Auth: Dipanjan
		*/
		function checkFeatureProduct($pid)
		{
			//getting value
			$getValue = $this->manage_content->getValue_where('feature_product','*','product_id',$pid);
			echo '<option value="active"'; if(!empty($getValue[0])) { echo 'selected="selected"'; } echo'>Active</option>
                  <option value="deactive" '; if(empty($getValue[0])) { echo 'selected="selected"'; } echo'>Deactive</option>';
		}
		
		/*
		- method for getting category list
		- Auth: Dipanjan
		*/
		function getCategoryList()
		{
			//getting all root category
			$root = $this->manage_content->getValueMultipleCondtn('product_category','*',array(1),array(1));
			if(!empty($root[0]))
			{
				foreach($root as $parent)
				{
					if(empty($parent['parentId']))
					{
						//getting child element
						$child = explode(',',$parent['childId']);
						if(!empty($parent['childId']))
						{
							$child_no = count($child);
						}
						else
						{
							$child_no = 0;
						}
						//checking for activecategory
						if($parent['active'] == 1)
						{
							$active = 'checked="checked"';
						}
						else
						{
							$active = '';
						}
						//checking for status
						if($parent['status'] == 1)
						{
							$btn = '<a href="v-includes/functions/function.delete-category.php?op=deactivate&id='.$parent['categoryId'].'"><button class="btn btn-danger">Deactivate</button></a>';
						}
						else
						{
							$btn = '<a href="v-includes/functions/function.delete-category.php?op=activate&id='.$parent['categoryId'].'"><button class="btn btn-success">Activate</button></a>';
						}
						echo '<tr>
								<td><input type="checkbox" name="parent_cat[]" class="parent_cat" value="'.$parent['categoryId'].'" '.$active.' />'.$parent['name'].'</td>
								<td>'.$child_no.'</td>
								<td>'.$parent['date'].'</td>
								<td><a href="edit-category.php?id='.$parent['categoryId'].'"><button class="btn btn-primary">Edit</button></a></td>
								<td>'.$btn.'</td>
								<td><a href="v-includes/functions/function.delete-category.php?op=del&id='.$parent['categoryId'].'"><button class="btn btn-danger">Delete</button></a></td>
							</tr>';
						
						//getting child detail
						if($child_no != 0)
						{
							//set category level
							$category_level = 2;
							//calling recursive functoin
							$this->getNestedCategoryList($child,$category_level);
						}
						
					}
				}
			}
		}
		
		/*
		- method for getting nested category list
		- Auth: Dipanjan
		*/
		function getNestedCategoryList($child_element,$category_level)
		{
			foreach($child_element as $child)
			{
				//getting child details
				$child_details = $this->manage_content->getValue_where('product_category','*','categoryId',$child);
				if(!empty($child_details[0]))
				{
					//getting child element
					$nested_child = explode(',',$child_details[0]['childId']);
					if(!empty($child_details[0]['childId']))
					{
						$nested_child_no = count($nested_child);
					}
					else
					{
						$nested_child_no = 0;
					}
					//checking for status
					if($child_details[0]['status'] == 1)
					{
						$btn = '<a href="v-includes/functions/function.delete-category.php?op=deactivate&id='.$child_details[0]['categoryId'].'"><button class="btn btn-danger">Deactivate</button></a>';
					}
					else
					{
						$btn = '<a href="v-includes/functions/function.delete-category.php?op=activate&id='.$child_details[0]['categoryId'].'"><button class="btn btn-success">Activate</button></a>';
					}
					
					
					echo '<tr>';
							//empty td is created which is calculated from category level
							for($i= 1; $i<=($category_level - 1); $i++)
							{
								echo '<td></td>';
							}
					  echo '<td>'.$child_details[0]['name'].'</td>
							<td>'.$nested_child_no.'</td>
							<td>'.$child_details[0]['date'].'</td>
							<td><a href="edit-category.php?id='.$child_details[0]['categoryId'].'"><button class="btn btn-primary">Edit</button></a></td>
							<td>'.$btn.'</td>
							<td><a href="v-includes/functions/function.delete-category.php?op=del&id='.$child_details[0]['categoryId'].'"><button class="btn btn-danger">Delete</button></a></td>
						</tr>';
					//getting child detail
					if($nested_child_no != 0)
					{
						//set category level
						$nested_category_level = $category_level + 1;
						//calling recursive functoin
						$this->getNestedCategoryList($nested_child,$nested_category_level);
					}
				}
			}
		}
		
		/*
		- method for checking product video is added or not
		- Auth: Dipanjan
		*/
		function getProductVideoStatus($product_id)
		{
			//get values from database
			$status = $this->manage_content->getValueMultipleCondtn('product_video','*',array('product_id','status'),array($product_id,1));
			if(!empty($status[0]['video']))
			{
				return $status;
			}
		}
		
		/*
		- method for getting all product list
		- Auth: Dipanjan
		*/
		function getProductNameList()
		{
			//get values from database
			$products = $this->manage_content->getValueMultipleCondtn('product_info','*',array('status'),array(1));
			foreach($products as $product)
			{
				echo '<option value="'.$product['product_id'].'">'.$product['name'].'</option>';
			}
		}
		
		/*
		- method for getting product customization value
		- Auth: Dipanjan
		*/
		function getProductCustomValue($product_id,$specification)
		{
			//get values from database
			$values = $this->manage_content->getValueMultipleCondtn('product_customization','*',array('product_id','specification','status'),array($product_id,$specification,1));
			//getting values in an array
			$value = explode(',',$values[0]['value']);
			
			if(!empty($value))
			{
				foreach($value as $key=>$array_value)
				{
					echo '<input type="text" class="form-control pro_custom_color pull-left" name="pro[]" value="'.$array_value.'"/>
                          <div class="pull-left"><button type="button" class="btn btn-danger btn-sm delete">Delete</button></div>';
				}
			}
		}
		
		/*
		- method for getting product image list
		- Auth: Dipanjan
		*/
		function getProductImageList($pid)
		{
			//getting product image
			$product_list = $this->manage_content->getValueWhereAsc('product_image','*',array('product_id'),array($pid),'img_order');
			if(!empty($product_list[0]))
			{
				foreach($product_list as $pro)
				{
					echo '<div class="col-sm-4 pro_gal_img">
							<img src="../images/product/'.$pro['image'].'" class="img-responsive center-block" />
						</div>';
					
				}
			}
			else
			{
				echo '<div class="col-sm-12">
						<h4 class="page_form_caption" style="color:#000;">No Images Found</h4>
					</div>';
			}
		}
		
		/*
		- method for product basic info
		- Auth: Dipanjan
		*/
		function getProBasicInfo($product_id)
		{
			//getting product info
			$pro_details = $this->manage_content->getValue_where('product_info','*','product_id',$product_id);
			if(!empty($pro_details[0]))
			{
				//getting info about feature product
				$feature = $this->manage_content->getValueMultipleCondtn('feature_product','*',array('product_id','status'),array($product_id,1));
				if(!empty($feature[0]))
				{
					$f_content = 'Yes';
				}
				else
				{
					$f_content = 'No';
				}
				echo '<div class="panel-heading"><i class="fa fa-list fa-fw"></i> Product Basic Info</div>
                        <div class="panel-body">
                        	<div class="pro_info_outline">
                                <div class="pro_info_topic col-sm-3">Name:</div>
                                <div class="pro_info_text col-sm-9">'.$pro_details[0]['name'].'</div>
								<div class="clearfix"></div>
							</div>
							<div class="pro_info_outline">
                                <div class="pro_info_topic col-sm-3">Category:</div>
                                <div class="pro_info_text col-sm-9">'.$this->getValueFromId('product_category','categoryId',$pro_details[0]['category'],'name').'</div>
								<div class="clearfix"></div>
							</div>
							<div class="pro_info_outline">
                                <div class="pro_info_topic col-sm-3">Short Description:</div>
                                <div class="pro_info_text col-sm-9">'.$pro_details[0]['short_description'].'</div>
								<div class="clearfix"></div>
							</div>
							<div class="pro_info_outline">
                                <div class="pro_info_topic col-sm-3">Old Price:</div>
                                <div class="pro_info_text col-sm-9">'.$this->getSystemCurrency('product').$pro_details[0]['old_price'].'</div>
								<div class="clearfix"></div>
							</div>
							<div class="pro_info_outline">
                                <div class="pro_info_topic col-sm-3">Guest Price:</div>
                                <div class="pro_info_text col-sm-9">'.$this->getSystemCurrency('product').$pro_details[0]['guest_price'].'</div>
								<div class="clearfix"></div>
							</div>
							<div class="pro_info_outline">
                                <div class="pro_info_topic col-sm-3">Member Price:</div>
                                <div class="pro_info_text col-sm-9">'.$this->getSystemCurrency('product').$pro_details[0]['member_price'].'</div>
								<div class="clearfix"></div>
							</div>
							<div class="pro_info_outline">
                                <div class="pro_info_topic col-sm-3">Point Value:</div>
                                <div class="pro_info_text col-sm-9">'.$pro_details[0]['point_value'].'</div>
								<div class="clearfix"></div>
							</div>
							<div class="pro_info_outline">
                                <div class="pro_info_topic col-sm-3">Stock:</div>
                                <div class="pro_info_text col-sm-9">'.$pro_details[0]['stock'].'</div>
								<div class="clearfix"></div>
							</div>
							<div class="pro_info_outline">
                                <div class="pro_info_topic col-sm-3">Remaining Stock:</div>
                                <div class="pro_info_text col-sm-9">'.$pro_details[0]['remaining_stock'].'</div>
								<div class="clearfix"></div>
							</div>
							<div class="pro_info_outline">
                                <div class="pro_info_topic col-sm-3">Upload Date:</div>
                                <div class="pro_info_text col-sm-9">'.$pro_details[0]['date'].'</div>
								<div class="clearfix"></div>
							</div>
							<div class="pro_info_outline">
                                <div class="pro_info_topic col-sm-3">Expiry Date:</div>
                                <div class="pro_info_text col-sm-9">'.$pro_details[0]['exp_date'].'</div>
								<div class="clearfix"></div>
							</div>
							<div class="pro_info_outline">
                                <div class="pro_info_topic col-sm-3">Maxpick:</div>
                                <div class="pro_info_text col-sm-9">'.$pro_details[0]['maxpick'].'</div>
								<div class="clearfix"></div>
							</div>
							<div class="pro_info_outline">
                                <div class="pro_info_topic col-sm-3">Feature Product:</div>
                                <div class="pro_info_text col-sm-9">'.$f_content.'</div>
								<div class="clearfix"></div>
							</div>
                        </div>';
			}
		}
		
		/*
		- method for product description
		- Auth: Dipanjan
		*/
		function getProductDescription($product_id)
		{
			//getting product info
			$pro_details = $this->manage_content->getValue_where('product_info','*','product_id',$product_id);
			if(!empty($pro_details[0]))
			{
				echo '<div class="panel-heading"><i class="fa fa-list fa-fw"></i> Product Description</div>
                        <div class="panel-body">'.$pro_details[0]['description'].'</div>';
			}
		}
		
		/*
		- method for full order list
		- Auth: Dipanjan
		*/
		function getFullOrderList()
		{
			//getting values of order placed
			$orderList = $this->manage_content->getValueWhereDesc('order_info','*',array('checkout_process'),array(1),'date');
			if(!empty($orderList[0]))
			{
				foreach($orderList as $order)
				{
					//getting values of billing and shipping
					$order_bill = $this->manage_content->getValueMultipleCondtn('order_shipping_info','*',array('order_id','address_mode'),array($order['order_id'],'Billing'));
					$order_ship = $this->manage_content->getValueMultipleCondtn('order_shipping_info','*',array('order_id','address_mode'),array($order['order_id'],'Shipping'));
					
					echo '<tr>
							<td>'.$order['order_id'].'</td>
							<td>'.$order_bill[0]['f_name'].' '.$order_bill[0]['l_name'].'</td>
							<td>'.$order_ship[0]['f_name'].' '.$order_ship[0]['l_name'].'</td>
							<td>'.$order['date'].'</td>
							<td>'.$this->getPaymentMethod($order['payment_method']).'</td>
							<td>'.$this->getSystemCurrency('product').$order['total_amount'].'</td>
							<td><a href="order-info.php?oid='.$order['order_id'].'"><button class="btn btn-info">Order Details</button></a></td>
						</tr>';
				}
			}
			else
			{
				echo '<tr>
						<td colspan="7">No Result Found</td>
					</tr>';
			}
		}
		
		/*
		- method for order basic info
		- Auth: Dipanjan
		*/
		function getOrderBasicInfo($order_id)
		{
			//get values from database
			$order_details = $this->manage_content->getValueMultipleCondtn('order_info','*',array('order_id'),array($order_id));
			if(!empty($order_details[0]))
			{
				echo '<div class="panel-heading"><i class="fa fa-list fa-fw"></i> Order Basic Info</div>
                        <div class="panel-body">
                        	<div class="pro_info_outline">
                                <div class="pro_info_topic col-sm-3">Order Id:</div>
                                <div class="pro_info_text col-sm-9">'.$order_details[0]['order_id'].'</div>
								<div class="clearfix"></div>
							</div>
							<div class="pro_info_outline">
                                <div class="pro_info_topic col-sm-3">Order By:</div>
                                <div class="pro_info_text col-sm-9">'.$this->getUserFromUserId($order_details[0]['user_id']).'</div>
								<div class="clearfix"></div>
							</div>
							<div class="pro_info_outline">
                                <div class="pro_info_topic col-sm-3">Payment Method:</div>
                                <div class="pro_info_text col-sm-9">'.$this->getPaymentMethod($order_details[0]['payment_method']).'</div>
								<div class="clearfix"></div>
							</div>
							<div class="pro_info_outline">
                                <div class="pro_info_topic col-sm-3">Shipping Charge:</div>
                                <div class="pro_info_text col-sm-9">'.$this->getSystemCurrency('product').$order_details[0]['shipping_charge'].'</div>
								<div class="clearfix"></div>
							</div>
							<div class="pro_info_outline">
                                <div class="pro_info_topic col-sm-3">Total Amount:</div>
                                <div class="pro_info_text col-sm-9">'.$this->getSystemCurrency('product').$order_details[0]['total_amount'].'</div>
								<div class="clearfix"></div>
							</div>
							<div class="pro_info_outline">
                                <div class="pro_info_topic col-sm-3">Purchase On:</div>
                                <div class="pro_info_text col-sm-9">'.$order_details[0]['date'].'</div>
								<div class="clearfix"></div>
							</div>
							<div class="pro_info_outline">
                                <div class="pro_info_topic col-sm-3">Order Status:</div>
                                <div class="pro_info_text col-sm-9">'.$order_details[0]['order_status'].'</div>
								<div class="clearfix"></div>
							</div>
                        </div>';
			}
		}
		
		/*
		- method for get order list according to date
		- Auth: Dipanjan
		*/
		function getOrderFromDateLimit($fromDate,$toDate)
		{
			//defining an empty array which contains order id
			$order_id = array();
			//getting all order list
			$orderList = $this->manage_content->getValueMultipleCondtnDesc('order_info','*',array('checkout_process'),array(1));
			if(!empty($orderList[0]))
			{
				foreach($orderList as $order)
				{
					if(strtotime($toDate.' 23:59:59') >= strtotime($order['date']) && strtotime($order['date']) >= strtotime($fromDate.' 00:00:00') && !in_array($order['order_id'],$order_id))
					{
						array_push($order_id,$order['order_id']);
					}
				}
			}
			//calling the function for showing the list
			$this->getFilteredOrderList($order_id);
		}
		
		/*
		- method for get order list according to product id
		- Auth: Dipanjan
		*/
		function getOrderFromProductId($product_id)
		{
			//defining an empty array which contains order id
			$order_id = array();
			//getting all order list
			$orderList = $this->manage_content->getValueMultipleCondtnDesc('product_inventory_info','*',array('product_id'),array($product_id));
			if(!empty($orderList[0]))
			{
				foreach($orderList as $order)
				{
					//getting order checkout process
					$order_checkout = $this->manage_content->getValueMultipleCondtn('order_info','*',array('order_id','checkout_process'),array($order['order_id'],1));
					if(!empty($order_checkout[0]) && !in_array($order['order_id'],$order_id))
					{
						array_push($order_id,$order['order_id']);
					}
				}
			}
			//calling the function for showing the list
			$this->getFilteredOrderList($order_id);
		}
		
		/*
		- method for get order list according to member
		- Auth: Dipanjan
		*/
		function getOrderOfMember($user_value)
		{
			//defining an empty array which contains order id
			$order_id = array();
			//getting all order list
			$orderList = $this->manage_content->getValueMultipleCondtnDesc('order_info','*',array('checkout_process'),array(1));
			if(!empty($orderList[0]))
			{
				if($user_value == 'Guest')
				{
					foreach($orderList as $order)
					{
						if($order['user_id'] == $user_value && !in_array($order['order_id'],$order_id))
						{
							array_push($order_id,$order['order_id']);
						}
					}
				}
				else if($user_value == 'user')
				{
					foreach($orderList as $order)
					{
						if($order['user_id'] != 'Guest' && !in_array($order['order_id'],$order_id))
						{
							array_push($order_id,$order['order_id']);
						}
					}
				}
			}
			//calling the function for showing the list
			$this->getFilteredOrderList($order_id);
		}
		
		/*
		- method for get order list according to date
		- Auth: Dipanjan
		*/
		function getOrderFromPaymentMethod($payment)
		{
			//defining an empty array which contains order id
			$order_id = array();
			//getting all order list
			$orderList = $this->manage_content->getValueMultipleCondtnDesc('order_info','*',array('checkout_process','payment_method'),array(1,$payment));
			if(!empty($orderList[0]))
			{
				foreach($orderList as $order)
				{
					if(!in_array($order['order_id'],$order_id))
					{
						array_push($order_id,$order['order_id']);
					}
				}
			}
			//calling the function for showing the list
			$this->getFilteredOrderList($order_id);
		}
		
		/*
		- method for get order list
		- Auth: Dipanjan
		*/
		function getFilteredOrderList($order_id)
		{
			if(!empty($order_id[0]))
			{
				foreach($order_id as $key=>$value)
				{
					//getting values of billing and shipping
					$order_details = $this->manage_content->getValueMultipleCondtn('order_info','*',array('order_id',),array($value));
					$order_bill = $this->manage_content->getValueMultipleCondtn('order_shipping_info','*',array('order_id','address_mode'),array($value,'Billing'));
					$order_ship = $this->manage_content->getValueMultipleCondtn('order_shipping_info','*',array('order_id','address_mode'),array($value,'Shipping'));
					
					echo '<tr>
							<td>'.$order_details[0]['order_id'].'</td>
							<td>'.$order_bill[0]['f_name'].' '.$order_bill[0]['l_name'].'</td>
							<td>'.$order_ship[0]['f_name'].' '.$order_ship[0]['l_name'].'</td>
							<td>'.$order_details[0]['date'].'</td>
							<td>'.$this->getPaymentMethod($order_details[0]['payment_method']).'</td>
							<td>'.$this->getSystemCurrency('product').$order_details[0]['total_amount'].'</td>
							<td><a href="order-info.php?oid='.$order_details[0]['order_id'].'"><button class="btn btn-info">Order Details</button></a></td>
						</tr>';
				}
			}
			else
			{
				echo '<tr>
						<td colspan="7">No Result Found</td>
					</tr>';
			}
		}
		
		/*
		- method for order shipping and billing info
		- Auth: Dipanjan
		*/
		function getOrderShipAndBillInfo($order_id,$info_type)
		{
			//get values from database
			$order_details = $this->manage_content->getValueMultipleCondtn('order_shipping_info','*',array('order_id','address_mode'),array($order_id,$info_type));
			if(!empty($order_details[0]))
			{
				echo '<div class="panel-heading"><i class="fa fa-list fa-fw"></i> Order '.$info_type.' Info</div>
                        <div class="panel-body">
                        	<div class="pro_info_outline">
                                <div class="pro_info_topic col-sm-3">Order Id:</div>
                                <div class="pro_info_text col-sm-9">'.$order_details[0]['order_id'].'</div>
								<div class="clearfix"></div>
							</div>
							<div class="pro_info_outline">
                                <div class="pro_info_topic col-sm-3">Name:</div>
                                <div class="pro_info_text col-sm-9">'.$order_details[0]['f_name'].' '.$order_details[0]['l_name'].'</div>
								<div class="clearfix"></div>
							</div>
							<div class="pro_info_outline">
                                <div class="pro_info_topic col-sm-3">Email Id:</div>
                                <div class="pro_info_text col-sm-9">'.$order_details[0]['email_id'].'</div>
								<div class="clearfix"></div>
							</div>
							<div class="pro_info_outline">
                                <div class="pro_info_topic col-sm-3">Address:</div>
                                <div class="pro_info_text col-sm-9">'.$order_details[0]['addr_1'].'<br>'.$order_details[0]['addr_2'].'</div>
								<div class="clearfix"></div>
							</div>
							<div class="pro_info_outline">
                                <div class="pro_info_topic col-sm-3">Contact No:</div>
                                <div class="pro_info_text col-sm-9">'.$order_details[0]['contact_no'].'</div>
								<div class="clearfix"></div>
							</div>
							<div class="pro_info_outline">
                                <div class="pro_info_topic col-sm-3">City:</div>
                                <div class="pro_info_text col-sm-9">'.$order_details[0]['city'].'</div>
								<div class="clearfix"></div>
							</div>
							<div class="pro_info_outline">
                                <div class="pro_info_topic col-sm-3">State:</div>
                                <div class="pro_info_text col-sm-9">'.$order_details[0]['state'].'</div>
								<div class="clearfix"></div>
							</div>
							<div class="pro_info_outline">
                                <div class="pro_info_topic col-sm-3">Country:</div>
                                <div class="pro_info_text col-sm-9">'.$order_details[0]['country'].'</div>
								<div class="clearfix"></div>
							</div>
							<div class="pro_info_outline">
                                <div class="pro_info_topic col-sm-3">Postal Code:</div>
                                <div class="pro_info_text col-sm-9">'.$order_details[0]['postal_code'].'</div>
								<div class="clearfix"></div>
							</div>
                        </div>';
			}
		}
		
		/*
		- method for order product details
		- Auth: Dipanjan
		*/
		function getOrderProductDetails($order_id)
		{
			//get values from database
			$order_details = $this->manage_content->getValueMultipleCondtn('product_inventory_info','*',array('order_id'),array($order_id));
			if(!empty($order_details[0]))
			{
				//initialize counter for total money calculation
				$amount = 0;
				echo '<div class="panel-heading"><i class="fa fa-list fa-fw"></i> Order Project Details</div>
                        <div class="panel-body">
							<div class="table-responsive">
							<table class="table table-bordered tabe-striped">
								<thead>
									<tr>
										<th>Product Name</th>
										<th>Quantity</th>
										<th>Specification</th>
										<th>Amount</th>
									</tr>
								</thead>
								<tbody>';
						
				foreach($order_details as $order)
				{
					echo '<tr>
							<td>'.$this->getProductNameFromId($order['product_id']).'</td>
							<td>'.$order['quantity'].'</td>
							<td>';
					if(!empty($order['specification']))
					{
						$speci = explode(',',$order['specification']);
						foreach($speci as $key=>$value)
						{
							echo $value.'<br>';
						}
					}
							
								
					echo '</td>
						  <td>'.$this->getSystemCurrency('product').$order['price'].'</td>	
						</tr>';
					$amount = $amount + intval($order['price']);
				}
				//grand total
				$total_amount = intval($amount) + intval($this->getShippingCost());
				
				echo '<tr>
						<td colspan="3">Sub Total</td>
						<td>'.$this->getSystemCurrency('product').$amount.'</td>
					</tr>
					<tr>
						<td colspan="3">Shipping Charge</td>
						<td>'.$this->getSystemCurrency('product').($this->getShippingCost()).'</td>
					</tr>
					<tr>
						<td colspan="3"><b>Grand Total</b></td>
						<td>'.$this->getSystemCurrency('product').$total_amount.'</td>
					</tr>';
							
				echo '</tbody>
					</table>
					</div>
					</div>';
			}
		}
		
		/*
		- method for getting order status
		- Auth: Dipanjan
		*/
		function getOrderChangebleStatus($order_id)
		{
			//get values
			$order_details = $this->manage_content->getValueMultipleCondtn('order_info','*',array('order_id'),array($order_id));
			if(!empty($order_details[0]))
			{
				echo '<div class="panel-heading"><i class="fa fa-list fa-fw"></i> Order Status</div>
                        <div class="panel-body">
                        	<div class="pro_info_outline">
                                <div class="pro_info_topic col-sm-3">Order Status:</div>
                                <div class="pro_info_text col-sm-9">'.$order_details[0]['order_status'].'</div>
								<div class="clearfix"></div>
							</div>';
					if(!empty($order_details[0]['notes']))
					{
						echo '<div class="pro_info_outline">
                                <div class="pro_info_topic col-sm-3">Notes:</div>
                                <div class="pro_info_text col-sm-9">'.$order_details[0]['notes'].'</div>
								<div class="clearfix"></div>
							</div>';
					}
				  //calling order status form
				  $this->ChangeStatusForm($order_details);
                  echo    '</div>';
			}
		}
		
		/*
		- method for change status and adding notes form
		- Auth: Dipanjan
		*/
		function ChangeStatusForm($order_details)
		{
			echo '<form role="form" action="v-includes/functions/function.change-order-status.php" method="post" style="margin-top:25px;">
					<div class="form-group">
						<label class="control-label admin_form_label col-sm-3">Order Status</label>
						<div class="col-sm-8">
							<select class="form-control" name="order_status">
								<option value="Processing"'; if($order_details[0]['order_status'] == 'Processing'){ echo 'selected="selected"'; } echo'>Processing</option>
								<option value="Processed"'; if($order_details[0]['order_status'] == 'Processed'){ echo 'selected="selected"'; } echo'>Processed</option>
								<option value="Completed"'; if($order_details[0]['order_status'] == 'Completed'){ echo 'selected="selected"'; } echo'>Order Completed</option>
								<option value="Cancel"'; if($order_details[0]['order_status'] == 'Cancel'){ echo 'selected="selected"'; } echo'>Order Cancel</option>
							</select>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="form-group">
						<label class="control-label admin_form_label col-sm-3">Notes For Order</label>
						<div class="col-sm-8">
							<textarea class="form-control" rows="4" name="notes">';if(isset($order_details[0]['notes'])){ echo $order_details[0]['notes']; } echo '</textarea>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="form-group">
						<div class="col-sm-5 col-sm-offset-3">
							<input type="hidden" name="oid" value="'.$order_details[0]['order_id'].'" />
							<input type="submit" class="btn btn-success btn-lg" value="Submit" />
						</div>
						<div class="clearfix"></div>
					</div>
				</form>';
		}

		/*
		- method for change status and adding notes form
		- Auth: Dipanjan
		*/
		function ChangeMembershipStatusForm($order_details)
		{
			echo '<form role="form" action="v-includes/functions/function.change-membership-order-status.php" method="post" style="margin-top:25px;">
					<div class="form-group">
						<label class="control-label admin_form_label col-sm-3">Order Status</label>
						<div class="col-sm-8">
							<select class="form-control" name="order_status">
								<option value="Processing"'; if($order_details[0]['order_status'] == 'Processing'){ echo 'selected="selected"'; } echo'>Processing</option>
								<option value="Completed"'; if($order_details[0]['order_status'] == 'Completed'){ echo 'selected="selected"'; } echo'>Order Completed</option>
								<option value="Cancel"'; if($order_details[0]['order_status'] == 'Cancel'){ echo 'selected="selected"'; } echo'>Order Cancel</option>
							</select>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="form-group">
						<label class="control-label admin_form_label col-sm-3">Notes For Order</label>
						<div class="col-sm-8">
							<textarea class="form-control" rows="4" name="notes">';if(isset($order_details[0]['notes'])){ echo $order_details[0]['notes']; } echo '</textarea>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="form-group">
						<div class="col-sm-5 col-sm-offset-3">
							<input type="hidden" name="oid" value="'.$order_details[0]['membership_order_id'].'" />
							<input type="submit" class="btn btn-success btn-lg" value="Submit" />
						</div>
						<div class="clearfix"></div>
					</div>
				</form>';
		}

		/*
		- method for getting membership order list
		- Auth: Dipanjan
		*/
		function getMembershipOrderList($order_status)
		{
			//get values from datatbase
			$order_list = $this->manage_content->getValueWhereDesc('membership_order_info', '*', array('order_status'), array($order_status), 'date');
			if(!empty($order_list[0]))
			{
				foreach($order_list as $order)
				{	
					echo '<tr>
							<td>'.$order['membership_order_id'].'</td>
							<td>'.$this->getUserFromUserId($order['user_id']).'</td>
							<td>'.$order['date'].'</td>
							<td>'.$this->getPaymentMethod($order['payment_method']).'</td>
							<td>'.$this->getSystemCurrency('product').$order['amount'].'</td>
							<td><a href="membership-order-info.php?oid='.$order['membership_order_id'].'"><button class="btn btn-info">Order Details</button></a></td>
						</tr>';
				}
			}
			else
			{
				echo '<tr>
						<td colspan="6">No Result Found</td>
					</tr>';
			}
		}

		/*
		- method for membership order basic info
		- Auth: Dipanjan
		*/
		function getMembershipOrderBasicInfo($order_id)
		{
			//get values from database
			$order_details = $this->manage_content->getValueMultipleCondtn('membership_order_info','*',array('membership_order_id'),array($order_id));
			if(!empty($order_details[0]))
			{
				echo '<div class="panel-heading"><i class="fa fa-list fa-fw"></i> Order Basic Info</div>
                        <div class="panel-body">
                        	<div class="pro_info_outline">
                                <div class="pro_info_topic col-sm-3">Order Id:</div>
                                <div class="pro_info_text col-sm-9">'.$order_details[0]['membership_order_id'].'</div>
								<div class="clearfix"></div>
							</div>
							<div class="pro_info_outline">
                                <div class="pro_info_topic col-sm-3">Order By:</div>
                                <div class="pro_info_text col-sm-9">'.$this->getUserFromUserId($order_details[0]['user_id']).'</div>
								<div class="clearfix"></div>
							</div>
							<div class="pro_info_outline">
                                <div class="pro_info_topic col-sm-3">Payment Method:</div>
                                <div class="pro_info_text col-sm-9">'.$this->getPaymentMethod($order_details[0]['payment_method']).'</div>
								<div class="clearfix"></div>
							</div>
							<div class="pro_info_outline">
                                <div class="pro_info_topic col-sm-3">Total Amount:</div>
                                <div class="pro_info_text col-sm-9">'.$this->getSystemCurrency('product').$order_details[0]['amount'].'</div>
								<div class="clearfix"></div>
							</div>
							<div class="pro_info_outline">
                                <div class="pro_info_topic col-sm-3">Purchase On:</div>
                                <div class="pro_info_text col-sm-9">'.$order_details[0]['date'].'</div>
								<div class="clearfix"></div>
							</div>
							<div class="pro_info_outline">
                                <div class="pro_info_topic col-sm-3">Order Status:</div>
                                <div class="pro_info_text col-sm-9">'.$order_details[0]['order_status'].'</div>
								<div class="clearfix"></div>
							</div>
                        </div>';
			}
		}

		/*
		- method for getting membership order status
		- Auth: Dipanjan
		*/
		function getMembershipOrderChangebleStatus($order_id)
		{
			//get values
			$order_details = $this->manage_content->getValueMultipleCondtn('membership_order_info','*',array('membership_order_id'),array($order_id));
			if(!empty($order_details[0]))
			{
				echo '<div class="panel-heading"><i class="fa fa-list fa-fw"></i> Order Status</div>
                        <div class="panel-body">
                        	<div class="pro_info_outline">
                                <div class="pro_info_topic col-sm-3">Order Status:</div>
                                <div class="pro_info_text col-sm-9">'.$order_details[0]['order_status'].'</div>
								<div class="clearfix"></div>
							</div>';
					if(!empty($order_details[0]['notes']))
					{
						echo '<div class="pro_info_outline">
                                <div class="pro_info_topic col-sm-3">Notes:</div>
                                <div class="pro_info_text col-sm-9">'.$order_details[0]['notes'].'</div>
								<div class="clearfix"></div>
							</div>';
					}
				  //calling order status form
				  $this->ChangeMembershipStatusForm($order_details);
                  echo    '</div>';
			}
		}

		/*
		- method for increase user gross amount
		- Auth: Dipanjan
		*/
		function increaseGrossAmount($user_id,$amount)
		{
			//get user profile details
			$user_profile = $this->manage_content->getValue_where('user_profile_info', '*', 'user_id', $user_id);
			$new_gross_amount = $user_profile[0]['gross_amount'] + $amount;
			$new_net_amount = $user_profile[0]['net_amount'] + $amount;
			
			//update user gross amount
			$update_gross = $this->manage_content->updateValueWhere('user_profile_info', 'gross_amount', $new_gross_amount, 'user_id', $user_id);
			$update_net = $this->manage_content->updateValueWhere('user_profile_info', 'net_amount', $new_net_amount, 'user_id', $user_id);
		}

		/*
		- method for getting full member list
		- Auth: Dipanjan
		*/
		function getFullMemberList()
		{
			//getting all members
			$memberList = $this->manage_content->getValue('user_info', '*');
			//defining an empty array in which user id is stored
			$user_id = array();
			if(!empty($memberList[0]))
			{
				foreach($memberList as $member)
				{
					if(!in_array($member['user_id'],$user_id))
					{
						array_push($user_id,$member['user_id']);
					}
				}
			}
			//calling funtion to display the list
			$userList = $this->showMemberList($user_id);
		}

		/*
		- method for showing member list in UI
		- Auth: Dipanjan
		*/
		function showMemberList($user_id)
		{
			if(!empty($user_id))
			{
				foreach($user_id as $key=>$value)
				{
					//get user details
					$userDetails = $this->manage_content->getValue_where('user_info', '*', 'user_id', $value);
					
					if($userDetails[0]['email_verification'] == 1 && $userDetails[0]['membership_activation'] == 1)
					{
						$status = 'Valid Member';
					}
					else
					{
						$status = 'Invalid Member';
					}
					
					echo '<tr>
							<td>'.$value.'</td>
							<td>'.$userDetails[0]['f_name'].' '.$userDetails[0]['l_name'].'</td>
							<td>'.$userDetails[0]['username'].'</td>
							<td>'.$userDetails[0]['email_id'].'</td>
							<td>'.$status.'</td>
							<td><a href="member-info.php?uid='.$value.'"><button class="btn btn-info">Member Details</button></a></td>
						</tr>';
				}
			}
			else
			{
				echo '<tr>
						<td colspan="6">No Member Found</td>
					</tr>';
			}
		}
		
		/*
		- method for getting basic member info
		- Auth: Debojyoti
		*/
		
		function getMemBasicInfo($user_id)
		{
			//getting member info
			$mem_details = $this->manage_content->getValue_where('user_info','*','user_id',$user_id);
			if(!empty($mem_details[0]))
			{
				//get member level details
				$member_level = $this->getMemberLevelDetails($mem_details[0]['member_level']);
				
				echo ' <div class="col-lg-8">
                    <div class="panel panel-default"><div class="panel-heading"><i class="fa fa-list fa-fw"></i> Member Basic Info</div>
                        <div class="panel-body">
                        	<div class="pro_info_outline">
                                <div class="pro_info_topic col-sm-3">Name:</div>
                                <div class="pro_info_text col-sm-9">'.$mem_details[0]['f_name'].'</div>
								<div class="clearfix"></div>
							</div>
							<div class="pro_info_outline">
                                <div class="pro_info_topic col-sm-3">City:</div>
                                <div class="pro_info_text col-sm-9">'.$mem_details[0]['city'].'</div>
								<div class="clearfix"></div>
							</div>
							<div class="pro_info_outline">
                                <div class="pro_info_topic col-sm-3">State:</div>
                                <div class="pro_info_text col-sm-9">'.$mem_details[0]['state'].'</div>
								<div class="clearfix"></div>
							</div>
							<div class="pro_info_outline">
                                <div class="pro_info_topic col-sm-3">Country:</div>
                                <div class="pro_info_text col-sm-9">'.$mem_details[0]['country'].'</div>
								<div class="clearfix"></div>
							</div>
							<div class="pro_info_outline">
                                <div class="pro_info_topic col-sm-3">Phone:</div>
                                <div class="pro_info_text col-sm-9">'.$mem_details[0]['phone'].'</div>
								<div class="clearfix"></div>
							</div>
							<div class="pro_info_outline">
                                <div class="pro_info_topic col-sm-3">Email-Id:</div>
                                <div class="pro_info_text col-sm-9">'.$mem_details[0]['email_id'].'</div>
								<div class="clearfix"></div>
							</div>
							<div class="pro_info_outline">
                                <div class="pro_info_topic col-sm-3">Position:</div>
                                <div class="pro_info_text col-sm-9">'.$member_level[0]['member_category'].'</div>
								<div class="clearfix"></div>
							</div>
						</div>
						</div>
                    <!-- previous page link -->
                   <p class="previous_page_link"><a href="member-list.php">Back To Member List Page</a></p>
                </div>';
			}
		}

		/*
		- method for getting member money info
		- Auth: Debojyoti
		*/
		
		function getMemmoneyInfo($uid)
		{
			echo '<div class="col-lg-8">
					<div class="panel panel-default">
						<div class="panel-heading"><i class="fa fa-list fa-fw"></i> Member Money  Info</div>
						<div class="panel-body">
                    		<div class="table-responsive">
			                    	<table class="table table-bordered tabe-striped">
			                        	<thead>
			                            	<tr>
			                                	<th>No</th>
			                                    <th>Order Id</th>
			                                    <th>Product Name</th>
			                                    <th>Quantity</th>
			                                    <th>Date</th>
			                                    <th>Type</th>
			                                    <th>Amount</th>
			                                </tr>
			                            </thead>';
			                            $user_money=$this->getUserMoneyList($uid);
										$this->getUserTotalMoney($uid);
			                	echo'</table>
			                 </div>
			             </div>
			         </div>
			      </div>';
        }
        
		/*
		- method for getting member points info
		- Auth: Debojyoti
		*/
		
		function getMempointsInfo($user_id)
		{
			echo '<div class="col-sm-12">
            		<div class="row mrgn-btm">
					  <div class="col-sm-8">
					  	<div class="panel panel-default">
					  		<div class="panel-heading"><i class="fa fa-list fa-fw"></i> Member Points Info</div>
					  		<div class="panel-body">
                    			<div class="table-responsive">
                        			<table class="table table-bordered tabe-striped">
                            			<thead>
                                			<tr>
			                                    <th>No.</th>
			                                    <th>Order Id</th>
			                                    <th>Product Name</th>
			                                    <th>Quantity</th>
			                                    <th>Purchased by</th>
			                                    <th>Date</th>
			                                    <th>Point Value</th>	
                                			</tr>
                            			</thead>
                            			<tbody>';
                               			$user_pv = $this->getUserPointValueList($user_id);
										$this->getUserTotalPointValue($user_id); 
	                              echo '</tbody>
		                        	</table>
		                    	</div>
                    		</div>
	               		</div>
	               </div>';
				   
		}

		/*
		- method for getting user money list
		- Auth: Debojyoti
		*/
		
		function getUserMoneyList($uid)
		{
			echo "<tbody>";	
			//get values of user money
			$userMoney = $this->manage_content->getValueLikelyMultiple('user_money_info', '*', array('user_id','specification'), array($uid,'trans'),'DESC',2000);
			//get system currency
			$system_currency = $this->getSystemCurrency('product');
			//get total row
			$userRow = count($userMoney);
			if(!empty($userMoney[0]))
			{
				//initiate serial no variable
				$sl_no = 1;
				foreach($userMoney as $money)
				{
					//getting transaction details
					$trans_details = $this->manage_content->getValueMultipleCondtn('fee_transaction_info', '*', array('transaction_id'),array($money['specification']));
						if(substr($trans_details[0]['order_id'],0,5) == 'order')
						{
							//get order details
							$order_details = $this->manage_content->getValueMultipleCondtn('product_inventory_info', '*', array('order_id','product_id'),array($trans_details[0]['order_id'],$trans_details[0]['product_id']));
							$order_info = $this->manage_content->getValueMultipleCondtn('order_info', '*', array('order_id'),array($trans_details[0]['order_id']));
							//get product name
							$product = $this->manage_content->getValue_where('product_info', '*', 'product_id', $trans_details[0]['product_id']);
							echo '<tr>
	                                <td>'.$sl_no.'</td>
	                                <td><a href="order-info.php?oid='.$trans_details[0]['order_id'].'">'.$trans_details[0]['order_id'].'</a></td>
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
							$mem_order_details = $this->manage_content->getValueMultipleCondtn('membership_order_info', '*', array('order_id'),array($trans_details[0]['order_id']));
							echo '<tr>
	                                <td>'.$sl_no.'</td>
	                                <td><a href="membership-order-info.php?oid='.$trans_details[0][order_id].'">'.$trans_details[0]['order_id'].'</a></td>
	                                <td>Membership</td>
	                                <td>1</td>
	                                <td>'.substr($mem_order_details[0]['date'],0,strpos($mem_order_details[0]['date'], ' ')).'</td>
	                                <td>'.$this->getFeeType($trans_details[0]['fee_type']).'</td>
	                                <td>'.$system_currency.$money['earn_money'].'</td>
	                            </tr>';
						}
					//incrementing serial number by 1
					$sl_no++;
					
				}
			}
			else 
			{
				echo '<tr><td colspan=7 align="center">No result found</td></tr>';
			}
			echo "</tbody>";
		}

		/*
		- method for getting member fee type
		- Auth: Debojyoti
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
		- method for getting member total money
		- Auth: Debojyoti
		*/
		
		function getUserTotalMoney($uid)
		{
			//get system currency
			$system_currency = $this->getSystemCurrency('product');	
			//get user total money
			$grand_total = $this->manage_content->getLastValue('user_money_info', '*', 'user_id', $uid, 'id');
			if(!empty($grand_total[0]))
			{
				//user withdraw money
				$money = $this->manage_content->getValue_where('user_profile_info', '*', 'user_id', $uid);
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
				echo '<tr>
	                    <td class="amt-color" colspan="6" style="text-align: right;">Gross Amount</td>
	                    <td>'.$system_currency.$money[0]['gross_amount'].'</td><!-- echoing total money -->
	                </tr>
	                <tr>
	                    <td class="amt-color" colspan="6" style="text-align: right;">Withdrew Amount</td>
	                    <td>'.$system_currency.$withdraw_money.'</td><!-- echoing withdraw money -->
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
			else
			{
				echo '<tr>
	                    <td class="amt-color" colspan="6" style="text-align: right;">Gross Amount</td>
	                    <td>'.$system_currency.'0</td>
	                </tr>';
			}
		}

		/*
		- method for getting total user points
		- Auth: Debojyoti
		*/
		
		function getUserTotalPointValue($userid)
		{
			//get user total points
			$total_pv = $this->manage_content->getLastValue('user_point_info', '*', 'user_id', $userid, 'id');
			if(!empty($total_pv[0]))
			{
				echo '<tr>
	                    <td class="amt-color" colspan="6" style="text-align: right;">Total Point Value</td>
	                    <td>'.$total_pv[0]['total_pv'].'</td>
	                </tr>';//echoing the value of total points of the member
            }
			else 
			{
				echo '<tr>
                    <td class="amt-color" colspan="6" style="text-align: right;">Total Point Value</td>
                    <td>0</td>
                </tr>';//echoing the value of total points of the member
			}
		}

		/*
		- method for getting user point list
		- Auth: Debojyoti
		*/
		
		function getUserPointValueList($userid)
		{
			//get values of user money
			$userMoney = $this->manage_content->getValueMultipleCondtnDesc('user_point_info', '*', array('user_id'), array($userid));
			//get total row
			$userRow = $this->manage_content->getRowValueMultipleCondition('user_point_info', array('user_id'), array($userid));
			if(!empty($userMoney[0]))
			{
				//initiate serial no variable
				$sl_no = 1;
				foreach($userMoney as $money)
				{
					//getting transaction details
					$trans_details = $this->manage_content->getValueMultipleCondtn('fee_transaction_info', '*', array('transaction_id'),array($money['specification']));
					if(substr($trans_details[0]['order_id'],0,5) == 'order')
						{
							//get order details
							$order_details = $this->manage_content->getValueMultipleCondtn('product_inventory_info', '*', array('order_id','product_id'),array($trans_details[0]['order_id'],$trans_details[0]['product_id']));
							$order_info = $this->manage_content->getValueMultipleCondtn('order_info', '*', array('order_id'),array($trans_details[0]['order_id']));
							//get product name
							$product = $this->manage_content->getValue_where('product_info', '*', 'product_id', $trans_details[0]['product_id']);
							//getting userid from order_info table through orderid and comparing it to $userid of this page
							$id = $this->manage_content->getValue_where('order_info','*','order_id',$trans_details[0]['order_id']);
							if($id[0]['user_id'] == $userid)
							{
								$person="Himself";
							}
							else 
							{
								//getting user details
								$userDetails = $this->manage_content->getValue_where('user_info', '*', 'user_id', $id[0]['user_id']);
								$person = $userDetails[0]['f_name'].' '.$userDetails[0]['l_name'];
							}
							echo '<tr>
	                                <td>'.$sl_no.'</td>
	                                <td>'.$trans_details[0]['order_id'].'</td>
	                                <td>'.$product[0]['name'].'</td>
	                                <td>'.$order_details[0]['quantity'].'</td>
	                                <td>'.$person.'</td>
	                                <td>'.substr($order_info[0]['date'],0,strpos($order_info[0]['date'], ' ')).'</td>
	                                <td>'.$money['earn_pv'].'</td>
	                            </tr>';
						}
					//increment the counter
					$sl_no++;
				}
			}
			else 
			{
				echo '<tr><td colspan=7 align="center">No result found</td></tr>';
			}
			return array($userRow);
		}

		/*
		- method for getting member withdraw info
		- Auth: Debojyoti
		*/
		
		function getMemwithdrawInfo($userid)
		{
			echo '<div class="col-sm-12">
            		<div class="row mrgn-btm">
					  <div class="col-sm-8">
					  	<div class="panel panel-default">
					  		<div class="panel-heading"><i class="fa fa-list fa-fw"></i> Member Withdrawal Info</div>
					  		<div class="panel-body">
                    			<div class="table-responsive">
                        			<table class="table table-bordered tabe-striped">
                            			<thead>
                                			<tr>
			                                    <th>Withdraw Id</th>
			                                    <th>Withdraw Method</th>
			                                    <th>Date</th>
			                                    <th>Amount</th>
			                                    <th>Status</th>	
                                			</tr>
                            			</thead>
                            			<tbody>';
                               			$user_with = $this->getUserWithdrawValueList($userid);
										$this->getUserTotalwithdrawamount($userid); 
								  echo '</tbody>
		                        	</table>
		                    	</div>
                    		</div>
	               		</div>
	               </div>';
		}

		/*
		- method for getting member withdraw info list
		- Auth: Debojyoti
		*/
		
		function getUserWithdrawValueList($userid)
		{
			//get system currency
			$system_currency = $this->getSystemCurrency('product');	
			//get values of user withdrawal
			$userwithdraw = $this->manage_content->getValueMultipleCondtnDesc('withdraw_info', '*', array('user_id'), array($userid));
			//get total row
			$userRow = $this->manage_content->getRowValueMultipleCondition('withdraw_info', array('user_id'), array($userid));
			if(!empty($userwithdraw[0]))
			{
				foreach($userwithdraw as $withdraw)
				{
				
					if($withdraw['status']==0)
					{
						$process="Processing";
					}
					else
					{
						$process="Processed";
					}
					$date=substr($withdraw['date'],0,10);
					echo '<tr>
		                      <td>'.$withdraw['withdraw_id'].'</td>
		                      <td>'.$withdraw['withdraw_method'].'</td>
		                      <td>'.$date.'</td>
		                      <td>'.$system_currency.$withdraw['amount'].'</td>
		                      <td>'.$process.'</td>
	                       </tr>';
				}
			}
			else 
				{
					echo '<tr><td colspan=5 align="center">No result found</td></tr>';
				}
		}

		/*
		- method for getting total withdraw processing money and total withdrawn money
		- Auth: Debojyoti
		*/
		function getUserTotalwithdrawamount($userid)
		{
			//get system currency
			$system_currency = $this->getSystemCurrency('product');		
			//get user total withdraw processing and processed amount
			$total_withdraw = $this->manage_content->getValue_where('user_profile_info', '*', 'user_id', $userid);
			if(!empty($total_withdraw[0]))
			{
				echo '<tr>
	                    <td class="amt-color" colspan="4" style="text-align: right;">Total Withdraw Amount</td>
	                    <td>';
	                    if(empty($total_withdraw[0]['withdraw_amount']))
						{
	                    	echo $system_currency."0";
						}
						else
						{
							//echoing the value of total withdraw amount of the member	
							echo $system_currency.$total_withdraw[0]['withdraw_amount'];
						}
			  echo '</td>
	                </tr>
	                <tr>
	                    <td class="amt-color" colspan="4" style="text-align: right;">Total Withdraw Processing Amount</td>
	                    <td>';
	                    if(empty($total_withdraw[0]['processing_withdraw_amount']))
	                    {
	                    	echo $system_currency."0";
	                    }
						else 
						{
							//echoing the value of total withdraw amount processing of the member	
							echo $system_currency.$total_withdraw[0]['processing_withdraw_amount'];
						}
			  echo '</td>
	                </tr>';
            }
			else 
			{
				echo '<tr>
                    <td class="amt-color" colspan="4" style="text-align: right;">Total Withdraw Amount</td>
                    <td style="text-align: center;">$system_currency0</td>
                </tr><tr>
	                    <td class="amt-color" colspan="4" style="text-align: right;">Total Withdraw Processing Amount</td>
	                    <td>$system_currency0</td>
	                </tr>';
			}
		}

		/*
		- method for getting all orderids of user
		- Auth: Debojyoti
		*/
		function getMemorderIds($userid)
		{
				
			//defining an empty array which contains order id
			$order_id = array();	
			$order_list = $this->manage_content->getValueMultipleCondtnDesc('order_info', 'order_id', array('user_id', 'checkout_process'), array($userid, 1));
			if(!empty($order_list[0]))
			{
				foreach($order_list as $order)
				{
					array_push($order_id,$order['order_id']);
				}
			}
			echo '<div class="col-sm-12">
            		<div class="row mrgn-btm">
					  <div class="col-sm-8">
					  	<div class="panel panel-default">
					  		<div class="panel-heading"><i class="fa fa-list fa-fw"></i> Member Order Info</div>
					  		<div class="panel-body">
                    			<div class="table-responsive table-scroll">
                        			<table class="table table-bordered tabe-striped">
                            			<thead>
                                			<tr>
			                                    <th>Order Id</th>
			                                    <th>Bill To Name</th>
			                                    <th>Ship To Name</th>
			                                    <th>Purchased On</th>
			                                    <th>Method</th>
			                                    <th>Payment Amount</th>	
			                                    <th>Details</th>	
                                			</tr>
                            			</thead>
                            			<tbody>';
                               			//calling the function for showing the list
										$this->getFilteredOrderList($order_id);
								  echo '</tbody>
		                        	</table>
		                    	</div>
                    		</div>
	               		</div>
	               </div>';
		}

		/*
		- method for getting child list of member
		- Auth: Debojyoti
		*/
		function getMemChildList($userid)
		{
			//getting user info
			$user_info = $this->manage_content->getValue_where('user_info', '*', 'user_id', $userid);
			//getting user member level info
			$user_mem_info = $this->getMemberLevelDetails($user_info[0]['member_level']);
			
			echo '<div class="col-lg-8">
                    <div class="panel panel-default"><div class="panel-heading"> Member Child Info</div>
                        <div class="panel-body">
                        	<div class="row">
                        		<div class="col-sm-4">
                        			<div class="img-thumbnail">
                        				<img src="../'.$user_mem_info[0]['image_link'].'" class="img-responsive" />
                        			</div>
                        			<div class="pro_info_outline">
		                                <div class="pro_info_topic txt-lt">'.$user_info[0]['f_name'].' '.$user_info[0]['l_name'].'</div>
		                                <div class="pro_info_text">'.$userid.'</div>
										<div class="clearfix"></div>
									</div>
                        		</div>
                        		<div class="col-sm-2 pad-null">
                        			<div class="ln-indict"></div>
                        		</div>
                        		<div class="col-sm-6 pad-lt-null brdr-lt">';	
			//getting child details from userid
			$child_details = $this->manage_content->getValue_where('user_mlm_info','*','user_id',$userid);
			if(!empty($child_details[0]['child_id']))
			{
				//getting child ids	
				$child_id_array=explode(",",$child_details[0]['child_id']);	
				foreach($child_id_array as $child)
				{
					//getting userid from childid by comparing childid to id	
					$child_user_id = $this->manage_content->getValue_where('user_mlm_info','*','id',$child);
					//getting child info 
					$child_info = $this->manage_content->getValue_where('user_info', '*', 'user_id', $child_user_id[0]['user_id']);
					//getting user member level info
					$child_mem_info = $this->getMemberLevelDetails($child_info[0]['member_level']);
					//getting respective userid of child
					$id=$child_user_id[0]['user_id'];
					//if there is no userid of child a message will be sent with no anchor tagged
					$message=(empty($id)) ? "No USERID found" : "<a href=member-child-info.php?uid=$id><img src=../".$child_mem_info[0]['image_link']." class=img-responsive /></a>" ;
					echo '<div class="row">
                        				<div class="col-sm-5">
                        					<div class="ln-indict"></div>
                        				</div>
                        				<div class="col-sm-6">
                        					<div class="img-thumbnail">
		                        				'.$message.'
		                        			</div>
		                        			<div class="pro_info_outline">
				                                <div class="pro_info_topic txt-lt">'.$child_info[0]['f_name'].' '.$child_info[0]['l_name'].'</div>
				                                <div class="pro_info_text">'.$id.'</div>
												<div class="clearfix"></div>
											</div>
                        				</div>
                        			</div>';
				}
			}
			else
			{
				echo '<div class="row">
                        				<div class="col-sm-5">
                        					<div class="ln-indict"></div>
                        				</div>
                        				<div class="col-sm-6">
                        					<div class="pro_info_outline">
				                                <div class="pro_info_topic txt-lt">NO CHILD</div>
				                            </div>
                        				</div>
                        			</div>';
			}
							echo '</div>
				                </div>
				             </div>
				           </div>
				         </div>';
		}

		/*
		- method for getting order info from processing status
		- Auth: Debojyoti
		*/
		function getOrderFromStatus($user_value)
		{
			//defining an empty array which contains order id
			$order_id = array();
			//getting all order list
			$orderList = $this->manage_content->getValueMultipleCondtnDesc('order_info','*',array('order_status', 'checkout_process'),array($user_value, 1));
			
			if(!empty($orderList[0]))
			{
				foreach($orderList as $order)
				{
					if(!in_array($order['order_id'],$order_id))
					{
						array_push($order_id,$order['order_id']);
					}
				}
			}
			//calling the function for showing the list
			$this->getFilteredOrderList($order_id);
		}

		/*
		- method for getting member level info 
		- Auth: Debojyoti
		*/
		function getMemberLevelInfoList()
		{
			//getting all members
			$memberList = $this->manage_content->getValue('member_level_info', '*');
			if(!empty($memberList[0]))
			{
				foreach($memberList as $member)
				{
					echo '<tr>
							<td>'.$member['member_category'].'</td>
							<td>'.$member['promotion_pv'].'</td>
							<td>'.$member['RF'].'</td>
							<td>'.$member['OF'].'</td>
							<td>'.$member['PC'].'</td>
							<td>'.$member['PS'].'</td>
							<td><a href="member-level-update.php?uid='.$member['id'].'"><button class="btn btn-info">Update Details</button></a></td>
						</tr>';
				}
			}
		}
		
		/*
		- method for updating member level info 
		- Auth: Debojyoti
		*/
		function getMemberLevelDetails($uid)
		{
			//getting all members
			$memberupdList = $this->manage_content->getValue_where('member_level_info', '*', 'member_level', $uid);
			if(!empty($memberupdList[0]))
			{
				return $memberupdList;
			}
		}
		
		/*
		- method for fetching withdrawal info list
		- Auth: Debojyoti
		*/
		function getMembersWithdrawListByStatus($status)
		{
			//getting all members withdraw list
			$memberwithdrawList = $this->manage_content->getValue_where('withdraw_info', '*', 'status', $status);
			$currency = $this->getSystemCurrency('product');
			if(!empty($memberwithdrawList[0]))
			{
				foreach($memberwithdrawList as $withdraw)
				{
					$date=substr($withdraw['date'],0,10);	
					echo '<tr>
							<td>'.$withdraw['withdraw_id'].'</td>
							<td>'.$this->getUserFromUserId($withdraw['user_id']).'</td>
							<td>'.$withdraw['withdraw_method'].'</td>
							<td>'.$currency.$withdraw['amount'].'</td>
							<td>'.$date.'</td>';
							if($status == 0)
							{
								echo '<td><a href="v-includes/functions/function.withdraw-status-update.php?userid='.$withdraw['user_id'].'&amount='.$withdraw['amount'].'&withdraw_id='.$withdraw['withdraw_id'].'"><button class="btn btn-info">Confirm</button></a></td>';
							} 
					echo '</tr>';
				}
			}
			else 
			{
				echo '<tr><td align="center"'; if($status == 0) { echo 'colspan="6"'; } else { echo 'colspan="5"'; } echo '>No Value</td></tr>';
			}
		}
		
		/*
		- method for getting system money info
		- Auth: Riju
		*/
		function getSystemMoneyInfo()
		{
			$credit_amount=0;
			$debit_amount=0;
			$balance = $this->manage_content->getLastValue('system_money_info','*','1','1','id');
			$money = $this->manage_content->getValue('system_money_info','*');
			if(!empty($money[0]))
			{
				foreach($money as $result)
				{
					$credit_amount = $credit_amount + $result['credit'];
					$debit_amount = $debit_amount + $result['debit'];
				}
			}
			return array($balance[0]['system_balance'],$credit_amount,$debit_amount);
		}
		
		/*
		- method for getting mypage list
		- Auth: Dipanjan
		*/
		function getMypageList()
		{
			//get values from database
			$pageList = $this->manage_content->getValue('mypage','*');
			if(!empty($pageList[0]))
			{
				foreach($pageList as $page)
				{
					//getting status
					if($page['status'] == 1)
					{
						$cur_status = '<button class="btn btn-success">Activated</button>';
						$form_Action = '<input type="hidden" name="id" value="'.$page['page_id'].'" />
										<input type="hidden" name="status" value="0" />
										<input type="hidden" name="action" value="UPDATE" />
										<input type="submit" name="sub" class="btn btn-danger" value="Deactivate" />';
					}
					else
					{
						$cur_status = '<button class="btn btn-danger">Deactivated</button>';
						$form_Action = '<input type="hidden" name="id" value="'.$page['page_id'].'" />
										<input type="hidden" name="status" value="1" />
										<input type="hidden" name="action" value="UPDATE" />
										<input type="submit" name="sub" class="btn btn-success" value="Activate" />';
					}
					//showing the result
					echo '<tr>
							<td>'.$page['page_id'].'</td>
							<td>'.$page['page_name'].'</td>
							<td><a href="addPage.php?id='.$page['page_id'].'&action=edit"><button class="btn btn-info">Edit Details</button></a></td>
							<td>'.$cur_status.'</td>
							<td>
								<form action="v-includes/functions/function.addPage.php" method="post">
									
									'.$form_Action.'
								</form>
							</td>
							<td>
								<form action="v-includes/functions/function.delete-page.php" method="post">
								<input type = "hidden" name = "id"	value ="'.$page['page_id'].'" />
								<input type="submit" name="sub" class="btn btn-danger" value="DELETE" />
								</form>
							</td>
						</tr>';
				}
			}
		}
		
		/*
		- method for getting mypage details
		- Auth: Dipanjan
		*/
		function getMyPageDetails($id)
		{
			//get values from database
			$pageValue = $this->manage_content->getValue_where('mypage','*','page_id',$id);
			if(!empty($pageValue[0]))
			{
				echo '<div class="panel-heading"><i class="fa fa-edit fa-fw"></i> Edit MyPage Details</div>
                        <div class="panel-body">
                        	<form action="v-includes/functions/function.addPage.php" role="form" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="control-label p_label col-sm-3">Page Title</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="name" value="'.$pageValue[0]['page_name'].'"/>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label p_label col-sm-3">Page Description</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="des" id="editor1">'.$pageValue[0]['page_content'].'</textarea>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                 <div class="form-group">
                                    <label class="control-label p_label col-sm-3">Banner Description</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="banner_des">'.$pageValue[0]['page_banner_desc'].'</textarea>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label p_label col-sm-3">Banner Image Present</label>';
                                    if(!empty($pageValue[0]['image']))
									{
                                    echo '<div class="col-sm-4">
                                        <img src="../images/'.$pageValue[0]['image'].'" class="img-responsive center-block" />';
                                    }  
									else
									{
										echo '<div class="col-sm-9">
													<span class="page_form_caption" style="color:#000;">NoImage.jpg</span>';	
									}		 
                                    echo '</div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label p_label col-sm-3">Update Image</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label p_label col-sm-3">Status</label>
                                    <div class="col-sm-4">
                                        <select name="status" class="form-control">
                                        	<option value="1"'; if($pageValue[0]['status'] == 1) { echo 'selected="selected"'; } echo '>Active</option>
                                            <option value="0"'; if($pageValue[0]['status'] == 0) { echo 'selected="selected"'; } echo '>Deactive</option>
                                        </select>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-7 col-sm-offset-3">
                                    	<input type="hidden" name="id" value="'.$pageValue[0]['page_id'].'" />
										<input type="hidden" name="action" value="UPDATE" />
                                        <input type="submit" class="btn btn-success btn-lg" value="UPDATE" />
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>';
			}
		}

		/*
		- method for getting category details from id
		- Auth: Dipanjan
		*/
		function getCategoryDetailsFromId($cat)
		{
			return $this->manage_content->getValue_where('product_category', '*', 'categoryId', $cat);
		}

		/*
		- method for getting pool sharing details
		- Auth: Dipanjan
		*/
		function getPoolShareDetails()
		{
			//get info from database
			$poolshare = $this->manage_content->getLastValue('pool_sharing_info', '*', 1, 1, 'id');
			if(!empty($poolshare[0]))
			{
				//checking that next date is greter than today or not
				if(strtotime(date('Y-m-d h:m:s a')) > strtotime($poolshare[0]['next_date']))
				{
					echo '<p>You can pool share system point value</p>
                        	<form action="v-includes/functions/function.pool-share.php" method="post">
                        		<input type="submit" class="btn btn-lg btn-success" value="POOL SHARE" />
                        	</form>';
				}
				else
				{
					echo '<p>Your next date of pool sharing is '.$poolshare[0]['next_date'].'</p>';
				}
					
			}
			else
			{
				//get total pv in the system
				$system_pv = $this->manage_content->getLastValue('system_pv_info', '*', 1, 1, 'id');
				if($system_pv[0]['system_pv_balance'] > 0)
				{
					echo '<p>You can pool share system point value</p>
                        	<form action="v-includes/functions/function.pool-share.php" method="post">
                        		<input type="submit" class="btn btn-lg btn-success" value="POOL SHARE" />
                        	</form>';
				}
				else
				{
					echo $system_pv[0]['system_pv_balance'];
					echo '<p>Your system point value is insufficient</p>';
				}
			}
				
		}

		/*
		- method for getting pool sharing list
		- Auth: Dipanjan
		*/
		function getPoolShareList()
		{
			$poolshare = $this->manage_content->getValue_where('pool_sharing_info', '*', 1, 1);
			if(!empty($poolshare[0]))
			{
				foreach($poolshare as $pool)
				{
					echo '<tr>
							<td>'.$pool['specification'].'</td>
							<td>'.$pool['distributed_pv'].'</td>
							<td>'.$pool['date_from'].'</td>
							<td>'.$pool['date_to'].'</td>
							<td>'.$pool['distributed_date'].'</td>
						</tr>';
				}
			}
			else
			{
				echo '<tr>
						<td colspan="5">No Details Found</td>
					</tr>';
			}
		}

		/*
		- method for getting membership product price
		- Auth: Riju
		*/
		function getMemProductPrice()
		{
			$price = $this->manage_content->getValue_where('membership_info', '*', 'id', 1);
			return $price[0]['price'];
		}
		
		/*
		- method for getting mypage link list
		- Auth: Debojyoti 
		*/
		function getMypageLinkList()
		{
			//get values from database
			$pageLinkList = $this->manage_content->getValue('mypage_links','*');
			if(!empty($pageLinkList[0]))
			{
				foreach($pageLinkList as $pagelink)
				{
					//getting status
					if($pagelink['status'] == 1)
					{
						$cur_status = '<button class="btn btn-success">Activated</button>';
					}
					else
					{
						$cur_status = '<button class="btn btn-danger">Deactivated</button>';
					}
					//showing the result
					echo '<tr>
							<td>'.$pagelink['name'].'</td>
							<td>'.$pagelink['page_link'].'</td>';
							if($pagelink['top_links'] == 1)
							{
								$top = 'ON';
							}
							else
							{
								$top = 'OFF';	
							}
							if($pagelink['navbar_links'] == 1)
							{
								$nav = 'ON';
							}
							else
							{
								$nav = 'OFF';	
							}
							if($pagelink['footer_links'] == 1)
							{
								$footer = 'ON';
							}
							else
							{
								$footer = 'OFF';	
							}
					  echo '<td>'.$top.'</td>
							<td>'.$nav.'</td>
							<td>'.$footer.'</td>
							<td><a href="addPageLink.php?id='.$pagelink['id'].'&action=edit"><button class="btn btn-info">Edit</button></a></td>
							<td>'.$cur_status.'</td>
							<td>
								<form action="v-includes/functions/function.delete-page-link.php" method="post">
								<input type = "hidden" name = "id"	value ="'.$pagelink['id'].'" />
								<input type="submit" name="sub" class="btn btn-danger" value="DELETE" />
								</form>
							</td>
						</tr>';
				}
			}
		}
		/*
		- method for updating page link details
		- Auth: Debojyoti
		*/
		function getMyPageLinkDetails($id)
		{
			//get values from database
			$pageValue = $this->manage_content->getValue_where('mypage_links','*','id',$id);
			if(!empty($pageValue[0]))
			{
				echo '<div class="panel-heading"><i class="fa fa-edit fa-fw"></i> Edit MyPage Link Details</div>
                        <div class="panel-body">
                        	<form action="v-includes/functions/function.add-page-link.php" role="form" method="post">
                                <div class="form-group">
                                    <label class="control-label p_label col-sm-3">Page Name</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="pgname" value="'.$pageValue[0]['name'].'"/>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label p_label col-sm-3">Page Link</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="pglink">'.$pageValue[0]['page_link'].'</textarea>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label p_label col-sm-3">Top Link</label>
                                    <div class="col-sm-4">
                                        <select name="toplink" class="form-control">
                                        	<option value="1"'; if($pageValue[0]['top_links'] == 1) { echo 'selected="selected"'; } echo '>ON</option>
                                            <option value="0"'; if($pageValue[0]['top_links'] == 0) { echo 'selected="selected"'; } echo '>OFF</option>
                                        </select>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label p_label col-sm-3">Navbar</label>
                                    <div class="col-sm-4">
                                        <select name="navbar" class="form-control">
                                        	<option value="1"'; if($pageValue[0]['navbar_links'] == 1) { echo 'selected="selected"'; } echo '>ON</option>
                                            <option value="0"'; if($pageValue[0]['navbar_links'] == 0) { echo 'selected="selected"'; } echo '>OFF</option>
                                        </select>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label p_label col-sm-3">Footer Link</label>
                                    <div class="col-sm-4">
                                        <select name="footerlink" class="form-control">
                                        	<option value="1"'; if($pageValue[0]['footer_links'] == 1) { echo 'selected="selected"'; } echo '>ON</option>
                                            <option value="0"'; if($pageValue[0]['footer_links'] == 0) { echo 'selected="selected"'; } echo '>OFF</option>
                                        </select>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label p_label col-sm-3">Status</label>
                                    <div class="col-sm-4">
                                        <select name="status" class="form-control">
                                        	<option value="1"'; if($pageValue[0]['status'] == 1) { echo 'selected="selected"'; } echo '>Active</option>
                                            <option value="0"'; if($pageValue[0]['status'] == 0) { echo 'selected="selected"'; } echo '>Deactive</option>
                                        </select>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-7 col-sm-offset-3">
                                    	<input type="hidden" name="id" value="'.$pageValue[0]['id'].'" />
										<input type="hidden" name="action" value="UPDATE" />
                                        <input type="submit" class="btn btn-success btn-lg" value="UPDATE" />
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>';
			}
		}
		
	}
	
?>