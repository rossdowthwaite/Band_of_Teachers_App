<?php
include 'includes/auth.php';
include 'includes/functions.php';

sec_session_start();

$un_password = $_POST['password']; 
$username = mysql_slashes_prep($_POST['username']);
$email = mysql_slashes_prep($_POST['email']);
$fname = mysql_slashes_prep($_POST['fname']);
$lname = mysql_slashes_prep($_POST['lname']);
$salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
$password = hash('sha512', $un_password.$salt);

$_SESSION['fname'] = $fname;
$_SESSION['lname'] = $lname;
$_SESSION['salt'] = $salt;
$_SESSION['password'] = $password;

// check email is unique - if so add to session variable
if(email_check($email, $mysqli))
{
	$verified_email = $email;
	$_SESSION['email'] = $verified_email;
}
// check username is unique - if so add to session variable
if(username_check($username, $mysqli))
{
	$verified_username = $username;
	$_SESSION['username'] = $verified_username;
}

if ((isset($verified_username)) && (isset($verified_email)))
{
	echo "<script>";
	echo "window.location = \"register_user_type.php\";";
	echo "</script>";
} 
else
{
	echo "<script>";
	echo "window.location = \"register.php\";";
	echo "</script>";
}


?>