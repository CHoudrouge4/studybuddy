<?php
require_once "database.php";
require_once "inputverification.php";


$email = $_POST['forgot_email'];

if (valid_email($email)) {
      function sendmail_recovery($email) {
            $db    = new database();
            $stmt  = "SELECT password FROM USER where EMAIL = '$email'";
            $db->query($stmt);
            $res   = $db->query($stmt);
            $row   = mysqli_fetch_assoc($res);
            $password = $row['password'];
            $subject = "recovery password";                //set the subject
            $headers = "From: studybuddy" . "\r\n" .
            "CC: ";
            $pass = rand();

            $message =   $password ;
            return mail($email, $subject, $message, $headers);

      }

      sendmail_recovery($email);
}
?>
