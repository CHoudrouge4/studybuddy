<?php

      require_once "database.php";

      $db = new database();

      $email = "hah51@mail.aub.edu";
      $res = $db->select("SELECT PASSWORD, confirmed FROM USER WHERE EMAIL = '$email'");  //get the password and confirmed
      echo $res[0]['PASSWORD'];
      echo $res[0]['PASSWORD'] === '434268849';

?>
