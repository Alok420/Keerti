<?php
session_start();
include '../../Config/ConnectionObjectOriented.php';
include '../../Config/DB.php';
$db = new DB($conn);
$tbname=$_POST["tbname"];
if (isset($_POST["id"])) {
     $db->update($_POST, $tbname, $_POST["id"]);
    $info=$db->fileUploadWithTable($_FILES, $tbname,$_POST["id"],"../../images/student","110m","jpeg,jpg,png,JPG,PNG,docx,pdf,mp4,mkv");
    for ($i = 0; $i < count($info); $i++) {
        echo "<br>" . $info[$i];
    }
} else {
    $loggedinid=$_SESSION["loggedinid"];
    $info = $db->insert($_POST,$tbname);
    $db->fileUploadWithTable($_FILES, $tbname,0,"../../images/student","110m","jpeg,jpg,png,JPG,PNG,docx,pdf,mp4,mkv");
    $data=array("candidates_id"=>$loggedinid);
    $info2 = $db->update($data,$tbname,$_SESSION["recentinsertedid"]);
    for ($i = 0; $i < count($info); $i++) {
        echo "<br>" . $info[$i];
    }
}
