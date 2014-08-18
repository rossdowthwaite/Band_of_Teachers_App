<?php
include 'includes/auth.php';
include 'includes/functions.php';


sec_session_start();

$un_password = $_POST['password']; // The hashed password from the form
//echo 'password = '.$password.'<br>';
$username = mysql_slashes_prep($_POST['username']);
$memberType = mysql_slashes_prep($_POST['member']);
$email = mysql_slashes_prep($_POST['email']);
$fname = mysql_slashes_prep($_POST['fname']);
$lname = mysql_slashes_prep($_POST['lname']);
$salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
//echo 'salt = ' .$salt.'<br>';
$password = hash('sha512', $un_password.$salt);
//echo 'hashed password = '.$password.'<br>';

// check email is unique
if(email_check($email, $mysqli))
{
	$verified_email = $email;
}
// check username is unique
if(username_check($username, $mysqli))
{
	$verified_username = $username;
}

if ((isset($verified_username)) && (isset($verified_email)))
{
	//create a error array to catch error and check if empty at end.
	$error = Array();

	// Add member to members table
	$query1 = "	INSERT INTO Members (username, password, salt) 
				VALUES ('".$verified_username."', '".$password."', '".$salt."')";
	// if no good store error in array
	if(!$stmt = $mysqli->query($query1)) 
	{
		array_push($error, $mysqli->error);
	}
	// Add contact to contacts table
	$query2 = "	INSERT INTO Contacts (fname, lname, username, email) 
				VALUES ('".$fname."', '".$lname."', '".$verified_username. "', '".$verified_email."')";
	// if no good store error in array
	if(!$stmt = $mysqli->query($query2)) 
	{
		array_push($error, $mysqli->error);
	}
	// insert a setup Entry for the user
	if(!setupUser($mysqli, $verified_username, $memberType))
	{
		array_push($error, $mysqli->error);
	}
	
	if(count($error) >= 1)
	{
            echo "<script>";
            echo "window.location = \"register.php\";";
            echo "Somehting went wrong -- sorry!!!";
            echo "</script>";
	} 
	else 
	{
            echo "<script>";
            echo "window.location = \"registration_success.php\";";
            echo "</script>";
	}
} 
else
{
	echo "<script>";
	echo "window.location = \"register.php\";";
	echo "</script>";
}


?>