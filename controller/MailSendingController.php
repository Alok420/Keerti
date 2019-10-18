<?php

include '../Config/Mail.php';
$mail = new Mail();
$to = $_POST["to"];
$subject = $_POST["subject"];
$body = $_POST["body"];
echo "<br>" . $to;
echo "<br>" . $subject;
echo "<br>" . $body;
$info = $mail->sendMail($to, $subject, $body);
if ($info == "1") {
    $db->sendBack($_SERVER);
} else {
    echo $info;
}