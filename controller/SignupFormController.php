<?php
include '../Config/ConnectionObjectOriented.php';
include '../Config/DB.php';
include '../Config/Mail.php';
$db = new DB($conn);
$mail=new Mail();
$info = $db->insert($_POST, "candidates");
$recentinsertedid = $_SESSION["recentinsertedid"];
date_default_timezone_set("Asia/Calcutta");
$date = date("Y/m/d");
$loginarray = array("user_name" => $_POST["user_name"], "password" => $_POST["password"], "creation_date" => $date, "status" => "1", "candidates_id" => $recentinsertedid, "bapproval" => "0", "mbapproval" => "1");
$info1 = $db->fileUploadWithTable($_FILES, "candidates", 0, "../images/profile");
$info3 = $db->insert($loginarray, "login_credentials");
$common = array("candidates_id" => $recentinsertedid);
$info5 = $db->insert($common, "education");
$info5 = $db->insert($common, "professional_details");
$info5 = $db->insert($common, "skill_Set");
$info5 = $db->insert($common, "professional_experience_detail");
$info5 = $db->insert($common, "project_detail");
$info5 = $db->insert($common, "language_known");
$info5 = $db->insert($common, "job_preference");
$info5 = $db->insert($common, "upload_other_data");
$info5 = $db->insert($common, "remuneration_details");

$to = $_POST["email"];
$subject = "New registration as candidates";
$body = $_POST["fname"] . " " . $_POST["lname"] . " as new registration as candidates on " . date("Y/m/d") . "<br>";
$brid = $_POST["branches_id"];
$brdata = $db->select("branches", "email", array("id" => $brid));
$one = $brdata->fetch_assoc();
$cc = $one["email"];
$mbrdata = $db->select("mainbranch", "email");
while ($mone = $mbrdata->fetch_assoc()) {
    $cc .= "," . $mone["email"];
}
$message = $mail->sendMail($to, $subject, $body, $cc);
//echo $message;
header("location:../Login_User.php");

//echo $info5[0];
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
//}


