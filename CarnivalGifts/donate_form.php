<?php include 'header.php' ?>

<head>
<title>Make a Donation</title>
</head>
 <?php

  $fname1 = $_REQUEST['fname1'];
  $lname1 = $_REQUEST['lname1'];
  $fname2 = $_REQUEST['fname2'];
  $lname2 = $_REQUEST['lname2'];
  $ben_id = $_REQUEST['ben-id'];



echo '<div class="payment-form">
  <div class="small-advert-account">
    <img src="src/images/Small_Advert1.png" class="small-advert1">
    <img src="src/images/Small_Advert1.png" class="small-advert1">
  </div>
  <div class="make-payment-form">
    <form action= "donate_process.php" method="post">
      <div class="form-row-pay">
        <input type="text" name="beneficiaryID" class="hidden-class" value="' . $ben_id . '"/>
        <input type="text" name="firstname1" value="' . $fname1 . '" class="input-spacing" readonly/>
        <input type="text" name="lastname1" value="' . $lname1 . '" class="input-spacing" readonly/>
      </div>
      <div class="form-row-pay">
        <input type="text" name="firstname2" value="' . $fname2 . '" class="input-spacing" readonly/>
        <input type="text" name="lastname2" value="' . $lname2 . '" class="input-spacing" readonly/>
      </div>
      <div class="form-row-pay">
        <input type="text" name="amount" placeholder="0.00" class="amount-pay">
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
        <input type="text" name="cardnumber" placeholder="Card Number" class="cardnumber-pay"/>
        <input type="text" name="expiration" placeholder="MM/YY" class="expiration-pay"/>
        <input type="text" name="cvs" placeholder="CVC" class="expiration-pay"/>
      </div>
        <div class="form-row-pay">
      <input type="reset" value="Clear Form" />&nbsp; &nbsp;
      <input type="submit" name="Submit" value="Send Form" />
        </div>
    </form>
    </div>
    <div class="top-account-images">
      <img src="src/images/Medium_Advert1.png" class="medium-advert">
    </div>
  </div>'
  ?>

</body>
</html>
