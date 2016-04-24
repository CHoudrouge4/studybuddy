<?php

      session_start();
      if(isset($_SESSION['email'])) {
              require_once "matches_utility.php";
              $id                = $_SESSION['id'];
              $requested_table   = get_requested_query($id) ;

      } else {
            header('Location: ../index.php');
      }

?>
<!DOCTYPE>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../CSS/contact_style.css">
        <link rel="stylesheet" type="text/css" href="../CSS/style.css">
        <link href="../CSS/matches.css" rel = "stylesheet">
        <link href = "../CSS/match_info.css" rel = "stylesheet">
                <title> Matches </title>
        <base target="_parent" />
    </head>
    <body>
        <iframe src = "../iframe.php" frameborder = "0" width="100%" height="130"  > </iframe>
        <div class = "pages_body">
        <div id = "title">
            <h1>Matches</h1>
        </div>
        <br>
        <script>
            function toggle(hello) {
                if( document.getElementById(hello).style.display=='none' ){
                    document.getElementById(hello).style.display = '';
                }else{
                    document.getElementById(hello).style.display = 'none';
                }
            }
        </script>
        <div id = "left_div">
            <table id = "result">
               <?php
                        //print the requested table
                        print_requested($requested_table);
                        for ($i = 0; $i < count($requested_table); $i++) {
                              //if the accept button is pressed
                              if(isset($_POST["i{$i}_x"]) && isset($_POST["i{$i}_y"])) {
                                    $req_id = $requested_table[$i]['ID'];
                                    $email  = $requested_table[$i]['EMAIL'];
                                    accept_acction($email, $id, $req_id);
                                    header("Refresh:0");
                              //if the reject button is pressed
                              } else if (isset($_POST["ii{$i}_x"]) && isset($_POST["ii{$i}_y"]) ) {
                                    $req_id = $requested_table[$i]['ID'];
                                    reject_acction($req_id);
                                    header("Refresh:0");
                              }
                        }

               ?>

            </table>
        </div>
      </div>
    </body>
</html>
