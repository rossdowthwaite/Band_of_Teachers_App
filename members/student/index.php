<?php 
include '../includes/auth.php';
include '../includes/functions.php';
include '../includes/user_functions.php';

sec_session_start();
if(login_check($mysqli) == true) {
 
$type = $_SESSION['user_id'];
$account = $_SESSION['ID'];

$name = get_name($account, $mysqli);
echo "Welecome Back " . $name;


} else {
   echo 'You are not authorized to access this page, please login. <br/>';
}
?>