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
            $('#job_preference').click(function () {
            $('.slide6').append('<div class="formcontainer">  <form class="form-horizontal" method="POST" action="../../controller/Student/EducationUpdate.php">                                                                <div class="form-group">                                    <label class="control-label col-sm-5" for="jobtype">Job Type:</label>                                    <div class="col-sm-7">                                        <!--<input type="text" class="form-control" id="projectname" placeholder="Enter Project Name" name="project_name">-->                                        <select name="job_type">                                            <option>Permanent</option>                                            <option>Contractual</option>                                            <option>Project Based</option>                                        </select>                                    </div>                                </div>                                <div class="form-group">                                    <label class="control-label col-sm-5" for="employmenttype">Employment Type:</label>                                    <div class="col-sm-7">                                        <!--<input type="text" class="form-control" id="projectname" placeholder="Enter Project Name" name="project_name">-->                                        <select name="employment_type">                                            <option>Full Time</option>                                            <option>Part Time</option>                                            <option>Both</option>                                        </select>                                    </div>                                </div>                                <div class="form-group">                                    <label class="control-label col-sm-5" for="workshift">Willing to work in Shifts:</label>                                    <div class="col-sm-7">                                        <select name="will_to_work_in_shifts">                                            <option>Yes</option>                                            <option>No</option>                                        </select>                                    </div>                                </div>                                <div class="form-group">                                    <label class="control-label col-sm-5" for="relocate">willing to relocate:</label>                                    <div class="col-sm-7">                                                  <input type="text" class="form-control" id="relocate" placeholder="Enter willng to relocate" name="relocate">                                    </div>                                </div>                                <input type="hidden" name="tbname" value="job_preference">                                <div class="form-group">                                           <div class="col-sm-offset-5 col-sm-7">                                        <button type="submit" class="btn btn-default">Submit</button>                                    </div>                                </div>                            </form></div>');         
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
                $data = $db->select("job_preference", "*", $where);
                if ($data->num_rows > 0) {
                    while ($one = $data->fetch_assoc()) {
                        ?>
                        <div class="formcontainer">
                            <form class="form-horizontal" method="POST" action="../../controller/Student/EducationUpdate.php">
                                <div style="text-align: center;"><?php echo $one["id"]; ?></div>
                                <input type="hidden" name="id" value="<?php echo $one["id"]; ?>">     

                                <div class="form-group">
                                    <label class="control-label col-sm-5" for="jobtype">Job Type:</label>
                                    <div class="col-sm-7">
                                        <!--<input type="text" class="form-control" id="projectname" placeholder="Enter Project Name" name="project_name">-->
                                        <select name="job_type">
                                            <option><?php echo $one["job_type"]; ?></option>
                                            <option>Permanent</option>
                                            <option>Contractual</option>
                                            <option>Project Based</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-5" for="employmenttype">Employment Type:</label>
                                    <div class="col-sm-7">
                                        <!--<input type="text" class="form-control" id="projectname" placeholder="Enter Project Name" name="project_name">-->
                                        <select name="employment_type">
                                            <option><?php echo $one["employment_type"]; ?></option>
                                            <option>Full Time</option>
                                            <option>Part Time</option>
                                            <option>Both</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-5" for="workshift">Willing to work in Shifts:</label>
                                    <div class="col-sm-7">
                                        <select name="will_to_work_in_shifts">
                                            <option><?php echo $one["will_to_work_in_shifts"]; ?></option>
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-5" for="relocate">willing to relocate:</label>
                                    <div class="col-sm-7">          
                                        <input type="text" value="<?php echo $one["relocate"];?>" class="form-control" id="relocate" placeholder="Enter willng to relocate" name="relocate">
                                    </div>

                                </div>
                                <input type="hidden" name="tbname" value="job_preference">

                                <div class="form-group">        
                                    <div class="col-sm-offset-5 col-sm-7">
                                        <button type="submit" class="btn btn-default">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div> 
                    <?php }
                } ?>
                <button class="addbtn" id="job_preference">Add more job_preference</button>

            </div>

    </body>

</html>