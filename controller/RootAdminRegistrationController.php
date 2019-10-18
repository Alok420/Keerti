<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include '../Config/ConnectionObjectOriented.php';
        include '../Config/DB.php';

        $db = new DB($conn);
        $info = $db->insert($_POST, "mainbranch");

        $recentinsertedid = $_SESSION["recentinsertedid"];
        date_default_timezone_set("Asia/Calcutta");
        $date = date("Y/m/d");
        $loginarray = array("user_name" => $_POST["user_name"], "password" => $_POST["password"], "creation_date" => $date, "status" => "0", "mainbranch_id" => $recentinsertedid, "bapproval" => "0", "mbapproval" => "0");
        $info3 = $db->insert($loginarray, "login_credentials");
        if (count($info3) > 0) {
            if ($info[0] == 1) {
                $db->sendBack($_SERVER);
            } else {
                echo $info[0];
                echo $info[1];
                echo $info[2];
            }
        }
        ?>

    </body>
</html>
