<?php
session_start();
if(!isset($_SESSION['senduname'])|| $_SESSION['loggedin']!=true){
    header(location: login.html);
}
$title = $_POST['title'];
$description = $_POST['description'];
$author = $_POST['author'];
$content = $_POST['content'];
date_default_timezone_set=('Europe/London');
$date = date('d/m/y');

$sql = "SELECT * FROM blog WHERE title = '$title'";
result = mysqli_query($conn, $sql);
 $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
 $active = $row['active'];
 $count = mysqli_num_rows($result);

 if(count==0){
    alert("Title invalid");
 }
?>