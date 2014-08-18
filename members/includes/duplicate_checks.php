<?php
function username_check( $username )
{
$stmt = $mysqli->prepare("SELECT username FROM Members WHERE username = ?")
$stmt->bind_param('s', $username); 
$stmt->execute();
$result->store_result();

	if($result->num_rows >= 1)
	{
		return false;
	}
	else 
	{
		return true;
	}
}

function email_check( $email )
{
$stmt = $mysqli->prepare("SELECT email FROM Contacts WHERE email = ?")
$stmt->bind_param('s', $email); 
$stmt->execute();
$result->store_result();

	if($result->num_rows >= 1)
	{
		return false;
	}
	else 
	{
		return true;
	}
}

?>