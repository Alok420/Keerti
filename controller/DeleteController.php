<?php

include '../Config/ConnectionObjectOriented.php';
include '../Config/DB.php';
$db = new DB($conn);
if (isset($_REQUEST["id"]) && isset($_REQUEST["table_name"])) {
    $info = $db->delete($_REQUEST["id"], $_REQUEST["table_name"]);
    if (count($info) > 0) {
        for ($i = 0; $i < count($info); $i++) {
            echo $info[$i]."<br>";
        }
    }
}
 else {
    echo "Id or table name is not set";
}

