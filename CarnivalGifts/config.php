<?php

$host = "localhost";
$username = "Admin";
$password = "KnightlyJarl7";
$db_name = "carnivalgiftsdb";

$db = mysqli_connect($host, $username, $password, $db_name);
$connection_error = $db->connect_error;
if ($connection_error != null) {
  echo "There has been an Error. The Database cannot connect. Please seek Help.";
  exit();
}

?>
