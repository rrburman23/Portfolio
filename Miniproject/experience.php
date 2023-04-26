<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="experience.css">

    <title>Experience</title>
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
                            if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
                                echo '<a href="logout.php">Log Out</a>';
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

    <div class="exp">
        <h2>Experience</h2>
        <br>
        <ul>
            <li>L3 Harris Work Experience
                <ul>
                    <li>CAD & CAM Software</li>
                    <li>Electronic Circuits</li>
                    <li>Hardware Programming</li>
                </ul>
            </li>
            <li>Royal Air Force Air Cadets
                <ul>
                    <li>Teamwork & leadership</li>
                    <li>Computer Vision</li>
                    <li>Electronic Circuits</li>
                </ul>
            </li>
        </ul>

    </div>
</body>

</html>