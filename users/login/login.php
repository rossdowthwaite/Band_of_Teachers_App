<?php 
include '../includes/auth.php';
include '../includes/functions.php';
include '../includes/registration_functions.php';


if(isset($_GET['error'])) { 
   echo 'Error Logging In!';
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
	
		<form action="process_login.php" method="post" name="login_form">
		   Username: <input type="text" name="username" id="username"/><br />
		   Password: <input type="password" name="password" id="password"/><br />
		   <input type="button" value="Login" onclick="formhash(this.form, this.form.password);" />
		</form>

	</div>	
</body>