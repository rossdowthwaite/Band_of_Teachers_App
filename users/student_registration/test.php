<?php
include '../includes/auth.php';
include '../includes/functions.php';
include '../includes/registration_functions.php';

sec_session_start();

$dob = $_POST['dob']; 

echo $dob;

?>