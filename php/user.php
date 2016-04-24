<?php
      require_once "database.php";
      class user {
            /**
            *
            *
            */

            private static $db;
            /**
            * A constructor
            */
            public function __construct() {
                  $this->db = new database();
            }

            /**
            * @param: $email the email of the user
            * @return: Array that contains the user informatiom
            */
            public function get_user_info($email) {
                  $stmt    = "SELECT USERID, FIRSTNAME, LASTNAME, DOB FROM USER WHERE EMAIL = '$email'";
                  $res     = $this->db->select($stmt);
                  return $res;
            }

      }

?>
