<?php session_start();?>
<?php include './LoginCheck.php';?> 
<!DOCTYPE html>
<html>
    <head>
        <title>Resume</title>
        <?php
        include './LoginCheck.php';
        include '../Config/ConnectionObjectOriented.php';
        include '../Config/DB.php';
        include '../Common/CDN.php';
        include '../Common/colors.php';

        $db = new DB($conn);
        $where = array("id" => $_GET["candidate"]);
        $data = $db->select("candidates", "*", $where);
        $candidates = $data->fetch_assoc();
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
        <script>
                   function updateRecord(id, table) {
                       var a = $("#updateinfo").text();
                       $(".modal-body").css("background-color", "red");
                       selectRecordById(id, table);
                   }
                   function selectRecordById(id, table) {
                       var xhttp = new XMLHttpRequest();
                       xhttp.onreadystatechange = function () {
                           if (this.readyState == 4 && this.status == 200) {
                           var obj = jQuery.parseJSON(xhttp.responseText);
                                   var array = new Array();
                                   var array2 = new Array();
                                   array = Object.keys(obj);
                                   array2 = Object.values(obj);
                                   for (var i = 0; i < Object.keys(obj).length; i++) {
                           $("#updatemodel .modal-body").append("<br><input type="text" value="" + array2[i] + "" name="" + array[i] + "" class="form - control">");

                           }
                           $("#updatemodel .modal-body").append("<br><button class="btn btn - default btnsub" onclick="getData()">Update</button>");
                           }
                       };
                       xhttp.open("GET", "../controller/UpdateFormSelection.php?id=" + id + "&table_name=" + table, true);
                       xhttp.send();
                   }
                   function getData() {
                       var data = "", keys = "";
                       for (var i = 0; i < $("#updatemodel .modal-body input").length; i++) {
                           var single = $("#updatemodel .modal-body input:eq(" + i + ")").val();
                           var key = $("#updatemodel .modal-body input:eq(" + i + ")").attr("name");
                           if (i == $("#updatemodel .modal-body input").length - 1) {
                               data += key + "=" + single;

                           } else {
                               data += key + "=" + single + "&";

                           }

                       }
                       $.get("../controller/UpdateData.php?" + data, function (rdata, status) {
                           alert(rdata);
                           location.reload();
                       });
                   }
        </script>
        <style>
<?php include './Student_page.css'; ?>
<?php include '../css/resume.css'; ?>

        </style>
    </head>
    <body>
        <?php include './Student_page_header.php'; ?>
        <div class="container">
            <div class="resume">
                <div class="flex-container">
                    <div class="flex-box">
                        <img src="../images/profile/<?php echo $candidates["dp"]; ?>" height="150" width="150" alt=""/>
                        <h2><?php echo $candidates["fname"]; ?> <?php echo $candidates["lname"]; ?></h2>
                    </div>
                    <!--                    <div class="flex-box">
                    <?php // include './circle.php'; ?>
                                            <h2 class="circlename">Progress Bar</h2>
                    
                                        </div>
                    
                                        <div class="flex-box">
                    <?php // include './circle1.php'; ?>
                                            <h2 class="circlename">Profile Updated</h2>
                                        </div>  -->
                </div>
                <div class="row profilepage" style="margin: 0px auto;">
                    <div class="col-sm-12 profile">
<!--                        <div class="btn-profile">
                            <button class="sendbtn">Send Message</button>
                            <button class="hiremebtn" 
                                    onclick="applyNow('employers',
                                                    '<?php
                                    date_default_timezone_set('Asia/Calcutta');
                                    $date_ = date("Y/m/d");
                                    echo $date_;
                                    ?>', '<?php echo $_GET["candidate"] ?>', '<?php echo $_SESSION["loggedinid"]; ?>', '1', '1')
                                    ">Hire Me</button>
                        </div>-->
                        <?php while ($uod = $upload_other_data->fetch_assoc()) { ?>
                            <div class="profiledescription">”<?php echo $uod["profiletitle"]; ?>”</div>
                        <?php } ?>
                    </div>
                </div>
                <hr class="profilehr" style="border: thin solid gray; width: 70%;">
                <!------------------------main----------------------------------->
                <div class="row" style="margin: 0px auto;">
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
                <div class="row" style="margin: 0px auto;">
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
                            <div>Permitted Country Name.<?php echo $candidates["workpermitforothercountries"] == 1 ? $candidates["permittedcountrynames"] : "NO date"; ?></div>
                            <div>Physical Challenged.<?php echo $candidates["phychallenged"] == 1 ? "Yes" : "NO"; ?></div>
                            <div>Physical Challenged Details.<?php echo $candidates["phychallenged"] == 1 ? $candidates["phychallengeddetail"] : "NO date"; ?></div>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin: 0px auto;">
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
                <div class="row" style="margin: 0px auto;">
                    <div class="col-sm-6">
                        <div class="">
                            <h3 style=" font-size: 30px; color: #003246; font-weight: bold;">Reference</h3>
                            <hr>
                            <?php
                            $upload_other_data = $db->select("references_", "*", $where);
                            while ($uod = $upload_other_data->fetch_assoc()) {
                                ?>
                                <div class="reference">
                                    <div>Name.<?php echo $uod["ref_name"]; ?></div>
                                    <div>Contact Number.<?php echo $uod["contact_no"]; ?></div>
                                    <div>Email.<?php echo $uod["ref_email"]; ?></div>
                                    <div>Organization.<?php echo $uod["organization"]; ?></div>
                                    <div>Organization.<?php echo $uod["refdesignation"]; ?></div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-sm-6"></div>

                </div>
                <div class="row" id="table" style="margin: 0px auto; word-wrap: break-word;">
                    <h2 style="text-align:center; font-size: 30px; color: #003246; font-weight: bold;">Professional Detail</h2>
                    <hr style="width:350px!important;">
                    <?php
                    $upload_other_data = $db->showInTableWithoutTool(" professional_details", "industry_you_belong_to ,designation", $where);
                    ?>


                    <div class="row" id="table" style="margin: 0px auto; word-wrap: break-word;">
                        <h2 style="text-align:center; font-size: 30px; color: #003246; font-weight: bold;">Project Detail</h2>
                        <hr style="width:350px;">
                        <?php
                        $upload_other_data = $db->showInTableWithoutTool("project_detail", "project_name,client_name,project_duration,role,team_size,short_description", $where);
                        ?>
                    </div>
                       <div class="row" style="margin: 0px auto; word-wrap: break-word;">
                <h1>Update profile page</h1>

                <?php
                $id = $_SESSION["loggedinid"];
                $where = array("id" => $id);
                $db->showInTable("candidates", "*", $where);
                ?>
            </div>
                </div>
               
            </div>
          
        </div>
    </body>
</html>
