<?php

    function checkname($name) {
        return strlen($name) <= 50 && ctype_alpha($name);
    }
    $first_name = "hussein123";

    if (checkname($first_name))
        echo "accepted";
    else
        echo "reject";
?>
