<?php

include '../Config/ConnectionObjectOriented.php';
include '../Config/DB.php';
$db = new DB($conn);
//$info1 = $db->fileUploadWithTable($_FILES, "candidates", 0, "../images/profile");
//$info3 = $db->insert($loginarray, "login_credentials");
$info = $db->insert($_POST, "jobpost");

if (count($info) > 0) {
    $status = array();
    echo $info[0];
    $count1 = 0;
    $count0 = 0;
    if ($info[0] == 1) {
        $count1++;
        array_push($status, $count1);
    } else {
        $count0++;
        array_push($status, $count0);
    }
}


