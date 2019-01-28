<?php

include '../Config/ConnectionObjectOriented.php';
include '../Config/DB.php';
$db = new DB($conn);
if (isset($_GET["id"])) {
    $tablename=$_GET["tbname"];
    $info = $db->update($_GET, $tablename, $_GET["id"]);
    for ($i = 0; $i < count($info); $i++) {
        echo "<br>".$info[$i];
    }
}