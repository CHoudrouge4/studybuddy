<?php
  require_once  "./php/database.php";
  $db = new database();

  $email = $_GET['email'];
  $code = $_GET['code'];

  echo $db->query("SELECT * FROM USER where EMAIL = '$email'");
  //$query = mysqli_query("SELECT * FROM USER where EMAIL = '$email'");
/* while ($row = mysqli_fetch_assoc($res)) {
    $db_code = $row['confirmation_code'];
  }

  if ($code == $db_code) {
    $db->query("update USER set confirmed = '1' where EMAIL = '$email'");
    $db->query("update USER set confirmation_code = '0' where EMAIL = '$email'");
    $msg = "<h1>   Thank you for signing up! </h1>
     <br>
     <h2>You are now ready to find a Study Buddy!</h2>";;
  } else {
     $msg = "<h1>Your email or password do not match</h1><br><h2>Please try again</h2>";
  }*/
 ?>
 <!--
 <!DOCTYPE>

 <html>
     <head>
         <title>Welcome to Study Buddy</title>
         <link rel="stylesheet" type="text/css" href="CSS/grid-reset.css">
         <link rel="stylesheet" type="text/css" href="CSS/style.css">
         <script src="Script/datamanip.js"></script>
     </head>

     <body>


            <header class="clearfix">
             <a href="#" class="logo"><img src="Image/StudyBuddy_Logo.jpg"></a>

                <h1>Study Buddy</h1>

             </header>
             <div class="container">
             <div id = "conf">
                  <?php
                  echo $msg;
                 ?>
             </div>
         </div>

     </body>



 </html>
-->
