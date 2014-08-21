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
					}
					else
					{
						$btn = '<button class="btn btn-danger">Deactive</button>';
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
			$root = $this->manage_content->getValueMultipleCondtn('product_category','*',array('status'),array(1));
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
							$btn = '<button class="btn btn-success">Active</button>';
						}
						else
						{
							$btn = '<button class="btn btn-danger">Deactive</button>';
						}
						echo '<tr>
								<td><input type="checkbox" name="parent_cat[]" class="parent_cat" value="'.$parent['categoryId'].'" '.$active.' />'.$parent['name'].'</td>
								<td>'.$child_no.'</td>
								<td>'.$parent['date'].'</td>
								<td>'.$btn.'</td>
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
						$btn = '<button class="btn btn-success">Active</button>';
					}
					else
					{
						$btn = '<button class="btn btn-danger">Deactive</button>';
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
							<td>'.$btn.'</td>
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
						<td>'.$this->getSystemCurrency('product').($amount + intval($this->getShippingCost())).'</td>
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
	}
	
?>