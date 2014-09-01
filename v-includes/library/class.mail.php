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