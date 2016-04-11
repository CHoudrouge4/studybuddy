<?PHP
    require "database.php";
?>

<!DOCTYPE>
<html>
    <head>
        Sign in
    </head>
    <body>
        <?php

        if(isset($_POST['sign_in_button'])) {

            function test_input($data) {
                         $data = trim($data);
                         $data = stripslashes($data);
                         $data = htmlspecialchars($data);
                         return $data;
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    //$birth_day = test_input($_POST("bday"));
                    $email = test_input($_POST['signin_mail']);
                    $password = test_input($_POST['signin_password']);

            }


            if (empty($email) || empty($password)) {
                echo "can't leave some fields empty";
            } else {

                $sql_user = "SELECT email FROM USER WHERE EMAIL = '$email'";
                $sql_password = "SELECT password FROM USER WHERE EMAIL = '$email'"; //return password
                $sql_confirmaed = "SELECT confirmed FROM USER where EMAIL = '$email'";

                $res_email = mysqli_query($connection, $sql_user);
                $res_password = mysqli_query($connection, $sql_password);
                $res_confirmed = mysqli_query($connection, $sql_confirmaed);

                //echo "here \n";
                if(!$res_email) {
                    die("Query Failed" . mysqli_error($connection));
                } else {
                    $row = mysqli_fetch_assoc($res_password);
                    if (mysqli_num_rows($res_password) > 0) {
                        if ($row["password"]. "" == $password) {
                          $confirmed = mysqli_fetch_assoc($res_confirmed);
                          if($confirmed["confirmed"]) {
                              //echo "success";
                              $row_email = mysqli_fetch_assoc($res_email);
                              session_start();
                              $_SESSION["email"] = $row_email['email'];
                              header('Location: ./profile.php');
                          } else {
                             echo "confirm your email first";
                          }
                        } else
                            echo "wrong password";
                    }
                }
            }
        } else {
            echo "form not submmited properly";
        }
         ?>
    </body>
</html>
