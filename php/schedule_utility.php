<?php
      require "database.php";

      $id   = $_SESSION['id'];
      // query courses
      $stmt = "SELECT c.TITLE, c.START_FROM, c.END_AT, c.DAYS FROM COURSE c NATURAL JOIN (SELECT COURSEID from ENROLLEMENT where USERID = $id) t";
      $res  = mysqli_query($connection, $stmt);

      // query events
      $stmt      = "select TITLE, START_FROM, END_AT, BUSYDATE from BUSY where USERID = $id";
      $res_event = mysqli_query($connection, $stmt);

      $system_date = date("Y-m-d");
      $system_week = get_week($system_date);


      function get_week(&$date) {
            $date_o = new DateTime($date);
            $week  =  $date_o->format("W");
            return $week;
      }

      function get_day(&$date) {
            $date_o      = new DateTime($date);
            $d           = $date_o->format("D");
            return get_day_letter($d);
      }


      function get_day_letter($day) {
            if ($day == "Mon") return "M";
            if ($day == "Tue") return "T";
            if ($day == "Wed") return "W";
            if ($day == "Thu") return "R";
            if ($day == "Fri") return "F";
            if ($day == "Sat") return "S";
            return " ";
      }

      /*
      * @param: string of time exmple "11:00:00"
      * @return: the coorect index on the schedule
      */
      function set_time_coordinate(&$time) {
      //     return substr($time, 0, 2) - 8;
          if ($time >= "08:00:00" && $time < "09:00:00")   return 0;
            if ($tme  >= "09:00:00" && $time < "10:00:00") return 1;
            if ($time >= "10:00:00" && $time < "11:00:00") return 2;
            if ($time >= "11:00:00" && $time < "12:00:00") return 3;
            if ($time >= "12:00:00" && $time < "13:00:00") return 4;
            if ($time >= "13:00:00" && $time < "14:00:00") return 5;
            if ($time >= "14:00:00" && $time < "15:00:00") return 6;
            if ($time >= "15:00:00" && $time < "16:00:00") return 7;
            if ($time >= "16:00:00" && $time < "17:00:00") return 8;
            if ($time >= "17:00:00" && $time < "18:00:00") return 9;
            if ($time >= "18:00:00" && $time < "19:00:00") return 10;
            if ($time >= "19:00:00" && $time < "20:00:00") return 11;
            if ($time >= "20:00:00" && $time < "21:00:00") return 12;
            if ($time >= "21:00:00" && $time < "22:00:00") return 13;
            return -1;
      }


      /*
      * @param: a charachter of days
      * @return: the coorect index on the schedule
      */
      function set_day_coordinate($day) {
            if ($day == "M") return 0;
            if ($day == "T") return 1;
            if ($day == "W") return 2;
            if ($day == "R") return 3;
            if ($day == "F") return 4;
            if ($day == "S") return 5;
            return 6;
      }

      function set_schedule(&$schedule, $title, $start, $end, $days) {

            $start_coord =  set_time_coordinate($start);
            $end_coord   =  set_time_coordinate($end);
            $days_coord  =  Array();

            for ($i = 0; $i < strlen($days); $i++)
                  array_push($days_coord, set_day_coordinate($days[$i]));


            for ($i = $start_coord; $i < $end_coord; $i++)
                  for ($j = 0; $j < count($days_coord); $j++)
                        $schedule[$i][$days_coord[$j]] = $title;

      }



      function create_course_schedule(&$schedule) {
            global $res;
            if (mysqli_num_rows($res) > 0) {
                  while ($row   = mysqli_fetch_assoc($res)) {
                         $title = $row['TITLE'];
                         $start = $row["START_FROM"];
                         $end   = $row["END_AT"];
                         $days = $row["DAYS"];
                         set_schedule($schedule, $title, $start, $end, $days);
                  }
            }
      }

      function create_event_schedule(&$schedule) {
            global $res_event;
            if (mysqli_num_rows($res_event) > 0) {
                  while($row = mysqli_fetch_assoc($res_event)) {
                        $title      = $row['TITLE'];
                        $start      = $row['START_FROM'];
                        $end        = $row['END_AT'];
                        $date       = $row['BUSYDATE'];
                        $event_week = get_week($date);
                        if (strcmp($event_week, $system_week)) {
                              $day = get_day($date);
                              set_schedule($schedule, $title, $start, $end, $day);
                        }
                  }
            }
      }

      function create_schedule() {
            $schedule;
            create_course_schedule($schedule);
            create_event_schedule($schedule);
            return $schedule;
      }

?>
