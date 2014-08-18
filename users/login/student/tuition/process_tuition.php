<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

include '../../../includes/auth.php';
include '../../../includes/functions.php';
include '../../../includes/registration_functions.php';

sec_session_start();

if(login_check($mysqli) !== true) 
	{
	header('Location: ../../login.php');
 	}

$notes = mysql_slashes_prep($_POST['notes']);

$_SESSION['notes'] = $notes;

// see whats in the sessions

echo $_SESSION['stu_ID'] . '<br>';
$stu_ID = $_SESSION['stu_ID'];

echo $_SESSION['stu_name'] . '<br>';
$stu_name = $_SESSION['stu_name'];

echo $_SESSION['instrument'] . "<br>";
$instrument = $_SESSION['instrument'];

echo $_SESSION['experience'] . "<br>";
$experience = $_SESSION['experience'];

echo $_SESSION['genres'] . "<br>";
$genres = $_SESSION['genres'];

echo $_SESSION['bands'] . "<br>";
$bands = $_SESSION['bands'];

echo $_SESSION['length'] . "<br>";
$length = $_SESSION['length'];

echo $_SESSION['notes'] ."<br>";
$notes = $_SESSION['notes'];

echo $_SESSION['where'] ."<br>";
$where = $_SESSION['where'];

// Begin transaction;
$mysqli->query("START TRANSACTION;");

$error = Array();

// extract goals and insert Goals into DB.
// ========================================
foreach ($_SESSION['goals'] as $goal) 
{
    echo $goal . "<br>";

    if(!insertGoal($mysqli, $_SESSION['stu_ID'], $goal))
    {
		array_push($error, $mysqli->error);
	}
}


// extract availability and insert into DB.
// ========================================

$len = count($_SESSION['availability']);

for($i = 3; $i <= $len; $i+=3) 
{
	$day = $_SESSION['availability'][$i - 3];
	$start = $_SESSION['availability'][$i - 2];
	$end = $_SESSION['availability'][$i - 1];

	// make db compatible
	$start = $start.':00:00';
	$end = $end.':00:00';

	echo $day ."<br>";
	echo $start ."<br>";
	echo $end . "<br>";

if(!insertAvailabilty($mysqli, $stu_ID, $day, $start, $end))
    {
		array_push($error, $mysqli->error);
	}
}
 
// insert Student Preferences into DB.
// ========================================
	
if(!insertStudentPref($mysqli, $stu_ID, $genres, $where, $length, $notes, $experience))
    {
		array_push($error, $mysqli->error);
	}

// insert Tuition into DB.
// ========================================

if(!insertTuition($mysqli, $stu_ID, $instrument))
    {
		array_push($error, $mysqli->error);
	}

// check for errors - Rollbackl or Commit changes.
// ===============================================
$count = count($error);

echo $count;


if($count >= 1)
	{
	$mysqli->query("ROLLBACK;");

			unset($_SESSION['instrument']);
			unset($_SESSION['experience']);
			unset($_SESSION['genres']);
			unset($_SESSION['bands']);
			unset($_SESSION['length']);
			unset($_SESSION['notes']);
			unset($_SESSION['where']);
			unset($_SESSION['availability']);
			unset($_SESSION['goals']);

            echo "<script>";
            echo "window.location = \"add/instrument/instrument.php\";";
            echo "Somehting went wrong -- sorry!!!";
            echo "</script>";
	} 
	else 
	{
		$mysqli->query("COMMIT;");

            echo "<script>";
            echo "window.location = \"tuition_success.php\";";
            echo "</script>";
	}

            // echo "<script>";
            // echo "window.location = \"../final_notes.php\";";
            // echo "</script>";
?>