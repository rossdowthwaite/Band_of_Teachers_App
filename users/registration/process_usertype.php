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

if(isset($_SESSION['userComplete']))
	{
	if(isset($_SESSION['emailComplete']))
		{
		if(isset($_SESSION['typeComplete']))
			{
			if(isset($_SESSION['addressComplete']))
				{
					$_SESSION['sofarsogood'] = 'done';
				}
			}
		}
	}

$phone1 = $_POST['phone']; 
$phone2 = $_POST['secondPhone']; 
$_SESSION['phone1'] = $phone1;
$_SESSION['phone2'] = $phone2;	

$usertype = $_SESSION['member'];

if($usertype != 'guardian')
{
	echo "<script>";
    echo "window.location = \"register_age.php\";";
    echo "</script>";
} 
else
{
	echo "<script>";
    echo "window.location = \"process_account.php\";";
    echo "</script>";
}

?>