<?php

function sec_session_start() 
		{
			$session_name = 'sec_session_id'; // Set a custom session name
			$secure = false; // Set to true if using https.
			$httponly = true; // This stops javascript being able to access the session id. 
			ini_set('session.use_only_cookies', 1); // Forces sessions to only use cookies. 
			$cookieParams = session_get_cookie_params(); // Gets current cookies params.
			session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly); 
			session_name($session_name); // Sets the session name to the one set above.
			session_start(); // Start the php session
			session_regenerate_id(true); // regenerated the session, delete the old one.     
		}

function setupUser($mysqli, $username, $memberType)
{
		if ($stmt = $mysqli->prepare("SELECT ID FROM Contacts WHERE username = ? ;") // get user ID from username
		{ 
			  $stmt->bind_param('s', $username); // Bind "$user" to parameter.
			  $stmt->execute(); // Execute the prepared query.
			  $stmt->store_result();
			  $stmt->bind_result($ID); // get ID from result.
			  $stmt->fetch();
			  if($stmt->num_rows == 1) 
			  {
					$query1 = ("INSERT INTO UserSetup VALUES " .$ID .", 0") // Use ID to insert start value to zero
					if(!$stmt = $mysqli->query($query1)) 
					{
						return false;
					}

			  		$query2 = ("INSERT INTO UserType VALUES ".$ID.", '".$memberType."';") // Use ID to insert member type 
					if(!$stmt = $mysqli->query($query2)) 
					{
						return false;
					}
			  } 
			  else 
			  {
			  		return false;
			  }
		} 
		else 
		{
			  return false;
		}	  
}

function getUserType( $ID, $mysqli,){
		if ($stmt = $mysqli->prepare("SELECT userType FROM UserTypes WHERE ID = ? ;")
		{ 
			  $stmt->bind_param('i', $ID); // Bind "$user" to parameter.
			  $stmt->execute(); // Execute the prepared query.
			  $stmt->store_result();
			  $stmt->bind_result($userType); // get variables from result.
			  $stmt->fetch();
			  if($stmt->num_rows == 1) 
			  {
			  		$_SESSION['userType'] = $userType;
			  } 
			  else 
			  {
			  		return false;
			  }
		} 
		else 
		{ 
			return false;
		}	
}

function updateUserSetup( $mysqli, $ID )
	{
		if ($stmt = $mysqli->prepare("UPDATE UserSetup SET no_of_logins = no_of_logins + 1 WHERE ID = ? ;")
		{ 
			$stmt->bind_param('i', $ID); // Bind "$user" to parameter.
			$stmt->execute(); // Execute the prepared query.
		}
		else 
		{
			 return false;
		} 	
	}

function getLoginCount( $mysqli, $ID )
{
		if ($stmt = $mysqli->prepare("SELECT no_of_logins FROM UserSetup WHERE ID = ? ;")
		{ 
			$stmt->bind_param('i', $ID); // Bind "$user" to parameter.
			$stmt->execute(); // Execute the prepared query.
			$stmt->store_result();
			$stmt->bind_result($count); // get variables from result.
			$stmt->fetch();
			return $count;
		}
		else 
		{
			 return false;
		} 
}

function getAddressCompletion( $mysqli, $ID )
{
		if ($stmt = $mysqli->prepare("SELECT address FROM UserSetup WHERE ID = ? ;")
		{ 
			$stmt->bind_param('i', $ID); // Bind "$user" to parameter.
			$stmt->execute(); // Execute the prepared query.
			$stmt->store_result();
			$stmt->bind_result($count); // get variables from result.
			$stmt->fetch();
			return $addressComplete
		}
		else 
		{
			 return false;
		} 
}

function getPhoneCompletion( $mysqli, $ID )
{
		if ($stmt = $mysqli->prepare("SELECT address FROM UserSetup WHERE ID = ? ;")
		{ 
			$stmt->bind_param('i', $ID); // Bind "$user" to parameter.
			$stmt->execute(); // Execute the prepared query.
			$stmt->store_result();
			$stmt->bind_result($count); // get variables from result.
			$stmt->fetch();
			return $phoneComplete
		}
		else 
		{
			 return false;
		} 
}

function login($user, $password, $mysqli) 
		{
		   // Using prepared Statements means that SQL injection is not possible. 
		   if ($stmt = $mysqli->prepare("SELECT Members.username, password, salt, Contacts.ID FROM Members JOIN Contacts ON Members.username = Contacts.username WHERE Members.username = ? LIMIT 1")) { 
			  $stmt->bind_param('s', $user); // Bind "$user" to parameter.
			  $stmt->execute(); // Execute the prepared query.
			  $stmt->store_result();
			  $stmt->bind_result($username, $db_password, $salt, $ID); // get variables from result.
			  $stmt->fetch();
			  $password = hash('sha512', $password.$salt); // hash the password with the unique salt.
			  if($stmt->num_rows == 1) { // If the user exists
				 // We check if the account is locked from too many login attempts
				 if(checkbrute($username, $mysqli) == true) { 
					// Account is locked
					// Send an email to user saying their account is locked
					return false;
				 } else {
				 if($db_password == $password) { // Check if the password in the database matches the password the user submitted. 
					// Password is correct!
					   $ip_address = $_SERVER['REMOTE_ADDR']; // Get the IP address of the user. 
					   $user_browser = $_SERVER['HTTP_USER_AGENT']; // Get the user-agent string of the user.
					   $_SESSION['ID'] = $ID; 
					   $username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username); // XSS protection as we might print this value
					   $_SESSION['username'] = $username;
					   $_SESSION['login_string'] = hash('sha512', $password.$ip_address.$user_browser);
					   getUserType( $mysqli, $ID);
					   updateUserSetup( $mysqli, $ID);
					   // Login successful.
					   return true;    
				 } else {
				 	echo 'incorrect passsword';
					// Password is not correct
					// We record this attempt in the database
					$now = time();
					$mysqli->query("INSERT INTO login_attempts (username, time) VALUES ('$username', '$now')");
					return false;
				 }
			  }
			  } else {
				 // No user exists. 
				 return false;
			  }
		   }
		}



function checkbrute($user_id, $mysqli) {
		   // Get timestamp of current time
		   $now = time();
		   // All login attempts are counted from the past 2 hours. 
		   $valid_attempts = $now - (2 * 60 * 60); 
		 
		   if ($stmt = $mysqli->prepare("SELECT time FROM login_attempts WHERE user_id = ? AND time > '$valid_attempts'")) { 
			  $stmt->bind_param('i', $user_id); 
			  // Execute the prepared query.
			  $stmt->execute();
			  $stmt->store_result();
			  // If there has been more than 5 failed logins
			  if($stmt->num_rows > 5) {
				 return true;
			  } else {
				 return false;
			  }
		   }
		}


function login_check($mysqli) 
		{
		   // Check if all session variables are set
		   if(isset($_SESSION['user_id'], $_SESSION['username'], $_SESSION['login_string'])) 
		   {
			 $user_id = $_SESSION['user_id'];
			 $login_string = $_SESSION['login_string'];
			 $username = $_SESSION['username'];
			 $ID = $_SESSION['ID'];
			 $ip_address = $_SERVER['REMOTE_ADDR']; // Get the IP address of the user. 
			 $user_browser = $_SERVER['HTTP_USER_AGENT']; // Get the user-agent string of the user.
		 
			 if ($stmt = $mysqli->prepare("SELECT password FROM Members WHERE username = ? LIMIT 1")) 
			 { 
				$stmt->bind_param('s', $username); // Bind "$user_id" to parameter.
				$stmt->execute(); // Execute the prepared query.
				$stmt->store_result();
		 
				if($stmt->num_rows == 1) 
				{ // If the user exists
				   $stmt->bind_result($password); // get variables from result.
				   $stmt->fetch();
				   $login_check = hash('sha512', $password.$ip_address.$user_browser);
				   
				   if($login_check == $login_string) 
				   {
					  // Logged In!!!!
					  return true;
				   } 
				   else 
				   {
					  // Not logged in
					  return false;
				   }
				   
				} 
				else 
				{
					// Not logged in
					return false;
				}
				
			 } 
			 else 
			 {
				// Not logged in
				return false;
			 }
			 
		   } 
		   else 
		   {
			 // Not logged in
			 return false;
		   }
		}
	
function mysql_slashes_prep( $value )
	{
		$magic_quotes_active = get_magic_quotes_gpc();
		$new_enough_php = function_exists( "mysql_real_escape_string" );
		// For example, if PHP >= v4.3.0
		if( $new_enough_php )// PHP v4.3.0 or higher
		{
		//undo any magic quote effects so mysql_real_escape_string can do the work
			if( $magic_quotes_active ) { $value = stripslashes( $value ); }
			$value = mysql_real_escape_string( $value );
		}
		else
		{ // before PHP 4.3.0
			// if magic quotes aren't already on then add slahes manually
			if( !$magic_quotes_active ) { $value = addslashes( $value ); }
			// if magic quotes are active, then the slashes already exist
		}
		return $value;
	}

function redirect_to( $location = NULL )
	{
		if ($location != NULL)
		{
		header("location: {$location}");
		exit;
		}
	}

function email_check($email, $mysqli)
{
	if($stmt = $mysqli->prepare("SELECT email FROM Contacts WHERE email = ?"))
		{	
		$stmt->bind_param('s', $email);
		$stmt->execute();
		$stmt->store_result();

			if($stmt->num_rows >= 1)
			{
				echo "<script>";
				echo "alert(\"There is already an account with this username\");";
				echo "</script>";
			}
			else 
			{
				return true;
				//echo 'executed username query<br>';
			}
		}
	else 
	{
		return false;
		//echo 'username query failed<br>';	
	}
}		
//echo('worked');

function username_check( $username,  $mysqli )
{
	if($stmt2 = $mysqli->prepare("SELECT username FROM Members WHERE username = ?"))
		{
		$stmt2->bind_param('s', $username); 
		$stmt2->execute();
		$stmt2->store_result();

			if($stmt2->num_rows >= 1)
			{
					echo "<script>";
					echo "alert(\"There is already an account with this email address\");";
					echo "</script>";
			}
			else 
			{
				return true;
				//echo 'executed email query<br>';
			}
		}
	else 
	{
		return false;
		//echo 'email query failed<br>';	
	}
}
//echo('worked2');

// function register_member($username, $password, $member, $salt, $mysqli) 
// {
// 	if ($mysqli->ping()) {
//     printf ("Our connection is ok!\n");
// 	} else {
//     printf ("Error: %s\n", $mysqli->error);
// 	}
// 	$stmt3 = $mysqli->prepare("INSERT INTO Members (username, password, type, salt) VALUES (?,?,?,?)");
// 	$stmt3->bind_param(1, $username);
// 	$stmt3->bind_param(2, $password);
// 	$stmt3->bind_param(3, $type);
// 	$stmt3->bind_param(4, $salt);
// 	$stmt3->execute(); 
// 		if($stmt3->execute())
// 		{
// 			echo "<script>";
// 			echo "alert(\"New Member Successfully Added!\");";
// 			echo "</script>";
// 		}
// 		else
// 		{
// 			echo 'i hate my life';
// 		}
// }
// //echo('worked3');

// function test($mysqli){
// 	$insert_stmtTwo = $mysqli->prepare("INSERT INTO Contacts (fname) VALUES 'Brian'"))
// 	$insert_stmtTwo->execute(); // Execute the prepared query.
// }

// function register_contact($fname, $lname, $email, $username, $mysqli) 
// {
// 	if ($mysqli->ping()) 
// 	{
//     	printf ("Our connection is ok!\n");
// 	} else {
//     	printf ("Error: %s\n", $mysqli->error);
// 	}

// if($insert_stmtTwo = $mysqli->prepare("INSERT INTO Contacts (fname, lname, username, email) VALUES (?,?,?,?)"))
// 	{
// 	$insert_stmtTwo->bind_param('ssss', $fname, $lname, $username, $email);
// 	$insert_stmtTwo->execute(); // Execute the prepared query.
	
// 	if($insert_stmtTwo->execute())
// 		{
// 			echo "<script>";
// 			echo "alert(\"New Member Successfully Added!\");";
// 			echo "</script>";
// 		}
//  		else
// 		{
// 			echo 'i hate my life';
// 		}
// 	}
// else
// 	{
// 	echo "<script>";
// 	echo "alert(\"Uh Oh! Something went terribly wrong.\");";
// 	echo "</script>";
// 	}
// }
?>