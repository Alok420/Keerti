<?php
session_start();
if (isset($_SESSION["loggedintype"]) && isset($_SESSION["loggedinid"])) {
    if ($_SESSION["loggedintype"] != "candidate") {
        header("location:../Login_User.php");
    }
} else {
    header("location:../Login_User.php");
}