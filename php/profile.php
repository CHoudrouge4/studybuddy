<?php
  session_start();

  if(isset($_SESSION['email'])) {
    require "database.php";
    $email = $_SESSION['email'];

    $sql = "SELECT USERID, FIRSTNAME, LASTNAME, DOB FROM USER WHERE EMAIL = '$email'";
    $query = mysqli_query($connection, $sql);
    $row   = mysqli_fetch_assoc($query);

    $id = $row['USERID'];
    $first_name = $row['FIRSTNAME'];
    $last_name = $row['LASTNAME'];
    $dob = $row['DOB'];

    $_SESSION['firstname'] = $first_name;
    $_SESSION['lastname'] = $last_name;
  }
 ?>
 <!DOCTYPE>
<html>
    <head>
        <title> Profile </title>
        <link rel="stylesheet" type="text/css" href="../CSS/contact_style.css">
        <link rel="stylesheet" type="text/css" href="../CSS/style.css">
        <link rel="stylesheet" type="text/css" href="../CSS/profile.css">
	       <script src="../Script/script.js"></script>
  <!--       <script src="Script/datamanip.js"></script>-->
    </head>

    <body onload ="load_user()">
        <?php

            function test_input($data) {
                  $data = trim($data);
                  $data = stripslashes($data);
                  $data = htmlspecialchars($data);
                  return $data;
            }
           if($_POST && isset($_POST['add_course_botton'], $_POST['course_name'], $_POST['course_number'])) {

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                  //$birth_day = test_input($_POST("bday"));
                   $course = test_input($_POST["course_name"]);
                   $course_number = test_input($_POST["course_number"]);
                   $from = test_input($_POST["from"]);
                   $to = test_input($_POST["to"]);
                }

                if (isset($_POST['monday']))    $monday = "M";
                if (isset($_POST["tuesday"]))   $tuesday = "T";
                if (isset($_POST["wednesday"])) $wednesday = "W";
                if (isset($_POST["thursday"]))  $thursday = "R";
                if (isset($_POST["friday"]))    $friday = "F";

                if(!$course) {
                  $errorMsg = "please enter the course name";
                } else if (!$course_number) {
                  $errorMsg = "please enter the course number";
                } else if(!isset($_POST['monday']) && !isset($_POST["tuesday"]) && !isset($_POST["wednesday"]) && !isset($_POST["thursday"]) &&  !isset($_POST["friday"])){
                  $errorMsg = "please enter at least one day";
                } else if (!$from) {
                  $errorMsg = "please the from time fields";
                } else if (!$to) {
                  $errorMsg = "please the to time fields";
                } else {
                    // add course to the list of courses;
                    $course = $course.$course_number;
                    $days = $monday.$tuesday.$wednesday.$thursday.$friday;
                    $add_course = "INSERT INTO COURSE (TITLE, START_FROM, END_AT, DAYS) VALUES('$course', '$from', '$to', '$days');";
                    $res = mysqli_query($connection, $add_course);

                    // get course id
                    $get_course_id = "SELECT COURSEID FROM COURSE WHERE TITLE = '$course' AND START_FROM = '$from' AND END_AT = '$to' AND DAYS = '$days';";
                    $res = mysqli_query($connection, $get_course_id);
                    $row  = mysqli_fetch_assoc($res);
                    $course_id =  $row['COURSEID'];

                    //establish enrollement
                    $sql_erollement = "INSERT INTO ENROLLEMENT (USERID, COURSEID) VALUES($id, $course_id);";
                    $res = mysqli_query($connection, $sql_erollement);
                    $smsg = "your course is added succesfully, you can add other courses!!";
                }
            }


            if($_POST && isset($_POST['add_task_botton'], $_POST['task_name'], $_POST['task_date'])) {

                  if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    //$birth_day = test_input($_POST("bday"));
                     $task_name = test_input($_POST["task_name"]);
                     $task_date = test_input($_POST["task_date"]);
                     $task_from = test_input($_POST["task_from"]);
                     $task_to    = test_input($_POST["task_to"]);
                  }

                  if (!$task_name) {
                        $error_task_msg = "please enter the task name";
                  } else if(!$task_date) {
                        $error_task_msg = "please enter the task date";
                  } else if (!$task_from) {
                        $error_task_msg = "please enter the task starting time";
                  } else if (!$task_to) {
                        echo "blablabla";
                        $error_task_msg = "please enter the task ending time";
                  } else {

                        $add_task = "INSERT INTO BUSY (USERID , TITLE, START_FROM, END_AT, BUSYDATE) VALUES ('$id', '$task_name', '$task_from', '$task_to', '$task_date');";
                        $res = mysqli_query($connection, $add_task);
                        $task_smsg = "your task is added succesfully, you can add other task!!";
                  }
            }

        ?>

    <iframe src = "../iframe.html" frameborder = "0" width="100%" height="130"  > </iframe>

    <div id = "title">
            <h1>Profile</h1>
    </div>
    <br>

    <div id="head_nav">
        <?php
            echo "<div id = 'account_info'>
                  <img id = 'profile_pic' src = '../Image/personel.png'>
                  <div id = 'info_p'>
                      <b>Name: </b><span id = 'pro_fname'> $first_name </span> <span id = 'pro_lname'> $last_name </span>
                      <br><b>Email:</b> <span id = 'pro_email' > $email  </span>
                      <br><b>Birthday:</b> <span id = 'pro_bday' >  $dob </span>
                  </div>
                </div>";
        ?>
    </div>

    <div  id = "schedule">
          <form name = "add_course" method = "POST">

            <?php
                if(isset($errorMsg) && $errorMsg) {
                    echo "<p style=\"color: red;\">*",htmlspecialchars($errorMsg),"</p>\n\n";
                }
                if(isset($smsg) && $smsg) {
                    echo "<p style=\"color: blue;\">*",htmlspecialchars($smsg),"</p>\n\n";
                }
            ?>


            <!-- course fiels -->
            <fieldset class = "course">
                <legend class ="leg"> Course name: </legend>
                <input name = "course_name" class = "course_busy" type ="text" >
            </fieldset>

            <fieldset class = "course">
                <legend class ="leg"> Course number: </legend>
                <input name = "course_number" class = "course_busy" type ="text" >
            </fieldset>

            <!-- data fieds -->
            <fieldset class="days">
                <legend class = "leg">Day(s) of Week</legend>
                <label for="monday">
                <input name = "monday" type="checkbox" class="monday" />Mo
                </label>
                <label for="tuesday">
                <input name = "tuesday" type="checkbox" class="tuesday" />Tu
                </label>
                <label for="wednesday">
                <input name = "wednesday" type="checkbox" class="wednesday" />We
                </label>
                <label for="thursday">
                <input name = "thursday" type="checkbox" class="thursday" />Th
                </label>
                <label for="friday">
                <input name = "friday" type="checkbox" class="friday" />Fr
                </label>

            </fieldset>

            <fieldset class="time">
                <legend class = "leg">Time</legend>
                <label for="from">From
                <input name = "from" class =  "time_from" type="time" name="usr_time">
                </label>
                <label for="to"> To
                <input name = "to" class =  "time_to" type="time" name="usr_time">
                </label>
            </fieldset>


            <input  name = "add_course_botton" type = "submit" >

          </form>


          <form name "add_task" method = "POST">
                <?php
                      if(isset($error_task_msg) && $error_task_msg) {
                          echo "<p style=\"color: red;\">*",htmlspecialchars($error_task_msg),"</p>\n\n";
                      }
                      if(isset($task_smsg) && $task_smsg) {
                          echo "<p style=\"color: blue;\">*",htmlspecialchars($task_smsg),"</p>\n\n";
                      }
                ?>

                <fieldset>
                   <legend class ="leg">Task: </legend>
                   <input class = "task_busy" name = "task_name" type = "text">
                </fieldset>

                <fieldset class = "time">
                   <legend class = "leg">Date: </legend>
                   <input class = "date" name = "task_date" type="date">
                </fieldset>

                <fieldset class="time">
                   <legend class = "leg">Time </legend>
                   <label for="from"> From
                   <input class =  "time_from" name = "task_from" type="time" name="usr_time">
                   </label>
                   <label for="to"> To
                   <input class = "time_to" name = "task_to" type="time" name="usr_time">
                   </label>
                </fieldset>

                <input name = "add_task_botton" type = "submit">

         </form>
    </div>
  </body>

</html>
