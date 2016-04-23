<?php
      require_once  "database.php";
      $db = new database();
      $email = $_GET['email'];
      $code  = $_GET['code'];


      $res = $db->select("SELECT confirmation_code FROM USER where EMAIL = '$email'");
      $db_code = $res[0]['confirmation_code'];



      if ($code == $db_code) {
            $db->query("UPDATE USER set confirmed = '1' where EMAIL = '$email'");
            $db->query("UPDATE USER set confirmation_code = '0' where EMAIL = '$email'");
            $msg = "<h1>   Thank you for signing up! </h1>
            <br>
            <h2>You are now ready to find a Study Buddy!</h2>";
      } else {
            $msg = "<h1>Your email or password do not match</h1><br><h2>Please try again</h2>";
      }
 ?>
 <!DOCTYPE>

 <html>
     <head>
         <title>Welcome to Study Buddy</title>
         <link rel="stylesheet" type="text/css" href="../CSS/grid-reset.css">
         <link rel="stylesheet" type="text/css" href="../CSS/style.css">
         <script src="Script/datamanip.js"></script>
     </head>

     <body>


            <header class="clearfix">
             <a href="#" class="logo"><img src="../Image/StudyBuddy_Logo.jpg"></a>

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
