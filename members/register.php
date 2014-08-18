<?php 
include '/includes/auth.php';
include '/includes/functions.php';
?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> 
<script type="text/javascript" src="javascripts/sha512.js"></script>
<script type="text/javascript" src="javascripts/forms.js"></script>
<script type="text/javascript" src="javascripts/add_user.js"></script>  

<form action="process_new_user.php" method="post" name="new_user">
Username:<br>
<input type="text" name="username"><br>
<div style="visibility: hidden;" name="user" id="user">You must enter a username.</div>

First Name:<br>
<input type="fname" name="fname" id="fname"><br>
<div style="visibility: hidden;" name="fname" id="fnameY">Please enter your first name.</div>

Last Name:<br>
<input type="lname" name="lname" id="lname"><br>
<div style="visibility: hidden;" name="lname" id="lnameY">Please enter your last name.</div>

Email:<br>
<input type="email" name="email" id="email"><br>
<div style="visibility: hidden;" name="email" id="emailY">Please enter an email address.</div>

Verify:<br>
<input type="email" name="email2" id="email2"><br>
<div style="visibility: hidden;" name="email2" id="email2Y">Please verify the email address.</div>
<div style="visibility: hidden;" name="email3" id="email3">The emails you entered do not match.</div>

Password:<br>
<input type="password" name="password" id="password"><br>
<div style="visibility: hidden;" name="password" id="passwordY">Please enter a password.</div>

Verify:<br>
<input type="password" name="verify" id="verify"><br>
<div style="visibility: hidden;" name="verify" id="verifyY">Please verify the password.</div>
<div style="visibility: hidden;" name="verify" id="verifyY2">The passwords you entered do not match.</div>

Usertype:<br>
<input type="member" id="member" name="member" value="student">student<br>
<input type="member" id="member" name="member" value="guardian">guardian
<div style="visibility: hidden;" name="userEr" id="userEr">You must select a user type</div>


<input class="btn_150x30" type="button" value="Add User" 
onClick="formValidateHash(
	this.form, 
	this.form.username,
	this.form.fname,
	this.form.lname, 
	this.form.email, 
	this.form.email2, 
	this.form.password,
	this.form.verify,
	this.form.member)">

