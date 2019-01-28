<!DOCTYPE html>
<html>
    <head>
        <?php
        session_start();
        include './Common/CDN.php';
        include './Common/colors.php';
        include './Config/ConnectionObjectOriented.php';
        include './Config/DB.php';
        ?>
        <link href="css/Homepage.css" rel="stylesheet" type="text/css"/> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
        <style type="text/css">
<?php include './css/Footer.css'; ?>
<?php
include 'css/Alljobs.css';
$db = new DB($conn);
?>
        
        </style>
    </head>
    <body>

        <?php include './Common/Header.php'; ?>
        <div class="row">
            <div class="col-md-12">
                <div class="container" style="  border:1px solid #000; 
                     background-color:#FFF; 
                     background-image:url('http://www.musictruth.com/wp-content/uploads/2016/12/bible-study-video-background.jpg'); 
                     height: 100px; width: 100%" >
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
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
                        </form>
                    </div>
                </div>
                .</div>
        </div>
        <section class="search-banner text-white py-5" id="search-banner" style="background:<?php echo $Topnavbar; ?>; margin-top:-40px; ">
            <div class="container py-5 my-5">
                <div class="row text-center pb-4">
                    <div class="col-md-12">

                    </div>
                </div>   
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <form method="get" action="Alljobs.php">
                                        <div class="col-md-2">
                                            <div class="form-group ">
                                                <label>Category</label>
                                                <input type="text" name="category" id="inputState" value="any" placeholder="IT" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-md-2">
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

                                        <div class="col-md-2">
                                            <div class="form-group ">
                                                <label>Skill set</label>
                                                <input type="text" value="any" name="skill" id="inputState" placeholder="Java" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group ">
                                                <label>Location</label>

                                                <input type="text" value="any" id="inputState" name="location" placeholder="mumbai" class="form-control" >

                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group ">
                                                <label>Salary</label>
                                                <select id="inputState" name="salary" class="form-control salary" >
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
                                        </div>
                                        <div class="col-md-2">

                                            <br>
                                            <button class="btn btn-primary" name="search" style="margin-top: -10px;">Go</button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <hr  style="width:1px; size: 500px;">
        <div class="flex-container">
            <div class=" container-fluid" style="width: 100%;">
                <div class="row">
                    <div class="col-sm-2" >
                        <h3>All category</h3>
                        <?php
                        $data = $db->select("jobpost", "id,job_title");
                        while ($job = $data->fetch_assoc()) {
                            ?>
                            <div style="border-bottom: thin solid grey; padding: 5px;">
                                <a href="Jobdetail.php?id=<?php echo $job["id"]; ?>"><?php echo $job["job_title"]; ?></a>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="col-md-8">

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

                        if ($salary == "any") {
                            $salary = 1;
                        }
                        if ($date == "none") {
                            $date = "today";
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
                                $sql .= " or desired_skill_set like '%$skill%'";
                            }
                        }

                        if ($date == "any" || $date == "") {
                            
                        } else {
                            if ($sql == "select * from jobpost") {
                                $sql .= " where job_posted_on between '$edate' and '$sdate_'";
                            } else {
                                $sql .= " or job_posted_on between '$edate' and '$sdate_'";
                            }
                        }
//                        echo $sql;
                        $data = $conn->query($sql);
                        while ($row = $data->fetch_assoc()) {
                            $where = array("id" => $row["employers_id"]);
                            $companies = $db->select("employers", "*", $where);
                            $company = $companies->fetch_assoc();
                            ?>
                            <div class="employeeprofilecard" style="margin-top: 20px; width: 80%;">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="employe">
                                            <img src="images/CompanyProfile/<?php echo $company["company_logo"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Job Title</label>
                                        <p id="jobtitle"><?php echo $row["job_title"]; ?></p>
                                        <label>job Description</label>
                                        <p id="Jobdesc"><?php echo $row["jobdescription"]; ?>...<a href="Jobdetail.php?id=<?php echo $row["id"]; ?>">More Info</a></p>
                                    </div> 
                                    <div class="col-md-4">
                                        <p id="Joblocation"><?php echo $company["Address_office"]; ?></p>
                                        <p id="Jobdesc"><?php echo $row["Package_Ranged_Offered"]." Lac / annum"; ?></p>
                                        <div class="btn3">
                                            <a href="Jobdetail.php?id=<?php echo $row["id"];?>"><button type="button">More Info</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="col-sm-2">
                        <h3>All skills</h3>
                        <?php
                        $data = $db->select("jobpost", "id,desired_skill_set");
                        while ($job = $data->fetch_assoc()) {
                            ?>
                            <div style="border-bottom: thin solid grey; padding: 5px;">
                                <a href="Jobdetail.php?id=<?php echo $job["id"]; ?>"><?php echo $job["desired_skill_set"]; ?></a>
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