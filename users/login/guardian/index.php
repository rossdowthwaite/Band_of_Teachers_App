<?php

include '../../includes/auth.php';
include '../../includes/functions.php';
include '../../includes/registration_functions.php';

sec_session_start();

if(login_check($mysqli) !== true) 
	{
	header('Location: ../login.php');
 	}

 $ID = $_SESSION['ID'];

?>

<!DOCTYPE html>
<html lang = en>

<head>
	<meta charset="utf-8">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> 
	<script type="text/javascript" src="../../javascripts/sha512.js"></script>
	<script type="text/javascript" src="../../javascripts/forms.js"></script>
	<script type="text/javascript" src="../../javascripts/register_user.js"></script>  <!-- used to register new user - validates input-->

	<title>Template</title>
<head/>
<body>
	<header>
		
		<nav>
		</nav>
	
	</header>
	<div id='main'>
	
	GUARDIAN INDEX PAGE <br>

	Name = <?php echo $_SESSION['fullName']; ?> <br>
	Usertype = <?php echo $_SESSION['userType']; ?> <br>

	<br>
	<a href="">Profile Info</a><br>
	<br>

<table>

	<?php

	$query = "SELECT stu_ID, fname, lname FROM Students WHERE ID = " .$ID;
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

	$count = $result->num_rows; 

	if($count == 0)
	{
		echo 'No students registered';
	}
	else
	{

	    while ($row = $result->fetch_assoc()) 
	    {
	    	echo '<tr>';
	    		echo '<td>';
					echo ($row["fname"]) ." ".($row["lname"]);
				echo '</td>';
				echo '<td>';
					echo "<form method='get' action='../student/index.php'>";
	    				echo "<input type='hidden' name='stu_ID' value='".($row["stu_ID"])."'>";
	    				echo "<input type='hidden' name='fname' value='".($row["fname"])."'>";
	    				echo "<input type='hidden' name='lname' value='".($row["lname"])."'>";
	    				echo "<input type='submit' Value='View Profile'>";
					echo "</form>";
				echo '</td>';
			echo '</tr>';
	    }
	
	}

	?>
</table>
	<br>
	<a href="add_student.php">Add Student</a><br>




	</div>	
</body>