<?php
include '../includes/auth.php';
include '../includes/functions.php';
include '../includes/registration_functions.php';

sec_session_start();

$year = mysql_slashes_prep($_POST['year']);
$day = mysql_slashes_prep($_POST['day']);
$month = mysql_slashes_prep($_POST['month']);

echo $year . '<br>';
echo $day . '<br>';
echo $month . '<br>';

?>