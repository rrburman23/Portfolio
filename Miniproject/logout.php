<?php
require 'config.php';
session_start();
session_abort();
mysqli_close($conn);
header('location':'homepage.html');
?>