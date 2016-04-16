<?php
/*      $ddate = "2016-04-15";
      $date = new DateTime($ddate);
      $week = $date->format("W");
      echo "Weeknummer: $week" . "<br>";
      $d = date("Y-m-d");
      $dt = new DateTime($d);
      $w  =  $dt->format("W");
      echo $w;*/

/*
      $system_date = "2016-04-23";
      $system_week = get_week($system_date);

      //$row  = mysqli_fetch_array($res);


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

//      echo get_day($system_date);

      substr($time, 0, 2) - 8;*/
      $course = "cmps";
      $course_number = "277";

      $course_name =  "$course$course_number";
      echo $course_name;
?>
