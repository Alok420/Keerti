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
        $info = $db->insert($_POST, "branches");

        $recentinsertedid = $_SESSION["recentinsertedid"];
        date_default_timezone_set("Asia/Calcutta");
        $date = date("Y/m/d");
        $loginarray = array("user_name" => $_POST["user_name"], "password" => $_POST["password"], "creation_date" => $date, "status" => "1","bapproval"=>"1","mbapproval"=>"0", "branches_id" => $recentinsertedid);
        $info3 = $db->insert($loginarray, "login_credentials");
        if (count($info3) > 0) {
            $status = array();
            echo $info[0];
            $count1 = 0;
            $count0 = 0;
            if ($info[0] == 1) {
                $count1++;
            } else {
                $count0++;
            }
            array_push($status, $count0);
            array_push($status, $count1);
            array_push($status, $info);
            array_push($status, $info1);
            array_push($status, $info3);
            header("location:../Login_User.php?info=".json_encode($status));
        }
        ?>
        
    </body>
</html>
