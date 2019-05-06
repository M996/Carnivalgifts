<?php
session_start();
unset($_SESSION['email']);
unset($_SESSION['password']);
unset($_SESSION['benID']);
session_destroy();
header("Location: http://localhost/MilestoneProject/logon.php");


?>
