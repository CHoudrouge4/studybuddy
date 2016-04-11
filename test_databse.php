<?php

      $host = "127.0.0.1";
      $dbuser = "study_buddy_db";
      $pass = "study_buddy_choudrouge4";// enter ur database password.
      $dname = "study_buddy";
      $connection = mysqli_connect($host,$dbuser,$pass,$dname);
      if(mysqli_connect_errno()) {
          die("Connection Failed!" . mysqli_connect_error());
      }
      $stmt = mysqli_stmt_init($connection);
      if (mysqli_stmt_prepare($stmt, "SELECT email, password, confirmed FROM USER WHERE EMAIL = ?")) {
           /* bind parameters for markers */
           mysqli_stmt_bind_param($stmt, "s", $email);

           /* execute query */
           mysqli_stmt_execute($stmt);

           /* bind result variables */
           mysqli_stmt_bind_result($email_check, $password_conf, $conf);

           mysqli_stmt_fetch($stmt);
           echo "2";

           echo $email_check;
           mysqli_stmt_close($stmt);
      }
?>
