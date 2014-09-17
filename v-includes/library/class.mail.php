<?php
	session_start();
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
		- method for sending withdraw invoice mail
		- Auth: Debojyoti
		*/
		
		function mailForWithdrawInvoices($toEmail, $toUsername, $withdraw_id,$withdraw_method,$date,$withdrawamount,$currency)
		{
			$subject = 'Withdraw Invoice';
			if($withdraw_method == 'account')
			{
				$method = 'By bank account';
			}
			$datastring ='<thead>
		 					<th style="text-align: center;border: 1px solid #E4E4E4;padding: 5px;">USERNAME</th>
		 					<th style="text-align: center;border: 1px solid #E4E4E4;padding: 5px;">WITHDRAW ID</th>
		 					<th style="text-align: center;border: 1px solid #E4E4E4;padding: 5px;">WITHDRAW AMOUNT</th>
		 					<th style="text-align: center;border: 1px solid #E4E4E4;padding: 5px;">WITHDRAW METHOD</th>
		 					<th style="text-align: center;border: 1px solid #E4E4E4;padding: 5px;">DATETIME</th>
		 			</thead>
		 			<tbody>
		 				<tr>
		 					<td style="text-align: center;border: 1px solid #E4E4E4;padding: 5px;">'.$toUsername.'</td>
		 					<td style="text-align: center;border: 1px solid #E4E4E4;padding: 5px;">'.$withdraw_id.'</td>
		 					<td style="text-align: center;border: 1px solid #E4E4E4;padding: 5px;">'.$currency.$withdrawamount.'</td>
		 					<td style="text-align: center;border: 1px solid #E4E4E4;padding: 5px;">'.$method.'</td>
		 					<td style="text-align: center;border: 1px solid #E4E4E4;padding: 5px;">'.$date.'</td>
		 				</tr>
		 			</tbody>';
			$toSendData = 	$this->getEmailTemplate($datastring,$toUsername,$subject);
			$mailSent = $this->fireMail($toEmail,$toUsername,$subject,$toSendData);
			return $mailSent;
		}
		
		/*
		 - method for sending product purchase mail
		 - Auth: Debojyoti
		*/
		 
		 function mailForproductPurchase($order_details,$userName,$userEmailId)
		 {
		 	$subject = 'Product Purchase Invoice';	
		 	$datastring = '<thead>
						<th style="text-align: center;border: 1px solid #E4E4E4;padding: 5px;">Product Name</th>
						<th style="text-align: center;border: 1px solid #E4E4E4;padding: 5px;">Specification</th>
						<th style="text-align: center;border: 1px solid #E4E4E4;padding: 5px;">Price</th>
						<th style="text-align: center;border: 1px solid #E4E4E4;padding: 5px;">Quantity</th>
						<th style="text-align: center;border: 1px solid #E4E4E4;padding: 5px;">Sub Total</th>
					</thead>
		 			<tbody>
		 				'.$order_details.'
		 			</tbody>';
			$toSendData = $this->getEmailTemplate($datastring,$userName,$subject);
			$mailSent = $this->fireMail($userEmailId, $userName, $subject , $toSendData);	 
			return $mailSent;
		 }
		
		/*
		 - method for sending membership product purchase mail
		 - Auth: Debojyoti
		*/
		 
		 function mailForMembershipProductPurchase($userEmailId, $username, $mem_order_id, $membershipId, $paymentMethod, $amount, $date)
		 {
		 	$subject = 'Membership Product Purchase Invoice';	
		 	$datastring = '<thead>
		 					<th style="text-align: center;border: 1px solid #E4E4E4;padding: 5px;">Username</th>
		 					<th style="text-align: center;border: 1px solid #E4E4E4;padding: 5px;">Membership Order Id</th>
		 					<th style="text-align: center;border: 1px solid #E4E4E4;padding: 5px;">Membership Id</th>
		 					<th style="text-align: center;border: 1px solid #E4E4E4;padding: 5px;">Payment Method</th>
		 					<th style="text-align: center;border: 1px solid #E4E4E4;padding: 5px;">Amount</th>
		 					<th style="text-align: center;border: 1px solid #E4E4E4;padding: 5px;">Date</th>
		 			</thead>
		 			<tbody>
		 				<tr>
		 					<td style="text-align: center;border: 1px solid #E4E4E4;padding: 5px;">'.$username.'</td>
		 					<td style="text-align: center;border: 1px solid #E4E4E4;padding: 5px;">'.$mem_order_id.'</td>
		 					<td style="text-align: center;border: 1px solid #E4E4E4;padding: 5px;">'.$membershipId.'</td>
		 					<td style="text-align: center;border: 1px solid #E4E4E4;padding: 5px;">'.$paymentMethod.'</td>
		 					<td style="text-align: center;border: 1px solid #E4E4E4;padding: 5px;">'.$amount.'</td>
		 					<td style="text-align: center;border: 1px solid #E4E4E4;padding: 5px;">'.$date.'</td>
		 				</tr>
		 			<tbody>';
			$toSendData = $this->getEmailTemplate($datastring,$username,$subject);
			$mailSent = $this->fireMail($userEmailId, $username, $subject, $toSendData);
			return $mailSent;
		 }
		 
		/*
		 * method for getting email template
		 * Auth: Debojyoti
		 */
		 
		 function getEmailTemplate($string,$userName,$subject)
		 {
		 	$html_body = '<div style="width: 90%;border: 1px solid #E4E4E4; margin: 0 auto;">
						<div style="background-color: #B69C64;display: inline-block;width: 96%;padding: 5px 15px;">
						  <img src="http://test.dip.com.sg/mlm/images/logo.png" style="width: 30px;vertical-align:middle" />&nbsp&nbsp<span style = "color:white;vertical-align:middle">Di Huang Account Details</span>
						</div>
						<div style="padding: 5%;">
							<p style="margin: 0;padding: 4px;">Hi, '.$userName.'</p>
							<p style="margin: 0;padding: 4px;">Your '.$subject.' details are given below:</p>
							<table style="width: 100%;border-spacing: 0;">
							'.$string.'
							</table>
							<p>Thanking you</p>
							<p>Di Huang Admin</p>
						</div>
					</div>';
			return $html_body;
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
			//$this->mail->addAttachment('../../anchor-position-guide.pdf');
			
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