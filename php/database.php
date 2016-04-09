<?php

$host = "127.0.0.1";
$dbuser = "study_buddy_db";
$pass = "study_buddy_choudrouge4";// enter ur database password.
$dname = "study_buddy";
$connection = mysqli_connect($host,$dbuser,$pass,$dname);
//$con = mysqli_connect($host,$dbuser, $pass, $dname);
if(mysqli_connect_errno()) {
    die("Connection Failed!" . mysqli_connect_error());
}

?>
