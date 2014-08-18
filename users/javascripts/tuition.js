function formValidateAvailability(form, day1, from1, until1, day2, from2, until2, day3, from3, until3, day4, from4, until4, day5, from5, until5, day6, from6, until6, day7, from7, until7)
{

  var day1 = day1.value;
  var from1 = from1.value;
  var until1 = until1.value;
  var day2 = day2.value;
  var from2 = from2.value;
  var until2 = until2.value;
  var day3 = day3.value;
  var from3 = from3.value;
  var until3 = until3.value;
  var day4 = day4.value;
  var from4 = from4.value;
  var until4 = until4.value;
  var day5 = day5.value;
  var from5 = from5.value;
  var until5 = until5.value;
  var day6 = day6.value;
  var from6 = from6.value;
  var until6 = until6.value;
  var day7 = day7.value;
  var from7 = from7.value;
  var until7 = until7.value;

  var errors =  [];
  var day1_error = '';
  var day2_error = '';
  var day3_error = '';
  var day4_error = '';
  var day5_error = '';
  var day6_error = '';
  var day7_error = '';


	if(day1 != "none")
  	{
	  	if(from1 > until1)
	  	{
	  		alert('from =' + from1 + "until = " + until1)
	  		day1_error = " The from time is later than until time. Call me old fashioned but I thought time could only go forward..?!";
			errors.push(day1_error);
	  	}
	  	if(from1 == until1)
	  	{
	  		day1_error = "The from time is the same as the until time. Surely thats not gonna be enough time for a lesson..?! ";
			errors.push(day1_error);
	  	}

	  	if(from1 == "none")
	  	{
	  		day1_error = "please set a time you are available from";
			errors.push(day1_error);
	  	}

	  	if(until1 == "none")
	  	{
	  		day1_error = "please set a time you are available until";
			errors.push(day1_error);
	  	}
  	}
  	if(day1 == "none"){
  		if(from1 != 'none' || until1 != 'none')
  		{
  			day1_error = "please set a day";
			errors.push(day1_error);
  		}
  	}
  	if(day2 != "none")
  	{
	  	if(from2 > until2)
	  	{
	  		day2_error = " The from time is later than until time. Call me old fashioned but I thought time could only go forward..?!";
			errors.push(day2_error);
	  	}
	  	if(from2 == until2)
	  	{
	  		day2_error = "The from time is the same as the until time. Surely thats not gonna be enough time for a lesson..?! ";
			errors.push(day2_error);
	  	}

	  	if(from2 == "none")
	  	{
	  		day2_error = "please set a time you are available from";
			errors.push(day2_error);
	  	}

	  	if(until2 == "none")
	  	{
	  		day2_error = "please set a time you are available until";
			errors.push(day2_error);
	  	}
  	}
  	if(day2 == "none"){
  		if(from2 != 'none' || until2 != 'none')
  		{
  			day2_error = "please set a day";
			errors.push(day2_error);
  		}
  	}

  	if(day3 != "none")
  	{
	  	if(from3 > until3)
	  	{
	  		day3_error = " The from time is later than until time. Call me old fashioned but I thought time could only go forward..?!";
			errors.push(day3_error);
	  	}
	  	if(from3 == until3)
	  	{
	  		day3_error = "The from time is the same as the until time. Surely thats not gonna be enough time for a lesson..?! ";
			errors.push(day3_error);
	  	}

	  	if(from3 == "none")
	  	{
	  		day3_error = "please set a time you are available from";
			errors.push(day3_error);
	  	}

	  	if(until3 == "none")
	  	{
	  		day3_error = "please set a time you are available until";
			errors.push(day3_error);
	  	}
  	}
  	if(day3 == "none"){
  		if(from3 != 'none' || until3 != 'none')
  		{
  			day3_error = "please set a day";
			errors.push(day3_error);
  		}
  	}

  		if(day4 != "none")
  	{
	  	if(from4 > until4)
	  	{
	  		day4_error = " The from time is later than until time. Call me old fashioned but I thought time could only go forward..?!";
			errors.push(day4_error);
	  	}
	  	if(from4 == until4)
	  	{
	  		day4_error = "The from time is the same as the until time. Surely thats not gonna be enough time for a lesson..?! ";
			errors.push(day4_error);
	  	}

	  	if(from4 == "none")
	  	{
	  		day4_error = "please set a time you are available from";
			errors.push(day4_error);
	  	}

	  	if(until4 == "none")
	  	{
	  		day4_error = "please set a time you are available until";
			errors.push(day4_error);
	  	}
  	}
  	if(day4 == "none"){
  		if(from4 != 'none' || until4 != 'none')
  		{
  			day4_error = "please set a day";
			errors.push(day4_error);
  		}
  	}

  		if(day5 != "none")
  	{
	  	if(from5 > until5)
	  	{
	  		day5_error = " The from time is later than until time. Call me old fashioned but I thought time could only go forward..?!";
			errors.push(day5_error);
	  	}
	  	if(from5 == until5)
	  	{
	  		day5_error = "The from time is the same as the until time. Surely thats not gonna be enough time for a lesson..?! ";
			errors.push(day5_error);
	  	}

	  	if(from5 == "none")
	  	{
	  		day5_error = "please set a time you are available from";
			errors.push(day5_error);
	  	}

	  	if(until5 == "none")
	  	{
	  		day5_error = "please set a time you are available until";
			errors.push(day5_error);
	  	}
  	}
  	if(day5 == "none"){
  		if(from5 != 'none' || until5 != 'none')
  		{
  			day5_error = "please set a day";
			errors.push(day5_error);
  		}
  	}

  	if(day6 != "none")
  	{
	  	if(from6 > until6)
	  	{
	  		day6_error = " The from time is later than until time. Call me old fashioned but I thought time could only go forward..?!";
			errors.push(day6_error);
	  	}
	  	if(from6 == until6)
	  	{
	  		day6_error = "The from time is the same as the until time. Surely thats not gonna be enough time for a lesson..?! ";
			errors.push(day6_error);
	  	}

	  	if(from6 == "none")
	  	{
	  		day6_error = "please set a time you are available from";
			errors.push(day6_error);
	  	}

	  	if(until6 == "none")
	  	{
	  		day6_error = "please set a time you are available until";
			errors.push(day6_error);
	  	}
  	}
  	if(day6 == "none"){
  		if(from6 != 'none' || until6 != 'none')
  		{
  			day6_error = "please set a day";
			errors.push(day6_error);
  		}
  	}

  	if(day7 != "none")
  	{
	  	if(from7 > until7)
	  	{
	  		day7_error = " The from time is later than until time. Call me old fashioned but I thought time could only go forward..?!";
			errors.push(day7_error);
	  	}
	  	if(from7 == until1)
	  	{
	  		day7_error = "The from time is the same as the until time. Surely thats not gonna be enough time for a lesson..?! ";
			errors.push(day7_error);
	  	}

	  	if(from7 == "none")
	  	{
	  		day7_error = "please set a time you are available from";
			errors.push(day7_error);
	  	}

	  	if(until == "none")
	  	{
	  		day7_error = "please set a time you are available until";
			errors.push(day7_error);
	  	}
  	}
  	if(day7 == "none"){
  		if(from7 != 'none' || until7 != 'none')
  		{
  			day7_error = "please set a day";
			errors.push(day7_error);
  		}
  	}

  	if(day1 == "none" && day2 == "none" && day3 == "none" && day4 == "none" && day5 == "none" && day6 == "none" && day7 == "none")
  	{
	  		day7_error = "Please give at least one time when you might be free for lessons. You can arrrange a more suitable with your tutor later";
			errors.push(day7_error);
  	}

  	document.getElementById("day1_error").innerHTML = day1_error;
  	document.getElementById("day2_error").innerHTML = day2_error;
  	document.getElementById("day3_error").innerHTML = day3_error;
  	document.getElementById("day4_error").innerHTML = day4_error;
  	document.getElementById("day5_error").innerHTML = day5_error;
  	document.getElementById("day6_error").innerHTML = day6_error;
  	document.getElementById("day7_error").innerHTML = day7_error;

  	var size = Object.keys(errors).length;

	if(size == 0) 
	{	
		form.submit();
	} 

} 
