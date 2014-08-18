<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<?php 
include '../includes/auth.php';
include '../includes/functions.php';
include '../includes/registration_functions.php';

sec_session_start();

if(!isset($_SESSION['emailComplete']))
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
	
		<form action="process_usertype_one.php" method="post" name="new_user">

		UserType:<br>
			<input type="radio" name="userType" value="student" checked="checked">Student<br>
			<input type="radio" name="userType" value="guardian">Guardian
			<input class="btn_150x30" type="submit" value="next">		
		</form>

	</div>	
</body>
