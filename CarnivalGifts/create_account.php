<?php include 'header.php' ?>

<head>
<title> Create An Account </title>
</head>

<div class="account-creation-screen">
  <div class="small-advert-account">
    <img src="src/images/Small_Advert1.png" class="small-advert1">
    <img src="src/images/Small_Advert1.png" class="small-advert1">
  </div>
  <div class="create-account-form">
    <form action="ben_account_process.php" method="post">
      <div>
      <input type="text" name="firstname1" placeholder="First Name" class="input-spacing" required>
      <input type="text" name="lastname1" placeholder="Last Name" class="input-spacing" required></div><br>
      <input type="text" name="firstname2" placeholder="First Name (optional)" class="account-form-input">
      <input type="text" name="lastname2" placeholder="Last Name (optional)" class="account-form-input"><br>
      <input type="text" name="bankname" placeholder="Bank Name" class="account-form-input" required>
      <input type="text" name="bankaccount" placeholder="Bank Account Number" class="account-form-input" required><br>
      <input type="email" name="email" placeholder="Email" class="account-form-input" required>
      <input type="phone" name="phone" placeholder="Phone Number" class="account-form-input" required><br>
      <input type="password" name="password1" placeholder="Password" class="account-form-input" required>
      <input type="password" name="passwordre1" placeholder="Re-Enter Password" class="account-form-input" required><br><br><br>
      <button type="submit" method="post" class="account-creation-button">Start an Experience!</button>
    </form>
  </div>
  <div class="create-account-images">
    <div class="top-account-images">
      <div class="profile-image-upload">
        <img src="src/images/Profile_Pic.png" class="profile-pic"><br>
        <button type="button" class="upload-profile-image">Upload a Profile Image</button>
      </div>
      <img src="src/images/Medium_Advert1.png" class="medium-advert">
    </div>
    <img src="src/images/Large_Advert1.png" class="large-advert">
  </div>
</div>
</body>
</html>
