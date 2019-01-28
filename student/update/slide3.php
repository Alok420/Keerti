<html>
    <!DOCTYPE html>
    <?php include '../LoginCheck.php'; ?>
    <?php include '../../Config/ConnectionObjectOriented.php'; ?>
    <?php
    include '../../Config/DB.php';
    $db = new DB($conn);
    ?>
    <head>
        <?php
        include '../../Common/CDN.php';
        ?>
        <link href="updateform.css" rel="stylesheet" type="text/css"/> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
            $(document).ready(function (){
            $('#skill_Set').click(function(){
            $('.slide3').append('<div class="formcontainer">   <form class="form-horizontal" action="/action_page.php">            <div class="form-group">        <label class="control-label col-sm-5" for="skill">Skill:</label>        <div class="col-sm-7">        <input type="text" class="form-control" id="skill" placeholder="Enter Basic Skill" name="skill">            </div>            </div>            <div class="form-group">            <label class="control-label col-sm-5" for="yearexperience">Number of years of experience:</label>        <div class="col-sm-7">                  <input type="text" class="form-control" id="yearexperience" placeholder="Enter Number Of Year Of Experience" name="year_experience">            </div>            </div>            <div class="form-group">            <label class="control-label col-sm-5" for="skilllastusedyear/month">Skill last used Year/Month:</label>        <div class="col-sm-7">                  <input type="text" class="form-control" id="skilllastusedyear/month" placeholder="Enter Skill Last Used Year/Month" name="skill_last_used_year/month">            </div>            </div>            <div class="form-group">                    <div class="col-sm-offset-5 col-sm-7">            <div class="checkbox">        <label><input type="checkbox" name="remember"> Remember me</label>        </div>        </div>        <input type="hidden" value="skill_Set">        </div>        <div class="form-group">                    <div class="col-sm-offset-5 col-sm-7">            <button type="submit" class="btn btn-default">Submit</button>            </div>            </div>        </form></div>');
            }); });
        </script>
        <link href="updateform.css" rel="stylesheet" type="text/css"/> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <style type="text/css">

<?php include './css/Footer.css'; ?>
        </style>
    </head>
    <body>
        <div class="container">
            <div class="slide3">
                <?php
                $loggedinid = $_SESSION["loggedinid"];
                $where = array("candidates_id" => $loggedinid);
                $data = $db->select("skill_Set", "*", $where);
                if ($data->num_rows > 0) {
                    while ($one = $data->fetch_assoc()) {
                        ?>
                        <div class="formcontainer">
                            <form class="form-horizontal" method="POST" action="../../controller/Student/EducationUpdate.php">
                                <div style="text-align: center;"><?php echo $one["id"]; ?></div>
                                <input type="hidden" name="id" value="<?php echo $one["id"]; ?>">
                                <div class="form-group">
                                    <label class="control-label col-sm-5" for="skill">Skill:</label>
                                    <div class="col-sm-7">
                                        <input type="text" value="<?php echo $one["skill"];  ?>" class="form-control" id="skill" placeholder="Enter Basic Skill" name="skill">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-5" for="yearexperience">Number of years of experience:</label>
                                    <div class="col-sm-7">          
                                        <input type="text" value=" <?php echo $one["year_experience"];  ?>" class="form-control" id="yearexperience" placeholder="Enter Number Of Year Of Experience" name="year_experience">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-5" for="skilllastusedyear/month">Skill last used Year/Month:</label>
                                    <div class="col-sm-7">          
                                        <input type="text" value="<?php echo  $one["skill_last_used_year_month"];  ?>" class="form-control" id="skilllastusedyear/month" placeholder="Enter Skill Last Used Year/Month" name="skill_last_used_year/month">
                                    </div>
                                </div>
                                <div class="form-group">        
                                    <div class="col-sm-offset-5 col-sm-7">
                                        <div class="checkbox">
                                            <label><input type="checkbox" name="remember"> Remember me</label>
                                        </div>
                                    </div>
                                    <input type="hidden" value="skill_Set" value="<?php  echo  $one["candidates_id"]; ?>">
                                </div>
                                <div class="form-group">        
                                    <div class="col-sm-offset-5 col-sm-7">
                                        <button type="submit" class="btn btn-default">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div> 
                    <?php }
                }
                ?>
                <button style="position: fixed; background: green; color: WHITE; font-size: 20px; border-radius: 20PX; padding: 5PX; top: 50%; right: 0px; " id="skill_Set">Add more professional_details</button>

            </div>

    </body>
</html>