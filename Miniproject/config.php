<?php

define ('DB_SERVER', 'localhost');
define ('DB_USERNAME','root');
define ('DB_PASSWORD', '');
define ('DB_DATABASE', 'phpportfolio');
$conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);


// Checking connection
if(!$conn){
    die("Failed to connect".mysqli_connect_error());
}
if ($conn->connect_error) {
    die("Failed to connect: " . $conn->connect_error);
  }

?>