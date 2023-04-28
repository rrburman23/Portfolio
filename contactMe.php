<?php
session_start();
require 'config.php';
if (isset($_POST['fname'])) {
    $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $msg = mysqli_real_escape_string($conn, $_POST['msg']);
    date_default_timezone_set('Europe/London');
    $date = date('y/m/d');
}
$sql = "INSERT INTO contact (date,fname,lname,email,msg) VALUES ('$date','$fname','$lname','$email','$msg')";

mysqli_query($conn, $sql) or trigger_error("Query Failed! SQL: $sql - Error: " . mysqli_error($conn), E_USER_ERROR);
header("location: contact.php");
echo '<script type="text/javascript">
alert("Sent successfully"); 
</script>';
include "contact.php"
    ?>