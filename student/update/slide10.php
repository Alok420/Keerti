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
            $('#references_').click(function () {
            $('.slide10').append('<div class="formcontainer"> <form class="form-horizontal" method="POST" action="../../controller/Student/EducationUpdate.php">                        <div class="form-group">                            <label class="control-label col-sm-5" for="refname">Name:</label>                            <div class="col-sm-7">                                <input type="text" class="form-control" id="refname" placeholder="Enter Reference Name" name="ref_name">                            </div>                        </div>                        <div class="form-group">                            <label class="control-label col-sm-5" for="contactno">Contact Number:</label>                            <div class="col-sm-7">                                <input type="text" class="form-control" id="contactno" placeholder="Enter Contact Number" name="contact_no">                            </div>                        </div>                        <div class="form-group">                            <label class="control-label col-sm-5" for="refemail">Email:</label>                            <div class="col-sm-7">                                <input type="email" class="form-control" id="refemail" placeholder="Enter Email Id" name="ref_email">                            </div>                        </div>                        <div class="form-group">                            <label class="control-label col-sm-5" for="organization">Organization:</label>                            <div class="col-sm-7">                                <input type="text" class="form-control" id="organization" placeholder="Enter Organization" name="organization">                            </div>                       </div>                        <div class="form-group">                            <label class="control-label col-sm-5" for="refdesignation">Designation:</label>                            <div class="col-sm-7">                                <input type="text" class="form-control" id="refdesignation" placeholder="Enter Designation" name="refdesignation">                            </div>                       </div>                        <input type="hidden" name="tbname" value="references_">                        <div class="form-group">                                   <div class="col-sm-offset-5 col-sm-7">                                <button type="submit" class="btn btn-default">Submit</button>                            </div>                        </div>                    </form></div>');
            });
            });</script>    
        <link href="updateform.css" rel="stylesheet" type="text/css"/>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>     
        <style type="text/css"><?php include './css/Footer.css'; ?>        
        </style>    
    </head>    
    <body>
        <div class="container">
            <div class="slide10">
                <?php
                $loggedinid = $_SESSION["loggedinid"];
                $where = array("candidates_id" => $loggedinid);
                $data = $db->select("references_", "*", $where);
                if ($data->num_rows > 0) {
                    while ($one = $data->fetch_assoc()) {
                        ?>
                        <div class="formcontainer">
                            <form class="form-horizontal" method="POST" action="../../controller/Student/EducationUpdate.php">
                                <div style="text-align: center;"><?php echo $one["id"]; ?></div>
                                <input type="hidden" name="id" value="<?php echo $one["id"]; ?>">
                                <div class="form-group">
                                    <label class="control-label col-sm-5" for="refname">Name:</label>
                                    <div class="col-sm-7">
                                        <input type="text" value="<?php echo $one["ref_name"]; ?>" class="form-control" id="refname" placeholder="Enter Reference Name" name="ref_name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-5" for="contactno">Contact Number:</label>
                                    <div class="col-sm-7">
                                        <input type="text" value="<?php echo $one["contact_no"]; ?>" class="form-control" id="contactno" placeholder="Enter Contact Number" name="contact_no">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-5" for="refemail">Email:</label>
                                    <div class="col-sm-7">
                                        <input type="email" value="<?php echo $one["ref_email"]; ?>" class="form-control" id="refemail" placeholder="Enter Email Id" name="ref_email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-5" for="organization">Organization:</label>
                                    <div class="col-sm-7">
                                        <input value="<?php echo $one["organization"]; ?>" type="text" class="form-control" id="organization" placeholder="Enter Organization" name="organization">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-5" for="refdesignation">Designation:</label>
                                    <div class="col-sm-7">
                                        <input type="text" value="<?php echo $one["refdesignation"]; ?>" class="form-control" id="refdesignation" placeholder="Enter Designation" name="refdesignation">
                                    </div>
                                </div>
                                <input type="hidden" name="tbname" value="references_">

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
                <button class="addbtn"  id="references_">Add more references</button>

            </div>
    </body>
</html>
