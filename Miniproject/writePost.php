<?php session_start(); ?>
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
                            echo '<a href="logout.php">Log Out</a>';
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

    
    <div class="container">
        <form method="POST" action="addPost.php">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" placeholder="Title..." required>

            <label for="description">Description</label>
            <input type="text" id="description" name="description" placeholder="Description...">
            
            <label for="author">Author</label>
            <input type="text" id="author" name="author" placeholder="Your name..." required>

            <label for="content">Content</label>
            <textarea rows=23 id="content" name="content" placeholder="Write here..." required></textarea>

            <input type="submit" value="Add Post">
       </form>
    </div>
    </body>
</html>