<!DOCTYPE html>
<html>
    <head>	
        <?php
        session_start();
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
                text-transform: uppercase;
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

                <div class="col-md-12">


                    <div class="jobprofile">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="employerimage">
                                    <img src="images/CompanyProfile/<?php echo $employers["company_logo"]; ?>" width="300px;">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="titledis">
                                    <p id="jobtitle"><?php echo $jobpost["job_title"]; ?> - <?php echo $employers["Address_office"]; ?> </p>
                                    <p id="name">Company / Organization: <?php echo $employers["Organization_Name"]; ?> </p>
                                    <p id="name">Company type: <?php echo $employers["Type_of_organization"]; ?> </p>
                                    <p id="name">Contact person: <?php echo $employers["contact_person"]; ?> </p>
                                    <P id="emailaddress"><i class="fas fa-envelope"></i> Email Address: <?php echo $employers["Email_ID"]; ?></P>
                                    <p id="Telephone"> <i class="fas fa-phone"></i> Telephone: <?php echo $employers["Contact_number"]; ?>, <?php echo $employers["Alternate_contact_number1"]; ?>, <?php echo $employers["Alternate_contact_number2"]; ?></p>
                                    <p id="joblocation"> <i class="fas fa-map-marker-alt"></i> Address: <?php echo $employers["Address_office"]; ?></p>


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


                            <div class="col-md-4">

                                <div class="jobpostedby">

                                    <div id="jobposted">
                                        <p>Job Posted by</p>
                                    </div> 
                                    <img src="images/avatar-male.png" >

                                    <p id="postname">Name : <?php echo $jobpost["postedby"]; ?></p>



                                </div>


                            </div>




                        </div>

                    </div>

                </div>


            </div>

            <div class="row">
                <div class="col-md-12">

                    <div class="bar ">
                        <div class="row">
                            <div class="col-md-3">
                                <p id="rupee"><i class="fas fa-rupee-sign"></i> <?php echo $jobpost["Package_Ranged_Offered"]."Lac Annual"; ?></p>
                            </div>

                            <div class="col-md-3">
                                <p><i class="far fa-clock"></i> Posted on: <?php echo $jobpost["job_posted_on"]; ?></p>
                            </div>
                            <div class="col-md-3">
                                <p><i class="far fa-eye"></i> Job Vacancy :<?php echo $jobpost["no_of_posting_vacancy"]; ?></p>
                            </div>

                            <div class="col-md-3">
                                <p><i class="far fa-address-card"></i> Valid till: <?php echo $jobpost["vacancy_valid_till"]; ?></p>
                            </div>


                        </div>

                    </div>


                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tab" role="tabpanel">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab">Job Description</a></li>
                                <li role="presentation"><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab">Key skills</a></li>
                                <li role="presentation"><a href="#Section3" aria-controls="messages" role="tab" data-toggle="tab">Desired Candidate Profile</a></li>
                            </ul>
                            <div class="tab-content tabs">
                                <div role="tabpanel" class="tab-pane fade in active" id="Section1">
                                    <div class="content">
                                        <?php echo $jobpost["jobdescription"]; ?>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="Section2">
                                    <div class="category">
                                        <?php echo $jobpost["desired_skill_set"]; ?>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="Section3">
                                    <?php echo $jobpost["desired_skill_set"]; ?>
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