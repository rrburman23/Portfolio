<?php
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
  header("location: viewBlog.php");
  exit;
}
require "config.php";

$uname = mysqli_real_escape_string($conn, $_POST["username"]);
$pwd = mysqli_real_escape_string($conn, $_POST['pswrd']);
$hashPwd = password_hash($pwd, PASSWORD_DEFAULT);

$sql = "SELECT * FROM accounts WHERE uname = '$uname' AND pwd = '$pwd'";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);

if ($count != 1) {
  //header("location: viewBlog.php");
  //echo "Details inccorect. Please try again";
  echo '<script type="text/javascript">
       window.onload = function () { alert("Details inccorect. Please try again"); } 
</script>';
  include "login.html";
} else if ($count == 1) {
  session_start();
  $_SESSION["loggedin"] = true;
  $_SESSION["senduname"] = $uname;
  $_SESSION["userType"] = $row['type'];
  header("location: viewBlog.php");
}

?>