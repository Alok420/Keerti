
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
            $('#professional_experience_detail').click(function(){
            $('.slide4').append('<div class="formcontainer"><form class="form-horizontal" action="../../controller/Student/EducationUpdate.php" method="POST">                    <div class="form-group">                        <label class="control-label col-sm-5" for="employername">Employer name:</label>                        <div class="col-sm-7">                            <input type="text" class="form-control" id="employername" placeholder="Enter Employer Name" name="employer_name">                        </div>                    </div>                    <div class="form-group">                        <label class="control-label col-sm-5" for="employmenttype">Employment type(Full Time/ Part Time):</label>                        <div class="col-sm-7">                                      <input type="text" class="form-control" id="employmenttype" placeholder="Enter Employment Type" name="employment_type">                        </div>                    </div>                    <div class="form-group">                        <label class="control-label col-sm-5" for="tenor">Tenor:</label>                        <div class="col-sm-7">                                      <input type="text" class="form-control" id="tenor" placeholder="Tenor" name="tenor">                        </div>                    </div>                    <div class="form-group">                        <label class="control-label col-sm-5" for="designation">Designation:</label>                        <div class="col-sm-7">                                      <input type="text" class="form-control" id="designation" placeholder="Enter designation" name="designation">                        </div>                    </div>                    <div class="form-group">                        <label class="control-label col-sm-5" for="jobprofilerole">Job profile/role:</label>                        <div class="col-sm-7">                                      <input type="text" class="form-control" id="jobprofilerole" placeholder="Enter Job Profile Role" name="jobprofile_role">                        </div>                    </div>                    <div class="form-group">                        <label class="control-label col-sm-5" for="statuspreviouscurrentemployer">Status - Previous/Current employer:</label>                        <div class="col-sm-7">                                      <input type="text" class="form-control" id="statuspreviouscurrentemployer" placeholder="Status Previous Current Employer" name="status_previous_current_employer">                        </div>                    </div>                    <div class="form-group">                                <div class="col-sm-offset-5 col-sm-7">                            <div class="checkbox">                                <label><input type="checkbox" name="remember"> Remember me</label>                            </div>                        </div>                    </div>                    <input type="hidden" value="professional_experience_detail" name="tbname">                    <div class="form-group">                                <div class="col-sm-offset-5 col-sm-7">                            <button type="submit" class="btn btn-default">Submit</button></div></div></form></div>');
            }); });</script>    
        <link href="updateform.css" rel="stylesheet" type="text/css"/>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>     
        <style type="text/css"><?php include './css/Footer.css'; ?>        
        </style>    
    </head>    
    <body>
        <div class="container">
            <div class="slide4">
                <?php
                $loggedinid = $_SESSION["loggedinid"];
                $where = array("candidates_id" => $loggedinid);
                $data = $db->select("professional_experience_detail", "*", $where);
                if ($data->num_rows > 0) {
                    while ($one = $data->fetch_assoc()) {
                        ?>
                        <div class="formcontainer">
                            <form class="form-horizontal" method="POST" action="../../controller/Student/EducationUpdate.php">
                                <div style="text-align: center;"><?php echo $one["id"]; ?></div>
                                <input type="hidden" name="id" value="<?php echo $one["id"]; ?>">
                                <div class="form-group">
                                    <label class="control-label col-sm-5" for="employername">Employer name:</label>
                                    <div class="col-sm-7">
                                        <input value= "<?php echo $one["employer_name"]; ?>" type="text" class="form-control" id="employername" placeholder="Enter Employer Name" name="employer_name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-5" for="employmenttype">Employment type(Full Time/ Part Time):</label>
                                    <div class="col-sm-7">          
                                        <input value= "<?php echo $one["employment_type"]; ?>" type="text" class="form-control" id="employmenttype" placeholder="Enter Employment Type" name="employment_type">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-5" for="tenor">Tenor:</label>
                                    <div class="col-sm-7">          
                                        <input value= "<?php echo $one["tenor"]; ?>" type="text" class="form-control" id="tenor" placeholder="Tenor" name="tenor">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-5" for="designation">Designation:</label>
                                    <div class="col-sm-7">          
                                        <input value= "<?php echo $one["designation"]; ?>" type="text" class="form-control" id="designation" placeholder="Enter designation" name="designation">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-5" for="jobprofilerole">Job profile/role:</label>
                                    <div class="col-sm-7">          
                                        <input value= "<?php echo $one["jobprofile_role"]; ?>" type="text" class="form-control" id="jobprofilerole" placeholder="Enter Job Profile Role" name="jobprofile_role">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-5" for="statuspreviouscurrentemployer">Status - Previous/Current employer:</label>
                                    <div class="col-sm-7">          
                                        <input   type="text" class="form-control" id="statuspreviouscurrentemployer" placeholder="Status Previous Current Employer" value="<?php echo $one["status_previous_current_employer"]; ?>" name="status_previous_current_employer">
                                    </div>
                                </div>
                                <div class="form-group">        
                                    <div class="col-sm-offset-5 col-sm-7">
                                        <div class="checkbox">
                                            <label><input type="checkbox" name="remember"> Remember me</label>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" value="professional_experience_detail" name="tbname">
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
                <button style="position: fixed; background: green; color: WHITE; font-size: 20px; border-radius: 20PX; padding: 5PX; top: 50%; right: 0px; " id="professional_experience_detail">Add more professional_details</button>

            </div>
    </body>
</html>