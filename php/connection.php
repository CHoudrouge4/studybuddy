<<?php
   $host = "127.0.0.1";
   $dbuser = "root";
   $pass = "mysqldb4731019199593";// enter ur database password.
   $dname = "study_buddy";
   $connection = mysqli_connect($host,$dbuser,$pass,$dname);
   if(mysqli_connect_errno()) {
       die("Connection Failed!" . mysqli_connect_error());
   }
?>
