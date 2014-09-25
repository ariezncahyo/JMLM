// JavaScript Document
/*
	Vyrazu Labs
	Author: Dipanjan Bagchi
	Email: dipanjan@vyrazu.com
*/

$(document).ready(function(e) {
    //checking for all the value of add to cart form is filled up
	$(document).on('click', '#add-to-cart', function(){ 
		//getting no of specification
		speci_length = $('.specification_details').children('.form-group').length;
		//validiation of specificaion field
		for(var i=1; i<=speci_length; i++)
		{
			if($('#speci'+i).length > 0)
			{
				validateSelectBoxField('speci'+i,'err_speci'+i);
			}
		}
		//validiation for integer field
		validiateIntegerField('pro_quan','err_pro_quan');
		var Quantity = parseInt($('#pro_quan').val());
		if(Quantity > 0)
		{
			if(getCookie('DiHuangUser') == "")
			{
				user_id = 'Guest';
			}
			else
			{
				user_id = getCookie('DiHuangUser');
			}
			//get product id
			var pageUrl = window.location.href;
			var product_id = pageUrl.substr(parseInt(pageUrl.lastIndexOf('='))+1);
			//getting maxpick of this product
			var maxpick = $('input[name="mx"]').val();
			//calling the function to set cookie
			setCookieForProduct(user_id,Quantity,product_id,speci_length,maxpick);
		}
		else
		{
			//alerting the error
			var msg = '<b>Warning: You Can Not Select 0 Quantity</b>';
			alertWarning(msg);
			//reload the page
			location.reload();
		}
	});
	
	//deleting a product from cart
	$(document).on('click', '.btn-rmv', function() { 
		var name = $(this).attr('name');
		//var cookies = document.cookie.split(";");
		if(getCookie('DiHuangUser') == "")
		{
			user_id = 'Guest';
		}
		else
		{
			user_id = getCookie('DiHuangUser');
		}
		if(getCookie(user_id+name) != "")
		{
			//get value of this cookie
			var cookie_value = getCookie(user_id+name);
			var cookie_value_part = cookie_value.split(":");
			var quantity = cookie_value_part[1].substr(parseInt(cookie_value_part[1].lastIndexOf('='))+1);
			//get total product no cookie
			var product_no = getCookie(user_id).split(':');
			var new_quantity = parseInt(product_no[0]) - parseInt(quantity);
			var new_pro_no = parseInt(product_no[1]) - 1;
			//delete the product cookie
			eraseCookie(user_id+name);
			//checking that quantity not equal to zero
			if(new_quantity == 0)
			{
				//delete the cookie
				eraseCookie(user_id);
			}
			else
			{
				//set user cookie with new value
				createCookie(user_id,(new_quantity+':'+new_pro_no),1);
				//rearrange remaining product cookie
				for(pro=1; pro<=(parseInt(new_pro_no)+1); pro++)
				{
					if(getCookie(user_id+'pro:'+pro) == "")
					{
						//set next value to this value
						if(getCookie(user_id+'pro:'+(pro+1)) != "")
						{
							createCookie((user_id+'pro:'+pro),(getCookie(user_id+'pro:'+(pro+1))),1);
							//delete that cookie
							eraseCookie(user_id+'pro:'+(pro+1));
						}
					}
				}//end of for loop
				
			}//end of else condition
			//reload the page
			location.reload();
		}//end of 1st if condition
	});
	
	//for empty the cart
	$(document).on('click', '#empty_cart', function(){ 
		//getting user_id
		if(getCookie('DiHuangUser') == "")
		{
			user_id = 'Guest';
		}
		else
		{
			user_id = getCookie('DiHuangUser');
		}
		
		//get total product no cookie
		var product_no = getCookie(user_id).split(':');
		var no_item = product_no[1];
		for(c=1; c<=parseInt(no_item); c++)
		{
			//delete cookie
			eraseCookie(user_id+'pro:'+(c));
		}
		//delete user id cookie
		eraseCookie(user_id);
		//delete DiHuangCart cookie
		eraseCookie('DiHuangCart');
		//reload the page
		location.reload();
	});
	
	//for update quantity in cart
	$(document).on('change', '.form-cart_int', function(){ 
		//getting maxpick of this product
		var maxpick = $(this).attr('name');
		//getting new quantity
		var new_quantity = $(this).val();
		//checking input value not equal to zero
		if(parseInt(new_quantity) > 0)
		{
			if(parseInt(maxpick) >= parseInt(new_quantity))
			{
				//getting user_id
				if(getCookie('DiHuangUser') == "")
				{
					user_id = 'Guest';
				}
				else
				{
					user_id = getCookie('DiHuangUser');
				}
				//getting name
				var name = $(this).attr('id');
				//get value of this cookie
				var cookie_value = getCookie(user_id+name);
				var value_part = cookie_value.split(':');
				//getting product id
				var Product_id = value_part[0].substr(parseInt(value_part[0].lastIndexOf('='))+1);
				//getting values of quantity
				var quantity = value_part[1].substr(parseInt(value_part[1].lastIndexOf('='))+1);
				//checking that product selected must not be greater than maxpick
				var ex_value = checkingMaxpick(user_id,Product_id);
				
				if(parseInt(ex_value) - parseInt(quantity) + parseInt(new_quantity) > maxpick)
				{
					//alerting the error
					var msg = '<b>Warning: You Can Not Select This Product More Than ' +maxpick+ ' Times</b>';
					alertWarning(msg);
					//reload the page
					location.reload();
				}
				else
				{
					//make change of quantity
					value_part[1] = 'quantity='+new_quantity;
					//defining an empty string
					var cookie_str = '';
					//making the string for cookie value
					for(c=0; c<value_part.length; c++)
					{
						cookie_str = cookie_str+':'+value_part[c];
					}
					cookie_str = cookie_str.substr(1);
					//update cookie
					createCookie((user_id+name),cookie_str,1);
					//get total product no cookie
					var product_no = getCookie(user_id).split(':');
					//get difference of quantity
					var qua_diff = parseInt(new_quantity) - parseInt(quantity);
					//adding the diffenece in product no
					var new_pro = parseInt(product_no[0]) + parseInt(qua_diff);
					//setting user id cookie
					createCookie(user_id,(new_pro+':'+product_no[1]),1);
					//reload the page
					location.reload();
				}
				
			}
			else
			{
				//alerting the error
				var msg = '<b>Warning: You Can Not Select This Product More Than ' +maxpick+ ' Times</b>';
				alertWarning(msg);
				//reload the page
				location.reload();
			}
		}
		else
		{
			//alerting the error
			var msg = '<b>Warning: You Can Not Select 0 Quantity</b>';
			alertWarning(msg);
			//reload the page
			location.reload();
		}
			
	});
	
	
	/* js for checkout of product */
	//initially block every accordian from opening
	$('.panel-default-custom a').css('pointer-events','none');
	//open first accordian at the time loading
	$('#checkout-one').css('pointer-events','auto');
	
	
	//for billing info data
	$('#billing_btn').click(function(e){ 
		//validiation of this form
		var val_result = validateBillingForm();
		if(val_result == 0)
		{
			return false;
		}
		else
		{
			var form_data = $('#billing_info').serialize();
			sendingData = form_data+'&refData=billing_info';
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
					$('#checkout-two').css('pointer-events','auto');
					return false;
			}});
		}
	});
	
	//setting shipping and billing address same
	$(document).on('click', '#addr_condition', function() { 
		if($(this).is(':checked') == true)
		{
			//assigning all values of billing to shipping
			$('#shipping_info input[name="f_name"]').val($('#billing_info input[name="f_name"]').val());
			$('#shipping_info input[name="l_name"]').val($('#billing_info input[name="l_name"]').val());
			$('#shipping_info input[name="company"]').val($('#billing_info input[name="company"]').val());
			$('#shipping_info input[name="email_id"]').val($('#billing_info input[name="email_id"]').val());
			$('#shipping_info input[name="addr1"]').val($('#billing_info input[name="addr1"]').val());
			$('#shipping_info input[name="addr2"]').val($('#billing_info input[name="addr2"]').val());
			$('#shipping_info input[name="city"]').val($('#billing_info input[name="city"]').val());
			$('#shipping_info input[name="postal_code"]').val($('#billing_info input[name="postal_code"]').val());
			$('#shipping_info input[name="phone"]').val($('#billing_info input[name="phone"]').val());
			$('#shipping_info input[name="state"]').val($('#billing_info input[name="state"]').val());
			$('#shipping_info input[name="country"]').val($('#billing_info input[name="country"]').val());
			
			//visible cash on delivery option
			$('#cod').show();
		}
		else
		{
			$('#shipping_info input[name="f_name"]').val('');
			$('#shipping_info input[name="l_name"]').val('');
			$('#shipping_info input[name="company"]').val('');
			$('#shipping_info input[name="email_id"]').val('');
			$('#shipping_info input[name="addr1"]').val('');
			$('#shipping_info input[name="addr2"]').val('');
			$('#shipping_info input[name="city"]').val('');
			$('#shipping_info input[name="postal_code"]').val('');
			$('#shipping_info input[name="phone"]').val('');
			$('#shipping_info input[name="state"]').val('');
			$('#shipping_info input[name="country"]').val('');
			
			//display none cash on delivery option
			$('#cod').hide();
		}
	});
	
	//for billing info data
	$('#shipping_btn').click(function(){ 
		var val_result = validateShippingForm();
		if(val_result == 0)
		{
			return false;
		}
		else
		{
			var form_data = $('#shipping_info').serialize();
			sendingData = form_data+'&refData=shipping_info';
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
					$('#checkout-three').css('pointer-events','auto');
					return false;
			}});
		}
	});
	
	//for shipping_method info
	$('#shipping_method_btn').click(function(){ 
		sendingData = 'refData=shipping_charge_info';
		//console.log(sendingData);
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
				$('#checkout-four').css('pointer-events','auto');
				return false;
		}});
	});
	
	//display block cash on delivery option
	$('#cod').hide();
	
	//for payment method info
	$('#payment_info_btn').click(function(){ 
		var val_result = validatePaymentInfoForm();
		if(val_result == 0)
		{
			return false;
		}
		else
		{
			//for checkout button active
			var value = $('input[name="payment_info"]:checked').val();
			
			if(value == 'online')
			{
				$('#paypal_btn').css('display','block');
				$('#cod_btn').css('display','none');
			}
			else if(value == 'bank' || value == 'cod')
			{
				$('#cod_btn').css('display','block');
				$('#paypal_btn').css('display','none');
			}
			
			var form_data = $('#payment_info').serialize();
			sendingData = form_data+'&refData=payment_info';
			//console.log(sendingData);
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
					$('#checkout-five').css('pointer-events','auto');
					return false;
			}});
		}
	});
	
	//for final submit
	$(document).on('click', '#order_overview_btn', function(){ 
		sendingData = 'refData=final_order_info';
		//console.log(sendingData);
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
				//sending to purchased page
				window.location = 'purchased.php';
				return false;
		}});
	});
	
});


