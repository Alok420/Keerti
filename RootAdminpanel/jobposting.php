<?php session_start(); ?>
<?php include './LoginCheck.php'; ?> 
<!DOCTYPE html>

<html>
    <head>
        <?php
        include '../Common/CDN.php';
        include '../Config/DB.php';
        include '../Config/ConnectionObjectOriented.php';
        ?>   
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
<?php include './RootAdmin_page.css'; ?>
            #jobpostingform{
                width: 100%;
                padding: 0px 20px!important;
            }
            .form-group{
                width: 100%;
            }
            .allbranchContainer h2{
                text-align:center;
                font-size:35px;
                letter-spacing:2px;
                padding:10px;
                font-family: sans-serif;
                font-weight: bold;
            }
            
            .allbranchContainer label{
                font-size: 15px;
                letter-spacing: 2px;
                font-family: sans-serif;
                
            }
            .allbranchContainer textarea{
                resize:none;
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

        <?php include './RootAdmin_page_header.php'; ?>
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
                    <?php include './RootAdmin_page_sidebar.php'; ?>
                </div>
                <div class="col-sm-9 maincolumn">
                    <div id="jobpostingform">
                        <h2 style="text-align:center;">Job Posting Form</h2>
                        <hr>
                        <div style="font-weight: bold; color: green;">
                            <?php
                            if (isset($_REQUEST["info"])) {
                                echo $_REQUEST["info"];
                            }
                            ?>
                        </div>
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
                                        <option value="<?php echo $emp["id"] ?>"><?php echo $emp["Organization_Name"] ?></option>
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
                                <input type="text" class="form-control datepicker" id="job_posted_on" placeholder="Enter Job Posted On" name="job_posted_on">
                            </div>
                            <div class="form-group">
                                <label for="vacancyvalidtill">Vacancy Valid Till:</label>
                                <input type="text" class="form-control datepicker" id="vacancy_valid_till" placeholder="Enter Job Id" name="vacancy_valid_till">
                            </div>
                            <div class="form-group">
                                <label for="packagerangeoffered">Package Ranged Offered (Yearly basis) </label>
                                <select id="Package_Ranged_Offered" name="Package_Ranged_Offered" class="form-control salary" >
                                    <option value="1"><1Lac</option>
                                    <script>
                                        $(document).ready(function () {
                                            for (var i = 1; i <= 100; i++) {
                                                $(".salary").append("<option value='" + i + "'>" + i + "Lac</option>");
                                            }
                                        });

                                    </script>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="experiencerequired">Number of Years Experience:</label>
                                <input type="text" class="form-control" id="experiencerequired" placeholder="Number of Years Experience" name="experience_required">
                            </div>
                            <div class="form-group">
                                <label for="jobdescription">Job Description:</label>
                                <textarea class="form-control" rows="5" id="comment" name="jobdescription"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="desiredskillset">Desired Skill Set:</label>
                                <input type="text" class="form-control" id="desiredskillset" placeholder="Enter Desired Skill Set" name="desired_skill_set">
                            </div>

                            <button type="submit" class="btn btn-lg btn-default">Submit</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </body>
</html>
