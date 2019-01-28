<?php
    session_start();
if (isset($_SESSION["loggedintype"]) && isset($_SESSION["loggedinid"])) {
    if($loggedintype==$_SESSION["loggedintype"] || $loggedintype==""){
        
    }
    
} else {
    header("location:Login_User.php");
}