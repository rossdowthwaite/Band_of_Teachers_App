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

if(!isset($_SESSION['experience']))
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
	
	<form action="process_genres.php" method="post" name="set_genres">
	<center>
	<table width=500px height=400>
		<tr>
			<td><input type="checkbox" name="genres[]" value="Rock">Rock</td>
			<td><input type="checkbox" name="genres[]" value="Funk">Funk</td>
			<td><input type="checkbox" name="genres[]" value="Blue">Blues</td>
		</tr>
		<tr>
			<td><input type="checkbox" name="genres[]" value="Jazz">Jazz</td>
			<td><input type="checkbox" name="genres[]" value="Classical">Classical</td>
			<td><input type="checkbox" name="genres[]" value="Ska">Ska</td>
		</tr>
		<tr>
			<td><input type="checkbox" name="genres[]" value="Reggae">Reggae</td>
			<td><input type="checkbox" name="genres[]" value="Rockabilly">Rockabilly</td>
			<td><input type="checkbox" name="genres[]" value="Folk">Folk</td>
		</tr>
		<tr>
			<td><input type="checkbox" name="genres[]" value="Garage">Garage</td>
			<td><input type="checkbox" name="genres[]" value="Pop">Pop</td>
			<td><input type="checkbox" name="genres[]" value="Punk">Punk</td>
		</tr>
		<tr>
			<td><input type="checkbox" name="genres[]" value="Post-Punk">Post-Punk</td>
			<td><input type="checkbox" name="genres[]" value="Grunge">Grunge</td>
			<td><input type="checkbox" name="genres[]" value="Dance">Dance</td>
		</tr>
		<tr>
			<td><input type="checkbox" name="genres[]" value="House">House</td>
			<td><input type="checkbox" name="genres[]" value="Electro">Electro</td>
			<td><input type="checkbox" name="genres[]" value="Dance">Dance</td>
		</tr>
		<tr>
			<td><input type="checkbox" name="genres[]" value="Dub-step">Dub-step</td>
			<td><input type="checkbox" name="genres[]" value="Hip-Hop">Hip-Hop</td>
			<td><input type="checkbox" name="genres[]" value="Drum'n'Bass">Drum 'n' Bass</td>
		</tr>
		<tr>
			<td colspan=3><center><input class="btn_150x30" type="submit" value="next"></center></td>
	</table>
</center>
</form>
	
	</div>	
</body>