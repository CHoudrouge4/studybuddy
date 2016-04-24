<?php
      /* include the database class */
      require "database.php";
      $db = new database();         //create database object
      //import the send mail function
      require 'mail_confirmation.php';



     if(isset($_POST['submit_button'])) {

                /**
                * @param: data string
                * @return: data string
                * @effect: apply input validation function to protect against sql injection
                */
                function test_input($data) {
                             $data = trim($data);
                             $data = stripslashes($data);
                             $data = htmlspecialchars($data);
                             return $data;
                }

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $first_name = test_input($_POST['first_name']);
                        $last_name = test_input($_POST['last_name']);
                        $email = test_input($_POST['aub_mail']);
                        $password = test_input($_POST['sign_up_password']);
                        $password_confirmation = test_input($_POST['sign_up_password_confirmation']);
                        $dob = test_input($_POST['bday']);
               }


                  //generate a confirmation code;
                  $confirm = rand();

                  //set the message for confirmation email
                  $message = "
                  Confirm your EMAIL
                  Click the link below to verify your account.
                  \"http://127.0.0.1/studybuddy/php/confirmation.php?email=$email&code=$confirm\"
                  ";
                  //send the confirmation mail, if it is send add it to the data base.
                  if (sendmail_confirmation($email, $message)) {
                        // we created a private connection since the database object didn't work for nonobvious reasons.s
                        $host = "127.0.0.1";
                        $dbuser = "study_buddy_db";
                        $pass = "study_buddy_choudrouge4";// enter ur database password.
                        $dname = "study_buddy";
                        $connection = mysqli_connect($host,$dbuser,$pass,$dname);
                        if(mysqli_connect_errno()) {
                            die("Connection Failed!" . mysqli_connect_error());
                         }
                         mysqli_query($connection, "INSERT INTO USER (FIRSTNAME, LASTNAME, EMAIL, DOB, PASSWORD, confirmation_code, confirmed) VALUES('$first_name','$last_name','$email', '$dob', '$password', '$confirm', 'FALSE')");
                         mysqli_close($connection);

                        header("Location: ./confirm.html");
                  }

      } else {
              header("Location: ./index.php");
      }


?>
