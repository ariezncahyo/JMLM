// JavaScript Document
/*
	Vyrazu Labs
	Author: Dipanjan Bagchi
	Email: dipanjan@vyrazu.com
*/

//method for ajax call from UI form
function sendingRequest(sendingData,returningPlace){
	$.ajax({
		type: "POST",
		url:"v-includes/class.fetchData.php",
		data: sendingData,
		beforeSend:function(){
			// this is where we append a loading image
			$('').html('');
		  },
		success:function(result){
			console.log(result);
			$(returningPlace).html(result);
			return false;
	}});
}

//selecting the email id from textbox
$(document).ready(function(e) {
	$('#signup_username').change(function() {
		var username = $(this).val();
		sendingData = 'username='+username+'&refData=usernameChecking';
		$('#err_signup_username').css('display','block');
		//calling ajax function
		$.ajax({
			type: "POST",
			url:"v-includes/library/class.fetchData.php",
			data: sendingData,
			beforeSend:function(){
				// this is where we append a loading image
				$('').html('');
			  },
			success:function(result){
				//console.log(result);
				if(result == 1)
				{
					$('#err_signup_username').html('**Username Already Exists');
					$('#signup_username').val('');
					$('#signup_username').focus(function() { 
						$('#err_signup_username').fadeOut(500);
					});
				}
				return false;
		}});
	});
	
	$('#signup_email').change(function() {
		var email_id = $(this).val();
		sendingData = 'email='+email_id+'&refData=emailChecking';
		$('#err_signup_email').css('display','block');
		//calling ajax function
		$.ajax({
			type: "POST",
			url:"v-includes/library/class.fetchData.php",
			data: sendingData,
			beforeSend:function(){
				// this is where we append a loading image
				$('').html('');
			  },
			success:function(result){
				//console.log(result);
				if(result == 1)
				{
					$('#err_signup_email').html('**Email Id Already Exists');
					$('#signup_email').val('');
					$('#signup_email').focus(function() { 
						$('#err_signup_email').fadeOut(500);
					});
					
				}
				return false;
		}});
	});
	
	//checking for password character lenght
	$('#signup_pass').change(function(e) {
        var pasLen = $(this).val().length;
		//alert(pasLen);
		if(pasLen < 6)
		{
			$('#err_signup_pass').css('display','block');
			$('#err_signup_pass').html('**Password Must Have Minimum 6 Characters');
			$('#signup_pass').val('');
			$('#signup_pass').focus(function(e) {
                $('#err_signup_pass').fadeOut(500);
            });
			return false;
		}
    });
	
});