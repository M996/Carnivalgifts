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
</head>
<body>
  <div class="header-menu">
      <a href="index.php" class="homepage-button"><img src="src/images/carnival-logo.png"></a>
    <div class="header-navbar">
      <a href="index.php" class="blue-nav">Home</a>
      <a href="create_account.php" class="blue-nav">Create Account</a>
      <a href="overview.php" class="blue-nav">Overview</a>
      <a href="donate.php" class="blue-nav">Donate</a>
      <a href="reviews.php" class="blue-nav">Reviews</a>
    </div>
    <div class="header-login">
      <img src="src/images/Profile_Pic.png" class="header-profile-pic">
      <div class="dropdown">
        <button class="dropbtn">Dropdown</button>
        <div class="dropdown-content">
          <a href="overview.php">My Trips</a>
          <a href="create_account.php">Logout</a>
          <a href="create_donor_account.php">Create a Donor Account</a>
        </div>
      </div>
    </div>
    <div class="search-bar-form">
      <form class="search-form" action="submit" method="post"><input class="search-bar-header" value="Search"></input></form>
    </div>
  </div>
