<?php
  /*
  * input: string name
  * return true if the name validate the following condition else otherwize
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
        require './signup.php';
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




<!DOCTYPE>
<html>
    <head>
        <title>Welcome to Study Buddy</title>
        <link rel="stylesheet" type="text/css" href="CSS/grid-reset.css">
        <link rel="stylesheet" type="text/css" href="CSS/style.css">
        <!--<script src="Script/datamanip.js"></script>-->
    </head>

    <body>
        <div class="container">

           <header class="clearfix">
            <a href="#" class="logo"><img src="Image/StudyBuddy_Logo.jpg"></a>

               <h1>Study Buddy</h1>

            </header>

            <div class="row clearfix">

                <div class="col-md-6">
                    <div class="formContainer">
                    <!--                <img src="./Image/sign_in.png" alt="sign in" style="width:304px;height:228px;">-->
                        <h1>Sign In</h1>
                        <form method = "POST" action="signin.php">
                            <div class="field">
                                <input id = "username_id" type="text" name="signin_mail" placeholder = "abc00@mail.aub.edu">
                            </div>
                            <div class="field">
                                <input id = "password_id" type="password" name="signin_password" placeholder= "password">
                            </div>
                            <div class="SubmitHolder">
                                <input id = "log_in_logo" type="submit" name = "sign_in_button" value="Sign in">
                            </div>
                        </form>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="formContainer">
                        <p id = "text_ask_sign_up"> Don't have an account ? Sign up </p>
                    <h1>Sign Up</h1>
<!--        <img src = "./Image/sign_up.png" alt="sign up" style="width:204px;height:128px;">-->
                    <form method = "POSt" action="<?PHP echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" accept-charset="UTF-8">
<!--
            <div class="field"><input id = "profil_image" type="image" src="./Image/personel.png" alt="Submit"
                        width="48" height="48"></div>
-->
                        <?php
                            if(isset($errorMsg) && $errorMsg) {
                                echo "<p style=\"color: red;\">*",htmlspecialchars($errorMsg),"</p>\n\n";
                            }
                        ?>
                        <div class="field clearfix">
                            <input id = "first_name" type = "text"  size ="50" name="first_name" placeholder = "First name" value="<?php if(isset($_POST['first_name'])) echo htmlspecialchars($_POST['first_name']); ?>">
                            <input id = "last_name" type = "text" size = "50" name="last_name" placeholder = "Last name" value="<?php if(isset($_POST['last_name'])) echo htmlspecialchars($_POST['last_name']); ?>">
                        </div>

                        <div class="field">
                            <input id = "email_aub_id" type = "text" size = "20" name="aub_mail" placeholder = "AUB net e-mail, example: abc00@mail.aub.edu" value="<?php if(isset($_POST['aub_mail'])) echo htmlspecialchars($_POST['aub_mail']); ?>">
                        </div>
                        <div class="field clearfix">
                            <input id = "password_sign_up" type = "password" size = "100" name="sign_up_password" placeholder="password" value="<?php if(isset($_POST['sign_up_password'])) echo htmlspecialchars($_POST['sign_up_password']); ?>">
                            <input id = "password_sign_up_confirm" type = "password" size = "100" name="sign_up_password_confirmation" placeholder= "confirm your password" value="<?php if(isset($_POST['sign_up_password_confirmation'])) echo htmlspecialchars($_POST['sign_up_password_confirmation']); ?>" >
                        </div>

                        <div class="field">
                            <input id = "bday_id" type="date" name="bday" min="1990-01-02">
                        </div>
                        <div class="field">
                            <input id = "sign_up_botton" type = "submit" name = "submit_button">
                        </div>

                    </form>
                </div>

            </div>

            </div>
        </div>
    </body>
</html>
