<?php
$error_message = array();

function get_errors()
{
	echo 'fuck you';
	// if(count($error_message) == 0){
	// 	$error_message['none'] = 'none';
	// 	return $error_message;
	// }	
}

function formValidateHash($form, $username, $fname, $lname, $email, $email2, $password, $verify, $member) 
{
	echo 'here';
	$error_message = array();
		if($username == "")
			{
			$error_message['username'] = "You must enter a username. <br/ >";
			}

		username_check( $username );

		if($fname == "")
			{
			$error_message['fname'] = "You must enter your first name . <br/ >";
			}
		if($lname == "")
			{
			$error_message['lname'] = "You must enter your last name. <br/ >";
			}
		if($email == "")
			{
			$error_message['email'] = "You must enter an email address. <br/ >";
			}
		if($email2 == "")
			{
			$error_message['email2'] = "You must verify the email address. <br/ >";
			}

		email_check( $email );

		if($email != $email2)
			{
			$error_message['verfify'] = "The emails you entered do not match. <br/ >";
			}
		if($password == "")
			{
			$error_message['password'] = "You must enter a password. <br/ >";
			}
		if($verify == "")
			{
			$error_message['password2'] = "You must verify the password. <br/ >";
			}
		if($password != $verify)
			{
			$error_message['verify2'] = "The passwords you entered do not match. <br/ >";
			}
		if($member == "Choose")
			{
			$error_message['member'] = "You must select a Member Type. <br/ >";
			}
		if(count($error_message) != 0){
			foreach($msg as $error_message)
			{
				echo $msg;
			}
		}

}

function email_check( $email )
{
$stmt = $mysqli->prepare("SELECT email FROM Contacts WHERE email = ?");
$stmt->bind_param('s', $email); 
$stmt->execute();
$result->store_result();

	if($result->num_rows >= 1)
	{
		$error_message['taken1'] = 'An account with this email address already exists';
	}
	else 
	{
		return true;
	}
}

function username_check( $username )
{
$stmt = $mysqli->prepare("SELECT username FROM Members WHERE username = ?");
$stmt->bind_param('s', $username); 
$stmt->execute();
$result->store_result();

	if($result->num_rows >= 1)
	{
		$error_message['taken2'] = 'Username is already taken';
	}
	else 
	{
		return true;
	}
}



?>