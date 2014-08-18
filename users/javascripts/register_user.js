function formValidateHash(form, username, password, verify) 
{
	var username = username.value;
	var password = password.value;
	var verify = verify.value;

	var username_error_message =  '';
	var password_error_message =  '';
	var verify_error_message =  [];

	if(username === "")
		{
			username_error_message = "You must enter a username.";
		}
	if(password === "")
		{
			password_error_message = "You must enter a password.";
		}
	if(verify === "")
		{
			verify_error_message.push("You must verify the password.");
		}
	if(password != verify)
		{
			verify_error_message.push("The passwords you entered do not match.");
		}

    var verify_error ='';
	for (var i = 0; i < verify_error_message.length; i++) 
	{
    	verify_error += verify_error_message[i] + '<br>';
    }

	document.getElementById("userError").innerHTML = username_error_message;
	document.getElementById("passwordError").innerHTML = password_error_message;
	document.getElementById("verifyError").innerHTML = verify_error;

	var size = Object.keys(verify_error_message).length;

	if(size == 0 && username_error_message === '' && password_error_message === '') 
	{	
		password = hex_sha512(password);
		form.submit();
	} 
}

function formValidateEmail(form, fname, lname, email, email2)
{

	var email = email.value;
	var email2 = email2.value;
	var fname = fname.value;
	var lname = lname.value;

	var fname_error = '';
	var lname_error = '';
	var email_error = [];
	var verify_error = [];

	if(fname === "")
		{
			fname_error = "You dont have first name!! what shall we call you??";
		}
	if(lname === "")
		{
			lname_error = "You dont have last name!! what shall we call you??.";
		}

	if(email === "")
		{
			email_error.push("what?! no email?!, how will we get in touch with you?");
		}

	var re = 	/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

	var isemail = re.test(email);

	if(!isemail && email != "")
		{
			email_error.push("strange, this doesn't look like an email? Check again...");
		}

	if(email2 === "")
		{
			verify_error.push("please verify the email address.");
		}

	if(email != email2)
		{
			verify_error.push("The emails you entered do not match.");
		}

    var email_errors ='';
	for (var i = 0; i < email_error.length; i++) 
	{
    	email_errors += email_error[i] + '<br>';
    }

    var verify_errors ='';
	for (var i = 0; i < verify_error.length; i++) 
	{
    	verify_errors += verify_error[i] + '<br>';
    }

	document.getElementById("fnameError").innerHTML = fname_error;
	document.getElementById("lnameError").innerHTML = lname_error;
	document.getElementById("emailError").innerHTML = email_errors;
	document.getElementById("verifyError").innerHTML = verify_errors;

	var email_size = Object.keys(email_error).length;
	var verify_size = Object.keys(verify_error).length;

	if(email_size == 0 && verify_size == 0 && fname_error === '' && lname_error ==='') 
	{	
		form.submit();
	} 
}


function validateContactDetails(form, street, city, county, postcode){

	var street = street.value;
	var city = city.value;
	var county = county.value;
	var postcode = postcode.value;

	var street_error = '';
	var city_error = '';
	var county_error = '';
	var postcode_error = '';
	var errors = [];

	if(street === "")
		{
			street_error = "Oh go on, tell us your street address, <br> how else will your tutor find you for a lesson??";
			errors.push(street_error);
		}

	if(city === "")
		{
			city_error = "You must enter a city name.";
			errors.push(city_error);
		}

	if(county === "")
		{
			county_error = "You must enter a county name.";
			errors.push(county_error);
		}

	if(postcode === "")
		{
			postcode_error = "Pease enter your enter a postcode name.";
			errors.push(postcode_error);
		}

	document.getElementById("streetError").innerHTML = street_error;
	document.getElementById("cityError").innerHTML = city_error;
	document.getElementById("countyError").innerHTML = county_error;
	document.getElementById("postcodeError").innerHTML = postcode_error;
	
	var size = Object.keys(errors).length;
	if(size == 0) 
	{	
		form.submit();
	} 

}

function validatePhone(form, phone, secondPhone)
{
	var phone1 = phone.value;
	var phone2 = secondPhone.value;

	var phone_errors1 = [];
	var phone_errors2 = [];


	if(phone1 === undefined || phone1 ==='')
		{
			phone_errors1.push("Please state your main contact number");
		}

	var isnum = /^\d+$/.test(phone1);
	if(phone1 != '' && !isnum)
		{
			phone_errors1.push("Strange, this doesn't look like a phone number.<br> Please check it again...");
		}
	if(phone1 != '' && isnum && phone1.length < 11)
		{
			phone_errors1.push("This looks a bit short for a phone number??. <br>Please check it again..");
		}

	var isnum2 = /^\d+$/.test(phone2);
	if(phone2 != '' && !isnum2)
		{
			phone_errors2.push("Strange, this doesn't look like a phone number.<br> Please check it again...");
		}

	if(phone2 != '' && isnum2 && phone2.length < 11)
		{
			phone_errors2.push("This looks a bit short for a phone number??. <br>Please check it again..");
		}

	var phone1_errors = '';
	for (var i = 0; i < phone_errors1.length; i++) 
		{
    	phone1_errors += phone_errors1[i] + '<br>';
    	}

	var phone2_errors = '';
	for (var i = 0; i < phone_errors2.length; i++) 
		{
    	phone2_errors += phone_errors2[i] + '<br>';
    	}

	document.getElementById("phoneError").innerHTML = phone1_errors;
	document.getElementById("phoneError2").innerHTML = phone2_errors;	

	var size1 = Object.keys(phone_errors1).length;
	var size2 = Object.keys(phone_errors2).length;

	if(size1 == 0 && size2 == 0) 
	{	
		form.submit();
	} 

}

