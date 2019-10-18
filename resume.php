<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Resume</title>
        <?php
        $loggedintype = array("branch", "employer");
        include './UserLoginCheck.php';
        include './Config/ConnectionObjectOriented.php';
        include './Config/DB.php';
        include './Common/CDN.php';
        include './Common/colors.php';
        $db = new DB($conn);
        if (!isset($_GET["candidate"])) {
            header("location:Employee_page.php");
        } else
            $where = array("id" => $_GET["candidate"]);
        $data = $db->select("candidates", "*", $where);
        $candidates = $data->fetch_assoc();
        if ($candidates["resume_approval"] != 0 || $_SESSION["loggedintype"] == "branch") {
            $where = array("candidates_id" => $_GET["candidate"]);
            $upload_other_data = $db->select("upload_other_data ", "*", $where);
            ?>
            <script>
                function applyNow(requestedBy, date_, candidates_id, employers_id, employerapproval, branchapproval) {
                    $.post("controller/hire.php",
                            {
                                candidates_id: "" + candidates_id,
                                employers_id: "" + employers_id,
                                date_: "" + date_,
                                employerapproval: "" + employerapproval,
                                branchapproval: "" + branchapproval,
                                requestedBy: "" + requestedBy
                            },
                            function (data, status) {
                                if (status == "success") {
                                    alert("Request Sent");
                                }
                            });
                }

            </script>
            <link rel="stylesheet" href="resume/resume.css">
            <link rel="stylesheet" media="mediatype and|not|only (expressions)">
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
            <style>
    <?php include './css/Homepage.css'; ?>
    <?php include './css/Footer.css'; ?>
            </style>
        </head>
        <body>
            <?php include './Common/Header.php'; ?>
            <div class="container">
                <div class="resume">
                    <div class="flex-container">
                        <div class="flex-box">
                            <img src="images/profile/<?php echo $candidates["dp"]; ?>" alt=""/>
                            <h2><?php echo $candidates["fname"]; ?> <?php echo $candidates["lname"]; ?></h2>
                        </div>
                        <?php
                        $others_data = $db->select("upload_other_data", "*", array("candidates_id" => $_GET["candidate"]));
                        $od = $others_data->fetch_assoc();
                        ?>
                        <div class="flex-box" >
                            <?php
                            if (!empty($od["self_introduction"])) {
                                ?>
                                <video controls autoplay style="border-radius: 0px; background-color: black; height: 160px; padding: 0px; margin: 0px; width: 300px;">
                                    <source src="images/student/<?php echo $od["self_introduction"]; ?>" type="video/mp4">
                                    <!--Your browser does not support the video tag.-->
                                </video>

                                <h2 style="top:-30px; position:relative;">Intro video</h2>
                                <?php
                            } else {
                                echo '<span style="color:white;">Self intro video not uploaded</span>';
                            }
                            ?>
                        </div>

                        <div class="flex-box">
                            <?php
                            if (!empty($od["upload_resume"])) {
                                ?>
                                <a href="images/student/<?php echo $od["upload_resume"]; ?>"> <embed src="images/ResumeFormate.jpg" style="border-radius: 0px; height: 132px;"/></a>
                                <a href="images/student/<?php echo $od["upload_resume"]; ?>"><h2 style="top:-20px; position:relative;">Resume</h2></a>
                                <?php
                            } else {
                                echo '<span style="color:white;">Resume not uploaded</span>';
                            }
                            ?>

                        </div>  
                    </div>
                    <div class="row profilepage">
                        <div class="col-sm-12 profile">
                            <div class="btn-profile">
                                <a href="EmployerManagement/chatpage.php"><button class="sendbtn">Send Message</button></a>
                                <button class="hiremebtn" 
                                        onclick="applyNow('employers', '<?php
                                        date_default_timezone_set('Asia/Calcutta');
                                        $date_ = date("Y/m/d");
                                        echo $date_;
                                        ?>', '<?php echo $_GET["candidate"] ?>', '<?php echo $_SESSION["loggedinid"]; ?>', '1', '1')
                                        ">Hire Me</button>
                            </div>
                            <?php while ($uod = $upload_other_data->fetch_assoc()) { ?>
                                <div class="profiledescription"><?php echo !empty($uod["profiletitle"]) ? "\"" . $uod["profiletitle"] . "\"" : ""; ?></div>
                            <?php } ?>
                        </div>
                    </div>
                    <hr class="profilehr" style="border: thin solid gray; width: 70%;">
                    <!------------------------main----------------------------------->
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="contactus">
                                <h3 class="personalinformation" style="font-size: 30px; color: #003246; font-weight: bold;">Personal Information</h3>
                                <hr>
                                <div><span class="glyphicon glyphicon-user"></span> Branch ID:  
                                    <?php
                                    $bid = $candidates["branches_id"];
                                    $branch = $db->select("branches", "name", array("id" => $bid));
                                    $br = $branch->fetch_assoc();
                                    echo $br["name"];
                                    ?></div>
                                <div><span class="glyphicon glyphicon-earphone"></span> <?php echo $candidates["mnumber"]; ?></div>
                                <div><span class="glyphicon glyphicon-phone-alt"></span> <?php echo $candidates["lnumber"]; ?></div>
                                <div><span class="glyphicon glyphicon-envelope"></span> <?php echo $candidates["email"]; ?></div>
                                <div><span class="glyphicon glyphicon-calendar"></span> <?php echo $candidates["dob"]; ?></div>
                                <div><span class="glyphicon glyphicon-star-empty"></span> <?php echo $candidates["gender"]; ?></div>
                                <div><span class="glyphicon glyphicon-star-empty"></span> <?php echo $candidates["mnumber"] == 0 ? "Not married" : "Married"; ?></div>
                                <address id="add"><span class="glyphicon glyphicon-map-marker"></span> Current Address: <?php echo $candidates["caddress"]; ?></address>
                                <address id="add"><span class="glyphicon glyphicon-map-marker"></span> Permanent Address:<?php echo $candidates["paddress"]; ?></address>


                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="education">
                                <h3 style="font-size: 30px; color: #003246; font-weight: bold;">Education</h3>
                                <hr>
                                <?php
                                $upload_other_data = $db->select("education", "*", $where);
                                while ($uod = $upload_other_data->fetch_assoc()) {
                                    ?>
                                    <div class="educationcontent">
                                        <div>Basic Qualification.<?php echo $uod["basic_qualification"]; ?></div>
                                        <div>Full/Part Time.<?php echo $uod["fulltime_parttime"]; ?></div>
                                        <div>Specialization.<?php echo $uod["specialization"]; ?></div>
                                        <div>Year and University.<?php echo $uod["year_of_passing"]; ?>| 
                                            <?php echo $uod["university_board_institute"]; ?></div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="jobpreference">
                                <h3 style="font-size: 30px; color: #003246; font-weight: bold;">Job Preference</h3>
                                <hr>
                                <?php
                                $upload_other_data = $db->select("job_preference", "*", $where);
                                while ($uod = $upload_other_data->fetch_assoc()) {
                                    ?>
                                    <div class="jobpreference">
                                        <div>Job type:<?php echo $uod["job_type"]; ?></div>
                                        <div>Employment Type:<?php echo $uod["employment_type"]; ?></div>
                                        <div>Willing to work in Shift:<?php echo $uod["will_to_work_in_shifts"]; ?></div>
                                        <div>Willing to relocate:<?php echo $uod["relocate"]; ?></div>

                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="passportinfo">
                                <h3 style="font-size: 30px; color: #003246; font-weight: bold;">Passport Information</h3>
                                <hr>
                                <div>Passport No. <?php echo $candidates["passportno"]; ?></div>
                                <div>Passport Valid Till.<?php echo $candidates["passportvalidtill"]; ?></div>
                                <div>Work Permit For Other Countries.<?php echo $candidates["workpermitforothercountries"] == 1 ? "Yes" : "NO"; ?></div>
                                <div>Permitted Country Name.<?php echo $candidates["workpermitforothercountries"] == 1 ? $candidates["permittedcountrynames"] : "N/A"; ?></div>
                                <div>Physical Challenged.<?php echo $candidates["phychallenged"] == 1 ? "Yes" : "NO"; ?></div>
                                <div>Physical Challenged Details.<?php echo $candidates["phychallenged"] == 1 ? $candidates["phychallengeddetail"] : "N/A"; ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="">
                                <h3 style="font-size: 30px; color: #003246; font-weight: bold;">Remuneration Detail</h3>
                                <hr>
                                <?php
                                $upload_other_data = $db->select("remuneration_details", "*", $where);
                                while ($uod = $upload_other_data->fetch_assoc()) {
                                    ?>
                                    <div class="remunerationdetail">
                                        <div>Current CTC.<?php echo $uod["current_ctc"]; ?></div>
                                        <div>Expected CTC.<?php echo $uod["expected_ctc"]; ?></div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="">
                                <h3 style="font-size: 30px; color: #003246; font-weight: bold;">Language Known</h3>
                                <hr>
                                <?php
                                $upload_other_data = $db->select("language_known", "*", $where);
                                while ($uod = $upload_other_data->fetch_assoc()) {
                                    ?>
                                    <div class="languageknown">
                                        <div><?php echo $uod["user_language"]; ?> (I can: <?php echo $uod["user_read"] == 1 ? "Read" : ""; ?>,  <?php echo $uod["user_write"] == 1 ? "Write" : ""; ?>,  <?php echo $uod["user_speak"] == 1 ? "Speak" : ""; ?>)</div>

                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="">
                                <h3 style=" font-size: 30px; color: #003246; font-weight: bold;">Reference</h3>
                                <hr>
                                <?php
                                $upload_other_data = $db->select("references_", "*", $where);
                                while ($uod = $upload_other_data->fetch_assoc()) {
                                    ?>
                                    <div class="reference">
                                        <div>Ref Name.<?php echo $uod["ref_name"]; ?></div>
                                        <div>Ref Contact Number.<?php echo $uod["contact_no"]; ?></div>
                                        <div>Ref Email.<?php echo $uod["ref_email"]; ?></div>
                                        <div>Ref Organization.<?php echo $uod["organization"]; ?></div>
                                        <div>Ref designation.<?php echo $uod["refdesignation"]; ?></div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-sm-6"></div>
                    </div> 
                </div>

            </div>
            <div class="container">
                <div style="overflow-x: scroll;">
                    <h2 style="text-align:center; font-size: 30px; color: #003246; font-weight: bold;">Professional Detail</h2>
                    <hr style="width:350px!important;">
                    <?php
                    $db->showInTable(" professional_details", "industry_you_belong_to ,designation", array("candidates_id" => $_GET["candidate"]), "no");
                    ?>
                </div>
            </div>
            <div class="container">
                <div style="overflow-x: scroll;">
                    <h2 style="text-align:center; font-size: 30px; color: #003246; font-weight: bold;">Project Detail</h2>

                    <?php
                    $db->showInTable("project_detail", "project_name,client_name,project_duration,role,team_size,short_description", array("candidates_id" => $_GET["candidate"]), "no");
                    ?>
                </div>

                <div style="margin: auto;">
                    <?php
                    if (isset($_SESSION["loggedintype"]) && $_SESSION["loggedintype"] == "branch") {
                        ?>    
                        <a href = "controller/update.php?id=<?php echo $candidates["id"]; ?>&tbname=candidates&resume_approval=<?php echo $candidates["resume_approval"] == 0 ? 1 : 0; ?>"><button class = "sendbtn"><?php echo $candidates["resume_approval"] == 0 ? "Approve" : "Approved"; ?></button></a>
                        <?php }
                        ?>
                </div>
            </div>
            <?php include './Common/Footer.php'; ?>

        </body>
        <?php
    } else {
        echo "<h3>Resume verification is pending.....</h3>";
    }
    ?>
</html>

