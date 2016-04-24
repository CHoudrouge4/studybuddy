<?php
require_once "database.php";

class course {

      private static $db;

      /**
      *  A Constructor
      *
      */
      public function __construct() {
            $this->db = new database();
      }

      /**
      *     add the course to the database
      *
      * @param: $course the course title.
      * @param: $from the starting time of the course.
      * @param: $to the ending time of the course
      * @param: $days: the days of the course
      *
      */
      public function add($course, $from, $to, $days) {
             $add_course = "INSERT INTO COURSE (TITLE, START_FROM, END_AT, DAYS) VALUES('$course', '$from', '$to', '$days')";
             $this->db->query("INSERT INTO COURSE (TITLE, START_FROM, END_AT, DAYS) VALUES('$course', '$from', '$to', '$days')");
      }

      /**
      *
      * @param: $course: the course title.
      * @return: array contains the COURSEID of the course that has the title $course
      */
      public function get_ids($course) {
            return $this->db->select("SELECT COURSEID FROM COURSE WHERE TITLE = '$course'");
      }

      /**
      *
      * @param: $course: the course title
      * @param: $from: the starting time of a given course
      * @param: $to: the starting time of a given course.
      * @param: $days: the days of the course.
      * @return: the id of the course that correspond to the parameters
      */
      public function get_course_id($course, $from, $to, $days) {
            // get course id
            $get_course_id = "SELECT COURSEID FROM COURSE WHERE TITLE = '$course' AND START_FROM = '$from' AND END_AT = '$to' AND DAYS = '$days';";
            $row           = $this->db->select($get_course_id);
            return $row[0]['COURSEID'];
      }

      /**
      * this function adds the user to the ENROLLEMENT table in the database.
      * @param: $usr_id: the USERID of the loggedin user
      * @param: $course: the title of the course
      * @param: $from: the starting time of the course.
      * @param: $to the ending time of the course.
      * @param: $days: the days of the course
      *
      */
      public function ennrollement($usr_id ,$course, $from, $to, $days) {
           //establish enrollement
            $course_id = $this->get_course_id($course, $from, $to, $days);
            $sql_erollement = "INSERT INTO ENROLLEMENT (USERID, COURSEID) VALUES($usr_id, $course_id)";
            $this->db->query($sql_erollement);
      }

      /**
      * this function checks if the course exists in the database 
      * @param: $course: the title of the course
      * @param: $from: the starting time of the course.
      * @param: $to the ending time of the course.
      * @param: $days: the days of the course
      */
      public function is_exist($course, $from, $to, $days) {
            return count($this->get_course_id($course, $from, $to, $days)) == 1;
      }

}

?>
