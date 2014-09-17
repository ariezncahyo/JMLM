<?php
	//session_start();
	//include php mailer autoload class
	require 'mail/PHPMailerAutoload.php';
	
	
	class mailFunction
	{
		//defining public variable
		public $mail;
		
		/*
         * top domail url for activation.php
         */ 		
        private $link = 'http://www.vyrazu.com/running-projects/j-mlm/';
		
		
		/*
		*  Public variable which is used to define where the mail will go
		*/
		private $to= '';

		/*
		*  Message which will be send to the user
		*/
		
		private $subject = 'Thanks for Joining Abcd';
		

		/*
		*  Public variable which is used to from where this person is getting the mail
		*/
		
		public $from = 'admin@vyrazu.com';
		public $fromname = array('DiHuang Admin');
		
		/*
		- method for constructing PHP Mailer class
		- Auth: Dipanjan
		*/	
		function __construct()
		{
			$this->mail = new PHPMailer;
		}
		
		/*
		- method for sending activation link to new user
		- Auth: Dipanjan
		*/
		function activationLink($toEmail,$toUsername,$user_id)
		{
			$activationMessage = $this->link.'email-verification.php?activated=true&uid='.$user_id.'&mail='.$toEmail;
			$subject = 'Email Verification Of Your Account';
			$htmlBody = '<p>To verify your account please click on the following link.. </p>
							<p>'.$activationMessage.'</p>
							<p>Thanks And Regards</p>
							<p>DiHuang</p>';
			
			//calling firemail
			$mailSent = $this->fireMail($toEmail,$toUsername,$subject,$htmlBody);
			return $mailSent;
		}
		
		/*
		 * method for getting email template
		 * Auth: Debojyoti
		*/
		 function getEmailTemplate($string)
		 {
		 	$html_body = '<div style="width: 98%;border: 1px solid #E4E4E4; margin: 0 auto;">
										<div style="background-color: #B69C64;display: inline-block;width: 96%;padding: 3px 15px;">
										  <img src="http://test.dip.com.sg/mlm/images/logo.png" style="width: 30px;vertical-align:middle" />&nbsp&nbsp<span style = "color:white;vertical-align:middle">Di Huang Account Details</span>
										</div>
										<div style="padding: 5%;">'.$string.'
										   <p>Thanking you</p>
										   <p>Di Huang Admin</p>
					   					</div>
									</div>';
				return $html_body;
		   }

		/*
		 * method for sending overriding fee details to parent user
		 * Auth: Debojyoti
		*/
		 function sendOFMail($username, $emailId, $over_fee, $user_total_money, $order_id, $currency_type)
		 {
		 	$subject = "Di Hyuang Account Message "; 
			$string = '<p style="margin: 0;padding: 4px;">Hi '.$username.',</p>
					   <p>Transaction details of your Di Huang Account are given below:</p>
					   <p><strong>Order Id: </strong> '.$order_id.'</p>
					   <p><strong>Fee Type: </strong>Overriding Fee</p>
					   <p><strong>Fee Amount: </strong>'.$currency_type.$over_fee.'</p>
					   <p><strong>Total Amount: </strong>'.$currency_type.$user_total_money.'</p>';
					   
					   
			$toSendData = $this->getEmailTemplate($string);
			$mailSent = $this->fireMail($emailId, $username, $subject , $toSendData);
			return $mailSent;
		 }
		 
		 /*
		 * method for sending personal commission details to user
		 * Auth: Debojyoti
		 */
		 function sendPCMail($username, $emailId, $per_commision, $user_total_money,$order_id, $currency_type)
		 {
		 	$subject = "Di Hyuang Account Message "; 
			$string = '<p style="margin: 0;padding: 4px;">Hi '.$username.',</p>
					   <p>Transaction details of your Di Huang Account are given below:</p>
					   <p><strong>Order Id: </strong> '.$order_id.'</p>
					   <p><strong>Fee Type: </strong>Personal Commission</p>
					   <p><strong>Fee Amount: </strong>'.$currency_type.$per_commision.'</p>
					   <p><strong>Total Amount: </strong>'.$currency_type.$user_total_money.'</p>';
				   
			$toSendData = $this->getEmailTemplate($string);
			$mailSent = $this->fireMail($emailId, $username, $subject , $toSendData);
			return $mailSent;
		 }
		 
		 /*
		 * method for sending point value details to user
		 * Auth: Debojyoti
		 */
		 function sendPVMail($username, $emailId, $total_pv, $user_total_pv,$order_id)
		 {
		 	$subject = "Di Hyuang Account Message "; 
			$string = '<p style="margin: 0;padding: 4px;">Hi '.$username.',</p>
					   <p>Transaction details of your Di Huang Account are given below:</p>
					   <p><strong>Order Id: </strong> '.$order_id.'</p>
					   <p><strong>Fee Type: </strong>Points</p>
					   <p><strong>Fee Value: </strong>'.$total_pv.'</p>
					   <p><strong>Total Value: </strong>'.$user_total_pv.'</p>';
					   
			$toSendData = $this->getEmailTemplate($string);
			$mailSent = $this->fireMail($emailId, $username, $subject , $toSendData);
			return $mailSent;
		 }

		/*
		 * method for sending status mail for product purchase
		 * Auth: Debojyoti
		 */
		 function orderStatusMail($username, $useremail, $order_id, $payment_method, $total_amount, $system_currency, $order_status)
		 {
		 	$statusDetails = $this->statusCheck($order_status);	
			$subject = 'Di Hyuang Account Message';
			$string = '<p><strong>'.$statusDetails.'</strong></p>
					   <p style="margin: 0;padding: 4px;">Hi '.$username.',</p>
					   <p>Transaction details of your Di Huang Account are given below:</p>
					   <p><strong>Order Id: </strong> '.$order_id.'</p>
					   <p><strong>Amount: </strong>'.$system_currency.$total_amount.'</p>
					   <p><strong>Date: </strong>'.date('Y-m-d').'</p>
					   <p><strong>Payment Method: </strong>'.$payment_method.'</p>';
					   
			$toSendData = $this->getEmailTemplate($string);
			$mailSent = $this->fireMail($emailId, $username, $subject , $toSendData);
		 	return $mailSent;
		 }
		 
		 /*
		 * method for sending membership order details to user
		 * Auth: Debojyoti
		 */
		 function membershipEmail($username, $useremail, $membership_order_id, $payment_method, $amount, $system_currency, $status)
		 {
			$statusDetails = $this->statusCheck($status);	
			$subject = 'Di Hyuang Account Message';
			$string = '<p><strong>'.$statusDetails.'</strong></p>
					   <p style="margin: 0;padding: 4px;">Hi '.$username.',</p>
					   <p>Transaction details of your Di Huang Account are given below:</p>
					   <p><strong>Membership Order Id: </strong> '.$membership_order_id.'</p>
					   <p><strong>Amount: </strong>'.$system_currency.$amount.'</p>
					   <p><strong>Date: </strong>'.date('Y-m-d').'</p>
					   <p><strong>Payment Method: </strong>'.$payment_method.'</p>';
					   
			$toSendData = $this->getEmailTemplate($string);
			$mailSent = $this->fireMail($emailId, $username, $subject , $toSendData);
			return $mailSent;
		 }
		 
		 /*
		 * method for getting status message according to status 
		 * Auth: Debojyoti
		*/
		function statusCheck($status)
		{
			if(isset($status) && !empty($status))
			{
				if($status == "Processing")
				{
					$string = "Your order status is on processing.";
					return $string;
				}
				if($status == "Processed")
				{
					$string = "Your order has been processed.";
					return $string;
				}
				if($status == "Completed")
				{
					$string = "Your order is Completed.";
					return $string;
				}
				if($status == "Cancel")
				{
					$string = "Your order is cancelled.";
					return $string;
				}
			}
		}
		
		/*
		- method for sending mail
		- Auth: Dipanjan
		*/
		function fireMail($toEmail,$toUsername,$subject,$htmlBody)
		{
			$this->mail->From = $this->from;
			$this->mail->FromName = $this->fromname[0];
			$this->mail->addAddress($toEmail, $toUsername);     // Add a recipient
			//$this->mail->WordWrap = 50;   // Set word wrap to 50 characters
			$this->mail->isHTML(true);      // Set email format to HTML
			$this->mail->Subject = $subject;
			$this->mail->Body = $htmlBody;
			//$this->mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
			
			if(!$this->mail->send()) {
				return 0;
				//echo 'Mailer Error: ' . $this->mail->ErrorInfo;
			} else {
				return 1;
			}
		}
		
		
		
		function sendingMail()
		{
			$this->mail->From = $this->from;
			$this->mail->FromName = 'Mailer';
			$this->mail->addAddress('vdipanjan@gmail.com', 'Dipanjan');     // Add a recipient
			//$this->$mail->addAddress('dipanjan.electrical@gmail.com', 'Dipanjan');   // Name is optional
			$this->mail->WordWrap = 50;   // Set word wrap to 50 characters
			$this->mail->isHTML(true);                                  // Set email format to HTML
			$this->mail->Subject = 'Testing With Class';
			$this->mail->Body    = 'This is the HTML message body <b>in Progress</b>';
			$this->mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
			
			if(!$this->mail->send()) {
				return 'Message could not be sent.';
				//echo 'Mailer Error: ' . $this->mail->ErrorInfo;
			} else {
				return 'Message has been sent';
			}
		}
		
		 
	}