<?php include 'header.php' ?>

<?php // if the user is coming from the overview page or the item select page and they already have a cruise selected under their account, we must erase that cruise upon their entry to this page, thus allowing them to choose the same cruise or a new cruise.


  if (isset($_SESSION['benID']) && !isset($_POST['Replace'])) {
    $benID = $_SESSION['benID'];
    require 'config.php';
    $SQL_Query_Check = "SELECT order_id, cruise_num FROM cruise_order WHERE beneficiaryID = $benID;";
    $find_order = mysqli_query($db, $SQL_Query_Check);
    $row_count_order = $find_order->num_rows;
    $erase_cruise_num = mysqli_fetch_array($find_order);

    $cruisenum = $erase_cruise_num['cruise_num'];

    if ($row_count_order > 0) {

      $SQL_Set_Taken = "UPDATE cruise SET taken = 'NO' WHERE cruise_num = $cruisenum;";
      mysqli_query($db, $SQL_Set_Taken);

      $SQL_Delete = "DELETE FROM cruise_order WHERE beneficiaryID = $benID;";
      mysqli_query($db, $SQL_Delete);


    }

  }

?>

<?php // If a Destination has been chosen, we will add it to the database using the code below, then redirect to the overview page.
if (isset($_REQUEST['cruise-num'])) {
  $cruise_num = $_REQUEST['cruise-num'];
  $ben_ID = $_SESSION['benID'];
  $cost = $_REQUEST['cost'];

  require 'config.php';
  $SQL_Cruise_Order_Insert = "INSERT INTO cruise_order VALUES ('', '$cruise_num', '$ben_ID', '$cost')";
  mysqli_query($db, $SQL_Cruise_Order_Insert);

  $SQL_Remove_Room = "UPDATE cruise SET taken = 'YES' WHERE cruise_num = $cruise_num;";
  mysqli_query($db, $SQL_Remove_Room);

  header("Location: http://localhost/MilestoneProject/overview.php"); // Redirect browser
  exit();

}  ?>

<head>
  <title>Cruise Selection</title>
</head>
<div class="cruises-container-page">
  <div class="search-bar-donors">
    <form method="post">
      <input type="text" name="searchbar" placeholder="Search" class="donor-search-bar">
    </form>
  </div>
    <?php
    if (isset($_REQUEST['searchbar']) && $_REQUEST['searchbar'] !=NULL) {
      $searchterm = $_REQUEST['searchbar'];
      require 'config.php';

        $SQL_Search_dest = "SELECT cruise_num, room_num, destinationCountry, destinationCity, picture, cost, cruise_name FROM cruise
        WHERE  destinationCountry = '$searchterm' OR destinationCity = '$searchterm' OR cruise_name = '$searchterm';";

        $search_results_dest = mysqli_query($db, $SQL_Search_dest);


        foreach ($search_results_dest as $new_search) {

        $roomnum = $new_search['room_num'];
        $country = $new_search['destinationCountry'];
        $city = $new_search['destinationCity'];
        $cruise_name = $new_search['cruise_name'];
        $picture = $new_search['picture'];
        $cost = $new_search['cost'];
        $cruise_num = $new_search['cruise_num'];


    echo '<div class="cruise-box-info">
          <img src="src/images/' . $picture . '" class="destination-image-full">
          <div class="cruise-info-text">
      <h1 class="cruise-name-title">Cruise Name: ' . $cruise_name . '</h1>
      <h2 class="room-cruise-info">Room number: ' . $roomnum .'</h2>
      <h4 class="cruise-cost">Cost: ' . $cost .'</h4>
      <h4 class="cruise-destination">' . $country . ', ' . $city . '</h4>
      <form method="post" action="destination_select.php">
        <input style="display: none;" value="' . $roomnum .'" name="room-number">
        <input style="display: none;" value="' . $country .'" name="country">
        <input style="display: none;" value="' . $city .'" name="city">
        <input style="display: none;" value="' . $cruise_name .'" name="cruise-name">
        <input style="display: none;" value="' . $picture .'" name="picture">
        <input style="display: none;" value="' . $cost .'" name="cost">
        <input style="display: none;" value="' . $cruise_num .'" name="cruise-num">
        <button name="choose" value="submit" type="submit">Select</button>
      </form>
    </div>
    <p class="cruise-info-text">This room has a scenic view and balcony on the path to ' . $country . ', ' . $city . '. Several other stops in ' . $country . ' will be made along the way as we tour the area. Extra items and reservations can be purchased along these stops on our items page.</p>
  </div>'; }
} else {
  require 'config.php';

    $SQL_Search_dest = "SELECT cruise_num, room_num, destinationCountry, destinationCity, picture, cost, cruise_name FROM cruise WHERE taken='NO';";

    $search_results_dest = mysqli_query($db, $SQL_Search_dest);


    foreach ($search_results_dest as $new_search) {

      $roomnum = $new_search['room_num'];
      $country = $new_search['destinationCountry'];
      $city = $new_search['destinationCity'];
      $cruise_name = $new_search['cruise_name'];
      $picture = $new_search['picture'];
      $cost = $new_search['cost'];
      $cruise_num = $new_search['cruise_num'];

      echo '<div class="cruise-box-info">
            <img src="src/images/' . $picture . '" class="destination-image-full">
            <div class="cruise-info-text">
        <h1 class="cruise-name-title">Cruise Name: ' . $cruise_name . '</h1>
        <h2 class="room-cruise-info">Room number: ' . $roomnum .'</h2>
        <h4 class="cruise-cost">Cost: ' . $cost .'</h4>
        <h4 class="cruise-destination">' . $country . ', ' . $city . '</h4>
        <form method="post" action="destination_select.php">
          <input style="display: none;" value="' . $roomnum .'" name="room-number" type="text">
          <input style="display: none;" value="' . $country .'" name="country" type="text">
          <input style="display: none;" value="' . $city .'" name="city" type="text">
          <input style="display: none;" value="' . $cruise_name .'" name="cruise-name" type="text">
          <input style="display: none;" value="' . $picture .'" name="picture" type="text">
          <input style="display: none;" value="' . $cost .'" name="cost" type="text">
          <input style="display: none;" value="' . $cruise_num .'" name="cruise-num">
          <button name="choose" value="submit" type="submit">Select</button>
        </form>
      </div>
      <p class="cruise-info-text">This room has a scenic view and balcony on the path to ' . $country . ', ' . $city . '. Several other stops in ' . $country . ' will be made along the way as we tour the area. Extra items and reservations can be purchased along these stops on our items page.</p>
    </div>'; }
} ?>

</div>
</body>
</html>