function validateAge(form, day, month, year)
{
	var day = day.value;
	var month = month.value;
	var year = year.value;

	var day_error_message =  [];
	var month_error_message =  [];
	var year_error_message =  [];

//DAY CHECKS
	// check its there
	if(day === "")
		{
			day_error_message.push("Enter a day");
		}
	// check its a number
	var isnum = /^\d+$/.test(day);
	if(day != '' && !isnum)
		{
			day_error_message.push("must be a number");
		}
	//check its the correct length
	if(day != '')
		{
			if(day.length != 2)
			{
					day_error_message.push("incorrect format");
			}
		}
	// check value is correct
	if(day > 31 || day < 0)
		{
			day_error_message.push("out of range");
		}

// MONTH CHECKS
// check its there
	if(month === "")
		{
			month_error_message.push("Enter a Month");
		}
	// check its a number
	var isnum = /^\d+$/.test(month);
	if(month != '' && !isnum)
		{
			month_error_message.push("must be a number");
		}
	//check its the correct length
	if(month != '')
		{
			if(month.length != 2)
			{
					month_error_message.push("incorrect format");
			}
		}
	// check value is correct
	if(month > 12 || month < 0)
		{
			month_error_message.push("out of range");
		}

// YEAR CHECKS
	// check its there
	if(year === "")
		{
			year_error_message.push("Enter a Year");
		}
	// check its a number
	var isnum = /^\d+$/.test(year);
	if(year != '' && !isnum)
		{
			year_error_message.push("must be a number");
		}
	//check its the correct length
	if(year != '')
		{
			if(year.length != 4)
			{
					year_error_message.push("incorrect format");
			}
		}

// FUTURE CHECKS
	var date = new Date();
	var year_now = date.getFullYear();
	var month_this = date.getMonth();
	var month_size = '' + month_this;
	if(month_size.length === 1)
	{
		month_this += 1;
		var month_now = month_this.toString();
		month_now = '0' + month_now;
		var month_int = parseInt(month_now);
	}

	var day_now = date.getDate();

	// check value is correct
	if(year != '')
	{
		if(year > year_now)
			{
			year_error_message.push("Thats is in the future!!");
			}
	}

	if(year != '' && year.length == 4)
	{
		if(year < 1900)
			{
			year_error_message.push("Are you really over 100 years old?!!");
			}
	}

	if(year == year_now)
	{
		if(month == month_now)
		{
			if(day > day_now)
			{
				year_error_message.push("Thats is in the future!!");
			}
			else 
			{
				year_error_message.push("Are you really less than a month old!!");
			}
		}
	}

	var day_error ='';
	for (var i = 0; i < day_error_message.length; i++) 
	{
    	day_error += day_error_message[i] + '<br>';
    }

    var month_error ='';
	for (var i = 0; i < month_error_message.length; i++) 
	{
    	month_error += month_error_message[i] + '<br>';
    }

    var year_error ='';
	for (var i = 0; i < year_error_message.length; i++) 
	{
    	year_error += year_error_message[i] + '<br>';
    }

	document.getElementById("dayError1").innerHTML = day_error;
	document.getElementById("monthError1").innerHTML = month_error;
	document.getElementById("yearError1").innerHTML = year_error;

	var day_size = Object.keys(day_error_message).length;
	var month_size = Object.keys(month_error_message).length;
	var year_size = Object.keys(year_error_message).length;

	if(day_size === 0 && month_size === 0 && year_size === 0) 
	{	
		form.submit();
	} 
}

function formStudent(form, fname, lname)
{
	var fname = fname.value;
	var lname = lname.value;

	var stuFname_error = '';
	var stuLname_error = '';

	if(fname == "")
		{
			stuFname_error = "You dont have first name!! what shall we call you??";
		}
	if(lname == "")
		{
			stuLname_error = "You dont have last name!! what shall we call you??.";
		}

	document.getElementById("stuFnameError").innerHTML = stuFname_error;
	document.getElementById("stuLnameError").innerHTML = stuLname_error;

	if(stuFname_error == '' && stuLname_error =='') 
	{	
		form.submit();
	} 

}

