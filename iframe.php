<?php
      /*
      * sign out implementation
      * if the sign out button is pressed destroy the session and redirect to the index page
      */
      session_start();
      if (isset($_SESSION['email'])) {
            //check if the sign out button is pressed.
            if (isset($_POST["sign_out_x"]) &&  isset($_POST["sign_out_y"]) ) {
                  session_destroy();                  // destroy the session
                  header("Location: index.php");      // direct to the index page
            }
      } else {
            header("Location: index.php");            // if seesion is not set always redirect to the index page.
      }


?>
<!-- this file is the bar that appear at the top of each page. -->
<!DOCTYPE>
<html>

    <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <link href="CSS/panel.css" rel = "stylesheet">
    <title> Panel </title>
    <base target="_parent" />
    </head>
    <body link=black>
        <div class = "container">
            <span class="nav-links">

                <a href = "./php/profile.php" class = "nav_link_img">
                <img id = "profil_image" src = "Image\StudyBuddy_Logo.jpg">
                </a>

                <ul id = "panel" class = "pull-left" style="list-style-type:none" >

                    <li>
                        <a href = "./php/profile.php" class = "nav_link">
                            <span > Profile </span>
                        </a>
                    </li>
                    <li>
                        <a href = "./php/matches.php" class = "nav_link">
                        <span> Matches </span>
                        </a>
                    </li>

                    <li>
                        <a href = "./php/contacts.php" class = "nav_link">
                        <span> Contacts </span>
                        </a>
                    </li>

                    <li>
                        <a href = "./php/schedule.php" class = "nav_link">
                        <span> Weekly Schedule </span>
                        </a>
                    </li>

                    <li>
                        <a href = "./php/request_a_match.php" class = "nav_link">
                        <span> Request a Match </span>
                        </a>
                    </li>
                </ul>
                
                <form method = "post">
                        <input id = "sign_out" type = "image" name = "sign_out"  src ="./Image/log_out_corner.png">
                  </form>
                  
            </span>
        </div>
    </body>
</html>
