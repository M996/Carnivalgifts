<?php include 'header.php' ?>

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

        $SQL_Search_dest = "SELECT room_num, destinationCountry, destinationCity, picture, cost, cruise_name FROM cruise
        WHERE  destinationCountry = '$searchterm' OR destinationCity = '$searchterm' OR cruise_name = '$searchterm';";

        $search_results_dest = mysqli_query($db, $SQL_Search_dest);


        foreach ($search_results_dest as $new_search) {

        $roomnum = $new_search['room_num'];
        $country = $new_search['destinationCountry'];
        $city = $new_search['destinationCity'];
        $cruise_name = $new_search['cruise_name'];
        $picture = $new_search['picture'];
        $cost = $new_search['cost'];


    echo '<div class="cruise-box-info">
          <img src="src/images/' . $picture . '" class="destination-image-full">
          <div class="cruise-info-text">
      <h1 class="cruise-name-title">Cruise Name: ' . $cruise_name . '</h1>
      <h2 class="room-cruise-info">Room number: ' . $roomnum .'</h2>
      <h4 class="cruise-cost">Cost: ' . $cost .'</h4>
      <h4 class="cruise-destination">' . $country . ', ' . $city . '</h4>
      <form method="post">
      <input style="display: none;" value="' . $roomnum .'" name="room-number">
      <input style="display: none;" value="' . $country .'" name="country">
      <input style="display: none;" value="' . $city .'" name="city">
      <input style="display: none;" value="' . $cruise_name .'" name="cruise-name">
      <input style="display: none;" value="' . $picture .'" name="picture">
      <input style="display: none;" value="' . $cost .'" name="cost">
      <button name="choose" value="submit" type="submit">Select</button>
      </form>
    </div>
    <p class="cruise-info-text">This room has a scenic view and balcony on the path to ' . $country . ', ' . $city . '. Several other stops in ' . $country . ' will be made along the way as we tour the area. Extra items and reservations can be purchased along these stops on our items page.</p>
  </div>'; }
} else {
  require 'config.php';

    $SQL_Search_dest = "SELECT room_num, destinationCountry, destinationCity, picture, cost, cruise_name FROM cruise WHERE taken='NO';";

    $search_results_dest = mysqli_query($db, $SQL_Search_dest);


    foreach ($search_results_dest as $new_search) {

      $roomnum = $new_search['room_num'];
      $country = $new_search['destinationCountry'];
      $city = $new_search['destinationCity'];
      $cruise_name = $new_search['cruise_name'];
      $picture = $new_search['picture'];
      $cost = $new_search['cost'];

      echo '<div class="cruise-box-info">
            <img src="src/images/' . $picture . '" class="destination-image-full">
            <div class="cruise-info-text">
        <h1 class="cruise-name-title">Cruise Name: ' . $cruise_name . '</h1>
        <h2 class="room-cruise-info">Room number: ' . $roomnum .'</h2>
        <h4 class="cruise-cost">Cost: ' . $cost .'</h4>
        <h4 class="cruise-destination">' . $country . ', ' . $city . '</h4>
        <form method="post" action="overview.php">
        <input style="display: none;" value="' . $roomnum .'" name="room-number" type="text">
        <input style="display: none;" value="' . $country .'" name="country" type="text">
        <input style="display: none;" value="' . $city .'" name="city" type="text">
        <input style="display: none;" value="' . $cruise_name .'" name="cruise-name" type="text">
        <input style="display: none;" value="' . $picture .'" name="picture" type="text">
        <input style="display: none;" value="' . $cost .'" name="cost" type="text">
        <button name="choose" value="submit" type="submit">Select</button>
        </form>
      </div>
      <p class="cruise-info-text">This room has a scenic view and balcony on the path to ' . $country . ', ' . $city . '. Several other stops in ' . $country . ' will be made along the way as we tour the area. Extra items and reservations can be purchased along these stops on our items page.</p>
    </div>'; }
} ?>

</div>
</body>
</html>
