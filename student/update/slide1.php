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
            $(document).ready(function (){
            $('#education').click(function(){
            $('.slide1').append('<div class="formcontainer"><form class="form-horizontal" action="../../controller/Student/EducationUpdate.php">                    <div class="form-group">                        <label class="control-label col-sm-5" for="basicqualification">Basic Qualification:</label>                        <div class="col-sm-7">                            <input type="text" class="form-control" id="basicqualification" placeholder="Enter Basic Qualification" name="basic_qualification">                        </div>                    </div>                    <div class="form-group">                        <label class="control-label col-sm-5" for="time">Full Time/ Part Time:</label>                        <div class="col-sm-7">                                      <input type="text" class="form-control" id="fulltime/parttime" placeholder="Enter Fulltime/Parttime" name="fulltime/parttime">                        </div>                    </div>                    <div class="form-group">                        <label class="control-label col-sm-5" for="specialization">Specialization:</label>                        <div class="col-sm-7">                                      <input type="text" class="form-control" id="specialization" placeholder="Enter specialization" name="specialization">                        </div>                    </div>                    <div class="form-group">                        <label class="control-label col-sm-5" for="university/board/institute">University/Board:</label>                        <div class="col-sm-7">                                      <input type="text" class="form-control" id="university/board/institute" placeholder="Enter university/board/institute" name="university/board/institute">                        </div>                    </div>                    <div class="form-group">                        <label class="control-label col-sm-5" for="yearofpassing">Year Of Passing:</label>                        <div class="col-sm-7">                                      <input type="text" class="form-control" id="yearofpassing" placeholder="Enter Year Of passing" name="year_of_passing">                        </div>                    </div>                    <input type="hidden" name="tbname" value="education">                    <div class="form-group">                                <div class="col-sm-offset-5 col-sm-7">                            <button type="submit" class="btn btn-default">Submit</button>                        </div>                    </div>                </form></div>'); });
            });
        </script>
    </head>
    <body>
        <div class="container">
            <div class="slide1">
                <?php
                $loggedinid = $_SESSION["loggedinid"];
                $where = array("candidates_id" => $loggedinid);
                $data = $db->select("education", "*", $where);
                if ($data->num_rows > 0) {
                    while ($one = $data->fetch_assoc()) {
                        ?>
                        <div class="formcontainer">
                            <form class="form-horizontal" method="POST" action="../../controller/Student/EducationUpdate.php">
                                 <div style="text-align: center;"><?php echo $one["id"]; ?></div>
                                <input type="hidden" name="id" value="<?php echo $one["id"]; ?>">
                                <div class="form-group">
                                    <label class="control-label col-sm-5" for="basicqualification">Basic Qualification:</label>
                                    <div class="col-sm-7">
                                        <input type="text" value="<?php echo $one["basic_qualification"]; ?>" class="form-control" id="basicqualification" placeholder="Enter Basic Qualification" name="basic_qualification">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-5" for="time">Full Time/ Part Time:</label>
                                    <div class="col-sm-7">          
                                        <input value="<?php echo $one["fulltime_parttime"]; ?>" type="text" class="form-control" id="fulltime/parttime" placeholder="Enter Fulltime/Parttime" name="fulltime_parttime">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-5" for="specialization">Specialization:</label>
                                    <div class="col-sm-7">          
                                        <input type="text" value="<?php echo $one["specialization"];?>" class="form-control" id="specialization" placeholder="Enter specialization" name="specialization">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-5" for="university/board/institute">University/Board:</label>
                                    <div class="col-sm-7">          
                                        <input type="text" value="<?php echo $one["university_board_institute"]; ?>" class="form-control" id="university/board/institute" placeholder="Enter university/board/institute" name="university_board_institute">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-5" for="yearofpassing">Year Of Passing:</label>
                                    <div class="col-sm-7">          
                                        <input type="text" value="<?php echo $one["year_of_passing"]; ?>" class="form-control" id="yearofpassing" placeholder="Enter Year Of passing" name="year_of_passing">
                                    </div>
                                </div>
                                <input type="hidden" name="tbname" value="education">
                                <div class="form-group">        
                                    <div class="col-sm-offset-5 col-sm-7">
                                        <button type="submit" class="btn btn-default">Submit</button>
                                    </div>
                                </div>
                                <button type="button" style="position: fixed; background: green; color: WHITE; font-size: 20px; border-radius: 20PX; padding: 5PX; top: 50%; right: 0px; " id="education">Add more education fields</button>

                            </form>
                            </div>
                            <?php
                            }
                        }
                        ?>
                    </div> 
                </div>
                </body>
                </html>