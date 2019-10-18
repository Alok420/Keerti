<?php
if (isset($_SESSION["loggedintype"]) && isset($_SESSION["loggedinid"])) {
    if ($_SESSION["loggedintype"] != "employer") {
        header("location:../Login_User.php");
    }
} else {
    header("location:../Login_User.php");
}