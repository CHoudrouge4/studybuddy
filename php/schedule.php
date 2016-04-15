<?php

      session_start();
      if(isset($_SESSION['email'])) {
            require "schedule_utility.php";
            $schedule  = create_schedule();

            $header = Array("Time", "Monday","Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
            $time   = Array("8:00 - 9:00  AM", "9:00 - 10:00 AM", "10:00 - 11:00 AM", "11:00 - 12:00 PM", "12:00 - 1:00 PM", "2:00 - 3:00 PM",
                  "3:00 - 4:00 PM", "4:00 - 5:00 PM", "5:00 - 6:00 PM", "6:00 - 7:00 PM", "7:00 - 8:00 PM", "8:00 - 9:00 PM", "9:00 - 10:00 PM");

      }


 ?>

<html>
<head>
    <title>Timetable</title>
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    <link rel="stylesheet" type="text/css" href="../CSS/contact_style.css">
    <style type="text/css">

    tr{
        padding-bottom: 40px;
    }
    th,td
    {
        margin: 0;
        text-align: center;
        border-collapse: collapse;
        outline: 1px solid #e3e3e3;
    }

    td
    {
        padding: 5px 10px;
    }

    th
    {
        background: #666;
        color: white;
        padding: 5px 10px;
    }

    td:hover
    {
        cursor: pointer;
        background: #666;
        color: white;
    }
    </style>

</head>
    <body>

        <iframe src = "../iframe.php" frameborder = "0" width="100%" height="130"  > </iframe>
        <div id = "title">
            <h1>Schedule</h1>
        </div>
        <br>
        <div> <?php echo "Date $system_date, Week Number: $system_week"; ?> </div>
    <table width="80%" align="center" >
    <div id="head_nav">
    <tr>
        <th> <?php echo $header[0]; ?> </th>
        <th> <?php echo $header[1]; ?> </th>
        <th> <?php echo $header[2]; ?> </th>
        <th> <?php echo $header[3]; ?></th>
        <th> <?php echo $header[4]; ?></th>
        <th> <?php echo $header[5]; ?></th>
        <th> <?php echo $header[6]; ?></th>
    </tr>
    </div>

    <tr>
        <th> <?php echo $time[0]; ?> </th>

            <td> <?php echo $schedule[0][0]; ?> </td>
            <td> <?php echo $schedule[0][1]; ?></td>
            <td> <?php echo $schedule[0][2]; ?></td>
            <td> <?php echo $schedule[0][3]; ?></td>
            <td> <?php echo $schedule[0][4]; ?></td>
            <td> <?php echo $schedule[0][5]; ?> </td>
        </div>
    </tr>

    <tr>
        <th> <?php echo $time[1]; ?></td>

             <td> <?php echo $schedule[1][0]; ?> </td>
             <td> <?php echo $schedule[1][1]; ?> </td>
             <td> <?php echo $schedule[1][2]; ?> </td>
             <td> <?php echo $schedule[1][3]; ?> </td>
             <td> <?php echo $schedule[1][4]; ?> </td>
             <td> <?php echo $schedule[1][5]; ?> </td>
        </div>
    </tr>

    <tr>
        <th> <?php echo $time[2]; ?> </td>

             <td> <?php echo $schedule[2][0]; ?> </td>
             <td> <?php echo $schedule[2][1]; ?> </td>
             <td> <?php echo $schedule[2][2]; ?> </td>
             <td> <?php echo $schedule[2][3]; ?> </td>
             <td> <?php echo $schedule[2][4]; ?> </td>
             <td> <?php echo $schedule[2][5]; ?> </td>

        </div>
    </tr>

    <tr>
        <th> <?php echo $time[3]; ?> </td>

             <td> <?php echo $schedule[3][0]; ?> </td>
             <td> <?php echo $schedule[3][1]; ?> </td>
             <td> <?php echo $schedule[3][2]; ?> </td>
             <td> <?php echo $schedule[3][3]; ?> </td>
             <td> <?php echo $schedule[3][4]; ?> </td>
             <td> <?php echo $schedule[3][5]; ?> </td>

        </div>
    </tr>

    <tr>
        <th> <?php echo $time[4]; ?></td>

             <td> <?php echo $schedule[4][0]; ?> </td>
             <td> <?php echo $schedule[4][1]; ?> </td>
             <td> <?php echo $schedule[4][2]; ?> </td>
             <td> <?php echo $schedule[4][3]; ?> </td>
             <td> <?php echo $schedule[4][4]; ?> </td>
             <td> <?php echo $schedule[4][5]; ?> </td>
        </div>
    </tr>


    <tr>
        <th> <?php echo $time[5]; ?></td>

             <td> <?php echo $schedule[5][0]; ?> </td>
             <td> <?php echo $schedule[5][1]; ?> </td>
             <td> <?php echo $schedule[5][2]; ?> </td>
             <td> <?php echo $schedule[5][3]; ?> </td>
             <td> <?php echo $schedule[5][4]; ?> </td>
             <td> <?php echo $schedule[5][5]; ?> </td>
        </div>
    </tr>
    <tr>
        <th> <?php echo $time[6]; ?></td>

             <td> <?php echo $schedule[6][0]; ?> </td>
             <td> <?php echo $schedule[6][1]; ?> </td>
             <td> <?php echo $schedule[6][2]; ?> </td>
             <td> <?php echo $schedule[6][3]; ?> </td>
             <td> <?php echo $schedule[6][4]; ?> </td>
             <td> <?php echo $schedule[6][5]; ?> </td>
        </div>
    </tr>
    <tr>
        <th> <?php echo $time[7]; ?></td>

             <td> <?php echo $schedule[7][0]; ?> </td>
             <td> <?php echo $schedule[7][1]; ?> </td>
             <td> <?php echo $schedule[7][2]; ?> </td>
             <td> <?php echo $schedule[7][3]; ?> </td>
             <td> <?php echo $schedule[7][4]; ?> </td>
             <td> <?php echo $schedule[7][5]; ?> </td>
        </div>
    </tr>
    <tr>
        <th> <?php echo $time[8]; ?></td>

             <td> <?php echo $schedule[8][0]; ?> </td>
             <td> <?php echo $schedule[8][1]; ?> </td>
             <td> <?php echo $schedule[8][2]; ?> </td>
             <td> <?php echo $schedule[8][3]; ?> </td>
             <td> <?php echo $schedule[8][4]; ?> </td>
             <td> <?php echo $schedule[8][5]; ?> </td>
        </div>
    </tr>
    <tr>
        <th> <?php echo $time[9]; ?></td>

             <td> <?php echo $schedule[9][0]; ?> </td>
             <td> <?php echo $schedule[9][1]; ?> </td>
             <td> <?php echo $schedule[9][2]; ?> </td>
             <td> <?php echo $schedule[9][3]; ?> </td>
             <td> <?php echo $schedule[9][4]; ?> </td>
             <td> <?php echo $schedule[9][5]; ?> </td>
        </div>
    </tr>
    <tr>
        <th> <?php echo $time[10]; ?></td>

             <td> <?php echo $schedule[10][0]; ?> </td>
             <td> <?php echo $schedule[10][1]; ?> </td>
             <td> <?php echo $schedule[10][2]; ?> </td>
             <td> <?php echo $schedule[10][3]; ?> </td>
             <td> <?php echo $schedule[10][4]; ?> </td>
             <td> <?php echo $schedule[10][5]; ?> </td>
        </div>
    </tr>
    <tr>
        <th> <?php echo $time[11]; ?></td>

             <td> <?php echo $schedule[11][0]; ?> </td>
             <td> <?php echo $schedule[11][1]; ?> </td>
             <td> <?php echo $schedule[11][2]; ?> </td>
             <td> <?php echo $schedule[11][3]; ?> </td>
             <td> <?php echo $schedule[11][4]; ?> </td>
             <td> <?php echo $schedule[11][5]; ?> </td>
        </div>
    </tr>
    <tr>
        <th> <?php echo $time[12]; ?></td>

             <td> <?php echo $schedule[12][0]; ?> </td>
             <td> <?php echo $schedule[12][1]; ?> </td>
             <td> <?php echo $schedule[12][2]; ?> </td>
             <td> <?php echo $schedule[12][3]; ?> </td>
             <td> <?php echo $schedule[12][4]; ?> </td>
             <td> <?php echo $schedule[12][5]; ?> </td>
        </div>
    </tr>

</table>
<br><br>
</body>
</html>
