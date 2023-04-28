<?php
require 'config.php';
session_start();
if (!isset($_SESSION['senduname']) || $_SESSION['loggedin'] != true) {
   header('location: login.php');
}

if (isset($_POST['title'])) {
   $title = $_POST['title'];
   $description = $_POST['description'];
   $author = $_POST['author'];
   $content = $_POST['content'];
   date_default_timezone_set('Europe/London');
   $date = date('Y/m/d H:i');
}

$sql = "SELECT * FROM blog WHERE  title = '$title' LIMIT 1";
echo $title;
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
//echo $count;

if (!$result) {
   echo ("Title invalid");
} else {
   $sql1 = "INSERT INTO blog (title,description,author,date_created,content) VALUES ('$title','$description','$author','$date','$content')";
   //mysqli_query($conn,$sql1) or trigger_error("Query Failed! SQL: $sql1 - Error: ".mysqli_error($conn), E_USER_ERROR);
   if (mysqli_query($conn, $sql1)) {
      echo '<script type="text/javascript">
      alert("New post created successfully"); 
</script>';
      include "viewBlog.php";
   } else {
      echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
   }
}
?>