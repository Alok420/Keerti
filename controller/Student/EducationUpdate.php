<?php
session_start();
include '../../Config/ConnectionObjectOriented.php';
include '../../Config/DB.php';
$db = new DB($conn);
$tbname=$_POST["tbname"];
if (isset($_POST["id"])) {
    $info = $db->update($_POST, $tbname, $_POST["id"]);
    if(isset($_FILES["dp"])){
       $finfo=$db->fileUploadWithTable($_FILES,$tbname, $_POST["id"], "../../images/profile/", "10m","jpg,jpeg,png");
//       echo $finfo[0];
    }
    for ($i = 0; $i < count($info); $i++) {
        echo "<br>" . $info[$i];
    }
} else {
    $loggedinid=$_SESSION["loggedinid"];
    $info = $db->insert($_POST,$tbname);
    $data=array("candidates_id"=>$loggedinid);
    $info2 = $db->update($data,$tbname,$_SESSION["recentinsertedid"]);
    for ($i = 0; $i < count($info); $i++) {
        echo "<br>" . $info[$i];
    }
}
