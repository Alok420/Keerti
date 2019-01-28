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
            $('#project_detail').click(function () {
            $('.slide5').append('<div class="formcontainer"> <form class="form-horizontal" method="POST" action="../../controller/Student/EducationUpdate.php">                                             <div class="form-group">                                            <label class="control-label col-sm-5" for="projectname">Project Name:</label>                                            <div class="col-sm-7">                                                <input type="text"class="form-control" id="projectname" placeholder="Enter Project Name" name="project_name">                                            </div>                                        </div>                                        <div class="form-group">                                            <label class="control-label col-sm-5" for="clientname">Client Name:</label>                                            <div class="col-sm-7">                                                          <input type="text" class="form-control" id="clientname" placeholder="Enter Client Name" name="client_name">                                            </div>                                        </div>                                        <div class="form-group">                                            <label class="control-label col-sm-5" for="projectduration">Project Duration:</label>                                            <div class="col-sm-7">                                                          <input type="text" class="form-control" id="projectduration" placeholder="Enter projectduration" name="project_duration">                                            </div>                                        </div>                                        <div class="form-group">                                            <label class="control-label col-sm-5" for="role">Role:</label>                                            <div class="col-sm-7">                                                          <input type="text" class="form-control" id="role" placeholder="Enter role" name="role">                                            </div>                                        </div>                                        <div class="form-group">                                            <label class="control-label col-sm-5" for="teamsize">Team Size:</label>                                            <div class="col-sm-7">                                                          <input type="text" class="form-control" id="teamsize" placeholder="Enter teamsize" name="team_size">                                            </div>                                        </div>                                        <div class="form-group">                                            <label class="control-label col-sm-5" for="shortdescription">Short description of project/role/skills used:</label>                                            <div class="col-sm-7">                                                          <input type="text"  class="form-control" id="shortdescription" placeholder="Enter Short Description of project/ role/ skills used" name="short_description">                                            </div>                                        </div>                                           <input type="hidden" name="tbname" value="project_detail">                                        <div class="form-group">                                                   <div class="col-sm-offset-5 col-sm-7">                                                <div class="checkbox">                                                    <label><input type="checkbox" name="remember"> Remember me</label>                                                </div>                                            </div>                                        </div>                                        <div class="form-group">                                                    <div class="col-sm-offset-5 col-sm-7">                                                <button type="submit" class="btn btn-default">Submit</button>                                            </div>                                        </div>                                    </form></form></div>');
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
                $data = $db->select("project_detail", "*", $where);
                if ($data->num_rows > 0) {
                    while ($one = $data->fetch_assoc()) {
                        ?>
                        <div class="formcontainer">
                            <form class="form-horizontal" method="POST" action="../../controller/Student/EducationUpdate.php">
                                <div style="text-align: center;"><?php echo $one["id"]; ?></div>
                                <input type="hidden" name="id" value="<?php echo $one["id"]; ?>">                      <div class="form-group">
                                    <label class="control-label col-sm-5" for="projectname">Project Name:</label>
                                    <div class="col-sm-7">
                                        <input type="text" value="<?php echo $one["project_name"]; ?>"  class="form-control" id="projectname" placeholder="Enter Project Name" name="project_name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-5" for="clientname">Client Name:</label>
                                    <div class="col-sm-7">          
                                        <input type="text" value="<?php echo $one["client_name"]; ?>" class="form-control" id="clientname" placeholder="Enter Client Name" name="client_name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-5" for="projectduration">Project Duration:</label>
                                    <div class="col-sm-7">          
                                        <input type="text" value="<?php echo $one["project_duration"]; ?>" class="form-control" id="projectduration" placeholder="Enter projectduration" name="project_duration">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-5" for="role">Role:</label>
                                    <div class="col-sm-7">          
                                        <input type="text"  value="<?php echo $one["role"]; ?>" class="form-control" id="role" placeholder="Enter role" name="role">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-5" for="teamsize">Team Size:</label>
                                    <div class="col-sm-7">          
                                        <input type="text" value="<?php echo $one["team_size"]; ?>" class="form-control" id="teamsize" placeholder="Enter teamsize" name="team_size">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-5" for="shortdescription">Short description of project/role/skills used:</label>
                                    <div class="col-sm-7">          
                                        <input type="text" value="<?php echo $one["short_description"]; ?>" class="form-control" id="shortdescription" placeholder="Enter Short Description of project/ role/ skills used" name="short_description">
                                    </div>
                                </div>
                                <input type="hidden" name="tbname" value="project_detail">

                                <div class="form-group">        
                                    <div class="col-sm-offset-5 col-sm-7">
                                        <div class="checkbox">
                                            <label><input type="checkbox" name="remember"> Remember me</label>
                                        </div>
                                    </div>
                                </div>
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
                <button class="addbtn"  id="project_detail">Add more project detail</button>

            </div>
    </body>
</html>