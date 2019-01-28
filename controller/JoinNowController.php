<?php
include '../Config/ConnectionObjectOriented.php';
include '../Config/DB.php';
$db = new DB($conn);
$info = $db->insert($_POST,"subscription");
//echo $info[0];
//echo $info[1];
//echo $info[2];
$url=$_POST["url"];
//echo $url;

?>
<div>
    <h1>You are subscribed.</h1>
</div>