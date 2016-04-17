<?php
      require_once "database.php";

      function get_requested_query($id) {
            global $connection;
            $stmt = "SELECT id, FIRSTNAME, LASTNAME, EMAIL, COURSE_TITLE, TIME_FROM, TIME_TO, REQUEST_DATE from REQUESTS r, USER u where r.USERID_TO = '$id' and  r.USERID_FROM = u.USERID";
            return mysqli_query($connection, $stmt);
      }

      function get_requested_res($id) {
            $res = get_requested_query($id);
            $requested_table;
            if($res) {
                  for($i = 0; $row = mysqli_fetch_assoc($res); $i++) {

                        $requested_table[$i][0] = $row['FIRSTNAME'];
                        $requested_table[$i][1] = $row['LASTNAME'];
                        $requested_table[$i][2] = $row['EMAIL'];
                        $requested_table[$i][3] = $row['COURSE_TITLE'];
                        $requested_table[$i][4] = $row['TIME_FROM'];
                        $requested_table[$i][5] = $row['TIME_TO'];
                        $requested_table[$i][6] = $row['REQUEST_DATE'];

                        $requested_table[$i][7] = $row['id'];

                  }
            }

            return $requested_table;
      }


      function print_requested (&$requested_table) {

            echo "<form method = 'POST'>";
            for($i = 0; $i < count($requested_table); $i++) {

                  $firstname = $requested_table[$i][0];
                  $last_name = $requested_table[$i][1];
                  $email     = $requested_table[$i][2];
                  $title     = $requested_table[$i][3];
                  $from      = $requested_table[$i][4];
                  $to        = $requested_table[$i][5];
                  $date      = $requested_table[$i][6];
                  echo  "
                  <tr id>
                       <td> <img class = 'imgg' src = '../Image/personel.png'></td>
                       <td> <text> $firstname  $last_name </text> <br>
                            <text> $email       </text> <br>
                            <text> $title  </text></td>
                       <td> $date From: $from to $to </td>
                       <td> <input   type='image'  name = 'i$i' src = '../Image/accept_mark.png' > </input> </td>
                       <td> <input   type='image'  name = 'ii$i' src = '../Image/reject.png'> </input> </td>
                   </tr>";
            }
            echo "</form>";

      }


      function accept_acction($email, $id, $req_id) {
            add_contacts($email, $id, $req_id);
            delete_request($req_id);


      }

      function reject_acction($req_id) {
            delete_request($req_id);
      }


      function add_contacts($email, $id, $req_id) {
            global $connection;
            $get_id  = "SELECT USERID from USER where EMAIL = $email";
            $res     = mysqli_query($connection);
            if (mysqli_num_rows($res) > 0) {
                  $row  =  mysqli_fetch_assoc($res);
                  $friend_id = $row['USERID'];
                  $stmt = "INSERT INTO CONTACTLIST (USER1ID, USER2ID) values ('$id', '$friend_id')";
                  mysqli_query($connection, $stmt);
                  $stmt = "INSERT INTO CONTACTLIST (USER1ID, USER2ID) values ('$friend_id', '$id')";
                  mysqli_query($connection, $stmt);
                  delete_request($req_id);
            }
      }

      function delete_request($req_id) {
            global $connection;
            $stmt = "DELETE FROM REQUESTS WHERE id = $req_id";
            mysqli_query($connection, $stmt);
      }




//      $id = 2;
//$requested_table = get_requested_res($id);

?>
