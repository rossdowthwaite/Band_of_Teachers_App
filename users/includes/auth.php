<?php
	define('DB_HOST', 'apollo.Krystal.co.uk');
    define('DB_USER', 'bandofte');
    define('DB_PASSWORD', 'YnCJmGd3');
    define('DB_DATABASE', 'bandofte_contacts');

        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
// If you are connecting via TCP/IP rather than a UNIX socket remember to add the port number as a parameter.
	
if($mysqli->connect_errno > 0)
	{
	die('Unable to connect to database [' . $mysqli->connect_error . ']');
	}
?>
