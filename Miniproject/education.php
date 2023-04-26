<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="education.css">
    <title>Education & Qualifications</title>
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