<!DOCTYPE html>

<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="css/header-style.css">
  <link rel="stylesheet" type="text/css" href="css/index-style.css">
  <link rel="stylesheet" type="text/css" href="css/create-account-style.css">
  <link rel="stylesheet" type="text/css" href="css/donate-style.css">
  <link rel="stylesheet" type="text/css" href="css/overview-style.css">
  <link rel="stylesheet" type="text/css" href="css/destination-select-style.css">
  <link rel="stylesheet" type="text/css" href="css/item-select-style.css">
  <link rel="stylesheet" type="text/css" href="css/reviews-style.css">
  <link rel="stylesheet" type="text/css" href="css/donate-form-style.css">
  <link rel="stylesheet" type="text/css" href="css/logon-style.css">
  <link rel="stylesheet" type="text/css" href="css/administrator-panel-style.css">
  <link rel="stylesheet" type="text/css" href="css/administrator-panel-items-style.css">
</head>
<?php


function currenturl() {
$pageURL = 'http';
$pageURL .= "://";
if ($_SERVER["SERVER_PORT"] != "80") {
$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
} else {
$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
}
return $pageURL;
}

$url = currenturl();
if ($url != 'http://localhost/MilestoneProject/logon.php') {
  session_start();
}


?>
<body>
  <div class="header-menu">
      <a href="index.php" class="homepage-button"><img src="src/images/carnival-logo.png"></a>
    <div class="header-navbar">
      <a href="index.php" class="blue-nav">Home</a>
      <a href="create_account.php" class="blue-nav">Create Account</a>
      <?php
      if (isset($_SESSION['benID'])) {
        echo '<a href="overview.php" class="blue-nav">Overview</a>';
      }
       ?>
      <a href="donate.php" class="blue-nav">Donate</a>
      <a href="reviews.php" class="blue-nav">Reviews</a>
    </div>
    <div class="header-login">
      <?php if(isset($_SESSION['benID'])) {
        echo '  <img src="src/images/Profile_Pic.png" class="header-profile-pic">
          <div class="dropdown">
            <button class="dropbtn">' . $_SESSION['fname'] .  '</button>
            <div class="dropdown-content">
              <a href="overview.php">My Trips</a>
              <a href="logout.php">Logout</a>';
               if ($_SESSION['benID'] == "5") {
                 echo '<a href="administrator_panel.php">Administrator</a>'; };

          echo  '</div>
          </div>'; }; ?>

    </div>
    <div class="search-bar-form">
      <form class="search-form" action="submit" method="post"><input class="search-bar-header" value="Search"></input></form>
    </div>
  </div>
