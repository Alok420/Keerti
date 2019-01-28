<!DOCTYPE html>
<?php
include './LoginCheck.php';
?> 
<html>
    <head>
        <?php
        include '../Common/CDN.php';
        include '../Config/DB.php';
        include '../Config/ConnectionObjectOriented.php';
        ?>   
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
<?php include './BranchAdmin_page.css'; ?>
            #jobpostingform {
                padding: 20px 20px!important;
   
            }
            .allbranchContainer h2{
                text-align:center;
                font-size:35px;
                letter-spacing:2px;
                padding:10px;
                font-family: sans-serif;
                font-weight: bold;
                text-shadow: 2px 2px lightgray;
            }
            .allbranchContainer label{
                font-size: 15px;
                letter-spacing: 2px;
                font-family: sans-serif;
                
            }
            .allbranchContainer .form-control{
                border:none;
                border-bottom: thin solid black;
                border-radius: 0px;
                background-color: transparent;
                font-size: 15px;
                box-shadow: none;
                letter-spacing: 2px;
            }
            .allbranchContainer .form-control:hover{
                border-bottom: thin solid black;
                box-shadow: none;
            }
            .allbranchContainer .form-control:active{
                border-bottom: thin solid black;
                box-shadow: none;
            }
            .allbranchContainer .form-control:focus{
                border-bottom: thin solid black;
                box-shadow: none;
            }
            .allbranchContainer .form-control:visited{
                border-bottom: thin solid black;
                box-shadow: none;
            }
            
        </style>
    </head>
    <body>

        <?php include './BranchAdmin_page_header.php'; ?>
        <?php
        $id = $_SESSION["loggedinid"];
        $type = $_SESSION["loggedintype"];
//        if ($type == "candidate") {
//            
//        } else if ($type == "branch") {
//            
//        } else if ($type == "mainbranch") {
//            
//        } else if ($type == "employer") {
//            
//        }
//        
        ?>
        <div class="container-fluid allbranchContainer">
            <div class="row">
                <div class="col-sm-3 sidebarcolumn">
                    <?php include './BranchAdmin_page_sidebar.php'; ?>
                </div>
                <div class="col-sm-9 maincolumn">
                    <div class="container">
                        <div id="jobpostingform">
                            <h2 style="text-align:center;">Job Posting Form</h2>
                            <hr>
                            <form action="../controller/JobPostController.php" method="POST">
                                <input type="hidden" name="postedby" value="<?php echo $type; ?>">
                                <div class="form-group">
                                    <label for="job_title">Select company</label>
                                    <select name="employers_id" class="form-control">
                                        <?php
                                        $db = new DB($conn);
                                        $emplist = $db->select("employers");
                                        while ($emp = $emplist->fetch_assoc()) {
                                            ?>
                                        <option value="<?php echo $emp["id"]?>"><?php echo $emp["Organization_Name"]?></option>
                                            <?php
                                        }
                                        ?>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="job_title">Job Title</label>
                                    <input type="text" class="form-control" id="job_title" placeholder="Software developer" name="job_title">
                                </div>
                                <div class="form-group">
                                    <label for="vacancy">No. of Posting Vacancy:</label>
                                    <input type="text" class="form-control" id="no_of_posting_vacancy" placeholder="Enter No. of Posting vacancy" name="no_of_posting_vacancy">
                                </div>
                                <div class="form-group">
                                    <label for="jobpostedon">Job Posted On:</label>
                                    <input type="date" class="form-control" id="job_posted_on" placeholder="Enter Job Posted On" name="job_posted_on">
                                </div>
                                <div class="form-group">
                                    <label for="vacancyvalidtill">Vacancy Valid Till:</label>
                                    <input type="date" class="form-control" id="vacancy_valid_till" placeholder="Enter Job Id" name="vacancy_valid_till">
                                </div>
                                <div class="form-group">
                                    <label for="packagerangeoffered">Package Ranged Offered (Yearly basis): Example(10000 to 50000) </label>
                                    <input type="text" class="form-control" id="packagerangeoffered" placeholder="10000 to 50000" name="Package_Ranged_Offered">
                                </div>
                                <div class="form-group">
                                    <label for="experiencerequired">Experience Required:</label>
                                    <input type="text" class="form-control" id="experiencerequired" placeholder="Enter Experience Required" name="experience_required">
                                </div>
                                <div class="form-group">
                                    <label for="jobdescription">Job Description:</label>
                                    <textarea class="form-control" rows="5" id="comment" name="jobdescription"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="desiredskillset">Desired Skill Set:</label>
                                    <input type="text" class="form-control" id="desiredskillset" placeholder="Enter Desired Skill Set" name="desired_skill_set">
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" name="remember"> Remember me</label>
                                </div>
                                <button type="submit" class="btn btn-lg btn-default">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