/*
	method for setting cookie value in add to cart process
	Auth: Dipanjan
*/
function setCookieForProduct(user_id,Quantity,Product_id,speci_length,maxpick)
{
	//checking that quantity must be less than maxpick
	if(maxpick >= Quantity)
	{
		//checking cart is selected or not
		if(getCookie('DiHuangCart') == 'yes')
		{
			//getting total no of product selected
			if(getCookie(user_id) != "")
			{
				//get values of user id cookie
				var total_product = getCookie(user_id);
				//getting no of cookie set for product details
				var productCookie = total_product.substr(parseInt(total_product.lastIndexOf(':'))+1);
				//checking that product selected must not be greater than maxpick
				var ex_value = checkingMaxpick(user_id,Product_id);
				
				if(parseInt(ex_value) + parseInt(Quantity) > maxpick)
				{
					//alerting the error
					var msg = '<b>Warning: You Can Not Select This Product More Than ' +maxpick+ ' Times</b>';
					alertWarning(msg);
				}
				else
				{
					//set the cookie with product details
					getProductSpecification(user_id,Quantity,Product_id,speci_length,parseInt(productCookie)+1);
					//set the value of user id cookie
					var new_quantity = parseInt(total_product.substr(0,parseInt(total_product.lastIndexOf(':')))) + Quantity;
					var new_pro_cookie = parseInt(productCookie) + 1;
					createCookie(user_id,((new_quantity)+':'+(new_pro_cookie)),1);
					//alerting the success
					//changing cart value
					$('.cart-value').children('span').html(new_quantity);
					var msg = '<b>Success: The Product Have Added Successfully In The Cart</b>';
					alertSuccess(msg);
				}
			}
			else
			{
				createCookie(user_id,((Quantity)+':'+1),1);
				//set the cookie with product details
				getProductSpecification(user_id,Quantity,Product_id,speci_length,1);
				//alerting the success
				//changing cart value
				$('.cart-value').children('span').html(Quantity);
				var msg = '<b>Success: The Product Have Added Successfully In The Cart</b>';
				alertSuccess(msg);
			}
		}
		else
		{
			createCookie('DiHuangCart','yes',7);
			createCookie(user_id,((Quantity)+':'+1),1);
			//set the cookie with product details
			getProductSpecification(user_id,Quantity,Product_id,speci_length,1);
			//alerting the success
			//changing cart value
			$('.cart-value').children('span').html(Quantity);
			var msg = '<b>Success: The Product Have Added Successfully In The Cart</b>';
			alertSuccess(msg);
		}
	}
	else
	{
		//alerting the error
		var msg = '<b>Warning: You Can Not Select This Product More Than ' +maxpick+ ' Times</b>';
		alertWarning(msg);
	}
}


