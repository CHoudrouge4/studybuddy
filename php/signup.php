
<!DOCTYPE>
<?php
  //get data base connection
  require "database.php";
?>
<html>
    <head>
        <title>
            sign up
        </title>
    </head>
    <body>
        <?php

            //import the send mail function
            require 'mail_confirmation.php';

            //check if the email already exist in the database
            function is_exist($email, $connection) {
              $sql = "SELECT email FROM USER where EMAIL = '$email';";
              $result = mysqli_query($connection, $sql);
              if (mysqli_num_rows($result) == 0) {
                return false;
              } else {
                return true;
              }
            }

            //after sunmit botton is pressed
            if(isset($_POST['submit_button'])) {
                function test_input($data) {
                             $data = trim($data);
                             $data = stripslashes($data);
                             $data = htmlspecialchars($data);
                             return $data;
                }

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        //$birth_day = test_input($_POST("bday"));
                        $first_name = test_input($_POST['first_name']);
                        $last_name = test_input($_POST['last_name']);
                        $email = test_input($_POST['aub_mail']);
                        $password = test_input($_POST['sign_up_password']);
                        $password_confirmation = test_input($_POST['sign_up_password_confirmation']);
                }


                // chek if exit in the database
                if(!is_exist($email, $connection)) {
                  //generate a confirmation ccode;
                  $confirm = rand();

                  $message = "
                      Confirm your EMAIL
                      Click the link below to verify your account.
                      \"http://127.0.0.1/studybuddy/confirmation.php?email=$email&code=$confirm\"
                  ";

                  if (sendmail_confirmation($email, $message)){
                        $sql = "INSERT INTO USER (FIRSTNAME, LASTNAME, EMAIL, PASSWORD, confirmation_code, confirmed)".
                          "VALUES('$first_name','$last_name','$email','$password',$confirm, 'FALSE');";

                        $res = mysqli_query($connection, $sql);
                        if(!$res) {
                            die("Query Failed" . mysqli_error($connection));
                        } else {
                            echo "registration complete, please confirm your email\n";
                        }
                      }
                   } else {
                     echo "you already have an account";
                   }
            } else {
                echo "form not submmited properly";
            }
        ?>
    </body>
</html>
