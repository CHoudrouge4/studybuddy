<?php

      require_once "database.php";
      function get_contacts_query($id) {
            global $connection;
            $stmt = "SELECT USER2ID from CONTACTLIST where USER1ID = '$id'";
            $stmt = "SELECT USERID, FIRSTNAME, LASTNAME, EMAIL from USER u, ($stmt) c where u.USERID = c.USER2ID";
            return mysqli_query($connection, $stmt);
      }

      function get_contacts($id) {
            $res = get_contacts_query($id);
            $contacts;
            if (mysqli_num_rows($res) > 0) {
                  for ($i = 0; $row = mysqli_fetch_assoc($res); $i++) {
                        $contacts[$i][1] = $row['FIRSTNAME'];
                        $contacts[$i][2] = $row['LASTNAME'];
                        $contacts[$i][3] = $row['EMAIL'];

                  }
            }
            return $contacts;
      }

      function print_contacts_to_html(&$contacts) {

            for($i = 0; $i < count($contacts); $i++) {
                  $first_name = $contacts[$i][1];
                  $last_name  = $contacts[$i][2];
                  $email      = $contacts[$i][3];
                  echo "<div class = 'contacts'>
                      <img class = 'cont_img' src = '../Image/personel.png'>
                      <h4> $first_name $last_name</h4>
                      <a target='_blank' href='mailto:$email?subject=Studdy Buddy
          &body=Hello!%0D%0AI%20found%20you%20through%20Studdy%20Buddy,%20and%20I%20was%20hoping%20you%20would%20meet%20with%20me%20to%20study!%0D%0AClick%20this%20link%20to%20sign%20in%20and%20give%20a%20reply!%0D%0Astudybuddy.com/login'>
                      <img class = 'cont_img' src = '../Image/@.jpg'></a>
                  </div>";
            }

      }
?>
