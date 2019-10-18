<?php

session_start();
include '../../Config/ConnectionObjectOriented.php';
include '../../Config/DB.php';
$db = new DB($conn);
$tbname = $_POST["tbname"];
if (isset($_POST["id"])) {
    if (!empty($_POST["password"])) {
        $info = $db->update($_POST, $tbname, $_POST["id"]);
        if ($info[0] == 1) {
            $db->sendBack($_SERVER);
        } else {
            echo $info[0];
            echo $info[1];
            echo $info[2];
        }
    } else {
        $p = array("user_name" => $_POST["user_name"]);
        $info = $db->update($p, $tbname, $_POST["id"]);
        if ($info[0] == 1) {
            $db->sendBack($_SERVER);
        } else {
            echo $info[0];
            echo $info[1];
            echo $info[2];
        }
    }
}

