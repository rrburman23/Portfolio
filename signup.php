<?php error_reporting(0);
require "config.php";

$showAlert = false;
$showError = false;

$uname = $_POST["uname"];
$email = $_POST["email"];
$pwd1 = $_POST["pswrd"];
$pwd2 = $_POST["pswrd2"];

if (isset($_POST["email"]) && isset($_POST["uname"])) {
    //Check if account with username or email already exists
    $existsSql = "SELECT * FROM accounts WHERE email = '$email' OR uname ='$uname'";
    $result = mysqli_query($conn, $existsSql);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        $showError = "Account with email or username already exists";
        /*
        echo '<script type="text/javascript">
        window.onload = function () { alert("Account with this email already exists");}
        document.getElementsByTagName("form")[0].reset(); 
        </script>'; */
    }

    //Check if email format is valid
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $showError = "Invalid email format";
        /*
        echo '<script type="text/javascript">
        window.onload = function () { alert("Invalid email format"); } 
        document.getElementbyId("pswrd").reset();
        document.getElementbyId("pswrd2").reset();
        </script>'; */
    } else {
        if ($pwd1 == $pwd2) {
            $hashPwd = password_hash($pwd1, PASSWORD_DEFAULT);

            $insert = "INSERT INTO accounts(uname, email, pwd, type) VALUES ('$uname', '$email, '$hashPwd', 'guest')";
            if (mysqli_query($conn, $insert)) {
                $showAlert = true;
                header("location: login.php");
            }

        } else {
            $showError = "Passwords do not match";
            /* echo '<script type="text/javascript">
            window.onload = function () { alert("Passwords do not match"); }
            document.getElementbyId("pswrd").reset();
            document.getElementbyId("pswrd2").reset(); 
            </script>';
            header("location: signup.php"); */
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="signup.css" />
    <script src="signupValidation.js"></script>
    <script src="https://kit.fontawesome.com/20e0d99309.js" crossorigin="anonymous"></script>
    <title>Sign Up</title>
</head>

<body>
    <?php
    if ($showAlert) {
        echo ' <script type="text/javascript">
        window.onload = function () { alert("Account successfully created"); }
        </script>';
        header("location: homepage.php");
    }

    if ($showError) {
        echo '<script type="text/javascript">
        window.onload = function () { alert("' . $showError . '"); }
        document.getElementbyId("pswrd").reset();
        document.getElementbyId("pswrd2").reset(); 
        </script>';
    }
    ?>
    <h1>Sign Up</h1>
    <form id="signupForm" onsubmit="return matchPassword()" method="post" action="signup.php">
        <!--Headings for form
    <div class="headingContainer">
      <h3><b>Sign </b></h3>
    </div> -->

        <!--Container for inputs-->
        <div class="mainContainer">
            <h1>Register</h1>
            <p>Please fill in this form to create an account.</p>
            <hr>

            <label for="email"><i class="fas fa-envelope"></i><b> Email:</b></label>
            <input type="email" placeholder="Enter Email" name="email" id="email" required>

            <label for="uname"><i class="fas fa-user"></i><b> Username:</b></label>
            <input type="text" placeholder="Enter Username" name="uname" id="uname" required>

            <label for="pswrd"><i class="fas fa-lock"></i><b> Password:</b></label>
            <input type="password" placeholder="Enter Password" name="pswrd" id="pswrd"
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                required>

            <label for="pswrd2"><i class="fas fa-lock"></i><b> Confirm Password:</b></label>
            <input type="password" placeholder="Repeat Password" name="pswrd2" id="pswrd2" required>
            <hr>

            <button type="submit" class="registerbtn">Register</button>
        </div>

        <div class="login-container">
            <p>Already have an account? <a href="login.php">Log in</a>.</p>
        </div>
    </form>
    <br />

    <div id="message">
        <h3>Password must contain the following:</h3>
        <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
        <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
        <p id="number" class="invalid">A <b>number</b></p>
        <p id="length" class="invalid">Minimum <b>8 characters</b></p>
    </div>
</body>

</html>