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
                        <li><a href="homepage.html">Home</a></li>
                        <li><a href="skills.html">Skills & Achievements</a></li>
                        <li><a href="education.html">Education & Qualifications</a></li>
                        <li><a href="experience.html">Experience</a></li>
                        <li><a href="portfolio.html">Portfolio</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="viewBlog.php">Blog</a></li>
                        <li><a href="writePost.html">Write a Post</a></li>
                        <li><a href="login.html">Login</a></li>
                    </ul>
                </nav>
            </div>
        </header>
    </div>
</html>