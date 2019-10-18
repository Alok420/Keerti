<?php

include '../Config/Mail.php';
include '../Config/ConnectionObjectOriented.php';
include '../Config/DB.php';
$db = new DB($conn);
$mail = new Mail();
$_POST["Date_of_incorporation"] = $db->jqToSqlDate($_POST, "Date_of_incorporation");

$info = $db->insert($_POST, "employers");
$recentinsertedid = $_SESSION["recentinsertedid"];
date_default_timezone_set("Asia/Calcutta");
$date = date("Y/m/d");

$loginarray = array("user_name" => $_POST["user_name"], "password" => $_POST["password"], "creation_date" => $date, "status" => "1", "employers_id" => $recentinsertedid, "bapproval" => "1", "mbapproval" => "0");
$info1 = $db->fileUploadWithTable($_FILES, "employers", $recentinsertedid, "../images/CompanyProfile", "11m", "jpg,png,JPG,PNG");
$info3 = $db->insert($loginarray, "login_credentials");

$to = $_POST["Email_ID"];
$subject = "New registration as Recruiter";
$body = $_POST["Organization_Name"] . " " . $_POST["Type_of_organization"] . " as new registration as recruiter on " . date("Y/m/d") . "<br>";
$mbrdata = $db->select("mainbranch", "email");
$cc = "";
while ($mone = $mbrdata->fetch_assoc()) {
    $cc .= "," . $mone["email"];
}
$message = $mail->sendMail($to, $subject, $body, $cc);

if ($info3[0] == 1 && $info[0] == 1 && $info1[0] == 1) {
    $_SERVER["HTTP_REFERER"] = "../success.html";
    $db->sendBack($_SERVER);
} else {
    echo '<h3 style="color:red;">';
    echo $info[0];
    echo $info[1];
    echo $info1[0];
    echo $info1[1];
    echo $info3[0];
    echo $info3[1];
    echo '</h3>';
}
