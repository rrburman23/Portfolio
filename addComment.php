<?php
require 'config.php';
session_start();

if (isset($_POST['id']) && isset($_POST['comment'])) {
    $id = $_POST['id'];
    $comment = $_POST['comment'];
} else {
    echo 'not set';
}

$author = $_SESSION["senduname"];
date_default_timezone_set('Europe/London');
$date = date('Y/m/d H:i');

$sql = "SELECT * FROM comments WHERE  content = '$comment' AND post_id ='$id' LIMIT 1";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);

if (!$result) {
    echo ("Invalid comment");
} else {
    $sql1 = "INSERT INTO comments(post_id,author,date_created,content) VALUES ('$id','$author','$date','$comment')";
    if (mysqli_query($conn, $sql1)) {

        header("Location: viewPost.php?id=" . $id);

    } else {
        echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
    }
}

?>