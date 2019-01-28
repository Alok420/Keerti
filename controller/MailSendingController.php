<?php
include '../Config/Mail.php';
$mail = new Mail();
$to = $_POST["to"];
$subject = $_POST["subject"];
$body = $_POST["body"];
echo "<br>".$to;
echo "<br>".$subject;
echo "<br>".$body;
$message = $mail->sendMail($to, $subject, $body);
echo $message;
