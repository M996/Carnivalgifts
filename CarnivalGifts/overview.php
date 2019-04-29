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
  $currentID = $_SESSION['benID'];


  require 'config.php';
  $SQL_Search_Account = "SELECT cruise_num FROM cruise_order WHERE  beneficiaryID = '$currentID';";

  $current_cruise = mysqli_query($db, $SQL_Search_Account);
  $row_count = $current_cruise->num_rows;
  $new_cruise_num = mysqli_fetch_array($current_cruise);

  $current_cruise_num = $new_cruise_num['cruise_num'];

  if ($current_cruise_num != NULL && $row_count == 1) {


    $SQL_Overview_Cruise = "SELECT room_num, destinationCountry, destinationCity, picture, cost, cruise_name FROM cruise WHERE cruise_num = $current_cruise_num;";
    $overview_cruise_display = mysqli_query($db, $SQL_Overview_Cruise);
    $final_overview_display = mysqli_fetch_array($overview_cruise_display);

    $picture_overview = $final_overview_display['picture'];
    $cruise_name_overview = $final_overview_display['cruise_name'];
    $roomnum_overview = $final_overview_display['room_num'];
    $city_overview = $final_overview_display['destinationCity'];
    $country_overview = $final_overview_display['destinationCountry'];
    $cost_overview = $final_overview_display['cost'];


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
      $currentID = $_SESSION['benID'];


      require 'config.php';
      $SQL_Search_Account_New = "SELECT order_id, cruise_num FROM cruise_order WHERE  beneficiaryID = '$currentID';";

      $current_cruise = mysqli_query($db, $SQL_Search_Account_New);
      $row_count = $current_cruise->num_rows;
      $new_order_num = mysqli_fetch_array($current_cruise);

      $current_order_id = $new_order_num['order_id'];

      $SQL_Find_Item_Order = "SELECT item_id FROM item_order WHERE order_id = '$current_order_id';";
      $item_order_list = mysqli_query($db, $SQL_Find_Item_Order);
      $items_row_count = $current_cruise->num_rows;

      if ($items_row_count > 0) {
        //$item_current = mysqli_fetch_array($item_order_list);

        foreach ($item_order_list as $item){

        $item_id = $item['item_id'];

        $SQL_Find_Picture = "SELECT picture FROM item WHERE item_id = '$item_id';";
        $picture_found = mysqli_query($db, $SQL_Find_Picture);
        $picture_array = mysqli_fetch_array($picture_found);
        $picture = $picture_array['picture'];



      echo '<div class="item-items">
        <div class="item-items-box">
          <a href="item_select.php"> <img src="src/images/' . $picture . '" class="overview-item-image"></a>
          <a href="donate_form.php"><button type="button" class="shizzle">Donate</button></a>
        </div>
      </div>'; }
      echo '<div class="item-select-div">
        <a href="item_select.php" class="add-items-link"><button type="button" class="item-select-button">Add Items</button>
        <p class="add-items-additional-text">Add more items for the Destination and/or Cruise</p></a>
      </div>';
  } else {
    echo '<div class="item-select-div">
            <a href="item_select.php" class="add-items-link"><button type="button" class="item-select-button">Add Items</button>
            <p class="add-items-additional-text">Add more items for the Destination and/or Cruise</p></a>
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
