<?php 
include 'includes/auth.php';
include 'includes/functions.php';

sec_session_start();
if(login_check($mysqli) !== true) 
	{
	header('Location: ./login.php');
 	}
?>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> 
<script type="text/javascript" src="javascripts/sha512.js"></script>
<script type="text/javascript" src="javascripts/forms.js"></script>
<script type="text/javascript" src="javascripts/add_user.js"></script>  

<form action="process_contact_details.php" method="post" name="contact_details">
Street Address 1:<br>
<input type="street1" name="street1"><br>
<div style="visibility: hidden;" name="streetEr" id="streetEr">Please enter a street address</div>

Street Address 2:<br>
<input type="street2" name="street2" id="street2"><br>

City:<br>
<select type="city" name="city" id="city">
	<option value="Brighton">Brighton</option>
</select><br>
<div style="visibility: hidden;" name="cityEr" id="cityEr">Please enter a city</div>

County:<br>
<select type="county" name="county" id="county">
	<option value="East Sussex">East Sussex</option>
</select><br>
<div style="visibility: hidden;" name="countyEr" id="countyEr">Please enter a county.</div>

Post Code:<br>
<input type="text" name="postcode" id="postcode"><br>
<div style="visibility: hidden;" name="postcodeEr" id="postcodeEr">Please enter your postcode.</div>

Contact Number:<br>
<input type="text" name="number" id="number"><br>
<div style="visibility: hidden;" name="numberEr" id="numberEr">Please enter your main contact number</div>
<div style="visibility: hidden;" name="number2Er" id="number2Er">Please enter digits only as phone number</div>

<input class="btn_150x30" type="button" value="contact" 
onClick="validateContactDetails(
	this.form,
	this.form.street1,
	this.form.street2,
	this.form.city,
	this.form.county,
	this.form.postcode,
	this.form.number
	)">

