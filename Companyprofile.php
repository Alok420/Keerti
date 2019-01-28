<!DOCTYPE html>
<html>
    <head>
        <?php
        session_start();
//        $loggedintype="";
//        include './UserLoginCheck.php';
        include './Common/CDN.php';
        include './Common/colors.php';
        include './Config/ConnectionObjectOriented.php';
        include './Config/DB.php';
        $db = new DB($conn);
        $where = array("id" => $_GET["id"]);
        $data = $db->select("employers", "*", $where);
        $employer = $data->fetch_assoc();
        $candidates_id = "";
        if (isset($_SESSION["loggedinid"])) {
            $candidates_id = $_SESSION["loggedinid"];
        }
        $employers_id = $_GET["id"];
        ?>
        <link href="css/Homepage.css" rel="stylesheet" type="text/css"/> 
        <link href="css/companyprofile.css" rel="stylesheet" type="text/css"/> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
        <script>
            function applyNow(requestedBy) {
                var candidates_id = $("#candidates_id").val();
                var employers_id = $("#employers_id").val();
                var employerapproval = $("#employerapproval").val();
                var branchapproval = $("#branchapproval").val();
                var date_ = $("#date_").val();
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
                                alert("Applied");
                            }
                        });
            }

            function loginFirstAlert() {
                $(document).ready(function () {
                    alert("Login first");
                    window.location.href = "Login_User.php";
                });
            }
        </script>
        <style type="text/css">
            
<?php include './css/Footer.css'; ?>
        </style>

    </head>
    <body>
        <?php include './Common/Header.php'; ?>
        <div class="container companyprofile">
            <div class="row imgbox">
                <input type="hidden" id="candidates_id" value="<?php echo $candidates_id; ?>">

                <input type="hidden" id="employers_id" value="<?php echo $employers_id; ?>">
                <input type="hidden" id="employerapproval" value="<?php
                $employerapproval = 0;
                echo $employerapproval;
                ?>">
                <input type="hidden" id="branchapproval" value="<?php
                $branchapproval = 0;
                echo $branchapproval;
                ?>">
                <input type="hidden" id="date_" value="<?php
                date_default_timezone_set('Asia/Calcutta');
                $date_ = date("Y/m/d");
                echo $date_;
                ?>">
                <div class="col-sm-12">
                    <div class="image-container">
                        <img src="images/CompanyProfile/<?php echo $employer["company_logo"]; ?>" id="imgProfile" class="img-thumbnail" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="d-block"><a href="#"><?php echo $employer["Organization_Name"]; ?> <small><?php echo $employer["Type_of_organization"]; ?></small></a></h2>
                </div>
            </div>
            <hr style="width:25%; float: left; border: 1px solid silver; margin: 0px;">
            <div class="row">
                <div class="col-sm-12 companycontent">
                    <p style="margin:10px;"><?php // echo $employer["Organization_Name"];                    ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 companycontent">
                    <!--<span>Website:<a href="">www.bitsinfotec.in</a></span>-->
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <?php if ($db->loginCheck("candidate")) {
                        ?>
                        <button class="btn btn-default applynow" type="button" onclick="applyNow('candidates')">Apply Now <span class="glyphicon glyphicon-ok-sign mark"></span></button>
                        <?php
                    } else {
                        ?>
                        <button class="btn btn-default applynow" type="button" onclick="loginFirstAlert()">Apply Now <span class="glyphicon glyphicon-ok-sign mark"></span></button>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="tab" role="tabpanel">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab">Basic Info</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content tabs">
                            <div role="tabpanel" class="tab-pane fade in active" id="Section1">
                                <div class="row">
                                    <div class="col-sm-3 col-md-2 col-5">
                                        <label style="font-weight:bold;">Full Name</label>
                                    </div>
                                    <div class="col-md-8 col-6"> <?php echo $employer["Organization_Name"]; ?> <SMALL><?php echo $employer["Type_of_organization"]; ?></small>
                                    </div>
                                </div>
                                <hr />

                                <div class="row">
                                    <div class="col-sm-3 col-md-2 col-5">
                                        <label style="font-weight:bold;">Date of incorporation</label>
                                    </div>

                                    <div class="col-md-8 col-6"> <?php echo $employer["Date_of_incorporation"]; ?>
                                    </div>
                                </div>
                                <hr />

                                <hr />

                                <div class="row">
                                    <label style="font-weight:bold;">Requirements</label>
                                    <?php
                                    $where = array("id" => $_GET["id"]);
                                    $upload_other_data = $db->showInTableWithoutTool("jobpost", "postedby,no_of_posting_vacancy,job_posted_on,vacancy_valid_till,jobdescription,desired_skill_set,job_title,Package_Ranged_Offered", $where);
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include './Common/Footer.php'; ?>

</body>
</html>