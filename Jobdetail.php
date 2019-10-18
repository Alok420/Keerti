<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>	
        <?php
//        $loggedintype = "";
//        include './UserLoginCheck.php';
        include './Common/CDN.php';
        include './Common/colors.php';
        include './Config/ConnectionObjectOriented.php';
        include './Config/DB.php';
        $db = new DB($conn);
        $where = array("id" => $_GET["id"]);
        $data = $db->select("jobpost", "*", $where);
        $jobpost = $data->fetch_assoc();
        $where = array("id" => $jobpost["employers_id"]);
        $data = $db->select("employers", "*", $where);
        $employers = $data->fetch_assoc();
        $candidates_id = "";
        if (isset($_SESSION["loggedinid"])) {
            $candidates_id = $_SESSION["loggedinid"];
        }
        $job_post_id = $_GET["id"];
        ?>
        <link href="css/Homepage.css" rel="stylesheet" type="text/css"/> 
        <link rel="stylesheet" type="text/css" href="css/jobdetail.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
        <script>
            function applyNow(requestedBy) {
                var candidates_id = $("#candidates_id").val();
                var employers_id = $("#employers_id").val();
                var jobpost_id = $("#jobpost_id").val();
                var employerapproval = $("#employerapproval").val();
                var branchapproval = $("#branchapproval").val();
                var date_ = $("#date_").val();
                $.post("controller/hire.php",
                        {
                            candidates_id: "" + candidates_id,
                            employers_id: "" + employers_id,
                            jobpost_id: "" + jobpost_id,
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

            var acc = document.getElementsByClassName("accordion");
            var i;

            for (i = 0; i < acc.length; i++) {
                acc[i].addEventListener("click", function () {
                    this.classList.toggle("active");
                    var panel = this.nextElementSibling;
                    if (panel.style.maxHeight) {
                        panel.style.maxHeight = null;
                    } else {
                        panel.style.maxHeight = panel.scrollHeight + "px";
                    }
                });
            }

        </script>
        <style type="text/css">
<?php include './css/Footer.css'; ?>
            a:hover,a:focus{
                text-decoration: none;
                outline: none;
            }
            .tab .nav-tabs{
                border: none;
                margin: 0;
            }
            .tab .nav-tabs li a{
                padding: 10px;
                margin-right: 20px;
                font-size: 20px;
                font-weight: 600;
                color: #293241;
                text-transform: capitalize;
                border: none;
                border-radius: 0;
                background: transparent;
                z-index: 2;
                position: relative;
                transition: all 0.3s ease 0s;
            }
            .tab .nav-tabs li a:hover,
            .tab .nav-tabs li.active a{ border: none; }
            .tab .nav-tabs li a:before{
                content: "";
                width: 100%;
                height: 4px;
                background: #f6f6f6;
                border: 1px solid #e9e9e9;
                border-radius: 2px;
                position: absolute;
                bottom: 0;
                left: 0;
            }
            .tab .nav-tabs li a:after{
                content: "";
                width: 0;
                height: 4px;
                background: #727cb6;
                border: 1px solid #727cb6;
                border-radius: 2px;
                position: absolute;
                bottom: 0;
                left: 0;
                opacity: 0;
                z-index: 1;
                transition: all 1s ease 0s;
            }
            .tab .nav-tabs li:hover a:after,
            .tab .nav-tabs li.active a:after{
                width: 100%;
                opacity: 1;
            }
            .tab .tab-content{
                padding: 15px 20px;
                margin-top: 20px;
                font-size: 17px;
                color: #fff;
                letter-spacing: 1px;
                line-height: 30px;
                background: #727cb6;
                position: relative;
                min-height: 400px;
            }
            @media only screen and (max-width: 479px){
                .tab .nav-tabs li{
                    width: 100%;
                    text-align: center;
                    margin-bottom: 15px;
                }
                .tab .tab-content{ margin-top: 0; }
            }
            .panel-heading{
                background: linear-gradient(45deg,rgba(234,21,129,.6),#428bca 100%) !important;
                padding: 10px;
                border-radius: 5px !important;
                color: white!important;
            }
            
        </style>
    </head>
    <body>
        <?php
        include './Common/Header.php';
        ?>


        <input type="hidden" id="candidates_id" value="<?php echo $candidates_id; ?>">
        <input type="hidden" id="jobpost_id" value="<?php echo $job_post_id ?>">

        <input type="hidden" id="employers_id" value="<?php echo $employers["id"]; ?>">
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

        <div class="container-fluid" style="background: #ecf0f1;">

            <div class="row">

                <div class="col-sm-12">


                    <div class="jobprofile">
                        <div class="row">
                            <div class="col-sm-4" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                                <div class="employerimage">
                                    <img class="img-responsive" src="images/CompanyProfile/<?php echo $employers["company_logo"]; ?>"  width="300px;">
                                </div>
                            </div>
                            <div class="col-sm-4" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                                <div class="titledis">
                                    <p id="jobtitle"><strong>Job : </strong><?php echo $jobpost["job_title"]; ?> </p>
                                    <p id="name"><strong>Company / Organization:</strong> <?php echo $employers["Organization_Name"]; ?> </p>
                                    <p id="name"><strong>Company type:</strong> <?php echo $employers["Type_of_organization"]; ?> </p>
                                    <p id="name"><strong>Contact person:</strong> <?php echo $employers["contact_person"]; ?> </p>
                                    <P id="emailaddress"><i class="fas fa-envelope"></i><strong> Email Address:</strong> <?php echo $employers["Email_ID"]; ?></P>
                                    <p id="Telephone"> <i class="fas fa-phone"></i> <strong>Telephone:</strong> <?php echo $employers["Contact_number"]; ?>, <?php echo $employers["Alternate_contact_number1"]; ?>, <?php echo $employers["Alternate_contact_number2"]; ?></p>
                                    <p id="joblocation"> <i class="fas fa-map-marker-alt"></i> <strong>Address:</strong> <?php echo $employers["Address_office"]; ?></p>


                                    <?php if ($db->loginCheck("candidate")) {
                                        ?>
                                        <button id="applynow" onclick="applyNow('candidates')">Apply Now</button>
                                        <?php
                                    } else {
                                        ?>
                                        <button id="applynow" onclick="loginFirstAlert()">Apply Now</button>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>


                            <div class="col-sm-4" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                                <div class="jobpostedby">
                                    <div id="jobposted">
                                        <p>Job posted by</p>
                                    </div> 
                                    <img src="images/avatar-male.png" class="img-responsive" >
                                    <p id="postname"><?php echo strtoupper($jobpost["postedby"]); ?></p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            <div class="row bar" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                <div class="col-sm-3">
                    <p id="rupee"><i class="fas fa-rupee-sign"></i><?php echo $jobpost["Package_Ranged_Offered"] . " Lac Annual"; ?></p>
                </div>
                <div class="col-sm-3">
                    <p><i class="far fa-clock"></i> Posted on: <?php echo $jobpost["job_posted_on"]; ?></p>
                </div>
                <div class="col-sm-3">
                    <p><i class="far fa-eye"></i> Job Vacancy :<?php echo $jobpost["no_of_posting_vacancy"]; ?></p>
                </div>
                <div class="col-sm-3">
                    <p><i class="far fa-address-card"></i> Valid till: <?php echo $jobpost["vacancy_valid_till"]; ?></p>
                </div>
            </div>


            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                Job Description
                                <i class="fa fa-angle-down" style="float: right;"></i>
                            </a>
                        </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <?php echo $jobpost["jobdescription"]; ?>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                Key skills
                                <i class="fa fa-angle-down" style="float: right;"></i>
                            </a>
                        </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse">
                        <div class="panel-body"> <?php echo $jobpost["desired_skill_set"]; ?></div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                                Desired Candidate Profile
                                <i class="fa fa-angle-down" style="float: right;"></i>
                            </a>
                        </h4>
                    </div>
                    <div id="collapse3" class="panel-collapse collapse">
                        <div class="panel-body"><?php echo $jobpost["desired_skill_set"]; ?></div>
                    </div>
                </div>
            </div>

        </div>

        <?php include './Common/Footer.php'; ?>



    </body>
</html>