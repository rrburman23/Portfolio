<?php
require 'config.php';
session_start();
$_SESSION["loggedin"] = false;
session_abort();
mysqli_close($conn);
header("location: homepage.php");
?>