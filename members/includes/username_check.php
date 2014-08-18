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
?>