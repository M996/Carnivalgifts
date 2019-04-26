<?php include 'header.php' ?>

<head>
  <title> ___'s Profile </title>
</head>

<div class="overview-page">
  <div class="overview-advert">
    <img src="src/images/Small_Advert1.png" class="small-advert1">
    <img src="src/images/Small_Advert1.png" class="small-advert1">
    <img src="src/images/Small_Advert1.png" class="small-advert1">
  </div>

  <?php

  if (isset($_REQUEST['room-number'])) {

  $roomnum_overview = $_REQUEST['room-number'];
  $country_overview = $_REQUEST['country'];
  $city_overview = $_REQUEST['city'];
  $cost_overview = $_REQUEST['cost'];
  $cruise_name_overview = $_REQUEST['cruise-name'];
  $picture_overview = $_REQUEST['picture'];


    echo '<div class="overview-cruise-group">
      <a href="destination_select.php"> <img src="src/images/' . $picture_overview . '" class="overview-destination"></a>
      <h2 class="cruise-name">The ' . $cruise_name_overview . '</h2>
      <div class="overview-cruise-text">
        <h4 class="overview-text-info">Room Reserved: ' . $roomnum_overview . '</h4>
        <h4 class="overview-text-info">Destination: ' . $city_overview . ', ' . $country_overview . '</h4>
        <h4 class="overview-text-info">Amount Due: $' . $cost_overview . '</h4>
      </div>
      <a href="donate_form.php"<button type="button" class="shizzle">Donate</button></a>
      <div id="progress-bar-overview">
        <div id="progress-bar-fill-overview"></div>
      </div>
    </div>';
  } else {

    echo '<div class="overview-cruise-group">
      <a href="destination_select.php"> <img src="src/images/empty.jpg" class="overview-destination"></a>
      <h2 class="cruise-name">No Cruise has been Selected Yet. Click the image above to select a Cruise</h2>
      <div class="overview-cruise-text">
        <h4 class="overview-text-info">Room Reserved: None</h4>
        <h4 class="overview-text-info">Destination: None</h4>
        <h4 class="overview-text-info">Amount Due: $0</h4>
      </div>
      <a href="donate_form.php"<button type="button" class="shizzle">Donate</button></a>
    </div>';
  }


  ?>

    <div class="overview-items">
      <?php

      if (isset($_REQUEST['room-number'])) {

      echo '<div class="item-items">
        <div class="item-items-box">
          <a href="destination_select.php"> <img src="src/images/jet-ski.jpg" class="overview-item-image"></a>
          <a href="donate_form.php"><button type="button" class="shizzle">Donate</button></a>
        </div>
        <div class="item-items-box">
          <a href="item_select.php"><img src="src/images/wine.png" class="overview-item-image"></a>
          <a href="donate_form.php"><button type="button" class="shizzle">Donate</button></a>
        </div>
      </div>
      <div class="item-items">
        <div class="item-items-box">
          <a href="item_select.php"><img src="src/images/jet-ski.jpg" class="overview-item-image"></a>
          <a href="donate_form.php"><button type="button" class="shizzle">Donate</button></a>
        </div>
        <div class="item-items-box">
          <a href="item_select.php"><img src="src/images/wine.png" class="overview-item-image"></a>
          <a href="donate_form.php"><button type="button" class="shizzle">Donate</button></a>
        </div>
      </div>
      <div class="item-select-div">
      <form method="post" action="item_select.php">
        <input style="display: none;" value="' . $city_overview .'" name="city-overview">
        <input style="display: none;" value="' . $country_overview .'" name="country-overview">
        <div class="add-items-link"><button name="choose" value="submit" type="submit">Add Items</button></div>
        <p class="add-items-additional-text">Add more items for the Cruise</p>
        </form>
      </div>';
  } else {
    echo '<div class="item-select-div">
        <a href="item_select.php" class="add-items-link"><button type="button" class="item-select-button">Add Items</button></a>
        <p class="add-items-additional-text">Add more items for the Destination and/or Cruise</p>

    </div>'; }
    ?>
  </div>
    <div class="overview-profile">
      <div class="profile-image-upload">
        <img src="src/images/Profile_Pic.png" class="profile-pic"><br>
        <button type="button" class="upload-profile-image">Upload a Profile Image</button>
      </div>
      <img src="src/images/Medium_Advert2.png" class="medium-advertisement-overview">
    </div>
  </div>
</body>
</html>
