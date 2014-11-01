<?php
	session_start();
	//include DAL file
	include '../library/library.DAL.php';
	$manageData = new DAL_Library();
	
	//include class mail
	include '../library/class.mail.php';
	$mail = new mailFunction();
	
	//include utility class
	include '../library/class.utility.php';
	$utility = new utility();
	
	switch($GLOBALS['_GET']['action'])
	{
		case md5('order_success'):
		{
			/* code for final order info insertion */
			//getting system currency	
			$system_currency = $manageData->getValue_where('system_currency', '*', 'field', 'product');
			//get user price
			if(substr($_SESSION['user_id'],0,4) == 'user')
			{
				$price = 'member_price';
			}
			else
			{
				$price = 'guest_price';
			}
			//getting order details in a string to send in email
			$order_details = "";	
			//inserting values to product inventory system
			//initialize total amount variable
			$total_amount = 0;
			//setting order status
			$order_status = 'Processed';
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
				$pro_details = $manageData->getValue_where('product_info','*','product_id',$pid);
				
				if(!empty($pro_details[0]))
				{
					//getting usre price
					$user_price = $pro_details[0][$price];
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
					$insert = $manageData->insertValue('product_inventory_info',$column_name,$column_value);
					
				}
				//calculating total amount
				$total_amount = $total_amount + $amount;
				/* decreasing product quantity from stock */
				$decreament = $manageData->decreamentValue('product_info','remaining_stock',intval($quantity),'product_id',$pid);
				//initializing string data to send to class.mail.php
				$product_specifications = str_replace(',', '<br>', $pro_speci);
				$order_details = $order_details.'<tr style="text-align: center;">
							<td style="border: 1px solid #E4E4E4;padding: 5px;">'.$pro_details[0]["name"].'</td>
							<td style="border: 1px solid #E4E4E4;padding: 5px;">'.$product_specifications.'</td>
							<td style="border: 1px solid #E4E4E4;padding: 5px;">'.$system_currency[0]['currency'].$user_price.'</td>
							<td style="border: 1px solid #E4E4E4;padding: 5px;">'.$quantity.'</td>
							<td style="border: 1px solid #E4E4E4;padding: 5px;">'.$system_currency[0]['currency'].$amount.'</td>
						</tr>';	
			}//end of for loop
			
			//updating order table
			$grand_total = $_SESSION['total_amount'];
			$date = date('Y-m-d h:m:s a');
			$pro_value = explode(':',$GLOBALS['_COOKIE'][$_SESSION['user_id']]);
			$total_quantity = $pro_value[0];
			$ip = $utility->getIpAddress();
			//update the values
			$update = $manageData->updateMultipleValueMulCondition('order_info',array('total_amount','total_quantity','date','ip','order_status','checkout_process'),array($grand_total,$total_quantity,$date,$ip,$order_status,1),array('order_id','user_id'),array($_SESSION['order_id'],$_SESSION['user_id']));
			//getting shipping charge
			$order_info = $manageData->getValueMultipleCondtn('order_info', '*',array('order_id','user_id'),array($_SESSION['order_id'],$_SESSION['user_id']));
			//getting username and user emailid
			$user_info = $manageData->getValueMultipleCondtn('order_shipping_info', '*',array('order_id','address_mode'),array($_SESSION['order_id'],'Billing'));
			$userEmailId = $user_info[0]['email_id'];
			$userName = $user_info[0]['f_name']." ".$user_info[0]['l_name'];
			//sending final data string to email
			$order_details = $order_details."<tr>
												<td colspan='4' style='border: 1px solid #E4E4E4;text-align: center;'>Subtotal</td>
												<td style='border: 1px solid #E4E4E4;padding: 5px;'>".$system_currency[0]['currency'].$total_amount."</td>
											 </tr>
											 <tr>	 
												<td colspan='4' style='border: 1px solid #E4E4E4;text-align: center;'>
												Shipping & Handling Charges(Shipment Will Deliver Shortly. Working days does not include Sat and Sun)
												</td>
												<td style='border: 1px solid #E4E4E4;padding: 5px;'>".$system_currency[0]['currency'].$order_info[0]["shipping_charge"]."</td>
											 </tr>
											 <tr>
											 	<td colspan='4' style='border: 1px solid #E4E4E4;text-align: center;'>Grand Total</td>	
												<td  style='border: 1px solid #E4E4E4;padding: 5px;'>".$system_currency[0]['currency'].$grand_total."</td>
											 </tr>";
			//calling method from class.mail.php								 
			$mail->mailForproductPurchase($order_details,$userName,$userEmailId,$_SESSION['order_id']);
			/* code for final order info insertion ends */
			
			header("Location: ../../purchased/");
			break;
		}
		case md5('order_decline'):
		{
			//set get value for cancel payment
			header("Location: ../../cancel-payment.php?fn=paypal_cancel");
			break;
		}
		case md5('mem_order_success'):
		{
			//create membership order id
			$mem_order_id = uniqid('mem_order');
			$membership_details = $manageData->getValue_where('membership_info', '*', 'status', 1);
			$amount = $membership_details[0]['price'];
			$date = date('Y-m-d h:m:s a');
			$ip = $utility->getIpAddress();
			$order_status = 'Processing';
			
			$column_name = array('membership_order_id','membership_id','user_id','payment_method','amount','date','ip','order_status');
			$column_value = array($mem_order_id,$membership_details[0]['membership_id'],$_SESSION['user_id'],'online',$amount,$date,$ip,$order_status);
			$insert = $manageData->insertValue('membership_order_info', $column_name, $column_value);
			
			//getting userinfo
			$userinfo = $manageData->getValue_where('user_info', '*', 'user_id', $_SESSION['user_id']);
			$username = $userinfo[0]['f_name'].' '.$userinfo[0]['l_name'];
			$userEmailId = $userinfo[0]['email_id'];
			$membershipId = $membership_details[0]['membership_id'];
			$paymentMethod = 'online';
			$mail->mailForMembershipProductPurchase($userEmailId, $username, $mem_order_id, $membershipId, $paymentMethod, $amount, $date);
			
			if($insert == 1)
			{
				$_SESSION['mem_order_id'] = $mem_order_id;
			}
			
			//set get value for cancel payment
			header("Location: ../../membership-purchased/");
			break;
		}
		case md5('mem_order_decline'):
		{
			//set get value for cancel payment
			header("Location: ../../cancel-payment.php?fn=mem_paypal_cancel");
			break;
		}
		default:
		{
			break;
		}
	}
?>