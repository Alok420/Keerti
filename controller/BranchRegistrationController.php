<?php session_start(); ?>
<?php

include '../Config/ConnectionObjectOriented.php';
include '../Config/DB.php';
$db = new DB($conn);
$info = $db->insert($_POST, "branches");
$returnpath = $_SERVER["HTTP_REFERER"] . "?info=Record added successfully";
unset($_REQUEST["info"]);
$recentinsertedid = $_SESSION["recentinsertedid"];
date_default_timezone_set("Asia/Calcutta");
$date = date("Y/m/d");
$loginarray = array("user_name" => $_POST["user_name"], "password" => $_POST["password"], "creation_date" => $date, "status" => "1", "bapproval" => "1", "mbapproval" => "0", "branches_id" => $recentinsertedid);
$info = $db->insert($loginarray, "login_credentials");

if ($info[0] == 1) {
    $db->sendBack($_SERVER);
} else {
    echo '<h4 style="color:red;">';
    echo $info[0];
    echo $info[1];
    echo $info[2];
    echo '</h4>';
}
?>