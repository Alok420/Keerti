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
            $('#remuneration_details').click(function () {
            $('.slide5').append('<div class="formcontainer"><form class="form-horizontal" method="POST" action="../../controller/Student/EducationUpdate.php">                                                                 <div class="form-group">                                    <div class="form-group">                                        <label class="control-label col-sm-5" for="currentctc">Current CTC:</label>                                        <div class="col-sm-7">                                            <input type="text" class="form-control" id="currentctc" placeholder="Enter Current CTC" name="current_ctc">                                        </div>                                    </div>                                    <div class="form-group">                                        <label class="control-label col-sm-5" for="expectedctc">Expected CTC:</label>                                        <div class="col-sm-7">                                            <input type="text" class="form-control" id="expectedctc" placeholder="Enter Expected CTC" name="expected_ctc">                                        </div>                                    </div>                                    <input type="hidden" name="tbname" value="remuneration_details">                                    <div class="form-group">                                                <div class="col-sm-offset-5 col-sm-7">                                            <button type="submit" class="btn btn-default">Submit</button>                                        </div>                                    </div>                                </div>                            </form></div>');
            });
            });
        </script>    
        <link href="updateform.css" rel="stylesheet" type="text/css"/>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>     
        <style type="text/css"><?php include './css/Footer.css'; ?>        
        </style>    
    </head>    
    <body>
        <div class="container">
            <div class="slide5">
                <?php
                $loggedinid = $_SESSION["loggedinid"];
                $where = array("candidates_id" => $loggedinid);
                $data = $db->select("remuneration_details", "*", $where);
                if ($data->num_rows > 0) {
                    while ($one = $data->fetch_assoc()) {
                        ?>
                        <div class="formcontainer">
                            <form class="form-horizontal" method="POST" action="../../controller/Student/EducationUpdate.php">
                                <div style="text-align: center;"><?php echo $one["id"]; ?></div>
                                <input type="hidden" name="id" value="<?php echo $one["id"]; ?>">   
                                <div class="form-group">
                                    <div class="form-group">
                                        <label class="control-label col-sm-5" for="currentctc">Current CTC:</label>
                                        <div class="col-sm-7">
                                            <input value="<?php echo $one["current_ctc"];?>" type="text" class="form-control" id="currentctc" placeholder="Enter Current CTC" name="current_ctc">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-5" for="expectedctc">Expected CTC:</label>
                                        <div class="col-sm-7">
                                            <input value="<?php echo $one["expected_ctc"];?>" type="text" class="form-control" id="expectedctc" placeholder="Enter Expected CTC" name="expected_ctc">
                                        </div>
                                    </div>
                                    <input type="hidden" name="tbname" value="remuneration_details">

                                    <div class="form-group">        
                                        <div class="col-sm-offset-5 col-sm-7">
                                            <button type="submit" class="btn btn-default">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <?php }
                }
                ?>
                <button class="addbtn"  id="remuneration_details">Add more remuneration details</button>

            </div>

    </body>
</html>
