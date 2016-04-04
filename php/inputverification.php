<?php
    /*
    * @param: string name
    * @return true if the name validate the following condition else otherwize
    * -name: contain only letter no number length less than 50;
    *
    */
    function valid_name($name) {
        return strlen($name) <= 50 && ctype_alpha($name);
    }

    /*
    * input: string password
    * return true if the password validate the following condition else otherwize
    *  password should be more the 8 charachters, contain letter and digits,
    */
    function valid_pasword($password) {
        return strlen($password) <= 100 && strlen($password) > 8 && ctype_alpha($password) == false;
    }

    /*
    * input string email
    * return true if email satisfy the following condition false otherwize
    *  email should be aub mail password for student has the form abc00@mail.aub.edu or
    * abc000@mail.aub.edu.lb
    */
    function valid_email($email) {
        $email_length = strlen($email);
        if($email_length != 19 && $email_length != 18) {
            echo "1";
            return false;
        }

        if($email_length == 18 && substr($email, 5) != "@mail.aub.edu") {
            echo "2";
            return false;
        }

        if ($email_length == 19 && substr($email, 6) != "@mail.aub.edu") {
            echo "3";
            return false;
        }

        for ($i = 0; $i < 3; $i++) {
           if(!ctype_alpha($email[$i])) {
              return false;
           }
        }

        if(!is_numeric($email[3]) || !is_numeric($email[4]) || (!is_numeric($email[5]) && $email[5] != "@") ) {
              echo "4";
            return false;
        }

        return true;
    }

    // form handler
    if($_POST && isset($_POST['submit_button'], $_POST['first_name'], $_POST['last_name'], $_POST['aub_mail'], $_POST['sign_up_password'], $_POST['sign_up_password_confirmation'])) {

        $first_name = $_POST['first_name'];
        $last_name  = $_POST['last_name'];
        $email = $_POST['aub_mail'];
        $password = $_POST['sign_up_password'];
        $password_confirmation = $_POST['sign_up_password_confirmation'];

       if(!$first_name) {
            $errorMsg = "Please enter your First Name";
       } else if(!valid_name($first_name)){
           $errorMsg = "First name should not contain numbers or special charachters";
       } else if (!$last_name) {
           $errorMsg = "Please enter your Last Name";
       } else if (!valid_name($last_name)) {
            $errorMsg = "Last name should not contain numbers or special charachters";
       } else if(!$email || !preg_match("/^\S+@\S+$/", $email)) {
            $errorMsg = "Please enter a valid Email address";
       } else if (!valid_email($email)) {
            $errorMsg = "Please enter a valid aub student email";
       } else if(!$password) {
            $errorMsg = "Please enter your password";
       } else if(!valid_pasword($password)) {
            $errorMsg = "Password should contain more than 8 charachters (letter and numbers, or special charachters)";
       } else if (!$password_confirmation) {
            $errorMsg = "Please confirm your password";
       } else if ($password != $password_confirmation) {
           $errorMsg = "Password did not match! please try aggain";
       } else {
          require './php/signup.php';
    //        header('Location: ./signup.php');
          exit;
       }
            // send email and redirect
        /*    $to = "feedback@example.com";
            if(!$subject) $subject = "Contact from website";
            $headers = "From: webmaster@example.com" . "\r\n";
            mail($to, $subject, $message, $headers);
            header("Location: http://www.example.com/thankyou.html");
           // exit;
           return;*/
    }
?>
