<?php
  function sendmail_confirmation($email, $message) {
    $to = $email;
    $subject = "confirmation";
    $headers = "From: studybuddy" . "\r\n" .
    "CC: ";

    $txt = $message;
    if(mail($to, $subject, $txt, $headers)){
      return true;
    } else {
      return false;
    }
  }

  //sendmail_confirmation("hah51@mail.aub.edu");
?>
