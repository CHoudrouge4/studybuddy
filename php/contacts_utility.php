<?php
      //include the data base.
      require_once "database.php";
      /**
      * @param: $id the user id to get his contacts
      * @return: Array that contains the contacts table.
      */
      function get_contacts_query($id) {
            $db = new database();
            $stmt = "SELECT USER2ID from CONTACTLIST where USER1ID = '$id'";
            $stmt = "SELECT USERID, FIRSTNAME, LASTNAME, EMAIL from USER u, ($stmt) c where u.USERID = c.USER2ID";
            return $db->select($stmt);
      }

      /**
      * @param: $id the user id to get his contacts
      * @return: Array that contains the contacts table.
      */
      function get_contacts($id) {
            return get_contacts_query($id);
      }

      /**
      * print the cintacts in an html format
      * @param: $contacts array of the contacs
      *
      */
      function print_contacts_to_html(&$contacts) {

            for($i = 0; $i < count($contacts); $i++) {
                  $first_name = $contacts[$i]['FIRSTNAME'];
                  $last_name  = $contacts[$i]['LASTNAME'];
                  $email      = $contacts[$i]['EMAIL'];
                  echo "<div class = 'contacts'>
                      <img class = 'cont_img' src = '../Image/personel.png'>
                      <h4> $first_name $last_name</h4>
                      <a target='_blank' href='mailto:$email?subject=Studdy Buddy
          &body=Hello!%0D%0AI%20found%20you%20through%20Studdy%20Buddy,%20and%20I%20was%20hoping%20you%20would%20meet%20with%20me%20to%20study!%0D%0AClick%20this%20link%20to%20sign%20in%20and%20give%20a%20reply!%0D%0Astudybuddy.com/login'>
                      <img class = 'cont_img' src = '../Image/@.svg'></a>
                  </div>";
            }

      }


?>
