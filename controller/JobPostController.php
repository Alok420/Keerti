<?php

include '../Config/ConnectionObjectOriented.php';
include '../Config/DB.php';
$db = new DB($conn);

$_POST["job_posted_on"] = $db->jqToSqlDate($_POST, "job_posted_on");
$_POST["vacancy_valid_till"] = $db->jqToSqlDate($_POST, "vacancy_valid_till");

$info = $db->insert($_POST, "jobpost");
$returnpath = "";
$returnpath = $_SERVER["HTTP_REFERER"] . "?info=Record added successfully";
unset($_REQUEST["info"]);
//unset($_SERVER["HTTP_REFERER"]);
    if ($info[0] == 1) {
        $db->sendBack($_SERVER);
    } else {
        echo '<h4 style="color:red;">';
        echo $info[0];
        echo $info[1];
        echo $info[2];
        echo '</h4>';
    }



