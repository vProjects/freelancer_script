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
function validateSignupForm(form_name)
{
	validateRequiredField('signup_name','err_signup_name');
	validateRequiredField('signup_lname','err_signup_lname');
	validiateRadio('signup_male','signup_female','err_gender');
	validateEmail('signup_email');
	checkResult('err_signup_email');
	validateRequiredField('signup_contact','err_signup_contact');
	validateRequiredField('signup_address','err_signup_address');
	validateRequiredField('signup_password','err_signup_password');
	validateRequiredField('signup_confirm_password','err_signup_confirm_password');
	validiateRadio('signup_employer','signup_contractor','err_radio');
	//submit the contact form
	document.getElementById(form_name).submit();
}

//login form validiation
function validateLoginForm(form_name)
{
	validiateRadio('login_employer','login_contractor','err_login_radio');
	//submit the contact form
	document.getElementById(form_name).submit();
}

function validateProjectPostForm(form_name)
{
	validateRequiredField('err_postProject_category','postProject_category');
	validateRequiredField('postProject_name','err_postProject_name');
	validateRequiredField('postProject_description','err_postProject_description');
	validateRequiredField('postProject_skills','err_postProject_skills');
	validateRequiredField('postProject_price','err_postProject_price');
	//submit the contact form
	document.getElementById(form_name).submit();
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
	setInterval('$( "#warning_msg" ).hide()', 1000);
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
	setInterval('$( "#success_msg" ).hide()', 1000);
}
