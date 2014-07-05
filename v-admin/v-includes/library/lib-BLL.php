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
			$this->manage_content = new ManageContent_DAL();
			return $this->manage_content;
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
							<td><a href="product-video.php?pid='.$product['product_id'].'"><button class="btn btn-warning">'.$link_btn.'</button></a></td>
							<td><a href="edit-product.php?pid='.$product['product_id'].'"><button class="btn btn-info">Edit Details</button></a></td>
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
	}
	
?>