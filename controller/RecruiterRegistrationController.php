<?php

include '../Config/Mail.php';
include '../Config/ConnectionObjectOriented.php';
include '../Config/DB.php';
$db = new DB($conn);
$mail = new Mail();

$info = $db->insert($_POST, "employers");
$recentinsertedid = $_SESSION["recentinsertedid"];
date_default_timezone_set("Asia/Calcutta");
$date = date("Y/m/d");
$loginarray = array("user_name" => $_POST["user_name"], "password" => $_POST["password"], "creation_date" => $date, "status" => "1", "employers_id" => $recentinsertedid, "bapproval" => "1", "mbapproval" => "0");
$info1 = $db->fileUploadWithTable($_FILES, "employers", $recentinsertedid, "../images/CompanyProfile");
$info3 = $db->insert($loginarray, "login_credentials");


$to = $_POST["email"];
$subject = "New registration as Recruiter";
$body = $_POST["Organization_Name"] . " " . $_POST["Type_of_organization"] . " as new registration as recruiter on " . date("Y/m/d") . "<br>";
$mbrdata = $db->select("mainbranch", "email");
$cc = "";
while ($mone = $mbrdata->fetch_assoc()) {
    $cc .= "," . $mone["email"];
}
$message = $mail->sendMail($to, $subject, $body, $cc);
//echo $message;
header("location:../Login_User.php");

//
//if (count($info3) > 0) {
//    $status = array();
//    echo $info[0];
//    $count1 = 0;
//    $count0 = 0;
//    if ($info[0] == 1) {
//        $count1++;
//        array_push($status, $count1);
//    } else {
//        $count0++;
//        array_push($status, $count0);
//    }
//
//
////    array_push($status, $info);
////    array_push($status, $info1);
////    array_push($status, $info3);
//    header("location:../Login_User.php?info=" . json_encode($status));



