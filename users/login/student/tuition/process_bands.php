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

if($_POST['band1'] == "")
{
	$band1 = 'not set';
} 
else 
{
	$band1 = mysql_slashes_prep($_POST['band1']);
}

if($_POST['band2'] == "")
{
	$band2 = 'not set' ;
} 
else 
{
	$band2 = mysql_slashes_prep($_POST['band2']);
}

if($_POST['band3'] == "")
{
	$band3 = 'not set' ;
} 
else 
{
	$band3 = mysql_slashes_prep($_POST['band3']);
}

$fave_bands = array($band1, $band2, $band3);
 
$bands = implode( ', ', $fave_bands );

$_SESSION['bands'] = $bands;

echo $_SESSION['bands'];

            echo "<script>";
            echo "window.location = \"set_goals.php\";";
            echo "</script>";



?>