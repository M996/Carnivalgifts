<?php

session_start();

if (isset($_REQUEST['Email']) && isset ($_REQUEST['Password'])) {
    //set session variables
    $_SESSION['email'] = $_REQUEST['Email'];
    $_SESSION['password'] = $_REQUEST['Password'];

    require 'config.php';

    $SQLCheckForPass = 'SELECT beneficiaryID FROM beneficiary WHERE email = "' . $_SESSION['email'] . '" AND password= ' . '"' . $_SESSION['password'] . '"';
    $result = mysqli_query($db, $SQLCheckForPass);
    $row_count = $result->num_rows;
    $result = mysqli_fetch_array($result);

    if ($row_count == 1) {
          $_SESSION['benID'] = $result['beneficiaryID'];
          header("Location: http://localhost/MilestoneProject/index.php");

    } else {
        // terminate user session if logon fails.
          echo '<h2> Invalid Email or Password </h2>';

        unset($_SESSION['email']);
        unset($_SESSION['password']);
        session_destroy();
    }
}
?>

<body>
    <form name="login" action="" methods="GET">
        <fieldset>
            <legend><strong>Employee Logon</strong></legend><br>
            <div id="feildgrid">
                <div id="row">
                    <div id="fieldlabel">
                        <label for="UserID"><strong>Email</strong></label>

                    </div>
                    <div id="fieldlabel">
                        <input type="text" name="Email" size="8" id="UserID">

                    </div>
                    <div id="fieldlabel">
                        <label for="Password"><strong>Password</strong></label>

                    </div>
                    <div id="fieldlabel">
                        <input type="password" name="Password" size="50" id="Password">

                    </div>

                </div>


            </div>
            <div id="buttongrid">
                <div id="row">
                    <div id="buttoncell" align="right"><input type="submit" value="Logon" name="submit"></div>
                </div>
            </div>
        </fieldset>
    </form>
</body>
