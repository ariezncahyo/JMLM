// JavaScript Document
//for form validation author DIPANJAN
//function for form validations
function validateRequiredField(id_name,err_id)
{
	var x = document.getElementById(id_name).value;
	if(x == "")
	{
		//make the background color red
		document.getElementById(id_name).style.backgroundColor = '#F6D3D3';
		//showing the msg
		document.getElementById(err_id).innerHTML = '**Please Fill Up The Field';
		document.getElementById(err_id).style.color = 'red';
		result = 0;
		//document.getElementById('btn_submit').disabled = 'true';
		exit();
	}
	else
	{
		//make the background color normal if valid
		document.getElementById(id_name).style.backgroundColor = '#ffffff';
		result = 1;
	}
}
//function for form validations of empty text
function validateTextField(id_name,err_id)
{
	var x = document.getElementById(id_name).innerHTML;
	if(x == "")
	{
		//make the background color red
		document.getElementById(id_name).style.backgroundColor = '#F6D3D3';
		//showing the msg
		document.getElementById(err_id).innerHTML = '**Please Fill Up The Field';
		document.getElementById(err_id).style.color = 'red';
		result = 0;
		//document.getElementById('btn_submit').disabled = 'true';
		exit();
	}
	else
	{
		//make the background color normal if valid
		document.getElementById(id_name).style.backgroundColor = '#ffffff';
		result = 1;
	}
}
//function for checking valid email
function validateEmail(id_name)
{
	var textbx = document.getElementById(id_name);
	var input_value = document.getElementById(id_name).value;
	//check the field is empty
	if(input_value == "")
	{
		textbx.style.backgroundColor = '#F6D3D3';
		result = 0;
	}
	//If not empty then check for email validation
	else
	{
		var x=input_value;
		var atpos=x.indexOf("@");
		var dotpos=x.lastIndexOf(".");
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
		{
			alert("Invalid Email");
			textbx.style.backgroundColor = '#F6D3D3';
			result = 0;
  		}
		else
		{
			textbx.style.backgroundColor = '#ffffff';
			result = 1;
		}
	}
}

//function for checkbox validiation
function validiateSelectbox(id_name,err_id){
	var check = document.getElementById(id_name).checked;
	
	if(check == false)
	{
		document.getElementById(err_id).innerHTML = '**Please Select The Select Box';
		document.getElementById(err_id).style.color = 'red';
		exit();
	}
}
//function for validiation of radiobutton
function validiateRadio(radio1,radio2,err_id){
	var radio_button1 = document.getElementById(radio1).checked;
	var radio_button2 = document.getElementById(radio2).checked;
	
	if(radio_button1 == false && radio_button2 == false)
	{
		document.getElementById(err_id).innerHTML = '**Please Select One Option';
		document.getElementById(err_id).style.color = 'red';
		exit();
	}
}

//function for validiation of integer value
function validiateIntegerField(id_name,err_id){
	var x = document.getElementById(id_name).value;
	if(isNaN(x) != false || x == "")
	{
		//make the background color red
		document.getElementById(id_name).style.backgroundColor = '#F6D3D3';
		//showing the msg
		document.getElementById(err_id).innerHTML = '**Please Fill Up A Number';
		document.getElementById(err_id).style.color = 'red';
		result = 0;
		//document.getElementById('btn_submit').disabled = 'true';
		exit();
	}
	else
	{
		//make the background color normal if valid
		document.getElementById(id_name).style.backgroundColor = '#ffffff';
		result = 1;
	}
}

function checkResult(err_id)
{
	if(result == 0)
	{
		//alert('Please check '+alert_value);
		document.getElementById(err_id).innerHTML = '**Please Fill Up The Field';
		document.getElementById(err_id).style.color = 'red';
		//document.getElementById('btn_submit').disabled = 'true';
		exit();
	}
}
function checkResultEmail(err_id)
{
	if(result == 0)
	{
		//alert('Please check '+alert_value);
		document.getElementById(err_id).innerHTML = '**Please Fill Up The Field';
		document.getElementById(err_id).style.color = 'red';
		//document.getElementById('btn_submit').disabled = 'true';
		return 0;
	}
	else
	{
		return 1;
	}
}
function checkEmptyField(id_name_1)
{
	var y = document.getElementById(id_name_1).value;
	if(y == null || y == "")
	{
		document.getElementById(id_name_1).style.backgroundColor = "#000";
		document.getElementById('btn_submit').disabled = 'true';
		exit(); 
	}
}
function validateSelectBoxField(id_name,err_id)
{
	var x = document.getElementById(id_name).value;
	if(x == -1)
	{
		//make the background color red
		document.getElementById(id_name).style.backgroundColor = '#F6D3D3';
		//showing the msg
		document.getElementById(err_id).innerHTML = '**Please Fill Up The Field';
		document.getElementById(err_id).style.color = 'red';
		result = 0;
		//document.getElementById('btn_submit').disabled = 'true';
		exit();
	}
	else
	{
		//make the background color normal if valid
		document.getElementById(id_name).style.backgroundColor = '#ffffff';
		result = 1;
	}
}



