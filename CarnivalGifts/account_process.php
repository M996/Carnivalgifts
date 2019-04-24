<?php

// Below I will declare all variables used in the Create Donor Account page. I will run through the variable and function of imap_thread
// Create Donor Account page first, then below that I will work on beneficiary accounts variables and functions.
if (isset($_REQUEST['firstnamedonor'])) {
  $fname = trim($_REQUEST['firstnamedonor']);
}
if (isset($_REQUEST['lastnamedonor'])) {
  $lname = trim($_REQUEST['lastnamedonor']);
}
if (isset($_REQUEST['payment-type'])) {
  $payment_type = trim($_REQUEST['payment-type']);
}
if (isset($_REQUEST['cardnumber'])) {
  $cardnumber = trim($_REQUEST['cardnumber']);
}
if (isset($_REQUEST['expiration'])) {
  $expiration = trim($_REQUEST['expiration']);
}
if (isset($_REQUEST['cvs'])) {
  $cvs = trim($_REQUEST['cvs']);
}
if (isset($_REQUEST['email'])) {
  $email = trim($_REQUEST['email']);
}
if (isset($_REQUEST['phone'])) {
  $phone = trim($_REQUEST['phone']);
}
if (isset($_REQUEST['password'])) {
  $password = trim($_REQUEST['password']);
}
if (isset($_REQUEST['passwordre'])) {
  $passwordre = trim($_REQUEST['passwordre']);
}

if ($password === $passwordre && $password != NULL) {

  require 'config.php';
  include 'header.php';
  $SQL_Query = "INSERT INTO donor VALUES ('','$fname','$lname','$payment_type','$cardnumber','$expiration','$cvs','$email','$phone','$password')";
  global $db;
  mysqli_query($db, $SQL_Query);
  echo "<h1>Thank you for creating a Donor account with me! I Hope you will enjoy my website!";


} else {
  echo "<h1>Your passwords do not match!</h1> <br> <a href='create_donor_account.php'>Try Again with Matching Passwords</a>";

}
?>
