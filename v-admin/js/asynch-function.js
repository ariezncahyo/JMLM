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
});
