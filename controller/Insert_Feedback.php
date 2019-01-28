<?php
include '../Config/ConnectionObjectOriented.php';
include '../Config/DB.php';
$db = new DB($conn);
$info = $db->insert($_POST, "feedback");
echo $info[0];
echo "<br>".$info[1];
echo "<br>".$info[2];
echo "<br>".$info[3];
echo "<br>".$info[4];
