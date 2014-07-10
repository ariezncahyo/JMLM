// JavaScript Document
/*
	Vyrazu Labs
	Author: Dipanjan Bagchi
	Email: dipanjan@vyrazu.com
*/

$(document).ready(function(e) {
    //checking for all the value of add to cart form is filled up
	//
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
				//set the cookie with product details
				getProductSpecification(user_id,Quantity,Product_id,speci_length,parseInt(productCookie)+1);
				//set the value of user id cookie
				var new_quantity = parseInt(total_product.substr(0,parseInt(total_product.lastIndexOf(':')))) + Quantity;
				var new_pro_cookie = parseInt(productCookie) + 1;
				createCookie(user_id,((new_quantity)+':'+(new_pro_cookie)),1);
			}
			else
			{
				createCookie(user_id,((Quantity)+':'+1),1);
				//set the cookie with product details
				getProductSpecification(user_id,Quantity,Product_id,speci_length,1);
			}
		}
		else
		{
			createCookie('DiHuangCart','yes',7);
			createCookie(user_id,((Quantity)+':'+1),1);
			//set the cookie with product details
			getProductSpecification(user_id,Quantity,Product_id,speci_length,1);
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