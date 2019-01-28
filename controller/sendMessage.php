<?php
include '../Config/ConnectionObjectOriented.php';
include '../Config/DB.php';
$db = new DB($conn);
$info = $db->insert($_POST, "chat");
echo $info[0];
