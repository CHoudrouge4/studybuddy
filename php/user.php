<?php
      require_once "database.php";
      class user {


            private static $db;
            public function __construct() {
                  $this->db = new database();
            }

            public function get_user_info($email) {
                  $stmt    = "SELECT USERID, FIRSTNAME, LASTNAME, DOB FROM USER WHERE EMAIL = '$email'";
                  $res     = $this->db->select($stmt);
                  return $res;
            }

      }
/*
$email = "hah51@mail.aub.edu";
$usr = new user();
$res = $usr->get_user_info($email);
echo $res[0]['USERID'];
*/
?>
