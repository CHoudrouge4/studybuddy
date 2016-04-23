<?php

      require_once "database.php";

      $db = new database();


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
