<?php error_reporting(0);
$login = false;
$showError = false;

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
  header("location: viewBlog.php");
  exit;
}
require "config.php";

if (isset($_POST["username"]) && isset($_POST["pwd"])) {

  $uname = mysqli_real_escape_string($conn, $_POST["username"]);
  $pwd = mysqli_real_escape_string($conn, $_POST["pwd"]);

  if (filter_var($uname, FILTER_VALIDATE_EMAIL)) {
    $sql = "SELECT * FROM accounts WHERE email = '$uname'";
  } else {
    $sql = "SELECT * FROM accounts WHERE uname = '$uname'";
  }

  $result = mysqli_query($conn, $sql);
  $count = mysqli_num_rows($result);


  if ($count == 1) {
    while ($row = mysqli_fetch_assoc($result)) {
      if (password_verify($pwd, $row['pwd'])) {
        echo $pwd;
        session_start();
        $login = true;
        echo '<script>console.log("login successful")</script>';
        $_SESSION["loggedin"] = true;
        $_SESSION["senduname"] = $uname;
        $_SESSION["userType"] = $row['type'];
        header("location: homepage.php");
      } else {
        $showError = "Invalid Credentials";
      }
    }
  } else {
    $showError = "Invalid Credentials count";
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="login.css">
  <script src="https://kit.fontawesome.com/20e0d99309.js" crossorigin="anonymous"></script>
  <title>Login</title>
</head>

<body>
  <?php
  if ($login) {
    echo '<script type="text/javascript">
    window.onload = function () { alert("Login successful"); } 
</script>';
    header("location:homepage.php");
  }
  if ($showError) {
    echo '  
    <script type="text/javascript">
    window.onload = function () { alert("' . $showError . '"); }
</script>';
    //header("location:login.php");
  }
  ?>

  <form method="post" action="login.php">
    <!--Headings for form-->
    <div class="headingContainer">
      <h1><b>Log in</b></h1>
    </div>

    <!--Container for inputs-->
    <div class="mainContainer">

      <!--Username-->
      <label for="username"><i class="fas fa-user"></i><b> Username or Email:</b></label>
      <input type="text" placeholder="Username or Email" name="username" required>
      <br><br>

      <!--Password-->
      <label for="pwd"><i class="fas fa-lock"></i><b> Password:</b></label>
      <input type="password" placeholder="Password" name="pwd" required>
      <br><br>

      <!--forgot password and rember me subcontainer-->
      <div class="subcontainer">
        <p class="forgotpsd"> <a href="mailto:rohan.burman23@gmail.com subject=" Forgot%20Password
            body=I%20have%20forgotten%my%password.">Forgot Password?</a></p>
      </div>

      <br>

      <!--Submit button-->
      <button type="submit">Login</button>
    </div>
  </form>

</body>

</html>