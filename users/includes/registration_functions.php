<?php

//Check the email address entered against the database to search for duplicates

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
				echo "alert(\"There is already an account with this email\");";
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

//Check the username entered against the database to search for duplicates

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
					echo "alert(\"There is already an account with this username\");";
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

function getUserID( $username, $mysqli )
{
	if($stmt = $mysqli->prepare("SELECT ID FROM Contacts WHERE username = ?"))
		{
		$stmt->bind_param('s', $username); 
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($ID); // get ID from result.
		$stmt->fetch();
		return $ID;
		}
	else 
	{
		return false;
		//echo 'email query failed<br>';	
	}
}

function setupUserType( $ID, $member, $mysqli )
{
	$query = ("INSERT INTO UserType VALUES (".$ID.", '".$member."');"); // Use ID to insert member type 
	if($stmt = $mysqli->query($query)) 
		{
			return true;
		}
}

function setupUserPhone($ID, $phone1, $phone2, $mysqli)
{

	$query = ("INSERT INTO PhoneNumbers VALUES ('" .$phone1. "' ," .$ID.", 1 );"); //
	if($stmt = $mysqli->query($query)) 
		{
			return true;
		}
	if($phone2 != '')
		{
			$query2 = ("INSERT INTO PhoneNumbers VALUES ('" .$phone2. "' ," .$ID.", 0 );"); 
			if($stmt = $mysqli->query($query2)) 
				{
					return true;
				}
		}
}

function setupStudentAccount($ID, $dob, $fname, $lname, $mysqli)
{
	$query = ("INSERT INTO Students (ID, dateOfBirth, fname, lname) VALUES (".$ID." , '".$dob."' , '".$fname."', '".$lname."');"); //
	if($stmt = $mysqli->query($query)) 
		{
			return true;
		}
}

function getStudent( $mysqli, $ID )
{
	if($stmt = $mysqli->prepare("SELECT fname, lname, dateOfBirth FROM students WHERE $ID = ? ;"))
		{
		$stmt->bind_param('i', $ID); 
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($ID); // get ID from result.
		$stmt->fetch();
		return $ID;
		}
	else 
	{
		return false;
		//echo 'email query failed<br>';	
	}

}

function registrationSuccessEmail($fname, $lname, $userType, $username, $pw, $email)
{
	$to = $email;
	$subject = "Band of Teachers - Registration Successful!!!";

	$message = "Hello " .$fname. " " .$lname. "! <br> <br> 

				Thankyou For registering with Band of Teachers <br> <br>

				Your username and password are set as follows: <br> <br>

				Username : " .$username. "<br> 
				Password : " .$pw. "<br> <br>
				Registered as = " .$userType. "<br> <br>

				Please keep this information safe, you will need it to log into you account.

				";



	$from = "info@bandofteachers.co.uk";
	$headers = "From:" . $from;
	mail($to,$subject,$message,$headers);

            echo $message;

}

?>