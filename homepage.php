<?php session_start();
error_reporting(0);
if (!(isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == true)) {
    $_SESSION["userType"] = 'guest';
    $_SESSION["senduname"] = null;
    $_SESSION["loggedin"] = false;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="homepage.css">
    <link rel="stylesheet" href="navbar.css">
    <script src="script.js"></script>
    <title>Homepage</title>
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
    </div><br>
    </div>

    <div class="wrapper">
        <div class="img">
            <figure>
                <img src="https://media.licdn.com/dms/image/D4D03AQGdBM7qET9ZuQ/profile-displayphoto-shrink_800_800/0/1670771071081?e=2147483647&v=beta&t=eVWagEwMiHSc1EjHtaPvKxFxHfPkwaMhciwapmMvL4Q"
                    alt="Photo of Me">
                <figcaption>Rohan Burman</figcaption>
            </figure>
        </div>
        <div class="about">
            <h2> Hi! My name is Rohan Burman.</h2>
            <p>
                I am studying BSc Computer Science at the School of Electronic Engineering and Computer Science at Queen
                Mary University of London.<br><br>
            </p>
        </div>
    </div>
</body>

</html>