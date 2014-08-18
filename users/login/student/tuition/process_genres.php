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

$genres = $_POST['genres'];


 if(empty($genres)) 
  {
  	$genre_string = 'not set';
  } 
  else
  {
  	$genre_string = implode( ', ', $genres );
  }

 $_SESSION['genres'] = $genre_string;

            echo "<script>";
            echo "window.location = \"favourite_bands.php\";";
            echo "</script>";
?>