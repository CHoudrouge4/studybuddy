<?PHP

      /**
      *    this file contain the necessary
      *    algorithm to sign in.
      *
      */


      require_once "inputverification.php";           //include the input verification file (contains function that check the if the inputs are valid)

                                //create a database object

      if(isset($_POST['sign_in_button'])) {

            /* these function helps in aboiding sql injection */
            function test_input($data) {
                  $data = trim($data);
                  $data = stripslashes($data);
                  $data = htmlspecialchars($data);
                  return $data;
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                  $email = test_input($_POST['signin_mail']);
                  $password = test_input($_POST['signin_password']);

            }

            // check if the user didn t enter his email
            if (empty($email) || empty($password)) {
                  $sign_in_error = "can't leave some fields empty";
            } else if (!valid_email($email)) {  //check if the email is an valid email according to the function in input ferification
                  $sign_in_error = "mail not valid";
            } else {
                  /*
                  * I obliged to create a new connection, since the data base object didn't
                  * work here for non obvious reason (Hussein Houdrouge).
                  *
                  */
                  $host = "127.0.0.1";
                  $dbuser = "study_buddy_db";
                  $pass = "study_buddy_choudrouge4";// enter ur database password.
                  $dname = "study_buddy";
                  $connection = mysqli_connect($host,$dbuser,$pass,$dname);
                  if(mysqli_connect_errno()) {
                      die("Connection Failed!" . mysqli_connect_error());
                  }
                  $stmt = "SELECT PASSWORD, confirmed FROM USER WHERE EMAIL = '$email'";
                  $res = mysqli_query($connection, $stmt);
                  $row = mysqli_fetch_assoc($res);
                  $pass = $row['PASSWORD'];
                  $conf = $row['confirmed'];

                  if ((strcmp($pass, "$password") === 0) == 1) { //check pass
                        if((strcmp($conf,'1') === 0) == 1) { //check confirmed
                              session_start();
                              $_SESSION["email"] = $email;
                              header('Location: ./php/profile.php'); //direct user to profile
                        } else {
                              $sign_in_error  = "confirm your email first";
                        }
                  } else {
                        $sign_in_error  = "wrong password";
                  }
            }
      }

?>
