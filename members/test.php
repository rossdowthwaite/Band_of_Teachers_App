<?php // connect
require_once 'auth.php';


$query = "SELECT Contacts.fname, Contacts.lname FROM Contacts JOIN Members ON Contacts.username = Members.username WHERE Members.username = 'brianjones'";
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

echo '<table>';
    while ($row = $result->fetch_assoc()) {

echo '<tr>';
	echo '<td>';
        printf ($row["fname"]);
	echo '<td />';
	echo '<td>';
        printf ($row["lname"]);
	echo '<td />';
echo '<tr>';
    }
echo '<table />';

?>