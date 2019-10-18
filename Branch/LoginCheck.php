<?php
if (isset($_SESSION["loggedintype"]) && isset($_SESSION["loggedinid"])) {
    if ($_SESSION["loggedintype"] != "branch") {
        echo '<script>window.location.href="../Login_User.php?";</script>';
    }
} else {
    echo '<script>window.location.href="../Login_User.php?";</script>';
}