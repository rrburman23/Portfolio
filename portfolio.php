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
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="navbar.css" />
  <link rel="stylesheet" href="portfolio.css" />
  <script src="script.js"></script>
  <title>Portfolio</title>
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

  <div class="portfolio">
    <h2>Portfolio</h2>
    <br />
    <p>
      Whilst studying Computer Science for over 7 years I have studied many
      languages.
    </p>
    <ul>
      <li>Python</li>
      <li>Java</li>
      <li>C & C++</li>
      <li>C#</li>
      <li>HTML, CSS, JavaScript</li>
      <li>PHP</li>
      <li>Bash</li>
      <li>Kotlin</li>
      <li>Dart</li>
      <li>SQL</li>
    </ul>
  </div>

  <div class="projects">
    <h2>Past Projects</h2>
    <br>
    <ul>
      <li>A-Level Project: <a href="https://rohan-burman.github.io/Aircraft-Tracker/">AircraftTracker</a></li>
      <ul>
        <li><b>Warning: It can be very memory and CPU intensive</b></li>
      </ul>
      <li><a href="https://github.com/RoloMaster23?tab=repositories">GitHub</a></li>
    </ul>
  </div>
</body>

</html>