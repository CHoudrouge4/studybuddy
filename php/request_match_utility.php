<?php

      require "database.php";
      require "schedule_utility.php";

      $day  = get_day($date);

/*
      //get all the courses that make conflict
      $conflict_courses =  "SELECT COURSEID from COURSE where START_FROM >= '$start_from'  AND END_AT <= '$end_at' AND DAYS LIKE '%$day%'";

      //get the suggested students: the students who are enrolled in the same course
      $get_course_id         =  "SELECT COURSEID from COURSE where TITLE   = '$course_title'";
      $get_suggest_students  =  "SELECT u.USERID, u.FIRSTNAME, u.LASTNAME, u.EMAIL from USER u, ENROLLEMENT e, ($get_course_id) v where e.COURSEID = v.COURSEID  AND u.USERID = e.USERID";

      //from the suggested students get the students who enrolled in the conflicted courses
      $get_enrolled_conflict =  "SELECT usr.USERID, usr.FIRSTNAME, usr.LASTNAME, usr.EMAIL  from USER usr, ENROLLEMENT enr, ($conflict_courses) con where usr.USERID = enr.USERID AND enr.COURSEID = con.COURSEID";

      //$get_enrolled_conflict =  "SELECT s.USERID from ($get_suggest_students) s, ENROLLEMENT e, ($conflict_courses) c where e.COURSEID = c.COURSEID  AND s.USERID = e.USERID" ;

      // difference between sugessted and the students who ENROLLED IN A COURSE THAT MAKE conflicts
      $suggest = "SELECT sg.USERID, sg.FIRSTNAME, sg.LASTNAME, sg.EMAIL FROM ($get_suggest_students) sg where sg.USERID not in ($get_enrolled_conflict)";
*/
      function request($connection, $course_title, $start_from, $end_at, $day) {
            $drop_prev_conflict_view = "drop view if exists conflicted_courses";
            $create_conflict_view   =  "create view conflicted_courses As SELECT COURSEID from COURSE where START_FROM >= '$start_from'  AND END_AT <= '$end_at' AND DAYS LIKE '%$day%'";
            mysqli_query($connection, $drop_prev_conflict_view);
            mysqli_query($connection, $create_conflict_view);


            $drop_course_id               = "drop view if EXISTS COURSE_id";
            $create_course_id_view  = "view COURSE_id as SELECT COURSEID from COURSE where TITLE = '$course_title'";
            mysqli_query($connection, $drop_course_id);
            mysqli_query($connection, $create_course_id_view);


            $drop_pseudosuggested         = "drop view if EXISTS pseudosuggested";
            $create_pseudosuggedted_view  = "create view pseudosuggested AS SELECT u.USERID, u.FIRSTNAME, u.LASTNAME, u.EMAIL from USER u, ENROLLEMENT e, COURSE_id v where e.COURSEID = v.COURSEID  AND u.USERID = e.USERID";
            mysqli_query($connection, $drop_pseudosuggested);
            mysqli_query($connection, $create_pseudosuggedted_view);


            $drop_enrollement_conflict    = "drop view if EXISTS enrolled_conflict";
            $create_enrollement_conflict_view = "create view enrolled_conflict as SELECT usr.USERID, usr.FIRSTNAME, usr.LASTNAME, usr.EMAIL from USER usr, ENROLLEMENT enr, conflicted_courses con where usr.USERID = enr.USERID AND enr.COURSEID = con.COURSEID";
            mysqli_query($connection, $drop_enrollement_conflict);
            mysqli_query($connection, $create_enrollement_conflict_view);

            $suggested = "SELECT sg.USERID, sg.FIRSTNAME, sg.LASTNAME, sg.EMAIL FROM pseudosuggested sg LEFT JOIN enrolled_conflict ec on sg.USERID = ec.USERID WHERE ec.USERID IS NULL";

            return mysqli_query($connection, $suggested);
      }



      function create_result($res) {
            $table;
            if (mysqli_num_rows($res) > 0) {
                  for ($i = 0; $row = mysqli_fetch_assoc($res); $i++) {
                        $table[$i][0] = $row['FIRSTNAME'];
                        $table[$i][1] = $row['LASTNAME'];
                        $table[$i][2] = $row['EMAIL'];
                        $table[$i][3] = $row['USERID'];
                  }
            }

            return $table;
      }

/*      $res   = request($connection, $course_title, $start_from, $end_at, $day);
      $table = create_result($res);

      for ($i = 0; $i < count($table); $i++) {
            for ($j = 0; $j < 3; $j++) {
                  echo $table[$i][$j] . " ";
            }
      }
*/
?>
