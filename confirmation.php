<?php
  require  "./php/database.php";
  $email = $_GET['email'];
  $code = $_GET['confirm'];

  $query = mysqli_query("SELECT * FROM USER where EMAIL = '$email'");
  while ($row = mysqli_fetch_assoc($query)) {
    $db_code = $row['confirmation_code'];
  }

  if ($code == $db_code) {
    mysqli_query($connection,"update USER set confirmed = '1' where EMAIL = '$email'");
    mysqli_query($connection,"update USER set confirmation_code = '0' where EMAIL = '$email'");
    echo "<h1> welcome to studybuddy <h1>";
  } else {
    echo "user name and codd do not match";
  }
 ?>
