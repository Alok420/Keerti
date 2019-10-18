<?php session_start();?>
<!DOCTYPE html>
<?php include '../LoginCheck.php'; ?>
<?php include '../../Config/ConnectionObjectOriented.php'; ?>
<?php include '../../Config/DB.php'; $db=new DB($conn);?>

<html>
    <head>
        <?php
        include '../../Common/CDN.php';
        ?>
        <link href="updateform.css" rel="stylesheet" type="text/css"/> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
            $(document).ready(function (){
            $('#professional_details').click(function(){
            $('.slide2').append('<div class="formcontainer">  <form class="form-horizontal" method="POST" action="../../controller/Student/EducationUpdate.php">                                                     <div class="form-group">                                    <label class="control-label col-sm-5" for="industryyoubelongto">Industry you belong to:</label>                                    <div class="col-sm-7">                                        <input type="text"  class="form-control" id="industryyoubelongto" placeholder="Industry You Belong To" name="industry_you_belong_to">                                    </div>                                </div>                                <div class="form-group">                                    <label class="control-label col-sm-5" for="designation">Current Designation:</label>                                    <div class="col-sm-7">                                                  <input type="text" class="form-control" id="designation" placeholder="Enter Your Current Designation" name="designation">                                    </div>                                </div>                                <div class="form-group">                                            <div class="col-sm-offset-5 col-sm-7">                                        <div class="checkbox">                                                                                   </div>                                    </div>                                </div>                                <input type="hidden" name="tbname" value="professional_details">                                <div class="form-group">                                            <div class="col-sm-offset-5 col-sm-7">                                        <button type="submit" class="btn btn-default">Submit</button>                                    </div>                                </div>                            </form></div>');
            });
            });
        </script>
    </head>
    <body>
        <div class="container">
            <div class="slide2">
                <?php
                $loggedinid=$_SESSION["loggedinid"];
                $where = array("candidates_id" => $loggedinid);
                $data = $db->select("professional_details", "*", $where);
                if ($data->num_rows > 0) {
                    while ($one = $data->fetch_assoc()) {
                        ?>
                        <div class="formcontainer">
                            <form class="form-horizontal" method="POST" action="../../controller/Student/EducationUpdate.php">
                                <div style="text-align: center;"><?php echo $one["id"]; ?></div>
                                <input type="hidden" name="id" value="<?php echo $one["id"]; ?>">
                                <div class="form-group">
                                    <label class="control-label col-sm-5" for="industryyoubelongto">Industry you belong to:</label>
                                    <div class="col-sm-7">
                                        <input type="text" value="<?php echo $one["industry_you_belong_to"]; ?>" class="form-control" id="industryyoubelongto" placeholder="Industry You Belong To" name="industry_you_belong_to">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-5" for="designation">Current Designation:</label>
                                    <div class="col-sm-7">          
                                        <input value="<?php echo $one["designation"]; ?>" type="text" class="form-control" id="designation" placeholder="Enter Your Current Designation" name="designation">
                                    </div>
                                </div>
                                <div class="form-group">        
                                    <div class="col-sm-offset-5 col-sm-7">
                                        <div class="checkbox">
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="tbname" value="professional_details">
                                <div class="form-group">        
                                    <div class="col-sm-offset-5 col-sm-7">
                                        <button type="submit" class="btn btn-default">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div> 
                    <?php }
                } ?>
            </div>
            <hr>
            <button style="position: fixed; background: green; color: WHITE; font-size: 20px; border-radius: 20PX; padding: 5PX; top: 50%; right: 0px; " id="professional_details">Add more professional_details</button>

        </div>
    </body>
</html>
