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
        $titleQuery = "SELECT title, description, author, date_created FROM blog ORDER BY date_created DESC";
        $titles = mysqli_query($conn, $titleQuery);
        while ($row = mysqli_fetch_array($titles, MYSQLI_ASSOC)) {
            echo '<div class = "blog"><br>';
            echo '<h2><a href="viewPost.php">'.$row["title"].'</h2>';
            echo '<h5><ul><li>'.$row["date_created"].'</li><li>By <strong>'.$row["author"].'<strong></li></ul></h5><br>';
            echo '<p>'.$row["description"].'</p></a>';
            echo '<hr>'.'</div>';
        }
    ?>
</html>