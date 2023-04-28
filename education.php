<?php session_start();
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
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="education.css">
    <script src="script.js"></script>
    <title>Education & Qualifications</title>
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

    <div class="sixthForm">
        <h2>Sixth Form</h2>
        <p>Before joining Queen Mary University of London, I was a student at Brighton, Hove & Sussex Sixth Form College
            (BHASVIC). Here I studied: Maths, Further Maths, Computer Science & Phsyics</p><br><br>
        <p>Grades Acheived:</p>
        <ul>
            <li>Maths - A</li>
            <li>Further Maths - B</li>
            <li>Computer Science - B</li>
            <li>Physics - C</li>
        </ul>
    </div>
    <br><br>
    <div class="secondary">
        <h2>Secondary School</h2>
        <p>Before joining BHASVIC, I was a student at Warden Park Secondary Academy.</p><br><br>
        <p>Grades Acheived:</p>
        <ul>
            <li>Biology - 8</li>
            <li>Business Studies - 9</li>
            <li>Chemistry - 9</li>
            <li>Computer Science - 8</li>
            <li>English Language - 7</li>
            <li>English Literature - 8</li>
            <li>LIBF Level 2 Certificate in Personal Finance - A</li>
            <li>Geography - 8</li>
            <li>German - 5</li>
            <li>Additional Maths - C</li>
            <li>Maths - 8</li>
            <li>Physics - 9</li>
        </ul>
    </div>

</body>

</html>