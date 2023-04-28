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
    <link rel="stylesheet" href="writePost.css">
    <script src="script.js"></script>
    <title>Add Post</title>
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


    <div class="container">
        <form method="POST" action="addPost.php">
            <label for="title">Title</label>
            <input type="text" id="title" class="inputText" name="title" placeholder="Title..." required>

            <label for="description">Description</label>
            <input type="text" id="description" class="inputText" name="description" placeholder="Description...">

            <label for="author">Author</label>
            <input type="text" id="author" class="inputText" name="author" placeholder="Your name..." required>

            <label for="content">Content</label>
            <textarea rows=23 id="content" class="inputText" name="content" placeholder="Write here..."
                required></textarea>

            <input class="btns" type="submit" value="Submit">
            <input class="btns" type="button" value="Clear" onclick="clearTxt()">
        </form>
    </div>
</body>

</html>