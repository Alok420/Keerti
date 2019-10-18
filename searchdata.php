<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <?php
        include './Common/CDN.php';
        include './Common/colors.php';
        include './Config/ConnectionObjectOriented.php';
        include './Config/DB.php';
        ?>
        <link href="css/Homepage.css" rel="stylesheet" type="text/css"/> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
        <style type="text/css">
<?php include './css/Footer.css'; ?>
<?php include 'css/Alljobs.css'; ?>
        </style>
    </head>
    <body>
        <?php include './Common/Header.php'; ?>
        <div class="flex-container">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <?php
                        $location = "";
                        if (isset($_GET["search_param"])) {
                            $search_param = $_GET["search_param"];
                            $location = $_GET["location"];
                        }
                        $sql = "select * from jobpost where upper(job_title) like upper('%$search_param%') or upper(desired_skill_set) like upper('%$search_param%') and employers_id in (select id from employers where Address_office like '%$location%')";
//                        echo $sql;
                        $data = $conn->query($sql);
                        while ($row = $data->fetch_assoc()) {
                            $where = array("id" => $row["employers_id"]);
                            $companies = $db->select("employers", "*", $where);
                            $company = $companies->fetch_assoc();
                            ?>
                            <div class="employeeprofilecard" style="margin-top: 20px;">
                                <div class="row" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                                    <div class="col-md-3">
                                        <div class="employe">
                                            <img src="images/CompanyProfile/<?php echo $company["company_logo"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Job Title</label>
                                        <p id="jobtitle"><?php echo $row["job_title"]; ?></p>
                                        <label>job Description</label>
                                        <p id="Jobdesc"><?php echo $row["jobdescription"]; ?>...<a href="jobdetail.php?id=<?php echo $row["id"]; ?>">More Info</a></p>
                                    </div> 
                                    <div class="col-md-3">
                                        <p id="Joblocation"><?php echo $company["Address_office"]; ?></p>
                                        <p id="Jobdesc"><?php echo $row["Package_Ranged_Offered"] . " Lac / annum"; ?></p>
                                        <div class="btn3">
                                            <button onclick="window.location.href = 'jobdetail.php?id=<?php echo $row["id"]; ?>'"type="button">More Info</button>
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
        <?php include './Common/Footer.php'; ?>
      
    </body>
</html>