
<?php

include '../Config/ConnectionObjectOriented.php';
include '../Config/DB.php';
$db = new DB($conn);
$_POST["candidates_appointment_date"] = $db->jqToSqlDate($_POST, "candidates_appointment_date");
$info = $db->insert($_POST, "appointment");
if ($info[0] == 1) {
    $db->sendBack($_SERVER);
} else {
    echo $info[0];
    echo $info[1];
    echo $info[2];
}