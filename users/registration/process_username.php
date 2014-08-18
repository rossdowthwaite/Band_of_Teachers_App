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

$un_password = $_POST['password']; 



$username = mysql_slashes_prep($_POST['username']);
$salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
$password = hash('sha512', $un_password.$salt);

$_SESSION['salt'] = $salt;
$_SESSION['password'] = $password;
$_SESSION['pw'] = $un_password; 

// check username is unique - if so add to session variable
if(username_check($username, $mysqli))
{
	$verified_username = $username;
	$_SESSION['username'] = $verified_username;
}

if (isset($verified_username))
{
	$_SESSION['userComplete'] = 'done';
	echo "<script>";
	echo "window.location = \"register_email.php\";";
	echo "</script>";
} 
else
{
	echo "<script>";
	echo "window.location = \"process_fail.php\";";
	echo "</script>";
}


?>