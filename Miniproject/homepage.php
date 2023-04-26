<?php
session_start();
print_r($_SESSION);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="homepage.css">
    <link rel="stylesheet" href="navbar.css">
    <title>Homepage</title>
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
                        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
                            echo '<a href="logout.php">Log Out</a>';
                        }
                        else if($_SESSION['loggedin']==false){
                            echo '<a href="login.html">Login</a>';
                        }
                        ?></li>
                    </ul>
                </nav>
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