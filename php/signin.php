<?PHP

      /**
      *    this file contain the necessary
      *    algorithm to sign in.
      *
      */
      //include the database connection
      require_once "database.php";
      require_once "inputverification.php";

      $db = new database();
      //$db->connect();

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

            if (empty($email) || empty($password)) {
                  $sign_in_error = "can't leave some fields empty";
            } else if (!valid_email($email)) {
                  $sign_in_error = "mail not valid";
            } else {
                  $res = $db->select("SELECT password, confirmed FROM USER WHERE EMAIL = 'hah51@mail.aub.edu'");  //get the password and confirmed

                  if (strcmp($res[0]['password'],$password) !== 0) { //check pass
                        if(strcmp($res[0]['confirmed'],"1")) { //check confirmed
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
