<?php
	/*
	 * Fetches data from BLL and also from DAL
	 * The UI calls the method to get Money MLM output
	 * @Auth Dipanjan
	 */
	 
	 //include the BLL layer
	 include_once 'lib-BLL.php';
	 //include the class mail
	 include_once 'class.mail.php';
	 
	 class Money_MLM extends BLL_manageData
	 {
	 	private $_BLL_obj;
		public $_mail_obj;
		
		function __construct()
		{
			$this->_mail_obj = new mailFunction();
			if(($this->_BLL_obj instanceof BLL_manageData) != TRUE)
			{
				$this->_BLL_obj = new BLL_manageData();
				return $this->_BLL_obj;
			}
		}
		
		/*
		- method for order details
		- Auth: Dipanjan
		*/
		function getOrderPurchaseDetails($order_id)
		{
			//get order details
			$orders = $this->_BLL_obj->manage_content->getValue_where('order_info', '*', 'order_id', $order_id);
			$user_id = $orders[0]['user_id'];
			//get product details from order id
			$order_details = $this->_BLL_obj->manage_content->getValue_where('product_inventory_info', '*', 'order_id', $order_id);
			if(!empty($order_details[0]))
			{
				//total_overridng fee distributed
				$dis_over = 0;
				$user_level = 0;
				
				foreach($order_details as $order)
				{
					/* code for distribute overriding fee */
					//get transaction id for overriding fee
					$over_id = uniqid('trans');
					//calling overriding fee function
					$distributed_overriding = $this->distributeOverridingFee($user_id, $order['price'], $dis_over, $user_level, $over_id,$order_id);
					if($distributed_overriding != 0)
					{
						//insert values to fee transaction info table
						$insert_over = $this->_BLL_obj->manage_content->insertValue('fee_transaction_info', array('transaction_id','order_id','product_id','fee_type'), array($over_id,$order_id,$order['product_id'],'OF'));
						//new system value
						$new_system_value = $this->getSystemMoneyValue() - $distributed_overriding;
						//insert distributed amount to system money info
						$insert_dist_amount = $this->_BLL_obj->manage_content->insertValue('system_money_info', array('specification','debit','system_balance'), array($over_id,$distributed_overriding,$new_system_value));
					}
					
					/* code for personal commision calculation */
					//get transaction id for personal comm calculation
					$per_id = uniqid('trans');
					//calling personal commision function
					$per_comm = $this->calculatePersonalCommision($user_id, $order['price'], $per_id,$order_id);
					//checking for non empty personal commision
					if($per_comm != 0)
					{
						//insert values to fee transaction info table
						$insert_personal = $this->_BLL_obj->manage_content->insertValue('fee_transaction_info', array('transaction_id','order_id','product_id','fee_type'), array($per_id,$order_id,$order['product_id'],'PC'));
						//new system value
						$new_system_value_per = $this->getSystemMoneyValue() - $per_comm;
						//insert distributed amount to system money info
						$insert_per_amount = $this->_BLL_obj->manage_content->insertValue('system_money_info', array('specification','debit','system_balance'), array($per_id,$per_comm,$new_system_value_per));
					}
					
					/* code for point value calculation */
					//get transaction id for point value distribution
					$pv_id = uniqid('trans');
					//get product details
					$product_details = $this->_BLL_obj->manage_content->getValue_where('product_info', '*', 'product_id', $order['product_id']);
					//total point value
					$total_pv = $product_details[0]['point_value'] * $order['quantity'];
					//insert values to fee transaction info table
					$insert_point = $this->_BLL_obj->manage_content->insertValue('fee_transaction_info', array('transaction_id','order_id','product_id','fee_type'), array($pv_id,$order_id,$order['product_id'],'PV'));
					//insert pv to system
					$system_pv = $this->insertSystemPV($pv_id, $total_pv);
					//calling point value distributive function
					$this->distributePointValue($user_id, $total_pv, $pv_id, $order_id);
					
					/* code for member level upgradation of user and their parent */
					//calling fucntion for it
					$this->checkingLevelOfUserAndParent($user_id);
				}
			}
		}

		/*
		- method for membership order details
		- Auth: Dipanjan
		*/
		function getMembershipPurchaseDetails($order_id)
		{
			//get order details
			$order_details = $this->_BLL_obj->manage_content->getValue_where('membership_order_info', '*', 'membership_order_id', $order_id);
			$user_id = $order_details[0]['user_id'];
			//get user parent
			$user_mlm = $this->_BLL_obj->manage_content->getValue_where('user_mlm_info','*', 'user_id', $user_id);
			if(!empty($user_mlm[0]['parent_id']))
			{
				//get parent details
				$parent_mlm = $this->_BLL_obj->manage_content->getValueMultipleCondtn('user_mlm_info','*', array('id'), array($user_mlm[0]['parent_id']));
				if($parent_mlm[0]['member_level'] != 0)
				{
					//get transaction id for referral fee distribution
					$ref_id = uniqid('trans');
					//calling referral fee distribution function
					$ref_fee = $this->calculateReferralFee($parent_mlm[0]['user_id'], $order_details, $ref_id);
					if($ref_fee != 0)
					{
						//insert values to fee transaction info table
						$insert_referral = $this->_BLL_obj->manage_content->insertValue('fee_transaction_info', array('transaction_id','order_id','product_id','fee_type'), array($ref_id,$order_details[0]['membership_order_id'],$order_details[0]['membership_id'],'RF'));
						//new system value
						$new_system_value_per = $this->getSystemMoneyValue() - $ref_fee;
						//insert distributed amount to system money info
						$insert_per_amount = $this->_BLL_obj->manage_content->insertValue('system_money_info', array('specification','debit','system_balance'), array($ref_id,$ref_fee,$new_system_value_per));
					}
				}
				
			}
		}
		
		/*
		- method for distribute overriding fees
		- Auth: Dipanjan
		*/
		function distributeOverridingFee($user_id,$product_value,$total_distributed_fee,$user_level,$transaction_id,$order_id)
		{
			//getting parent of this user id
			$user_mlm = $this->_BLL_obj->manage_content->getValue_where('user_mlm_info','*', 'user_id', $user_id);
			if(!empty($user_mlm[0]['parent_id']))
			{
				//get parent details
				$parent_mlm = $this->_BLL_obj->manage_content->getValueMultipleCondtn('user_mlm_info','*', array('id'), array($user_mlm[0]['parent_id']));
				//getting parent OF rate
				$over_rate = $this->_BLL_obj->manage_content->getValueMultipleCondtn('member_level_info', '*', array('member_level','status'), array($parent_mlm[0]['member_level'],1));
				if(!empty($over_rate[0]['OF']))
				{
					//getting overriding fee
					$over_fee = ((intval($over_rate[0]['OF']) * $product_value) / 100);
					//getting user money from money table
					$user_money = $this->_BLL_obj->manage_content->getLastValue('user_money_info', '*', 'user_id', $parent_mlm[0]['user_id'], 'id');
					if(!empty($user_money[0]['total_money']))
					{
						$user_total_money = $user_money[0]['total_money'] + $over_fee;
					}
					else 
					{
						$user_total_money = $over_fee;
					}
					
					//insert values to user money info table
					$column_name_money = array('user_id','specification','earn_money','total_money');
					$column_value_money = array($parent_mlm[0]['user_id'],$transaction_id,$over_fee,$user_total_money);
					$insert_money = $this->_BLL_obj->manage_content->insertValue('user_money_info', $column_name_money, $column_value_money);
					//auth: Debojyoti
					$user_info = $this->_BLL_obj->manage_content->getValue_where('user_info', '*', 'user_id', $parent_mlm[0]['user_id']);
					
					//getting currency type
					$currency_type = $this->_BLL_obj->getSystemCurrency('product');
					//calling sendOFMail method from mail class
					$sendOFmail = $this->_mail_obj->sendOFMail($user_info[0]['username'], $user_info[0]['email_id'], $over_fee, $user_total_money, $order_id, $currency_type);
					//auth: Debojyoti
					//insert values to user profile info
					$this->_BLL_obj->increaseGrossAmount($parent_mlm[0]['user_id'], $over_fee);
					
					//total distributed money
					$total_distributed_fee = $total_distributed_fee + $over_fee;
					//increament user level
					$user_level = intval($user_level) + 1;
					if(intval($user_level) < 5)
					{
						//calling ditributing function for overriding
						$total_distributed_fee = $this->distributeOverridingFee($parent_mlm[0]['user_id'], $product_value, $total_distributed_fee, $user_level, $transaction_id,$order_id);
					}
				}
			}
			
			return $total_distributed_fee;
		}

		/*
		- method for get system value
		- Auth: Dipanjan
		*/
		function getSystemMoneyValue()
		{
			$system_value = $this->_BLL_obj->manage_content->getLastValue('system_money_info', '*', 1, 1, 'id');
			return $system_value[0]['system_balance'];
		}
		
		/*
		- method for calculate personal commision
		- Auth: Dipanjan
		*/
		function calculatePersonalCommision($user_id,$product_value,$transaction_id,$order_id)
		{
			//getting user details
			$user_details = $this->_BLL_obj->manage_content->getValue_where('user_info','*', 'user_id', $user_id);
			//get user PC rate
			$user_rate = $this->_BLL_obj->manage_content->getValueMultipleCondtn('member_level_info', '*', array('member_level','status'), array($user_details[0]['member_level'],1));
			if(!empty($user_rate[0]['PC']))
			{
				//getting personal commision
				$per_commision = ((intval($user_rate[0]['PC']) * $product_value) / 100);
				//getting user money from money table
				$user_money = $this->_BLL_obj->manage_content->getLastValue('user_money_info', '*', 'user_id', $user_id, 'id');
				if(!empty($user_money[0]['total_money']))
				{
					$user_total_money = $user_money[0]['total_money'] + $per_commision;
				}
				else 
				{
					$user_total_money = $per_commision;
				}
				//auth: Debojyoti
				//getting currency type
				$currency_type = $this->_BLL_obj->getSystemCurrency('product');
				//calling sendPCMail method from mail class
				$PCmail = $this->_mail_obj->sendPCMail($user_details[0]['username'], $user_details[0]['email_id'], $per_commision, $user_total_money,$order_id, $currency_type);
				//auth: Debojyoti
				//insert values to user money info table
				$column_name_money = array('user_id','specification','earn_money','total_money');
				$column_value_money = array($user_id,$transaction_id,$per_commision,$user_total_money);
				$insert_money = $this->_BLL_obj->manage_content->insertValue('user_money_info', $column_name_money, $column_value_money);
				//insert values to user profile info
				$this->_BLL_obj->increaseGrossAmount($user_id, $per_commision);
				
				return $per_commision;
			}
			else
			{
				return 0;
			}
		}

		
		/*
		- method for distribute point value to member
		- Auth: Dipanjan
		*/
		function distributePointValue($user_id,$total_pv,$transaction_id,$order_id)
		{
			//getting user details
			$user_details = $this->_BLL_obj->manage_content->getValue_where('user_info','*', 'user_id', $user_id);
			//getting user point from point table
			$user_point = $this->_BLL_obj->manage_content->getLastValue('user_point_info', '*', 'user_id', $user_id, 'id');
			if(!empty($user_point[0]['total_pv']))
			{
				$user_total_pv = $user_point[0]['total_pv'] + $total_pv;
			}
			else
			{
				$user_total_pv = $total_pv;	
			}
			
			//insert value to user point info table
			$column_name_point = array('user_id','specification','earn_pv','total_pv');
			$column_value_point = array($user_id,$transaction_id,$total_pv,$user_total_pv);
			$insert_point = $this->_BLL_obj->manage_content->insertValue('user_point_info', $column_name_point, $column_value_point);
			//auth: Debojyoti
			//getting currency type
			$currency_type = $this->_BLL_obj->getSystemCurrency('product');
			//calling sendPVMail method from mail class
			$PVmail = $this->_mail_obj->sendPVMail($user_details[0]['username'], $user_details[0]['email_id'], $total_pv, $user_total_pv,$order_id);
			//auth: Debojyoti
			//getting parent of this user id
			$user_mlm = $this->_BLL_obj->manage_content->getValue_where('user_mlm_info','*', 'user_id', $user_id);
			if(!empty($user_mlm[0]['parent_id']))
			{
				//get parent user_id
				$parent_mlm = $this->_BLL_obj->manage_content->getValue_where('user_mlm_info','*', 'id', $user_mlm[0]['parent_id']);
				//call distribute point value function
				$this->distributePointValue($parent_mlm[0]['user_id'], $total_pv, $transaction_id,$order_id);
			}
			
		}

		/*
		- method for checking level upgradation of user and their parent
		- Auth: Dipanjan
		*/
		function checkingLevelOfUserAndParent($user_id)
		{
			//calling user level upgradation function
			$this->upgradeMemberLevel($user_id);
			//getting parent of this user id
			$user_mlm = $this->_BLL_obj->manage_content->getValue_where('user_mlm_info','*', 'user_id', $user_id);
			if(!empty($user_mlm[0]['parent_id']))
			{
				//get parent details
				$parent_mlm = $this->_BLL_obj->manage_content->getValueMultipleCondtn('user_mlm_info','*', array('id'), array($user_mlm[0]['parent_id']));
				//calling parent level upgradation function
				$this->checkingLevelOfUserAndParent($parent_mlm[0]['user_id']);
			}
		}

		/*
		- method for upgrade member level
		- Auth: Dipanjan
		*/
		function upgradeMemberLevel($user_id)
		{
			//get user details
			$user_details = $this->_BLL_obj->manage_content->getValue_where('user_info', '*', 'user_id', $user_id);
			//getting user point from point table
			$user_point = $this->_BLL_obj->manage_content->getLastValue('user_point_info', '*', 'user_id', $user_id, 'id');
			//getting all level
			$all_level = $this->_BLL_obj->manage_content->getValueMultipleCondtn('member_level_info', '*', array('status'), array(1));
			$user_level = 0;
			foreach($all_level as $level)
			{
				if($user_point[0]['total_pv'] >= $level['promotion_pv'])
				{
					$user_level = $level['member_level'];
				}
			}
			//checking that member level is changed from its previous state or not
			if($user_details[0]['member_level'] != $user_level)
			{
				//update member level
				$upd1 = $this->_BLL_obj->manage_content->updateValueWhere('user_info', 'member_level', $user_level, 'user_id', $user_id);
				$upd2 = $this->_BLL_obj->manage_content->updateValueWhere('user_mlm_info', 'member_level', $user_level, 'user_id', $user_id);
			}
		}

		/*
		- method for calculate referral fee
		- Auth: Dipanjan
		*/
		function calculateReferralFee($user_id,$order_details,$transaction_id)
		{
			//get user details
			$user_details = $this->_BLL_obj->manage_content->getValue_where('user_info','*', 'user_id', $user_id);
			if($user_details[0]['member_level'] != 0)
			{
				//getting user rf
				$user_level = $this->_BLL_obj->manage_content->getValue_where('member_level_info','*', 'member_level', $user_details[0]['member_level']);
				if(!empty($user_level[0]['RF']))
				{
					$ref_fee = ((intval($user_level[0]['RF']) * $order_details[0]['amount']) / 100);
					//getting user money from money table
					$user_money = $this->_BLL_obj->manage_content->getLastValue('user_money_info', '*', 'user_id', $user_id, 'id');
					if(!empty($user_money[0]['total_money']))
					{
						$user_total_money = $user_money[0]['total_money'] + $ref_fee;
					}
					else 
					{
						$user_total_money = $ref_fee;
					}
					
					//insert values to user money info table
					$column_name_money = array('user_id','specification','earn_money','total_money');
					$column_value_money = array($user_id,$transaction_id,$ref_fee,$user_total_money);
					$insert_money = $this->_BLL_obj->manage_content->insertValue('user_money_info', $column_name_money, $column_value_money);
					//insert values to user profile info
					$this->_BLL_obj->increaseGrossAmount($user_id, $ref_fee);
					
					return $ref_fee;
				}
				else 
				{
					return 0;
				}
			}
			else
			{
				return 0;	
			}
		}

		/*
		- method for insert point value to system pv info
		- Auth: Dipanjan
		*/
		function insertSystemPV($transaction_id,$total_pv)
		{
			//get last pv value
			$system_pv = $this->_BLL_obj->manage_content->getLastValue('system_pv_info', '*', 1, 1, 'id');
			//new system pv
			if(!empty($system_pv[0]))
			{
				$new_pv = $system_pv[0]['system_pv_balance'] + $total_pv;
			}
			else
			{
				$new_pv = $total_pv;
			}
			//insert the value
			$column_name = array('specification','credit','system_pv_balance','date');
			$column_value = array($transaction_id,$total_pv,$new_pv,date('Y-m-d h:m:s a'));
			$insert = $this->_BLL_obj->manage_content->insertValue('system_pv_info', $column_name, $column_value);
		}
		
		/*
		- method for distribute pool sharing pv
		- Auth: Dipanjan
		*/
		function distributePsPointValue($transaction_id,$system_pv)
		{
			//distributed pv
			$distributed_pv = 0;
			//getting global distributor
			$globals = $this->_BLL_obj->manage_content->getValue_where('user_info', '*', 'member_level', 5);
			if(!empty($globals[0]))
			{
				//count no of global distributor
				$no = count($globals);
				//getting user PS
				$user_ps = $this->_BLL_obj->manage_content->getValue_where('member_level_info','*', 'member_level', 5);
				$per_pv = ((($system_pv * $user_ps[0]['PS'])/100)/$no);
				
				foreach($globals as $global_dis)
				{
					//getting user point from point table
					$user_point = $this->_BLL_obj->manage_content->getLastValue('user_point_info', '*', 'user_id', $global_dis['user_id'], 'id');
					if(!empty($user_point[0]['total_pv']))
					{
						$user_total_pv = $user_point[0]['total_pv'] + $per_pv;
					}
					else
					{
						$user_total_pv = $per_pv;	
					}
					//insert value to user point info table
					$column_name_point = array('user_id','specification','earn_pv','total_pv');
					$column_value_point = array($user_id,$transaction_id,$per_pv,$user_total_pv);
					$insert_point = $this->_BLL_obj->manage_content->insertValue('user_point_info', $column_name_point, $column_value_point);
					
					//add distributing pv
					$distributed_pv = $distributed_pv + $per_pv;
					//calling member upgrade function
					$this->upgradeMemberLevel($global_dis['user_id']);
				}
			}
			
			return $distributed_pv;
		}
		
		
	 }
?>