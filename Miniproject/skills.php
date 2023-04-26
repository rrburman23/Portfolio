<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="skills.css">
    <title>Skills & Achievements</title>
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

    <div class="video">
        <iframe width="840" height="472" src="https://www.youtube.com/embed/DQC1QEr1X3Y" title="YouTube video player"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            allowfullscreen></iframe>
    </div>

    <div class="row">
        <div class="column">
            <h2>rohandrums</h2>
            <div id="links">
                <ul>
                    <li><a href="https://www.youtube.com/@rohandrums">YouTube</a></li>
                    <li><a href="https://www.instagram.com/rohandrums/">Instagram</a></li>
                </ul>
            </div>
            <p> I am a self taught drummer and over the COVID lockdowns, I decided to record and post drum covers to
                YouTube and Instagram.</p>
        </div>
        <div class="column">
            <h2>Royal Air Force Air Cadets</h2>
            <p>I was a member of the RAF Air Cadets from 2015 till 2021. Through these years, I rose to the rank of
                Corporal and represented my Squadron, Sussex Wing and the LaSER Region at many events and competions.
            </p>
            <br>
            <p>I also learnt many valuable skills and earned many qualifications. For example:</p>
            <div class="atcSkills">
                <ul>
                    <li>Silver Duke Of Edinburgh Award</li>
                    <li>First Aid</li>
                    <li>Aircraft Maintenance & Engineering</li>
                    <li>Fieldcraft & Shooting</li>
                    <li>(Un)Powered Aircraft Flying</li>
                    <li>Rock Climbing & Bouldering</li>
                </ul>
            </div>

        </div>
    </div>
</body>

</html>