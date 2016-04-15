<?php






?>
<!DOCTYPE>
<html>
    <head>
        <title> Request a Match </title>
        <link rel="stylesheet" type="text/css" href="../CSS/contact_style.css">
        <link rel="stylesheet" type="text/css" href="../CSS/style.css">
        <link rel="stylesheet" type="text/css" href="../CSS/profile.css">
        <link rel="stylesheet" type="text/css" href="../CSS/req.css">

        <script src="../Script/script.js"></script>
        <script src="../Script/datamanip.js"></script>

    </head>

    <body link="black">
        <iframe src = "../iframe.php" frameborder = "0" width="100%" height="130"  > </iframe>
        <div id="head_nav">
        </div>
        <div id = "title">
            <h1>Request a Match</h1>
        </div>
        <br>
        <div id = "select_course">
            <form action="action_page.php">
                <span>Course name</span>
                <input type="text" name="course" value="CMPS 277"><br><br>
                From: <input type="time" name="time_course" value="08:00AM">
                To: <input type="time" name="time_course" value="08:00AM">
                <input type="date" name="time_course" value="08:00 AM"><br>
                <br>
                <br>
                <input id = "search" type="button" name="search" value="Search" onclick="search_req()">
            </form>
        </div>
        <div id = "sort">
            <div id = "sort_by">

                <table id = "table_looks">
                    <tr>
                        <td><span>Sort by:</span></td>
                        <th>First Name</th>
                        <th>Last Name</th>
                    </tr>
                    <tr>
                        <td><input type = "checkbox"></td>
                        <td>Wassim </td>
                        <td>Sleiman</td>
                    </tr>
                    <tr>
                        <td><input type = "checkbox"></td>
                        <td>Sarah Maria</td>
                        <td>Oud</td>
                    </tr>
                    <tr>
                        <td><input type = "checkbox"></td>
                        <td>Donald</td>
                        <td>Trump</td>
                    </tr>
                    <tr>
                        <td><input type = "checkbox"></td>
                        <td>Barack</td>
                        <td>Obama</td>
                    </tr>
                 </table>
                 <input id = "send_req" type = "button" value = "send">
             </div>
         </div>
    </body>
</html>
