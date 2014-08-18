<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

include '../includes/auth.php';
include '../includes/functions.php';
include '../includes/registration_functions.php';
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
	
		<form action="process_username.php" method="post" name="new_user">

		Username:<br>
			<input type="text" name="username" id="username"><br>
				<div style="visibility: visible;" name="userError" id="userError"></div>

		Password:<br>
			<input type="password" name="password" id="password"><br>
				<div style="visibility: visible;" name="passwordError" id="passwordError"></div>

		Verify:<br>
			<input type="password" name="verify" id="verify"><br>
				<div style="visibility: visible;" name="verifyError" id="verifyError"></div>

		<input class="btn_150x30" type="button" value="next" onClick="formValidateHash(
																						this.form, 
																						this.form.username,
																						this.form.password,
																						this.form.verify)">		
		</form>
	</div>	
</body>
