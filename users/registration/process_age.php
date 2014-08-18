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

$day = mysql_slashes_prep($_POST['day']);
$month = mysql_slashes_prep($_POST['month']);
$year = mysql_slashes_prep($_POST['year']);

$date_of_brith = ''.$year.'-'.$month.'-'.$day.'';

$_SESSION['dob'] = $date_of_brith;

            echo "<script>";
            echo "window.location = \"process_student_account.php\";";
            echo "</script>";
?>