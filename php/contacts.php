<?php

     session_start();
     if (isset($_SESSION['email'])) {
            $id = $_SESSION['id']; //get the schession from id
            require_once "contacts_utility.php";//includes the contacts utility
            $contacts = get_contacts($id);      //get the contacts.
      } else {
            header('Location: ../index.php');
      }

 ?>
<!DOCTYPE>
<html>
    <head>
        <title>Contacts - Study Buddy</title>
        <link rel="stylesheet" type="text/css" href="../CSS/style.css">
        <link rel="stylesheet" type="text/css" href="../CSS/contact_style.css">
    </head>
    <body>

        <iframe src = "../iframe.php" frameborder = "0" width="100%" height="130"  > </iframe>
        <div class = "pages_body">
        <div id = "title">
            <h1>Contacts</h1>
        </div>
        <br>
<?php
      // print the contacts
      print_contacts_to_html($contacts);

?>
      </div>
    </body>
</html>
