<?php session_start();?>
<!DOCTYPE html>
<?php include '../LoginCheck.php'; ?>
<?php include '../../Config/ConnectionObjectOriented.php'; ?>
<?php
include '../../Config/DB.php';
$db = new DB($conn);
?>
<html>
    <head>

        <?php
        include '../../Common/CDN.php';
        ?>
        <link href="updateform.css" rel="stylesheet" type="text/css"/> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
            $(document).ready(function () {
            $('#language_known').click(function () {
            $('.slide6').append('<div class="formcontainer"> <form class="form-horizontal" method="POST" action="../../controller/Student/EducationUpdate.php">                                                         <div class="form-group">                            <div class="row" id="row1">                                <div class="col-sm-5">      <input class="form-control" type="text" name="user_language" placeholder="Language name"></div>                                <label class="checkbox-inline">                                    <input type="checkbox" value="1" name="user_read">Read                                </label>                                <label class="checkbox-inline">                                    <input type="checkbox" value="1" name="user_write">Write                                </label>                                <label class="checkbox-inline">                                    <input type="checkbox" value="1" name="user_speak">Speak                                </label>                            </div><div class="col-sm-offset-5 col-sm-7 ">                                <input type="submit" value="Submit" class="btn btn-default">                            </div>                        </div>   <input type="hidden" name="tbname" value="language_known">                 </form></div>');
            });
            });</script>    
        <link href="updateform.css" rel="stylesheet" type="text/css"/>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>     
        <style type="text/css"><?php include './css/Footer.css'; ?>        
        </style>    
    </head>    
    <body>
        <div class="container">
            <div class="slide6">
                <?php
                $loggedinid = $_SESSION["loggedinid"];
                $where = array("candidates_id" => $loggedinid);
                $data = $db->select("language_known", "*", $where);
                if ($data->num_rows > 0) {
                    while ($one = $data->fetch_assoc()) {
                        $read = $write = $speak = "";
                        if ($one["user_read"] == 1) {
                            $read = "checked";
                        } else {
                            $read = "";
                        }
                        if ($one["user_write"] == 1) {
                            $write = "checked";
                        } else {
                            $write = "";
                        }
                        if ($one["user_speak"] == 1) {
                            $speak = "checked";
                        } else {
                            $speak = "";
                        }
                        ?>
                        <div class="formcontainer">
                            <form class="form-horizontal" method="POST" action="../../controller/Student/EducationUpdate.php">
                                <div style="text-align: center;"><?php echo $one["id"]; ?></div>
                                <input type="hidden" name="id" value="<?php echo $one["id"]; ?>">     
                                <div class="form-group">
                                    <div class="row" id="row1">
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="user_language" value="<?php echo $one["user_language"]; ?>">
                                        </div>

                                        <label class="checkbox-inline">
                                            <input type="checkbox" value="1" name="user_read" <?php echo $read; ?>>Read
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" value="1" name="user_write" <?php echo $write; ?>>Write
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" value="1" name="user_speak" <?php echo $speak; ?>>Speak
                                        </label>

                                    </div> 
                                    <input type="hidden" name="tbname" value="language_known">

                                    <div class="col-sm-offset-5 col-sm-7 ">
                                        <input type="submit" value="Submit" class="btn btn-default">
                                    </div>
                                </div>
                            </form>


                        </div> 
    <?php
    }
}
?>
                <button class="addbtn" id="language_known">Add more language_known</button>
            </div>
        </div>
    </body>
</html>