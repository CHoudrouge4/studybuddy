<?php
      //get data base connection
      require "database.php";
      $db = new database();
      //import the send mail function
      require 'mail_confirmation.php';

      /*
      * @param: email, connection database connection
      * @return true if the email already exist in the database and false otherwize.
      */
      function is_exist($email) {
          global $db;
          $sql = "SELECT EMAIL FROM USER where EMAIL = '$email';";
          $result = $db->query($sql);
          if (mysqli_num_rows($result) == 0) {
                return false;
         } else {
               return true;
         }
     }

     if(isset($_POST['submit_button'])) {

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

                // chek if exit in the database
                if(!is_exist($email)) {
                  //generate a confirmation ccode;
                  $confirm = rand(); //generate a random number

                  //set the message for confirmation email
                  $message = "
                  Confirm your EMAIL
                  Click the link below to verify your account.
                  \"http://127.0.0.1/studybuddy/php/confirmation.php?email=$email&code=$confirm\"
                  ";

                  if (sendmail_confirmation($email, $message)) {
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
                    echo "you already have an account";
               }
      } else {
              header("Location: ./index.php");
      }


?>
