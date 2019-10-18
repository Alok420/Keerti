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
<?php
include './css/Footer.css';
include 'css/Alljobs.css';

$db = new DB($conn);
?>
            .site-section {
                padding: 3em 0;
            }
            @media (min-width: 768px) {
                .site-section {
                    padding: 7em 0; } }
            .site-section.site-section-sm {
                padding: 4em 0; }

            .site-section-heading {
                font-size: 30px;
                color: #25262a;
                position: relative; }
            .site-section-heading:before {
                content: "";
                left: 0%;
                top: 0;
                position: absolute;
                width: 40px;
                height: 2px;
                background: #26baee; }
            .site-section-heading.text-center:before {
                content: "";
                left: 50%;
                top: 0;
                -webkit-transform: translateX(-50%);
                -ms-transform: translateX(-50%);
                transform: translateX(-50%);
                position: absolute;
                width: 40px;
                height: 2px;
                background: #26baee; }

            .site-footer {
                padding: 7em 0;
                background: #393e46;
                color: rgba(255, 255, 255, 0.4); }
            .site-footer a {
                color: rgba(255, 255, 255, 0.7); }
            .site-footer a:hover {
                color: #fff; }
            .site-footer .footer-heading {
                font-size: 18px;
                color: #fff; }
            .site-footer ul li {
                margin-bottom: 10px; }
            .job-post-item {
                background: #fff;
                position: relative;
                -webkit-transition: .1s all ease;
                -o-transition: .1s all ease;
                transition: .1s all ease;
                top: 0;
                z-index: 1;
                border-bottom: 1px solid rgba(0, 0, 0, 0.1); }
            .job-post-item .btn-favorite {
                width: 40px;
                height: 40px;
                line-height: 40px;
                padding: 0 !important;
                margin: 0 !important; }
            .job-post-item .btn-favorite.active, .job-post-item .btn-favorite:hover {
                border-color: #f23a2e;
                background: #f23a2e;
                color: #fff !important; }
            .job-post-item.last {
                border-bottom: 1px solid transparent; }
            .job-post-item .badge-wrap {
                position: relative;
                top: -5px; }
            .job-post-item .badge {
                border-radius: 30px; }
            .job-post-item:hover, .job-post-item:focus {
                -webkit-box-shadow: 0 0 40px -5px rgba(0, 0, 0, 0.2);
                box-shadow: 0 0 40px -5px rgba(0, 0, 0, 0.2);
                top: -5px;
                z-index: 2; }

   
        </style>
    </head>
    <body>
        <?php include './Common/Header.php'; ?>
        <div class="row">
            <div class="col-sm-12">
                <div class="container" style="  border:1px solid #000; 
                     background-color:#FFF; 
                     background-image:url('http://www.musictruth.com/wp-content/uploads/2016/12/bible-study-video-background.jpg'); 
                     height: 100px; width: 100%" >
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2 col-sm-10 col-sm-offset-1">
                            <form method="get" action="searchdata.php">
                                <div class="input-group buscador-principal">    					

                                    <input  name="" id="search_param" type="hidden">         
                                    <input class="form-control" name="search_param" placeholder="Search Your Job?" type="text">
                                    <div class="input-group-btn search-panel">
                                        <input type="text" name="location" style="width: 180px;" placeholder="location: Mumbai" class="form-control" role="menu">
                                    </div>
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search"></span> Search</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="search-banner text-white py-5" id="search-banner" style="background:<?php echo $Topnavbar; ?>; margin-top:-40px;">
            <div class="container py-5 my-5">
                <div class="row text-center pb-4">
                    <div class="col-sm-12">
                    </div>
                </div>   
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <form method="get" action="Alljobs.php" class="input-group buscador-principal">
                                <div class="col-sm-2">
                                    <div class="form-group ">
                                        <label>Category</label>
                                        <input type="text" name="category" id="inputState" value="any" placeholder="IT" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group ">
                                        <label>Date</label>
                                        <select id="inputState" name="date" class="form-control" >
                                            <option selected>none</option>
                                            <option value="today">Today</option>
                                            <option value="week">This week</option>
                                            <option value="month">This Month </option>
                                            <option value="year">This Year</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group ">
                                        <label>Skill set</label>
                                        <input type="text" value="any" name="skill" id="inputState" placeholder="Java" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group ">
                                        <label>Location</label>
                                        <input type="text" value="any" id="inputState" name="location" placeholder="mumbai" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Salary</label>
                                        <select id="inputState" name="salary" class="form-control salary" >
                                            <option value="0"><1Lac</option>
                                            <script>
                                                $(document).ready(function () {
                                                    for (var i = 1; i <= 100; i++) {
                                                        $(".salary").append("<option value='" + i + "'>" + i + "Lac</option>");
                                                    }
                                                });
                                            </script>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <br>
                                        <button name="search" class="btn-primary" style="font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif;
                                                text-transform: capitalize;
                                                font-size: 12px;
                                                margin-top:5px;
                                                font-weight: 800;
                                                letter-spacing: 1px;
                                                border-radius: 0;
                                                border-top-left-radius: 0px;
                                                border-bottom-left-radius: 0px;
                                                padding: 15px 25px;" type="submit"><span class="glyphicon glyphicon-search"></span> Search
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <hr  style="width:1px; size: 500px;">
        <div class="flex-container">
            <div class=" container-fluid" style="width: 100%;">
                <div class="row" data-aos="fade">
                    <div  class="col-sm-2" data-aos="fade" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                        <div class="allcatcol">
                            <h3>All category</h3>
                            <?php
                            $data = $db->select("jobpost", "DISTINCT job_title");
                            while ($job = $data->fetch_assoc()) {
                                ?>
                                <a class="allcatlist" href="Alljobs.php?category=<?php echo $job["job_title"]; ?>&date=none&skill=any&location=any&salary=1&search="><div ><?php echo $job["job_title"]; ?></div></a>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-8" data-aos="fade-up" data-aos-anchor-placement="top-bottom">

                        <?php
                        $skill = $date = $category = $location = $salary = "";

                        if (isset($_GET["skill"])) {
                            $skill = $_GET["skill"];
                            $date = $_GET["date"];
                            $category = $_GET["category"];
                            $location = $_GET["location"];
                            $salary = $_GET["salary"];
                        }
                        date_default_timezone_set('Asia/Calcutta');

                        $sdate_ = "";
                        $edate = "";

                        if ($salary == "0") {
                            $salary = 0;
                        }
                        if ($date == "none") {
                            $date = "any";
                        }
                        if ($date == "today") {
                            $sdate_ = date("Y/m/d");
                            $edate = strtotime(date("Y/m/d", strtotime($sdate_)) . " -1 day");
                            $edate = date("Y/m/d", $edate);
                        } elseif ($date == "week") {
                            $sdate_ = date("Y/m/d");
                            $edate = strtotime(date("Y/m/d", strtotime($sdate_)) . " -7 days");
                            $edate = date("Y/m/d", $edate);
                        } elseif ($date == "month") {
                            $sdate_ = date("Y/m/d");
                            $edate = strtotime(date("Y/m/d", strtotime($sdate_)) . " -1 month");
                            $edate = date("Y/m/d", $edate);
                        } elseif ($date == "year") {
                            $sdate_ = date("Y/m/d");
                            $edate = strtotime(date("Y/m/d", strtotime($sdate_)) . " -1 year");
                            $edate = date("Y/m/d", $edate);
                        }

                        $sql = "select * from jobpost";
                        if ($category == "any" || $category == "") {
                            
                        } else {
                            $sql .= " where upper(job_title) like upper('%$category%') ";
                        }

                        if ($salary == 0 || $salary == "") {
                            
                        } else {
                            if ($sql == "select * from jobpost") {
                                $sql .= " where Package_Ranged_Offered >=$salary";
                            } else {
                                $sql .= " and Package_Ranged_Offered >=$salary";
                            }
                        }

                        if ($skill == "any" || $skill == "") {
                            
                        } else {
                            if ($sql == "select * from jobpost") {
                                $sql .= " where desired_skill_set like '%$skill%'";
                            } else {
                                $sql .= " and desired_skill_set like '%$skill%'";
                            }
                        }

                        if ($date == "any" || $date == "") {
                            
                        } else {
                            if ($sql == "select * from jobpost") {
                                $sql .= " where job_posted_on between '$edate' and '$sdate_'";
                            } else {
                                $sql .= " and job_posted_on between '$edate' and '$sdate_'";
                            }
                        }
//                        echo $sql;
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
                    <div class="col-sm-2" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                        <div class="allcatcol">
                            <h3>All skills</h3>
                            <?php
                            $data = $db->select("jobpost", "DISTINCT desired_skill_set");
                            while ($job = $data->fetch_assoc()) {
                                ?>

                                <a class="allcatlist" href="Alljobs.php?category=any&date=none&skill=<?php echo $job["desired_skill_set"]; ?>&location=any&salary=1"><?php echo $job["desired_skill_set"]; ?></a>

                                <?php
                            }
                            ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <?php include './Common/Footer.php'; ?>

    </body>
</html>