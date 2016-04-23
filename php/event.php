<?php

      require "database.php";
      class event {
            private static $db;
            public function __construct() {
                  $this->db = new database();
            }

            public function add($id, $task_name, $task_from, $task_to, $task_date) {
                  $add_task  = "INSERT INTO BUSY (USERID , TITLE, START_FROM, END_AT, BUSYDATE) VALUES ('$id', '$task_name', '$task_from', '$task_to', '$task_date')";
                  $this->db->query($add_task);
            }

      }



?>
