<?php

session_start();
include '../../Config/ConnectionObjectOriented.php';
include '../../Config/DB.php';
$db = new DB($conn);
$tbname = $_POST["tbname"];
if (isset($_POST["id"])) {
    $db->update($_POST, $tbname, $_POST["id"]);
    $info = $db->fileUploadWithTable($_FILES, $tbname, $_POST["id"], "../../images/student", "110m", "jpeg,jpg,png,JPG,PNG,docx,pdf,mp4,mkv");
  
} else {
    $loggedinid = $_SESSION["loggedinid"];
    $info = $db->insert($_POST, $tbname);
    $db->fileUploadWithTable($_FILES, $tbname, 0, "../../images/student", "110m", "jpeg,jpg,png,JPG,PNG,docx,pdf,mp4,mkv");
    $data = array("candidates_id" => $loggedinid);
    $info2 = $db->update($data, $tbname, $_SESSION["recentinsertedid"]);
  
}
  if ($info[0] == 1) {
        $db->sendBack($_SERVER);
    } else {
        echo '<h4 style="color:red;">';
        echo $info[0];
        echo $info[1];
        echo $info[2];
        echo '</h4>';
    }
