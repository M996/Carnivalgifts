<?php

session_start();

if (isset($_REQUEST['Email']) && isset ($_REQUEST['Password'])) {
    //set session variables
    $_SESSION['email'] = $_REQUEST['Email'];
    $_SESSION['password'] = $_REQUEST['Password'];

    require 'config.php';

    $SQLCheckForPass = 'SELECT beneficiaryID, beneficiary_F_Name FROM beneficiary WHERE email = "' . $_SESSION['email'] . '" AND password= ' . '"' . $_SESSION['password'] . '"';
    $result = mysqli_query($db, $SQLCheckForPass);
    $row_count = $result->num_rows;
    $result = mysqli_fetch_array($result);

    if ($row_count == 1) {
          $_SESSION['benID'] = $result['beneficiaryID'];
          $_SESSION['fname'] = $result['beneficiary_F_Name'];
          header("Location: http://localhost/MilestoneProject/index.php");

    } else {
        // terminate user session if logon fails.
          echo '<h2> Invalid Email or Password </h2>';

        unset($_SESSION['email']);
        unset($_SESSION['password']);
        session_destroy();
    }
}

 include 'header.php';
?>

<body>
    <form name="login" action="" method="post">
      <div class="field-container">
        <fieldset>
            <legend><strong>Please Login to CarnivalGifts or Click "Search" to Find Someone Else</strong></legend><br>
            <div id="feildgrid">
                <div id="row">
                    <div id="fieldlabel">
                        <label for="UserID"><strong>Email</strong></label>

                    </div>
                    <div id="fieldlabel">
                        <input type="text" name="Email" size="30" id="UserID" class="account-form-input">

                    </div>
                    <div id="fieldlabel">
                        <label for="Password"><strong>Password</strong></label>

                    </div>
                    <div id="fieldlabel">
                        <input type="password" name="Password" size="30" id="Password" class="account-form-input">

                    </div>

                </div>


            </div>
            <div id="buttongrid">
                <div id="row">
                    <button type="submit" class="account-login-button">Login</button>
                    <a href="create_account.php"><button type="button" class="account-login-button">Create Account</button></a>
                    <a href="donate.php"><button type="button" class="account-login-button">Search</button></a>
                  </div>
                </div>
            </div>
        </fieldset>
      </div>
    </form>
</body>
