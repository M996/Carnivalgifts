<?php

// Below I will declare all variables used in the Create Donor Account page. I will run through the variable and function of imap_thread
// Create Donor Account page first, then below that I will work on beneficiary accounts variables and functions.
if (isset($_REQUEST['firstname1'])) {
  $fname1 = trim($_REQUEST['firstname1']);
}
if (isset($_REQUEST['lastname1'])) {
  $lname1 = trim($_REQUEST['lastname1']);
}
if (isset($_REQUEST['firstname2'])) {
  $fname2 = trim($_REQUEST['firstname2']);
}
if (isset($_REQUEST['lastname2'])) {
  $lname2 = trim($_REQUEST['lastname2']);
}
if (isset($_REQUEST['bankname'])) {
  $bankname = trim($_REQUEST['bankname']);
}
if (isset($_REQUEST['bankaccount'])) {
  $bankaccount = trim($_REQUEST['bankaccount']);
}
if (isset($_REQUEST['email'])) {
  $email_ben = trim($_REQUEST['email']);
}
if (isset($_REQUEST['phone'])) {
  $phone_ben = trim($_REQUEST['phone']);
}
if (isset($_REQUEST['password1'])) {
  $password_ben = trim($_REQUEST['password1']);
}
if (isset($_REQUEST['passwordre1'])) {
  $passwordre_ben = trim($_REQUEST['passwordre1']);
}

if ($password_ben === $passwordre_ben && $password_ben != NULL) {

  require 'config.php';
  include 'header.php';
  $SQL_Query_ben = "INSERT INTO beneficiary VALUES ('','$fname1','$lname1','$fname2','$lname2','$bankname','$bankaccount','$email_ben','$phone_ben','$password_ben')";
  global $db;
  mysqli_query($db, $SQL_Query_ben);
  echo "<h1>Thank you for creating a new Account with me! I Hope you will enjoy my website!</h1> <br> <a href='overview.php'>Let's start my Adventure</a>";


} else {
  echo "<h1>Your passwords do not match!</h1> <br> <a href='create_account.php'>Try Again with Matching Passwords</a>";

}
?>