/* validiation for checkout forms */
function validateAccordianField(id_name,err_id)
{
	var x = document.getElementById(id_name).value;
	if(x == "")
	{
		//make the background color red
		document.getElementById(id_name).style.backgroundColor = '#F6D3D3';
		//showing the msg
		document.getElementById(err_id).innerHTML = '**Please Fill Up The Field';
		document.getElementById(err_id).style.color = 'red';
		result = 0;
	}
	else
	{
		//make the background color normal if valid
		document.getElementById(id_name).style.backgroundColor = '#ffffff';
		result = 1;
	}
	return result;
}

//function for validiation of radiobutton
function validiateCheckoutRadio(id,err_id){
	var value = $(id).find('input[type="radio"]').is(':checked');
	
	if(value == true)
	{
		result = 1;
	}
	else
	{
		document.getElementById(err_id).innerHTML = '**Please Select One Option';
		document.getElementById(err_id).style.color = 'red';
		result = 0;
	}
	return result;
}


function validateSignupForm(form_name)
{
	validateRequiredField('signup_fname','err_signup_fname');
	validateRequiredField('signup_lname','err_signup_lname');
	validateRequiredField('signup_dob','err_signup_dob');
	validateRequiredField('signup_addr1','err_signup_addr1');
	//validateRequiredField('signup_city','err_signup_city');
	//validateRequiredField('signup_state','err_signup_state');
	validateRequiredField('signup_country','err_signup_country');
	validateRequiredField('signup_postal','err_signup_postal');
	validateRequiredField('signup_username','err_signup_username');
	validateRequiredField('signup_email','err_signup_email');
	validateRequiredField('signup_pass','err_signup_pass');
	validateRequiredField('signup_con_pass','err_signup_con_pass');
	//submit the contact form
	document.getElementById(form_name).submit();
}

/*
- method for validate bank account form for insert
- Auth: Riju
*/

function validateBankAccountForm(form_name)
{
	validateRequiredField('bnk_ac_holder_name','err_ac_holder_name');
	validateRequiredField('bnk_ac_number','err_ac_number');
	validateRequiredField('bnk_bank_name','err_bank_name');
	validateRequiredField('bnk_branch_name','err_branch_name');
	validateRequiredField('bnk_ifsc_code','err_ifsc_code');
	validateRequiredField('bnk_tax_number','err_tax_number');
	
	document.getElementById(form_name).submit();

}


//validiation of billing form
function validateBillingForm()
{
	var r1 = validateAccordianField('bill_fname','err_bill_fname');
	var r2 = validateAccordianField('bill_lname','err_bill_lname');
	validateEmail('bill_email');
	var r3 = checkResultEmail('err_bill_email');
	var r4 = validateAccordianField('bill_addr1','err_bill_addr1');
	var r5 = validateAccordianField('bill_addr2','err_bill_addr2');
	var r6 = validateAccordianField('bill_city','err_bill_city');
	var r7 = validateAccordianField('bill_zip','err_bill_zip');
	var r8 = validateAccordianField('bill_phone','err_bill_phone');
	var r9 = validateAccordianField('bill_state','err_bill_state');
	var r10 = validateAccordianField('bill_country','err_bill_country');
	
	if(r1 == 0 || r2 == 0 || r3 == 0 || r4 == 0 || r5 == 0 || r6 == 0 || r7 == 0 || r8 == 0 || r9 == 0 || r10 == 0)
	{
		return 0;
	}
	else
	{
		return 1;
	}
}

//validiation of shipping form
function validateShippingForm()
{
	var r1 = validateAccordianField('ship_fname','err_ship_fname');
	var r2 = validateAccordianField('ship_lname','err_ship_lname');
	validateEmail('ship_email');
	var r3 = checkResultEmail('err_ship_email');
	var r4 = validateAccordianField('ship_addr1','err_ship_addr1');
	var r5 = validateAccordianField('ship_addr2','err_ship_addr2');
	var r6 = validateAccordianField('ship_city','err_ship_city');
	var r7 = validateAccordianField('ship_zip','err_ship_zip');
	var r8 = validateAccordianField('ship_phone','err_ship_phone');
	var r9 = validateAccordianField('ship_state','err_ship_state');
	var r10 = validateAccordianField('ship_country','err_ship_country');
	
	if(r1 == 0 || r2 == 0 || r3 == 0 || r4 == 0 || r5 == 0 || r6 == 0 || r7 == 0 || r8 == 0 || r9 == 0 || r10 == 0)
	{
		return 0;
	}
	else
	{
		return 1;
	}
}

//validiation of payment info form
function validatePaymentInfoForm()
{
	var r1 = validiateCheckoutRadio('#payment_info','err_payment_info');
	return r1;
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

//jquery event declararion
$(document).ready(function(e) {
    $('#user_signup_btn').click(function(e) {
        //calling validiation function for signup form
		validateSignupForm('user_signup');
    });
	
	$('#user_pro_info').click(function(e) {
        //calling validiation function
		validiateUserProfileInfoForm('user_profile');
    });
	
	$('#userContactBtn').click(function(e) {
        //calling validiation function
		validiateUserQueryForm('userContactForm');
    });
	
	$('#userTicketBtn').click(function(e) {
        //calling validiation function
		validiateUserTicketForm('userTicketForm');
    });
    
    //event for validate bank account form  Auth:Riju
    $('#user_bank_btn').click(function(e) {
        //calling validiation function for bank details form
		validateBankAccountForm('user_bank_frm');
    });
});

