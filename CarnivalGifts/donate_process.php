<?php

if (isset($_REQUEST['payment-type'])) {
  $payment_type = $_REQUEST['payment-type'];
} else {
  echo "<h1>You must include a Payment type</h1> <br> <a href='donate_form.php>Try Again</a>'";
}
if (isset($_REQUEST['amount'])) {
  $amount = trim($_REQUEST['amount']);
} else {
  echo "<h1>You must include an Amount</h1> <br> <a href='donate_form.php>Try Again</a>'";
}
if ($payment_type != "Paypal") {

  if (isset($_REQUEST['cardnumber'])) {
    $cardnumber = trim($_REQUEST['cardnumber']);
  } else {
    echo "<h1>You must include a Card Number if you are not paying with Paypal</h1> <br> <a href='donate_form.php>Try Again</a>'";
  }
  if (isset($_REQUEST['expiration'])) {
    $expiration = trim($_REQUEST['expiration']);
  } else {
    echo "<h1>You must include an expiration date for you card if you are not paying with Paypal</h1> <br> <a href='donate_form.php>Try Again</a>'";
  }
  if (isset($_REQUEST['cvs'])) {
    $cvc = trim($_REQUEST['cvs']);
  } else {
    echo "<h1>You must include a CVC for you card if you are not paying with Paypal</h1> <br> <a href='donate_form.php>Try Again</a>'";
  }
}

$beneficiaryID = trim($_REQUEST['beneficiaryID']);

require 'config.php';
$SQL_Find_Amount = "SELECT amountNeeded, order_id FROM cruise_order WHERE beneficiaryID = '$beneficiaryID';";
$trip_selection = mysqli_query($db, $SQL_Find_Amount);
$row_count = $trip_selection->num_rows;
$total_amount_array = mysqli_fetch_array($trip_selection);
$total_amount = $total_amount_array['amountNeeded'];
$order_id = $total_amount_array['order_id'];

if ($row_count == 1){

$new_amount = $total_amount - $amount;

echo $new_amount;

  $SQL_Add_Payment = "UPDATE cruise_order SET amountNeeded = $new_amount WHERE order_id = '$order_id';";
  mysqli_query($db, $SQL_Add_Payment);


  echo "<h1>Thank you for donating $$amount to this vacation fund!</h1> <br> <a href='index.php'>Click Here to return Home</a>";



} else {
  echo "Something went wrong. This user is scheduled for multiple trips. Ability to choose which trip to donate to has not yet been added.";
}




?>
