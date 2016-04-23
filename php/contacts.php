<?php

     session_start();
     if (isset($_SESSION['email'])) {
            $id = $_SESSION['id'];
            require_once "contacts_utility.php";
            $contacts = get_contacts($id);
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

      print_contacts_to_html($contacts);

?>
      </div>
    </body>
</html>
