<?php
session_start();
require 'config.php';

$fname = mysqli_real_escape_string($conn, $_POST["fname"]);  
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$email = mysqli_real_escape_string($conn, $_POST["email"]);  
$msg = mysqli_real_escape_string($conn, $_POST['msg']);
date_default_timezone_set('Europe/London');
$date = date('d/m/y');

$sql = "INSERT INTO contact (date,fname,lname,email,msg) VALUES ('$date','$fname','$lname','$email','$msg')";

mysqli_query($conn,$sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
   if(mysqli_query($conn,$sql1)){
      echo "New record created successfully";
   } else {
     echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
   //}


?>