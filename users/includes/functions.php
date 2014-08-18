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
			  if($stmt->num_rows == 1) 
			  { // If the user exists
				 // We check if the account is locked from too many login attempts
				if(checkbrute($username, $mysqli) == true) 
				{ 
					// Account is locked
					// Send an email to user saying their account is locked
					return false;
				} 
				else 
				{
				 	if($db_password == $password) 
				 	{ // Check if the password in the database matches the password the user submitted. 
					// Password is correct!
					   $ip_address = $_SERVER['REMOTE_ADDR']; // Get the IP address of the user. 
					   $user_browser = $_SERVER['HTTP_USER_AGENT']; // Get the user-agent string of the user.
					   $_SESSION['ID'] = $ID; 
					   $username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username); // XSS protection as we might print this value
					   $_SESSION['username'] = $username;
					   $_SESSION['login_string'] = hash('sha512', $password.$ip_address.$user_browser);
					   // Login successful.
					   return true;    
				 	} 
				 	else 
				 	{
					 	echo 'incorrect passsword';
						// Password is not correct
						// We record this attempt in the database
						$now = time();
						$mysqli->query("INSERT INTO login_attempts (username, time) VALUES ('$username', '$now')");
						return false;
				 	}
			  	}
			  } 
			  else 
			  {
				 // No user exists. 
				 return false;
			  }
		   }
		}

function getUserType($ID, $mysqli)
{
		if ($stmt = $mysqli->prepare("SELECT userType FROM UserType WHERE ID = ? ;"))
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
		   if(isset($_SESSION['ID'], $_SESSION['username'], $_SESSION['login_string'])) 
		   {
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

function getName($mysqli, $ID)
	{
		if ($stmt = $mysqli->prepare("SELECT fname, lname FROM Contacts WHERE ID = ? ;"))
		{ 
			  $stmt->bind_param('i', $ID); // Bind "$user" to parameter.
			  $stmt->execute(); // Execute the prepared query.
			  $stmt->store_result();
			  $stmt->bind_result($fname, $lname); // get variables from result.
			  $stmt->fetch();
			  if($stmt->num_rows == 1) 
			  	{
			  		$_SESSION['fullName'] = "" . $fname . " " . $lname;
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

function insertGoal($mysqli, $stu_ID, $goal)
	{
	$query = ("INSERT INTO StudentGoals(stu_ID, goal) VALUES (".$stu_ID.", '".$goal."');");
	if($stmt = $mysqli->query($query)) 
		{
			return true;
		}
		else
		{
			echo 'goal didnt work';
		}
	}

function insertAvailabilty($mysqli, $stu_ID, $day, $start, $end)
	{
	$query = ("INSERT INTO StudentAvailability(stu_ID, dayOfWeek, start_time, end_time) VALUES (".$stu_ID.", '".$day."','".$start."','".$end."');");
	if($stmt = $mysqli->query($query)) 
		{
			return true;
		}
		else
		{
			echo ' availability didnt work';
		}
	}

function insertStudentPref($mysqli, $stu_ID, $genres, $where, $length, $notes, $experience)
	{
	$query = ("INSERT INTO StudentPref VALUES (".$stu_ID.", '".$genres."','".$where."','".$length."','".$notes."','".$experience."');");
	if($stmt = $mysqli->query($query)) 
		{
			return true;
		}
		else
		{
			echo 'pref didnt work';
		}
	}

function insertTuition($mysqli, $stu_ID, $instrument)
	{
	$query = ("INSERT INTO Tuition (student, instrument) VALUES (".$stu_ID.", '".$instrument."');");
	if($stmt = $mysqli->query($query)) 
		{
			return true;
		}
		else
		{
			echo 'tuition didnt work';
		}
	}
?>