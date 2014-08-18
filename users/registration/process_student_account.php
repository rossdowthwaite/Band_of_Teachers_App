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



//get user sessions
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$salt = $_SESSION['salt'];
$password = $_SESSION['password'];
$email = $_SESSION['email'];
$username = $_SESSION['username'];
$pw = $_SESSION['pw'];

//get member session
$member = $_SESSION['member'];

$dob = $_SESSION['dob'];

// get address sessions
$street = $_SESSION['street'];
$city = $_SESSION['city'];
$county = $_SESSION['county'];
$postcode = $_SESSION['postcode'];

$phone1 = $_SESSION['phone1'];
$phone2 = $_SESSION['phone2'];


// intialize an error array
$error = Array();

// ONE: Add member to members table in database
	$query1 = "	INSERT INTO Members (username, password, salt) 
				VALUES ('".$username."', '".$password."', '".$salt."')";
	// if no good store error in array
	if(!$stmt = $mysqli->query($query1)) 
	{
		array_push($error, $mysqli->error);
	} 

// TWO Add contact to contacts table in database
	$query2 = "	INSERT INTO Contacts (fname, lname, email, username, street, city, county, postcode) 
				VALUES ('".$fname."', '".$lname."', '".$email."', '".$username. "','".$street. "','".$city. "','".$county. "','".$postcode. "')";
	// if no good store error in array
	if(!$stmt = $mysqli->query($query2)) 
	{
		array_push($error, $mysqli->error);
	} 
//THREE : get user ID
	$ID = getUserID( $username, $mysqli );

//FOUR : Store user type
	if(!$test = setupUserType($ID, $member, $mysqli)) 
	{
		array_push($error, $mysqli->error);
	}
	if(!$test = setupUserPhone($ID, $phone1, $phone2, $mysqli)) 
	{
		array_push($error, $mysqli->error);
	}
	if(!$test = setupStudentAccount($ID, $dob, $fname, $lname, $mysqli)) 
	{
		array_push($error, $mysqli->error);
	}


	$count = count($error);
	if($count >= 1)
	{
			session_unset();
            echo "<script>";
            echo "window.location = \"register_user.php\";";
            echo "Somehting went wrong -- sorry!!!";
            echo "</script>";
	} 
	else 
	{
		registrationSuccessEmail($fname, $lname, $userType, $username, $pw, $email)
			 session_unset();
            echo "<script>";
            echo "window.location = \"register_success.php\";";
            echo "</script>";
	}



?>