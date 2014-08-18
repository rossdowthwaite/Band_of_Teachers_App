<?php
include 'includes/auth.php';
include 'includes/functions.php';
include 'includes/user_functions.php';

sec_session_start();
$street1 = $_POST['street1'];
$street2 = $_POST['street2'];
$city = $_POST['city'];
$county = $_POST['county'];
$postcode = $_POST['postcode'];
echo $postcode ."<br>";
echo $county;
$number = $_POST['number'];

$account = $_SESSION['ID'];


setAddress($account, $street1, $street2, $city, $county, $postcode, $mysqli);

?>