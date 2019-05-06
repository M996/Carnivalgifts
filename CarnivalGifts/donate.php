<?php include 'header.php' ?>

<head>
  <title>Search</title>
</head>

<div class="donor-search-page">
  <div class="search-bar-donors">
    <form method="post">
      <input type="text" name="searchbar" placeholder="Search" class="donor-search-bar">
    </form>
  </div>
  <div class="donor-search-results">
    <?php
    if (isset($_REQUEST['searchbar']) && $_REQUEST['searchbar'] !=NULL) {
      $searchterm = $_REQUEST['searchbar'];
      require 'config.php';

        $SQL_Search = "SELECT beneficiaryID, beneficiary_F_Name, beneficiary_L_Name, Spouse_F_Name, Spouse_L_Name FROM beneficiary
        WHERE  beneficiary_F_Name = '$searchterm' OR beneficiary_L_Name = '$searchterm' OR Spouse_F_Name = '$searchterm'
        OR Spouse_L_Name = '$searchterm';";

        $search_results = mysqli_query($db, $SQL_Search);


        foreach ($search_results as $new_search) {

        $fname1 = $new_search['beneficiary_F_Name'];
        $lname1 = $new_search['beneficiary_L_Name'];
        $fname2 = $new_search['Spouse_F_Name'];
        $lname2 = $new_search['Spouse_L_Name'];
        $new_ben_id = $new_search['beneficiaryID'];



      echo '<div class="donor-search-row">
      <img src="src/images/Profile_Pic.png" class="profile-pic">
      <div class="donor-search-description">
        <div class="donor-search-description2">
          <h2 class="name-of-couple">' . $fname1 . ' ' . $lname1 . ' ' . ' and ' . $fname2 . ' ' . $lname2 . '</h2>
            <h4 class="donor-search-destination">Destination:</h4>
              <div class="text-container-donor">
                <p class="donor-search-description">Hello! We are looking to raise money to go on a wonderful Honeymoon to Bora Bora, one of the most popular
                destinations on this website as you can probably see from the Homepage. Please consider donating to us, especially from friends and family, we really want to go on this trip!</p>
              </div>
              <div id="progress-bar">
                <div id="progress-bar-fill"></div>
                </div>
              </div>
              <div class="search-donate-button">
                <form method="post" action="donate_form.php">
                  <input style="display: none;" value="' . $fname1 .'" name="fname1">
                  <input style="display: none;" value="' . $lname1 .'" name="lname1">
                  <input style="display: none;" value="' . $fname2 .'" name="fname2">
                  <input style="display: none;" value="' . $lname2 .'" name="lname2">
                  <input style="display: none;" value="' . $new_ben_id .'" name="ben-id">
                 <button type="submit" method="post" class="shizzle" style="margin-bottom: 8px;">Make Donation</button>
                </form>
                <form method="post" action="overview.php">
                  <input style="display: none;" value="' . $new_ben_id .'" name="ben-id">
                 <button type="submit" method="post" class="shizzle">View This Trip</button>
                </form>
              </div>
              <div class="advert-holder-donate">
                <img src="src/images/Small_Advert1.png" class="small-advert1">
              </div>
            </div>
        </div>';  }
        } ?>
      </div>
    </div>
  </body>
  </html>
