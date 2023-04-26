<?php session_start();?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="viewPost.css">
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
                        <li>
                            <?php
                            if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
                                echo '<a href="logout.php">Log Out</a>';
                            } else if ($_SESSION['loggedin'] == false) {
                                echo '<a href="login.html">Login</a>';
                            }
                            ?>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>
    </div><br>
    </div>
    <?php
    $title=$_GET['title'];
    $date=$_GET['date'];
    $author=$_GET['author'];
    $description=$_GET['description'];
    $content=$_GET['content'];

    echo '<div class = "post">';
        echo '<h2 id = "title">'.$title. '</h2>';
        echo '<h5 id = "details"><ul><li>' . $date . '</li><li>By <strong>' . $author. '</strong></li></ul></h5><br>';
        echo '<br><p id = "description"><b>' . $description. '</b></p><br><hr><br>';
        echo '<p id = "content">'.$content.'</p>';
        echo '</div>';
	?>
</body>
</html>
