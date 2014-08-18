<?php
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