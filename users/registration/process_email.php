<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<?php
include '../includes/auth.php';
include '../includes/functions.php';
include '../includes/registration_functions.php';

sec_session_start();

$email = mysql_slashes_prep($_POST['email']);
$fname = mysql_slashes_prep($_POST['fname']);
$lname = mysql_slashes_prep($_POST['lname']);
$_SESSION['fname'] = $fname;
$_SESSION['lname'] = $lname;

// check email is unique - if so add to session variable
if(email_check($email, $mysqli))
{
	$verified_email = $email;
	$_SESSION['email'] = $verified_email;
}


if (isset($verified_email))
{
	$_SESSION['emailComplete'] = 'done';
	echo "<script>";
	echo "window.location = \"register_user_type.php\";";
	echo "</script>";
} 
else
{
	echo "<script>";
	echo "window.location = \"register_email.php\";";
	echo "</script>";
}


?>