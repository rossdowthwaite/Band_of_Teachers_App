<?php
include '../includes/auth.php';
include '../includes/functions.php';
include '../includes/registration_functions.php';

sec_session_start(); // Our custom secure way of starting a php session. 
   if(isset($_POST['username'], $_POST['password'])) 
   { 
   $username = $_POST['username'];
   $password = $_POST['password']; // The hashed password.
      if(login($username, $password, $mysqli) == true) 
      {
         // Login success
         $ID = $_SESSION['ID'];

         getName($mysqli, $ID);

         getUserType($ID, $mysqli);
         $type = $_SESSION['userType'];



         switch ($type) {
            case 'admin':
               header('Location: ./admin/index.php');
               break;
            case 'student':
               header('Location: ./student/index.php');
               break;
            case 'guardian':
               header('Location: ./guardian/index.php');
               break;
            case 'tutor':
               header('Location: ./tutor/index.php');
               break;
            }
      } 
      else 
      {
      // Login failed
      header('Location: ./login.php?error=1');
      }
   } 
   else 
   { 
   // The correct POST variables were not sent to this page.
   echo 'Invalid Request';
   }
?>