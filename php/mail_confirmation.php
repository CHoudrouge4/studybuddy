<?php
      /**
      *    @param: email the email of the reciever, $message the message the he/she will recieved
      *    @return true if the email is sent false otherwize.
      */
      function sendmail_confirmation($email, $message) {
            $subject = "confirmation";                //set the subject
            $headers = "From: studybuddy" . "\r\n" . //set the header message
            "CC: ";
            return mail($email, $subject, $message, $headers);
      }


?>
