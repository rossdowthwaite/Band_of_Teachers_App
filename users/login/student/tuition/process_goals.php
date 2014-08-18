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

$goals = array();

if($_POST['goal1'] != "")
{
	$goal1 = mysql_slashes_prep($_POST['goal1']);
	array_push($goals, $goal1);
} 

if($_POST['goal2'] != "")
{
	$goal2 = mysql_slashes_prep($_POST['goal2']);
	array_push($goals, $goal2);
} 

if($_POST['goal3'] != "")
{
	$goal3 = mysql_slashes_prep($_POST['goal3']);
	array_push($goals, $goal3);
} 



$_SESSION['goals'] = $goals;

            echo "<script>";
            echo "window.location = \"availability.php\";";
            echo "</script>";

?>