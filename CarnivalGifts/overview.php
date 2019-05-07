<?php include 'header.php';

if (isset($_POST['delete-id'])) {

  $delete_id = $_POST['delete-id'];
  require 'config.php';
  $SQL_Delete_Item = "DELETE FROM item_order WHERE item_order_id = $delete_id;";
  mysqli_query($db, $SQL_Delete_Item);
}


?>

<head>
  <title> ___'s Profile </title>
</head>

<div class="overview-page" id="overview-page">
  <div class="overview-advert" id="overview-advert">
    <img src="src/images/Small_Advert1.png" class="small-advert1">
    <img src="src/images/Small_Advert1.png" class="small-advert1">
    <img src="src/images/Small_Advert1.png" class="small-advert1">
  </div>

  <?php
if (isset($_POST['ben-id'])) {
  $currentID = $_POST['ben-id'];
  $fname1 = $_POST['fname1'];
  $lname1 = $_POST['lname1'];
  $fname2 = $_POST['fname2'];
  $lname2 = $_POST['lname2'];
  $ben_id = $_POST['ben-id'];

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

    $SQL_Query_Amount = "SELECT amountNeeded FROM cruise_order WHERE beneficiaryID = $ben_id;";
    $amount_needed_object = mysqli_query($db, $SQL_Query_Amount);
    $amount_needed = mysqli_fetch_array($amount_needed_object);

    $cost_overview = $amount_needed['amountNeeded'];


    echo '<div class="overview-cruise-group" id="overview-cruise-group">
      <a href="destination_select.php"> <img src="src/images/' . $picture_overview . '" class="overview-destination"></a>
      <h2 class="cruise-name">The ' . $cruise_name_overview . '</h2>
      <div class="overview-cruise-text">
        <h4 class="overview-text-info">Room Reserved: ' . $roomnum_overview . '</h4>
        <h4 class="overview-text-info">Destination: ' . $city_overview . ', ' . $country_overview . '</h4>
        <h4 class="overview-text-info">Amount Due: $' . $cost_overview . '</h4>
      </div>
      <form class="small-form" method="post" action="donate_form.php">
      <input style="display: none;" value="' . $fname1 .'" name="fname1">
      <input style="display: none;" value="' . $lname1 .'" name="lname1">
      <input style="display: none;" value="' . $fname2 .'" name="fname2">
      <input style="display: none;" value="' . $lname2 .'" name="lname2">
      <input style="display: none;" value="' . $ben_id .'" name="ben-id">
      <button type="submit" class="shizzle">Donate</button>
      </form>
      <div id="progress-bar-overview">
        <div id="progress-bar-fill-overview"></div>
      </div>
    </div>';
    }

} else {
  $currentID = $_SESSION['benID'];

  include "config.php";
  $SQL_Query_Current = "SELECT beneficiary_F_Name, beneficiary_L_Name, Spouse_F_Name, Spouse_L_Name FROM beneficiary WHERE beneficiaryID = $currentID;";
  $names_object = mysqli_query($db, $SQL_Query_Current);
  $names_array = mysqli_fetch_array($names_object);

  $fname1 = $names_array['beneficiary_F_Name'];
  $lname1 = $names_array['beneficiary_L_Name'];
  $fname2 = $names_array['Spouse_F_Name'];
  $lname2 = $names_array['Spouse_L_Name'];
  $ben_id = $currentID;


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

    $SQL_Query_Amount = "SELECT amountNeeded FROM cruise_order WHERE beneficiaryID = $currentID;";
    $amount_needed_object = mysqli_query($db, $SQL_Query_Amount);
    $amount_needed = mysqli_fetch_array($amount_needed_object);

    $cost_overview = $amount_needed['amountNeeded'];


    echo '<div class="overview-cruise-group" id="overview-cruise-group">
      <a href="destination_select.php"> <img src="src/images/' . $picture_overview . '" class="overview-destination"></a>
      <h2 class="cruise-name">The ' . $cruise_name_overview . '</h2>
      <div class="overview-cruise-text">
        <h4 class="overview-text-info">Room Reserved: ' . $roomnum_overview . '</h4>
        <h4 class="overview-text-info">Destination: ' . $city_overview . ', ' . $country_overview . '</h4>
        <h4 class="overview-text-info">Amount Due: $' . $cost_overview . '</h4>
      </div>
      <form class="small-form" method="post" action="donate_form.php">
      <input style="display: none;" value="' . $fname1 .'" name="fname1">
      <input style="display: none;" value="' . $lname1 .'" name="lname1">
      <input style="display: none;" value="' . $fname2 .'" name="fname2">
      <input style="display: none;" value="' . $lname2 .'" name="lname2">
      <input style="display: none;" value="' . $ben_id .'" name="ben-id">
      <button type="submit" class="shizzle">Donate</button>
      </form>
      <div id="progress-bar-overview">
        <div id="progress-bar-fill-overview"></div>
      </div>
    </div>';
    } else {

      echo '<div class="overview-cruise-group" id="overview-cruise-group">
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
  }   ?>

    <div class="overview-items" id="overview-items">
      <?php

      if (isset($_REQUEST['ben-id'])) {
        $currentID = $_REQUEST['ben-id'];


        require 'config.php';
        $SQL_Search_Account_New = "SELECT order_id, cruise_num FROM cruise_order WHERE  beneficiaryID = '$currentID';";

        $current_cruise = mysqli_query($db, $SQL_Search_Account_New);
        $row_count = $current_cruise->num_rows;
        $new_order_num = mysqli_fetch_array($current_cruise);

        $current_order_id = $new_order_num['order_id'];

        $SQL_Find_Item_Order = "SELECT item_order_id, item_id FROM item_order WHERE order_id = '$current_order_id';";
        $item_order_list = mysqli_query($db, $SQL_Find_Item_Order);
        $items_row_count = $current_cruise->num_rows;

        if ($items_row_count > 0) {
          //$item_current = mysqli_fetch_array($item_order_list);

          foreach ($item_order_list as $item){

          $item_id = $item['item_id'];
          $delete_item_id = $item['item_order_id'];

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
      }

      } else {
      $currentID = $_SESSION['benID'];


      require 'config.php';
      $SQL_Search_Account_New = "SELECT order_id, cruise_num FROM cruise_order WHERE  beneficiaryID = '$currentID';";

      $current_cruise = mysqli_query($db, $SQL_Search_Account_New);
      $row_count = $current_cruise->num_rows;
      $new_order_num = mysqli_fetch_array($current_cruise);

      $current_order_id = $new_order_num['order_id'];

      $SQL_Find_Item_Order = "SELECT item_order_id, item_id FROM item_order WHERE order_id = '$current_order_id';";
      $item_order_list = mysqli_query($db, $SQL_Find_Item_Order);
      $items_row_count = $current_cruise->num_rows;

      if ($items_row_count > 0) {
        //$item_current = mysqli_fetch_array($item_order_list);

        foreach ($item_order_list as $item){

        $item_id = $item['item_id'];
        $delete_item_id = $item['item_order_id'];

        $SQL_Find_Picture = "SELECT picture FROM item WHERE item_id = '$item_id';";
        $picture_found = mysqli_query($db, $SQL_Find_Picture);
        $picture_array = mysqli_fetch_array($picture_found);
        $picture = $picture_array['picture'];



      echo '<div class="item-items">
        <div class="item-items-box">
          <a href="item_select.php"> <img src="src/images/' . $picture . '" class="overview-item-image"></a>
          <a href="donate_form.php"><button type="button" class="shizzle">Donate</button></a>
          <form method="post" action="overview.php">
          <input style="display: none;" value="' . $delete_item_id . '" name="delete-id">
          <button type="submit" method="post" class="shizzle">Delete Item</button>
          </form>
        </div>
      </div>'; }
      echo '<div class="item-select-div">
        <a href="item_select.php" class="add-items-link"><button type="button" class="item-select-button">Add Items</button>
        <p class="add-items-additional-text" id="add-items-additional-text">Add more items for the Destination and/or Cruise</p></a>
      </div>';
  } else {
    echo '<div class="item-select-div">
            <a href="item_select.php" class="add-items-link"><button type="button" class="item-select-button">Add Items</button>
            <p class="add-items-additional-text" id="add-items-additional-text">Add more items for the Destination and/or Cruise</p></a>
          </div>'; }
        }
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
