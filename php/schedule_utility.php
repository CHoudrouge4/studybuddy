<?php

      require_once "database.php";
      $db =  new database();

      $id   = $_SESSION['id'];

      // query courses
      $stmt = "SELECT c.TITLE, c.START_FROM, c.END_AT, c.DAYS FROM COURSE c NATURAL JOIN (SELECT COURSEID from ENROLLEMENT where USERID = $id) t";
      //$res  = mysqli_query($connection, $stmt);
      $res = $db->select($stmt);


      // query events
      $stmt      = "SELECT TITLE, START_FROM, END_AT, BUSYDATE from BUSY where USERID = $id";
      //$res_event = mysqli_query($connection, $stmt);
      $res_event = $db->select($stmt);

      $system_date = date("Y-m-d");
      $system_week = get_week($system_date);

      /**
      * @param: $date type date
      * @return: integer indicate the week of the year.
      */
      function get_week(&$date) {
            $date_o = new DateTime($date);
            $week  =  $date_o->format("W");
            return $week;
      }

      /**
      *  @param: $date type date
      *  @return: the first letter of a day.
      */
      function get_day(&$date) {
            $date_o      = new DateTime($date);
            $d           = $date_o->format("D");
            return get_day_letter($d);
      }

      /**
      * @param: $day string
      * @return: the first char of the day.
      *
      */
      function get_day_letter($day) {
            if ($day == "Mon") return "M";
            if ($day == "Tue") return "T";
            if ($day == "Wed") return "W";
            if ($day == "Thu") return "R";
            if ($day == "Fri") return "F";
            if ($day == "Sat") return "S";
            return " ";
      }

      /**
      * @param: string of time exmple "11:00:00"
      * @return: the corressponding index on the schedule
      */
      function set_time_coordinate(&$time) {
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


      /**
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

      /**
      * @param: $schedule: 2d array represent the schedule
      * @param: $title: title of am element.
      * @param: $start:the starting time.
      * @param: $end: the end time.
      * @days: the days of the events.
      *
      */
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


      /**
      * set the courses on the schedule
      * @param: $schedule 2d array that represent the weekly schedule
      */
      function create_course_schedule(&$schedule) {
            global $res;

            for($i = 0;  $i < count($res); $i++) {
                   $title = $res[$i]['TITLE'];
                   $start = $res[$i]["START_FROM"];
                   $end   = $res[$i]["END_AT"];
                   $days  = $res[$i]["DAYS"];
                   set_schedule($schedule, $title, $start, $end, $days);
            }

      }
      /**
      * set the events on the schedule
      * @param: $schedule 2d array that represent the weekly schedule
      */
      function create_event_schedule(&$schedule) {
            global $res_event;
            global $system_week;
            for($i = 0; $i < count($res_event); $i++) {
                  $title      = $res_event[$i]['TITLE'];
                  $start      = $res_event[$i]['START_FROM'];
                  $end        = $res_event[$i]['END_AT'];
                  $date       = $res_event[$i]['BUSYDATE'];
                  $event_week = get_week($date);
                  if (strcmp("$event_week", "$system_week") == 0) {
                        $day = get_day($date);
                        set_schedule($schedule, $title, $start, $end, $day);
                  }
            }

      }

      /**
      * create the schedule: set the events and the courses on the schedule.
      */
      function create_schedule() {
            $schedule;
            create_course_schedule($schedule);
            create_event_schedule($schedule);
            return $schedule;
      }

?>
