<?php include 'header.php' ?>

<?php
if (isset($_REQUEST['item-ID'])) {

  $currentID = $_SESSION['benID'];
  $chosen_item_ID = $_REQUEST['item-ID'];
  $item_cost = $_REQUEST['price'];

  require 'config.php';
  $SQL_Search_Orders = "SELECT order_id FROM cruise_order WHERE  beneficiaryID = '$currentID';";

  $current_cruise = mysqli_query($db, $SQL_Search_Orders);
  $new_cruise_list = mysqli_fetch_array($current_cruise);

  $current_order_id = $new_cruise_list['order_id'];

  $SQL_Item_Order_Insert = "INSERT INTO item_order VALUES ('', '$current_order_id', '$chosen_item_ID', '$item_cost')";
  mysqli_query($db, $SQL_Item_Order_Insert);

  header("Location: http://localhost/MilestoneProject/overview.php"); /* Redirect browser */
  exit();

}  ?>

<head>
  <title>Choose Additional Items</title>
</head>


<div class="item-page-container">
  <?php
  $currentID = $_SESSION['benID'];


  require 'config.php';
  $SQL_Search_Items = "SELECT cruise_num, order_id FROM cruise_order WHERE  beneficiaryID = '$currentID';";

  global $db;
  $current_cruise = mysqli_query($db, $SQL_Search_Items);
  $row_count = $current_cruise->num_rows;
  $new_cruise_list = mysqli_fetch_array($current_cruise);

  $current_cruise_num = $new_cruise_list['cruise_num'];
  $current_order_id = $new_cruise_list['order_id'];

  if ($current_cruise_num != NULL && $row_count == 1) {

    $SQL_Search_Cruises = "SELECT destinationCity FROM cruise WHERE cruise_num = $current_cruise_num;";
    $Items_cruise_display = mysqli_query($db, $SQL_Search_Cruises);
    $final_items_display = mysqli_fetch_array($Items_cruise_display);

    $city_items = $final_items_display['destinationCity'];

    $SQL_City_Items = "SELECT item_id, item_name, item_cost, item_desc, picture FROM item WHERE destinationCity = '$city_items' OR destinationCity = 'ALL';";
    $items_display = mysqli_query($db, $SQL_City_Items);

  echo '<div class="item-info-header">
    <h1 class="items-available-header">Items Available for (' . $city_items .'):</h1>
     <a href="destination_select.php" class="city-list-items"><button>View Another City</button></a>
    </div>
    <div class="item-list-container">';

    foreach ($items_display as $new_search) {

      $item_name = $new_search['item_name'];
      $cost_item = $new_search['item_cost'];
      $description_item = $new_search['item_desc'];
      $picture_item = $new_search['picture'];
      $item_ID = $new_search['item_id'];

    echo  '<div class="item-box">
        <img src="src/images/' . $picture_item . '" class="item-image-list">
        <div class="item-text-box">
          <h2 class="item-list-title">' . $item_name . '</h2>
          <div class="item-list-info">
            <h3 class="item-list-cost">Cost: ' . $cost_item . '</h3>
            <form method="post" action="item_select.php">
              <input style="display: none;" value="' . $item_ID . '" name="item-ID">
              <input style="display: none;" value="' . $cost_item . '" name="price">
                <button name="choose-item" value="submit" type="submit" class="add-button-item">Add</button>
            </form>
          </div>
          <p class="item-list-text">' . $description_item . '</p>
        </div>
      </div>'; }
    } else {
      echo '<div class="item-info-header">
        <h1 class="items-available-header">Select a cruise to see what Items are Available for Purchase</h1>
         <a href="destination_select.php" class="city-list-items"><button>View A City</button></a>
        </div>';
    }
   ?>

    </div>
  </div>
</body>
</html>
