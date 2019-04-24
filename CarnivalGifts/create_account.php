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
    <form action="submit">
      <input type="text" name="firstname1" value="First Name" class="account-form-input">
      <input type="text" name="lastname1" value="Last Name" class="account-form-input"><br>
      <input type="text" name="firstname2" value="First Name (optional)" class="account-form-input">
      <input type="text" name="lastname2" value="Last Name (optional)" class="account-form-input"><br>
      <input type="text" name="bankname" value="Bank Name" class="account-form-input">
      <input type="text" name="bankaccount" value="Bank Account Number" class="account-form-input"><br>
      <input type="email" name="email" value="Email" class="account-form-input">
      <input type="phone" name="phone" value="Phone Number" class="account-form-input"><br>
      <input type="text" name="password" value="Password" class="account-form-input">
      <input type="text" name="passwordre" value="Re-Enter Password" class="account-form-input"><br><br><br>
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
