<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="contact.css">
    <title>Contact</title>
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
                        elseif($_SESSION['loggedin']==false){
                            echo '<a href="login.html">Login</a>';
                        }
                        ?></li>                  </ul>
                </nav>
            </div>
        </header>             
        
        <div class="container">
  <form method="post" action="contactMe.php">
    <h3> Write a message or <a href = "mailto: r.r.burman@se22.qmul.ac.uk">send me an email</a> or connect we me on <a href="https://uk.linkedin.com/in/rohan-burman-051394258?trk=people-guest_people_search-card>">LinkedIn</a></h3>
    
    <br>

    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name...">

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name...">

    <label for="email">Email:</label>
    <input type="email" id="email" size="30" placeholder="Your email..." required>

    <label for="msg">Message</label>
    <textarea id="msg" name="msg" placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" value="Submit">

  </form>
</div>
    </div>


</body>

</html>