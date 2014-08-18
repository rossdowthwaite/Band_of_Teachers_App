<?php
include 'includes/auth.php';
include 'includes/functions.php';

sec_session_start(); // Our custom secure way of starting a php session. 
   if(isset($_POST['username'], $_POST['password'])) 
   { 
   $username = $_POST['username'];
   $password = $_POST['password']; // The hashed password. 

      if(login($username, $password, $mysqli) == true) {
         // Login success

         $type = $_SESSION['userType'];
         $account = $_SESSION['ID'];

         // check if its there first login - if so direct to the address form.
         if(getLoginCount($mysqli, $account) == 1) {
            echo "<script>";
            echo "window.location = \"contact_details.php\";";
            echo "</script>";
         } 
         // if not first login and not completed address form - direct to address form.
         else if(getAddressCompletion($mysqli, $account) == 0)
         {
            echo "<script>";
            echo "window.location = \"contact_details.php\";";
            echo "</script>";
         }
         // if Address is completed but phone not - direct to phone form.
         else if(getPhoneCompletion( $mysqli, $account) == 0)
         {
            echo "<script>";
            echo "window.location = \"more_contact_details.php\";";
            echo "</script>";
         }
         else
         { 
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
      //echo "Member Type = " . $type . "<br />";
      //echo 'Account No = ' . $account. '<br />';

      } else {
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