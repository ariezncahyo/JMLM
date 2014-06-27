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
