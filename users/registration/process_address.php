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

$street = mysql_slashes_prep($_POST['street']);
$city = mysql_slashes_prep($_POST['city']);
$county = mysql_slashes_prep($_POST['county']);
$postcode = mysql_slashes_prep($_POST['postcode']);

$_SESSION['street'] = $street;
$_SESSION['city'] = $city;
$_SESSION['county'] = $county;
$_SESSION['postcode'] = $postcode;

$_SESSION['addressComplete'] = 'done';

		echo "<script>";
		echo "window.location = \"register_user_phone.php\";";
		echo "</script>";


?>