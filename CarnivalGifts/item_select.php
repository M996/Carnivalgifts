<?php include 'header.php' ?>

<head>
  <title>Choose Additional Items</title>
</head>


<div class="item-page-container">
  <?php
  if (isset($_REQUEST['city-overview'])) {

    $city_items = $_REQUEST['city-overview'];
    $country_items = $_REQUEST['country-overview'];

    require 'config.php';

    $SQL_Search_Items = "SELECT item_name, item_cost, item_desc FROM item
    WHERE  destinationCity = '$city_items' OR destinationCity = 'ALL';";

    $search_results_items = mysqli_query($db, $SQL_Search_Items);



  echo '<div class="item-info-header">
    <h1 class="items-available-header">Items Available for (' . $city_items .', ' . $country_items . '):</h1>
     <a href="destination_select.php" class="city-list-items"><button>View Another City</button></a>
    </div>
    <div class="item-list-container">';

    foreach ($search_results_items as $new_search) {

      $item_name = $new_search['item_name'];
      $cost_item = $new_search['item_cost'];
      $description_item = $new_search['item_desc'];

    echo  '<div class="item-box">
        <img src="src/images/wine.png" class="item-image-list">
        <div class="item-text-box">
          <h2 class="item-list-title">' . $item_name . '</h2>
          <div class="item-list-info">
            <h3 class="item-list-cost">Cost: ' . $cost_item . '</h3>
            <a href="overview.php" class="add-button-item"><button>Add</button></a>
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
