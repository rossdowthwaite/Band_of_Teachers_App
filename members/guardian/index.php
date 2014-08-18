<?php 
include '../includes/auth.php';
include '../includes/functions.php';

sec_session_start();

echo 'this is the Guardian homepage';

$type = $_SESSION['user_id'];
$account = $_SESSION['ID'];

echo "Member Type = " . $type . "<br />";
echo 'Account No = ' . $account. '<br />';

?>