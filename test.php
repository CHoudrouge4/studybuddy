<?php

  $fp = fsockopen('127.0.0.1', 587, $errno, $errstr, 5);
  if (!$fp) {
    echo "port is closed";
  } else {
    echo "port is open";  // port is open and available
  //  fclose($fp);
  }
  /*/*  function confirm($email) {
      $confirmcode = rand();
      $message = "
        Hello,
        You Signed up for Studybuddy \n
        please click in the link bellow to confirm your email.
        http:127.0.0.1/confirmationfom.php?email=$email&code=$confirmcode;
      ";
      mail($email,"Studybuddy confirmation mail", "FROM ");
    }
  */
  /*
      // Pear Mail Library
    require_once "Mail.php";

    $from = '<fromaddress@gmail.com>';
    $to = '<toaddress@yahoo.com>';
    $subject = 'Hi!';
    $body = "Hi,\n\nHow are you?";

    $headers = array(
        'From' => $from,
        'To' => $to,
        'Subject' => $subject
    );

    $smtp = Mail::factory('smtp', array(
            'host' => 'ssl://smtp.gmail.com',
            'port' => '465',
            'auth' => true,
            'username' => 'johndoe@gmail.com',
            'password' => 'passwordxxx'
        ));

    $mail = $smtp->send($to, $headers, $body);

    if (PEAR::isError($mail)) {
        echo('<p>' . $mail->getMessage() . '</p>');
    } else {
        echo('<p>Message successfully sent!</p>');
    }*/
  //  function send_confirm($email) {

    /*  $mail = new PHPMailer;

      $mail->isSMTP();                                      // Set mailer to use SMTP
      $mail->Host = 'smtp.gmail.com';                       // Specify main and backup server
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = 'studybuddy.confirmation@gmail.com';                   // SMTP username
      $mail->Password = 'softwareplusplus';               // SMTP password
      $mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
      $mail->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
      $mail->setFrom('studybuddy.confirmation@gmail.com', 'Studdy Buddy Team');     //Set who the message is to be sent from
      //$mail->addReplyTo('labnol@gmail.com', 'First Last');  //Set an alternative reply-to address
    //  $mail->addAddress($email, 'Josh Adams');  // Add a recipient
      $mail->addAddress($email);               // Name is optional
    //  $mail->addCC('cc@example.com');
    //  $mail->addBCC('bcc@example.com');
      $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
    //  $mail->addAttachment('/usr/labnol/file.doc');         // Add attachments
    //  $mail->addAttachment('/images/image.jpg', 'new.jpg'); // Optional name
      $mail->isHTML(true);                                  // Set email format to HTML

      $mail->Subject = 'Study Buddy confirmation';
      $mail->Body    = 'Hello,
                        You Signed up for Studybuddy \n
                        please click in the link bellow to confirm your email.
                        http:127.0.0.1/confirmationfom.php?email=$email&code=$confirmcode;';
      $mail->AltBody = 'Hello,
                        You Signed up for Studybuddy \n
                        please click in the link bellow to confirm your email.
                        http:127.0.0.1/confirmationfom.php?email=$email&code=$confirmcode;';

      echo "13";
      //Read an HTML message body from an external file, convert referenced images to embedded,
      //convert HTML into a basic plain-text alternative body
      //$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));

      if(!$mail->send()) {
         echo 'Message could not be sent.';
         echo 'Mailer Error: ' . $mail->ErrorInfo;
         exit;
      }
      echo 'Message has been sent';
    }
    send_confirm($email);*/
?>
