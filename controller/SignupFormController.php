<?php
include '../Config/ConnectionObjectOriented.php';
include '../Config/DB.php';
include '../Config/Mail.php';

$db = new DB($conn);
$mail = new Mail();

$_POST["dob"] = $db->jqToSqlDate($_POST, "dob");
$_POST["resume_approval"] = 0;
$info = $db->insert($_POST, "candidates");
$recentinsertedid = $_SESSION["recentinsertedid"];
date_default_timezone_set("Asia/Calcutta");

$date = date("Y/m/d");

$loginarray = array("user_name" => $_POST["user_name"], "password" => $_POST["password"], "creation_date" => $date, "status" => "1", "candidates_id" => $recentinsertedid, "bapproval" => "1", "mbapproval" => "1");
$info1 = $db->fileUploadWithTable($_FILES,"candidates",0,"../images/profile", "11m", "jpg,png,JPG,PNG");
$info3 = $db->insert($loginarray, "login_credentials");
$common = array("candidates_id" => $recentinsertedid);
$info5 = $db->insert($common, "education");
$info5 = $db->insert($common, "professional_details");
$info5 = $db->insert($common, "skill_Set");
$info5 = $db->insert($common, "professional_experience_detail");
$info5 = $db->insert($common, "project_detail");
$info5 = $db->insert($common, "language_known");
$info5 = $db->insert($common, "job_preference");
$common2 = array("candidates_id" => $recentinsertedid, "video_approval" => 0);
$info5 = $db->insert($common2, "upload_other_data");
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
var_dump($message);
if ($info3[0] == 1 && $info[0] == 1 && $info1[0] == 1) {
    $_SERVER["HTTP_REFERER"] = "../success.html";
//    $db->sendBack($_SERVER);
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
