<?php


     if($_POST && isset($_POST["submit_forms"])) {
        echo "yes";
        function test_input($data) {
           $data = trim($data);
           $data = stripslashes($data);
           $data = htmlspecialchars($data);
           return $data;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          //$birth_day = test_input($_POST("bday"));
          echo "1";
           $course = test_input($_POST["course"]);
           echo "2";
        }

        echo $course ." yes";
        //header('Location: ./profile.php');
    }

 ?>
