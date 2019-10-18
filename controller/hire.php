<?php

include '../Config/ConnectionObjectOriented.php';
include '../Config/DB.php';
$db = new DB($conn);
$info = $db->insert($_POST, "hiring");
if ($info[0] == 1) {
    $db->sendBack($_SERVER);
} else {
    echo $info[0];
    echo $info[1];
    echo $info[2];
}