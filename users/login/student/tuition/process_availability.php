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

$day1 = $_POST['day1'];
$day2 = $_POST['day2'];
$day3 = $_POST['day3'];
$day4 = $_POST['day4'];
$day5 = $_POST['day5'];
$day6 = $_POST['day6'];
$day7 = $_POST['day7'];

$days_available = array();

if($day1 != "none")
{
	$from1 = $_POST['from1'];
	$until1 = $_POST['until1'];

	array_push($days_available, $day1, $from1, $until1);
}

if($day2 != "none")
{
	$from2 = $_POST['from2'];
	$until2 = $_POST['until2'];

	array_push($days_available, $day2, $from2, $until2);
}

if($day3 != "none")
{
	$from3 = $_POST['from3'];
	$until3 = $_POST['until3'];

	array_push($days_available, $day3, $from3, $until3);
}

if($day4 != "none")
{
	$from4 = $_POST['from4'];
	$until4 = $_POST['until4'];

	array_push($days_available, $day4, $from4, $until4);
}

if($day5 != "none")
{
	$from5 = $_POST['from5'];
	$until5 = $_POST['until5'];

	array_push($days_available, $day5, $from5, $until5);
}

if($day6 != "none")
{
	$from6 = $_POST['from6'];
	$until6 = $_POST['until6'];

	array_push($days_available, $day6, $from6, $until6);
}

if($day7 != "none")
{
	$from7 = $_POST['from7'];
	$until7 = $_POST['until7'];

	array_push($days_available, $day7, $from7, $until7);
}


$_SESSION['availability'] = $days_available;

// foreach ($_SESSION['availability'] as $value) {
//     echo $value . "<br>";
//}
            echo "<script>";
            echo "window.location = \"add_instrument/where.php\";";
            echo "</script>";
?>