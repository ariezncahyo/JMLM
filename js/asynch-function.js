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

//selecting the email id and username from textbox
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
	
	//checking for referral user id
	$('#signup_ref_user').change(function() {
		var ref_user = $(this).val();
		if(ref_user != "")
		{
			sendingData = 'ref_user='+ref_user+'&refData=referralChecking';
			$('#err_signup_ref_user').css('display','block');
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
					if(result == 0)
					{
						$('#err_signup_ref_user').html('**Referral User Id Does Not Valid');
						$('#signup_ref_user').val('');
						$('#signup_ref_user').focus(function() { 
							$('#err_signup_ref_user').fadeOut(500);
						});
						
					}
					return false;
			}});
		}
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
	
	//sliding of product image in product description page
	var fadeDuration=2000;
	var slideDuration=2000;
	var currentIndex=1;
	var nextIndex=1;
	var theInterval;
	
	$('.img-prod-cart li').css({opacity: 0.0});
	$('.img-prod-cart li:nth-child('+nextIndex+')').addClass('show').animate({opacity: 1.0}, fadeDuration);
	
	//function for start slider
	function startSlide() {
		theInterval = setInterval(function() { 
				nextIndex =currentIndex+1;
				if(nextIndex > $('.img-prod-cart li').length)
				{
				nextIndex =1;
				}
				$('.img-prod-cart li:nth-child('+nextIndex+')').addClass('show').animate({opacity: 1.0}, fadeDuration);
				$('.img-prod-cart li:nth-child('+currentIndex+')').animate({opacity: 0.0}, fadeDuration).removeClass('show');
				currentIndex = nextIndex;
			},slideDuration);
	}
	
	//function for stop slider
	function stopSlide() {
		clearInterval(theInterval);
	}
	
	//starting image slider initially
	startSlide();
	
	//stopping slider in image hover and starting after hover
	$('.img-prod-cart li').hover(function () {
		stopSlide();
	}, function () {
		startSlide();
	})
	
});

