<?php

include '../../includes/auth.php';
include '../../includes/functions.php';
include '../../includes/registration_functions.php';

sec_session_start();

if(login_check($mysqli) !== true) 
	{
	header('Location: ../login.php');
 	}

$stu_fname = mysql_slashes_prep($_POST['stu_fname']); 
$stu_lname = mysql_slashes_prep($_POST['stu_lname']); 

$_SESSION['stu_fname'] = $stu_fname;
$_SESSION['stu_lname'] = $stu_lname;

	echo "<script>";
	echo "window.location = \"register_student_age.php\";";
	echo "</script>";

?>

