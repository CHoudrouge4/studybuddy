<?php
      require_once 'database.php';

      //$stmt = "INSERT INTO ENROLLEMENT (COURSEID, USERID) VALUES ('38', '4')";

      require "schedule_utility.php";

      $day  = get_day($date);
      /**
      * @param: $course_title: the title of the course
      * @param: $start_from: the starting time of the request
      * @param: $end_at he end time of the request
      * @param: $day the day of the request
      * @return: the result in a querry
      */
      function request($course_title, $start_from, $end_at, $day) {
            $db = new database();
            $drop_prev_conflict_view = "drop view if exists conflicted_courses";
            $create_conflict_view   =  "create view conflicted_courses As SELECT COURSEID from COURSE where START_FROM >= '$start_from'  AND END_AT <= '$end_at' AND DAYS LIKE '%$day%'";
            $db->query($drop_prev_conflict_view);
            $db->query($create_conflict_view);
            $drop_course_id               = "drop view if EXISTS COURSE_ID";
            $create_course_id_view  = "create view COURSE_ID as SELECT COURSEID from COURSE where TITLE = '$course_title'";
            $db->query($drop_course_id);
            $db->query($create_course_id_view);
            $drop_pseudosuggested         = "drop view if EXISTS pseudosuggested";
            $create_pseudosuggedted_view  = "create view pseudosuggested AS SELECT u.USERID, u.FIRSTNAME, u.LASTNAME, u.EMAIL from USER as u, ENROLLEMENT as e, COURSE_ID as v where e.COURSEID = v.COURSEID  AND u.USERID = e.USERID";
            $db->query($drop_pseudosuggested);
            $db->query($create_pseudosuggedted_view);
            $drop_enrollement_conflict    = "drop view if EXISTS enrolled_conflict";
            $create_enrollement_conflict_view = "create view enrolled_conflict as SELECT usr.USERID, usr.FIRSTNAME, usr.LASTNAME, usr.EMAIL from USER usr, ENROLLEMENT enr, conflicted_courses con where usr.USERID = enr.USERID AND enr.COURSEID = con.COURSEID";
            $db->query($drop_enrollement_conflict);
            $db->query($create_enrollement_conflict_view);
            $suggested = "SELECT sg.USERID, sg.FIRSTNAME, sg.LASTNAME, sg.EMAIL FROM pseudosuggested sg LEFT JOIN enrolled_conflict ec on sg.USERID = ec.USERID WHERE ec.USERID IS NULL";
            //echo $suggested;
            //$seg = "SELECT * FROM USER";
            return $db->query($suggested);
      }

      /**
      * @param: $res array that contains the result
      * @return: 2d array to represent the result
      */
      function create_result(&$res) {
            $table;
            for ($i = 0; $row = mysqli_fetch_assoc($res); $i++) {
                  $table[$i][0] = $row['FIRSTNAME'];
                  $table[$i][1] = $row['LASTNAME'];
                  $table[$i][2] = $row['EMAIL'];
                  $table[$i][3] = $row['USERID'];
            }
            return $table;
      }

?>
