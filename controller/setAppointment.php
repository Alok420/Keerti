
<?php

include '../Config/ConnectionObjectOriented.php';
include '../Config/DB.php';
$db = new DB($conn);
$info = $db->insert($_POST, "appointment");
if ($info[0] == 1) {
    header("location:../EmployerManagement/setAppointMent.php?info=".$info[0]);
} else {
    echo $info[0];
    echo $info[1];
    echo $info[2];
}
