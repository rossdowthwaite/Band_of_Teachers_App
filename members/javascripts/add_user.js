
function formValidateHash(form, username, fname, lname, email, email2, password, verify, member) 
{
	document.getElementById("user").style.visibility = "hidden";
	document.getElementById("userEr").style.visibility = "hidden";
	document.getElementById("fnameY").style.visibility = "hidden";
	document.getElementById("lnameY").style.visibility = "hidden";
	document.getElementById("email2Y").style.visibility = "hidden";
	document.getElementById("emailY").style.visibility = "hidden";
	document.getElementById("email3").style.visibility = "hidden";
	document.getElementById("passwordY").style.visibility = "hidden";
	document.getElementById("verifyY").style.visibility = "hidden";
	document.getElementById("verifyY2").style.visibility = "hidden";

	//password.type = "hidden";
	var username = username.value;
	var password = password.value;
	var member = member.value;
	var verify = verify.value;
	var email = email.value;
	var email2 = email2.value;
	var fname = fname.value;
	var lname = lname.value;

	var error_message = {};

	if(username === "")
		{
			error_message['user'] = "You must enter a username.";
			document.getElementById("user").style.visibility = "visible";
		}
	if(fname === "")
		{
			error_message['fn'] = "You must enter your first name.";
			document.getElementById("fnameY").style.visibility = "visible";
		}
	if(lname === "")
		{
			error_message['ln'] = "You must enter your last name.";
			document.getElementById("lnameY").style.visibility = "visible";
		}
	if(email === "")
		{
			error_message['em'] = "You must enter an email address.";
			document.getElementById("emailY").style.visibility = "visible";
		}
	if(email2 === "")
		{
			error_message['em2'] = "You must verify the email address.";
			document.getElementById("email2Y").style.visibility = "visible";
		}
	if(email != email2)
		{
			error_message['vfy'] = "The emails you entered do not match.";
			document.getElementById("email3").style.visibility = "visible";
		}
	if(password === "")
		{
			error_message['pswd'] = "You must enter a password.";
			document.getElementById("passwordY").style.visibility = "visible";
		}
	if(verify === "")
		{
			error_message['pswd2'] = "You must verify the password.";
			document.getElementById("verifyY").style.visibility = "visible";
		}
	if(password != verify)
		{
			error_message['vfy1'] = "The passwords you entered do not match.";
			document.getElementById("verifyY2").style.visibility = "visible";
		}
	if(member === "")
		{
			errors['str1'] = "You must enter a street name.";
			document.getElementById("streetEr").style.visibility = "visible";
		}

	var size = Object.keys(error_message).length;
	//alert(size);

	if(size == 0) 
	{	
		password = hex_sha512(password);
		form.submit();
	} 
}


function validateContactDetails(form, street1, street2, city, county, postcode, phone){

	document.getElementById("streetEr").style.visibility = "hidden";
	document.getElementById("cityEr").style.visibility = "hidden";
	document.getElementById("countyEr").style.visibility = "hidden";
	document.getElementById("postcodeEr").style.visibility = "hidden";
	document.getElementById("numberEr").style.visibility = "hidden";
	document.getElementById("number2Er").style.visibility = "hidden";

	var street1 = street1.value;
	var street2 = street2.value;
	var city = city.value;
	var county = county.value;
	var postcode = postcode.value;
	var phone = phone.value;

	var errors = {};

	if(street1 === "")
		{
			errors['str1'] = "You must enter a street name.";
			document.getElementById("streetEr").style.visibility = "visible";
		}

	if(city === "")
		{
			errors['city'] = "You must enter a street name.";
			document.getElementById("cityEr").style.visibility = "visible";
		}

	if(county === "")
		{
			errors['cnty'] = "You must enter a street name.";
			document.getElementById("countyEr").style.visibility = "visible";
		}

	if(postcode === "")
		{
			errors['po'] = "You must enter a street name.";
			document.getElementById("postcodeEr").style.visibility = "visible";
		}

	if(phone === "")
		{
			errors['pho'] = "You must enter a street name.";
			document.getElementById("numberEr").style.visibility = "visible";
		}

	var isnum = /^\d+$/.test(phone);
	if(!isnum)
		{
			errors['phoDigit'] = "You must enter a street name.";
			document.getElementById("number2Er").style.visibility = "visible";
		}
	
	var size = Object.keys(errors).length;
	if(size == 0) 
	{	
		form.submit();
	} 

}



