<?php include 'header.php' ?>

<head>
<title> Create A Donor Account </title>
</head>

<div class="account-creation-screen">
  <div class="small-advert-account">
    <img src="src/images/Small_Advert1.png" class="small-advert1">
    <img src="src/images/Small_Advert1.png" class="small-advert1">
  </div>
  <div class="make-payment-form">
    <form action= "account_process.php" method="post">
      <div class="form-row-pay">
        <input type="text" name="firstnamedonor" value="First Name" class="input-spacing"/>
        <input type="text" name="lastnamedonor" value="Last Name" class="input-spacing"/>
      </div>
      <div class="form-row-pay">
        <input type="radio" name="payment-type" id="mastercard" value="Mastercard">
        <label for="mastercard">Mastercard</label>
        <input type="radio" name="payment-type" id="discover" value="Discover">
         <label for="discover">Dicover</label>
        <input type="radio" name="payment-type" id="visa" value="Visa">
         <label for="visa">Visa</label>
        <input type="radio" name="payment-type" id="paypal" value="Paypal">
         <label for="paypal">Paypal</label>
      </div>
      <div class="form-row-pay-card">
        <input type="text" name="cardnumber" value="Card Number" class="cardnumber-pay"/>
        <input type="text" name="expiration" value="Expiration Date" class="expiration-pay"/>
        <input type="text" name="cvs" value="CVS number" class="expiration-pay"/>
      </div>
      <div class="form-row-pay">
        <input type="text" name="email" value="Email" class="input-spacing"/>
        <input type="text" name="phone" value="Phone" class="input-spacing"/>
      </div>
      <div class="form-row-pay">
        <input type="text" name="password" value="Password" class="input-spacing"/>
        <input type="text" name="passwordre" value="Repeat Password" class="input-spacing"/>
      </div>
        <div class="form-row-pay">
      <input type="submit" name="Submit" value="Save Account" />
        </div>
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
