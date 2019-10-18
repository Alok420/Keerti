<?php session_start(); ?>	
<!DOCTYPE html>
<html>
    <head>
        <?php
//        $loggedintype="";
//        include './UserLoginCheck.php';
        if (isset($_GET["id"])) {
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
                <?php include './css/Alljobs.css'; ?>
            </style>

        </head>
        <body>
            <?php include './Common/Header.php'; ?>
            <div class="container companyprofile">
                <div class="row imgbox">
                    <input type="hidden" id="candidates_id" value="<?php echo $candidates_id; ?>">
                    <input type="hidden" id="employers_id" value="<?php echo $employers_id; ?>">
                    <input type="hidden" id="employerapproval" value="<?php $employerapproval = 0;
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
                    <div class="col-sm-4">
                        <div class="image-container">
                            <img src="images/CompanyProfile/<?php echo $employer["company_logo"]; ?>" id="imgProfile" class="img-thumbnail img-responsive" />
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div>
                            <strong><i class="fa fa-mobile-phone"></i> Contact : </strong> <?php echo $employer["Contact_number"]; ?> <?php echo $employer["contact_person"]; ?>
                        </div>
                        <div>
                            <strong><i class="fa fa-envelope"></i> Email : </strong> <?php echo $employer["Email_ID"]; ?> <strong>Fax</strong>: <?php echo $employer["Fax"]; ?>
                        </div>
                        <div>
                            <strong><i class="fa fa-location-arrow"></i> Address : </strong> <?php echo $employer["Address_office"]; ?>
                        </div>
                        <div>
                            <strong><i class="fa fa-calendar"></i> Date of incorporation : </strong> <?php echo $employer["Date_of_incorporation"]; ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div>
                            <strong> No branches in India & abroad: </strong> <?php echo $employer["branches_in_India"]; ?> / <?php echo $employer["branches_abroad"]; ?>
                        </div>
                        <div>
                            <strong> Employee strength : </strong> <?php echo $employer["Employee_Strength"]; ?> 
                        </div>
                        <div>
                            <strong> Male-Female employee ratio : </strong> <?php echo $employer["Male_Female_employee_ratio"]; ?>
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
                <h2 style="text-align: center;padding: 5px; border-bottom: thin solid gray;">
                    All jobs by <?php echo $employer["Organization_Name"]; ?>
                </h2>
                <div class="row">
                    <div class="col-sm-12">
                        <?php
                        $sql="select * from jobpost where employers_id=".$_GET["id"];
                        $data = $conn->query($sql);
                        while ($row = $data->fetch_assoc()) {
                            $where = array("id" => $row["employers_id"]);
                            $companies = $db->select("employers", "*", $where);
                            $company = $companies->fetch_assoc();
                            ?>
                            <div class="employeeprofilecard" style="margin-top: 20px;">
                                <div class="row" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                                    <div class="col-sm-3">
                                        <div class="employe">
                                            <img src="images/CompanyProfile/<?php echo $company["company_logo"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Job Title</label>
                                        <p id="jobtitle"><?php echo $row["job_title"]; ?></p>
                                        <label>job Description</label>
                                        <p id="Jobdesc"><?php echo $row["jobdescription"]; ?>...<a href="Jobdetail.php?id=<?php echo $row["id"]; ?>">More Info</a></p>
                                    </div> 
                                    <div class="col-sm-3">
                                        <p id="Joblocation"><?php echo $company["Address_office"]; ?></p>
                                        <p id="Jobdesc"><?php echo $row["Package_Ranged_Offered"] . " Lac / annum"; ?></p>
                                        <div class="btn3">
                                            <a href="Jobdetail.php?id=<?php echo $row["id"]; ?>"><button type="button">More Info</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include './Common/Footer.php';
}
?>

</body>
</html>