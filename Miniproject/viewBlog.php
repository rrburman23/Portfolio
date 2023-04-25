<?php
//require "blog.html";
session_start();
if(!isset($_SESSION['senduname'])|| $_SESSION['loggedin']!=true){
    header(location: login.html);
}
//echo "Welcome ".$_SESSION['senduname'];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="writePost.css">
    <title>Add a Post</title>
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
                       <li> <?php
                        if($_SESSION['loggedin']==true){
                            echo '<a href="writePost.php">Write a Post</a></li>';
                            echo '<li><a href="logout.php">Log Out</a></li>';
                        }
                        elseif($_SESSION['loggedin']==false){
                            echo '<a href="login.html">Login</a>';
                        }
                        ?></li>
                    </ul>
                </nav>
            </div>
        </header>
    </div>
</html>