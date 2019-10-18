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
            $('#upload_other_data').click(function () {
            $('.slide5').append('<div class="formcontainer"><form class="form-horizontal" method="POST" action="../../controller/Student/UploadOtherData.php">                                                               <div class="form-group">                                                                        <label class="control-label col-sm-5" for="uploadletter">Upload Cover Letter:</label>                                    <div class="col-sm-7">                                        <input type="file" id="upload_letter" name="upload_letter">                                    </div>                                </div>                                <div class="form-group">                                    <label class="control-label col-sm-5" for="uploadresume">Upload Resume:</label>                                    <div class="col-sm-7">                                        <input type="file" id="upload_resume" name="upload_resume">                                    </div>                                </div>                                <div class="form-group">                                    <label class="control-label col-sm-5" for="selfintroduction">Upload Upto 2 mint Video of self introduction:</label>                                    <div class="col-sm-7">                                        <input type="file" id="self_introduction" name="self_introduction">                                    </div>                                </div>                                <div class="form-group">                                    <label class="control-label col-sm-5" for="profiletitle">Profile title/Summary in Short:</label>                                    <div class="col-sm-7">                                                  <textarea class="form-control" rows="5" id="profiletitle" style="resize:none;"></textarea>                                    </div>                                </div>                                <input type="hidden" name="tbname" value="upload_other_data">                                <div class="form-group">                                            <div class="col-sm-offset-5 col-sm-7">                                        <button type="submit" class="btn btn-default">Submit</button>                                    </div>                                </div>                            </form> </div>');
            });
            });</script>    
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
                $data = $db->select("upload_other_data", "*", $where);
                if ($data->num_rows > 0) {
                    while ($one = $data->fetch_assoc()) {
                        ?>
                        <div class="formcontainer">
                            <form class="form-horizontal" method="POST" action="../../controller/Student/UploadOtherData.php" enctype="multipart/form-data">
                                <div style="text-align: center;"><?php echo $one["id"]; ?></div>
                                <input type="hidden" name="id" value="<?php echo $one["id"]; ?>">
                                <div class="form-group">
                                    <img src="../../images/student/<?php echo $one["upload_letter"]; ?>" height="50" width="50">
                                    <br>
                                    <label class="control-label col-sm-5" for="uploadletter">Upload Cover Letter:</label>
                                    <div class="col-sm-7">
                                        <input type="file" id="upload_letter" name="upload_letter">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <img src="../../images/student/<?php echo $one["upload_resume"]; ?>" height="50" width="50">
                                    <br>
                                    <label class="control-label col-sm-5" for="uploadresume">Upload Resume:</label>
                                    <div class="col-sm-7">
                                        <input type="file" id="upload_resume" name="upload_resume">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <img src="../../images/student/<?php echo $one["upload_resume"]; ?>" height="50" width="50"><br>
                                    <label class="control-label col-sm-5" for="selfintroduction">Upload Upto 2 mint Video of self introduction:</label>
                                    <div class="col-sm-7">
                                        <input type="file" id="self_introduction" name="self_introduction">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-5" for="profiletitle">Profile title/Summary in Short:</label>
                                    <div class="col-sm-7">          
                                        <textarea class="form-control" name="profiletitle" rows="5" id="profiletitle" style="resize:none;"><?php echo $one["profiletitle"]; ?></textarea>
                                    </div>
                                </div>

                                <input type="hidden" name="tbname" value="upload_other_data">

                                <div class="form-group">        
                                    <div class="col-sm-offset-5 col-sm-7">
                                        <button type="submit" class="btn btn-default">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div> 
                        <?php
                    }
                }
                ?>
                <button class="addbtn"  id="upload_other_data">Add more upload other data</button>
            </div>
        </div>
    </body>
</html>
