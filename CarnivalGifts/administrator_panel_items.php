<?php include 'header.php';

if (isset($_POST['city']) && isset($_POST['description']) && $_SESSION['benID'] == '5') {
  $item_name_add = $_POST['name'];
  $item_cost_add = $_POST['cost'];
  $item_description_add = $_POST['description'];
  $item_picture_add = $_POST['picture'];
  $item_city_add = $_POST['city'];

  if ($item_picture_add != 'null') {
    if ($item_cost_add > '0.01') {
      require 'config.php';
      $SQL_Item_Add = "INSERT INTO item VALUES ('', '$item_name_add', '$item_cost_add', '$item_description_add', '$item_picture_add', '$item_city_add');";
      global $db;
      mysqli_query($db, $SQL_Item_Add);
      echo "<h1>New Item Added!</h1>";
    } else {
      echo "<h1>Try another input but this time, select a price for the item that is a positive number!</h1>";
    }
  } else {
    echo "<h1>Try another input but this time, select a valid picture for your item!</h1>";
  }
}

if ($_SESSION['benID'] == "5" && $_SESSION['password'] == "CarnivalADMIN8899*") {
  function adminItemDisplay() {
    require 'config.php';
    $SQL_Items_Query = "SELECT item_name, item_cost, item_desc, picture, destinationCity FROM item";
    $display_admin = mysqli_query($db, $SQL_Items_Query);

    return $display_admin;
  }
}
?>

<div class="Administrator-container">
  <div class="admin-tab-div">
    <a href="administrator_panel.php" class="admin-tab">Add Rooms</a>
    <a href="admininstrator_panel_items.php" class="admin-tab" id="current-admin-tab">Add Items</a>
  </div>
  <form method="post" action="">
    <div class="admin-inputs">
      <input size="25" type="text" name="city" placeholder="City" class="admin-input" required>
      <input size="25" type="text" name="name" placeholder="Item Name" class="admin-input" required>
      <input size="25" type="number" step="0.01" name="cost" placeholder="Item Price" class="admin-input" required>
      <textarea rows="3" cols="42" class="admin-input" id="description-text" name="description" placeholder="Place Description Here" required></textarea>
      <select name="picture" class="admin-input" id="right-size-admin" required>
        <option value="null" selected>Select Image</option>
        <option value="grapes">Wine Tasting</option>
        <option value="wine.png">Italian Restaurant</option>
        <option value="scuba.jpg">Scuba Diving</option>
        <option value="meal.jpg">Three Course Meal</option>
        <option value="jet-ski.jpg">Jet-ski Rental</option>
        <option value="seafood.jpg">Seafood Restaurant Reservations</option>
        <option value="sushi.jpg">Sushi Restaurant Reservations</option>
      </select>
      <button type="submit" class="admin-add">Add</button>
    </div>
  </form>
  <div class="cruise-view-admin">
    <div class="view-column-admin-item" id="view-column-admin">
      <div class="admin-view-name">
        <h4 class="adminbar-title">City</h4>
      </div>
      <?php $admin_cruise = adminItemDisplay();
      $track_num = 0;
      foreach ($admin_cruise as $display) {
        $city = $display['destinationCity'];
        $track_num ++;
        echo '<div class="display-column">
        <h6 class="admin-info-text">' . $track_num .'.  ' . $city . '</h6>
        </div>';
      } ?>
    </div>
    <div class="view-column-admin-item" id="view-column-admin">
      <div class="admin-view-name">
        <h4 class="adminbar-title">Item Name</h4>
      </div>
      <?php $admin_cruise = adminItemDisplay();
      $track_num = 0;
      foreach ($admin_cruise as $display) {
        $name = $display['item_name'];
        $track_num ++;
        echo '<div class="display-column">
        <h6 class="admin-info-text">' . $track_num .'.  ' . $name . '</h6>
        </div>';
      } ?>
    </div>
    <div class="view-column-admin-item" id="view-column-admin">
      <div class="admin-view-name">
        <h4 class="adminbar-title">Cost</h4>
      </div>
      <?php $admin_cruise = adminItemDisplay();
      $track_num = 0;
      foreach ($admin_cruise as $display) {
        $cost = $display['item_cost'];
        $track_num ++;
        echo '<div class="display-column">
        <h6 class="admin-info-text">' . $track_num .'.  $' . $cost . '</h6>
        </div>';
      } ?>
    </div>
    <div class="view-column-admin-item" id="description-column">
      <div class="admin-view-name">
        <h4 class="adminbar-title">Item Description</h4>
      </div>
      <?php $admin_cruise = adminItemDisplay();
      $track_num = 0;
      foreach ($admin_cruise as $display) {
        $description = $display['item_desc'];
        $track_num ++;
        echo '<div class="display-column">
        <h6 class="admin-info-text">' . $track_num .'.  ' . $description . '</h6>
        </div>';
      } ?>
    </div>
  </div>
</div>
