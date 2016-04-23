<?php

      /* include the file that contain the function that check the validation of the input
      *  the input that validate the requirements.
       */
      require "./php/inputverification.php";
      require "./php/signin.php";
      require "./php/forget_password.php";
?>

<!DOCTYPE>
<html>
    <head>
        <title>Welcome to Study Buddy</title>
        <link rel="stylesheet" type="text/css" href="CSS/grid-reset.css">
        <link rel="stylesheet" type="text/css" href="CSS/style.css">
        <!--<script src="Script/datamanip.js"></script>-->
        <script src = "Script/styling.js"></script>
        <script src = "Script/classie.js"></script>
    </head>

    <body>


           <header class="clearfix">
            <a href="#" class="logo"><img src="Image/StudyBuddy_Logo.jpg"></a>

               <h1>Study Buddy</h1>

            </header>
        <div class="container">
            <div class="row clearfix">

                <div class="col-md-6">
                    <div class="formContainer">
                    <!--                <img src="./Image/sign_in.png" alt="sign in" style="width:304px;height:228px;">-->
                        <h1>Sign In</h1>
                        <?php
                                    /**
                                    *     print the error msg if it is set.
                                    *
                                    */
                                  if(isset($sign_in_error) && $sign_in_error) {
                                      echo "<p style=\"color: red;\">   ",htmlspecialchars($sign_in_error),"</p>\n\n";
                                  }
                              ?>
                        <form method = "POST" action="<?PHP echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                            <div class="field">
                                <input id = "username_id" type="text" name="signin_mail" placeholder = "abc00@mail.aub.edu" value = "<?php if(isset($_POST['signin_mail'])) echo htmlspecialchars($_POST['first_name']); ?>">
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

                    <form method = "POST" action="<?PHP echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" accept-charset="UTF-8">

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
                        <div class="SubmitHolder">
                            <input id = "sign_up_botton" type = "submit" name = "submit_button">
                        </div>

                    </form>
                </div>

            </div>
                <div class="col-md-6">
                    <div class="formContainer">
                        <h1>Forgot Password</h1>
                        <form method = "POST">
                            <div class="field">
                                <input id = "user_email" type="text"
                                    name = "forgot_email" placeholder = "abc00@mail.aub.edu">
                            </div>
                            <div class="SubmitHolder">
                                <input id = "forgot_button" type="submit" value="Send">
                            </div>
                        </form>
                    </div>

                </div>
        </div>
    </body>
</html>
