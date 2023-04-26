<?php
require "config.php";
session_start();
/*if (!isset($_SESSION['senduname']) || $_SESSION['loggedin'] != true) {
header("location: login.html");
}*/
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="blog.css">
    <title>Blog</title>
</head>

<body>
    <div class="navbar">
        <header>
            <div class="name">
                <h1>Rohan Burman</h1>
            </div>

            <div class="nav">
                <nav>
                    <ul>
                        <li><a href="homepage.php">Home</a></li>
                        <li><a href="skills.php">Skills & Achievements</a></li>
                        <li><a href="education.php">Education & Qualifications</a></li>
                        <li><a href="experience.php">Experience</a></li>
                        <li><a href="portfolio.php">Portfolio</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="viewBlog.php">Blog</a></li>
                        <li>
                            <?php
                            if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true && isset($_SESSION["userType"]) && $_SESSION["userType"] == "admin") {
                                echo '<a href="writePost.php">Write a Post</a></li>';
                                echo '<li><a href="logout.php">Log Out</a></li>';
                            } elseif ($_SESSION['loggedin'] == false) {
                                echo '<a href="login.html">Login</a>';
                            }
                            ?>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>
    </div>
    <?php
    $titleQuery = "SELECT * FROM blog ORDER BY date_created DESC";
    $titles = mysqli_query($conn, $titleQuery);
    $c=0;
    
    while ($row = mysqli_fetch_array($titles, MYSQLI_ASSOC)) {
        //echo $c.'<br>'.$rowNum;
        $date = date("d/m/Y", strtotime($row["date_created"]));
        $_SESSION[$c]= array(
            "title" => $row["title"],
             "date" => $date,
             "author" => $row["author"],
             "description" => $row["description"], 
             "content" => $row["content"]
        );
        //print_r($_SESSION[$rowNum]);
        $encodedArray=http_build_query($_SESSION[$c]);
        $query= "viewPost.php?$encodedArray";
        echo '<div class = "blog">';
        echo '<h2><a href="'. $query.'">'. $row["title"] . '</h2>';
        echo '<h5><ul><li>' . $date . '</li><li>By <strong>' . $row["author"] . '</strong></li></ul></h5><br>';
        echo '<p>' . $row["description"] . '</p></a>';
        echo '</div><hr>';
        $c++;
    }
    ?>

</html>