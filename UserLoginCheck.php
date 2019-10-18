<?php

if (isset($_SESSION["loggedintype"]) && isset($_SESSION["loggedinid"])) {
    if (in_array($_SESSION["loggedintype"], $loggedintype, TRUE) != FALSE) {
        
    } else {
        echo '<script>window.location.href="Login_User.php?";</script>';
    }
} else {
    echo '<script>window.location.href="Login_User.php?";</script>';
}