/*
	method for getting product specification for cookie
	Auth: Dipanjan
*/
function getProductSpecification(user_id,Quantity,Product_id,speci_length,productCookie)
{
	//set the cookie with product details
	var pro_cookie_name = user_id+'pro:'+productCookie;
	var pro_cookie_value = 'pid='+Product_id+':quantity='+Quantity+':';
	
	if(speci_length != 0)
	{
		for(var j=1; j<=speci_length; j++)
		{
			//getting label name and specification value
			var label = $('#label'+j).html();
			var speci_value = $('#speci'+j).val();
			//adding specification content to cokkie value
			pro_cookie_value = pro_cookie_value+'speci'+j+'='+label+':speci_value'+j+'='+speci_value+':';
		}
	}
	//adding maxwidth of specification to value
	pro_cookie_value = pro_cookie_value+'max_length='+speci_length;
	//console.log(pro_cookie_value);
	//set cookie
	createCookie(pro_cookie_name,pro_cookie_value,1);
}

/*
	method for checking total product must not be greater than maxpick
	Auth: Dipanjan
*/
function checkingMaxpick(user_id,Product_id)
{
	//get values of user id cookie
	var total_product = getCookie(user_id);
	//getting no of cookie set for product details
	var productCookie = total_product.substr(parseInt(total_product.lastIndexOf(':'))+1);
	//checking that product selected must not be greater than maxpick
	//initialize a counter 
	var ex_value = 0;
	for(var i=1; i<=parseInt(productCookie); i++)
	{
		//get existing cookie
		var exist_cookie_value = getCookie(user_id+'pro:'+i);
		if(exist_cookie_value.indexOf('pid='+Product_id) != -1)
		{
			//get quantity of this product
			var exist_quan_str = (exist_cookie_value.split(':'))[1];
			var exist_quan = exist_quan_str.substr(parseInt(exist_quan_str.lastIndexOf('='))+1);
			ex_value = parseInt(ex_value) + parseInt(exist_quan);
		}
	}
	return ex_value;
}









