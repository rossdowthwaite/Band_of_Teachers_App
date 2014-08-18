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

if(!isset($_SESSION['sofarsogood']))
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
		Students Date of Birth:<br>
			<form action="process_age.php" method="post" name="user_age">
				<input type="text" name="day" id="day">
				<input type="text" name="month" id="month">
				<input type="text" name="year" id="year"> <br>
				<input class="btn_150x30" type="button" value="next" 
			onClick="validateAge(
				this.form,
				this.form.day,
				this.form.month,
				this.form.year
				)">
<table>
	<tr><td>
			<div style="visibility: visible;" name="dayError1" id="dayError1"></div>
		</td><td>
			<div style="visibility: visible;" name="monthError1" id="monthError1"></div>
		</td><td>
			<div style="visibility: visible;" name="yearError1" id="yearError1"></div>
		</td>
	</tr>
</table>
	</div>	
</body>