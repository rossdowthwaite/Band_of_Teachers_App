<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

include '../../../includes/auth.php';
include '../../../includes/functions.php';
include '../../../includes/registration_functions.php';

sec_session_start();

if(login_check($mysqli) !== true) 
	{
	header('Location: ../../login.php');
 	}

if(!isset($_SESSION['genres']))
	{
			echo "<script>";
			echo "window.location = \"tuition_process_fail.php\";";
			echo "</script>";
	}

?>

<!DOCTYPE html>
<html lang = en>

<head>
	<meta charset="utf-8">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> 
	<script type="text/javascript" src="../../../javascripts/sha512.js"></script>
	<script type="text/javascript" src="../../../javascripts/forms.js"></script>
	<script type="text/javascript" src="../../../javascripts/register_user.js"></script>  <!-- used to register new user - validates input-->

	<title>Template</title>
<head/>
<body>
<?php

	echo $_SESSION['stu_ID'] . '<br>';
	echo $_SESSION['stu_name'] . '<br>';

?>
	<div id='main'>
	
	<form action="process_bands.php" method="post" name="set_genres">

			Favourite Band No.1
			<input type="text" name="band1" id="band1"><br>
				
			Favourite Band No.2
			<input type="text" name="band2" id="band2"><br>
				
			Favourite Band No.3
			<input type="text" name="band3" id="band3"><br>
				
	<input class="btn_150x30" type="submit" value="next">
	</table>
</center>
</form>
	
	</div>	
</body>