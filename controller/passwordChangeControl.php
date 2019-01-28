
<?php

include '../Config/ConnectionObjectOriented.php';
include '../Config/DB.php';
$db = new DB($conn);
$data = $db->select($_POST["tablename"], "id", array("user_name" => $_POST["username"]));
if ($data->num_rows > 0) {
    $one = $data->fetch_assoc();
    $info = $db->update($_POST, $_POST["tablename"], $one["id"]);
    header("loaction:../Login_User.php");
} else {
    echo 'Username is not valid';
}