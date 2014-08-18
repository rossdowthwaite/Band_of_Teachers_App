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
$stu_fname = $_SESSION['stu_fname']; 
$stu_lname = $_SESSION['stu_lname'];
$dob = $_SESSION['dob'];

$error = Array();

	if(!$test = setupStudentAccount($ID, $dob, $stu_fname, $stu_lname, $mysqli)) 
	{
		array_push($error, $mysqli->error);
	}

	$count = count($error);

	if($count >= 1)
	{

	}
	else
	{
		unset($_SESSION['stu_fname']);
		unset($_SESSION['stu_lname']);
		unset($_SESSION['dob']);

		echo "<script>";
		echo "window.location = \"student_registered_success.php\";";
		echo "</script>";
	}
		
?>