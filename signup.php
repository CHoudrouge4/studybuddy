
<!DOCTYPE>
<?php

    $host = "127.0.0.1";
    $dbuser = "study_buddy_db";
    $pass = "study_buddy_choudrouge4";// enter ur database password.
    $dname = "study_buddy";
    $connection = mysqli_connect($host,$dbuser,$pass,$dname);
    echo "1";
    //$con = mysqli_connect($host,$dbuser, $pass, $dname);
    if(mysqli_connect_errno()) {
        echo "2";
        die("Connection Failed!" . mysqli_connect_error());
    }
    echo "3";

?>
<html>
    <head>
        <title>
            sign up
        </title>
    </head>
    <body>
        <?php

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


                if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($password_confirmation)) {
                    echo "can't leave some fields empty";
                } else if ($password != $password_confirmation) {
                    echo "Password did not match! please try aggain";
                } else {

                    $sql = "INSERT INTO USER (FIRSTNAME, LASTNAME, EMAIL, PASSWORD)".
                            "VALUES('$first_name','$last_name','$email','$password');";
                    $res = mysqli_query($connection, $sql);
                    if(!$res) {
                        die("Query Failed" . mysqli_error($connection));
                    } else {
                        echo "success";
                    }
                }
            } else {
                echo "form not submmited properly";
            }
        ?>

    </body>
</html>
