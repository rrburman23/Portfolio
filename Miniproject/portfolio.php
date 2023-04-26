<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="navbar.css" />
  <link rel="stylesheet" href="portfolio.css" />
  <title>Portfolio</title>
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
              if ($_SESSION['loggedin'] == true) {
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