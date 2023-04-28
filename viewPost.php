<?php error_reporting(0);
session_start();
require 'config.php';
if (!(isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == true)) {
    $_SESSION["userType"] = 'guest';
    $_SESSION["senduname"] = null;
    $_SESSION["loggedin"] = false;
}

$postID = $_GET["id"];


$sql = "SELECT * FROM blog WHERE id = '$postID'";
$r = mysqli_query($conn, $sql);

if (mysqli_num_rows($r) == 1) {
    $row = mysqli_fetch_assoc($r);
    $title = $row["title"];
    $date = $row["date_created"];
    $date = date("d F Y", strtotime($date));
    $author = $row["author"];
    $description = $row["description"];
    $content = $row["content"];
} else {
    die('Error executing query: ' . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="viewPost.css">
    <link rel="stylesheet" href="navbar.css">
    <script src="script.js"></script>

    <title>
        <?php echo $title ?>
    </title>
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
    </div><br>
    </div>
    <?php

    echo '<div class = "post">';
    echo '<h2 id = "title">' . $title . '</h2>';
    echo '<h5 id = "details"><ul><li>' . $date . '</li><li>By <strong>' . $author . '</strong></li></ul></h5><br>';
    echo '<br><p id = "description"><b>' . $description . '</b></p><br><div class="hr-container"><hr></div><br>';
    echo '<p id = "content">' . $content . '</p>';
    echo '</div> <div class="hr-container"><hr></div><br>';

    echo '<div class = "comments"><h3><b>Comments</b></h3><br>';

    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
        echo '
            <div class="comment-container">
                <form method="POST" action="addComment.php">
                    <input type="hidden" name="id" value="<?php echo $postID; ?>">
                    <label for="comment">Comment</label>
                    <input type="text" id="comment" class="inputText" name="comment" placeholder="Write here..." required>

                    <input class="btns" type="submit" value="Submit">
                    <input class="btns" type="button" value="Clear" onclick="clearTxt()">
                </form>
            </div>';
    } else if ($_SESSION['loggedin'] == false) {
        echo '<p><strong>You must be logged in to comment</strong></p><br><br>';
    }

    $query = "SELECT * FROM comments WHERE post_id = '$postID' ORDER BY date_created DESC";
    $comments = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($comments, MYSQLI_ASSOC)) {
        $date = date("d F Y", strtotime($row["date_created"]));
        echo '<div class = "singleComment">';
        echo '<p>' . $row["content"] . '</p></a>';
        echo '<h5><ul><li>' . $date . '</li><li>By <strong>' . $row["author"] . '</strong></li></ul></h5>';
        echo '</div><div class="hr-container"><hr></div><br>';
    }
    echo '</div>'
        ?>
</body>

</html>