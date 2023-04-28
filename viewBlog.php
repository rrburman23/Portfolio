<?php session_start();
require 'config.php';
if (!(isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == true)) {
    $_SESSION["userType"] = 'guest';
    $_SESSION["senduname"] = null;
    $_SESSION["loggedin"] = false;
}

error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
/*if (!isset($_SESSION['senduname']) || $_SESSION['loggedin'] != true) {
header("location: login.php");
}*/
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="viewBlog.css">
    <script src="script.js"></script>
    <title>Blog</title>
</head>

<body>
    <div class="navbar">
        <header>
            <div class="name">
                <h1><a href="homepage.php">Rohan Burman</a></h1>
            </div>

            <div class="nav">
                <nav>
                    <ul class=nav-links>
                        <li><a class="item" href="homepage.php">Home</a></li>
                        <li><a class="item" href="skills.php">Skills & Achievements</a></li>
                        <li><a class="item" href="education.php">Education & Qualifications</a></li>
                        <li><a class="item" href="experience.php">Experience</a></li>
                        <li><a class="item" href="portfolio.php">Portfolio</a></li>
                        <li><a class="item" href="contact.php">Contact</a></li>
                        <li><a class="item" href="viewBlog.php">Blog</a></li>

                        <?php
                        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true && isset($_SESSION["userType"]) && $_SESSION["userType"] == "admin") {
                            echo '<li><a href="writePost.php">Add Post</a></li>';
                        }
                        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
                            echo '<li><a id="logout" href="logout.php">Log Out</a>';
                        } else if ($_SESSION['loggedin'] == false) {
                            echo '<li id="login"><a href="login.php">Login</a><li>';
                            echo '<li id="signup"><a href="signup.php">Sign Up</a></li>';
                        }
                        ?>
                        </li>
                    </ul>
                </nav>

                <div id="hamburger-icon" onclick="toggleMobileMenu(this)">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
                    <ul class="mobile-menu">
                        <li><a class="item" href="homepage.php">Home</a></li>
                        <li><a class="item" href="skills.php">Skills & Achievements</a></li>
                        <li><a class="item" href="education.php">Education & Qualifications</a></li>
                        <li><a class="item" href="experience.php">Experience</a></li>
                        <li><a class="item" href="portfolio.php">Portfolio</a></li>
                        <li><a class="item" href="contact.php">Contact</a></li>
                        <li><a class="item" href="viewBlog.php">Blog</a></li>

                        <?php
                        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true && isset($_SESSION["userType"]) && $_SESSION["userType"] == "admin") {
                            echo '<li><a href="writePost.php">Add Post</a></li>';
                        }
                        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
                            echo '<li><a id="logout" href="logout.php">Log Out</a>';
                        } else if ($_SESSION['loggedin'] == false) {
                            echo '<li id="login"><a href="login.php">Login</a><li>';
                            echo '<li id="signup"><a href="signup.php">Sign Up</a></li>';
                        }
                        ?>
                        </li>
                    </ul>
                </div>
        </header>
    </div>
    <?php
    $titleQuery = "SELECT * FROM blog ORDER BY date_created DESC";
    $titles = mysqli_query($conn, $titleQuery);
    $c = 0;

    while ($row = mysqli_fetch_array($titles, MYSQLI_ASSOC)) {
        $id = $row["id"];
        $date = date("d F Y", strtotime($row["date_created"]));
        $query = "viewPost.php?id=" . $id;
        echo '<div class = "blog">';
        echo '<h2><a href="' . $query . '">' . $row["title"] . '</h2>';
        echo '<h5><ul><li>' . $date . '</li><li>By <strong>' . $row["author"] . '</strong></li></ul></h5><br>';
        echo '<p>' . $row["description"] . '</p></a>';
        echo '</div><div class="hr-container"><hr></div>';
        $c++;
    }
    ?>

</html>