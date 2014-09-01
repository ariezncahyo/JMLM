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
		url:"v-includes/library/class.fetchData.php",
		data: sendingData,
		beforeSend:function(){
			// this is where we append a loading image
			$('').html('');
		  },
		success:function(result){
			//console.log(result);
			$(returningPlace).html(result);
			return false;
	}});
}

/*
	method for alert warning message
	Auth: Dipanjan
*/

function alertWarning(msg) {
    document.getElementById('warning_msg').innerHTML = '<b>' +msg+ '</b>';
	document.getElementById('warning_msg').style.display = 'block';
	var body = $("body");
	body.animate({scrollTop:0}, '500');
	setInterval('$( "#warning_msg" ).hide()', 3000);
}
/*
	method for alert success message
	Auth: Dipanjan
*/

function alertSuccess(msg){
	document.getElementById('success_msg').innerHTML = '<b>' +msg+ '</b>';
	document.getElementById('success_msg').style.display = 'block';
	var body = $("body");
	body.animate({scrollTop:0}, '500');
	setInterval('$( "#success_msg" ).hide()', 3000);
}

$(document).ready(function(e) {
    //getting subcategory list from category list
	/*$(document).on('change', '#pro_cat', function() { 
		//get product category value
		var cat = $(this).val();
		if(cat != '')
		{
			var sendingData = 'category='+cat+'&refData=pro_cat';
			var returningPlace = '#pro_subcat';
			//calling ajax function
			sendingRequest(sendingData,returningPlace);
		}
	});*/
	
	//getting 1st level sub category list
	$(document).on('change', '#add_cat', function() { 
		//get product category value
		var cat = $(this).val();
		if(cat != -1 && cat != 'root')
		{
			//remove all the text inside add subcat id
			$('#add_subcat').html('');
			var sendingData = 'category='+cat+'&refData=subcat';
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
					$('#add_subcat').append(result);
					return false;
			}});
		}
		else
		{
			//html value to null
			$('#add_subcat').html('');
		}
	});
	
	//get nested level category list
	$(document).on('change', '.nested_cat', function() { 
		//get product category value
		var cat = $(this).val();
		if(cat != -1)
		{
			//remove all html under this nested category
			$(this).parent().parent().next('.form-group').remove();
			var sendingData = 'category='+cat+'&refData=nested_cat';
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
					$('#add_subcat').append(result);
					return false;
			}});
		}
		else
		{
			//html value to null
			$('#add_subcat').html('');
		}
	});
	
	//checking parent category checkbox and setting active category
	$(document).on('click', '.parent_cat', function() {
		var check_length = $('input[name="parent_cat[]"]:checked').length;
		//checking that it is multiple of 4
		if((check_length % 4) == 0 && check_length != 0)
		{
			//getting category value in array
			var catIDs = $('input[name="parent_cat[]"]:checked').map(function(){
			  return $(this).val();
			}).get(); // <----
			//prepare sending date
			var sendingData = 'category='+catIDs+'&refData=active_cat';
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
					location.reload();
					return false;
			}});
		}
	});
	
	//adding color textbox
	$(document).on('click', '.add_speci', function() { 
		//append a textbox
		var appending_text = '<input type="text" class="form-control pro_custom_color pull-left" name="pro[]" /><div class="pull-left"><button type="button" class="btn btn-danger btn-sm delete">Delete</button></div>';
		
		$('.color_textbox').append(appending_text);
	});
	
	//deleting the color textbox with button
	$(document).on('click', '.delete', function() { 
		//delete the textbox
		$(this).parent().prev().replaceWith('');
		//delete the button
		$(this).parent().replaceWith('');
	});
	
	//automatic visible filtered items
	if($('#order_filter').val() == 'date')
	{
		$('#filter-fromdate').css('display', 'block');
		$('#filter-todate').css('display', 'block');
	}
	if($('#order_filter').val() == 'product')
	{
		$('#filter-pro').css('display', 'block');
	}
	if($('#order_filter').val() == 'user')
	{
		$('#filter-user').css('display', 'block');
	}
	if($('#order_filter').val() == 'payment_method')
	{
		$('#filter-payment').css('display', 'block');
	}
	//auth.Debojyoti
	if($('#order_filter').val() == 'ord_status')
	{
		$('#filter-ord').css('display', 'block');
	}
	
	//showing order filter order option
	$('#order_filter').change(function() {
        var filter_value = $(this).val();
		if(filter_value == 'date')
		{
			$('#filter-fromdate').css('display', 'block');
			$('#filter-todate').css('display', 'block');
			$('#filter-pro').css('display', 'none');
			$('#filter-user').css('display', 'none');
			$('#filter-payment').css('display', 'none');
			$('#filter-ord').css('display', 'none');
		}
		else if(filter_value == 'product')
		{
			$('#filter-fromdate').css('display', 'none');
			$('#filter-todate').css('display', 'none');
			$('#filter-pro').css('display', 'block');
			$('#filter-user').css('display', 'none');
			$('#filter-payment').css('display', 'none');
			$('#filter-ord').css('display', 'none');
		}
		else if(filter_value == 'user')
		{
			$('#filter-fromdate').css('display', 'none');
			$('#filter-todate').css('display', 'none');
			$('#filter-pro').css('display', 'none');
			$('#filter-user').css('display', 'block');
			$('#filter-payment').css('display', 'none');
			$('#filter-ord').css('display', 'none');
		}
		else if(filter_value == 'payment_method')
		{
			$('#filter-fromdate').css('display', 'none');
			$('#filter-todate').css('display', 'none');
			$('#filter-pro').css('display', 'none');
			$('#filter-user').css('display', 'none');
			$('#filter-payment').css('display', 'block');
			$('#filter-ord').css('display', 'none');
		}
		else if(filter_value == 'ord_status')
		{
			$('#filter-fromdate').css('display', 'none');
			$('#filter-todate').css('display', 'none');
			$('#filter-pro').css('display', 'none');
			$('#filter-user').css('display', 'none');
			$('#filter-payment').css('display', 'none');
			$('#filter-ord').css('display', 'block');
		}
		else
		{
			$('#filter-fromdate').css('display', 'none');
			$('#filter-todate').css('display', 'none');
			$('#filter-pro').css('display', 'none');
			$('#filter-user').css('display', 'none');
			$('#filter-payment').css('display', 'none');
			$('#filter-ord').css('display', 'none');
		}
    });
	
	//set the values of filter order option
	$('#filter-btn').click(function() {
        var filter_value = $('#order_filter').val();
		if(filter_value == 'date')
		{
			var from_date = $('.filter_order_form').find('[name="from_date"]').val();
			var to_date = $('.filter_order_form').find('[name="to_date"]').val();
			window.location.href = 'filtered-order.php?filter='+filter_value+'&value1='+from_date+'&value2='+to_date;
		}
		else if(filter_value == 'product')
		{
			var product = $('.filter_order_form').find('[name="pro"]').val();
			window.location.href = 'filtered-order.php?filter='+filter_value+'&value='+product;
		}
		else if(filter_value == 'user')
		{
			var user_type = $('.filter_order_form').find('[name="user_type"]').val();
			window.location.href = 'filtered-order.php?filter='+filter_value+'&value='+user_type;
		}
		else if(filter_value == 'payment_method')
		{
			var payment_method = $('.filter_order_form').find('[name="payment_method"]').val();
			window.location.href = 'filtered-order.php?filter='+filter_value+'&value='+payment_method;
		}
    });
});