/*
	method for creating a new cookie
	Auth: Dipanjan
*/

function createCookie(name, value, days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        var expires = "; expires=" + date.toGMTString();
    }
    else var expires = "";
    document.cookie = name + "=" + value + expires + "; path=/";
}
/*
	method for getting value of cookie whoose name is given
	Auth: Dipanjan
*/

function getCookie(c_name) {
    if (document.cookie.length > 0) {
        c_start = document.cookie.indexOf(c_name + "=");
        if (c_start != -1) {
            c_start = c_start + c_name.length + 1;
            c_end = document.cookie.indexOf(";", c_start);
            if (c_end == -1) {
                c_end = document.cookie.length;
            }
            return unescape(document.cookie.substring(c_start, c_end));
        }
    }
    return "";
}
/*
	method for deleting all cookies set in the browser
	Auth: Dipanjan
*/


function deleteAllCookies() {
    var cookies = document.cookie.split(";");

    for (var i = 0; i < cookies.length; i++) {
    	var cookie = cookies[i];
    	var eqPos = cookie.indexOf("=");
    	var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
    	if(name.trim() == 'PHPSESSID'){
    	    continue;
    	}
    	document.cookie = name + "=;path=/;expires=Thu, 01 Jan 1970 00:00:00 GMT";
    }
}

/* method to find all the products in the cart 
   atuthor: Vasu Naman
   */
  
  function checkAllProduct(){
      var cookies = document.cookie.split(";");
      var productName = '';
      for(var i=1; i<cookies.length; i++){
          var cookie = cookies[i];
          var eqPos = cookie.indexOf("=");
          if(cookies[i].substr(eqPos+1).substr(0,2) == 'P_'){
            var productName = productName + cookies[i].substr(eqPos+1)+',';
          }
		  else if(cookies[i].substr(eqPos+1).substr(0,2) == 'M_'){
			 var productName = productName + cookies[i].substr(eqPos+1)+','; 
		  }
		  else if(cookies[i].substr(eqPos+1) == 'mojolife'){
			  var productName = productName + cookies[i].substr(0,12)+',';
		  }
      }
      return productName;
  }
  


/*
	method for deleting a cookie whoose name is given
	Auth: Dipanjan
*/

function eraseCookie(name) {
    createCookie(name,"",-1);
}

