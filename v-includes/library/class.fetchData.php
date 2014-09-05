<?php
	session_start();
	//include the DAL library to use the model layer methods
	include 'library.DAL.php';
	//include utility class
	include 'class.utility.php';
	//include mail class
	include 'class.mail.php';
	
	//class for fetching data of ajax request
	class fetchData
	{
		public $manageContent;
		public $manageUtility;
		public $manageMail;
		
		/*
		- method for constructing DAL, Utility, Mail class
		- Auth: Dipanjan
		*/	
		function __construct()
		{
			$this->manageContent = new DAL_Library();
			$this->manageUtility = new utility();
			$this->manageMail = new mailFunction();
		}
		
		/*
		- method for getting unique username
		- Auth: Dipanjan
		*/
		function getUniqueItem($userData,$category)
		{
			//get values from database
			if($category == 'username')
			{
				$getValues = $this->manageContent->getValue_where('user_info','*','username',$userData['username']);
			}
			else if($category == 'email')
			{
				$getValues = $this->manageContent->getValue_where('user_info','*','email_id',$userData['email']);
			}
			if(!empty($getValues[0]))
			{
				echo 1;
			}
			else
			{
				echo 0;
			}
		}
		
		/*
		- method for checking referral user
		- Auth: Dipanjan
		*/
		function checkReferralUser($userData)
		{
			//get values from database
			$getValues = $this->manageContent->getValue_where('user_info','*', 'user_id', $userData['ref_user']);
			if(!empty($getValues[0]) && $getValues[0]['member_level'] != 0)
			{
				echo 1;
			}
			else 
			{
				echo 0;
			}
		}
		
		/*
		- method for inserting billing info
		- Auth: Dipanjan
		*/
		function insertBillingInfo($userData)
		{
			//checking for order id
			if(!isset($_SESSION['order_id']))
			{
				//create order id
				$order_id = uniqid('order');
				$_SESSION['order_id'] = $order_id;
			}
			else
			{
				$order_id = $_SESSION['order_id'];
			}
			//checking that order id is present or not
			$order = $this->manageContent->getValue_where('order_info','*','order_id',$order_id);
			if(empty($order[0]['order_id']))
			{
				//insert the values in order info table
				$column_name = array('order_id','user_id');
				$column_value = array($order_id,$_SESSION['user_id']);
				$insert = $this->manageContent->insertValue('order_info',$column_name,$column_value);
				
				//insert values in order shipping info table
				$column_name_bill = array('order_id','f_name','l_name','addr_1','addr_2','email_id','contact_no','postal_code','city','state','country','address_mode');
				
				$column_value_bill = array($order_id,$userData['f_name'],$userData['l_name'],$userData['addr1'],$userData['addr2'],$userData['email_id'],$userData['phone'],$userData['postal_code'],$userData['city'],$userData['state'],$userData['country'],'Billing');
				$insert_bill = $this->manageContent->insertValue('order_shipping_info',$column_name_bill,$column_value_bill);
				
			}
			else
			{
				//updating order table
				$update_order = $this->manageContent->updateMultipleValueOneCondition('order_info',array('user_id','order_status'),array($_SESSION['user_id'],$order_status),'order_id',$order_id);
				//update the values
				$update_column_name_bill = array('f_name','l_name','addr_1','addr_2','email_id','contact_no','postal_code','city','state','country');
				$update_column_value_bill = array($userData['f_name'],$userData['l_name'],$userData['addr1'],$userData['addr2'],$userData['email_id'],$userData['phone'],$userData['postal_code'],$userData['city'],$userData['state'],$userData['country']);
				$update_bill = $this->manageContent->updateMultipleValueMulCondition('order_shipping_info',$update_column_name_bill,$update_column_value_bill,array('order_id','address_mode'),array($order_id,'Billing'));
				
			}
		}
		
		/*
		- method for inserting shipping info
		- Auth: Dipanjan
		*/
		function insertShippingInfo($userData)
		{
			$order_id = $_SESSION['order_id'];
			//checking that shipping value is present or not
			$ship = $this->manageContent->getValueMultipleCondtn('order_shipping_info','*',array('order_id','address_mode'),array($order_id,'Shipping'));
			if(empty($ship[0]))
			{
				//insert values in order shipping info table
				$column_name_ship = array('order_id','f_name','l_name','addr_1','addr_2','email_id','contact_no','postal_code','city','state','country','address_mode');
				
				$column_value_ship = array($order_id,$userData['f_name'],$userData['l_name'],$userData['addr1'],$userData['addr2'],$userData['email_id'],$userData['phone'],$userData['postal_code'],$userData['city'],$userData['state'],$userData['country'],'Shipping');
				$insert_ship = $this->manageContent->insertValue('order_shipping_info',$column_name_ship,$column_value_ship);
			}
			else
			{
				//update the values
				$update_column_name_ship = array('f_name','l_name','addr_1','addr_2','email_id','contact_no','postal_code','city','state','country');
				$update_column_value_ship = array($userData['f_name'],$userData['l_name'],$userData['addr1'],$userData['addr2'],$userData['email_id'],$userData['phone'],$userData['postal_code'],$userData['city'],$userData['state'],$userData['country']);
				$update_ship = $this->manageContent->updateMultipleValueMulCondition('order_shipping_info',$update_column_name_ship,$update_column_value_ship,array('order_id','address_mode'),array($order_id,'Shipping'));
			}
		}
		
		/*
		- method for inserting shipping charge
		- Auth: Dipanjan
		*/
		function insertShippingCharge($userData)
		{
			//get shipping charges
			$ship = $this->manageContent->getValue_where('shipping_cost_info','*','id',1);
			//updating shipping cost
			$update = $this->manageContent->updateMultipleValueMulCondition('order_info',array('shipping_charge'),array($ship[0]['shipping_cost']),array('order_id','user_id'),array($_SESSION['order_id'],$_SESSION['user_id']));
		}
		
		/*
		- method for inserting payment info
		- Auth: Dipanjan
		*/
		function insertPaymentInfo($userData)
		{
			//get the payment method
			$payment_method = $userData['payment_info'];
			//update value
			$update = $this->manageContent->updateMultipleValueMulCondition('order_info',array('payment_method'),array($payment_method),array('order_id','user_id'),array($_SESSION['order_id'],$_SESSION['user_id']));
		}
		
		/*
		- method for inserting final order info
		- Auth: Dipanjan
		*/
		function insertFinalOrderInfo($userData)
		{
			//getting order details in a string to send in email
			$order_details = "";	
			//inserting values to product inventory system
			//initialize total amount variable
			$total_amount = 0;
			//setting order status
			$order_status = 'Processing';
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
				$pro_details = $this->manageContent->getValue_where('product_info','*','product_id',$pid);
				
				if(!empty($pro_details[0]))
				{
					//getting usre price
					$user_price = $pro_details[0][$this->getUserPrice()];
					//getting total amount
					$amount = $quantity * intval($user_price);
					//initialize a variable for specification
					$pro_speci = '';
					if($maxSpeciLength != 0)
					{
						for($j=1; $j<=$maxSpeciLength; $j++)
						{
							$pro_speci = $pro_speci.','.substr(strrchr($allValue[(2*$j)],'='),1).':'.substr(strrchr($allValue[(2*$j)+1],'='),1);
						}
						$pro_speci = substr($pro_speci,1);
					}
					//insert value
					$column_name = array('order_id','product_id','quantity','specification','price');
					$column_value = array($_SESSION['order_id'],$pid,$quantity,$pro_speci,$amount);
					$insert = $this->manageContent->insertValue('product_inventory_info',$column_name,$column_value);
					
				}
				//calculating total amount
				$total_amount = $total_amount + $amount;
				/* decreasing product quantity from stock */
				$decreament = $this->manageContent->decreamentValue('product_info','remaining_stock',intval($quantity),'product_id',$pid);
				//initializing string data to send to class.mail.php
				$product_specifications = str_replace(',', '<br>', $pro_speci);
				$order_details = $order_details."<tr>
									<td>".$pro_details[0]['name']."</td>
									<td>".$product_specifications."</td>
									<td>".$user_price."</td>
									<td>".$quantity."</td>
									<td>".$amount."</td>
								  </tr>";	
			}//end of for loop
			//updating order table
			$grand_total = $_SESSION['total_amount'];
			$date = date('Y-m-d h:m:s a');
			$pro_value = explode(':',$GLOBALS['_COOKIE'][$_SESSION['user_id']]);
			$total_quantity = $pro_value[0];
			$ip = $this->manageUtility->getIpAddress();
			//update the values
			$update = $this->manageContent->updateMultipleValueMulCondition('order_info',array('total_amount','total_quantity','date','ip','order_status','checkout_process'),array($grand_total,$total_quantity,$date,$ip,$order_status,1),array('order_id','user_id'),array($_SESSION['order_id'],$_SESSION['user_id']));
			//getting shipping charge
			$order_info = $this->manageContent->getValueMultipleCondtn('order_info', '*',array('order_id','user_id'),array($_SESSION['order_id'],$_SESSION['user_id']));
			//getting username and user emailid
			$user_info = $this->manageContent->getValue_where('user_info', '*', 'user_id', $_SESSION['user_id']);
			$userEmailId = $user_info[0]['email_id'];
			$userName = $user_info[0]['f_name']." ".$user_info[0]['l_name'];
			//sending final data string to email
			$order_details = $order_details."<tr>
												<td style='colspan:4'>Subtotal</td>
												<td>".$total_amount."</td>
											 </tr>
											 <tr>	 
												<td style='colspan:4'>
												Shipping & Handling Charges(Shipment Will Deliver Shortly. Working days does not include Sat and Sun
												</td>
												<td>".$order_info[0]["shipping_charge"]."</td>
											 </tr>
											 <tr>
											 	<td style='colspan:4'>Grand Total</td>	
												<td>".$grand_total."</td>
											 </tr>";
			//calling method from class.mail.php								 
			$this->manageMail->mailForproductPurchase($order_details,$userName,$userEmailId);
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
			
	}
	
	/* receiving data from UI layer Form */
	//making object of class fetchData 
	$fetchData = new fetchData();
	//applying switch case
	switch($GLOBALS['_POST']['refData'])
	{
		//for unique username checking
		case 'usernameChecking':
		{
			$usernameChecking = $fetchData->getUniqueItem($GLOBALS['_POST'],'username');
			break;
		}
		//for unique email checking
		case 'emailChecking':
		{
			$emailChecking = $fetchData->getUniqueItem($GLOBALS['_POST'],'email');
			break;
		}
		//for referral id checking
		case 'referralChecking':
		{
			$referralUserChecking = $fetchData->checkReferralUser($GLOBALS['_POST']);
			break;
		}
		//for inserting billing info
		case 'billing_info':
		{
			//inserting values to order table
			$insertBill = $fetchData->insertBillingInfo($GLOBALS['_POST']);
			break;
		}
		//for inserting shipping info
		case 'shipping_info':
		{
			//inserting values to order table
			$insertShip = $fetchData->insertShippingInfo($GLOBALS['_POST']);
			break;
		}
		//for inserting shipping charge info
		case 'shipping_charge_info':
		{
			//inserting values to order table
			$insertShipCharge = $fetchData->insertShippingCharge($GLOBALS['_POST']);
			break;
		}
		//for inserting payment info
		case 'payment_info':
		{
			//inserting values to order table
			$insertPaymentInfo = $fetchData->insertPaymentInfo($GLOBALS['_POST']);
			break;
		}
		//for final order info
		case 'final_order_info':
		{
			//inserting values to order table
			$FinalOrder = $fetchData->insertFinalOrderInfo($GLOBALS['_POST']);
			break;
		}
		default:
		{
			break;	
		}
	}

?>