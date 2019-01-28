<?php
session_start();
include '../Config/ConnectionObjectOriented.php';
include '../Config/DB.php';
include '../Config/Mail.php';

$mail = new Mail();
$db = new DB($conn);

$info = $db->update($_POST, $_POST["tablename"], $_POST["id"]);
$id = $_POST["id"];
$tablename = $_POST["tablename"];

$data = $db->select($tablename, "*", array("id" => $id));
$one = $data->fetch_assoc();
$brid = $one["branches_id"];

$data = $db->select("branches", "email", array("id" => $brid));
$one = $data->fetch_assoc();
$to = $one["email"];

$data = $db->select("mainbranch", "DISTINCT email");
$cc = "";
$count = 0;

while ($one = $data->fetch_assoc()) {
    if ($count == 0) {
        $cc .= $one["email"];
    } else {
        $cc .= "," . $one["email"];
    }
    $count++;
}

$loginid = $_SESSION["loggedinid"];
$logintype = $_SESSION["loggedintype"];
$subject = "$logintype  approval";

$body = "$logintype ($loginid) has changed the approval of (".$_POST["tablename"].") ";
$mail->sendMail($to, $subject, $body, $cc);

echo $info[0];
echo $info[1];
echo $info[2];
echo $info[3];
