<?php 
include '../includes/auth.php';
include '../includes/functions.php';
include '../includes/registration_functions.php';

sec_session_start();
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
		<form action="process_student.php" method="post" name="new_user">
		Student First name:<br>
			<input type="fname" name="stu_fname" id="stu_fname"><br>
				<div style="visibility: hidden;" name="fname" id="fnameY">Please enter the first name of the student.</div>

		Student Last Name:<br>
			<input type="lname" name="stu_lname" id="stu_lname"><br>
				<div style="visibility: hidden;" name="lname" id="lnameY">Please enter the first last name of the student..</div>

		Students Date of Birth:<br>
			<input type="date" id="dob" name="dob">

		<input class="btn_150x30" type="button" value="next" onClick="formValidateStudent(
																						this.form, 
																						this.form.fname,
																						this.form.lname,
																						this.form.dob)">
		</form>

		
		Registered students:
		<table>
			<tr><td>First Name</td><td>Last Name</td><td>Age</td></tr>
			

	</div>	
</body>