<?php
session_start();
include '../Config/ConnectionObjectOriented.php';
include '../Config/DB.php';

$db = new DB($conn);
if (isset($_POST["username"]) && isset($_POST["password"])) {
    $message = $db->login($_POST["username"], $_POST["password"], "login_credentials");
    if ($message != "success") {
        header("location:../Login_User.php?message=$message");
    } else if($message=="success"){
        header("location:../Index.php");
    }
    
}
