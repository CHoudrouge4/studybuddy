<?php


      require_once "database.php";
      require_once "inputverification.php";


      $email = $_POST['forgot_email'];

      if (valid_email($email)) {
            function sendmail_recovery($email) {
                  $db    = new database();
                  $pass = rand();
                  $stmt  = "UPDATE USER SET PASSWORD  = '$pass' where EMAIL = '$email'";
                  $db->query($stmt);


                  $subject = "recovery password";                //set the subject
                  $headers = "From: studybuddy" . "\r\n" .
                  "CC: ";
                  $message = "your new password is  $pass ";
                  return mail($email, $subject, $message, $headers);

            }

            sendmail_recovery($email);
      }

?>
