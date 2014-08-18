<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
 
include '../includes/auth.php';
include '../includes/functions.php';
include '../includes/registration_functions.php';

sec_session_start();

if(!isset($_SESSION['userComplete']))
{
	echo "<script>";
	echo "window.location = \"process_fail.php\";";
	echo "</script>";
}
?>


<!DOCTYPE html>
<html lang = en>

<head>
	<meta charset="utf-8">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> 
	<script type="text/javascript" src="../javascripts/sha512.js"></script>
	<script type="text/javascript" src="../javascripts/forms.js"></script>
	<script type="text/javascript" src="../javascripts/register_user.js"></script>  <!-- used to register new user - validates input-->

	<title>Template</title>

<head/>
<body>
	<header>
		
		<nav>
		</nav>
	
	</header>
	<div id='main'>
	
		<form action="process_email.php" method="post" name="new_user">
		First Name:<br>
			<input type="fname" name="fname" id="fname"><br>
				<div style="visibility: visible;" name="fnameError" id="fnameError"></div>
		Last Name:<br>
			<input type="lname" name="lname" id="lname"><br>
				<div style="visibility: visible;" name="lnameError" id="lnameError"></div>
		Email:<br>
			<input type="email" name="email" id="email"><br>
				<div style="visibility: visible;" name="emailError" id="emailError"></div>
		Verify:<br>
			<input type="email" name="email2" id="email2"><br>
				<div style="visibility: visible;" name="verifyError" id="verifyError"></div>

		<input class="btn_150x30" type="button" value="next" onClick="formValidateEmail(
																						this.form, 
																						this.form.fname,
																						this.form.lname, 
																						this.form.email, 
																						this.form.email2)">		
		</form>
	</div>	
</body>
