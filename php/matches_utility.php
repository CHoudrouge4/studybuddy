<?php
      require_once "database.php";
      $db = new database();

      function get_requested_query($id) {
            global $db;
            $stmt = "SELECT ID, FIRSTNAME, LASTNAME, EMAIL, COURSE_TITLE, TIME_FROM, TIME_TO, REQUEST_DATE FROM REQUESTS r, USER u WHERE r.USERID_TO = '$id' and  r.USERID_FROM = u.USERID";
            return $db->select($stmt);
      }

      function print_requested (&$requested_table) {

            echo "<form method = 'POST'>";
            for($i = 0; $i < count($requested_table); $i++) {

                  $firstname = $requested_table[$i]['FIRSTNAME'];
                  $last_name = $requested_table[$i]['LASTNAME'];
                  $email     = $requested_table[$i]['EMAIL'];
                  $title     = $requested_table[$i]['COURSE_TITLE'];
                  $from      = $requested_table[$i]['TIME_FROM'];
                  $to        = $requested_table[$i]['TIME_TO'];
                  $date      = $requested_table[$i]['REQUEST_DATE'];
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


      function delete_request($req_id) {
            global $db;
            $stmt = "DELETE FROM REQUESTS WHERE id = '$req_id'";
            $db->query($stmt);
      }

      function add_contacts($email, $id, $req_id) {
            global $db;
            $stmt  = "SELECT USERID FROM USER WHERE EMAIL = '$email'";
            $res   = $db-> query($stmt);
            $row   = mysqli_fetch_assoc($res);
            $friend_id = $row['USERID'];

            $stmt = "INSERT INTO CONTACTLIST (USER1ID, USER2ID) values ('$id', '$friend_id')";
            $db->query($stmt);
            $stmt = "INSERT INTO CONTACTLIST (USER1ID, USER2ID) values ('$friend_id', '$id')";
            $db->query($stmt);
            delete_request($req_id);
      }

?>
