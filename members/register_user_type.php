<?php 
include '/includes/auth.php';
include '/includes/functions.php';
?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> 
<script type="text/javascript" src="javascripts/sha512.js"></script>
<script type="text/javascript" src="javascripts/forms.js"></script>
<script type="text/javascript" src="javascripts/add_user.js"></script>  

<form action="process_user_type.php" method="post" name="new_user">

Usertype:<br>
<input type="userType" id="userType" name="userType" value="student">student<br>
<input type="userType" id="userType" name="userType" value="guardian">guardian
<div style="visibility: hidden;" name="userEr" id="userEr">You must slect a user type</div>

<input class="btn_150x30" type="button" value="Add User" 
onClick="formValidateUserType(
	this.form, 
	this.form.userType)">

