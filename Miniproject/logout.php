<?php
require 'config.php';
session_start();
session_unset();
session_write_close();
session_destroy();
mysqli_close($conn);
session_start();
$_SESSION["userType"] = 'guest';
$_SESSION["senduname"] = null;
$_SESSION["loggedin"] = false;
header("location: homepage.php");
?>