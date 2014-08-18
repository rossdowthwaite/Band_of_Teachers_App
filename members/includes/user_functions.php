<?php

function get_name($ID, $mysqli)
{
	echo 'ok';
	$query = " SELECT fname, lname FROM Contacts WHERE ID = " .$ID. "; ";
	echo 'ok';
	$result = $mysqli->query($query);
	while ($row = $result->fetch_row()) {
        $fname = $row[0];
        $lname = $row[1];
        $fullname = "" .$fname. " " .$lname. "";
    }
	return $fullname;
}

function setAddress($ID, $street, $street2, $city, $county, $postcode, $mysqli)
{
	$query = "UPDATE Contacts SET street='".$street. "', street2='" .$street2. "', city='" .$city. "', county='" .$county. "', postcode= '" .$postcode."' WHERE ID = " .$ID. " ; ";
	$result = $mysqli->query($query);
}
?>