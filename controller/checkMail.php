<?php
include '../Config/DB.php';
include '../Config/ConnectionObjectOriented.php';
if (isset($_POST["type"])) {
    $type = $_POST["type"];
    $email = $_POST["email"];
    $db=new DB($conn);
    $data=$db->select($type,"email", array("email"=>$email));
    $one=$data->fetch_assoc();
    echo $one["email"];
}
?>