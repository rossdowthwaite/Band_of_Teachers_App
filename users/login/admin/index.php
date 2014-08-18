<?php

include '../../includes/auth.php';
include '../../includes/functions.php';
include '../../includes/registration_functions.php';

sec_session_start();

if(login_check($mysqli) !== true) 
	{
	header('Location: ../login.php');
 	}
?>

<!DOCTYPE html>
<html lang = en>

<head>
	<meta charset="utf-8">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> 
	<script type="text/javascript" src="../../javascripts/sha512.js"></script>
	<script type="text/javascript" src="../../javascripts/forms.js"></script>
	<script type="text/javascript" src="../../javascripts/register_user.js"></script>  <!-- used to register new user - validates input-->

	<title>Template</title>
<head/>
<body>
	<header>
		
		<nav>
		</nav>
	
	</header>
	<div id='main'>
	
	GUARDIAN INDEX PAGE <br>

	Name = <?php echo $_SESSION['fullName']; ?> <br>
	Usertype = <?php echo $_SESSION['userType']; ?> <br>

	<br>
	<a href="">Add Student</a><br>
	<a href="">Update Profile Info</a><br> 

	</div>	
</body>