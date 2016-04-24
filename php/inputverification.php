<?php

    /**
    * @param: string name
    * @return true if the name validate the following condition false otherwize
    * -name: contain only letter (no number), and its length less than 50;
    *
    */
    function valid_name($name) {
        // check the length and if it contain only letters
        return strlen($name) <= 50 && ctype_alpha($name);
    }

    /**
    * @param: string password
    * @return true if the password validate the following condition false otherwize
    *  password should be more than 8 charachters, contain letter and digits,
    */
    function valid_pasword($password) {
        // length is less than 100, greater than 8, and contain only letter.
        return strlen($password) <= 100 && strlen($password) > 8 && ctype_alpha($password) == false;
    }

    /**
    * @param string email
    * @return true if email satisfy the following condition false otherwize
    *  email should be aub mail for student, it has the form abc00@mail.aub.edu or
    * abc000@mail.aub.edu.lb
    */
    function valid_email($email) {

        $email_length = strlen($email);                     //get the string length
        // check if the length is legal.
        if($email_length != 19 && $email_length != 18)
              return false;
        // check if the length is 18 the end of the email after @ is legal
        if($email_length == 18 && strcmp(substr($email, 5),"@mail.aub.edu") !== 0)
            return false;
        //check if the length is 19 the end of the email after @ is legal
        if ($email_length == 19 && strcmp(substr($email, 6),"@mail.aub.edu") !== 0)
            return false;

        //check if the first three charachters are letter;
        if(!ctype_alpha(substr($email, 0, 3)))
           return false;

        //check if the fourth and the fifth are numerals or the fifth and sixth are numerals
        if(!is_numeric($email[3]) || !is_numeric($email[4]) || (!is_numeric($email[5]) && $email[5] != "@") )
            return false;

        return true;
    }


    // form handler check if everything is setted.
    if($_POST && isset($_POST['submit_button'], $_POST['first_name'], $_POST['last_name'], $_POST['aub_mail'], $_POST['sign_up_password'], $_POST['sign_up_password_confirmation'])) {

      $first_name = $_POST['first_name'];                                     //get the first name from the form using the post method
      $last_name  = $_POST['last_name'];                                      //get the last name from the form using the post method
      $email = $_POST['aub_mail'];                                            // get the email from the form using the post method
      $password = $_POST['sign_up_password'];                                 // get the sign up password from the form using the post method
      $password_confirmation = $_POST['sign_up_password_confirmation'];       // get the sign up confirmation password using the post method

      /*
      *  check all  the valid condition, and set the error message
      */
      if(!$first_name) {                                                                                               //check if the first name is setted
            $errorMsg = "Please enter your First Name";
      } else if(!valid_name($first_name)) {                                                                            //check if the first name is valid
            $errorMsg = "First name should not contain numbers or special charachters";
      } else if (!$last_name) {                                                                                       // check if the last name is setted
            $errorMsg = "Please enter your Last Name";
      } else if (!valid_name($last_name)) {                                                                           //check if the last name is valid
            $errorMsg = "Last name should not contain numbers or special charachters";
      } else if(!$email || !preg_match("/^\S+@\S+$/", $email)) {                                                     //checl if the mail is setted
            $errorMsg = "Please enter a valid Email address";
      } else if (!valid_email($email)) {                                                                              //check if the mail is valid
            $errorMsg = "Please enter a valid aub student email";
      } else if(!$password) {                                                                                          // check if the password is setted
            $errorMsg = "Please enter your password";
      } else if(!valid_pasword($password)) {                                                                           // check if the Password is valid
            $errorMsg = "Password should contain more than 8 charachters (letter and numbers, or special charachters)";
      } else if (!$password_confirmation) {                                                                            // check if the Password confirmation is setted
            $errorMsg = "Please confirm your password";
      } else if ($password != $password_confirmation) {                                                                // check id the Password and confirmation password is setted
            $errorMsg = "Password did not match! please try again";
      } else {
            //include the sign up algorithm
            require './php/signup.php';
            exit;
      }

    }
?>
