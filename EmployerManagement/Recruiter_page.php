<?php session_start();?>
<?php include './LoginCheck.php';?> 
<!DOCTYPE html>
<html>
    <head>
        <?php
      
        include '../Common/CDN.php';
        include '../Config/ConnectionObjectOriented.php';
        include '../Config/DB.php';
        ?>   
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
<?php include './recruiter_page.css'; ?>
        </style>
    </head>
    <body>
        <?php include './recruiter_page_header.php'; ?>
        <div class="container-fluid allbranchContainer">
            <div class="row">
                <div class="col-sm-3 sidebarcolumn">
                    <?php include './recruiter_sidebar.php'; ?>
                </div>

                <div class="col-sm-9 maincolumn">
                    <h1 style="text-align: center; margin: 10px; font-size: 35px; font-weight: bold; padding: 15px; text-shadow: 2px 2px lightgray; text-transform: capitalize; letter-spacing: 2px;">Dashboard</h1> 
                    <div class="row">

                        <div class="col-sm-3">
                            <div class="card">
                                <a href="AllAppointments.php"><div class="rootdashboard">
                                    <h3><?php
                                        $query = "select count(id) as allnum from appointment where hiring_id in(select id from hiring where employers_id=" . $_SESSION['loggedinid'] . ")";
                                        $data = $conn->query($query);
                                        $one = $data->fetch_assoc();
                                        $num = $one["allnum"];
                                        echo $num;
                                        ?></h3>
                                    <div class="totalbranch">Total Appointments</div>
                                    <div class="rooticon"><span class="glyphicon glyphicon-home"></span></div>
<!--                                    <div class="btn-card-root">
                                        <div class="btn btn-default card-btn-root">Read More</a></div>
                                    </div>-->
                                    </div></a>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="card" >
                                <div class="rootdashboard">
                                    <h3><?php
                                        $query = "select count(id) as allnum from hiring where employers_id=" . $_SESSION['loggedinid'];
                                        $data = $conn->query($query);
                                        $one = $data->fetch_assoc();
                                        $num = $one["allnum"];
                                        echo $num;
                                        ?></h3>
                                    <div class="totalbranch">Total JOB request</div>
                                    <div class="rooticon"><span class="glyphicon glyphicon-home"></span></div>
                                    <div class="btn-card-root" >
                                        <div class="btn btn-default card-btn-root"><a href="Job_Request_by_recruiters.php">By companies</a></div><br>
                                        <div class="btn btn-default card-btn-root"><a href="Job_Request_by_candidates.php">By candidates</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card" >
                                <a href="AllJobs.php"><div class="rootdashboard">
                                    <h3><?php
                                        $data = $db->select("jobpost", "count(id) as allnum", array("employers_id" => $_SESSION["loggedinid"]));
                                        $one = $data->fetch_assoc();
                                        $num = $one["allnum"];
                                        echo $num;
                                        ?></h3>
                                    <div class="totalbranch">Total JOB posted</div>
                                    <div class="rooticon"><span class="glyphicon glyphicon-home"></span></div>
<!--                                    <div class="btn-card-root">
                                        <div class="btn btn-default card-btn-root">Read more</a></div>
                                    </div>-->
                                    </div></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
