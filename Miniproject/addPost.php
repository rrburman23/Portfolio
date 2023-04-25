<?php
require 'config.php';
session_start();
if(!isset($_SESSION['senduname'])|| $_SESSION['loggedin']!=true){
    header(location: login.html);
}
if(isset($_POST['title'])){
$title = $_POST['title'];
$description = $_POST['description'];
$author = $_POST['author'];
$content = $_POST['content'];
date_default_timezone_set('Europe/London');
$date = date('y/m/d');
}

$sql = "SELECT * FROM blog WHERE EXISTS title = '$title'";
echo $title;
$result = mysqli_query($conn, $sql);
echo $result;
 $count = mysqli_num_rows($result);
 echo $count;

 if(!$result){
    echo("Title invalid");
 }
 else{
   $sql1="INSERT INTO blog (title,description,author,data_created,content) VALUES ('$title','$description','$author','$date','$content')";
   mysqli_query($conn,$sql1) or trigger_error("Query Failed! SQL: $sql1 - Error: ".mysqli_error($conn), E_USER_ERROR);
   //if(mysqli_query($conn,$sql1)){
      echo "New record created successfully";
   //} else {
     echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
   //}
}
?>