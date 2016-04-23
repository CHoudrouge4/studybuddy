<?php
require_once "database.php";

class course {

      private static $db;
      public function __construct() {
            $this->db = new database();
      }

      public function add($course, $from, $to, $days) {

             $add_course = "INSERT INTO COURSE (TITLE, START_FROM, END_AT, DAYS) VALUES('$course', '$from', '$to', '$days')";
             $this->db->query("INSERT INTO COURSE (TITLE, START_FROM, END_AT, DAYS) VALUES('$course', '$from', '$to', '$days')");

      }

      public function get_ids($course) {
            return $this->db->select("SELECT COURSEID FROM COURSE WHERE TITLE = '$course'");
      }

      public function get_course_id($course, $from, $to, $days) {
            // get course id
            $get_course_id = "SELECT COURSEID FROM COURSE WHERE TITLE = '$course' AND START_FROM = '$from' AND END_AT = '$to' AND DAYS = '$days';";
            $row           = $this->db->select($get_course_id);
            return $row[0]['COURSEID'];
      }

      public function ennrollement($usr_id ,$course, $from, $to, $days) {
           //establish enrollement
            $course_id = $this->get_course_id($course, $from, $to, $days);
            $sql_erollement = "INSERT INTO ENROLLEMENT (USERID, COURSEID) VALUES($usr_id, $course_id)";
            $this->db->query($sql_erollement);
      }

      public function is_exist($course, $from, $to, $days) {
            return count($this->get_course_id($course, $from, $to, $days)) == 1;
      }

}

?>
