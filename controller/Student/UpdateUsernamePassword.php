<?php

session_start();
include '../../Config/ConnectionObjectOriented.php';
include '../../Config/DB.php';
$db = new DB($conn);
$tbname = $_POST["tbname"];
if (isset($_POST["id"])) {
    if (!empty($_POST["password"])) {
        $info = $db->update($_POST, $tbname, $_POST["id"]);
    } else {
        $p=array("user_name"=>$_POST["user_name"]);
        $info = $db->update($p, $tbname, $_POST["id"]);
    }
    for ($i = 0; $i < count($info); $i++) {
        echo "<br>" . $info[$i];
    }
}

