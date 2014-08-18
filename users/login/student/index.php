<?php

include '../../includes/auth.php';
include '../../includes/functions.php';
include '../../includes/registration_functions.php';

sec_session_start();

if(login_check($mysqli) !== true) 
	{
	header('Location: ../login.php');
 	}

// check if comeing from guadian page 
if(isset($_GET['stu_ID']))
{
	$stu_ID = $_GET['stu_ID'];
	$stu_fname = $_GET['fname'];
	$stu_lname = $_GET['lname'];

	$_SESSION['stu_ID'] = $stu_ID;
	$_SESSION['stu_name'] = $stu_fname . ' ' . $stu_lname;
}
else 
{
	// if not hen its already been set.
	$stu_ID = $_SESSION['stu_ID'];
}

?>

<!DOCTYPE html>
<html lang = en>

<head>
	<meta charset="utf-8">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> 
	<script type="text/javascript" src="../../javascripts/sha512.js"></script>
	<script type="text/javascript" src="../../javascripts/forms.js"></script>
	<script type="text/javascript" src="../../javascripts/register_user.js"></script>  <!-- used to register new user - validates input-->

	<title>Student Index</title>
<head/>
<body>
	<header>
		
		<nav>
		</nav>
	
	</header>
	<div id='main'>
	
	STUDENT INDEX PAGE <br>	

<br>
<?php 
	// header
	if($_SESSION['userType'] == "guardian")
	{
		echo 'Name = ' . $_SESSION['fullName'] . '<br>';
		echo 'Usertype =' . $_SESSION['userType'] . '<br><br>';
	 }

	 echo 'Student = '. $_SESSION['stu_name'];
	 echo ' Student ID = '. $_SESSION['stu_ID'];
?>

<br>
<br>

<?php
// links 
	if($_SESSION['userType'] == "guardian")
	{
		echo "<a href='../guardian/index.php'>Back</a><br>";
	}
	else
	{
		echo "<a href='update/update_index.php'>Update Profile Info</a><br>";
	}
?> 

<center>
	<table>

<?php
	
	$query = "SELECT tuition_ref, instrument, tutor FROM Tuition WHERE student = " .$stu_ID;
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

	$count = $result->num_rows; 

	if($count == 0)
	{
		echo 'No tuition registered';
	}
	else
	{

	    while ($row = $result->fetch_assoc()) 
	    {
	    	echo '<tr>';

	    		echo '<td colspan=4>';
					echo '<center>' .$row["instrument"]. '</center>'; 
				echo '</td>';

			echo '</tr>';
			echo '<tr>';

			if(!$row["tutor"] == NULL)
			{ 
				$query2 = "SELECT fname, lname FROM Contacts WHERE ID = " .$row["tutor"];
				$result2 = $mysqli->query($query2) or die($mysqli->error.__LINE__);

				    while ($row = $result2->fetch_assoc()) 
				    {
				    	echo '<td colspan=4>';
							echo '<center> Tutor: ' .$row["fname"]. ' '  .$row["lname"]. '</center>'; 
						echo '</td>';
				    }
			}
			else
			{
					echo '<td colspan=4>';
					echo '<center> No Tutor Assigned </center>';
					echo '</td>';
			}    	

			echo '</tr>';
			echo '<tr>';	
				
				echo '<td>';
					echo '<a href="">Lesson Diary</a>';
				echo '</td>';

				echo '<td>';
					echo '<a href="">Homework Diary</a>';
				echo '</td>';

				echo '<td>';
					echo '<a href="">Progress Diary</a>';
				echo '</td>';

				echo '<td>';
					echo '<a href="">Payment Diary</a>';
				echo '</td>';

			echo '</tr>';
	    }
	}	
?>
	<tr>
		<td colspan=4>
			<center><a href="">Book Lessons</a></center>
		</td>
	<tr>
	</tr>	
		<td colspan=4>
			<center><a href="tuition/add_instrument/instrument.php">Add Tuition</a></center>
		</td>
	</tr>
	</table>
</center>

	</div>	
</body>