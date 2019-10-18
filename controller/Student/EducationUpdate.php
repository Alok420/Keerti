<?php

session_start();
include '../../Config/ConnectionObjectOriented.php';
include '../../Config/DB.php';
$db = new DB($conn);
$tbname = $_REQUEST["tbname"];
if (isset($_REQUEST["id"])) {
    $info = $db->update($_REQUEST, $tbname, $_REQUEST["id"]);
    if (isset($_FILES["dp"])) {
        $finfo = $db->fileUploadWithTable($_FILES, $tbname, $_REQUEST["id"], "../../images/profile/", "10m", "jpg,jpeg,png");
    }

} else {
    $loggedinid = $_SESSION["loggedinid"];
    $info = $db->insert($_REQUEST, $tbname);
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
