<?php

include '../../includes/auth.php';
include '../../includes/functions.php';
include '../../includes/registration_functions.php';

sec_session_start();

if(login_check($mysqli) !== true) 
	{
	header('Location: ../login.php');
 	}

$ID = $_SESSION['ID'];

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
	
	GUARDIAN STUDENTS PAGE <br>

	Name = <?php echo $_SESSION['fullName']; ?> <br>
	Usertype = <?php echo $_SESSION['userType']; ?> <br>

	<br>

		<form action="process_student.php" method="post" name="new_student">
		First Name:<br>
			<input type="stu_fname" name="stu_fname" id="stu_fname"><br>
				<div style="visibility: visible;" name="stuFnameError" id="stuFnameError"></div>
		Last Name:<br>
			<input type="lname" name="stu_lname" id="stu_lname"><br>
				<div style="visibility: visible;" name="stuLnameError" id="stuLnameError"></div>
		
		<input class="btn_150x30" type="button" value="next" onClick="formStudent(
																						this.form, 
																						this.form.stu_fname,
																						this.form.stu_lname)">
	
		</form>




	<br>
	<a href="add_student.php">Add Student</a><br>


	</div>	
</body>