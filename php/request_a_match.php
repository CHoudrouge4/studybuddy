<?php

      session_start();
      if (isset($_SESSION['email'])) {
            $id  =  $_SESSION['id'];
            if(isset($_POST['search'])) {

                  function test_input($data) {
                         $data = trim($data);
                         $data = stripslashes($data);
                         $data = htmlspecialchars($data);
                         return $data;
                  }

                  if ($_SERVER["REQUEST_METHOD"] == "POST") {
                          //$birth_day = test_input($_POST("bday"));
                          $course         = test_input($_POST['course']);
                          $course_number  = test_input($_POST['course_number']);
                  }

                  if (empty($course) || empty($course_number)) {
                      $errorMsg = "can't leave some fields empty";
                  } else {

                        $start_from   =  $_POST['time_from'];
                        $end_at       =  $_POST['time_to'];
                        $date         =  $_POST['date_course'];
                        $course_title =  "$course$course_number";
                        require "request_match_utility.php";
                        $res   = request($connection, $course_title, $start_from, $end_at, $day);
                        $table = create_result($res);
                        
                  }
            }
      }

?>
<!DOCTYPE>
<html>
    <head>
        <title> Request a Match </title>
        <link rel="stylesheet" type="text/css" href="../CSS/contact_style.css">
        <link rel="stylesheet" type="text/css" href="../CSS/style.css">
        <link rel="stylesheet" type="text/css" href="../CSS/profile.css">
        <link rel="stylesheet" type="text/css" href="../CSS/req.css">

      <!--  <script src="../Script/script.js"></script>
        <script src="../Script/datamanip.js"></script> -->

    </head>

    <body link="black">
        <iframe src = "../iframe.php" frameborder = "0" width="100%" height="130"  > </iframe>
        <div id="head_nav"> </div>

        <div id = "title">
            <h1>Request a Match</h1>
        </div>
        <br>

        <div id = "select_course">
            <form method = "POST">
                  <?php
                      if(isset($errorMsg) && $errorMsg) {
                          echo "<p style=\"color: red;\">*",htmlspecialchars($errorMsg),"</p>\n\n";
                      }
                  ?>                 <span> Course name   </span>
                <input type = "text" name ="course"> <br><br>
                <span> Course Number </span>
                <input type = "text" name ="course_number">
                <br><br>
                From: <input type="time" name="time_from"  >
                To:   <input type="time" name="time_to"    >
                <input type = "date"       name="date_course"><br>
                <br>
                <br>
                <input id = "search" type="submit" name="search" value="Search">
            </form>
        </div>


        <div>
            <div>

                <table id = "table_looks">

                    <tr>
                        <th> Result <th>
                              <br>
                        <th>First Name</th>
                        <th>Last Name</th>
                    </tr>


                    <tr>
                        <td>
                              <form method = "POST" >
                                    <?php
                                    if($res) {


                                          for($i = 0; $i < count($table); $i++) {
                                                $value_1 =  $table[$i][0];
                                                $value_2 =  $table[$i][1];
                                                $value_3 =  $table[$i][2];
                                                $value_4 =  $table[$i][3];
                                                echo  "<input type='radio' name='name' value ='$value_4' > $value_1 $value_2 <br>";

                                                //echo $table[$i][0];
                                          }
                                          echo "<input id = 'send_req' name ='send' type = 'submit'>";


                                    }

                                    if (isset($_POST['send'])) {
                                          $sug_id = $_POST['name'];
                                          $stmt = "INSERT into CONTACTLIST (USER1ID, USER2ID) values ('$id', '$sug_id')";
                                          require_once "database.php";
                                          mysqli_query($connection, $stmt);
                                    }

                                    ?>
                              </form>
                        </td>
                    </tr>


                 </table>

             </div>
         </div>
    </body>
</html>
